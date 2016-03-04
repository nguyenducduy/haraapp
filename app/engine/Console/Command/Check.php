<?php
namespace Engine\Console\Command;

use Engine\Console\AbstractCommand;
use Engine\Interfaces\CommandInterface;
use Engine\Console\ConsoleUtil;
use Phalcon\DI;
use Import\Model\CategoryMap;
use Import\Model\ProductQueue;
use Import\Model\ProductLog;
use Core\Model\Store;
use Engine\Helper as EnHelper;

/**
 * Check command.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @CommandName(['check'])
 * @CommandDescription('Checking category pending and push the job to Queue / Every 1 minutes.')
 */
class Check extends AbstractCommand implements CommandInterface
{
    /**
     * Check category
     *
     * @return void
     */
    public function categoryAction()
    {
        $myCategoryMap = CategoryMap::find([
            'status = :status:',
            'bind' => [
                'status' => CategoryMap::STATUS_PENDING
            ]
        ]);

        if ($myCategoryMap) {
            foreach ($myCategoryMap as $item) {
                // Get all products from this category from haravan
                $myStore = Store::findFirstById($item->sid);

                $session = $this->getDI()->get('session');
                $session->set('shop', $myStore->name);
                $session->set('oauth_token', $myStore->accessToken);

                $total = EnHelper::getInstance('haravan', 'import')->getTotalProductsByCollectionId((int) $item->hid);
                $totalPage = ceil($total / 50);

                // Using to count queued item.
                $itemInQueue = $item->totalItemQueue;
                $itemList = [];

                if ($totalPage >= 1) {
                    for ($i = 1; $i <= $totalPage; $i++) {
                        $myProducts = EnHelper::getInstance('haravan', 'import')->getProductsByCollectionId(
                            (int) $item->hid,
                            $i
                        );

                        if ($myProducts) {
                            foreach ($myProducts as $product) {
                                $myProductQueue = ProductQueue::findFirst([
                                    'pid = :pid:',
                                    'bind' => [
                                        'pid' => (int) $product->id
                                    ]
                                ]);

                                if ($myProductQueue == false) {
                                    $myProductQueue = new ProductQueue();
                                    $myProductQueue->pid = (int) $product->id;
                                    $myProductQueue->pdata = json_encode($product, JSON_UNESCAPED_UNICODE);
                                    $myProductQueue->status = ProductQueue::STATUS_QUEUE;
                                    $myProductQueue->retryCount = 0;
                                    $myProductQueue->priority = 1;
                                    $myProductQueue->fcid = $item->fid;
                                    $myProductQueue->sid = $item->sid;

                                    if ($myProductQueue->save()) {
                                        //Push to Beanstalk Queue
                                        $queue = $this->getDI()->get('queue');
                                        $queue->choose('haraapp.import');
                                        $addedToQueue = $queue->put([
                                            [
                                                'storeId' => $item->sid,
                                                'haravanId' => $item->hid,
                                                'haravanProductId' => $product->id
                                            ],
                                            [
                                                'priority' => $myProductQueue->priority,
                                                'delay' => 10,
                                                'ttr' => 3600
                                            ]
                                        ]);

                                        if ($addedToQueue) {
                                            echo $item->hid . ' - added to queue.' . PHP_EOL;
                                            $itemInQueue = $itemInQueue + 1;
                                            $itemList[] = $item->hid;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                //Save to category_map table total products of this category.
                $item->totalItem = (int) $total;
                $item->totalItemQueue = (int) $itemInQueue;
                $item->status = CategoryMap::STATUS_COMPLETED;
                if (count($itemList) > 0) {
                    $item->data = json_encode($itemList);
                }
                $item->update();

                // Insert current progress to product log table.
                $myProductLog = ProductLog::findFirst('status = '. ProductLog::STATUS_CURRENT_PROCESSING .' AND type = '. ProductLog::TYPE_IMPORT .'');
                $myProductLog->status = ProductLog::STATUS_COMPLETED;
                $myProductLog->update();

                $myProductLog = new ProductLog();
                $myProductLog->assign([
                    'sid' => $item->sid,
                    'message' => 'Category Initialize Completed. Ready in Queue.',
                    'type' => ProductLog::TYPE_IMPORT,
                    'status' => ProductLog::STATUS_CURRENT_PROCESSING,
                    'class' => 'succcess'
                ]);
                $myProductLog->create();
            }
        } else {
            print ConsoleUtil::success('No Category Pending found.') . PHP_EOL;
            exit(0);
        }
    }

    public function testAction()
    {
        // Get all products from this category from haravan
        $myStore = Store::findFirstById(5);

        $session = $this->getDI()->get('session');
        $session->set('shop', $myStore->name);
        $session->set('oauth_token', $myStore->accessToken);

        $myProducts = EnHelper::getInstance('haravan', 'import')->getProductsByCollectionId(
            1001242842
        );

        echo $myProducts->pdata;

        // $queue = $this->getDI()->get('queue');
        // $queue->choose('haraapp.import');
        // $queue->put([
        //     [
        //         'storeId' => 5,
        //         'haravanId' => 1000257298,
        //         'haravanProductId' => 1001236578
        //     ],
        //     [
        //         'priority' => 250,
        //         'delay' => 10,
        //         'ttr' => 3600
        //     ]
        // ]);
    }
}
