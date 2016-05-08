<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>

<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
        <form method="post" action="" name="searchform" id="searchform">
		<input name="search" id="search" type="hidden" value="1" />
        <?php echo lang('html-374'); ?>： 
		<select name="data[type]">
            <option value="0"> --- </option>
            <?php if (is_array($type)) { $count=count($type);foreach ($type as $i=>$t) { ?>
            <option value="<?php echo $i; ?>"><?php echo $t; ?></option>
            <?php } } ?>
        </select>&nbsp;
		<input type="submit" value="<?php echo lang('search'); ?>" class="button" name="search" />
		</form>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
		<table width="100%">
		<thead>
		<tr>
			<th width="130" align="left"><?php echo lang('html-374'); ?></th>
			<th width="130" align="left"><?php echo lang('html-213'); ?></th>
			<th width="130" align="left"><?php echo lang('html-531'); ?></th>
			<th width="50" align="left"><?php echo lang('html-322'); ?></th>
			<th align="left" class="dr_option"><?php echo lang('option'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr>
			<td align="left"><?php echo $type[$t['type']]; ?></td>
			<td align="left"><?php echo dr_date($t['inputtime'], NULL, 'red'); ?></td>
			<td align="left"><?php echo dr_date($t['updatetime'], NULL, 'red'); ?></td>
			<td align="left"><?php if ($t['status']) { ?><font color=red><?php echo dr_lang('html-222', $t['status']); ?></font><?php } else {  echo lang('html-221');  } ?></td>
			<td align="left" class="dr_option">
            <a href="javascript:;" onclick="dr_dialog_show('<?php echo lang('html-224'); ?>', '<?php echo dr_url('cron/show', array('id'=>$t['id'])); ?>')"><?php echo lang('html-224'); ?></a>
            <a href="<?php echo dr_url('cron/execute', array('id'=>$t['id'])); ?>" onclick="art.dialog.tips('执行中..', 9999, 2)"><?php echo lang('html-223'); ?></a>
            <?php if ($t['error']) { ?>(<?php echo $t['error']; ?>)<?php } ?>
            </td>
		</tr>
		<?php } } ?>
		</tbody>
		</table>
		</form>
        <div id="pages"><a><?php echo dr_lang('html-346', $total); ?></a><?php echo $pages; ?></div>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>