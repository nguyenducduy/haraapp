<?php
namespace Import\Model;

use Engine\Db\AbstractModel;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Engine\Behavior\Model\UrlImageable;

/**
 * Five.vn Images Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('fly_images');
 * @SetConnectionService('dbfive');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class Images extends AbstractModel
{
    /**
    * @Column(type="integer", nullable=true, column="a_id")
    */
    public $aid;

    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="i_id")
    */
    public $id;

    /**
    * @Column(type="string", nullable=true, column="i_name")
    */
    public $name;

    /**
     * @Column(type="string", nullable=true, column="i_path")
     */
    public $path;

    /**
    * @Column(type="integer", nullable=true, column="i_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="i_order_no")
    */
    public $orderNo;

    /**
    * @Column(type="integer", nullable=true, column="i_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="i_datemodified")
    */
    public $datemodified;

    /**
    * @Column(type="integer", nullable=true, column="i_dateexpires")
    */
    public $dateexpires;

    public $url;

    const STATUS_ENABLE = 1;

    /**
     * Initialize model
     */
    public function initialize()
    {
        $config = $this->getDI()->get('config');

        $this->path = $config->global->product->directory . date('Y') . '/' . date('m');
        $this->addBehavior(new UrlImageable([
            'urlPath' => $this->url,
            'uploadPath' => $this->path,
            'sanitize' => $config->global->product->sanitize,
            'allowedFormats' => $config->global->product->mimes->toArray(),
            'allowedMinimumSize' => $config->global->product->minsize,
            'allowedMaximunSize' => $config->global->product->maxsize
        ]));
    }
}
