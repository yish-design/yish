<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.com/help/list-341.html" target="_blank"><em><?php echo lang('help'); ?></em></a>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
		<font color="gray"><?php echo lang('html-149'); ?></font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
		<table width="100%">
		<thead>
		<tr>
			<th width="20" align="right"><input name="dr_select" type="checkbox" onClick="dr_selected()" />&nbsp;</th>
			<th width="30" align="left">Id</th>
            <th width="200" align="left"><?php echo lang('html-087'); ?></th>
			<th width="280" align="left"><?php echo lang('html-089'); ?></th>
			<th align="left"><?php echo lang('option'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $sid=>$t) { ?>
		<tr>
			<td align="right"><input name="ids[]" type="checkbox" class="dr_select" value="<?php echo $sid; ?>" />&nbsp;</td>
			<td align="left"><?php echo $sid; ?></td>
			<td align="left"><input class="input-text" type="text" name="data[<?php echo $sid; ?>][name]" value="<?php echo $t['name']; ?>" size="25" required /></td>
			<td align="left"><input class="input-text" type="text" name="data[<?php echo $sid; ?>][domain]" value="<?php echo $t['domain']; ?>" size="40" required /></td>
			<td align="left"><a href="http://<?php echo $t['domain'];  echo SITE_PATH; ?>" target="_blank"><?php echo lang('go'); ?></a>&nbsp;&nbsp;
			<?php if ($this->ci->is_auth('site/config')) { ?><a href="<?php echo dr_url('site/config',array('id' => $sid)); ?>"><?php echo lang('061'); ?></a>&nbsp;&nbsp;&nbsp;<?php }  if ($this->ci->is_auth('site/del') && $sid > 1) { ?><a href="javascript:;" onClick="return dr_confirm_url('<?php echo lang('015'); ?>','<?php echo dr_url('site/del', array('id' => $t['id'])); ?>');"><?php echo lang('del'); ?></a><?php } ?>
            <span id="dr_domain_<?php echo $sid; ?>"></span>
            <script type="text/javascript">
                $.get("<?php echo dr_url('home/domain', array('domain' => $t['domain'])); ?>", function(data){
                    if (data) {
                        $("#dr_domain_<?php echo $sid; ?>").html("<a href='<?php echo dr_url('site/config',array('id'=>$sid)); ?>' style='color:red;'>域名解析异常</a>");
                    }
                });
            </script>
            </td>
		</tr>
		<?php } } ?>
		<tr>
			<th align="right"><input name="dr_select" type="checkbox" onClick="dr_selected()" />&nbsp;</th>
			<td colspan="4" align="left">
			<?php if ($this->ci->is_auth('site/edit')) { ?><input type="submit" class="button noloading" value="<?php echo lang('edit'); ?>" name="submit" onClick="return dr_confirm_set_all('<?php echo lang('015'); ?>');" />&nbsp;<?php } ?>
			</td>
		</tr>
		</tbody>
		</table>
		</form>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>