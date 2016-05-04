<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.com/help/list-341.html" target="_blank"><em><?php echo lang('help'); ?></em></a>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
        <font color="gray"><?php echo lang('html-342'); ?></font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<table width="100%">
		<thead>
		<tr>
			<th width="20" align="left">Id</th>
			<th width="120" align="left"><?php echo lang('html-026'); ?></th>
			<th width="120" align="left"><?php echo lang('html-453'); ?></th>
			<th width="100" align="left"><?php echo lang('html-240'); ?></th>
			<th align="left" class="dr_option"><?php echo lang('option'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr>
			<td align="left"><?php echo $t['id']; ?></td>
			<td align="left">
            <?php if ($this->ci->is_auth('admin/form/edit')) { ?>
            <a href="<?php echo dr_url('form/edit', array('id' => $t['id'])); ?>"><?php echo $t['name']; ?></a>
            <?php } else {  echo $t['name'];  } ?>
            </td>
			<td align="left"><?php echo $t['table']; ?></td>
			<td align="left">form_<?php echo SITE_ID; ?>_<?php echo $t['id']; ?>.html</td>
			<td align="left" class="dr_option">
			<a href="javascript:;" onClick="dr_dialog_show('<?php echo lang('html-561'); ?>', '<?php echo dr_url('form/toform', array('id'=>$t['id'])); ?>')"><?php echo lang('html-561'); ?></a>
			<a href="<?php echo SITE_URL; ?>index.php?c=form_<?php echo SITE_ID; ?>_<?php echo $t['id']; ?>" target="_blank"><?php echo lang('331'); ?></a>
			<?php if ($this->ci->is_auth('admin/form/listc')) { ?><a href="<?php echo dr_url('admin/form_'.SITE_ID.'_'.$t['id'].'/index'); ?>"><?php echo lang('246'); ?></a><?php }  if ($this->ci->is_auth('admin/field/index')) { ?><a href="<?php echo dr_url('admin/field/index', array('rname'=>'form-'.SITE_ID, 'rid'=>$t['id'])); ?>"><?php echo lang('html-169'); ?></a><?php }  if ($this->ci->is_auth('admin/form/edit')) { ?><a href="<?php echo dr_url('form/edit', array('id'=>$t['id'])); ?>"><?php echo lang('edit'); ?></a><?php }  if ($this->ci->is_auth('admin/form/del')) { ?><a href="javascript:;" onClick="return dr_confirm_url('<?php echo lang('015'); ?>','<?php echo dr_url('form/del', array('id'=>$t['id'])); ?>');"><?php echo lang('del'); ?></a><?php } ?>
            </td>
		</tr>
		<?php } } ?>
		<tr class="dr_border_none">
			<td align="left" style="border:none" colspan="6"> 
			<font color="#FF0000"><?php echo lang('html-247'); ?></font></td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>