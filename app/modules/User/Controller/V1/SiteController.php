<?php
namespace User\Controller\V1;

use Core\Controller\AbstractController;
use Engine\Exception\UserException;
use Engine\Constants\ErrorCode;
use User\Model\User as UserModel;
use User\Transformer\User as UserTransformer;

/**
 * User site home.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/v1/user")
 */
class SiteController extends AbstractController
{
    /**
     * Create user action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"})
     */
    public function getAction()
    {
        return $this->respondWithOK();
    }

    /**
     * Update user action.
     *
     * @return void
     *
     * @Route("/", methods={"PUT"})
     */
    public function putAction()
    {
        return $this->respondWithOK();
    }

    /**
     * Login user action.
     *
     * @return void
     *
     * @Route("/login/{account:[a-z]{1,10}}", methods={"POST"})
     */
    public function loginAction($account)
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (is_null($username)) {
            throw new UserException(ErrorCode::AUTH_NOUSERNAME);
        };

        if (is_null($password)) {
            throw new UserException(ErrorCode::AUTH_NOPASSWORD);
        };

        if (!$this->auth->login($account, $username, $password)) {
            throw new UserException(ErrorCode::AUTH_BADLOGIN, 'Failed to login.');
        }

        // Generate jwt authToken for valid user.
        $tokenResponse = $this->auth->getTokenResponse();

        return $this->respondWithArray($tokenResponse, 'data');
    }
}
