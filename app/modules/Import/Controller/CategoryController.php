<?php
namespace Import\Controller;

use Core\Controller\AbstractAdminController;
use Core\Model\App as AppModel;
use Core\Model\Store as StoreModel;
use Engine\Helper as EnHelper;
use Import\Model\Category;
use Import\Model\CategoryMap;
use Core\Helper\Utils;

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
        $this->bc->add($this->lang->_('title-list-category'), '');
        $this->view->setVars([
            'bc' => $this->bc->generate(),
            'myCategories' => $myCategories,
            'formData' => $formData,
            'error' => $error
        ]);
    }

    /**
     * Main action.
     *
     * @return void
     *
     * @Route("/update", methods={"GET", "POST"}, name="import-category-update")
     */
    public function updateAction()
    {
        $formData = $jsonData = $error = [];

        if (!empty($this->request->hasPost('fsubmit'))) {
            $success = [];
            $message = "";
            $formData = array_merge($formData, $this->request->getPost());
            $categoryMap = (array) $formData['mapping'];

            foreach ($categoryMap as $haravanId => $itemMap) {
                if ($itemMap['id'] > 0) {
                    $myCategoryMap = CategoryMap::findFirst([
                        'hid = :haravanId: AND sid = :storeId:',
                        'bind' => [
                            'haravanId' => $haravanId,
                            'storeId' => $this->session->get('sid')
                        ]
                    ]);

                    if ($myCategoryMap) {
                        // Update exist category for change
                        if ($myCategoryMap->fid != $itemMap['id']) {
                            $myCategoryMap->fid = $itemMap['id'];
                            $myCategoryMap->fname = $itemMap['name'];
                            $myCategoryMap->status = (int) CategoryMap::STATUS_PENDING;
                            $myCategoryMap->data = "";
                            $myCategoryMap->totalItem = 0;
                            $myCategoryMap->totalItemSync = 0;
                            $myCategoryMap->totalItemQueue = 0;

                            if ($myCategoryMap->update()) {
                                $this->flash->success('Updated category id: ' . $myCategoryMap->hid);
                            } else {
                                $this->flash->error('Failed to update category id: ' . $myCategoryMap->hid);
                            }
                        }
                    } else {
                        // Create new category map record
                        $myCategoryMap = new CategoryMap();
                        $myCategoryMap->sid = (int) $this->session->get('sid');
                        $myCategoryMap->hid = (int) $haravanId;
                        $myCategoryMap->fid = (int) $itemMap['id'];
                        $myCategoryMap->fname = (string) $itemMap['name'];
                        $myCategoryMap->status = (int) CategoryMap::STATUS_PENDING;
                        $myCategoryMap->totalItem = 0;
                        $myCategoryMap->totalItemSync = 0;
                        $myCategoryMap->totalItemQueue = 0;

                        if ($myCategoryMap->create()) {
                            $success[] = $haravanId;
                        } else {
                            foreach ($myCategoryMap->getMessages() as $msg) {
                                $message .= str_replace('###haravanId###', $haravanId, $this->lang->_($msg->getMessage())) . '<br />';
                            }
                        }
                    }
                }
            }

            if (count($success) > 0) {
                $this->flash->success('Categories ' . implode(',', $success) . ' created successfully.');
            } elseif (strlen($message) > 0) {
                $this->flash->error($message);
            }
        }

        $myCategories = Category::parent_sort(
            Category::find([
                'order' => 'orderno ASC'
            ])->toArray()
        );

        $haravanCollections = [];
        $haravanCollections = array_merge($haravanCollections, EnHelper::getInstance('haravan', 'import')->getCollections());
        $haravanCollections = array_merge($haravanCollections, EnHelper::getInstance('haravan', 'import')->getSmartCollections());

        $myCategroyMap = CategoryMap::find([
            'sid = :storeId:',
            'bind' => [
                'storeId' => $this->session->get('sid')
            ]
        ]);

        foreach ($haravanCollections as $haravan) {
            $formData['mapping'][$haravan->id] = Utils::findInListObject($myCategroyMap, $haravan->id);;
        }

        $this->bc->add($this->lang->_('title-home'), 'home');
        $this->bc->add($this->lang->_('title-category-update'), '');
        $this->view->setVars([
            'bc' => $this->bc->generate(),
            'myCategories' => $myCategories,
            'formData' => $formData,
            'error' => $error,
            'collections' => $haravanCollections,
        ]);
    }
}
