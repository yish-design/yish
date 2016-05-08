<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	SwapTab(0);
	<?php if ($data['uid'] && !$data['third']) { ?>
	$.getScript("<?php echo $service; ?>?c=check&uid=<?php echo $data['uid']; ?>&key=<?php echo $data['key']; ?>");
	<?php }  if ($data['third']) { ?>
	$('.dr_1').show();$('.dr_0').hide();
	<?php } else { ?>
	$('.dr_0').show();$('.dr_1').hide();
	<?php } ?>
});
</script>
<form action="" method="post" name="myform" id="myform">
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.com/member/zwsms.php?action=add" target="_blank"><em><?php echo lang('319'); ?></em></a>
	</div>
	<div class="bk10"></div>
	<div class="table-list col-tab">
		<ul class="tabBut cu-li">
			<li><?php echo lang('316'); ?></li>
		</ul>
		<div class="contentList pad-10">
            <table width="100%" class="table_form">
            <tr>
                <th width="200"><?php echo lang('html-659'); ?>： </th>
                <td>
                <input name="aa" type="radio" value="0" onclick="$('.dr_0').show();$('.dr_1').hide();" <?php if (!$data['third']) { ?>checked="checked"<?php } ?> />&nbsp;<?php echo lang('html-660'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="aa" type="radio" value="1" onclick="$('.dr_1').show();$('.dr_0').hide();" <?php if ($data['third']) { ?>checked="checked"<?php } ?> />&nbsp;<?php echo lang('html-661'); ?>
                </td>
            </tr>
            <tr class="dr_0">
                <th width="200"><?php echo lang('html-637'); ?>： </th>
                <td><a href=" http://www.mantob.com/member/zwsms.php?action=receive" target="_blank"> http://www.mantob.com/member/zwsms.php?action=receive</a></td>
            </tr>
            <tr class="dr_0">
                <th><font color="red">*</font>&nbsp;SMS Uid： </th>
                <td>
                <input class="input-text" type="text" name="data[uid]" value="<?php echo $data['uid']; ?>" size="10" />
                </td>
            </tr>
            <tr class="dr_0">
                <th><font color="red">*</font>&nbsp;SMS Key： </th>
                <td>
                <input class="input-text" type="text" name="data[key]" value="<?php echo $data['key']; ?>" size="25" />
                </td>
            </tr>
            <?php if ($data['uid'] && !$data['third']) { ?>
            <tr class="dr_0">
                <th><?php echo lang('html-638'); ?>： </th>
                <td><span id="dr_sms">...</span></td>
            </tr>
            <?php } ?>
            <tr class="dr_1">
                <th width="200"><?php echo lang('html-637'); ?>： </th>
                <td><a href="http://www.mantob.com/help/list-341.html" target="_blank">http://www.mantob.com/help/list-341.html</a></td>
            </tr>
            <tr class="dr_1">
                <th><font color="red">*</font>&nbsp;<?php echo lang('html-662'); ?>： </th>
                <td>
                <textarea class="input-text" name="data[third]" style="height:100px; width:220px;"><?php echo $data['third']; ?></textarea>
                </td>
            </tr>
           
            <tr>
                <th style="border:none;">&nbsp;</th>
                <td><input class="button" type="submit" name="submit" value="<?php echo lang('submit'); ?>" /></td>
            </tr>
            </table>
		</div>
	</div>
</div>
</form>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>