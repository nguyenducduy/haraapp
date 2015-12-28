<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <title>
    <?php if (isset($keyword) && $keyword != '') { ?>
        <?php if ($defaultType == \Engine\Constants\Search::TYPE_THREAD) { ?>
            Mua bán
        <?php } elseif ($defaultType == \Engine\Constants\Search::TYPE_USER) { ?>
            Thành viên
        <?php } ?>
        <?php echo $keyword; ?> trên 5giay.vn - Giá rẻ hơn cửa hàng, siêu thị
    <?php } else { ?>
    <?php echo $this->lang->query('page-title.homepage'); ?>
    <?php } ?>
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
                        <a href="<?php echo $this->url->get('timkiem'); ?>">
                            <img class="ui image" src="<?php echo $this->url->getStatic('assets/img/logo_home.jpg'); ?>" alt="Logo five" />
                        </a>
                    </div>
                </div>
                <div class="nine wide computer sixteen wide tablet column search_bar">
                    <div class="search_form">
                        <?php if (!isset($keyword)) { ?>
    <?php $keyword = ''; ?>
<?php } ?>

<form action="<?php echo $this->url->get('timkiem'); ?>" method="get" accept-charset="utf-8">
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

                        <?php if ($defaultType == \Engine\Constants\Search::TYPE_THREAD) { ?>
                        <div class="sort_bar">
                            <div class="ui dropdown">
                                <?php if (isset($orderBy) && $orderBy == 'new') { ?>
                                    <div class="text">Chủ đề mới nhất</div>
                                <?php } elseif (isset($orderBy) && $orderBy == 'view') { ?>
                                    <div class="text">Chủ đề xem nhiều nhất</div>
                                <?php } elseif (isset($orderBy) && $orderBy == 'reply') { ?>
                                    <div class="text">Chủ đề trả lời nhiều nhất</div>
                                <?php } else { ?>
                                    <div class="text">Sắp xếp theo</div>
                                <?php } ?>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a href="<?php echo $this->url->get('timkiem?q=' . $this->escaper->escapeHtml($keyword) . '&type=' . $typeGet . '&orderby=new&ordertype=desc'); ?>" class="item <?php if (isset($orderBy) && $orderBy == 'new') { ?>active<?php } ?>">Chủ đề mới nhất</a>
                                    <a href="<?php echo $this->url->get('timkiem?q=' . $this->escaper->escapeHtml($keyword) . '&type=' . $typeGet . '&type=&orderby=view&ordertype=desc'); ?>" class="item <?php if (isset($orderBy) && $orderBy == 'view') { ?>active<?php } ?>">Chủ đề xem nhiều nhất</a>
                                    <a href="<?php echo $this->url->get('timkiem?q=' . $this->escaper->escapeHtml($keyword) . '&type=' . $typeGet . '&type=&orderby=reply&ordertype=desc'); ?>" class="item <?php if (isset($orderBy) && $orderBy == 'reply') { ?>active<?php } ?>">Chủ đề trả lời nhiều nhất</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
                    <div class="class column row">
                        <div class="left floated column">
                            <h4 class="ui horizontal divider header">
                                Khoảng <?php echo number_format(\Engine\Helper::getInstance('searcher', 'search')->getMetaRecord('total_found', $meta)); ?> kết quả (<?php echo \Engine\Helper::getInstance('searcher', 'search')->getMetaRecord('time', $meta); ?> giây)
                            </h4>
                        </div>
                        <!-- START CONTENT -->
                        <!-- START TOP CENTER BANNER -->
                        <div class="left floated column">
    <div class="top_center_banner">
        <ins data-revive-zoneid="9" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>
        <ins data-revive-zoneid="10" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>

    </div>
    <div class="top_image_banner">
        <ins data-revive-zoneid="7" data-revive-ct0="INSERT_ENCODED_CLICKURL_HERE" data-revive-id="4034d3e938db4fd56ee2129758f65552"></ins>
    </div>
</div>

                        <!-- END TOP CENTER BANNER -->
                        <!-- BEGIN SEARCH LIST -->
                        <div class="left floated column">
                            <?php if (isset($results) && $this->length($results) > 0) { ?>
                            <?php if ($defaultType == \Engine\Constants\Search::TYPE_THREAD) { ?>
                            <div class="message" style="margin:10px;">
                    			<p>
                                    <a href="<?php echo $this->url->get('timkiem?q=' . $this->escaper->escapeHtml($accuratedKeyword)); ?>"><?php echo $accuratedString; ?> <strong><?php echo $this->escaper->escapeHtml($accuratedKeyword); ?></strong></a>
                                </p>
                    		</div>
                            <?php } ?>
                            <div class="ui items search_list">
                                <?php if ($sphinxIndexName == 'Thread') { ?>
                                    <?php $this->partial('Partial/thread-content', array('results' => $results)); ?>
                                <?php } elseif ($sphinxIndexName == 'User') { ?>
                                    <?php $this->partial('Partial/user-content', array('results' => $results)); ?>
                                <?php } ?>
                            </div>
                            <?php } else { ?>
                            <div class="message">
                    			<p><strong>Xin lỗi, <span>Five</span> không tìm thấy kết quả nào!</strong></p>
                    			<p>Gợi ý:</p>
                    			<ul>
                    				<li>Hãy thử những từ khoá khác.</li>
                    				<li>Hãy thử những từ khoá chung hơn.</li>
                    			</ul>
                    		</div>
                            <?php } ?>
                        </div>
                        <!-- END SEARCH LIST -->
                        <!-- END CONTENT -->
                        <?php if (isset($results) && $this->length($results) > 0) { ?>
                        <div class="pager">
                              <?php if (isset($paginator)) { ?>
    <div class="ui pagination bottom center aligned menu">
        <?php $pageString = ''; ?>
        <?php $mid_range = 7; ?>
        <?php $maxPage = 6; ?>

        <?php if (($paginator->total_pages > $maxPage)) { ?>
            <?php if ((1 > ($paginator->current - ($maxPage / 2)))) { ?>
                <?php $nStart = 1; ?>
                <?php $nEnd = $maxPage; ?>
            <?php } else { ?>
                <?php if (($paginator->total_pages < ($paginator->current + ($maxPage / 2)))) { ?>
                    <?php $nStart = $paginator->total_pages - $maxPage; ?>
                    <?php $nEnd = $paginator->total_pages; ?>
                <?php } else { ?>
                    <?php $nStart = $paginator->current - ($maxPage / 2); ?>
                    <?php $nEnd = $paginator->current + ($maxPage / 2); ?>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <?php $nStart = 1; ?>
            <?php $nEnd = $paginator->total_pages; ?>
        <?php } ?>

        <?php if ($paginator->current > 1) { ?>
            <?php $pageString = $pageString . '<a class="icon item" href="' . $this->escaper->escapeHtml($paginateUrl) . '&page=' . ($paginator->current - 1) . '"><i class="left arrow icon"></i></a>'; ?>
        <?php } ?>

        <?php foreach (range($nStart, $nEnd) as $i) { ?>
            <?php if ($i == $paginator->current) { ?>
                <?php $pageString = $pageString . '<a class="item blue active" href="' . $this->escaper->escapeHtml($paginateUrl) . '&page=' . $i . '">' . $i . '</a>'; ?>
            <?php } else { ?>
                <?php $pageString = $pageString . '<a class="item" href="' . $this->escaper->escapeHtml($paginateUrl) . '&page=' . $i . '">' . $i . '</a>'; ?>
            <?php } ?>
        <?php } ?>

        <!-- insert previous/next button -->
        <?php if ($paginator->current < $paginator->total_pages) { ?>
            <?php $pageString = $pageString . '<a class="icon item" href="' . $this->escaper->escapeHtml($paginateUrl) . '&page=' . ($paginator->current + 1) . '"><i class="right arrow icon"></i></a>'; ?>
        <?php } ?>

        <?php echo $pageString; ?>
    </div>
    <?php } ?>

                        </div>
                        <?php } ?>
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
