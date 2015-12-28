<?php
namespace Core\Plugin;

use Phalcon\Mvc\User\Component;

/**
 * Helps to build UI elements for the application
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class AdminElements extends Component
{
    private $_leftbar = array(
        'User' => array(
            'controller' => '',
            'action' => '',
            'icon' => '<i class="fa fa-users"></i>',
            'sub-menu' => [
                'Create' => [
                    'controller' => 'admin/user',
                    'action' => 'create',
                    'icon' => '<i class="fa fa-plus"></i>',
                ],
                'Listing' => [
                    'controller' => 'admin/user',
                    'action' => '',
                    'icon' => '<i class="fa fa-user"></i>',
                ]
            ]
        ),
        'Classified' => array(
            'controller' => '',
            'action' => '',
            'icon' => '<i class="fa fa-adn"></i>',
            'sub-menu' => [
                'Category' => [
                    'controller' => 'admin/adscategory',
                    'action' => '',
                    'icon' => 'Ca'
                ],
                'Fieldsets' => [
                    'controller' => 'admin/fieldsets',
                    'action' => '',
                    'icon' => 'Fs'
                ],
                'Ads' => [
                    'controller' => 'admin/ads',
                    'action' => '',
                    'icon' => 'Ad'
                ],
                'Fields' => [
                    'controller' => 'admin/fields',
                    'action' => '',
                    'icon' => 'Fi'
                ],
                'Images' => [
                    'controller' => 'admin/adsimages',
                    'action' => '',
                    'icon' => 'Im'
                ],
                'Slugs' => [
                    'controller' => 'admin/adsslug',
                    'action' => '',
                    'icon' => 'Sl'
                ],
                'Subcribes' => [
                    'controller' => 'admin/adssubcribes',
                    'action' => '',
                    'icon' => 'Su'
                ],
                'Favorites' => [
                    'controller' => 'admin/adsfavorites',
                    'action' => '',
                    'icon' => 'Fa'
                ]
            ]
        )
    );

    /**
     * Returns left sidebar
     */
    public function getSidebar()
    {
        $lang = $this->di->get('lang');
        $controllerName = 'admin/' . strtolower($this->view->getControllerName());
        $actionName = $this->view->getActionName() == 'index' ? '' : $this->view->getActionName();

        foreach ($this->_leftbar as $caption => $option) {
            if ($option['controller'] == '' && $option['action'] == '') {
                echo '<li class="">';
            } else {
                if ($option['controller'] == $controllerName && $option['action'] == $actionName || $option['active'] == true) {
                    echo '<li class="active">';
                } else {
                    echo '<li class="">';
                }
            }

            if ($option['controller'] !== '' && $option['action'] !== '') {
                echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption);
            } else {
                echo '<a href="javascript:;">';
                echo '<span class="title">' . $caption . '</span>';
                echo '<span class=" arrow"></span>';
                echo '</a>';

                if ($option['icon'] !== '') {
                    echo '<span class="icon-thumbnail">' . $option['icon'] . '</span>';
                }
            }
            if (isset($option['sub-menu']) && !empty($option['sub-menu'])) {
                echo '<ul class="sub-menu">';
                foreach ($option['sub-menu'] as $sub_caption => $sub_option) {
                    if ($sub_option['controller'] == '' && $sub_option['action'] == '') {
                        echo '<li class="">';
                    } else {
                        if ($sub_option['controller'] == $controllerName && ($sub_option['action'] == $actionName)) {
                            echo '<li class="active">';
                        } else {
                            echo '<li class="">';
                        }
                    }

                    echo $this->tag->linkTo($sub_option['controller'] . '/' . $sub_option['action'], $sub_caption);
                    if ($sub_option['icon'] !== '') {
                        echo '<span class="icon-thumbnail">' . $sub_option['icon'] . '</span>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
    }
}
