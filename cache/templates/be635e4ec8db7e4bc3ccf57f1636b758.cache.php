<?php $return = $this->list_tag("action=module module=case order=displayorder,updatetime page=1 pagesize=9"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
<li>
    <a href="<?php echo $t['url']; ?>">
        <img src="<?php echo dr_thumb($t['thumb2'], 285,193); ?>" alt="" />
        <div class="text">
            <img src="<?php echo dr_thumb($t['thumb'], 285,193); ?>" alt="" />
        </div>
    </a>
</li>
<?php } } ?>