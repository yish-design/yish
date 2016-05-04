<script type="text/javascript">
$(function() {
	<?php if (IS_POST) { ?>
	$.dialog.tips("<?php echo lang('014'); ?>", 3, 1);
	<?php } ?>
	// 单击事件
	$(".dr_index").click(function(){
		if ($(this).attr('checked')) {
			$(this).nextAll(".dr_orther").attr("disabled",false);
		} else {
			$(this).nextAll(".dr_orther").attr("disabled",true);
		}
	});
	// 初始化
	$(".dr_index").each(function(){
		if ($(this).attr('checked')) {
			$(this).nextAll(".dr_orther").attr("disabled",false);
		} else {
			$(this).nextAll(".dr_orther").attr("disabled",true);
		}
	});
	document.onkeydown = function(e){  //防止回车提交表单
		var ev = document.all ? window.event : e;
		if (ev.keyCode==13) {
			$("#mark").val("1"); // 标识不能提交表单
		}
	}
});
function dr_auth_selected(_class) {
	if ($("#dr_"+_class).attr('checked')) {
		$(".dr_"+_class).attr("checked",true);
	} else {
		$(".dr_"+_class).attr("checked",false);
	}
	$(".dr_"+_class).each(function(){
		if ($(this).attr('checked')) {
			$(this).nextAll(".dr_orther").attr("disabled",false);
		} else {
			$(this).nextAll(".dr_orther").attr("disabled",true);
		}
	});
}
function dr_form_check() {
	if ($("#mark").val() == 0) { 
		return true;
	} else {
		return false;
	}
}
</script>
<style>
.menu_qx {
	width:10px;
}
.menu_gx {
	width:120px;
}
</style>
<form action="" method="post" name="myform" id="myform" onsubmit="return dr_form_check()">
<input name="mark" id="mark" type="hidden" value="0">
<div class="subnav">
	<div class="table-list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <?php if (is_array($list)) { $count=count($list);foreach ($list as $c=>$t) { ?>
        <tr>
            <td align="right"><input type="checkbox" class="dr_<?php echo $c; ?>" id="dr_<?php echo $c; ?>" onClick="dr_auth_selected('<?php echo $c; ?>')"></td>
            <td align="left"><?php echo $t['name']; ?></th>
            <td align="left">
            <?php if (is_array($t['auth'])) { $count=count($t['auth']);foreach ($t['auth'] as $uri=>$name) { ?>
            <input type="checkbox" class="dr_<?php echo $c;  if (strrchr($uri, 'index')=='index') { ?> dr_index<?php } else { ?> dr_orther<?php } ?>" name="data[]" value="<?php echo $prefix;  echo $uri; ?>" <?php if (@in_array($prefix.$uri, $data)) { ?>checked="checked"<?php } ?>>&nbsp;<?php echo $name; ?>&nbsp;&nbsp;&nbsp;
            <?php } } ?>
            </td>
        </tr>
        <?php } } ?>
		<tr>
            <td align="center" colspan="3" style="color:red;"><b><?php echo lang('html-549'); ?></b></td>
        </tr>
        </tbody>
        </table>
	</div>
</div>
</form>