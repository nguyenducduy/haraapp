<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;
use Import\Model\CategoryMap;
use Import\Model\ProductLog;
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
        $code = (string) $this->request->getQuery('code', null, '');

        // Get app setting
        $myApp = AppModel::findFirstById(1);

        if ($shopName == '') {
            return $this->response->redirect('notfound');
        }

        // Select Store
        $myStore = StoreModel::findFirst([
            'name = :shopName:',
            'bind' => [
                'shopName' => $shopName
            ]
        ]);

        if (!$myStore) {
            // Create new store if not exist
            $myStore = new StoreModel();
            $myStore->assign([
                'name' => $shopName
            ]);
            $myStore->save();

            return $this->response->redirect(
                EnHelper::getInstance('haravan', 'import')->getAuthorizationUrl($shopName, $myApp->apiKey, $myApp->permissions, $myApp->redirectUrl),
                true,
                301
            );
        }

        if ($myStore->accessToken != "") {
            $accessToken = $myStore->accessToken;
        } else {
            // get access token and store to session, db
            $accessToken = EnHelper::getInstance('haravan', 'import')->getAccessToken($shopName, $myApp->apiKey, $myApp->sharedSecret, $code, $myApp->redirectUrl);

            // Write access token to db spefified shop
            $myStore->accessToken = $accessToken;
            $myStore->status = StoreModel::STATUS_ENABLE;
            $myStore->save();
        }

        $this->session->get('oauth_token') != "" ? $this->session->get('oauth_token') : $this->session->set('oauth_token', $accessToken);
        $this->session->get('shop') != "" ? $this->session->get('shop') : $this->session->set('shop', $shopName);

        // if is installed store, => return to homepage.
        if ($myStore->config == StoreModel::INSTALLED && $myStore->mapped == StoreModel::MAPPED) {
            return $this->response->redirect('/home', true, 301);
        }

        // Submit data to database when setup completed.
        if (!empty($this->request->hasPost('fsubmit'))) {
            $pass = false;
            $formData = array_merge($formData, $this->request->getPost());
            $categoryMap = (array) $formData['mapping'];

            foreach ($categoryMap as $haravanId => $itemMap) {
                $myCategoryMap = new CategoryMap();
                $myCategoryMap->sid = (int) $myStore->id;
                $myCategoryMap->hid = (int) $haravanId;
                $myCategoryMap->fid = (int) $itemMap['id'];
                $myCategoryMap->fname = (string) $itemMap['name'];
                $myCategoryMap->status = (int) CategoryMap::STATUS_PENDING;
                $myCategoryMap->totalItem = 0;
                $myCategoryMap->totalItemSync = 0;
                $myCategoryMap->totalItemQueue = 0;

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

                    // Insert current progress to product log table.
                    $myProductLog = new ProductLog();
                    $myProductLog->assign([
                        'sid' => $myStore->id,
                        'message' => $this->lang->_('message-category-map-initialize'),
                        'type' => ProductLog::TYPE_IMPORT,
                        'status' => ProductLog::STATUS_CURRENT_PROCESSING,
                        'class' => 'info'
                    ]);
                    $myProductLog->create();
                } else {
                    $this->flash->error($this->lang->_('message-update-config-falied'));
                }
            } else {
                $this->flash->error($message);
            }
        }

        $this->session->set('shop', $myStore->name);
        $this->session->set('oauth_token', $myStore->accessToken);

        $haravanCollections = [];
        $haravanCollections = array_merge($haravanCollections, EnHelper::getInstance('haravan', 'import')->getCollections());
        $haravanCollections = array_merge($haravanCollections, EnHelper::getInstance('haravan', 'import')->getSmartCollections());

        $myCategories = Category::parent_sort(
            Category::find([
                'order' => 'orderno ASC'
            ])->toArray()
        );

        $currentProcess = ProductLog::findFirst([
            'sid = :sid: AND status = :status: AND type = :type:',
            'bind' => [
                'sid' => $myStore->id,
                'status' => ProductLog::STATUS_CURRENT_PROCESSING,
                'type' => ProductLog::TYPE_IMPORT
            ]
        ]);

        if ($currentProcess) {
            $currentProcessMessage = $currentProcess->message;
        } else {
            $currentProcessMessage = "";
        }

        $this->bc->add($this->lang->_('title-index'), 'import/install');
        $this->bc->add($this->lang->_('title-install'), '');
        $this->view->setVars([
            'bc' => $this->bc->generate(),
            'collections' => $haravanCollections,
            'myCategories' => $myCategories,
            'myStore' => $myStore,
            'formData' => $formData,
            'error' => $error,
            'currentProcessMessage' => $currentProcessMessage
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
        $myProductQueue = \Import\Model\ProductQueue::findFirst();
        $product = json_decode($myProductQueue->pdata);
        $cleanData = strip_tags($product->body_html);

        var_dump($product);

        // insert table ADS
        $myAds = new \Import\Model\Ads();
        $myAds->assign([
            'uid' => $this->session->get('me')->id, //Fake
            'udid' => "", //Fake
            'rid' => $product->id,
            'cid' => $myProductQueue->fcid,
            'title' => $product->title,
            'image' => $product->images[0]->src,
            'slug' => 'abc', //Fake
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
        $a = $myAds->save();

        // Insert table IMAGES
        foreach ($product->images as $img) {
            # code...
        }

        foreach ($a->getMessages() as $mgs) {
            var_dump($mgs);
        }
        die('homepage');
    }

    // /**
    //  * Welcome action.
    //  *
    //  * Callback action from haravan import permission page.
    //  * @return void
    //  *
    //  * @Route("/welcome", methods={"GET", "POST"}, name="site-import-welcome")
    //  */
    // public function welcomeAction()
    // {
    //     $shopName = $this->request->getQuery('shop', null, '');
    //     $code = $this->request->getQuery('code', null, '');
    //
    //     // Get app setting
    //     $myApp = AppModel::findFirstById(1);
    //
    //     $accessToken = EnHelper::getInstance('haravan', 'import')->getAccessToken(
    //         $shopName, $myApp->apiKey, $myApp->sharedSecret, $code, $myApp->redirectUrl
    //     );
    //
    //     $this->session->set('shop', $shopName);
    //     $this->session->set('oauth_token', $accessToken);
    //
    //     // Save shop detail
    //     $myStore = new StoreModel();
    //     $myStore->assign([
    //         'name' => $shopName,
    //         'accessToken' => $accessToken,
    //         'status' => StoreModel::STATUS_ENABLE,
    //         'config' => StoreModel::NOT_INSTALLED,
    //         'mapped' => StoreModel::NOT_MAPPED
    //     ]);
    //
    //     if ($myStore->save()) {
    //         // Display installed sucessfull page and button to go install page.
    //     }
    //
    // }

    /**
     * test action.
     *
     * @Route("/test", methods={"GET", "POST"}, name="site-import-test")
     */
    public function testAction()
    {
        die('a');
        $this->session->set('shop', 'batda.myharavan.com');
        $this->session->set('oauth_token', 'Rs9_LN2rtuzQVdFiC0DFmqiZXJmmRu6wb1f_dEKX4ND29pb4jPz7qrDmCiIr7HXWek7Q31V8xD5f9cBdnXoOpx0p7RLrKaBgpCmci0KCgqwEo8BW9-CkGJWjN0fu2LDL6fLBEK7gLFWZyia-kkh-ZRJwaaFdK0ghvJI0jvMDk5eExsXaX_J9mRUWHfvgBwkYxiMMJeGsUhP26nu8E-ppXsgb0TLhlr7e236vY99zJPR9HJUDgxTgVPCpTw4OpVY1WXPCGhpGXzpJzmctvW9UZ9LzrMNMbFu_44VFQD50cbF2pRJaPMliivIETr9Nr6QiZJaLP0sG7wdKIQGHf6hzdRHguQs0KN5rHTyOCc4dFS0Y9MWYiEeq6qfSXRk1n_LtIXspSilBjF28x_YKlwNYbY04wzI1KY6gSXrtTa3KYd51EoTZPr9dDnt6yiRMw7yZH7VI1bcR05wvZCWif-gqWAz8raCr558AUaDv2Qw4c9PJRUN6OFeu1Nm01T8Bn3ntMxzH8tSe1dSiW_LAgpbJTCLZm34');

        $data = EnHelper::getInstance('haravan', 'import')->getProductsByCollectionId(1000260884);

        foreach ($data as $item) {
            var_dump($item);
            die;
        }

        var_dump($data);
        die;
    }

    /**
     * push action.
     *
     * @Route("/push", methods={"GET", "POST"}, name="site-import-push")
     */
    public function pushAction()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);

        $meta = [
            'shopName' => $this->session->get('shop'),
            'record' => 0
        ];
        for ($i = 1; $i <= 100; $i++) {
            sleep(1);
            $meta['record'] = $i;
            $i += 10;
            $redis->publish('notification', json_encode($meta)); // send message.
        }

        die;
    }
}
