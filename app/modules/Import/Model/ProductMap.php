<?php
namespace Import\Model;

use Engine\Db\AbstractModel;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Import\Model\Category;

/**
 * Product Map Model.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @Source('ph_product_map');
 * @Behavior('\Engine\Behavior\Model\Timestampable');
 */
class ProductMap extends AbstractModel
{
    /**
    * @Primary
    * @Identity
    * @Column(type="integer", nullable=false, column="pm_id")
    */
    public $id;

    /**
    * @Column(type="integer", nullable=true, column="s_id")
    */
    public $sid;

    /**
    * @Column(type="integer", nullable=true, column="u_id")
    */
    public $uid;

    /**
    * @Column(type="integer", nullable=true, column="h_id")
    */
    public $hid;

    /**
    * @Column(type="integer", nullable=true, column="a_id")
    */
    public $aid;

    /**
    * @Column(type="integer", nullable=true, column="c_id")
    */
    public $cid;

    /**
    * @Column(type="string", nullable=true, column="pm_title")
    */
    public $title;

    /**
    * @Column(type="integer", nullable=true, column="pm_price")
    */
    public $price;

    /**
    * @Column(type="string", nullable=true, column="pm_image")
    */
    public $image;

    /**
    * @Column(type="string", nullable=true, column="pm_slug")
    */
    public $slug;

    /**
    * @Column(type="integer", nullable=true, column="pm_status")
    */
    public $status;

    /**
    * @Column(type="integer", nullable=true, column="pm_datecreated")
    */
    public $datecreated;

    /**
    * @Column(type="integer", nullable=true, column="pm_datemodified")
    */
    public $datemodified;

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 3;

    /**
     * Form field validation
     */
    public function validation()
    {
        $this->validate(new PresenceOf(
            [
                'field'  => 'title',
                'message' => 'product-message-title-notempty'
            ]
        ));

        $this->validate(new PresenceOf(
            [
                'field'  => 'hid',
                'message' => 'product-message-hid-notempty'
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

    /**
     * Create Paginator Object for products Listing
     *
     * @param  [array] $formData    Store condition, order, select column to prepare for query
     * @param  [int] $limit         Record per page
     * @param  [int] $offset        Current Page
     * @return [object] $paginator  Phalcon Paginator Builder Object
     */
    public static function getList($formData, $limit, $offset)
    {
        $modelName = get_class();
        $whereString = '';
        $bindParams = [];
        $bindTypeParams = [];

        if (is_array($formData['conditions'])) {
            if (isset($formData['conditions']['keyword'])
                && strlen($formData['conditions']['keyword']) > 0
                && isset($formData['conditions']['searchKeywordIn'])
                && count($formData['conditions']['searchKeywordIn']) > 0) {
                /**
                 * Search keyword
                 */
                $searchKeyword = $formData['conditions']['keyword'];
                $searchKeywordIn = $formData['conditions']['searchKeywordIn'];

                $whereString .= $whereString != '' ? ' OR ' : ' (';

                $sp = '';
                foreach ($searchKeywordIn as $searchIn) {
                    $sp .= ($sp != '' ? ' OR ' : '') . $searchIn . ' LIKE :searchKeyword:';
                }

                $whereString .= $sp . ')';
                $bindParams['searchKeyword'] = '%' . $searchKeyword . '%';
            }

            /**
             * Optional Filter by tags
             */
            if (count($formData['conditions']['filterBy']) > 0) {
                $filterby = $formData['conditions']['filterBy'];

                foreach ($filterby as $k => $v) {
                    if ($v) {
                        $whereString .= ($whereString != '' ? ' AND ' : '') . $k . ' = :' . $k . ':';
                        $bindParams[$k] = $v;

                        switch (gettype($v)) {
                            case 'string':
                                $bindTypeParams[$k] =  \PDO::PARAM_STR;
                                break;

                            default:
                                $bindTypeParams[$k] = \PDO::PARAM_INT;
                                break;
                        }
                    }
                }
            }

            if (strlen($whereString) > 0 && count($bindParams) > 0) {
                $formData['conditions'] = [
                    [
                        $whereString,
                        $bindParams,
                        $bindTypeParams
                    ]
                ];
            } else {
                $formData['conditions'] = '';
            }
        }

        $params = [
            'models' => $modelName,
            'columns' => $formData['columns'],
            'conditions' => $formData['conditions'],
            'order' => [$modelName . '.' . $formData['orderBy'] .' '. $formData['orderType'] .'']
        ];

        return parent::runPaginate($params, $limit, $offset);
    }

    public function getStatusName()
    {
        $name = '';

        switch ($this->status) {
            case self::STATUS_ENABLE:
                $name = 'label-status-enable';
                break;
            case self::STATUS_DISABLE:
                $name = 'label-status-disable';
                break;
        }

        return $name;
    }

    public static function getStatusList()
    {
        return $data = [
            [
                "name" => 'label-status-enable',
                "value" => self::STATUS_ENABLE
            ],
            [
                "name" => 'label-status-disable',
                "value" => self::STATUS_DISABLE
            ],
        ];
    }

    public static function getStatusListArray()
    {
        return [
            self::STATUS_ENABLE,
            self::STATUS_DISABLE,

        ];
    }

    /**
     * Get thumbnail image image
     * @return [string] Images thumb url.
     */
    public function getThumbnailImage()
    {
        $pos = strrpos($this->image, '.');
        $extPart = substr($this->image, $pos+1) != '' ? substr($this->image, $pos+1) : 'jpeg';
        $namePart =  substr($this->image,0, $pos);
        $file = $namePart . '-thumb.' . $extPart;

        return $file;
    }

    /**
     * Get medium image image
     * @return [string] Images medium url.
     */
    public function getMediumImage()
    {
        $pos = strrpos($this->image, '.');
        $extPart = substr($this->image, $pos+1) != '' ? substr($this->image, $pos+1) : 'jpeg';
        $namePart =  substr($this->image,0, $pos);
        $file = $namePart . '-medium.' . $extPart;

        return $file;
    }

    /**
     * Get label style for status
     */
    public function getStatusStyle()
    {
        $class = '';
        switch ($this->status) {
            case self::STATUS_ENABLE:
                $class = 'label label-info';
                break;
            case self::STATUS_DISABLE:
                $class = 'label label-important';
                break;
        }

        return $class;
    }

    public function getCategoryIdAndName()
    {
        $output = [];

        $myCategory = Category::findFirst([
            'id = :cid:',
            'bind' => [
                'cid' => $this->cid
            ]
        ]);

        if ($myCategory) {
            $output['id'] = $myCategory->id;
            $output['name'] = $myCategory->name;
            $output['parent'] = $myCategory->parent;
        }

        return $output;
    }
}
