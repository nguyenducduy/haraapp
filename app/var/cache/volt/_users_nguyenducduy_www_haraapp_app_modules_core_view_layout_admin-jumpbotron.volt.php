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
            <?php if (isset($jumpbotron)) { ?>
            <div class="row">
                <div class="col-lg-7 col-md-6 ">
                    <!-- START PANEL -->
                    <div class="full-height">
                        <div class="panel-body text-center">
                            
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
                <div class="col-lg-5 col-md-6 ">
                    <!-- START PANEL -->
                    <div class="panel panel-transparent">
                        <div class="panel-body">
                            <h3 class="">
                            Nestables
                            </h3>
                            <p>This is powered by the JQuery nestable plugin, we have customized it to suite the design scheme and color pallete
                            </p>
                            <br>
                            <div class="col-sm-12 no-padding">
                                <a href="http://dbushell.github.io/Nestable/" target="_blank" class="btn btn-complete">See Plugin</a>
                                <p class="small hinted-text inline p-l-10 no-margin col-middle">
                                    http://dbushell.github.io/Nestable/
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>