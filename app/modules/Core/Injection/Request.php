<?php
namespace Core\Injection;

use Engine\Injection\AbstractInjection;
use Phalcon\Events\Event as PhEvent;
use Phalcon\Mvc\Dispatcher;

class Request extends AbstractInjection
{
    /**
     * Triggered before executing the controller/action method.
     *
     * @param PhalconEvent $event      Event object.
     * @param Dispatcher   $dispatcher Dispatcher object.
     *
     * @return mixed
     */
    public function beforeExecuteRoute(PhEvent $event, Dispatcher $dispatcher)
    {
        // OPTIONS have no body, send the headers, exit
        if ($this->getDI()->get('request')->getMethod() == 'OPTIONS') {

            $this->getDI()->get('response')->send([
                'result' => 'OK',
            ]);
            exit;
        }
    }
}
