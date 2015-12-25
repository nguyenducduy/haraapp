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
