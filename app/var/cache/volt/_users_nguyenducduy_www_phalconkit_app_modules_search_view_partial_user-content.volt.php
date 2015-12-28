
<?php $rangeCount = ($page - 1) * 20; ?>
<?php foreach ($results as $key => $item) { ?>
<!-- ITEM START -->
<div class="item">
    <img class="ui avatar image" src="<?php echo \Engine\Helper::getInstance('searcher', 'search')->getUserAvatarXenforo($item['user_id']); ?>" style="width:70px !important;height:70px !important">
    <div class="content">
        <a class="header" href="<?php echo $this->config->global->forumUrl . 'members/' . $item['user_id']; ?>" title="<?php echo $item['name']; ?>" target="_blank">
            <span><?php echo $key + $rangeCount + 1; ?>.</span> <?php echo $item['name']; ?>
        </a>
        <div class="meta">
            <span class="cinema">
                <a target="_blank" href="<?php echo $this->config->global->forumUrl . 'members/' . $item['user_id']; ?>" title="<?php echo $item['name']; ?>"><?php echo $this->config->global->forumUrl . 'members/' . $item['user_id']; ?></a>
            </span>
        </div>
        <div class="extra">
            <div class="ui horizontal bulleted link list">
                <?php if ($this->length($item['city_name']) > 0) { ?>
                <a class="item"><?php echo $item['city_name']; ?></a>
                <?php } ?>
                <a class="item"><strong><?php echo number_format($item['post_count']); ?></strong> bài viết</a>
                <a class="item" style="color: #bd4b2b !important;"><strong><i><?php echo \Engine\Helper::getInstance('searcher', 'search')->getUserLevelBranch($item['user_message_count']); ?></i></strong></a>
                <a class="item">Ngày tham gia: <strong><?php echo date('d/m/Y', $item['registered']); ?></strong></a>
            </div>
        </div>
    </div>
</div>
<!-- ITEM END -->
<?php } ?>
