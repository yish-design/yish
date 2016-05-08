<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	<?php if ($result) { ?>
	art.dialog.tips('<?php echo $result; ?>', 3);
	<?php } ?>
	dr_set_post("<?php echo intval($data['setting']['post']); ?>");
});
function dr_set_post(id) {
	if (id == 1) {
		$(".dr_post").show();
	} else {
		$(".dr_post").hide();
	}
}
</script>
<form action="" method="post" name="myform" id="myform">
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
    <div class="table-list col-tab">
        <ul class="tabBut cu-li">
            <li class="on"><?php echo lang('html-663'); ?></li>
        </ul>
        <div class="contentList pad-10">
		<table width="100%" class="table_form">
		<tr>
			<th width="200"><font color="red">*</font>&nbsp;<?php echo lang('html-026'); ?>：</th>
			<td>
            	<input class="input-text" type="text" name="data[name]" value="<?php echo $data['name']; ?>" id="dr_name" onblur="d_topinyin('table','name');" size="20" /> <div class="onShow"><?php echo lang('html-027'); ?></div>
            </td>
		</tr>
		<tr>
			<th><font color="red">*</font>&nbsp;<?php echo lang('html-453'); ?>：</th>
			<td>
            	<input class="input-text" type="text" name="data[table]" value="<?php echo $data['table']; ?>" <?php if ($data['id']) { ?>disabled<?php } ?> id="dr_table" size="20" /> <div class="onShow" id="dr_table_tips"><?php echo lang('html-187'); ?></div>
			</td>
		</tr>
		<tr>
			<th><?php echo lang('html-343'); ?>：</th>
			<td>
            <input name="data[setting][post]" type="radio" value="1" onclick="dr_set_post(1)" <?php if ($data['setting']['post']) { ?>checked<?php } ?> />&nbsp;&nbsp;<label><?php echo lang('open'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="data[setting][post]" type="radio" value="0" onclick="dr_set_post(0)" <?php if (!$data['setting']['post']) { ?>checked<?php } ?> />&nbsp;&nbsp;<label><?php echo lang('close'); ?></label>
            </td>
		</tr>
		<tr class="dr_post">
			<th><?php echo lang('html-566'); ?>：</th>
			<td>
            <input name="data[setting][code]" type="radio" value="1" <?php if ($data['setting']['code']) { ?>checked<?php } ?> />&nbsp;&nbsp;<label><?php echo lang('open'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="data[setting][code]" type="radio" value="0" <?php if (!$data['setting']['code']) { ?>checked<?php } ?> />&nbsp;&nbsp;<label><?php echo lang('close'); ?></label>
            </td>
		</tr>
        <tr class="dr_post">
			<th><?php echo lang('html-557'); ?>：</th>
			<td>
            <input class="input-text" type="text" name="data[setting][send]" value="<?php echo $data['setting']['send']; ?>" size="30" /> <div class="onShow"><?php echo lang('html-558'); ?></div>
            </td>
		</tr>
        <tr class="dr_post">
			<th><?php echo lang('html-559'); ?>：</th>
			<td>
            <textarea name="data[setting][template]" style="width:512px; height:180px"><?php echo $data['setting']['template']; ?></textarea>
            <br>
            <font color="#777777"><?php echo lang('html-560'); ?></font>
            </td>
		</tr>
		</table>
        <table width="100%" class="table_form">
			<tr>
				<th width="200" style="border:none;">&nbsp;</th>
				<td>
				<input class="button" type="submit" name="submit" value="<?php echo lang('save'); ?>" />
				</td>
			</tr>
		</table>
	</div>
	</div>
</div>

</form>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>