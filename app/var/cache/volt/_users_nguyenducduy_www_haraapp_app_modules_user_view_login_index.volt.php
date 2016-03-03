<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
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
        <script type="text/javascript">
            window.onload = function() {
                // fix for windows 8
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('plugins/admin-fix/windows.chrome.fix.css'); ?>" />'
            }
        </script>
    </head>
    <body class="fixed-header">
        <!-- START PAGE-CONTAINER -->
        <div class="login-wrapper ">
          <!-- START Login Background Pic Wrapper-->
          <div class="bg-pic">
            <!-- START Background Pic-->
            <img src="<?php echo $this->url->getStatic('demo-login-image.jpg'); ?>" data-src="" data-src-retina="" alt="" class="lazy">
            <!-- END Background Pic-->
            <!-- START Background Caption-->
            <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
              <h2 class="semi-bold text-white">
                        Pages make it easy to enjoy what matters the most in the life</h2>
              <p class="small">
                images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014 REVOX.
              </p>
            </div>
            <!-- END Background Caption-->
          </div>
          <!-- END Login Background Pic Wrapper-->
          <!-- START Login Right Container-->
          <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
              <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
              <p class="p-t-35">Đăng nhập bằng tài khoản <a>five.vn</a></p>
              <!-- START Login Form -->
              <form id="form-login" class="p-t-15" role="form" action="index.html">
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                  <label>Tài khoản</label>
                  <div class="controls">
                    <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control" required>
                  </div>
                </div>
                <!-- END Form Control-->
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                  <label>Mật khẩu</label>
                  <div class="controls">
                    <input type="password" class="form-control" name="password" placeholder="" required>
                  </div>
                </div>
                <!-- START Form Control-->
                <div class="row">
                  <div class="col-md-6 no-padding">
                    <div class="checkbox ">
                      <input type="checkbox" value="1" id="checkbox1">
                      <label for="checkbox1">Duy trì đăng nhập</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="#" class="text-info small">Chưa có tài khoản? Đăng ký</a>
                  </div>
                </div>
                <!-- END Form Control-->
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Đăng nhập</button>
              </form>
              <!--END Login Form-->
            </div>
          </div>
          <!-- END Login Right Container-->
        </div>
        <!-- END PAGE CONTAINER -->
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/boostrapv3/js/bootstrap.min.js'); ?>"></script>
        

    </body>
</html>
