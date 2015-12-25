a:11:{i:0;s:127:"<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <title>";s:5:"title";N;i:1;s:135:"</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        ";s:3:"SEO";N;i:2;s:573:"

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->getStatic('assets/img/favicon.ico'); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo $this->url->getStatic('favicon.ico'); ?>">

        <!-- BEGIN Pages CSS-->
        <link href="<?php echo $this->url->getStatic('plugins/semantic/dist/semantic.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo $this->url->getStatic('min/index.php?g=cssCoreSite&rev=' . $this->config->global->version->css); ?>" rel="stylesheet" type="text/css">
        ";s:3:"css";N;i:3;s:1105:"

        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/jquery/jquery-1.11.1.min.js'); ?>"></script>
        <script async src="https://www.5giay.vn/qc/www/delivery/asyncjs.php"></script>
        <script type="text/javascript">
            var root_url = "<?php echo $this->url->getBaseUri(); ?>";
        </script>
    </head>
    <body>
        <input type="hidden" class="typeValue" value="1">
        
<!-- BEGIN NAVIGATION -->
<div class="ui grid">
    <header class="column row">
        <div class="sixteen column">
            <div class="ui secondary pointing menu">
              <a class="item" href="https://www.5giay.vn/" target="_blank">5giay</a>
              <a class="item" href="https://sohot.vn/" target="_blank">Sàn đấu giá</a>
              <a class="item" href="http://khuyenmaivang.vn/" target="_blank">Khuyến mãi</a>
              <a class="item" href="http://www.giamua.com/" target="_blank">Tổng hợp deal</a>
            </div>
        </div>
    </header>
</div>
<!-- END NAVIGATION -->

        <!-- START PAGE-CONTAINER -->
        ";s:7:"content";N;i:4;s:380:"
        <!-- END PAGE CONTAINER -->

        <!-- BEGIN PAGE LEVEL JS -->
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/semantic/dist/semantic.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('min/index.php?g=jsCoreSite&rev=' . $this->config->global->version->js); ?>"></script>
        ";s:2:"js";N;i:5;s:592:"
    </body>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-44899597-1', 'auto');
    ga('send', 'pageview');

    </script>
</html>

<?php if ($this->config->global->profiler === true) { ?>
<?php echo \Engine\Helper::getInstance('profiler', 'core')->render(); ?>
<?php } ?>
";}