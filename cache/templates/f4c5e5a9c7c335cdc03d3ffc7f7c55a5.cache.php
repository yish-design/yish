<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	SwapTab(0);
	<?php if ($result) { ?>
	art.dialog.tips('<?php echo $result; ?>', 3);
	<?php }  if ($member_rule) { ?>
	$(".dr_select_all input").click(function(data){
		var _class = $(this).attr("class");
		if ($(this).attr('checked')) {
			$("."+_class).attr("checked",true);
		} else {
			$("."+_class).attr("checked",false);
		}
	});
	<?php } ?>
	// 会员组权限联动
	$(".dr_select_all input").click(function(data){
		var _class = $(this).attr("class");
		if ($(this).attr('checked')) {
			$("."+_class).attr("checked",true);
		} else {
			$("."+_class).attr("checked",false);
		}
	});
     // 关闭搜索
    <?php if ($data['setting']['search']['close']) { ?>dr_set_search(1);<?php } ?>
});
function dr_set_search(v){
    if (v == 1) {
        $(".dr_search").hide();
    } else {
        $(".dr_search").show();
    }
}
function sitetips(_this) {
	var id = $(_this).attr("sid");
	if (!$(_this).attr("checked")) {
		art.dialog.confirm("<?php echo lang('html-152'); ?>", function(){
			$(".dr_site_"+id).hide();
			return true;
		}, function(){
			$(".dr_site_"+id).show();
			$(_this).attr("checked", "checked");
		});
	} else {
		$(".dr_site_"+id).show();
	}
}

function dr_admin_rule(id, url, title) {
	var throughBox = $.dialog.through; // 创建窗口
	var dr_Dialog = throughBox({title: title});
	// ajax调用窗口内容
	$.ajax({type: "GET", url:url, dataType:'text', success: function (text) {
			var win = $.dialog.top;
			dr_Dialog.content(text);
			// 添加按钮
			dr_Dialog.button({name: fc_lang[36], callback:function() {
					win.$("#mark").val("0"); // 标示可以提交表单
					if (win.dr_form_check()) { // 按钮返回验证表单函数
						var _data = win.$("#myform").serialize();
						$.ajax({type: "POST",dataType:"json", url: url, data: _data, // 将表单数据ajax提交验证
							success: function(data) {
								$("#dr_status_"+id).attr("class", "onCorrect");
								$("#dr_status_"+id).html("&nbsp;&nbsp;");
								$.dialog.tips(fc_lang[37], 2, 1);
								dr_Dialog.close();
							},
							error: function(HttpRequest, ajaxOptions, thrownError) {
								alert(HttpRequest.responseText);
							}
						});
					}
					return false;
				},
				focus: true
			});
	    },
	    error: function(HttpRequest, ajaxOptions, thrownError) {
			alert(HttpRequest.responseText);
		}
	});
}

