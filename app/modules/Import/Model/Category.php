<?php
namespace Import\Model;

use Engine\Db\AbstractModel;

/**
 * Five Category Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('fly_categories');
 * @SetConnectionService('dbfive');
 */
class Category extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="c_id")
    */
    public $id;

    /**
    * @Column(type="integer", nullable=true, column="fs_id")
    */
    public $fsid;

    /**
    * @Column(type="integer", nullable=true, column="c_name")
    */
    public $name;

    /**
    * @Column(type="string", nullable=true, column="c_description")
    */
    public $description;

    /**
    * @Column(type="string", nullable=true, column="c_slug")
    */
    public $slug;

    /**
    * @Column(type="string", nullable=true, column="c_iconpath")
    */
    public $iconpath;

    /**
    * @Column(type="string", nullable=true, column="c_socialimage")
    */
    public $socialimage;

    /**
    * @Column(type="integer", nullable=true, column="c_parent")
    */
    public $parent;

    /**
    * @Column(type="integer", nullable=true, column="c_order_no")
    */
    public $orderno;

    /**
    * @Column(type="integer", nullable=true, column="c_level")
    */
    public $level;

    /**
    * @Column(type="string", nullable=true, column="c_path")
    */
    public $path;

     /**
    * @Column(type="integer", nullable=true, column="c_countads")
    */
    public $countads;

    /**
    * @Column(type="integer", nullable=true, column="c_status")
    */
    public $status;

    /**
    * @Column(type="string", nullable=true, column="c_seodescription")
    */
    public $seodescription;

    /**
    * @Column(type="string", nullable=true, column="c_seokeyword")
    */
    public $seokeyword;

    /**
    * @Column(type="integer", nullable=true, column="c_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="c_datemodified")
    */
    public $datemodified;

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 3;

    public static function parent_sort(array $array, array &$result=array(), $parent=0)
    {
        foreach ($array as $key => $item) {
            if ($item['parent'] == $parent) {
                array_push($result, $item);
                unset($array[$key]);
                self::parent_sort($array, $result, $item['id']);
            }
        }
        return $result;
    }
}
