<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;
use Import\Model\CategoryMap;
use ElephantIO\Client as Client;
use ElephantIO\Engine\SocketIO\Version1X;

/**
 * Import Site home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/import", name="import-site-home")
 * https://haraapp.dev/import/install?shop=five-devshop.myharavan.com&timestamp=1451372285&signature=298ed7b77809225797c0333159743595d92aa04e95ab757f8fc2712d1915b5f8
 */
class SiteController extends AbstractAdminController
{
    /**
     * number record on 1 page
     * @var integer
     */
    protected $recordPerPage = 30;

    /**
     * Install action.
     *
     * @return void
     *
     * @Route("/install", methods={"GET", "POST"}, name="site-import-install")
     */
    public function installAction()
    {
        $formData = $success = $error = [];
        $message = '';
        $shopName = (string) $this->request->getQuery('shop', null, '');

        // Get app setting
        $myApp = AppModel::findFirstById(1);

        if ($shopName == '') {
            // redirect 404 page.
        }

        // Select Store
        $myStore = StoreModel::findFirst([
            'name = :shopName:',
            'bind' => [
                'shopName' => $shopName
            ]
        ]);

        // if is new store, => return to permission page.
        if (!$myStore) {
            return $this->response->redirect(
                EnHelper::getInstance('haravan', 'import')->getAuthorizationUrl($shopName, $myApp->apiKey, $myApp->permissions, $myApp->redirectUrl),
                true,
                301
            );
        }

        // if is installed store, => return to homepage.
        if ($myStore->config == StoreModel::INSTALLED && $myStore->mapped == StoreModel::MAPPED) {
            return $this->response->redirect('/import', true, 301);
        }

        // Submit data to database when setup completed.
        if (!empty($this->request->hasPost('fsubmit'))) {
            $pass = false;
            $formData = array_merge($formData, $this->request->getPost());
            $categoryMap = (array) $formData['mapping'];

            foreach ($categoryMap as $haravanId => $itemMap) {
                $myCategoryMap = new CategoryMap();
                $myCategoryMap->hid = (int) $haravanId;
                $myCategoryMap->fid = (int) $itemMap['id'];
                $myCategoryMap->fname = (string) $itemMap['name'];
                $myCategoryMap->status = (int) CategoryMap::STATUS_PENDING;

                if ($myCategoryMap->save()) {
                    $success[] = $haravanId;
                    $pass = true;
                } else {
                    foreach ($myCategoryMap->getMessages() as $msg) {
                        $message .= str_replace('###haravanId###', $haravanId, $this->lang->_($msg->getMessage())) . '<br />';
                    }
                }
            }

            // Insert store contact to FIVE db.

            // If insert to category map and FIVE user table is ok.
            if ($pass) {
                $myStore->config = StoreModel::INSTALLED;

                if ($myStore->update()) {
                    $this->flash->success(str_replace('###haravanId###', implode(',', $success), $this->lang->_('message-create-success')));
                } else {
                    $this->flash->error($this->lang->_('message-update-config-falied'));
                }
            } else {
                $this->flash->error($message);
            }
        }

        $this->session->has('shop') ? $this->session->get('shop') : $this->session->set('shop', $myStore->name);
        $this->session->has('oauth_token') ? $this->session->get('oauth_token') : $this->session->set('oauth_token', $myStore->accessToken);

        $haravanCollections = EnHelper::getInstance('haravan', 'import')->getCollections();

        $myCategories = Category::parent_sort(
            Category::find([
                'order' => 'orderno ASC'
            ])->toArray()
        );

        $this->bc->add($this->lang->_('title-index'), 'import/install');
        $this->bc->add($this->lang->_('title-install'), '');
        $this->view->setVars([
            'bc' => $this->bc->generate(),
            'collections' => $haravanCollections,
            'myCategories' => $myCategories,
            'myStore' => $myStore,
            'formData' => $formData,
            'error' => $error
        ]);
    }

    /**
     * Home action.
     *
     * @return void
     *
     * @Route("/", methods={"GET", "POST"}, name="site-import-home")
     */
    public function indexAction()
    {
        die('homepage');
    }

    /**
     * Welcome action.
     *
     * Callback action from haravan import permission page.
     * @return void
     *
     * @Route("/welcome", methods={"GET", "POST"}, name="site-import-welcome")
     */
    public function welcomeAction()
    {
        $shopName = $this->request->getQuery('shop', null, '');
        $code = $this->request->getQuery('code', null, '');

        // Get app setting
        $myApp = AppModel::findFirstById(1);

        $accessToken = EnHelper::getInstance('haravan', 'import')->getAccessToken(
            $shopName, $myApp->apiKey, $myApp->sharedSecret, $code, $myApp->redirectUrl
        );

        $this->session->set('shop', $shopName);
        $this->session->set('oauth_token', $accessToken);

        // Save shop detail
        $myStore = new StoreModel();
        $myStore->assign([
            'name' => $shopName,
            'accessToken' => $accessToken,
            'status' => StoreModel::STATUS_ENABLE,
            'config' => StoreModel::NOT_INSTALLED,
            'mapped' => StoreModel::NOT_MAPPED
        ]);

        if ($myStore->save()) {
            // Display installed sucessfull page and button to go install page.
        }

    }

    /**
     * test action.
     *
     * @Route("/test", methods={"GET", "POST"}, name="site-import-test")
     */
    public function testAction()
    {
        echo 'abc';die;
        // $client = new Client(new Version1X('http://localhost:3000'));
        // $client->initialize();
        // $client->of('/namespace');
        // $client->emit('broadcast', ['foo' => 'bar']);
        // $client->close();
    }

    /**
     * push action.
     *
     * @Route("/push", methods={"GET", "POST"}, name="site-import-push")
     */
    public function pushAction()
    {
        // $client = new Client(new Version1X('http://localhost:3000'));
        // $client->initialize();
        // $client->of('/namespace');
        // $client->emit('notification', ['foo' => 'bar']);
        // $client->close();
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $a = $redis->pubSub("channels", 'notification');
        var_dump($a);
die;
        // $redis->publish('notification', 'abc'); // send message.
        for ($i = 1; $i <= 100; $i++) {
            sleep(1);
            $redis->publish('notification', $i); // send message.
        }


        die;
    }
}
