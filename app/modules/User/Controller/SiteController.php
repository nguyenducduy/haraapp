<?php
namespace User\Controller;

use Core\Controller\AbstractController;

/**
 * User admin home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
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
     * @Route("/", methods={"GET", "POST"}, name="site-user-index")
     */
    public function indexAction()
    {
        die('User / Index / Index');
    }

    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/add", methods={"GET", "POST"}, name="site-user-add")
     */
    public function addAction()
    {
        die('b');
    }
}
