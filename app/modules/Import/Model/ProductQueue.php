<?php
namespace Import\Model;

use Engine\Db\AbstractModel;
use Phalcon\Mvc\Model\Validator\PresenceOf;

/**
 * Product Queue Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_product_queue');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class ProductQueue extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="pq_id")
    */
    public $id;

    /**
    * @Column(type="integer", nullable=true, column="p_id")
    */
    public $pid; //Haravan product ID

    /**
    * @Column(type="integer", nullable=true, column="s_id")
    */
    public $sid; //Store ID

    /**
    * @Column(type="string", nullable=true, column="p_data")
    */
    public $pdata; //Haravan product DATA (json type)

    /**
    * @Column(type="integer", nullable=true, column="f_id")
    */
    public $fid; //Five ads ID

    /**
    * @Column(type="integer", nullable=true, column="fc_id")
    */
    public $fcid; //Five category ID

    /**
    * @Column(type="integer", nullable=true, column="pq_retry_count")
    */
    public $retryCount;

    /**
    * @Column(type="integer", nullable=true, column="pq_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="pq_priority")
    */
    public $priority; //Queue priority

    /**
    * @Column(type="integer", nullable=true, column="pq_datecreated")
    */
    public $datecreated;

    const STATUS_SUCCESS = 1;
    const STATUS_QUEUE = 3;
    const STATUS_FAILED = 5;
}
