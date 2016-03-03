<?php
namespace User\Controller;

use Core\Controller\AbstractController;

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
     * number record on 1 page
     * @var integer
     */
    protected $recordPerPage = 30;

    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/", methods={"GET", "POST"}, name="login-user-index")
     */
    public function indexAction()
    {
        die('User Login page.');
    }

}
