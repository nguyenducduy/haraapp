<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/**
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 **/

return array(
    /*
     *js resource
     */
    'jsCoreAdmin' => [
        '../plugins/pace/pace.min.js',
        '../plugins/modernizr.custom.js',
        '../plugins/jquery/jquery-easy.js',
        '../plugins/jquery-unveil/jquery.unveil.min.js',
        '../plugins/jquery-bez/jquery.bez.min.js',
        '../plugins/jquery-ios-list/jquery.ioslist.min.js',
        '../plugins/imagesloaded/imagesloaded.pkgd.min.js',
        '../plugins/jquery-actual/jquery.actual.min.js',
        '../plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        '../plugins/bootstrap-select2/select2.min.js',
        '../plugins/jquery-datatable/media/js/jquery.dataTables.min.js',
        '../plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js',
        '../plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js',
        '../plugins/datatables-responsive/js/datatables.responsive.js',
        '../plugins/datatables-responsive/js/lodash.min.js',
        '../plugins/classie/classie.js',
        '../plugins/dropzone/dropzone.min.js',
        '../plugins/jquery-toastr/toastr.min.js',
        '../plugins/sweetalert/dist/sweetalert.min.js',
        '../assets/js/core/pages.js',
        '../assets/js/core/tables.js',
        '../assets/js/core/form_elements.js',
        '../assets/js/core/scripts.js',
    ],
    'jsUserAdmin' => [
        '../assets/js/user/admin-main.js',
    ],
    'jsCategoryAdmin' => [
        '../plugins/jquery-nestable/jquery.nestable.min.js',
        '../assets/js/category/ads-admin-nestables.js',
    ],
    'jsCoreIframe' => [
        '../plugins/pace/pace.min.js',
        '../plugins/modernizr.custom.js',
        '../plugins/jquery/jquery-easy.js',
        '../plugins/jquery-unveil/jquery.unveil.min.js',
        '../plugins/jquery-bez/jquery.bez.min.js',
        '../plugins/jquery-ios-list/jquery.ioslist.min.js',
        '../plugins/imagesloaded/imagesloaded.pkgd.min.js',
        '../plugins/jquery-actual/jquery.actual.min.js',
        '../plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        '../plugins/bootstrap-select2/select2.min.js',
        '../plugins/classie/classie.js',
        '../plugins/jquery-toastr/toastr.min.js',
        '../plugins/sweetalert/dist/sweetalert.min.js',
        '../plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js',
        '../assets/js/core/pages.js',
        '../assets/js/core/form_elements.js',
        '../assets/js/core/form_wizard.js',
        '../assets/js/core/scripts.js',
    ],
    /**
     * css resource
     */
    'cssCoreAdmin' => [
        '../plugins/pace/pace-theme-flash.css',
        '../plugins/font-awesome/css/font-awesome.css',
        '../plugins/jquery-scrollbar/jquery.scrollbar.css',
        '../plugins/bootstrap-select2/select2.css',
        '../plugins/switchery/css/switchery.min.css',
        '../plugins/jquery-nestable/jquery.nestable.min.css',
        '../plugins/jquery-datatable/media/css/jquery.dataTables.css',
        '../plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css',
        '../plugins/datatables-responsive/css/datatables.responsive.css',
        '../plugins/dropzone/css/dropzone.css',
        '../plugins/jquery-toastr/toastr.min.css',
        '../plugins/sweetalert/dist/sweetalert.css',
        '../assets/css/core/pages-icons.css',
        '../assets/css/core/pages.css',
        '../assets/css/core/style.css',
    ],
    'cssUserAdmin' => [
        '../assets/css/user/admin-style.css',
    ],
    'cssCategoryAdmin' => [
        '../assets/css/category/ads-admin-style.css',
    ],
    'cssCoreIframe' => [
        '../plugins/pace/pace-theme-flash.css',
        '../plugins/font-awesome/css/font-awesome.css',
        '../plugins/jquery-scrollbar/jquery.scrollbar.css',
        '../plugins/bootstrap-select2/select2.css',
        '../plugins/switchery/css/switchery.min.css',
        '../plugins/jquery-toastr/toastr.min.css',
        '../plugins/sweetalert/dist/sweetalert.css',
        '../assets/css/core/pages-icons.css',
        '../assets/css/core/pages.css',
        '../assets/css/core/style.css',
    ],
);
