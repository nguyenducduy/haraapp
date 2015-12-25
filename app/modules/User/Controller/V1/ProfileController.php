<?php
namespace User\Controller\V1;

use Core\Controller\AbstractController;
use User\Model\User as UserModel;
use User\Transformer\User as UserTransformer;

/**
 * Profile site home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/v1/profile", name="user-site-home")
 */
class ProfileController extends AbstractController
{
    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/", methods={"GET", "POST"})
     */
    public function indexAction()
    {
        return $this->respondWithOK();
    }
}
