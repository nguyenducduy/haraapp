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
