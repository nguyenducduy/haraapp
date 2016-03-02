<?php
namespace Core\Model;

use Engine\Db\AbstractModel;

/**
 * Store Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_store');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class Store extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="st_id")
    */
    public $id;

    /**
    * @Column(type="string", nullable=true, column="st_name")
    */
    public $name;

    /**
    * @Column(type="string", nullable=true, column="st_access_token")
    */
    public $accessToken;

    /**
    * @Column(type="integer", nullable=true, column="st_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="st_config")
    */
    public $config;

    /**
    * @Column(type="integer", nullable=true, column="st_mapped")
    */
    public $mapped;

    /**
    * @Column(type="integer", nullable=true, column="st_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="st_datemodified")
    */
    public $datemodified;

    const INSTALLED = 1;
    const NOT_INSTALLED = 0;
    const MAPPED = 1;
    const NOT_MAPPED = 0;
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 3;
    const STATUS_NEW = 5;
}
