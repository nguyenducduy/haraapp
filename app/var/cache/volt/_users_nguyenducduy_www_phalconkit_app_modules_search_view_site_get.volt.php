<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <title>
    <?php echo $item['title']; ?> | <?php echo $this->lang->query('page-title.homepage'); ?>
</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        



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
        <div class="ui three column grid result">
            <!-- START TOP SEARCH BAR -->
            <div class="row search__bar">
                <div class="three wide computer only column">
                    <div class="logo_result">
                        <a href="<?php echo $this->url->get('searchbeta'); ?>">
                            <img class="ui image" src="<?php echo $this->url->getStatic('assets/img/logo_home.jpg'); ?>" alt="Logo five" />
                        </a>
                    </div>
                </div>
                <div class="nine wide computer sixteen wide tablet column search_bar">
                    <div class="search_form">
                        <?php if (!isset($keyword)) { ?>
    <?php $keyword = ''; ?>
<?php } ?>

<form action="<?php echo $this->url->get('search'); ?>" method="get" accept-charset="utf-8">
    <div class="ui action input">
        <input class="search__input" name="q" value="<?php echo $this->escaper->escapeHtml($keyword); ?>" type="text" placeholder="<?php echo $this->lang->query('input.search-placeholder'); ?>" autocomplete="off"/>
        <select class="ui compact selection dropdown search__select" name="type">
            <?php foreach ($searchTypes as $type) { ?>
            <option value="<?php echo $type['value']; ?>" <?php if ($type['value'] == $defaultType) { ?>selected="selected"<?php } ?> ><?php echo $this->lang->query($type['name']); ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="ui olive button">Tìm kiếm</button>
    </div>

    <div class="row search_filter" id="filterThreadOption" style="display:<?php if ($defaultType == \Engine\Constants\Search::TYPE_THREAD) { ?>block<?php } else { ?>none<?php } ?> !important">
        <div class="ui fluid multiple search selection dropdown">
            <input type="hidden" name="c" value="<?php echo $filter['category']; ?>">
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
            <input type="hidden" name="ug" value="<?php echo $filter['usergroup']; ?>">
            <div class="default text">Tìm trong nhóm</div>
            <div class="menu">
                <div class="item" data-value="17">Thành viên VIP</div>
                <div class="item" data-value="16">Thành viên đã xác thực</div>
            </div>
        </div>
    </div>

</form>

                    </div>
                </div>
                
                <div class="four wide computer only column top_right_banner">
    <ins data-revive-zoneid="4" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>
</div>

                
            </div>
            <!-- END TOP SEARCH BAR -->

            <!-- START RESULT SEARCH -->
            <div class="row">
                <!-- START LEFT BANNER -->
                <div class="three wide computer only column" style="padding-left:30px;text-align:right;">
    <ins data-revive-zoneid="5" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>
</div>

                <!-- END LEFT BANNER -->
                <div class="nine wide computer sixteen wide tablet column search_bar">
                    <div class="class column row" style="max-width:100%;line-height:1.6">
                        <!-- START CONTENT -->
                        <div class="left floated column">
                            <div class="content_detail">
                                <h2><?php echo $item['title']; ?></h2>
                    			<p class="info cache">Đăng lúc <span class="post-date"><?php echo date('H:m d/m/Y', $item['thread_post_date']); ?></span> (sửa <span class="edit-date"><?php echo date('H:m d/m/Y', $item['last_post_date']); ?></span>) bởi <a href="<?php echo $this->config->global->forumUrl . 'members/' . $item['user_id']; ?>" target="_blank"><?php echo $item['user_name']; ?></a> (<span class="rank"><?php echo $item['group_name']; ?></span>)</p>
                    			<p class="more"><a href="<?php echo $this->config->global->forumUrl . 'showthread.php?t=' . $item['thread_id']; ?>" title="<?php echo $item['title']; ?>"><?php echo $this->config->global->forumUrl . 'showthread.php?t=' . $item['thread_id']; ?></a> | Xem: <?php echo $item['view_count']; ?> | Trả lời: <?php echo $item['reply_count']; ?></p>
                    			<div class="full-content">
                    				<div class="full-detail">
                    					<?php echo $item['message']; ?>
                    				</div>
                    			</div>
                            </div>
                        </div>
                        <!-- END CONTENT -->
                    </div>
                </div>
                <!-- START RIGHT BANNER -->
                <div class="four wide computer only column"style="padding-right:30px;">
    <ins data-revive-zoneid="6" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>

    <ins data-revive-zoneid="8" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>
</div>

                <!-- END RIGHT BANNER -->
            </div>
            <!-- END RESULT SEARCH -->
        </div>
<!-- END CONTAINER -->
<!-- START FOOTER -->
    <div class="ui column centered grid search_footer">
    Bản quyền ® 2015 thuộc về <a href="">5giay.vn</a>. Bảo lưu mọi quyền.
</div>

<!-- END FOOTER -->


        <!-- END PAGE CONTAINER -->

        <!-- BEGIN PAGE LEVEL JS -->
        <script type="text/javascript" src="<?php echo $this->url->getStatic('plugins/semantic/dist/semantic.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('min/index.php?g=jsCoreSite&rev=' . $this->config->global->version->js); ?>"></script>
        
    </body>
</html>

<?php if ($this->config->global->profiler === true) { ?>
<?php echo \Engine\Helper::getInstance('profiler', 'core')->render(); ?>
<?php } ?>
