<?php
namespace User\Controller;

use Core\Controller\AbstractController;
use User\Model\User as UserModel;
use Core\Model\Store as StoreModel;

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
     *
     * @Route("/", methods={"GET", "POST"}, name="login-user-index")
     */
    public function indexAction()
    {
        $redirectUrl = base64_decode($this->request->getQuery('redirect', null, ''));
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
                    $myStore = StoreModel::findFirst([
                        'uid = :uid: AND status = :status:',
                        'bind' => [
                            'uid' => $this->session->get('me')->id,
                            'status' => StoreModel::STATUS_ENABLE
                        ]
                    ]);

                    if ($redirectUrl != null && $myStore != false) {
                        $this->session->set('sid', $myStore->id);
                        $this->session->set('shop', $myStore->name);
                        $this->session->set('oauth_token', $myStore->accessToken);
                        return $this->response->redirect($redirectUrl);
                    } else {
                        return $this->response->redirect('import/install');
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
