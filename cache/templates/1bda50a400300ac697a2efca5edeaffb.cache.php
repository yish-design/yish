<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	<?php if ($result) { ?>
	art.dialog.tips('<?php echo lang('000'); ?>', 3, 1);
	<?php } ?>
});
function test_email(id) {
	$("#dr_sending_"+id).html("Sending ... ");
	$.post("<?php echo dr_url('mail/test'); ?>&id="+id+"&"+Math.random(), function(data){
		alert(data);
		$("#dr_sending_"+id).html("");
	});
}
</script>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
        <font color="gray"><?php echo lang('html-425'); ?></font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
       	<input name="action" type="hidden" value="smtp" />
		<table width="100%">
		<thead>
		<tr>
			<th width="20" align="right"><input name="dr_select" id="dr_select" type="checkbox" onClick="dr_selected()" />&nbsp;</th>
			<th width="150" align="left"><?php echo lang('html-426'); ?></th>
			<th width="150" align="left"><?php echo lang('html-427'); ?></th>
			<th width="40" align="center"><?php echo lang('html-429'); ?></th>
			<th align="left" class="dr_option"><?php echo lang('option'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr>
			<td align="right"><input name="ids[]" type="checkbox" class="dr_select" value="<?php echo $t['id']; ?>" />&nbsp;</td>
			<td align="left"><?php echo $t['host']; ?></td>
			<td align="left"><?php echo $t['user']; ?></td>
			<td align="center"><?php echo $t['port']; ?></td>
			<td align="left" class="dr_option">
			<?php if ($this->ci->is_auth('admin/mail/edit')) { ?><a href="<?php echo dr_dialog_url(dr_url('mail/edit',array('id'=>$t['id'])), 'edit'); ?>"><?php echo lang('edit'); ?></a><?php } ?>
            <a href="javascript:;" onclick="test_email('<?php echo $t['id']; ?>')"><?php echo lang('html-430'); ?></a>
			<span id="dr_sending_<?php echo $t['id']; ?>"></span>
			</td>
		</tr>
		<?php } } ?>
		<tr>
			<th width="20" align="right"><input name="dr_select" id="dr_select" type="checkbox" onClick="dr_selected()" />&nbsp;</th>
			<td colspan="5" align="left" style="border:none"> 
			<?php if ($this->ci->is_auth('admin/mail/del')) { ?><input type="button" class="button" value="<?php echo lang('del'); ?>" name="option" onClick="dr_confirm_set_all('<?php echo lang('015'); ?>')" /><?php } ?>
			</td>
		</tr>
		</tbody>
		</table>
		</form>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>