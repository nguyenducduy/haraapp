<?php
namespace Import\Model;

use Engine\Db\AbstractModel;
use Phalcon\Mvc\Model\Validator\PresenceOf;

/**
 * Product Log Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_product_log');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class ProductLog extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="pl_id")
    */
    public $id;

    /**
    * @Column(type="integer", nullable=true, column="s_id")
    */
    public $sid;

    /**
    * @Column(type="string", nullable=true, column="pl_message")
    */
    public $message;

    /**
    * @Column(type="string", nullable=true, column="pl_class")
    */
    public $class;

    /**
    * @Column(type="integer", nullable=true, column="pl_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="pl_type")
    */
    public $type;

    /**
    * @Column(type="integer", nullable=true, column="pl_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="pl_datemodified")
    */
    public $datemodified;

    const STATUS_SUCCESS = 5;
    const STATUS_FAILED = 3;

    const TYPE_IMPORT = 1;
}
