<?php
namespace User\Controller;

use Core\Controller\AbstractController;
use User\Model\User as UserModel;

/**
 * User logout home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/logout", name="user-logout-home")
 */
class LogoutController extends AbstractController
{
    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"}, name="logout-user-index")
     */
    public function indexAction()
    {
        // delete cookie
        if ($this->cookie->has('remember-me')) {
            $rememberMe = $this->cookie->get('remember-me');
            $rememberMe->delete();
        }

        // remove session
        session_unset();
        session_regenerate_id(true);

        return $this->response->redirect('login');
    }
}
