a:9:{i:0;s:159:"<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>";s:5:"title";N;i:1;s:980:"</title>
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
        ";s:3:"css";N;i:2;s:3578:"
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
    <body>
        <!-- START PAGE-CONTAINER -->
        <div class="page-container">
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
                ";s:7:"content";N;i:3;s:22712:"
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
        ";s:2:"js";N;i:4;s:163:"
    </body>
</html>

<?php if ($this->config->global->profiler === true) { ?>
<?php echo \Engine\Helper::getInstance('profiler', 'core')->render(); ?>
<?php } ?>
";}