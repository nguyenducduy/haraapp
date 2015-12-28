<?php
namespace Import\Controller;

use Core\Controller\AbstractController;

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
     * Main action.
     *
     * @return void
     *
     * @Route("/", methods={"GET", "POST"}, name="site-import-index")
     */
    public function indexAction()
    {
        die('index import page.');
    }

    /**
     * Install action.
     *
     * @return void
     *
     * @Route("/install", methods={"GET", "POST"}, name="site-import-install")
     */
    public function installAction()
    {
        die('install page.');
    }

    /**
     * Install action.
     *
     * @return void
     *
     * @Route("/welcome", methods={"GET", "POST"}, name="site-import-welcome")
     */
    public function welcomeAction()
    {
        die('welcome page.');
    }
}
