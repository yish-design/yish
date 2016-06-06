<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
    <?php if ($error) { ?>
        art.dialog.tips('<font color=red><?php echo $error['msg']; ?></font>', 3);
        d_tips('<?php echo $error['error']; ?>', 0);
    <?php }  if ($result) { ?>
	art.dialog.tips('<?php echo $result; ?>', 3, 1);
	<?php } ?>
	SwapTab(<?php echo $page; ?>);
});
function dr_select_all() {
    $("#dr_synid").find("option").attr("selected", "selected");
}
</script>
<form action="" method="post" name="myform" id="myform">
<input name="action" id="dr_action" type="hidden" value="back" />
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.com/help/list-341.html" target="_blank"><em><?php echo lang('help'); ?></em></a>
	</div>
	<div class="bk10"></div>
    <div class="table-list col-tab">
		<ul class="tabBut cu-li">
			<li onclick="SwapTab(0)"><?php echo lang('html-083'); ?></li>
			<li onclick="SwapTab(1)"><?php echo lang('html-356'); ?></li>
			<?php if ($id) { ?><li onclick="SwapTab(2)"><?php echo lang('html-219'); ?></li><?php } ?>
		</ul>
		<div class="contentList pad-10 dr_table">
			<div id="cnt_0" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                <tr>
                    <th width="200"><font color="red">*</font>&nbsp;<?php echo lang('html-370'); ?>： </th>
                    <td><?php echo $select; ?></td>
                </tr>
                <tr>
                    <th><font color="red">*</font>&nbsp;<?php echo lang('139'); ?>： </th>
                    <td><?php echo dr_field_input('name', 'Text', $field['name']['setting'], $data['name']); ?><div class="onShow"><?php echo lang('html-027'); ?></div></td>
                </tr>
                <tr>
                    <th><font color="red">*</font>&nbsp;<?php echo lang('140'); ?>： </th>
                    <td><?php echo dr_field_input('dirname', 'Text', $field['dirname']['setting'], $data['dirname']); ?><div class="onShow"><?php echo lang('html-364'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('142'); ?>： </th>
                    <td><?php echo dr_field_input('title', 'Text', $field['title']['setting'], $data['title']); ?></td>
                </tr>
                <tr>
                    <th><?php echo lang('143'); ?>： </th>
                    <td><?php echo dr_field_input('keywords', 'Text', $field['keywords']['setting'], $data['keywords']); ?></td>
                </tr>
                <tr>
                    <th><?php echo lang('144'); ?>： </th>
                    <td><?php echo dr_field_input('description', 'Textarea', $field['description']['setting'], $data['description']); ?></td>
                </tr>
                <tr>
                    <th><?php echo lang('141'); ?>： </th>
                    <td><?php echo dr_field_input('thumb', 'File', $field['thumb']['setting'], $data['thumb']); ?><div class="onShow"><?php echo lang('html-365'); ?></div></td>
                </tr>
                <?php echo $myfield;  if ($myfile) {  if ($fn_include = $this->_include("$myfile")) include($fn_include);  } ?>
                </table>
        	</div>
            <div id="cnt_1" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-357'); ?>： </th>
                    <td><?php echo dr_field_input('show', 'Radio', $field['show']['setting'], $data['show']); ?><div class="onShow"><?php echo lang('html-579'); ?></div></td>
                </tr>
				<tr>
                    <th><?php echo lang('html-577'); ?>： </th>
                    <td><?php echo dr_field_input('getchild', 'Radio', $field['getchild']['setting'], $data['getchild']); ?><div class="onShow"><?php echo lang('html-578'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('html-040'); ?>： </th>
                    <td><input type="radio" name="setting[nocache]" value="1" <?php if ($data['setting']['nocache']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('yes'); ?></label>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="setting[nocache]" value="0" <?php if (!$data['setting']['nocache']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('no'); ?></label>
                        <div class="onShow"><?php echo lang('html-749'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('149'); ?>： </th>
                    <td>
					<select name="urlrule">
					<option value="0"> -- </option>
					<?php $return_u = $this->list_tag("action=cache name=urlrule  return=u"); if ($return_u) extract($return_u); $count_u=count($return_u); if (is_array($return_u)) { foreach ($return_u as $key_u=>$u) {  if ($u['type']==0) { ?><option value="<?php echo $u['id']; ?>" <?php if ($u['id']==$data['urlrule']) { ?>selected<?php } ?>> <?php echo $u['name']; ?> </option><?php }  } } ?>
					</select>
					<div class="onShow"><?php echo lang('html-694'); ?></div>
					</td>
                </tr>
                <tr>
                    <th><?php echo lang('147'); ?>： </th>
                    <td><?php echo dr_field_input('template', 'Text', $field['template']['setting'], $data['template']); ?></td>
                </tr>
                <tr class="dr_border_none">
                    <th><?php echo lang('148'); ?>： </th>
                    <td><?php echo dr_field_input('urllink', 'Text', $field['urllink']['setting'], $data['urllink']); ?></td>
                </tr>
                </table>
        	</div>
            <?php if ($id) { ?>
            <div id="cnt_2" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                <tr class="dr_border_none">
                    <th width="200"> </th>
                    <td>
					<?php echo $select_syn; ?>
                    <input value="<?php echo lang('html-605'); ?>" type="button" onclick="dr_select_all()" name="button" class="button" />
                    <br>
                    <font color="gray"><?php echo lang('html-341'); ?></font></td>
                </tr>
				</table>
            </div>
            <?php } ?>
    	</div>
    	
    </div>
</div>

<div class="fixed-bottom">
<div class="fixed-but text-c">
	<div class="button"><input value="<?php echo lang('html-362'); ?>" type="submit" name="submit" class="cu" onclick="$('#dr_action').val('back')" style="width:100px;" /></div>
    <?php if (!$id) { ?>
    <div class="button"><input value="<?php echo lang('html-363'); ?>" type="submit" name="submit" class="cu" onclick="$('#dr_action').val('continue')" style="width:100px;" /></div>
    <?php } ?>
</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>