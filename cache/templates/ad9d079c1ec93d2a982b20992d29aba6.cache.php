<?php if ($fn_include = $this->_include("head.html")) include($fn_include); ?>
<body>
<?php if ($fn_include = $this->_include("preload.html")) include($fn_include);  if ($fn_include = $this->_include("banner.html")) include($fn_include); ?>
<div class="app" id="app">
    <!--nav-->
    <?php if ($fn_include = $this->_include("nav.html")) include($fn_include); ?>
    <!--nav end-->
    <!--case show-->
    <section class="case-wrap" id="case-wrap" >
        <div class="case-desc-wrap m-auto">
            <h3 class="title"><?php echo $title; ?></h3>
            <div class="category" style="font-style:italic;"><?php echo dr_catpos($catid, '/',false); ?> </div>
            <div class="contents">
                <?php echo $content; ?>
            </div>
            <div class="article_next" style="padding-top: 30px;text-align: right;padding-right: 10px;">
                <?php if ($prev_page) { ?><span class="fl" style="float: left">上一篇： <a href="<?php echo $prev_page['url']; ?>" title="<?php echo $prev_page['title']; ?>"><?php echo $prev_page['title']; ?></a><?php } else {  } ?></span>
                <?php if ($next_page) { ?><span class="">下一篇： <a href="<?php echo $next_page['url']; ?>" title="<?php echo $next_page['title']; ?>"><?php echo $next_page['title']; ?></a><?php } else {  } ?></span>
            </div>
        </div>
    </section>
    <section class="case-img-wrap">
        <div class="case-img m-auto">
            <div class="video-wrap">
                <?php echo $videos; ?>
            </div>
            <?php if (is_array($images)) { $count=count($images);foreach ($images as $i=>$t) { ?>
                <div class="img-d">
                    <img class="lazy" src="<?php echo HOME_THEME_PATH; ?>build/img/loading.svg" Lan="<?php echo dr_get_file($t['file']); ?>" alt="<?php echo $t['title']; ?>-<?php echo $t['size']; ?>">
                </div>
            <?php } } ?>

        </div>
    </section>
    <!--case show end-->
    <!--contact-->
    <?php if ($fn_include = $this->_include("contact.html")) include($fn_include); ?>
    <!--contact end-->
    <?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>
</div>
<script src="<?php echo HOME_THEME_PATH; ?>build/js/app.js?v20160505555fsss335"></script>
<script>
    (function () {
        D('html, body').stop().animate({ scrollTop: D("#case-wrap").offset().top-40 }, 500, function() {

        });
    })
</script>
</body>
</html>