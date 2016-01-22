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
 * @CommandDescription('Checking category pending and push the job to Queue.')
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

                //Using to count queued item.
                $itemInQueue = $item->totalItemQueue;

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
                                    $myProductQueue->pdata = json_encode($product);
                                    $myProductQueue->status = ProductQueue::STATUS_QUEUE;
                                    $myProductQueue->retryCount = 0;
                                    $myProductQueue->priority = 1;

                                    if ($myProductQueue->create()) {
                                        $addedToQueue = $this->getDI()->get('queue')->putInTube('import',
                                            [
                                                'storeId' => $item->sid,
                                                'haravanId' => $item->hid,
                                                'fiveId' => $item->fid
                                            ],
                                            [
                                                'priority' => $myProductQueue->priority
                                            ]
                                        );

                                        if ($addedToQueue) {
                                            $itemInQueue = $itemInQueue + 1;
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
                $item->update();
            }
        } else {
            print ConsoleUtil::success('No Category Pending found.') . PHP_EOL;
            exit(0);
        }
    }

    public function logError()
    {

    }
}