function dr_set_flag(id) {
	art.dialog.open('<?php echo dr_url("module/flag"); ?>', {
		title: '<?php echo lang("html-175"); ?>',
		init: function () {
			var iframe = this.iframe.contentWindow;
			$(".dr_flag_"+id).each(function(){
				var iid = $(this).attr('iid');
				iframe.document.getElementById('top_dr_flag_'+iid).value = Math.abs($("#dr_flag_"+id+"_"+iid).val());
			});
		},
		ok: function () {
			var iframe = this.iframe.contentWindow;
			if (!iframe.document.body) {
				alert('iframe loading')
				return false;
			};
			$(".dr_flag_"+id).each(function(){
				var iid = $(this).attr('iid');
				$("#dr_flag_"+id+"_"+iid).val(iframe.document.getElementById('top_dr_flag_'+iid).value);
			});
			$("#dr_status_"+id).attr("class", "onCorrect");
			$("#dr_status_"+id).html("&nbsp;&nbsp;");
			return true;
		},
		cancel: true
	});
}
</script>
<form action="" method="post" name="myform" id="myform">
<input name="page" id="page" type="hidden" value="<?php echo $page; ?>" />
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
        <?php if ($all) {  echo $menu; ?><span>|</span><a href="http://www.mantob.com/help/list-341.html" target="_blank"><em><?php echo lang('help'); ?></em></a>
        <?php } else { ?>
        <a href="javascript:;" class="on"><em><?php echo lang('061'); ?></em></a>
        <?php } ?>
	</div>
	<div class="bk10"></div>
	<div class="table-list col-tab">
		<ul class="tabBut cu-li">
			<li onclick="SwapTab(0)"><?php echo lang('html-083'); ?></li>
			<li onclick="SwapTab(1)"><?php echo lang('html-217'); ?></li>
			<li onclick="SwapTab(2)"><?php echo lang('html-218'); ?></li>
			<li onclick="SwapTab(3)"><?php echo lang('html-174'); ?></li>
			<li onclick="SwapTab(4)"><?php echo lang('html-084'); ?></li>
			<li onclick="SwapTab(5)"><?php echo lang('html-327'); ?></li>
			<li onclick="SwapTab(6)"><?php echo lang('html-544'); ?></li>
			<li onclick="SwapTab(7)"><?php echo lang('html-550'); ?></li>
		</ul>
		<div class="contentList pad-10">
			<div id="cnt_0" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
				<tr>
					<th width="200"><?php echo lang('html-583'); ?>： </th>
					<td>
						<input class="input-text" type="text" name="name" value="<?php echo $name; ?>" size="11" />
                    </td>
				</tr>
				<tr>
					<th><?php echo lang('html-697'); ?>： </th>
					<td>
						<input type="radio" name="data[sitemap]" value="1" <?php if ($data['sitemap']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="radio" name="data[sitemap]" value="0" <?php if (!$data['sitemap']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
						<div class="onShow"><?php echo lang('html-698'); ?></div>
                    </td>
				</tr>
				<?php if (is_array($SITE)) { $count=count($SITE);foreach ($SITE as $sid=>$t) {  if ($all || (!$all && SITE_ID==$sid)) { ?>
				<tr>
					<th style="font-weight:700;<?php if ($sid>1) { ?>padding-top:30px;<?php } ?>"><?php echo dr_strcut($t['SITE_NAME'], 25); ?>： </th>
					<td style="font-weight:700;<?php if ($sid>1) { ?>padding-top:30px;<?php } ?>">
                    <?php echo lang('html-153'); ?>&nbsp;&nbsp;<input name="data[site][<?php echo $sid; ?>][use]" type="checkbox" onclick="sitetips(this)" sid="<?php echo $sid; ?>" value="<?php echo $sid; ?>" <?php if ($data['site'][$sid]['use']) { ?>checked="checked"<?php } ?> />
                    </td>
				</tr>
				<tr class="dr_site_<?php echo $sid; ?>" <?php if (!$data['site'][$sid]['use']) { ?>style="display:none"<?php } ?>>
					<th><?php echo lang('html-097'); ?>： </th>
					<td>
					<select name="data[site][<?php echo $sid; ?>][theme]">
                    <option value="default"> -- </option>
                    <?php if (is_array($theme)) { $count=count($theme);foreach ($theme as $t) { ?>
                    <option<?php if ($t==$data['site'][$sid]['theme']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					<div class="onShow"><?php echo dr_lang('html-619', $data['dirname']); ?></div>
					</td>
				</tr>
				<tr class="dr_site_<?php echo $sid; ?>" <?php if (!$data['site'][$sid]['use']) { ?>style="display:none"<?php } ?>>
					<th><?php echo lang('html-099'); ?>： </th>
					<td>
					<select name="data[site][<?php echo $sid; ?>][template]">
                    <option value="default"> -- </option>
                    <?php if (is_array($template_path)) { $count=count($template_path);foreach ($template_path as $t) { ?>
                    <option<?php if ($t==$data['site'][$sid]['template']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					<div class="onShow"><?php echo dr_lang('html-620', $data['dirname']); ?></div>
					</td>
				</tr>
				<tr class="dr_site_<?php echo $sid; ?>" <?php if (!$data['site'][$sid]['use']) { ?>style="display:none"<?php } ?>>
					<th><?php echo lang('html-621'); ?>： </th>
					<td>
                    <input type="radio" name="data[site][<?php echo $sid; ?>][html]" value="1" <?php if ($data['site'][$sid]['html']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" name="data[site][<?php echo $sid; ?>][html]" value="0" <?php if (!$data['site'][$sid]['html']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<?php if ($sid>1) { ?><div class="onShow"><?php echo lang('html-622'); ?></div><?php } ?>
                    </td>
				</tr>
				<tr class="dr_site_<?php echo $sid; ?>" <?php if (!$data['site'][$sid]['use']) { ?>style="display:none"<?php } ?>>
					<th><?php echo lang('html-155'); ?>： </th>
					<td>
                    <input class="input-text" type="text" name="data[site][<?php echo $sid; ?>][domain]" value="<?php echo $data['site'][$sid]['domain']; ?>" size="30" />
                    <?php if ($data['site'][$sid]['domain']) {  if ($data['site'][$sid]['domain'] == SITE_DOMAIN) { ?>
                        <div class="onError"><?php echo dr_lang('html-730', $data['site'][$sid]['domain']); ?></div>
                        <?php } else { ?>
                        <script>
                            $.get("<?php echo dr_url('home/domain', array('domain' => $data['site'][$sid]['domain'])); ?>", function(data){
                                if (data) {
                                    $("#dr_domian_<?php echo $sid; ?>").html(data);
                                } else {
                                    $("#dr_domian_<?php echo $sid; ?>").hide();
                                }
                            });
                        </script>
                        <div id="dr_domian_<?php echo $sid; ?>" class="onError"></div>
                        <?php }  } else { ?>
                        <div class="onShow"><?php echo lang('html-090'); ?></div>
                    <?php } ?>
                    </td>
				</tr>
				<tr class="dr_site_<?php echo $sid; ?>" <?php if (!$data['site'][$sid]['use']) { ?>style="display:none"<?php } ?>>
					<th style="color: blue"><?php echo lang('html-623'); ?>： </th>
					<td style="color: blue"><?php echo FCPATH;  echo $data['dirname']; ?>/</td>
				</tr>
				<?php if ($sid > 1) { ?>
				<tr class="dr_site_<?php echo $sid; ?>" <?php if (!$data['site'][$sid]['use']) { ?>style="display:none"<?php } ?>>
					<th style="color: blue"><?php echo lang('html-624'); ?>： </th>
					<td style="color: blue"><?php echo FCPATH;  echo $data['dirname']; ?>/html/<?php echo $sid; ?>/</td>
				</tr>
				<?php }  }  } } ?>
				</table>
			</div>
            <div id="cnt_1" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <?php if (is_array($role)) { $count=count($role);foreach ($role as $t) {  if ($t['id'] > 1) { ?>
                <tr>
                    <th width="200"><?php echo $t['name']; ?>： </th>
                    <td><a href="javascript:;" onclick="dr_admin_rule('<?php echo $t['id']; ?>', '<?php echo dr_url("module/role", array("dir" => $data['dirname'], "id" => $t['id'])); ?>', '<?php echo $t['name']; ?>')" class="blue">[<?php echo lang('028'); ?>]</a>
					<div id="dr_status_<?php echo $t['id']; ?>" class="onShow"></div>
					</td>
                </tr>
                <?php }  } } ?>
				</table>
			</div>
            <div id="cnt_2" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
					<td align="left" width="100">&nbsp;</td>
					<td align="left" width="250"><?php echo lang('html-316'); ?>&nbsp;</td>
					<td align="left" class="dr_select_all">
					<label><?php echo lang('html-511'); ?></label>&nbsp;<input class="dr_use" type="checkbox" />
					</td>
				</tr>
				<?php $return_group = $this->list_tag("action=cache name=MEMBER.group  return=group"); if ($return_group) extract($return_group); $count_group=count($return_group); if (is_array($return_group)) { foreach ($return_group as $key_group=>$group) {  if ($group['id'] > 2) { ?>
				<tr>
					<td align="left">&nbsp;</td>
					<td align="left"><?php echo $group['name']; ?></td>
					<td align="left"></td>
				</tr>
				<?php if (is_array($group['level'])) { $count=count($group['level']);foreach ($group['level'] as $level) { ?>
				<tr>
					<?php $id=$group['id'].'_'.$level['id']; ?>
					<td align="left">&nbsp;</td>
					<td align="left" style="padding-left:40px"><?php echo $level['name']; ?>&nbsp;&nbsp;<?php echo dr_show_stars($level['stars']); ?></td>
					<td align="left">
					<label><?php echo lang('html-511'); ?></label>&nbsp;<input class="dr_use" name="data[setting][member][<?php echo $id; ?>]" <?php if ($data['setting']['member'][$id]) { ?>checked<?php } ?> value=1 type="checkbox" />
					</td>
				</tr>
				<?php } }  } else { ?>
				<tr>
					<?php $id=$group['id']; ?>
					<td align="left" width="100">&nbsp;</td>
					<td align="left" width="250"><?php echo $group['name']; ?></td>
					<td align="left">
					<label><?php echo lang('html-511'); ?></label>&nbsp;<input class="dr_use" name="data[setting][member][<?php echo $id; ?>]" <?php if ($data['setting']['member'][$id]) { ?>checked<?php } ?> value=1 type="checkbox" />
					</td>
				</tr>
				<?php }  } } ?>
				<tr>
                    <td> </td>
                    <td> </td>
                    <td><font color="gray"><?php echo lang('html-512'); ?></font></td>
                </tr>
				</table>
			</div>
			<div id="cnt_3" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <?php for ($i = 1; $i <= 9; $i ++) { ?>
                <tr <?php if ($i==9) { ?>class=""<?php } ?>>
                    <th width="200">&nbsp;(<?php echo $i; ?>)</th>
                    <td align="left">
                    <input class="input-text" name="data[setting][flag][<?php echo $i; ?>][name]" type="text" value="<?php echo isset($data['setting']['flag'][$i]['name']) ? $data['setting']['flag'][$i]['name'] : ''; ?>" style="width:200px;"/>
                    <?php $return_group = $this->list_tag("action=cache name=MEMBER.group  return=group"); if ($return_group) extract($return_group); $count_group=count($return_group); if (is_array($return_group)) { foreach ($return_group as $key_group=>$group) {  if ($group['id'] > 2) {  if (is_array($group['level'])) { $count=count($group['level']);foreach ($group['level'] as $level) {  $iid=$group['id'].'_'.$level['id']; ?>
                            <input name="data[setting][flag][<?php echo $i; ?>][<?php echo $iid; ?>]" class="dr_flag_<?php echo $i; ?>" iid="<?php echo $iid; ?>" id="dr_flag_<?php echo $i; ?>_<?php echo $iid; ?>" type="hidden" value="<?php echo intval($data['setting']['flag'][$i][$iid]); ?>" />
                        <?php } }  }  } } ?>
                    <a href="javascript:;" onclick="dr_set_flag('<?php echo $i; ?>')" style="color:#06F">[<?php echo lang('html-175'); ?>]</a>
					<div id="dr_status_<?php echo $i; ?>" class="onShow"></div>
                    </td>
                </tr>
                <?php } ?>
				</table>
			</div>
            <div id="cnt_4" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
					<th width="200">Title： </th>
					<td><input class="input-text" type="text" name="data[setting][seo][module_title]" value="<?php echo $data['setting']['seo']['module_title']; ?>" size="80" />
					</td>
				</tr>
				<tr>
					<th>Keywords： </th>
					<td><input class="input-text" type="text" name="data[setting][seo][module_keywords]" value="<?php echo $data['setting']['seo']['module_keywords']; ?>" size="80" />
					</td>
				</tr>
				<tr class="">
					<th>Description： </th>
					<td><input class="input-text" type="text" name="data[setting][seo][module_description]" value="<?php echo $data['setting']['seo']['module_description']; ?>" size="80" />
					</td>
				</tr>
				</table>
			</div>
           	<div id="cnt_5" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-332'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][tag][pagesize]" value="<?php echo $data['setting']['tag']['pagesize']; ?>" size="10" />
                    <div class="onShow"><?php echo lang('html-333'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('html-328'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][tag][url]" value="<?php echo $data['setting']['tag']['url']; ?>" size="40" />
                    <div class="onShow"><?php echo lang('html-330'); ?></div></td>
                </tr>
                <tr class="">
                    <th><?php echo lang('html-329'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][tag][url_page]" value="<?php echo $data['setting']['tag']['url_page']; ?>" size="40" />
                    <div class="onShow"><?php echo lang('html-331'); ?></div></td>
                </tr>
				</table>
			</div>
            <div id="cnt_6" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-037'); ?>： </th>
                    <td>
                        <input type="radio" name="data[setting][search][close]" <?php if ($data['setting']['search']['close']) { ?>checked<?php } ?> onclick="dr_set_search(1)" value="1" />&nbsp;<label><?php echo lang('yes'); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="data[setting][search][close]" <?php if (!$data['setting']['search']['close']) { ?>checked<?php } ?> onclick="dr_set_search(0)" value="0" />&nbsp;<label><?php echo lang('no'); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="onShow"><?php echo lang('html-038'); ?></div>
                    </td>
                </tr>
                <tr class="dr_search">
                    <th><?php echo lang('html-545'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][search][cache]" value="<?php if (isset($data['setting']['search']['cache'])) {  echo $data['setting']['search']['cache'];  } else { ?>10000<?php } ?>" size="10" />
                        <div class="onShow"><?php echo lang('html-547'); ?></div></td>
                </tr>
                <tr class="dr_search">
                    <th><?php echo lang('html-633'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][search][total]" value="<?php if (isset($data['setting']['search']['total'])) {  echo $data['setting']['search']['total'];  } else { ?>500<?php } ?>" size="10" />
                    <div class="onShow"><?php echo lang('html-634'); ?></div></td>
                </tr>
                <tr class="dr_search">
                    <th><?php echo lang('html-546'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][search][length]" value="<?php if ($data['setting']['search']['length']) {  echo $data['setting']['search']['length'];  } else { ?>4<?php } ?>" size="10" />
                    <div class="onShow"><?php echo lang('html-548'); ?></div></td>
                </tr>
                <tr class="dr_search">
                    <th><?php echo lang('html-328'); ?>： </th>
                    <td>
					<input type="radio" name="data[setting][search][rewrite]" <?php if ($data['setting']['search']['rewrite']) { ?>checked<?php } ?> value="1" />&nbsp;<label><?php echo lang('yes'); ?></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[setting][search][rewrite]" <?php if (!$data['setting']['search']['rewrite']) { ?>checked<?php } ?> value="0" />&nbsp;<label><?php echo lang('no'); ?></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="onShow"><?php echo lang('html-585'); ?></div>
					</td>
                </tr>
				</table>
			</div>
            <div id="cnt_7" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-551'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][show_cache]" value="<?php if ($data['setting']['show_cache']) {  echo $data['setting']['show_cache'];  } else { ?>10000<?php } ?>" size="10" />
                    <div class="onShow"><?php echo lang('html-547'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('html-741'); ?>： </th>
                    <td>
                        <input type="radio" name="data[setting][postselect]" <?php if ($data['setting']['postselect']) { ?>checked<?php } ?> value="1" />&nbsp;<label><?php echo lang('yes'); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="data[setting][postselect]" <?php if (!$data['setting']['postselect']) { ?>checked<?php } ?> value="0" />&nbsp;<label><?php echo lang('no'); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="onShow"><?php echo lang('html-742'); ?></div>
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
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>