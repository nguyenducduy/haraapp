<?php
namespace User\Controller;

use Core\Controller\AbstractController;
use User\Model\User as UserModel;
use Core\Model\Store as StoreModel;
use Core\Model\App as AppModel;

/**
 * User login home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/login", name="user-login-home")
 */
class LoginController extends AbstractController
{
    /**
     * Main action.
     *
     * @return void
     * https://five-devshop.myharavan.com/admin/api/auth/?api_key=2f473d7bb160533c9535985ff068cc56
     * @Route("/", methods={"GET", "POST"}, name="login-user-index")
     */
    public function indexAction()
    {
        $redirectUrl = base64_decode($this->request->getQuery('redirect', null, ''));

        if (strlen($redirectUrl) > 0) {
            $parts = parse_url($redirectUrl);
            parse_str($parts['query'], $query);
            $shopName = $query['shop'];
        }

        $formData = [];
        $cookie = false;
        $formData['fname'] = $this->request->getPost('fname', null, '');
        $formData['fpassword'] = $this->request->getPost('fpassword', null, '');
        $formData['fcookie'] = $this->request->getPost('fcookie', null, false);

        if ($this->request->hasPost('fsubmit')) {
            if ($this->security->checkToken()) {
                if (isset($formData['fcookie']) && $formData['fcookie'] == 'remember-me') {
                    $cookie = (boolean) true;
                }

                $identity = $this->check(
                    (string) $formData['fname'],
                    (string) $formData['fpassword'],
                    $cookie,
                    true);

                if ($identity == true) {
                    $myApp = AppModel::findFirst(1);
                    
                    if ($redirectUrl != null) {
                        return $this->response->redirect($redirectUrl, true, 301);
                    } else {
                        return $this->response->redirect('https://'. $shopName .'/admin/api/auth/?api_key=' . $myApp->apiKey, true, 301);
                    }
                }
            }
        }

        $this->tag->prependTitle('Login');
        $this->view->setVars([
            'formData' => $formData
        ]);
    }

    /**
     * Checking user existing in system
     *
     * @param  string  $email
     * @param  string  $password
     * @param  boolean $cookie
     * @param  boolean $log
     * @return boolean
     */
    public function check($name, $password, $cookie = false, $log = false)
    {
        $me = new \stdClass();

        $myUser = UserModel::findFirst([
            'name = :fname: AND status = :status:',
            'bind' => [
                'fname' => $name,
                'status' => UserModel::STATUS_ENABLE
            ]
        ]);

        if ($myUser) {
            if ($this->security->checkHash($password, $myUser->password)) {
                $me->id = $myUser->id;
                $me->email = $myUser->email;
                $me->name = $myUser->name;
                $me->role = $myUser->role;
                $me->roleName = $myUser->getRoleName();
                $me->avatar = $myUser->avatar;

                // create session for user
                $this->session->set('me', $me);

                // store cookie if chosen
                if ($cookie == true) {
                    $this->cookie->set('remember-me', $me->id, time() + 15 * 86400);
                }

                return true;
            } else {
                $this->flash->error('Wrong password!');
            }
        } else {
            $this->flash->error('Wrong user information!');
        }
    }

}
