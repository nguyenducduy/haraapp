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
        <link href="<?php echo $this->url->getStatic('min/index.php?g=cssCoreIframe&rev=' . $this->config->global->version->css); ?>" rel="stylesheet" type="text/css">
        


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
    <body class="fixed-header">
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
        </div>
    </div>
</div>

                
<div class="container-fluid container-fixed-lg">
    <div id="rootwizard">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm">
            <li class="active">
                <a data-toggle="tab" href="#tab1"><i class="fa fa-shopping-cart tab-icon"></i> <span>Your cart</span></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#tab2"><i class="fa fa-truck tab-icon"></i> <span>Shipping information</span></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#tab3"><i class="fa fa-credit-card tab-icon"></i> <span>Payment details</span></a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#tab4"><i class="fa fa-check tab-icon"></i> <span>Summary</span></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane padding-20 active slide-left" id="tab1">
                <div class="row row-same-height">
                    <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                        <div class="padding-30 m-t-50">
                            <i class="fa fa-shopping-cart fa-2x hint-text"></i>
                            <h2>Your Bags are ready to check out!</h2>
                            <p>Discover goods you'll love from brands that inspire. The easiest way to open your own online store. Discover amazing stuff or open your own store for free!</p>
                            <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="padding-30">
                            <table class="table table-condensed">
                                <tr>
                                    <td class="col-lg-8 col-md-6 col-sm-7 ">
                                        <a href="#" class="remove-item"><i class="pg-close"></i></a>
                                        <span class="m-l-10 font-montserrat fs-18 all-caps">Webarch UI Framework</span>
                                        <span class="m-l-10 ">Dashboard UI Pack</span>
                                    </td>
                                    <td class=" col-lg-2 col-md-3 col-sm-3 text-right">
                                        <span>Qty 1</span>
                                    </td>
                                    <td class=" col-lg-2 col-md-3 col-sm-2 text-right">
                                        <h4 class="text-primary no-margin font-montserrat">$27</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-lg-8 col-md-6 col-sm-7">
                                        <a href="#" class="remove-item"><i class="pg-close"></i></a>
                                        <span class="m-l-10 font-montserrat fs-18 all-caps">Pages UI Framework</span>
                                        <span class="m-l-10 ">Next Gen UI Pack</span>
                                    </td>
                                    <td class="col-lg-2 col-md-3 col-sm-3 text-right">
                                        <span>Qty 1</span>
                                    </td>
                                    <td class=" col-lg-2 col-md-3 col-sm-2 text-right">
                                        <h4 class="text-primary no-margin font-montserrat">$27</h4>
                                    </td>
                                </tr>
                            </table>
                            <h5>Donation</h5>
                            <div class="row">
                                <div class="col-lg-7 col-md-6">
                                    <p class="no-margin">Donate now and give clean, safe water to those in need. </p>
                                    <p class="small hint-text">
                                        100% of your donation goes to the field, and you can track the progress of every dollar spent. <a href="#">Click Here</a>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default active">
                                        <input type="radio" name="options" id="option1" checked> <span class="fs-16">$0</span>
                                        </label>
                                        <label class="btn btn-default">
                                        <input type="radio" name="options" id="option2"> <span class="fs-16">$10</span>
                                        </label>
                                        <label class="btn btn-default">
                                        <input type="radio" name="options" id="option3"> <span class="fs-16">$20</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container-sm-height">
                                <div class="row row-sm-height b-a b-grey">
                                    <div class="col-sm-3 col-sm-height col-middle p-l-10 sm-padding-15">
                                        <h5 class="font-montserrat all-caps small no-margin hint-text bold">Discount (10%)</h5>
                                        <p class="no-margin">$10</p>
                                    </div>
                                    <div class="col-sm-7 col-sm-height col-middle sm-padding-15 ">
                                        <h5 class="font-montserrat all-caps small no-margin hint-text bold">Donations</h5>
                                        <p class="no-margin">$0</p>
                                    </div>
                                    <div class="col-sm-2 text-right bg-primary col-sm-height col-middle padding-10">
                                        <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>
                                        <h4 class="no-margin text-white">$44</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane slide-left padding-20" id="tab2">
                <div class="row row-same-height">
                    <div class="col-md-5 b-r b-dashed b-grey ">
                        <div class="padding-30 m-t-50">
                            <h2>Your Information is safe with us!</h2>
                            <p>We respect your privacy and protect it with strong encryption, plus strict policies . Two-step verification, which we encourage all our customers to use.</p>
                            <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="padding-30">
                            <form role="form">
                                <p>Name and Email Address</p>
                                <div class="form-group-attached">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                                <label>First name</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Last name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default required">
                                        <label>Email</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <p>Billing Address</p>
                                <div class="form-group-attached">
                                    <div class="form-group form-group-default required">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Current address" required>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                                <label>Country</label>
                                                <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KR">Korea, Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Viet Nam</option>
                                                    <option value="VG">Virgin Islands, British</option>
                                                    <option value="VI">Virgin Islands, U.S.</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-9">
                                            <div class="form-group form-group-default required">
                                                <label>State/Province</label>
                                                <input type="text" class="form-control" placeholder="Outside US/Canada" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-group-default">
                                                <label>Zip code</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default input-group">
                                        <span class="input-group-addon">
                                            <select class="cs-select cs-skin-slide cs-transparent" data-init-plugin="cs-select">
                                                <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                <option data-countryCode="US" value="1">USA (+1)</option>
                                                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                                <option data-countryCode="AO" value="244">Angola (+244)</option>
                                                <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                                <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                                <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                                <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                                <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                                <option data-countryCode="AU" value="61">Australia (+61)</option>
                                                <option data-countryCode="AT" value="43">Austria (+43)</option>
                                                <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                                <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                                <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                                <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                                <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                                <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                                <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                                <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                                <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                                <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                                <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                                <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                                <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                                <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                                <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                                <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                                <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                                <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                                <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                                <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                                <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                                <option data-countryCode="CA" value="1">Canada (+1)</option>
                                                <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                                <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                                <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                                <option data-countryCode="CL" value="56">Chile (+56)</option>
                                                <option data-countryCode="CN" value="86">China (+86)</option>
                                                <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                                <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                                <option data-countryCode="CG" value="242">Congo (+242)</option>
                                                <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                                <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                                <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                                <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                                <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                                <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                                <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                                <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                                <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                                <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                                <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                                <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                                <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                                <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                                <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                                <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                                <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                                <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                                <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                                <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                                <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                                <option data-countryCode="FI" value="358">Finland (+358)</option>
                                                <option data-countryCode="FR" value="33">France (+33)</option>
                                                <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                                <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                                <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                                <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                                <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                                <option data-countryCode="DE" value="49">Germany (+49)</option>
                                                <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                                <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                                <option data-countryCode="GR" value="30">Greece (+30)</option>
                                                <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                                <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                                <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                                <option data-countryCode="GU" value="671">Guam (+671)</option>
                                                <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                                <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                                <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                                <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                                <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                                <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                                <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                                <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                                <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                                <option data-countryCode="IN" value="91">India (+91)</option>
                                                <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                                <option data-countryCode="IR" value="98">Iran (+98)</option>
                                                <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                                <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                                <option data-countryCode="IL" value="972">Israel (+972)</option>
                                                <option data-countryCode="IT" value="39">Italy (+39)</option>
                                                <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                                <option data-countryCode="JP" value="81">Japan (+81)</option>
                                                <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                                <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                                <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                                <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                                <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                                <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                                <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                                <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                                <option data-countryCode="LA" value="856">Laos (+856)</option>
                                                <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                                <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                                <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                                <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                                <option data-countryCode="LY" value="218">Libya (+218)</option>
                                                <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                                <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                                <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                                <option data-countryCode="MO" value="853">Macao (+853)</option>
                                                <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                                <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                                <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                                <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                                <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                                <option data-countryCode="ML" value="223">Mali (+223)</option>
                                                <option data-countryCode="MT" value="356">Malta (+356)</option>
                                                <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                                <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                                <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                                <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                                <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                                <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                                <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                                <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                                <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                                <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                                <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                                <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                                <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                                <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                                <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                                <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                                <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                                <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                                <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                                <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                                <option data-countryCode="NE" value="227">Niger (+227)</option>
                                                <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                                <option data-countryCode="NU" value="683">Niue (+683)</option>
                                                <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                                <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                                <option data-countryCode="NO" value="47">Norway (+47)</option>
                                                <option data-countryCode="OM" value="968">Oman (+968)</option>
                                                <option data-countryCode="PW" value="680">Palau (+680)</option>
                                                <option data-countryCode="PA" value="507">Panama (+507)</option>
                                                <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                                <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                                <option data-countryCode="PE" value="51">Peru (+51)</option>
                                                <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                                <option data-countryCode="PL" value="48">Poland (+48)</option>
                                                <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                                <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                                <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                                <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                                <option data-countryCode="RO" value="40">Romania (+40)</option>
                                                <option data-countryCode="RU" value="7">Russia (+7)</option>
                                                <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                                <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                                <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                                <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                                <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                                <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                                <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                                <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                                <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                                <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                                <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                                <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                                <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                                <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                                <option data-countryCode="ES" value="34">Spain (+34)</option>
                                                <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                                <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                                <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                                <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                                <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                                <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                                <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                                <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                                <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                                <option data-countryCode="SI" value="963">Syria (+963)</option>
                                                <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                                <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                                <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                                <option data-countryCode="TG" value="228">Togo (+228)</option>
                                                <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                                <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                                <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                                <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                                <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                                <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                                <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                                <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                                <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                                <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                                <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                                <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                                <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                                <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                            </select>
                                        </span>
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" placeholder="For verification purpose">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane slide-left padding-20" id="tab3">
                <div class="row row-same-height">
                    <div class="col-md-5 b-r b-dashed b-grey ">
                        <div class="padding-30 m-t-50">
                            <h2>We Secured Your Line</h2>
                            <p>Below is a sample page for your cart , Created using pages design UI Elementes</p>
                            <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
                            <table class="table table-condensed">
                                <tr>
                                    <td class=" col-md-9">
                                        <span class="m-l-10 font-montserrat fs-18 all-caps">Webarch UI Framework</span>
                                        <span class="m-l-10 ">Dashboard UI Pack</span>
                                    </td>
                                    <td class=" col-md-3 text-right">
                                        <span>Qty 1</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" col-md-9">
                                        <span class="m-l-10 font-montserrat fs-18 all-caps">Pages UI Framework</span>
                                        <span class="m-l-10 ">Next Gen UI Pack</span>
                                    </td>
                                    <td class=" col-md-3 text-right">
                                        <span>Qty 1</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class=" col-md-3 text-right">
                                        <h4 class="text-primary no-margin font-montserrat">$27</h4>
                                    </td>
                                </tr>
                            </table>
                            <p class="small">Invoice are issued on the date of despatch. Payment terms: Pre-orders: within 10 days of invoice date with 4% discount, from the 11th to the 30th day net. Re-orders: non-reduced stock items are payable net after 20 days. </p>
                            <p class="small">By pressing Pay Now You will Agree to the Payment <a href="#">Terms &amp; Conditions</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="padding-30">
                            <ul class="list-unstyled list-inline m-l-30">
                                <li><a href="#" class="p-r-30 text-black">Credit card</a>
                                </li>
                                <li><a href="#" class="p-r-30 text-black  hint-text">PayPal</a>
                                </li>
                                <li><a href="#" class="p-r-30 text-black  hint-text">Wire transfer</a>
                                </li>
                            </ul>
                            <form role="form">
                                <div class="bg-master-light padding-30 b-rad-lg">
                                    <h2 class="pull-left no-margin">Credit Card</h2>
                                    <ul class="list-unstyled pull-right list-inline no-margin">
                                        <li>
                                            <a href="#">
                                            <img width="51" height="32" data-src-retina="assets/img/form-wizard/visa2x.png" data-src="assets/img/form-wizard/visa.png" class="brand" alt="logo" src="assets/img/form-wizard/visa.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="hint-text">
                                            <img width="51" height="32" data-src-retina="assets/img/form-wizard/amex2x.png" data-src="assets/img/form-wizard/amex.png" class="brand" alt="logo" src="assets/img/form-wizard/amex.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="hint-text">
                                            <img width="51" height="32" data-src-retina="assets/img/form-wizard/mastercard2x.png" data-src="assets/img/form-wizard/mastercard.png" class="brand" alt="logo" src="assets/img/form-wizard/mastercard.png">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div class="form-group form-group-default required m-t-25">
                                        <label>Card holder's name</label>
                                        <input type="text" class="form-control" placeholder="Name on the card" required>
                                    </div>
                                    <div class="form-group form-group-default required">
                                        <label>Card number</label>
                                        <input type="text" class="form-control" placeholder="8888-8888-8888-8888" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Expiration</label>
                                            <br>
                                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                                <option selected>Jan (01)</option>
                                                <option>Feb (02)</option>
                                                <option>Mar (03)</option>
                                                <option>Apr (04)</option>
                                                <option>May (05)</option>
                                                <option>Jun (06)</option>
                                                <option>Jul (07)</option>
                                                <option>Aug (08)</option>
                                                <option>Sep (09)</option>
                                                <option>Oct (10)</option>
                                                <option>Nov (11)</option>
                                                <option>Dec (12)</option>
                                            </select>
                                            <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-md-offset-4">
                                            <div class="form-group required">
                                                <label>CVC Code</label>
                                                <input type="text" class="form-control" placeholder="000" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane slide-left padding-20" id="tab4">
                <h1>Thank you.</h1>
            </div>
            <div class="padding-20 bg-white">
                <ul class="pager wizard">
                    <li class="next">
                        <button class="btn btn-primary btn-cons btn-animated from-left fa fa-truck pull-right" type="button">
                        <span>Next</span>
                        </button>
                    </li>
                    <li class="next finish hidden">
                        <button class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                        <span>Finish</span>
                        </button>
                    </li>
                    <li class="previous first hidden">
                        <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                        <span>First</span>
                        </button>
                    </li>
                    <li class="previous">
                        <button class="btn btn-default btn-cons pull-right" type="button">
                        <span>Previous</span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="wizard-footer padding-20 bg-master-light">
                <p class="small hint-text pull-left no-margin">
                    The Top Content Is Soley Created using pages UI Elements such as Invoice, Tabs, Form Layouts etc. and are prior for representation Purpose Only.
                </p>
                <div class="pull-right">
                    <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

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
        <script type="text/javascript" src="<?php echo $this->url->getStatic('min/index.php?g=jsCoreIframe&rev=' . $this->config->global->version->js); ?>"></script>
        


    </body>
</html>

<?php if ($this->config->global->profiler === true) { ?>
<?php echo \Engine\Helper::getInstance('profiler', 'core')->render(); ?>
<?php } ?>