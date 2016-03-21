<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;
use Import\Model\CategoryMap;
use Import\Model\ProductMap;
use Import\Model\ProductLog;

/**
 * Import Home page.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/home", name="import-home-home")
 */
class HomeController extends AbstractAdminController
{
    /**
     * number record on 1 page
     * @var integer
     */
    protected $recordPerPage = 30;

    /**
     * Homepage action.
     *
     * @return void
     *
     * @Route("/", methods={"GET", "POST"}, name="home-index-index")
     */
    public function indexAction()
    {
        $currentUrl = 'home';
        $formData = $jsonData = $error = [];

        // Search keyword in specified field model
        $searchKeywordInData = [
            'title'
        ];
        $page = (int) $this->request->getQuery('page', null, 1);
        $orderBy = (string) $this->request->getQuery('orderby', null, 'id');
        $orderType = (string) $this->request->getQuery('ordertype', null, 'asc');
        $keyword = (string) $this->request->getQuery('keyword', null, '');
        // optional Filter
        $id = (int) $this->request->getQuery('id', null, 0);
        $status = (int) $this->request->getQuery('status', null, 0);
        $datecreated = (int) $this->request->getQuery('datecreated', null, 0);
        $formData['columns'] = '*';
        $formData['conditions'] = [
            'keyword' => $keyword,
            'searchKeywordIn' => $searchKeywordInData,
            'filterBy' => [
                'id' => $id,
                'status' => $status,
                'datecreated' => $datecreated,
            ],
        ];
        $formData['orderBy'] = $orderBy;
        $formData['orderType'] = $orderType;

        $paginateUrl = $currentUrl . '?orderby=' . $formData['orderBy'] . '&ordertype=' . $formData['orderType'];
        if ($formData['conditions']['keyword'] != '') {
            $paginateUrl .= '&keyword=' . $formData['conditions']['keyword'];
        }

        $myProducts = ProductMap::getList($formData, $this->recordPerPage, $page);

        $myCategories = Category::parent_sort(
            Category::find([
                'order' => 'orderno ASC'
            ])->toArray()
        );

        $this->bc->add($this->lang->_('title-home'), 'home');
        $this->bc->add($this->lang->_('title-list-product-map'), '');
        $this->view->setVars([
            'bc' => $this->bc->generate(),
            'myCategories' => $myCategories,
            'formData' => $formData,
            'error' => $error,
            'myProducts' => $myProducts,
            'paginator' => $myProducts,
            'paginateUrl' => $paginateUrl
        ]);
    }

    /**
     * Uninstall app action.
     *
     * @return void
     *
     * @Route("/remove", methods={"GET", "POST"}, name="home-remove-app")
     */
    public function removeAction()
    {
        // Get list of webhook

        // For and delete webhook

        // Remove store in db
        
    }
}
