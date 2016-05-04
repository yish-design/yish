<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<form action="" method="post" name="myform" id="myform">
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
	<div class="table-list col-tab">
		<ul class="tabBut cu-li">
			<li class="on"><?php echo lang('325'); ?></li>
		</ul>
		<div class="contentList pad-10">
				<table width="100%" class="table_form">
				<tr>
                    <th width="200"><?php echo lang('html-028'); ?>： </th>
                    <td>
                    <input name="is_all" type="radio" value="0" onclick="dr_set_type(0)" checked="checked" />&nbsp;<label><?php echo lang('html-651'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_all" type="radio" value="1" onclick="dr_set_type(1)" />&nbsp;<label><?php echo lang('html-652'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_all" type="radio" value="2" onclick="dr_set_type(2)" />&nbsp;<label><?php echo lang('html-708'); ?></label>
                    </td>
                </tr>
				<tr class="dr_0">
                    <th><?php echo lang('html-062'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[mail]" style="width:250px;" />
                    </td>
                </tr>
                <tr class="dr_1" style="display:none">
                    <th><?php echo lang('html-062'); ?>： </th>
                    <td>
                    <textarea class="input-text" name="data[mails]" style="height:200px; width:250px;"></textarea>
                    <br><font color="#999999">多个<?php echo lang('html-062'); ?>按“回车符号”分隔，一行一个<?php echo lang('html-062'); ?></font>
                    </td>
                </tr>
                <tr class="dr_2" style="display:none">
                    <th><?php echo lang('html-348'); ?>： </th>
                    <td>
                        <select name="data[groupid]">
                            <option value=""> <?php echo lang('151'); ?> </option>
                            <?php $return = $this->list_tag("action=cache name=MEMBER.group"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                            <option value="<?php echo $t['id']; ?>"> <?php echo $t['name']; ?> </option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-375'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[title]" style="width:450px;" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-654'); ?>： </th>
                    <td>
                    <?php echo dr_field_input('message', 'Ueditor', array('option' => array( 'mode' => 1, 'height' => 300)), ''); ?>
                    </td>
                </tr>
                <tr class="dr_botton">
                    <th style="border:none;">&nbsp;</th>
                    <td style="border:none;">
                    <input class="button" type="button" name="button" value="<?php echo lang('html-655'); ?>" onclick="dr_send()" />
                    <span id="dr_send_note"></span>
                    </td>
                </tr>
                <tr class="dr_submit" style="display: none">
                    <th style="border:none;">&nbsp;</th>
                    <td style="border:none;">
                        <input class="button" type="submit" name="button" value="<?php echo lang('html-655'); ?>" />
                    </td>
                </tr>
				</table>
            </div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
<!--
function dr_send() {
    var data = $("#myform").serialize();
	$("#dr_send_note").html('<img src="<?php echo SITE_URL; ?>mantob/statics/images/loading.gif">');
	$("#dr_message").val(editor.getContent());
	$.ajax({type: "POST",dataType:"json", url: "<?php echo dr_url('mail/ajaxsend'); ?>&"+Math.random(), data: data,
		success: function(data) {
			if (data.status == 1) {
				$("#dr_send_note").html('<font color=green>'+data.code+'</font>');
			} else {
				$("#dr_send_note").html('<font color=red>'+data.code+'</font>');
			}
		},
		error: function(HttpRequest, ajaxOptions, thrownError) {
			$("#dr_send_note").html('');
			alert(thrownError + "\r\n" + HttpRequest.statusText + "\r\n" + HttpRequest.responseText);
		}
	});
	return false;
}
function dr_set_type(i) {
    $('.dr_0').hide();
    $('.dr_1').hide();
    $('.dr_2').hide();
    $('.dr_'+i).show();
    if (i == '2') {
        $('.dr_botton').hide();
        $('.dr_submit').show();
        $('#myform').attr('action', '<?php echo dr_url('mail/ajaxsend'); ?>');
    } else {
        $('.dr_botton').show();
        $('.dr_submit').hide();
        $('#myform').attr('action', '');
    }
}
//-->
</script>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>