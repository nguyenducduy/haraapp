<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <title>
    <?php echo $this->lang->query('page-title.homepage'); ?>
</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        
<meta name="description" content="Hệ thống tìm kiếm five.vn, 5giay.vn, 5giay" />
<meta name="keyword" content="5giây, 5giay, 5s, mua bán, mua ban, đấu giá, dau gia, giá rẻ, gia re, miễn phí, mien phi, iphone, shi, laptop, dell, hp, blackberry, xe may, thoi trang, sim so dep" />


        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->getStatic('assets/img/favicon.ico'); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo $this->url->getStatic('favicon.ico'); ?>">

        <!-- BEGIN Pages CSS-->
        <link href="<?php echo $this->url->getStatic('plugins/semantic/dist/semantic.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo $this->url->getStatic('min/index.php?g=cssCoreSite&rev=' . $this->config->global->version->css); ?>" rel="stylesheet" type="text/css">
        

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
        
<!-- BEGIN CONTAINER -->
        <div class="content">
            <div class="middle-content">
                <div class="ui three column grid">
                    <div class="four wide computer only column"></div>
                    <div class="eight wide computer sixteen wide tablet column">
                        <div class="logo_home">
                            <img src="<?php echo $this->url->getStatic('assets/img/logo_home.jpg'); ?>" alt="Logo five" />
                        </div>
                        <form action="<?php echo $this->url->get('timkiem'); ?>" method="get" accept-charset="utf-8">
                            <div class="search_form">
                                <div class="ui action input">
                                    <input class="search__input" name="q" type="text" placeholder="<?php echo $this->lang->query('input.search-placeholder'); ?>" autocomplete="off"/>
                                    <select class="ui compact selection dropdown search__select" name="type">
                                        <?php foreach ($searchTypes as $type) { ?>
                                        <option value="<?php echo $type['value']; ?>" <?php if ($type['value'] == $defaultType) { ?>selected="selected"<?php } ?> ><?php echo $this->lang->query($type['name']); ?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" class="ui blue button">Tìm kiếm</button>
                                </div>
                                <div class="row search_filter" id="filterThreadOption" style="display:<?php if ($defaultType == \Engine\Constants\Search::TYPE_THREAD) { ?>block<?php } else { ?>none<?php } ?> !important">
                                    <div class="ui fluid multiple search selection dropdown">
                                        <input type="hidden" name="c" value="">
                                        <div class="default text">Tìm trong danh mục</div>
                                        <div class="menu">
                                            <?php foreach ($categories as $cate) { ?>
                                                <?php if ($cate->depth == 0) { ?>
                                                <div class="disabled item" data-value="<?php echo $cate->id; ?>"><?php echo $cate->title; ?></div>
                                                <?php } else { ?>
                                                <div class="item" data-value="<?php echo $cate->id; ?>"><?php echo $cate->title; ?></div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row search_filter user" id="filterUserOption" style="display:<?php if ($defaultType == \Engine\Constants\Search::TYPE_USER) { ?>block<?php } else { ?>none<?php } ?> !important">
                                    <div class="ui fluid multiple search selection dropdown">
                                        <input type="hidden" name="ug" value="">
                                        <div class="default text">Tìm trong nhóm</div>
                                        <div class="menu">
                                            <div class="item" data-value="17">Thành viên VIP</div>
                                            <div class="item" data-value="16">Thành viên đã xác thực</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <div class="banner_home">
    
    <ins data-revive-zoneid="2" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>


    
    <ins data-revive-zoneid="3" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>

</div>

                        
                    </div>
                    <div class="four wide computer only column"></div>
                </div>
                <!-- BEGIN HOME FOOTER -->
                <div class="ui one column centered grid">
    <div class="eight wide column footer_home">
        <div class="ui horizontal bulleted link list">
            <a class="item">Về five.vn</a>
            <a class="item">Trợ giúp</a>
            <a class="item">Liên hệ</a>
        </div>
        <div class="">
            Bản quyền ® 2015 thuộc về <a href="">5giay.vn</a>. Bảo lưu mọi quyền.
        </div>
    </div>
</div>

                <!-- END HOME FOOTER -->
            </div>
        </div>
<!-- END CONTAINER -->

        <!-- END PAGE CONTAINER -->

        <!-- BEGIN PAGE LEVEL JS -->
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/semantic/dist/semantic.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('min/index.php?g=jsCoreSite&rev=' . $this->config->global->version->js); ?>"></script>
        
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
