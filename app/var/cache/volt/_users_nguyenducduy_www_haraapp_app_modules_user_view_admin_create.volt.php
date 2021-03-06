<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>
    <?php echo $this->lang->query('page-title-create'); ?> | <?php echo $this->config->global->title; ?>
</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->getStatic('favicon.ico'); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo $this->url->getStatic('favicon.ico'); ?>">
        <!-- BEGIN Pages CSS-->
        <link href="<?php echo $this->url->getStatic('plugins/boostrapv3/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo $this->url->getStatic('min/index.php?g=cssCoreAdmin&rev=' . $this->config->global->version->css); ?>" rel="stylesheet" type="text/css">
        
    <link href="<?php echo $this->url->getStatic('min/index.php?g=cssUserAdmin&rev=' . $this->config->global->version->css); ?>" rel="stylesheet" type="text/css">

        <!--[if lte IE 9]>
            <link href="<?php echo $this->url->getStatic('plugins/admin-fix/ie9.css'); ?>" rel="stylesheet" type="text/css" />
        <![endif]-->
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/jquery/jquery-1.11.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript">
            var root_url = "<?php echo $this->url->getBaseUri(); ?>admin";
            window.onload = function() {
                // fix for windows 8
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('plugins/admin-fix/windows.chrome.fix.css'); ?>" />'
            }
        </script>
    </head>
    <body class="fixed-header menu-pin">
        

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
    <div id="appMenu" class="sidebar-overlay-slide from-top">
    </div>
    <!-- BEGIN SIDEBAR HEADER -->
    <div class="sidebar-header">
        
        <div class="sidebar-header-controls">
            <button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR HEADER -->
    <!-- BEGIN SIDEBAR MENU -->
    <div class="sidebar-menu">
        <ul class="menu-items">
            <li class="m-t-30">
                <a href="#" class="detailed">
                    <span class="title">dashboard</span>
                    <span class="details">234 notifications</span>
                </a>
                <span class="icon-thumbnail "><i class="fa fa-dashboard"></i></span>
            </li>
            <?php echo $this->elements->getSidebar(); ?>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->


        <!-- START PAGE-CONTAINER -->
        <div class="page-container">
            <!-- START PAGE HEADER WRAPPER -->
<!-- START HEADER -->
<div class="header ">
    <!-- START MOBILE CONTROLS -->
    <!-- LEFT SIDE -->
    <div class="pull-left full-height visible-sm visible-xs">
        <!-- START ACTION BAR -->
        <div class="sm-action-bar">
            <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
            </a>
        </div>
        <!-- END ACTION BAR -->
    </div>
    <!-- RIGHT SIDE -->
    <div class="pull-right full-height visible-sm visible-xs">
        <!-- START ACTION BAR -->
        <div class="sm-action-bar">
            <a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
                <span class="icon-set menu-hambuger-plus"></span>
            </a>
        </div>
        <!-- END ACTION BAR -->
    </div>
    <!-- END MOBILE CONTROLS -->
    <div class=" pull-left sm-table">
        <div class="header-inner">
            <div class="brand inline">
                
            </div>
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
                <li class="p-r-15 inline">
                    <div class="dropdown">
                        <a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
                            <span class="bubble"></span>
                        </a>
                        <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                            <div class="notification-panel">
                                <!-- START Notification Body-->
                                <div class="notification-body scrollable">
                                    <!-- START Notification Item-->
                                    <div class="notification-item  clearfix">
                                        <div class="heading">
                                            <a href="#" class="text-danger">
                                                <i class="fa fa-exclamation-triangle m-r-10"></i>
                                                <span class="bold">98% Server Load</span>
                                                <span class="fs-12 m-l-10">Take Action</span>
                                            </a>
                                            <span class="pull-right time">2 mins ago</span>
                                        </div>
                                        <div class="option">
                                            <a href="#" class="mark"></a>
                                        </div>
                                    </div>
                                    <!-- END Notification Item-->
                                </div>
                                <!-- END Notification Body-->
                                <!-- START Notification Footer-->
                                <div class="notification-footer text-center">
                                    <a href="#" class="">Read all notifications</a>
                                    <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                        <i class="pg-refresh_new"></i>
                                    </a>
                                </div>
                                <!-- END Notification Footer-->
                            </div>
                        </div>
                    </div>
                </li>
                <li class="p-r-15 inline">
                    <a href="#" class="icon-set clip "></a>
                </li>
                <li class="p-r-15 inline">
                    <a href="#" class="icon-set grid-box"></a>
                </li>
            </ul>
            <!-- END NOTIFICATION DROPDOWN -->
            <a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>
        </div>
    </div>
    <div class=" pull-right">
        <div class="header-inner">
            <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
        </div>
    </div>
    <div class=" pull-right">
        <!-- START User Info-->
        <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                <span class="semi-bold">David</span> <span class="text-master">Nest</span>
            </div>
            <div class="dropdown pull-right">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                    
                </span>
                </button>
                <ul class="dropdown-menu profile-dropdown" role="menu">
                    <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
                </li>
                <li><a href="#"><i class="pg-outdent"></i> Feedback</a>
            </li>
            <li><a href="#"><i class="pg-signals"></i> Help</a>
        </li>
        <li class="bg-master-lighter">
            <a href="#" class="clearfix">
                <span class="pull-left">Logout</span>
                <span class="pull-right"><i class="pg-power"></i></span>
            </a>
        </li>
    </ul>
