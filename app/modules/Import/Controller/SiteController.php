<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;

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
            //get the permission url
            return $this->response->redirect(
                EnHelper::getInstance('haravan', 'import')->getAuthorizationUrl($shopName, $myApp->apiKey, $myApp->permissions, $myApp->redirectUrl),
                true,
                301
            );
        }

        // if is installed store, => return to homepage.
        if ($myStore->config == StoreModel::INSTALLED) {
            return $this->response->redirect('/import', true, 301);
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
            'myCategories' => $myCategories
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

        // Store shop detail
        $myStore = new StoreModel();
        $myStore->assign([
            'name' => $shopName,
            'accessToken' => $accessToken
        ]);

        if ($myStore->save()) {
            // DIsplay installed sucessfull page and button to go install page.
        }

    }
}
