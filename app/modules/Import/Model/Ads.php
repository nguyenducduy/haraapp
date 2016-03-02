<?php
namespace Import\Model;

use Engine\Db\AbstractModel;
use Phalcon\Mvc\Model\Validator\PresenceOf;

/**
 * Five.vn Ads Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('fly_ads');
 * @SetConnectionService('dbfive');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class Ads extends AbstractModel
{
    /**
    * @Column(type="integer", nullable=true, column="u_id")
    */
    public $uid;

    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="a_id")
    */
    public $id;

    /**
    * @Column(type="string", nullable=true, column="u_udid")
    */
    public $udid;

    /**
     * @Column(type="integer", nullable=true, column="r_id")
     */
    public $rid;

    /**
    * @Column(type="integer", nullable=true, column="c_id")
    */
    public $cid;

    /**
    * @Column(type="string", nullable=true, column="a_title")
    */
    public $title;

    /**
    * @Column(type="string", nullable=true, column="a_image")
    */
    public $image;

    /**
    * @Column(type="string", nullable=true, column="a_slug")
    */
    public $slug;

    /**
    * @Column(type="string", nullable=true, column="a_description")
    */
    public $description;

    /**
    * @Column(type="string", nullable=true, column="a_price")
    */
    public $price;

    /**
    * @Column(type="integer", nullable=true, column="a_instock")
    */
    public $instock;

    /**
    * @Column(type="integer", nullable=true, column="a_cityid")
    */
    public $cityid;

    /**
    * @Column(type="integer", nullable=true, column="a_districtid")
    */
    public $districtid;

    /**
    * @Column(type="string", nullable=true, column="a_contactname")
    */
    public $contactname;

    /**
    * @Column(type="string", nullable=true, column="a_contactemail")
    */
    public $contactemail;

    /**
    * @Column(type="string", nullable=true, column="a_contactphone")
    */
    public $contactphone;

    /**
    * @Column(type="string", nullable=true, column="a_contactaddress")
    */
    public $contactaddress;

    /**
    * @Column(type="integer", nullable=true, column="a_countview")
    */
    public $countview;

    /**
    * @Column(type="integer", nullable=true, column="a_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="a_countfavorite")
    */
    public $countfavorite;

    /**
    * @Column(type="integer", nullable=true, column="a_countupdate")
    */
    public $countupdate;

    /**
    * @Column(type="integer", nullable=true, column="a_countclickcall")
    */
    public $countclickcall;

    /**
    * @Column(type="integer", nullable=true, column="a_countclicksms")
    */
    public $countclicksms;

    /**
    * @Column(type="integer", nullable=true, column="a_countclickchat")
    */
    public $countclickchat;

    /**
    * @Column(type="integer", nullable=true, column="a_countimpresstion")
    */
    public $countimpresstion;

    /**
    * @Column(type="integer", nullable=true, column="a_lastclickevent")
    */
    public $lastclickevent;

    /**
    * @Column(type="integer", nullable=true, column="a_priority")
    */
    public $priority;

    /**
    * @Column(type="integer", nullable=true, column="a_isdeleted")
    */
    public $isdeleted;

    /**
    * @Column(type="string", nullable=true, column="a_ipaddress")
    */
    public $ipaddress;

    /**
    * @Column(type="string", nullable=true, column="a_lat")
    */
    public $lat;

    /**
    * @Column(type="string", nullable=true, column="a_long")
    */
    public $long;

    /**
    * @Column(type="integer", nullable=true, column="a_zoom")
    */
    public $zoom;

    /**
    * @Column(type="string", nullable=true, column="a_seotitle")
    */
    public $seotitle;

    /**
    * @Column(type="string", nullable=true, column="a_seokeyword")
    */
    public $seokeyword;

    /**
    * @Column(type="string", nullable=true, column="a_seodescription")
    */
    public $seodescription;

    /**
    * @Column(type="integer", nullable=true, column="a_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="a_datemodified")
    */
    public $datemodified;

    /**
    * @Column(type="integer", nullable=true, column="a_dateexpired")
    */
    public $dateexpired;

	/**
    * @Column(type="integer", nullable=true, column="a_last_post_date")
    */
    public $lastpostdate;

    const STATUS_ENABLE = 1; // đã duyệt
    const STATUS_CONFIRM = 2; // chờ duyệt
    const STATUS_DISABLE = 3; //hủy
    const STATUS_REJECT = 5; // reject
    const IS_DELETED = 1;
    const SOLD_SELL = 1;
    const SOLD_BUY = 3;

}
