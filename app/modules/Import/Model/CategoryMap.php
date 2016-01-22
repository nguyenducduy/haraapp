<?php
namespace Import\Model;

use Engine\Db\AbstractModel;
use Phalcon\Mvc\Model\Validator\PresenceOf;

/**
 * Category Map Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_category_map');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class CategoryMap extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="h_id")
    */
    public $hid;

    /**
    * @Column(type="integer", nullable=true, column="s_id")
    */
    public $sid;

    /**
    * @Column(type="integer", nullable=true, column="f_id")
    */
    public $fid;

    /**
    * @Column(type="string", nullable=true, column="f_name")
    */
    public $fname;

    /**
    * @Column(type="integer", nullable=true, column="cm_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="cm_total_item")
    */
    public $totalItem;

    /**
    * @Column(type="integer", nullable=true, column="cm_total_item_sync")
    */
    public $totalItemSync;

    /**
    * @Column(type="integer", nullable=true, column="cm_total_item_queue")
    */
    public $totalItemQueue;

    /**
    * @Column(type="integer", nullable=true, column="cm_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="cm_datemodified")
    */
    public $datemodified;

    const STATUS_PENDING = 5;
    const STATUS_COMPLETED = 1;
    const STATUS_FAILED = 3;

    /**
     * Form field validation
     */
    public function validation()
    {
        $this->validate(new PresenceOf(
            [
                'field'  => 'fname',
                'message' => 'message-name-notempty'
            ]
        ));

        $this->validate(new PresenceOf(
            [
                'field'  => 'fid',
                'message' => 'message-fid-notempty'
            ]
        ));

        $this->validate(new PresenceOf(
            [
                'field'  => 'status',
                'message' => 'message-status-notempty'
            ]
        ));

        return $this->validationHasFailed() != true;
    }
}
