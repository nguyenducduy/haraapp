<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Import\Model\Ads as AdsModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;
use Import\Model\CategoryMap;
use Core\Helper\Utils;

/**
 * Product Webhook
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/product", name="import-product-home")
 */
class ProductController extends AbstractAdminController
{
    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/add", methods={"POST"}, name="import-product-add")
     */
    public function addAction()
    {
        if (isset($_SERVER['HTTP_X_HARAVAN_HMAC_SHA256'])) {
            $myApp = AppModel::findFirstById(1);

            $hmac_header = $_SERVER['HTTP_X_HARAVAN_HMAC_SHA256'];
            $data = file_get_contents('php://input');
            $verified = Utils::verify_webhook($data, $hmac_header, $myApp->sharedSecret);

            if ($verified) {
                $product = json_decode($data);
                $cleanData = strip_tags($product->body_html);

                $myStore = StoreModel::findFirst([
                    'name = :storeName:',
                    'bind' => [
                        'storeName' => $_SERVER['HTTP_HARAVAN_SHOP_DOMAIN']
                    ]
                ]);

                // insert table ADS
                $myAds = new AdsModel();
                $myAds->assign([
                    'uid' => $myStore->uid,
                    'udid' => "", //Fake
                    'rid' => $product->id,
                    'cid' => 0, //Fake
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

                if ($myAds->create()) {
                    $pass = true;
                    // Insert table IMAGES
                    if (isset($product->images)) {
                        foreach ($product->images as $img) {
                            $this->debug($img->src);
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
                                    error_log("image upload ok");
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
                                        // Update first image to ads table
                                        if ($img->position == 1) {
                                            $myAds->image = $path . $namePart . '.' . $extPart;
                                            if ($myAds->update()) {
                                                error_log('Update first image to ads success');
                                            }
                                        }
                                    } else {
                                        error_log("cannot save image!");
                                    }
                                } else {
                                    error_log("cannot download image!");
                                }
                            } else {
                                error_log("cannot get image url!");
                            }
                        }
                    }

                    $imageName = strlen($myAds->image) > 0 ? $myAds->image : "";

                    // Save to product_map table
                    $myProduct = new ProductMap();
                    $myProduct->assign([
                        'sid' => $myStore->id,
                        'uid' => $myStore->uid,
                        'hid' => $data['haravanProductId'],
                        'aid' => $myAds->id,
                        'cid' => $myAds->cid,
                        'title' => $myAds->title,
                        'price' => $myAds->price,
                        'image' => $imageName,
                        'slug' => $myAds->slug,
                        'status' => $myAds->status
                    ]);
                    if ($myProduct->create()) {
                        error_log($myProduct->title . ' created success!');
                    }

                    // Delete queued data. (Production)
                    // $myProductQueue->delete();
                }
            }
        } else {
            error_log('Request not from haravan');
        }
    }

    public function debug($result)
    {
        return error_log(print_r($result, true));
    }
}
