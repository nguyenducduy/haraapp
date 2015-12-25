<?php
namespace Core\Controller;

use Engine\Exception\UserException;
use Engine\Constants\ErrorCode;

/**
 * Error handler.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class ErrorController extends AbstractController
{
    /**
     * 404 page.
     *
     * @return void
     */
    public function show404Action()
    {
        throw new UserException(ErrorCode::GENERAL_NOTFOUND, 'Page not found.');
    }

    /**
     * 500 page.
     *
     * @return void
     */
    public function show500Action()
    {
        throw new UserException(ErrorCode::GENERAL_SERVER_ERROR, 'Server internal error.');
    }
}
