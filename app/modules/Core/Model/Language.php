<?php
namespace Core\Model;

use Engine\Db\AbstractModel;

/**
 * Language Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_language');
 */
class Language extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="l_id")
    */
    public $id;

    /**
    * @Column(type="string", nullable=true, column="l_code")
    */
    public $code;

    /**
    * @Column(type="string", nullable=true, column="l_name")
    */
    public $name;

    /**
    * @Column(type="integer", nullable=true, column="l_default")
    */
    public $default;

    /**
    * @Column(type="integer", nullable=true, column="l_order_no")
    */
    public $orderno;

    /**
    * @Column(type="integer", nullable=false, column="l_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="l_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="l_datemodified")
    */
    public $datemodified;

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 3;
    const IS_DEFAULT = 1;
    const IS_NOT_DEFAULT = 0;
}
