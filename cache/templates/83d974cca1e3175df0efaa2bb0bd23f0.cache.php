<?php $return = $this->list_tag("action=module module=case order=displayorder,updatetime page=1 pagesize=15"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
<div class="imgbox" >
    <a href="<?php echo $t['url']; ?>">
        <div flex="main:center cross:center" class="img-box">
            <img class="lazy" src="<?php echo HOME_THEME_PATH; ?>build/img/loading.svg" lan="<?php echo dr_thumb($t['thumb']); ?>" alt="">
        </div>
    </a>
</div>
<?php } } ?>
