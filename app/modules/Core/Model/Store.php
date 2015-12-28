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
}
