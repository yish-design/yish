<?php $return = $this->list_tag("action=module module=case order=displayorder,updatetime page=1 pagesize=9"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
<li>
    <a href="<?php echo $t['url']; ?>">
        <img src="<?php echo dr_thumb($t['thumb'], 285,193); ?>" alt="" />
        <div class="text">
            <p style="margin-top: 58px;"><?php echo $t['title']; ?></p>
            <p class="description" style="font-style: italic"><?php echo $ci->get_cache('module-1-case', 'category', $t['catid'], 'pdirname');  echo $ci->get_cache('module-1-case', 'category', $t['catid'], 'name'); ?></p>
        </div>
    </a>
</li>
<?php } } ?>