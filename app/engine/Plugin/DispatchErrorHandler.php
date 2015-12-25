<?php
namespace Engine\Plugin;

use Engine\Constants\ErrorCode;
use Engine\Exception\UserException;
use Phalcon\Mvc\User\Plugin as PhUserPlugin;

/**
 * Not found plugin.
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class DispatchErrorHandler extends PhUserPlugin
{
    /**
     * Before exception is happening.
     *
     * @param Event            $event      Event object.
     * @param Dispatcher       $dispatcher Dispatcher object.
     * @param PhalconException $exception  Exception object.
     *
     * @throws \Phalcon\Exception
     * @return bool
     */
    public function beforeException($event, $dispatcher, $exception)
    {
        $this->getDI()->get('response')->sendException($exception);

        return $event->isStopped();
    }
}
