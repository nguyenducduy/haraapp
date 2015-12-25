<?php
namespace Core\Controller;

use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Phalcon\Mvc\Controller as PhController;

/**
 * Abstract Sitse controller.
 *
 * @category  Core
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
abstract class AbstractController extends PhController
{
    /**
     * Initializes the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $di = $this->getDI();

        if ($di->has('profiler')) {
            $this->profiler->start();
        }
    }

    public function onConstruct()
    {
        $this->fractal = $this->getDI()->get('fractal');
    }

    public function respondWithArray($array, $key)
    {
        $response = [$key => $array];

        return $this->onResponse($response);
    }

    public function respondWithOK()
    {
        $response = ['result' => 'OK'];

        return $this->onResponse($response);
    }

    public function createItemWithOK($item, $callback, $resource_key)
    {
        $response = $this->createItem($item, $callback, $resource_key);
        $response['result'] = 'OK';

        return $this->onResponse($response);
    }

    public function createItem($item, $callback, $resource_key, $meta = [])
    {
        $resource = new Item($item, $callback, $resource_key);
        $data = $this->fractal->createData($resource)->toArray();
        $response = array_merge($data, $meta);

        return $this->onResponse($response);
    }

    public function createCollection($collection, $callback, $resource_key, $meta = [])
    {
        $resource = new Collection($collection, $callback, $resource_key);
        $data = $this->fractal->createData($resource)->toArray();
        $response = array_merge($data, $meta);

        return $this->onResponse($response);
    }

    public function onResponse($response)
    {
        return $response;
    }

    public function afterExecuteRoute()
    {
       if ($this->di->has('profiler')) {
           $this->profiler->stop(get_called_class(), 'controller');
       }
    }

    /**
     * get Current URL
     */
    public function getCurrentUrl()
    {
        $dispatcher = $this->getDI()->getDispatcher();
        $controllerName = strtolower($dispatcher->getControllerName());
        $moduleName = $dispatcher->getModuleName();
        $actionName = $dispatcher->getActionName();
        $url = $controllerName . '/' . $moduleName . '/' . $actionName;

        return str_replace('/index', '', $url);
    }

    /**
     * Redirect URL
     */
    public function redirect($url)
    {
        return $this->di->get('response')->redirect($url);
    }
}
