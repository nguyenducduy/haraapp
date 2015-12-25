<?php

namespace Core\Injection;

use Engine\Injection\AbstractInjection;
use Phalcon\Events\Event as PhEvent;
use Phalcon\Mvc\Dispatcher;

class Fractalinclude extends AbstractInjection
{
    public function beforeExecuteRoute(PhEvent $event, Dispatcher $dispatcher)
    {
        $include = $this->getDI()->get('request')->getQuery('include');

        if (!is_null($include)) {
            $this->getDI()->get('fractal')->parseIncludes($include);
        }
    }
}
