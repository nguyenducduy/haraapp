<?php
namespace Core\Model;

use Engine\Db\AbstractModel;

/**
 * App Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_app');
 */
class App extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="a_id")
    */
    public $id;

    /**
    * @Column(type="string", nullable=true, column="a_api_key")
    */
    public $apiKey;

    /**
    * @Column(type="string", nullable=true, column="a_redirect_url")
    */
    public $redirectUrl;

    /**
    * @Column(type="string", nullable=true, column="a_permissions")
    */
    public $permissions;

    /**
    * @Column(type="string", nullable=true, column="a_shared_secret")
    */
    public $sharedSecret;
}
