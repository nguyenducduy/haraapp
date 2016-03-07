<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;
use Import\Model\CategoryMap;

/**
 * Category Home page.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 *
 * @RoutePrefix("/category", name="category-site-home")
 */
class CategoryController extends AbstractAdminController
{
    /**
     * number record on 1 page
     * @var integer
     */
    protected $recordPerPage = 30;

    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/", methods={"GET", "POST"}, name="import-category-index")
     */
    public function indexAction()
    {
        $formData = $jsonData = $error = [];

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
            'error' => $error
        ]);
    }
}
