<?php
namespace Core\Injection;

use Engine\Injection\AbstractInjection;
use Phalcon\Events\Event as PhEvent;
use Phalcon\Mvc\Dispatcher;

class Response extends AbstractInjection
{
    /**
     * Triggered before executing the controller/action method.
     *
     * @param PhalconEvent $event      Event object.
     * @param Dispatcher   $dispatcher Dispatcher object.
     *
     * @return mixed
     */
    public function afterExecuteRoute(PhEvent $event, Dispatcher $dispatcher)
    {
        $this->getDI()->get('response')->send($dispatcher->getReturnedValue());
        exit;
    }
}
