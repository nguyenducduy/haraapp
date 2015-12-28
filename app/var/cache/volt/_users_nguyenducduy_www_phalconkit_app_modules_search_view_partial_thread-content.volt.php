
<?php $rangeCount = ($page - 1) * 20; ?>
<?php foreach ($results as $key => $item) { ?>
<!-- ITEM START -->
<div class="item">
    <div class="content">
        <a class="header" href="<?php echo $this->config->global->forumUrl . 'showthread.php?t=' . $item['thread_id']; ?>" title="<?php echo $item['title']; ?>">
            <span><?php echo $key + $rangeCount + 1; ?>.</span> <?php echo $item['title']; ?>
        </a>
        <div class="meta">
            <span class="cinema">
                <a target="_blank" href="<?php echo $this->config->global->forumUrl . 'showthread.php?t=' . $item['thread_id']; ?>" title="<?php echo $item['title']; ?>"><?php echo $this->config->global->forumUrl . 'showthread.php?t=' . $item['thread_id']; ?> <i class="external icon" style="font-size:12px;"></i></a>
            </span>
            <span class="cinema profile">
                <div class="ui inline dropdown" id="<?php echo $item['user_id']; ?>">
                    <div class="text">
                        <?php echo $item['user_name']; ?> (<i><?php echo \Engine\Helper::getInstance('searcher', 'search')->getUserLevelBranch($item['user_message_count']); ?></i>)
                    </div>
                    <?php $phoneArray = \Engine\Helper::getInstance('searcher', 'search')->getPhoneNumbers($item['message']); ?>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item profile__item">

                        </div>
                        <?php if ($this->length($phoneArray) > 0) { ?>
                            <div class="header">Số điện thoại có thể liên hệ</div>
                            <div class="divider"></div>
                            <?php foreach ($phoneArray as $phoneNumber) { ?>
                            <div class="item"><i class="phone icon"></i> <?php echo $phoneNumber; ?></div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="item">Không tìm thấy số điện thoại có thể liên hệ.</div>
                        <?php } ?>
                    </div>
                </div>
            </span>
            <span class="cinema gallary">
                trong <a href="<?php echo $this->config->global->forumUrl . 'forums/' . $item['cate_id']; ?>" target="_blank"><strong style="color: #bd4b2b"><?php echo $item['cate_title']; ?></strong></a>
            </span>

        </div>
        <div class="description">
            <p><?php echo \Engine\Helper::getInstance('searcher', 'search')->formatMessage($item['message'], $keyword); ?></p>
        </div>
        <div class="extra">
            <div class="ui horizontal bulleted link list">
                <a class="item">Cập nhật lúc <strong><?php echo date('H:m d/m/Y', $item['last_post_date']); ?></strong></a>
                <a class="item">Đăng lúc <strong><?php echo date('H:m d/m/Y', $item['thread_post_date']); ?></strong></a>
                <a class="item view_count"><strong><?php echo number_format($item['view_count']); ?></strong> lượt xem</a>
                <a class="item reply_count"><strong><?php echo number_format($item['reply_count']); ?></strong> lượt trả lời</a>
                <a class="item cached" href="<?php echo $this->url->get('timkiem/get?t=' . $item['thread_id'] . '&u=' . $item['user_id']); ?>" title="<?php echo $item['title']; ?>">Đã cache</a>
            </div>
        </div>
    </div>
</div>
<!-- ITEM END -->
<?php } ?>
