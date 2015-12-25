<?php
namespace Import\Controller\V1;

use Core\Controller\AbstractController;
use Engine\Exception\UserException;
use Engine\Constants\ErrorCode;
// use User\Model\User as UserModel;
// use User\Transformer\User as UserTransformer;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use phpish\shopify;

/**
 * Import site home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/v1/import")
 */
class SiteController extends AbstractController
{
    // /**
    //  * Create user action.
    //  *
    //  * @return void
    //  *
    //  * @Route("/", methods={"GET"})
    //  */
    // public function getAction()
    // {
    //     return $this->respondWithOK();
    // }
    //
    // /**
    //  * Update user action.
    //  *
    //  * @return void
    //  *
    //  * @Route("/", methods={"PUT"})
    //  */
    // public function putAction()
    // {
    //     return $this->respondWithOK();
    // }

    /**
     * Install app action.
     *
     * @return void
     *
     * @Route("/install", methods={"GET"})
     */
    public function installAction()
    {
        $shopName = (string) $this->request->getQuery('shop', null, '');

        // Get app setting
        $myApp = AppModel::findFirstById(1);

        if ($shopName != '') {
            // Select Store
            $myStore = StoreModel::findFirst([
                'name = :shopName:',
                'bind' => [
                    'shopName' => $shopName
                ]
            ]);

            // if is new store, => return to permission page.
            if (!$myStore) {
                //convert the permissions to an array
                $permissions = json_decode($myApp->permissions, true);

                //get the permission url
                $permission_url = shopify\authorization_url(
                  $shopName, $myApp->apiKey, $permissions
                );
                $permission_url .= '&redirect_uri=' . $myApp->redirectUrl;

                $this->redirect($permission_url);
            } else {
                // return to admin app page.
            }
        }

        return $this->respondWithOK();
    }

    /**
     * Welcome app action.
     *
     * @return void
     *
     * @Route("/welcome", methods={"GET"})
     */
    public function welcomeAction()
    {
        $shopName = $this->request->getQuery('shop', null, '');
        $code = $this->request->getQuery('code', null, '');

        // Get app setting
        $myApp = AppModel::findFirstById(1);

        try {
            // Get access token
            $access_token = shopify\access_token(
                $shopName, $myApp->apiKey, $myApp->sharedSecret, $code
            );
            // $_SESSION['oauth_token'] = $oauth_token;
		    // $_SESSION['shop'] = $_GET['shop'];
            echo $access_token . ' ### App Successfully Installed!';

            // Store shop detail
            $myStore = new StoreModel();
            $myStore->assign([
                'name' => $shopName,
                'accessToken' => $access_token
            ]);
            if ($myStore->create()) {
                echo 'Store shop to database Successfully';
            }

        } catch (shopify\ApiException $e) {
            # HTTP status code was >= 400 or response contained the key 'errors'
    		echo $e;
    		print_R($e->getRequest());
    		print_R($e->getResponse());
        } catch (shopify\CurlException $e) {
            # cURL error
    		echo $e;
    		print_R($e->getRequest());
    		print_R($e->getResponse());
        }
        die;
    }
}
