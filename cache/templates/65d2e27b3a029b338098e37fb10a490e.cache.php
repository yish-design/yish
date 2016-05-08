<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="container">
        <!-- section start-page -->
    <?php if ($fn_include = $this->_include("banner.html")) include($fn_include);  if ($fn_include = $this->_include("nav.html")) include($fn_include); ?>
   <div class="clear"></div>
   <!-- section about us -->
        <?php if ($fn_include = $this->_include("indexAbout.html")) include($fn_include); ?>
   <div class="clear"></div>
   <!-- portoflio-->
        <?php if ($fn_include = $this->_include("indexPro.html")) include($fn_include); ?>
   <div class="clear"></div>
   <!-- partners-->
        <?php if ($fn_include = $this->_include("indexPartnets.html")) include($fn_include); ?>
   <div class="clear"></div>
   <!-- Contact-->
        <?php if ($fn_include = $this->_include("indexContact.html")) include($fn_include); ?>
   <div class="clear"></div>
        <?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>
  </div> 
  <script src="<?php echo HOME_THEME_PATH; ?>build/js/app.js?v20160505"></script>
  <script>
      $(function () {
          var page = 1;
            $("#loadMoreData").on("click",function () {
                $(".loaddata").show();
                page++;
                getIndexData(page);
            });
      });

      function getIndexData(page) {
          $.get('/?s=case&c=api&m=template&name=index_data.html&page='+page, function (html) {
              if(html){
                  $('#case-index-data').append(html);
              }
              $(".loaddata").hide();
          });
      }

  </script>
 </body>
</html><script type="text/javascript" src="http://yish.app/index.php?c=cron"></script>