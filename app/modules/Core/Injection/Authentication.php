<?php
namespace Core\Injection;

use Engine\Injection\AbstractInjection;
use Phalcon\DI;
use Phalcon\Events\Event as PhEvent;
use Phalcon\Mvc\Dispatcher;

/**
 * Request authentication Injection.
 *
 * @category  Core
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class Authentication extends AbstractInjection
{
    /**
     * This action is executed before execute any action in the application.
     *
     * @param PhalconEvent $event      Event object.
     * @param Dispatcher   $dispatcher Dispatcher object.
     *
     * @return mixed
     */
    public function beforeDispatch(PhEvent $event, Dispatcher $dispatcher)
    {
        $request = $this->getDI()->get('request');
        $authManager = $this->getDI()->get('auth');

        $token = $request->getToken();

        if ($token) {
            $authManager->authenticateToken($token);
        }
    }
}
