<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
function dr_space_dialog(url) {
	var throughBox = $.dialog.through; // 创建窗口
	var dr_Dialog = throughBox({title: "<?php echo lang('html-527'); ?>"});
	// ajax调用窗口内容
	$.ajax({type: "GET", url:url+"&"+Math.random(), dataType:'text', success: function (text) {
			var win = $.dialog.top;
			dr_Dialog.content(text);
			// 添加按钮
			dr_Dialog.button({name: fc_lang[36], callback:function() {
					win.$("#mark").val("0"); // 标示可以提交表单
					if (win.dr_form_check()) { // 按钮返回验证表单函数
						var _data = win.$("#myform").serialize();
						$.ajax({type: "POST",dataType:"json", url: url, data: _data, // 将表单数据ajax提交验证
							success: function(data) {
								$.dialog.tips(data.code, 2, 1);
								dr_Dialog.close();
							},
							error: function(HttpRequest, ajaxOptions, thrownError) {
								alert(thrownError + "\r\n" + HttpRequest.statusText + "\r\n" + HttpRequest.responseText);
							}
						});
					}
					return false;
				},
				focus: true
			});
	    },
	    error: function(HttpRequest, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + HttpRequest.statusText + "\r\n" + HttpRequest.responseText);
		}
	});
}
</script>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><a href="<?php echo SELF; ?>?c=theme&m=store"><?php echo lang('197'); ?></a><span>|</span>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
		<font color="gray"><?php echo lang('html-390'); ?></font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<table width="100%" cellspacing="0">
		<tbody>
		<tr>
			<td align="left"><?php echo lang('html-525'); ?>：<?php echo str_replace(FCPATH, '/', $path); ?></td>
			<td align="left" width="70%">
			<?php if ($this->ci->is_auth($auth.'add')) { ?>
				<a class="add" title="<?php echo lang('add'); ?>" href="javascript:dr_dialog('<?php echo dr_url($furi.'add', array('dir'=> $dir)); ?>', 'add');"></a>
			<?php } ?>
			</td>
		</tr>
		<?php if ($parent) { ?>
		<tr>
			<td align="left">
				<a href="<?php echo dr_url($furi.'index', array('dir' => $parent)); ?>"><img src="<?php echo SITE_URL; ?>mantob/statics/images/folder-closed.gif"><?php echo lang('html-526'); ?></a>
			</td>
			<td align="left" width="70%"></td>
		</tr>
		<?php }  if (is_array($list)) { $count=count($list);foreach ($list as $file) { ?>
		<tr>
		<?php if (is_dir($path.$file)) { ?>
			<td align="left">
				<a href="<?php echo dr_url($furi.'index', array('dir' => $dir.'/'.basename($file))); ?>"><img src="<?php echo SITE_URL; ?>mantob/statics/images/folder-closed.gif"> <b><?php echo basename($file); ?></b></a>
			</td>
		<?php } else { ?>
			<td align="left">
				<a href="<?php echo dr_url($furi.'edit', array('file' => $dir.'/'.$file)); ?>"><img src="<?php echo SITE_URL; ?>mantob/statics/images/file.gif"> <?php echo $file; ?>
			</td>
			<?php } ?>
			<td align="left" width="70%">
				<?php if ($this->ci->is_auth($auth.'del')) { ?>
				<a class="del" title="<?php echo lang('del'); ?>" href="javascript:;" onClick="return dr_dialog_del('<span><?php echo lang('015'); ?></span>','<?php echo dr_url($furi.'del', array('file' => $dir.'/'.$file)); ?>');"></a>
				<?php }  if ($space && !$parent) { ?>
				<a class="edit" title="<?php echo lang('html-527'); ?>" href="javascript:;" onClick="return dr_space_dialog('<?php echo dr_url($furi.'permission', array('dir'=>basename($file))); ?>');"></a>
				<?php } ?>
			</td>
		</tr>
		<?php } } ?>
		<tr><td align="left" colspan="2"></td></tr>
		</tbody>
		</table>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>