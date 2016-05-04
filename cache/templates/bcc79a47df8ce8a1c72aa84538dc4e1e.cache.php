<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
function setflag(i) {
    if (i == -1) {
        $('#flag_back').show();
    } else {
        $('#flag_back').hide();
    }
}
function dr_confirm_verfiy() {
	art.dialog.confirm("<?php echo lang('015'); ?>", function(){
		$('#action').val('flag');
		var _data = $("#myform").serialize();
		var _url = window.location.href;
		if ((_data.split('ids')).length-1 <= 0) {
			$.dialog.tips(lang['select_null'], 2);
			return true;
		}
		// 将表单数据ajax提交验证
		$.ajax({type: "POST",dataType:"json", url: _url, data: _data,
			success: function(data) {
                //验证成功
                if (data.status == 1) {
                    var ret = data.code;
                    for(var o in ret){
                        dr_tips(ret[o], 5);
                    }
                    var html = data.id;
                    for(var o in html){
                        $.post(html[o], {}, function(){});
                    }
                    setTimeout('window.location.reload(true)', 5000); // 刷新页
                } else if (data.status == 2) {
                    var html = data.id;
                    for(var o in html){
                        $.post(html[o], {}, function(){});
                    }
                    dr_tips(data.code, 3, 1);
                    setTimeout('window.location.reload(true)', 3000); // 刷新页
                } else {
                    dr_tips(data.code);
                    return true;
                }
			},
			error: function(HttpRequest, ajaxOptions, thrownError) {
				alert(HttpRequest.responseText);
			}
		});
		return true;
	});
	return false;
}
</script>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
        <font color="gray"><?php echo lang('html-319'); ?></font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
        <input name="action" id="action" type="hidden" value="" />
		<table width="100%">
		<thead>
		<tr>
			<th width="20" align="right"><input name="dr_select" id="dr_select" type="checkbox" onClick="dr_selected()" />&nbsp;</th>
			<th hide="1" width="50" align="left">Id</th>
			<th align="left"><?php echo lang('mod-35'); ?></th>
			<th width="100" align="center"><?php echo lang('cat-00'); ?></th>
			<th width="80" align="center"><?php echo lang('101'); ?></th>
			<th width="120" align="left"><?php echo lang('105'); ?></th>
			<th align="left" class="dr_option"><?php echo lang('option'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) {  $c=dr_string2array($t['content']); ?>
		<tr id="dr_row_<?php echo $t['id']; ?>">
			<td align="right"><input name="ids[]" type="checkbox" class="dr_select" value="<?php echo $t['id']; ?>" />&nbsp;</td>
			<td hide="1" align="left"><?php echo $t['id']; ?></td>
			<td align="left"><a href="<?php echo dr_url(APP_DIR.'/home/verifyedit',array('id'=>$t['id'])); ?>"><?php if ($c['thumb']) { ?><font color="#FF0000"><?php echo lang('html-387'); ?></font><?php }  echo $c['title']; ?></a></td>
			<td align="center"><a href="<?php echo dr_url(APP_DIR.'/home/verify', array('status'=>$param['status'],'catid'=>$t['catid'])); ?>"><?php $cache = $this->_cache_var('CATEGORY'); eval('echo $cache'.$this->_get_var('$t[catid].name').';');unset($cache); ?></a></td>
			<td align="center"><a href="javascript:;" onclick="dr_dialog_member('<?php echo $t['uid']; ?>')"><?php echo dr_strcut($t['author'], 10); ?></a></td>
			<td align="left"><?php echo dr_date($t['inputtime'], NULL, 'red'); ?></td>
			<td align="left" class="dr_option">
			<?php if ($this->ci->is_auth(APP_DIR.'/admin/home/verifyedit')) { ?><a href="<?php echo dr_url(APP_DIR.'/home/verifyedit',array('id'=>$t['id'])); ?>"><?php echo lang('edit'); ?></a><?php } ?>
			</td>
		</tr>
		<?php } } ?>
		<tr>
			<th width="20" align="right"><input name="dr_select" id="dr_select" type="checkbox" onClick="dr_selected()"/>&nbsp;</th>
			<td colspan="7" align="left" style="border:none">
			<?php if ($this->ci->is_auth(APP_DIR.'/admin/home/del')) { ?><input type="button" class="button" value="<?php echo lang('del'); ?>" name="option" onClick="$('#action').val('del');dr_confirm_set_all('<?php echo lang('015'); ?>')" /><?php }  if ($this->ci->is_auth(APP_DIR.'/admin/home/verifyedit')) { ?>
			<input type="button" class="button" value="<?php echo lang('html-318'); ?>" name="option" onClick="dr_confirm_verfiy()" />
			<select name="flagid" onchange="setflag(this.value)">
			<option value="1"><?php echo lang('html-320'); ?></option>
			<option value="-1"><?php echo lang('html-321'); ?></option>
			</select>
            <input id="flag_back" type="text" name="backcontent" value="" class="input-text" style="display: none;width: 400px;" />
			<?php } ?>
			</td>
		</tr>
		</tbody>
		</table>
		</form>
        <div id="pages"><a><?php echo dr_lang('html-346', $param['total']); ?></a><?php echo $pages; ?></div>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>