<?php
namespace Engine\Console\Command;

use Engine\Console\AbstractCommand;
use Engine\Interfaces\CommandInterface;
use Engine\Console\ConsoleUtil;
use Phalcon\DI;
use Import\Model\ProductQueue;
use Import\Model\CategoryMap;
use Core\Model\Store;
use Import\Model\Ads;
use Phalcon\Image\Adapter\GD as PhImage;
use Core\Helper\Utils;
use Import\Model\Images;

/**
 * Worker command.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @CommandName(['worker'])
 * @CommandDescription('Beanstalk Queue Worker.')
 */
class Worker extends AbstractCommand implements CommandInterface
{
    /**
     * Start Import Product Queue action.
     *
     * @return void
     */
    public function importAction($param1 = null, $param2 = null)
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);

        $queue = $this->getDI()->get('queue');
        $queue->watch('haraapp.import');

        $config = $this->getDI()->get('config');
        $filefive = $this->getDI()->get('filefive');

        while (($job = $queue->reserve())) {
            $message = $job->getBody();
            $data = $message[0];

            // Get offline product data from mysql db
            $myProductQueue = ProductQueue::findFirst([
                'pid = :haravanProductId: AND status = :status: AND sid = :storeId:',
                'bind' => [
                    'haravanProductId' => $data['haravanProductId'],
                    'status' => ProductQueue::STATUS_QUEUE,
                    'storeId' => $data['storeId']
                ]
            ]);

            if ($myProductQueue) {
                $myStore = Store::findFirstById($data['storeId']);

                // get content, image and import to five.vn db
                $product = json_decode($myProductQueue->pdata);
                $cleanData = strip_tags($product->body_html);

                // insert table ADS
                $myAds = new Ads();
                $myAds->assign([
                    'uid' => $myStore->uid,
                    'udid' => "", //Fake
                    'rid' => $product->id,
                    'cid' => $myProductQueue->fcid,
                    'title' => $product->title,
                    'slug' => Utils::slug($product->title),
                    'description' => $cleanData,
                    'price' => $product->variants[0]->price,
                    'instock' => 1,
                    'cityid' => 0,
                    'districtid' => 0,
                    'status' => 1,
                    'isdeleted' => 0,
                    'seokeyword' => $product->tags,
                    'lastpostdate' => time()
                ]);

                if ($myAds->save()) {
                    // Insert table IMAGES
                    foreach ($product->images as $img) {
                        $response = \Requests::get($img->src);
                        if ($response->status_code == 200) {
                            // Download image to local
                            $filePart = explode('.', $img->filename);
                            $namePart = $filePart[0];
                            $extPart = $filePart[1];
                            $path = rtrim($config->global->product->directory, '/\\') . '/' . date('Y') . '/' . date('m') . DIRECTORY_SEPARATOR;
                            $fullPath = $config->global->staticFive . $path;
                            $uploadOK = $filefive->put($path . $namePart . '.' . $extPart, (string) $response->body);

                            // Resise image
                            $myResize = new PhImage($fullPath . $namePart . '.' . $extPart);
                            $orig_width = $myResize->getWidth();
                            $orig_height = $myResize->getHeight();
                            $height = (($orig_height * 1200) / $orig_width);
                            $mediumHeight = (($orig_height * 600) / $orig_width);
                            $smallHeight = (($orig_height * 200) / $orig_width);

                            $myResize->resize(1200, $height)->crop(1200, $height)->save($fullPath . $namePart . '.' . $extPart);
                            $myResize->resize(600, $mediumHeight)->crop(600, $mediumHeight)->save($fullPath . $namePart . '-medium' .'.'. $extPart);
                            $myResize->resize(200, $smallHeight)->crop(200, $smallHeight)->save($fullPath . $namePart . '-small' .'.'. $extPart);

                            if ($uploadOK) {
                                // Save to db
                                $myImage = new Images();
                                $myImage->assign([
                                    'aid' => $myAds->id,
                                    'name' => $myAds->title,
                                    'path' => $path . $namePart . '.' . $extPart,
                                    'status' => Images::STATUS_ENABLE,
                                    'orderNo' => $img->position
                                ]);
                                if ($myImage->save()) {
                                    echo "image save ok!";
                                    // Update first image to ads table
                                    if ($img->position == 1) {
                                        $myAds->image = $path . $namePart . '.' . $extPart;
                                        $myAds->save();
                                    }
                                } else {
                                    echo "cannot save image!";
                                }
                            } else {
                                echo "cannot download image!";
                            }
                        } else {
                            echo "cannot get image url!";
                        }
                    }
                } else {
                    echo 'save ads failed.';
                }

                // update okie
                $myCategoryMap = CategoryMap::findFirst([
                    'hid = :haravanId: AND fid = :fid: AND sid = :storeId:',
                    'bind' => [
                        'haravanId' => $data['haravanId'],
                        'fid' => $myProductQueue->fcid,
                        'storeId' => $data['storeId']
                    ]
                ]);

                $myCategoryMap->totalItemSync++;
                $myCategoryMap->totalItemQueue--;
                $myCategoryMap->update();

                // generate total process, when import a product success
                $totalItem = CategoryMap::sum([
                    'column' => 'totalItem',
                    'conditions' => 'hid = '. $data['haravanId'] .' AND sid = ' . $data['storeId']
                ]);
                $totalItemSync = CategoryMap::sum([
                    'column' => 'totalItemSync',
                    'conditions' => 'hid = '. $data['haravanId'] .' AND sid = ' . $data['storeId']
                ]);
                $process = ($totalItemSync * 100) / $totalItem;

                // Push process
                $meta = [
                    'shopName' => $myStore->name,
                    'record' => $process
                ];
                $redis->publish('notification', json_encode($meta)); // send message.

                // When process all products in category map, update store mapped to OK
                if ($process == 100) {
                    $myStore->mapped = Store::MAPPED;
                    $myStore->update();
                }
            } else {
                print ConsoleUtil::success('No Product Pending found.') . PHP_EOL;
                exit(0);
            }

            $job->delete();
        }
    }
}
