<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
    SwapTab(<?php echo $page; ?>);
    <?php if ($result) { ?>
    art.dialog.tips('<font color=red><?php echo $result; ?></font>', 3, 2);
    <?php } ?>
    $("#dr_row_thumb").addClass("dr_one");
    // 会员组权限联动
    $(".dr_select_all input").click(function(data){
        var _class = $(this).attr("class");
        if ($(this).attr('checked')) {
            $("."+_class).attr("checked",true);
        } else {
            $("."+_class).attr("checked",false);
        }
    });
    // 管理组权限联动
    $(".dr_admin .dr_show").click(function(data){
        if (!$(this).attr('checked')) {
            //设置增删改不可用
            $(this).next(".dr_add").attr("disabled", true);
            $(this).next(".dr_add").next(".dr_edit").attr("disabled", true);
            $(this).next(".dr_add").next(".dr_edit").next(".dr_del").attr("disabled", true);
        } else {
            //设置增删改可用
            $(this).next(".dr_add").attr("disabled", false);
            $(this).next(".dr_add").next(".dr_edit").attr("disabled", false);
            $(this).next(".dr_add").next(".dr_edit").next(".dr_del").attr("disabled", false);
        }
    });
    $(".dr_admin .dr_show").each(function(data){
        if (!$(this).attr('checked')) {
            //设置增删改不可用
            $(this).next(".dr_add").attr("disabled", true);
            $(this).next(".dr_add").next(".dr_edit").attr("disabled", true);
            $(this).next(".dr_add").next(".dr_edit").next(".dr_del").attr("disabled", true);
        } else {
            //设置增删改可用
            $(this).next(".dr_add").attr("disabled", false);
            $(this).next(".dr_add").next(".dr_edit").attr("disabled", false);
            $(this).next(".dr_add").next(".dr_edit").next(".dr_del").attr("disabled", false);
        }
    });
});
function dr_form_check() {
    var radio = $('input[name="_all"]').filter(':checked');
    if (radio.length && radio.val() == 1) {
        if (d_required('names')) return false;
    } else {
        if (d_required('name')) return false;
        if (d_required('dirname')) return false;
    }
    return true;
}
function dr_load_url() {
    var catid = $("#dr_load_catid").val();
    if (catid==0) {
        art.dialog.tips("<font color=red><?php echo lang('html-604'); ?></font>", 3);
        return;
    }
    $.post("<?php echo dr_url(APP_DIR.'/category/urlrule'); ?>&catid="+catid, function(data) {
        if (data) {
            $("#url_show").val(data.show);
            $("#url_show_page").val(data.show_page);
            $("#url_list").val(data.list);
            $("#url_list_page").val(data.list_page);
            $("#url_catjoin").val(data.catjoin);
            <?php if ($extend) { ?>
            $("#url_extend").val(data.extend);
            <?php } ?>
            art.dialog.tips("<?php echo lang('000'); ?>", 3, 1);
        } else {
            art.dialog.tips("<font color=red><?php echo lang('html-605'); ?></font>", 3);
        }
    }, 'json');
}
function dr_select_all() {
    $("#dr_synid").find("option").attr("selected", "selected");
}
</script>
<form action="" method="post" name="myform" id="myform" onsubmit="return dr_form_check()">
<input name="page" id="page" type="hidden" value="<?php echo $page; ?>" />
<input name="backurl" type="hidden" value="<?php echo $backurl; ?>" />
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <?php echo $menu; ?>
    </div>
    <div class="bk10"></div>
    <div class="table-list col-tab">
        <ul class="tabBut cu-li">
            <li onclick="SwapTab(0)"><?php echo lang('html-083'); ?></li>
            <li onclick="SwapTab(1)"><?php echo lang('html-084'); ?></li>
            <li onclick="SwapTab(2)"><?php echo lang('html-215'); ?></li>
            <li onclick="SwapTab(3)"><?php echo lang('html-217'); ?></li>
            <?php if ($data['id']) { ?>
            <li onclick="SwapTab(4)"><?php echo lang('html-218'); ?></li>
            <li onclick="SwapTab(5)"><?php echo lang('html-219'); ?></li>
            <?php } ?>
        </ul>
        <div class="contentList pad-10 dr_table">
            <div id="cnt_0" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
              <!--   <tr>
                    <th width="200"><font color="red">*</font>&nbsp;文本域 </th>
                    <td><textarea name="data[setting][wenben1]" ><?php echo $data['setting']['wenben1']; ?></textarea></td>
                   
                </tr> -->
                <tr>
                    <th width="200"><font color="red">*</font>&nbsp;<?php echo lang('cat-10'); ?>： </th>
                    <td><?php echo $select; ?></td>
                </tr>
                <?php if (!$data['id']) { ?>
                <tr>
                    <th><?php echo lang('cat-11'); ?>： </th>
                    <td>
                    <input type="radio" name="_all" value="0" onclick="$('.dr_more').hide();$('.dr_one').show();" checked />&nbsp;<label><?php echo lang('no'); ?></label>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="_all" value="1" onclick="$('.dr_more').show();$('.dr_one').hide();" />&nbsp;<label><?php echo lang('yes'); ?></label>
                    </td>
                </tr>
                <tr class="dr_more" style="display:none">
                    <th><font color="red">*</font>&nbsp;<?php echo lang('cat-12'); ?>： </th>
                    <td><textarea style="width:200px;height:150px" name="names" id="dr_names" ></textarea>
                    <br><font id="dr_names_tips" color="#999999"><?php echo lang('cat-13'); ?></font>
                    </td>
                </tr>
                <?php } ?>
                <tr class="dr_one">
                    <th><font color="red">*</font>&nbsp;<?php echo lang('cat-14'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[name]" value="<?php echo $data['name']; ?>" id="dr_name" onblur="d_topinyin('dirname','name', 1);" size="20" />
                    <div class="onShow" id="dr_name_tips"><?php echo lang('cat-15'); ?></div>
                    </td>
                </tr>
                <tr class="dr_one">
                    <th><font color="red">*</font>&nbsp;<?php echo lang('cat-08'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[dirname]" id="dr_dirname" value="<?php echo $data['dirname']; ?>" size="20" />
                    <div class="onShow" id="dr_dirname_tips"><?php echo lang('cat-16'); ?></div>
                    </td>
                </tr>
                <tr class="dr_one">
                    <th><?php echo lang('cat-07'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[letter]" id="dr_letter" value="<?php echo $data['letter']; ?>" size="20" />
                    <div class="onShow"><?php echo lang('cat-17'); ?></div>
                    </td>
                </tr>
                    <?php echo $thumb; ?>
                <tr class="">
                    <th><?php echo lang('149'); ?>： </th>
                    <td>
                    <select name="data[setting][urlrule]">
                    <option value="0"> -- </option>
                    <?php $return_u = $this->list_tag("action=cache name=urlrule  return=u"); if ($return_u) extract($return_u); $count_u=count($return_u); if (is_array($return_u)) { foreach ($return_u as $key_u=>$u) {  if ($u['type']==1) { ?><option value="<?php echo $u['id']; ?>" <?php if ($u['id']==$data['setting']['urlrule']) { ?>selected<?php } ?>> <?php echo $u['name']; ?> </option><?php }  } } ?>
                    </select>
                    <div class="onShow"><?php echo lang('html-694'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-357'); ?>： </th>
                    <td>
                    <input type="radio" name="data[show]" value="1" <?php echo dr_set_radio('show', $data['show'], '1', TRUE); ?> />&nbsp;<label><?php echo lang('yes'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="data[show]" value="0" <?php echo dr_set_radio('show', $data['show'], '0'); ?> />&nbsp;<label><?php echo lang('no'); ?></label>
                    <div class="onShow"><?php echo lang('html-358'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-635'); ?>： </th>
                    <td>
                    <input type="radio" name="data[setting][edit]" value="0" <?php if (!$data['setting']['edit']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('yes'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="data[setting][edit]" value="1" <?php if ($data['setting']['edit']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('no'); ?></label>
                    <div class="onShow"><?php echo lang('html-636'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('148'); ?>： </th>
                    <td>
                        <input class="input-text" type="text" name="data[setting][linkurl]" value="<?php echo $data['setting']['linkurl']; ?>" size="60" />
                        <div class="onShow"><?php echo lang('html-736'); ?></div>
                    </td>
                </tr>
                </table>
            </div>
            <div id="cnt_1" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-231'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][seo][show_title]" value="<?php echo $data['setting']['seo']['show_title']; ?>" size="80" />
                    <div class="onShow">&nbsp;<a href="javascript:dr_seo_rule();"><?php echo lang('html-173'); ?></a></div>
                    </td>
                </tr>
                <?php if ($extend) { ?>
                <tr>
                    <th><?php echo lang('html-596'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][seo][extend_title]" value="<?php echo $data['setting']['seo']['extend_title']; ?>" size="80" />
                    <div class="onShow">&nbsp;<a href="javascript:dr_seo_rule();"><?php echo lang('html-173'); ?></a></div>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <th><?php echo lang('html-232'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][seo][list_title]" value="<?php echo $data['setting']['seo']['list_title']; ?>" size="80" />
                    <div class="onShow">&nbsp;<a href="javascript:dr_seo_rule();"><?php echo lang('html-173'); ?></a></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-233'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][seo][list_keywords]" value="<?php echo $data['setting']['seo']['list_keywords']; ?>" size="80" />
                    <div class="onShow">&nbsp;<a href="javascript:dr_seo_rule();"><?php echo lang('html-173'); ?></a></div>
                    </td>
                </tr>
                <tr class="dr_border_none">
                    <th><?php echo lang('html-234'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[setting][seo][list_description]" value="<?php echo $data['setting']['seo']['list_description']; ?>" size="80" />
                    <div class="onShow">&nbsp;<a href="javascript:dr_seo_rule();"><?php echo lang('html-173'); ?></a></div>
                    </td>
                </tr>
                </table>
            </div>
            <div id="cnt_2" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-235'); ?>：</th>
                    <td>
                    <input type="text" class="input-text" size="10" value="<?php echo $data['setting']['template']['pagesize']; ?>" name="data[setting][template][pagesize]" />
                    <div class="onShow"><?php echo lang('html-242'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-240'); ?>：</th>
                    <td>
                    <input type="text" class="input-text" size="30" value="<?php echo $data['setting']['template']['show']; ?>" name="data[setting][template][show]" />
                    <div class="onShow"><?php echo lang('html-241'); ?></div>
                    </td>
                </tr>
                <?php if ($extend) { ?>
                <tr>
                    <th><?php echo lang('html-593'); ?>：</th>
                    <td>
                    <input type="text" class="input-text" size="30" value="<?php echo $data['setting']['template']['extend'] ? $data['setting']['template']['extend'] : 'extend.html' ?>" name="data[setting][template][extend]" />
                    <div class="onShow"><?php echo lang('html-594'); ?></div>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <th><?php echo lang('html-236'); ?>：</th>
                    <td>
                    <input type="text" class="input-text" size="30" value="<?php echo $data['setting']['template']['category']; ?>" name="data[setting][template][category]" />
                    <div class="onShow"><?php echo lang('html-237'); ?></div>
                    </td>
                </tr>
                <tr class="dr_border_none">
                    <th><?php echo lang('html-238'); ?>：</th>
                    <td>
                    <input type="text" class="input-text" size="30" value="<?php echo $data['setting']['template']['list']; ?>" name="data[setting][template][list]" />
                    <div class="onShow"><?php echo lang('html-239'); ?></div>
                    </td>
                </tr>
                </table>
            </div>
            <div id="cnt_3" style="display:none" class="dr_hide">
                <table width="100%" class="table_form dr_admin">
                <?php if (!$data['child']) {  echo dr_admin_rule($role, $data['setting']['admin']); ?>
                <tr>
                    <th width="200"> </th>
                    <td><font color="red"><?php echo lang('html-253'); ?></font></td>
                </tr>
                <?php } else { ?>
                <tr>
                    <th width="200"> </th>
                    <td><font color="red"><b><?php echo lang('html-317'); ?></b></font></td>
                </tr>
                <?php } ?>
                </table>
            </div>
            <?php if ($data['id']) { ?>
            <div id="cnt_4" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                <?php if (!$data['child']) { ?>
                <tr>
                    <td align="left" width="100">&nbsp;</td>
                    <td align="left" width="250"><?php echo lang('html-316'); ?>&nbsp;</td>
                    <td align="left" class="dr_select_all">
                    <label><?php echo lang('deny'); ?></label>&nbsp;<input class="dr_show" name="show" type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('add'); ?></label>&nbsp;<input class="dr_add" name="add" type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('edit'); ?></label>&nbsp;<input class="dr_edit" name="edit" type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('del'); ?></label>&nbsp;<input class="dr_del" name="del" type="checkbox" />&nbsp;&nbsp&nbsp;
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td align="left"><?php echo lang('guest'); ?>&nbsp;</td>
                    <td align="left">
                    <label><?php echo lang('deny'); ?></label>&nbsp;<input class="dr_show" name="rule[0][show]" <?php if ($data['permission'][0]['show']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('add'); ?></label>&nbsp;<input class="dr_add" name="rule[0][add]" <?php if ($data['permission'][0]['add']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
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
                    <label><?php echo lang('deny'); ?></label>&nbsp;<input class="dr_show" name="rule[<?php echo $id; ?>][show]" <?php if ($data['permission'][$id]['show']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('add'); ?></label>&nbsp;<input class="dr_add" name="rule[<?php echo $id; ?>][add]" <?php if ($data['permission'][$id]['add']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('edit'); ?></label>&nbsp;<input class="dr_edit" name="rule[<?php echo $id; ?>][edit]" <?php if ($data['permission'][$id]['edit']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('del'); ?></label>&nbsp;<input class="dr_del" name="rule[<?php echo $id; ?>][del]" <?php if ($data['permission'][$id]['del']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <a href="javascript:;" onclick="dr_member_rule('<?php echo $id; ?>', '<?php echo dr_url(APP_DIR."/category/rule", array("catid"=>$data['id'], "id"=>$id)); ?>', '<?php echo $group['name']; ?>-<?php echo $level['name']; ?>')" class="blue">[<?php echo lang('113'); ?>]</a>
                    <div id="dr_status_<?php echo $id; ?>" class="onShow"></div>
                    </td>
                </tr>
                <?php } }  } else { ?>
                <tr>
                    <?php $id=$group['id']; ?>
                    <td align="left">&nbsp;</td>
                    <td align="left"><?php echo $group['name']; ?></td>
                    <td align="left">
                    <label><?php echo lang('deny'); ?></label>&nbsp;<input class="dr_show" name="rule[<?php echo $id; ?>][show]" <?php if ($data['permission'][$id]['show']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('add'); ?></label>&nbsp;<input class="dr_add" name="rule[<?php echo $id; ?>][add]" <?php if ($data['permission'][$id]['add']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('edit'); ?></label>&nbsp;<input class="dr_edit" name="rule[<?php echo $id; ?>][edit]" <?php if ($data['permission'][$id]['edit']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <label><?php echo lang('del'); ?></label>&nbsp;<input class="dr_del" name="rule[<?php echo $id; ?>][del]" <?php if ($data['permission'][$id]['del']) { ?>checked<?php } ?> value=1 type="checkbox" />&nbsp;&nbsp&nbsp;
                    <a href="javascript:;" onclick="dr_member_rule('<?php echo $id; ?>', '<?php echo dr_url(APP_DIR."/category/rule", array("catid"=>$data['id'], "id"=>$id)); ?>', '<?php echo $group['name']; ?>')" class="blue">[<?php echo lang('113'); ?>]</a>
                    <div id="dr_status_<?php echo $id; ?>" class="onShow"></div>
                    </td>
                </tr>
                <?php }  } } ?>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td><font color="gray"><?php echo lang('html-254'); ?></font></td>
                </tr>
                <?php } else { ?>
                <tr>
                    <th width="200"> </th>
                    <td> </td>
                    <td><font color="red"><b><?php echo lang('html-317'); ?></b></font></td>
                </tr>
                <?php } ?>
                </table>
            </div>
            <div id="cnt_5" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                <tr>
                    <th><?php echo lang('html-024'); ?>：</th>
                    <td>
                    <?php echo $select_syn; ?>
                        <input value="<?php echo lang('html-605'); ?>" type="button" onclick="dr_select_all()" name="button" class="button" />
                    <br>
                    <font color="gray"><?php echo lang('cat-21'); ?></font></td>
                </tr>
                <tr>
                    <th width="200"><?php echo lang('html-023'); ?>：</th>
                    <td>
                    <label><?php echo lang('html-084'); ?></label>&nbsp;<input name="syn[]" type="checkbox" value="1">&nbsp;&nbsp;
                    <label><?php echo lang('html-215'); ?></label>&nbsp;<input name="syn[]" type="checkbox" value="2" checked="">&nbsp;&nbsp;
                    <label><?php echo lang('html-217'); ?></label>&nbsp;<input name="syn[]" type="checkbox" value="3" checked="">&nbsp;&nbsp;
                    <label><?php echo lang('html-218'); ?></label>&nbsp;<input name="syn[]" type="checkbox" value="4" checked="">&nbsp;&nbsp;
                    <label><?php echo lang('149'); ?></label>&nbsp;<input name="syn[]" type="checkbox" value="5" checked="">&nbsp;&nbsp;
                    </td>
                </tr>
                </table>
            </div>
            <?php } ?>
            <table width="100%" class="table_form">
            <tr>
                <th width="200"> </th>
                <td><input value="<?php echo lang('submit'); ?>" type="submit" name="submit" class="button" />
                </td>
            </tr>
            </table>
        </div>
    </div>
</div>
</form>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>