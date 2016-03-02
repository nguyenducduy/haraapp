<?php
namespace Engine\Console\Command;

use Engine\Console\AbstractCommand;
use Engine\Interfaces\CommandInterface;
use Engine\Console\ConsoleUtil;
use Phalcon\DI;
use Import\Model\ProductQueue;
use Import\Model\CategoryMap;
use Core\Model\Store;
use Core\Model\Ads;

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
                sleep(2);

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
