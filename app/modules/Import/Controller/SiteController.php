<?php
namespace Import\Controller;

use Core\Controller\AbstractController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;

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
 */
class SiteController extends AbstractController
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

        $this->session->has('shop') ? $this->session->get('shop') : $this->session->set('shop', $myStore->name);
        $this->session->has('oauth_token') ? $this->session->get('oauth_token') : $this->session->set('oauth_token', $myStore->accessToken);

        $haravanProducts = EnHelper::getInstance('haravan', 'import')->getCollections();
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
            echo 'Store shop to database Successfully';
        }
    }
}
