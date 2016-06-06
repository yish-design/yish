<?php if ($fn_include = $this->_include("head.html")) include($fn_include); ?>
<body>
<?php if ($fn_include = $this->_include("preload.html")) include($fn_include);  if ($fn_include = $this->_include("banner.html")) include($fn_include); ?>
<div class="app" id="app">
    <!--nav-->
    <?php if ($fn_include = $this->_include("nav.html")) include($fn_include); ?>
    <!--nav end-->
    <!--about-->
    <section class="about w9 m-auto" id="about">
        <div class="section-title text-big">ABOUT us</div>
        <div class="about-tab">
            <a href="#" class="on">TEAM</a>
            <a href="#">VALUE</a>
            <a href="#">SERVICES</a>
        </div>
        <div class="about-tab-content">
            <!--team-->
            <?php if ($fn_include = $this->_include("team.html")) include($fn_include); ?>
            <!--team end-->
            <!--value-->
            <?php if ($fn_include = $this->_include("value.html")) include($fn_include); ?>
            <!--value end-->
            <!--services-->
            <?php if ($fn_include = $this->_include("services.html")) include($fn_include); ?>
            <!--services end-->
        </div>
    </section>
    <!--about end-->
    <!--work-->
    <section class="work m-auto" id="work">
        <div class="section-title text-big">work</div>
        <div class="work-wrap">
            <article class="work-floor" id="work-floor">

            </article>
        </div>
        <div class="work-more">
            <a href="javascript:void(0);" id="loadMoreData">
                <span class="title">MORE</span>
                <span class="work-more-icon"></span>
            </a>
            <div class="loaddata" style="display: none"><i></i></div>
        </div>
    </section>
    <!--work end-->
    <!--clients-->
    <?php if ($fn_include = $this->_include("clients.html")) include($fn_include); ?>
    <!--clients end-->
    <!--contact-->
    <?php if ($fn_include = $this->_include("contact.html")) include($fn_include); ?>
    <!--contact end-->
    <?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>
</div>
<script src="<?php echo HOME_THEME_PATH; ?>build/js/app.js"></script>
<script>

    var isLoadData = true;

    D(function () {
        getIndexData(1);
        var page = 1;

        D("#loadMoreData").on("click",function () {

            if(isLoadData){
                D(".loaddata").show();
                page++;
                getIndexData(page);
            }
        });
    });

    function getIndexData(page) {
        D.get('/?s=case&c=api&m=template&name=work_data.html&page='+page, function (html) {
            console.log(html.length)
            if(html){
                D('#work-floor').append(html);
                setTimeout(function () {
                    ifworkLayout();
                },500)
            }else {
                isLoadData = false;
            }
            D(".loaddata").hide();
        });
    }

</script>
</body>
</html>