</div>
</div>
<!-- END User Info-->
</div>
</div>
<!-- END HEADER -->
<!-- END PAGE HEADER WRAPPER -->
            <!-- START PAGE CONTENT WRAPPER -->
            <div class="page-content-wrapper">
                <!-- START PAGE CONTENT -->
                <div class="content">
                <div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg">
        <div class="inner">
            <?php if (isset($bc)) { ?>
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <?php foreach ($bc as $b) { ?>
                    <?php if (($b['active'])) { ?>
                        <li><a href="javascript:void(0)" class="active"><?php echo $b['text']; ?></a></li>
                    <?php } else { ?>
                        <li>
                            <p><a href="<?php echo $b['link']; ?>"><?php echo $b['text']; ?></a></p>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <!-- END BREADCRUMB -->
            <?php } ?>
            <?php if (isset($jumpbotron)) { ?>
            <div class="row">
                <div class="col-lg-7 col-md-6 ">
                    <!-- START PANEL -->
                    <div class="full-height">
                        <div class="panel-body text-center">
                            
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
                <div class="col-lg-5 col-md-6 ">
                    <!-- START PANEL -->
                    <div class="panel panel-transparent">
                        <div class="panel-body">
                            <h3 class="">
                            Nestables
                            </h3>
                            <p>This is powered by the JQuery nestable plugin, we have customized it to suite the design scheme and color pallete
                            </p>
                            <br>
                            <div class="col-sm-12 no-padding">
                                <a href="http://dbushell.github.io/Nestable/" target="_blank" class="btn btn-complete">See Plugin</a>
                                <p class="small hinted-text inline p-l-10 no-margin col-middle">
                                    http://dbushell.github.io/Nestable/
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
                
<form
    class="form-horizontal"
    role="form"
    method="post"
    action="">
    <input
        type="hidden"
        name="<?php echo $this->security->getTokenKey(); ?>"
        value="<?php echo $this->security->getToken(); ?>" />
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="panel panel-transparent">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                        <?php echo $this->getContent(); ?>
                            <label class="col-sm-3 control-label">
                                <?php echo $this->lang->query('form.name'); ?>
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder=""
                                    name="name"
                                    value="<?php if (isset($formData['name'])) { ?><?php echo $formData['name']; ?><?php } ?>"
                                     />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo $this->lang->query('form.email'); ?>
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder=""
                                    name="email"
                                    value="<?php if (isset($formData['email'])) { ?><?php echo $formData['email']; ?><?php } ?>"
                                     />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo $this->lang->query('form.password'); ?>
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder=""
                                    name="password"
                                    value="<?php if (isset($formData['password'])) { ?><?php echo $formData['password']; ?><?php } ?>"
                                     />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo $this->lang->query('form.status'); ?>
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select
                                    class="cs-select cs-skin-slide"
                                    data-init-plugin="cs-select"
                                    name="status">
                                    <?php foreach ($statusList as $status) { ?>
                                    <option
                                        value="<?php echo $status['value']; ?>"
                                        <?php if (isset($formData['status']) && $formData['status'] == $status['value']) { ?>
                                            selected="selected"
                                        <?php } ?>>
                                        <?php echo $this->lang->query($status['name']); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo $this->lang->query('form.role'); ?>
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select
                                    class="cs-select cs-skin-slide"
                                    data-init-plugin="cs-select"
                                    name="role">
                                    <?php foreach ($roleList as $name => $value) { ?>
                                    <option
                                        value="<?php echo $value; ?>"
                                        <?php if (isset($formData['role']) && $formData['role'] == $value) { ?>
                                            selected="selected"
                                        <?php } ?>>
                                        <?php echo $name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid container-fixed-lg">
        <div class="panel panel-transparent">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo $this->lang->query('form.avatar'); ?></label>
                            <div class="col-sm-9">
                                <div id="uploadAvatar" class="dropzone" style="min-height: 240px"></div>
                                <input
                                    type="hidden"
                                    name="avatar"
                                    value="<?php if (isset($formData['avatar'])) { ?><?php echo $formData['avatar']; ?><?php } ?>"
                                    id="uploadAvatarInput"/>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-3">
                            <span class="required">*</span>: Required field
                            </div>
                            <div class="col-sm-9">
                                <button class="btn btn-success" type="submit" name="fsubmit"><?php echo $this->lang->query('form.button-submit'); ?></button>
                                <button class="btn btn-default" type="reset"><i class="pg-close"></i> <?php echo $this->lang->query('form.button-clear'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                </div>
                <!-- END PAGE CONTENT -->
                <!-- START FOOTER -->
<div class="container-fluid container-fixed-lg footer">
    <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
            <span class="hint-text">Copyright © 2014</span>
            <span class="font-montserrat">REVOX</span>.
            <span class="hint-text">All rights reserved.</span>
            <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a>
        </span>
    </p>
    <p class="small no-margin pull-right sm-pull-reset">
        <a href="#">Hand-crafted</a>
        <span class="hint-text">&amp; Made with Love ®</span>
    </p>
    <div class="clearfix"></div>
</div>
</div>
<!-- END FOOTER -->
</div>
<!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!--START QUICKVIEW -->
<div id="quickview" class="quickview-wrapper" data-pages="quickview">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="">
            <a href="#quickview-notes" data-toggle="tab">Notes</a>
        </li>
        <li>
            <a href="#quickview-alerts" data-toggle="tab">Alerts</a>
        </li>
        <li class="active">
            <a href="#quickview-chat" data-toggle="tab">Chat</a>
        </li>
    </ul>
    <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-close"></i></a>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- BEGIN Notes !-->
        <div class="tab-pane fade  in no-padding" id="quickview-notes">
            <div class="view-port clearfix quickview-notes" id="note-views">
                <!-- BEGIN Note List !-->
                <div class="view list" id="quick-note-list">
                    <div class="toolbar clearfix">
                        <ul class="pull-right ">
                            <li>
                                <a href="#" class="delete-note-link"><i class="fa fa-trash-o"></i></a>
                            </li>
                            <li>
                                <a href="#" class="new-note-link" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="fa fa-plus"></i></a>
                            </li>
                        </ul>
                        <button class="btn-remove-notes btn btn-xs btn-block" style="display:none"><i class="fa fa-times"></i> Delete</button>
                    </div>
                    <ul>
                        <!-- BEGIN Note Item !-->
                        <li data-noteid="1" data-navigate="view" data-view-port="#note-views" data-view-animation="push">
                            <div class="left">
                                <!-- BEGIN Note Action !-->
                                <div class="checkbox check-warning no-margin">
                                    <input id="qncheckbox1" type="checkbox" value="1">
                                    <label for="qncheckbox1"></label>
                                </div>
                                <!-- END Note Action !-->
                                <!-- BEGIN Note Preview Text !-->
                                <p class="note-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <!-- BEGIN Note Preview Text !-->
                            </div>
                            <!-- BEGIN Note Details !-->
                            <div class="right pull-right">
                                <!-- BEGIN Note Date !-->
                                <span class="date">12/12/14</span>
                                <a href="#"><i class="fa fa-chevron-right"></i></a>
                                <!-- END Note Date !-->
                            </div>
                            <!-- END Note Details !-->
                        </li>
                        <!-- END Note List !-->
                    </ul>
                </div>
                <!-- END Note List !-->
                <div class="view note" id="quick-note">
                    <div>
                        <ul class="toolbar">
                            <li><a href="#" class="close-note-link" data-navigate="view" data-view-port="#note-views" data-view-animation="push"><i class="pg-arrow_left"></i></a>
                        </li>
                        <li><a href="#" class="Bold"><i class="fa fa-bold"></i></a>
                    </li>
                    <li><a href="#" class="Italic"><i class="fa fa-italic"></i></a>
                </li>
                <li><a href="#" class=""><i class="fa fa-link"></i></a>
            </li>
        </ul>
        <div class="body">
            <div>
                <div class="top">
                    <span>21st april 2014 2:13am</span>
                </div>
                <div class="content">
                    <div class="quick-note-editor full-width full-height js-input" contenteditable="true"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- END Notes !-->
<!-- BEGIN Alerts !-->
<div class="tab-pane fade no-padding" id="quickview-alerts">
<div class="view-port clearfix" id="alerts">
<!-- BEGIN Alerts View !-->
<div class="view bg-white">
    <!-- BEGIN View Header !-->
    <div class="navbar navbar-default navbar-sm">
        <div class="navbar-inner">
            <!-- BEGIN Header Controler !-->
            <a href="javascript:;" class="inline action p-l-10 link text-master" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                <i class="pg-more"></i>
            </a>
            <!-- END Header Controler !-->
            <div class="view-heading">
                Notications
            </div>
            <!-- BEGIN Header Controler !-->
            <a href="#" class="inline action p-r-10 pull-right link text-master">
                <i class="pg-search"></i>
            </a>
            <!-- END Header Controler !-->
        </div>
    </div>
    <!-- END View Header !-->
    <!-- BEGIN Alert List !-->
    <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
        <!-- BEGIN List Group !-->
        <div class="list-view-group-container">
            <!-- BEGIN List Group Header!-->
            <div class="list-view-group-header text-uppercase">
                Calendar
            </div>
            <!-- END List Group Header!-->
            <ul>
                <!-- BEGIN List Group Item!-->
                <li class="alert-list">
                    <!-- BEGIN Alert Item Set Animation using data-view-animation !-->
                    <a href="javascript:;" class="" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                        <p class="col-xs-height col-middle">
                            <span class="text-warning fs-10"><i class="fa fa-circle"></i></span>
                        </p>
                        <p class="p-l-10 col-xs-height col-middle col-xs-9 overflow-ellipsis fs-12">
                            <span class="text-master">David Nester Birthday</span>
                        </p>
                        <p class="p-r-10 col-xs-height col-middle fs-12 text-right">
                            <span class="text-warning">Today <br></span>
                            <span class="text-master">All Day</span>
                        </p>
                    </a>
                    <!-- END Alert Item!-->
                    <!-- BEGIN List Group Item!-->
                </li>
                <!-- END List Group Item!-->
            </ul>
        </div>
        <!-- END List Group !-->
    </div>
    <!-- END Alert List !-->
</div>
<!-- EEND Alerts View !-->
</div>
</div>
<!-- END Alerts !-->
<div class="tab-pane fade in active no-padding" id="quickview-chat">
<div class="view-port clearfix" id="chat">
<div class="view bg-white">
    <!-- BEGIN View Header !-->
    <div class="navbar navbar-default">
        <div class="navbar-inner">
            <!-- BEGIN Header Controler !-->
            <a href="javascript:;" class="inline action p-l-10 link text-master" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                <i class="pg-plus"></i>
            </a>
            <!-- END Header Controler !-->
            <div class="view-heading">
                Chat List
                <div class="fs-11">Show All</div>
            </div>
            <!-- BEGIN Header Controler !-->
            <a href="#" class="inline action p-r-10 pull-right link text-master">
                <i class="pg-more"></i>
            </a>
            <!-- END Header Controler !-->
        </div>
    </div>
    <!-- END View Header !-->
    <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
        <div class="list-view-group-container">
            <div class="list-view-group-header text-uppercase">
            a</div>
            <ul>
                <!-- BEGIN Chat User List Item  !-->
                <li class="chat-user-list clearfix">
                    <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="col-xs-height col-middle">
                            <span class="thumbnail-wrapper d32 circular bg-success">
                                
                            </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                            <span class="text-master">ava flores</span>
                            <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                    </a>
                </li>
                <!-- END Chat User List Item  !-->
            </ul>
        </div>
        <div class="list-view-group-container">
            <div class="list-view-group-header text-uppercase">b</div>
            <ul>
                <!-- BEGIN Chat User List Item  !-->
                <li class="chat-user-list clearfix">
                    <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="col-xs-height col-middle">
                            <span class="thumbnail-wrapper d32 circular bg-success">
                                
                            </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                            <span class="text-master">bella mccoy</span>
                            <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                    </a>
                </li>
                <!-- END Chat User List Item  !-->
                <!-- BEGIN Chat User List Item  !-->
                <li class="chat-user-list clearfix">
                    <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="col-xs-height col-middle">
                            <span class="thumbnail-wrapper d32 circular bg-success">
                                
                            </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                            <span class="text-master">bob stephens</span>
                            <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                    </a>
                </li>
                <!-- END Chat User List Item  !-->
            </ul>
        </div>
    </div>
</div>
<!-- BEGIN Conversation View  !-->
<div class="view chat-view bg-white clearfix">
    <!-- BEGIN Header  !-->
    <div class="navbar navbar-default">
        <div class="navbar-inner">
            <a href="javascript:;" class="link text-master inline action p-l-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                <i class="pg-arrow_left"></i>
            </a>
            <div class="view-heading">
                John Smith
                <div class="fs-11 hint-text">Online</div>
            </div>
            <a href="#" class="link text-master inline action p-r-10 pull-right ">
                <i class="pg-more"></i>
            </a>
        </div>
    </div>
    <!-- END Header  !-->
    <!-- BEGIN Conversation  !-->
    <div class="chat-inner" id="my-conversation">
        <!-- BEGIN From Me Message  !-->
        <div class="message clearfix">
            <div class="chat-bubble from-me">
                Hello there
            </div>
        </div>
        <!-- END From Me Message  !-->
        <!-- BEGIN From Them Message  !-->
        <div class="message clearfix">
            <div class="profile-img-wrapper m-t-5 inline">
                
            </div>
            <div class="chat-bubble from-them">
                Hey
            </div>
        </div>
        <!-- END From Them Message  !-->
        <!-- BEGIN From Me Message  !-->
        <div class="message clearfix">
            <div class="chat-bubble from-me">
                Did you check out Pages framework ?
            </div>
        </div>
        <!-- END From Me Message  !-->
        <!-- BEGIN From Me Message  !-->
        <div class="message clearfix">
            <div class="chat-bubble from-me">
                Its an awesome chat
            </div>
        </div>
        <!-- END From Me Message  !-->
        <!-- BEGIN From Them Message  !-->
        <div class="message clearfix">
            <div class="profile-img-wrapper m-t-5 inline">
                
            </div>
            <div class="chat-bubble from-them">
                Yea
            </div>
        </div>
        <!-- END From Them Message  !-->
    </div>
    <!-- BEGIN Conversation  !-->
    <!-- BEGIN Chat Input  !-->
    <div class="b-t b-grey bg-white clearfix p-l-10 p-r-10">
        <div class="row">
            <div class="col-xs-1 p-t-15">
                <a href="#" class="link text-master"><i class="fa fa-plus-circle"></i></a>
            </div>
            <div class="col-xs-8 no-padding">
                <input type="text" class="form-control chat-input" data-chat-input="" data-chat-conversation="#my-conversation" placeholder="Say something">
            </div>
            <div class="col-xs-2 link text-master m-l-10 m-t-15 p-l-10 b-l b-grey col-top">
                <a href="#" class="link text-master"><i class="pg-camera"></i></a>
            </div>
        </div>
    </div>
    <!-- END Chat Input  !-->
</div>
<!-- END Conversation View  !-->
</div>
</div>
</div>
</div>
<!-- END QUICKVIEW-->
        <!-- START OVERLAY -->
<div class="overlay" style="display: none" data-pages="search">
    <!-- BEGIN Overlay Content !-->
    <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Logo !-->
            
            <!-- END Overlay Logo !-->
            <!-- BEGIN Overlay Close !-->
            <a href="#" class="close-icon-light overlay-close text-black fs-16">
                <i class="pg-close"></i>
            </a>
            <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Controls !-->
            <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
            <br>
            <div class="inline-block">
                <div class="checkbox right">
                    <input id="checkboxn" type="checkbox" value="1" checked="checked">
                    <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                </div>
            </div>
            <div class="inline-block m-l-10">
                <p class="fs-13">Press enter to search</p>
            </div>
            <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid">
            <span>
                <strong>suggestions :</strong>
            </span>
            <span id="overlay-suggestions"></span>
            <br>
            <div class="search-results m-t-40">
                <p class="bold">Pages Search Results</p>
                <div class="row">
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>
                                    
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                <p class="hint-text">via john smith</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>T</div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                                <p class="hint-text">via pages</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div><i class="fa fa-headphones large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                <p class="hint-text">via pagesmix</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                <div><i class="fa fa-facebook large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                                <p class="hint-text">via facebook</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                <div><i class="fa fa-twitter large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                                <p class="hint-text">via twitter</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                <div><i class="fa fa-google-plus large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                                <p class="hint-text">via google plus</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Overlay Search Results !-->
    </div>
    <!-- END Overlay Content !-->
</div>
<!-- END OVERLAY -->
        <!-- BEGIN PAGE LEVEL JS -->
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/boostrapv3/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('min/index.php?g=jsCoreAdmin&rev=' . $this->config->global->version->js); ?>"></script>
        
    <script type="text/javascript" src="<?php echo $this->url->getStatic('min/index.php?g=jsUserAdmin&rev=' . $this->config->global->version->js); ?>"></script>

    </body>
</html>

<?php if ($this->config->global->profiler === true) { ?>
<?php echo \Engine\Helper::getInstance('profiler', 'core')->render(); ?>
<?php } ?>
