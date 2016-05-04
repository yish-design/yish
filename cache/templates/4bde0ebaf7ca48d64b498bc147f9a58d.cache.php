<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	SwapTab(<?php echo $page; ?>);
});
function dr_to_key() {
	$.post("<?php echo dr_url('system/syskey'); ?>", function(data){
		$("#sys_key").val(data);
	});
}
</script>
<form action="" method="post" name="myform" id="myform">
<input name="page" id="page" type="hidden" value="<?php echo $page; ?>" />
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.com/help/list-341.html" target="_blank"><em><?php echo lang('help'); ?></em></a>
	</div>
	<div class="bk10"></div>
	<div class="table-list col-tab">
		<ul class="tabBut cu-li">
			<li onclick="SwapTab(0)"><?php echo lang('html-083'); ?></li>
			<li onclick="SwapTab(1)"><?php echo lang('html-449'); ?></li>
			<li onclick="SwapTab(2)"><?php echo lang('html-522'); ?></li>
			<li onclick="SwapTab(3)"><?php echo lang('html-550'); ?></li>
		</ul>
		<div class="contentList pad-10">
			<div id="cnt_0" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-435'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SYS_DEBUG]" value="TRUE" <?php if ($data['SYS_DEBUG']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SYS_DEBUG]" value="FALSE" <?php if (!$data['SYS_DEBUG']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<div class="onShow"><?php echo lang('html-445'); ?></div>
                    </td>
                </tr>
				<tr>
                    <th><?php echo lang('html-436'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SYS_KEY]" id="sys_key" value="<?php if ($data['SYS_KEY']) { ?>***<?php } ?>" size="20" />
					<input class="button" type="button" name="button" onclick="dr_to_key()" value="<?php echo lang('html-438'); ?>" />
					<div class="onShow"><?php echo lang('html-437'); ?></div>
                    </td>
                </tr>
				<tr>
                    <th><?php echo lang('html-439'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SYS_EMAIL]" value="<?php echo $data['SYS_EMAIL']; ?>" size="32" />&nbsp;
					<div class="onShow"><?php echo lang('html-440'); ?></div>
                    </td>
                </tr>
				<tr>
                    <th><?php echo lang('html-568'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SYS_ATTACHMENT_DIR]" value="<?php echo $data['SYS_ATTACHMENT_DIR']; ?>" size="32" />&nbsp;
					<div class="onShow"><?php echo lang('html-569'); ?></div>
                    </td>
                </tr>
				<tr>
                    <th>SITE_EXPERIENCE： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_EXPERIENCE]" value="<?php echo $data['SITE_EXPERIENCE']; ?>" size="32" />&nbsp;
					<div class="onShow"><?php echo lang('html-441'); ?></div>
                    </td>
                </tr>
				<tr>
                    <th>SITE_SCORE： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_SCORE]" value="<?php echo $data['SITE_SCORE']; ?>" size="32" />&nbsp;
					<div class="onShow"><?php echo lang('html-442'); ?></div>
                    </td>
                </tr>
				<tr>
                    <th>SITE_MONEY： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_MONEY]" value="<?php echo $data['SITE_MONEY']; ?>" size="32" />&nbsp;
					<div class="onShow"><?php echo lang('html-443'); ?></div>
                    </td>
                </tr>
				<tr class="">
                    <th><?php echo lang('html-477'); ?>： </th>
                    <td>
					<?php echo dr_lang('html-478', '<input class="input-text" type="text" name="data[SITE_CONVERT]" value="'.$data['SITE_CONVERT'].'" size="10" />'); ?>
                    </td>
                </tr>
				</table>
			</div>
			<div id="cnt_1" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-444'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SYS_LOG]" value="TRUE" <?php if ($data['SYS_LOG']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SYS_LOG]" value="FALSE" <?php if (!$data['SYS_LOG']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<div class="onShow"><?php echo lang('html-446'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-447'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SITE_ADMIN_CODE]" value="TRUE" <?php if ($data['SITE_ADMIN_CODE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SITE_ADMIN_CODE]" value="FALSE" <?php if (!$data['SITE_ADMIN_CODE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
                    </td>
                </tr>
                <tr class="">
                    <th><?php echo lang('html-448'); ?>： </th>
                    <td>
					<input class="input-text" type="text" name="data[SITE_ADMIN_PAGESIZE]" value="<?php echo $data['SITE_ADMIN_PAGESIZE']; ?>" size="10" />&nbsp;
					<div class="onShow"><?php echo lang('html-450'); ?></div>
                    </td>
                </tr>
                </table>
            </div>
			<div id="cnt_2" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-522'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SYS_MEMCACHE]" value="TRUE" <?php if ($data['SYS_MEMCACHE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SYS_MEMCACHE]" value="FALSE" <?php if (!$data['SYS_MEMCACHE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-523'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="memcache[hostname]" value="<?php echo $memcache['hostname']; ?>" size="32" />&nbsp;
                    </td>
                </tr>
                <tr class="">
                    <th><?php echo lang('html-524'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="memcache[port]" value="<?php echo $memcache['port']; ?>" size="32" />&nbsp;
					<input class="button" type="button" name="button" id="memcache" onclick="memcache_test()" value="<?php echo lang('html-127'); ?>" />
                    </td>
                </tr>
                </table>
            </div>
			<div id="cnt_3" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-609'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SYS_CRON_QUEUE]" value="0" <?php if (!$data['SYS_CRON_QUEUE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-610'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SYS_CRON_QUEUE]" value="1" <?php if ($data['SYS_CRON_QUEUE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-611'); ?></label>
                    <div class="onShow"><?php echo lang('html-612'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-613'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SYS_CRON_NUMS]" value="<?php echo $data['SYS_CRON_NUMS']; ?>" size="19" />&nbsp;
                    <div class="onShow"><?php echo lang('html-615'); ?></div>
                    </td>
                </tr>
                <tr class="">
                    <th><?php echo lang('html-614'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SYS_CRON_TIME]" value="<?php echo $data['SYS_CRON_TIME']; ?>" size="19" />&nbsp;
                    <div class="onShow"><?php echo lang('html-616'); ?></div>
                    </td>
                </tr>
                </table>
            </div>
			<table width="100%" class="table_form">
			<tr>
				<th width="200" style="border:none;">&nbsp;</th>
				<td>
				<input class="button" type="submit" name="submit" value="<?php echo lang('submit'); ?>" />
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
<!--
function memcache_test() {
	$("#memcache").val('Loading');
	$.get("<?php echo dr_url('system/memcache'); ?>&"+Math.random(),function(data){
		alert(data);
		$("#memcache").val('<?php echo lang('html-127'); ?>');
	})
}
//-->
</script>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>