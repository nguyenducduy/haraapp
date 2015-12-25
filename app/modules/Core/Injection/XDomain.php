<?php
namespace Core\Injection;

use Engine\Injection\AbstractInjection;
use Phalcon\DI;
use Phalcon\Events\Event as PhEvent;
use Phalcon\Mvc\Dispatcher;

/**
 * CORS Injection.
 *
 * @category  Core
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class Xdomain extends AbstractInjection
{
    /**
     * Triggered before executing the controller/action method.
     *
     * @param PhalconEvent $event      Event object.
     * @param Dispatcher   $dispatcher Dispatcher object.
     *
     * @return mixed
     */
    public function beforeDispatch(PhEvent $event, Dispatcher $dispatcher)
    {
        $file = $this->getDI()->get('file');
        $router = $this->getDI()->get('router');
        $config = $this->getDI()->get('config');

        // Get endpoint url
        $endpoint = $router->getRewriteUri();

        if ($endpoint == $config->global->xdomain->route) {
            echo str_replace(
                '###hostname###',
                $config->global->baseUrl,
                $file->read($config->global->xdomain->viewPath)
            );
            exit;
        }
    }
}
