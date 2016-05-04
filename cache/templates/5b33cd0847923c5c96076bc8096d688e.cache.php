<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	SwapTab(<?php echo $page; ?>);
	<?php if ($result == 1) { ?>
	art.dialog.tips('<?php echo lang("014"); ?>', 3, 1);
    <?php } else if ($result) { ?>
        art.dialog.tips('<?php echo $result; ?>', 3);
    <?php } ?>
    dr_remote(<?php echo intval($data['SITE_ATTACH_REMOTE']); ?>);
	dr_set_mw_type(<?php echo intval($data['SITE_IMAGE_TYPE']); ?>);
    <?php if (empty($data['SITE_IMAGE_WATERMARK'])) { ?>
    $('.dr_image').hide();
    <?php } else { ?>
    $('.dr_image').show();
    <?php } ?>
});
function dr_form_check() {
	if (d_required('name')) return false;
	if (d_isdomain('domain')) return false;
	return true;
}
function dr_set_mw_type(id) {
	$(".dr_mw_1").hide();
	$(".dr_mw_0").hide();
	$(".dr_mw_"+id).show();
}
function dr_remote(id) {
	$(".r1").hide();
    $(".r2").hide();
    $(".r3").hide();
	$(".r"+id).show();
}
function dr_aliyun_host(val) {
    $('#aliyun').val('http://'+$('#aliyun_bucket').val()+'.'+val);
}
</script>
<form action="" method="post" name="myform" id="myform" onsubmit="return dr_form_check()">
<input name="page" id="page" type="hidden" value="<?php echo $page; ?>" />
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.com/help/list-341.html" target="_blank"><em><?php echo lang('help'); ?></em></a>
	</div>
	<div class="bk10"></div>
	<div class="table-list col-tab">
		<ul class="tabBut cu-li">
			<li onclick="SwapTab(0)"><?php echo lang('html-083'); ?></li>
			<li onclick="SwapTab(1)"><?php echo lang('html-289'); ?></li>
			<li onclick="SwapTab(2)"><?php echo lang('html-084'); ?></li>
			<li onclick="SwapTab(3)"><?php echo lang('html-085'); ?></li>
			<li onclick="SwapTab(4)"><?php echo lang('html-086'); ?></li>
			<li onclick="SwapTab(5)"><?php echo lang('html-542'); ?></li>
			<li onclick="SwapTab(6)"><?php echo lang('html-550'); ?></li>
		</ul>
		<div class="contentList pad-10">
			<div id="cnt_0" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-089'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="domain" id="dr_domain" value="<?php echo $data['SITE_DOMAIN']; ?>" size="25" />
                    <?php if ($data['SITE_DOMAIN']) { ?>
                    <script>
                        $.get("<?php echo dr_url('home/domain', array('domain' => $data['SITE_DOMAIN'])); ?>", function(data){
                            if (data) {
                                $("#dr_domian").html(data);
                            } else {
                                $("#dr_domian").hide();
                            }
                        });
                    </script>
                    <div id="dr_domian" class="onError"></div>
                    <?php } else { ?>
                    <div class="onShow" id="dr_domain_tips"><?php echo lang('html-090'); ?></div>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-087'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_NAME]" id="dr_name" value="<?php echo $data['SITE_NAME']; ?>" size="40" />
                    <div class="onShow" id="dr_name_tips"><?php echo lang('html-088'); ?></div>
                    </td>
                </tr>
                <tr>
					<th><?php echo lang('html-093'); ?>： </th>
					<td>
					<input class="input-text" type="text" name="data[SITE_TIME_FORMAT]" value="<?php echo $data['SITE_TIME_FORMAT']; ?>" size="15" />
					<div class="onShow"><?php echo lang('html-094'); ?></div>
					</td>
				</tr>
                <tr>
					<th><?php echo lang('html-095'); ?>： </th>
					<td>
					<select name="data[SITE_LANGUAGE]">
                    <option value="zh-cn"> -- </option>
                    <?php if (is_array($lang)) { $count=count($lang);foreach ($lang as $t) { ?>
                    <option<?php if ($t==$data['SITE_LANGUAGE']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
                    <div class="onShow"><?php echo lang('html-096'); ?></div>
					</td>
				</tr>
                <tr>
					<th><?php echo lang('html-097'); ?>： </th>
					<td>
					<select name="data[SITE_THEME]">
                    <option value="default"> -- </option>
                    <?php if (is_array($theme)) { $count=count($theme);foreach ($theme as $t) { ?>
                    <option<?php if ($t==$data['SITE_THEME']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					<div class="onShow"><?php echo lang('html-098'); ?></div>
					</td>
				</tr>
               <tr>
					<th><?php echo lang('html-099'); ?>： </th>
					<td>
					<select name="data[SITE_TEMPLATE]">
                    <option value="default"> -- </option>
                    <?php if (is_array($template_path)) { $count=count($template_path);foreach ($template_path as $t) { ?>
                    <option<?php if ($t==$data['SITE_TEMPLATE']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					<div class="onShow"><?php echo lang('html-100'); ?></div>
					</td>
				</tr>
                <tr class="">
					<th><?php echo lang('html-101'); ?>： </th>
					<td>
					<select name="data[SITE_TIMEZONE]">
					<option value=""> -- </option>
					<option value="-12" <?php if ($data['SITE_TIMEZONE']=="-12") { ?>selected<?php } ?>>(GMT -12:00)</option>
					<option value="-11" <?php if ($data['SITE_TIMEZONE']=="-11") { ?>selected<?php } ?>>(GMT -11:00)</option>
					<option value="-10" <?php if ($data['SITE_TIMEZONE']=="-10") { ?>selected<?php } ?>>(GMT -10:00)</option>
					<option value="-9" <?php if ($data['SITE_TIMEZONE']=="-9") { ?>selected<?php } ?>>(GMT -09:00)</option>
					<option value="-8" <?php if ($data['SITE_TIMEZONE']=="-8") { ?>selected<?php } ?>>(GMT -08:00)</option>
					<option value="-7" <?php if ($data['SITE_TIMEZONE']=="-7") { ?>selected<?php } ?>>(GMT -07:00)</option>
					<option value="-6" <?php if ($data['SITE_TIMEZONE']=="-6") { ?>selected<?php } ?>>(GMT -06:00)</option>
					<option value="-5" <?php if ($data['SITE_TIMEZONE']=="-5") { ?>selected<?php } ?>>(GMT -05:00)</option>
					<option value="-4" <?php if ($data['SITE_TIMEZONE']=="-4") { ?>selected<?php } ?>>(GMT -04:00)</option>
					<option value="-3.5" <?php if ($data['SITE_TIMEZONE']=="-3.5") { ?>selected<?php } ?>>(GMT -03:30)</option>
					<option value="-3" <?php if ($data['SITE_TIMEZONE']=="-3") { ?>selected<?php } ?>>(GMT -03:00)</option>
					<option value="-2" <?php if ($data['SITE_TIMEZONE']=="-2") { ?>selected<?php } ?>>(GMT -02:00)</option>
					<option value="-1" <?php if ($data['SITE_TIMEZONE']=="-1") { ?>selected<?php } ?>>(GMT -01:00)</option>
					<option value="0" <?php if ($data['SITE_TIMEZONE']=="0") { ?>selected<?php } ?>>(GMT)</option>
					<option value="1" <?php if ($data['SITE_TIMEZONE']=="1") { ?>selected<?php } ?>>(GMT +01:00)</option>
					<option value="2" <?php if ($data['SITE_TIMEZONE']=="2") { ?>selected<?php } ?>>(GMT +02:00)</option>
					<option value="3" <?php if ($data['SITE_TIMEZONE']=="3") { ?>selected<?php } ?>>(GMT +03:00)</option>
					<option value="3.5" <?php if ($data['SITE_TIMEZONE']=="3.5") { ?>selected<?php } ?>>(GMT +03:30)</option>
					<option value="4" <?php if ($data['SITE_TIMEZONE']=="4") { ?>selected<?php } ?>>(GMT +04:00)</option>
					<option value="4.5" <?php if ($data['SITE_TIMEZONE']=="4.5") { ?>selected<?php } ?>>(GMT +04:30)</option>
					<option value="5" <?php if ($data['SITE_TIMEZONE']=="5") { ?>selected<?php } ?>>(GMT +05:00)</option>
					<option value="5.5" <?php if ($data['SITE_TIMEZONE']=="5.5") { ?>selected<?php } ?>>(GMT +05:30)</option>
					<option value="5.75" <?php if ($data['SITE_TIMEZONE']=="5.75") { ?>selected<?php } ?>>(GMT +05:45)</option>
					<option value="6" <?php if ($data['SITE_TIMEZONE']=="6") { ?>selected<?php } ?>>(GMT +06:00)</option>
					<option value="6.5" <?php if ($data['SITE_TIMEZONE']=="6.6") { ?>selected<?php } ?>>(GMT +06:30)</option>
					<option value="7" <?php if ($data['SITE_TIMEZONE']=="7") { ?>selected<?php } ?>>(GMT +07:00)</option>
					<option value="8" <?php if ($data['SITE_TIMEZONE']=="" || $data['SITE_TIMEZONE']=="8") { ?>selected<?php } ?>>(GMT +08:00)</option>
					<option value="9" <?php if ($data['SITE_TIMEZONE']=="9") { ?>selected<?php } ?>>(GMT +09:00)</option>
					<option value="9.5" <?php if ($data['SITE_TIMEZONE']=="9.5") { ?>selected<?php } ?>>(GMT +09:30)</option>
					<option value="10" <?php if ($data['SITE_TIMEZONE']=="10") { ?>selected<?php } ?>>(GMT +10:00)</option>
					<option value="11" <?php if ($data['SITE_TIMEZONE']=="11") { ?>selected<?php } ?>>(GMT +11:00)</option>
					<option value="12" <?php if ($data['SITE_TIMEZONE']=="12") { ?>selected<?php } ?>>(GMT +12:00)</option>
					</select>
					<div class="onShow"><?php echo lang('html-102'); ?></div>
					</td>
				</tr>
				</table>
			</div>
            <div id="cnt_1" style="display:none" class="dr_hide">
                <table width="100%" class="table_form">
                    <tr>
                        <th width="200"><?php echo dr_lang('html-290', lang('html-289')); ?>： </th>
                        <td>
                            <input class="input-text" type="text" name="data[SITE_MOBILE]" value="<?php echo $data['SITE_MOBILE']; ?>" size="25" />
                            <?php if ($data['SITE_MOBILE'] == $data['SITE_DOMAIN']) { ?>
                            <div class="onError">此域名不能与站点域名相同</div>
                            <?php } else if ($data['SITE_MOBILE']) { ?>
                            <script>
                                $.get("<?php echo dr_url('home/domain', array('domain' => $data['SITE_MOBILE'])); ?>", function(data){
                                    if (data) {
                                        $("#dr_mb_domian").html(data);
                                    } else {
                                        $("#dr_mb_domian").hide();
                                    }
                                });
                            </script>
                            <div id="dr_mb_domian" class="onError"></div>
                            <?php } else { ?>
                            <div class="onShow" id="dr_domain_tips"><?php echo lang('html-090'); ?></div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo lang('html-744'); ?>： </th>
                        <td>
                            <input type="radio" name="data[SITE_MOBILE_OPEN]" value="1" <?php if ($data['SITE_MOBILE_OPEN']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="data[SITE_MOBILE_OPEN]" value="0" <?php if (empty($data['SITE_MOBILE_OPEN'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
                            <div class="onShow"><?php echo lang('html-745'); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo lang('html-075'); ?>： </th>
                        <td>
                           <div class="onShow"><?php echo lang('html-674'); ?></div>
                        </td>
                    </tr>
                </table>
            </div>
			<div id="cnt_2" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-171'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[SITE_SEOJOIN]" value="<?php echo $data['SITE_SEOJOIN'] ? $data['SITE_SEOJOIN'] : '_'; ?>" size="7" />
                    <div class="onShow"><?php echo lang('html-172'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('html-103'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_TITLE]" value="<?php echo $data['SITE_TITLE']; ?>" style="width:525px;" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-104'); ?>： </th>
                    <td>
                    <textarea class="text" style="width:520px;height:50px;" name="data[SITE_KEYWORDS]"><?php echo $data['SITE_KEYWORDS']; ?></textarea>
                    </td>
                </tr>
                <tr class="">
                    <th><?php echo lang('html-105'); ?>： </th>
                    <td>
                    <textarea class="text" style="width:520px;height:80px;" name="data[SITE_DESCRIPTION]"><?php echo $data['SITE_DESCRIPTION']; ?></textarea>
                    </td>
                </tr>
                </table>
            </div>
			<div id="cnt_3" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
				<tr>
                    <th width="200"><?php echo lang('html-085'); ?>： </th>
                    <td>
                    <?php if (is_array($remote_type)) { $count=count($remote_type);foreach ($remote_type as $i=>$t) { ?>
                    <input onclick="dr_remote(<?php echo $i; ?>)" type="radio" name="data[SITE_ATTACH_REMOTE]" value="<?php echo $i; ?>" <?php if ($data['SITE_ATTACH_REMOTE'] == $i) { ?>checked<?php } ?> />&nbsp;<label><?php echo $t; ?></label>
                    &nbsp;&nbsp;&nbsp;
                    <?php } } ?>
					<div class="onShow"><?php echo lang('html-106'); ?></div>
                    </td>
                </tr>
                <tr class="r1">
                    <th><?php echo lang('html-107'); ?>： </th>
                    <td>
                    <input id="host" class="input-text" type="text" name="data[remote][1][SITE_ATTACH_HOST]" value="<?php echo $data['remote'][1]['SITE_ATTACH_HOST']; ?>" size="25" />
					<div class="onShow"><?php echo lang('html-108'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-109'); ?>： </th>
                    <td>
                    <input id="port" class="input-text" type="text" name="data[remote][1][SITE_ATTACH_PORT]" value="<?php echo $data['remote'][1]['SITE_ATTACH_PORT']; ?>" size="10" />
					<div class="onShow"><?php echo lang('html-110'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-111'); ?>： </th>
                    <td>
                    <input id="username" class="input-text" type="text" name="data[remote][1][SITE_ATTACH_USERNAME]" value="<?php echo $data['remote'][1]['SITE_ATTACH_USERNAME']; ?>" size="25" />
					<div class="onShow"><?php echo lang('html-112'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-113'); ?>： </th>
                    <td>
                    <input id="password" class="input-text" type="password" name="data[remote][1][SITE_ATTACH_PASSWORD]" value="<?php echo $data['remote'][1]['SITE_ATTACH_PASSWORD']; ?>" size="25" />
					<div class="onShow"><?php echo lang('html-114'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-115'); ?>： </th>
                    <td>
                    <input id="path" class="input-text" type="text" name="data[remote][1][SITE_ATTACH_PATH]" value="<?php echo $data['remote'][1]['SITE_ATTACH_PATH']; ?>" size="25" />
					<div class="onShow"><?php echo lang('html-116'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-117'); ?>： </th>
                    <td>
					<input class="pasv" type="radio" name="data[remote][1][SITE_ATTACH_PASV]" value="1" <?php if ($data['remote'][1]['SITE_ATTACH_PASV']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input class="pasv" type="radio" name="data[remote][1][SITE_ATTACH_PASV]" value="0" <?php if (empty($data['remote'][1]['SITE_ATTACH_PASV'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<div class="onShow"><?php echo lang('html-118'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-119'); ?>： </th>
                    <td>
					<input class="mode" type="radio" name="data[remote][1][SITE_ATTACH_MODE]" value="auto" <?php if (empty($data['remote'][1]['SITE_ATTACH_MODE']) || $data['remote'][1]['SITE_ATTACH_MODE'] == 'auto') { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-120'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input class="mode" type="radio" name="data[remote][1][SITE_ATTACH_MODE]" value="ascii" <?php if ($data['remote'][1]['SITE_ATTACH_MODE']=='ascii') { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-121'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input class="mode" type="radio" name="data[remote][1][SITE_ATTACH_MODE]" value="binary" <?php if ($data['remote'][1]['SITE_ATTACH_MODE']=='binary') { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-122'); ?></label>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-123'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[remote][1][SITE_ATTACH_EXTS]" value="<?php echo $data['remote'][1]['SITE_ATTACH_EXTS']; ?>" size="40" />
					<div class="onShow"><?php echo lang('html-124'); ?></div>
                    </td>
                </tr>
				<tr class="r1">
                    <th><?php echo lang('html-125'); ?>： </th>
                    <td>
                    <input id="rurl" class="input-text" type="text" name="data[remote][1][SITE_ATTACH_URL]" value="<?php echo $data['remote'][1]['SITE_ATTACH_URL']; ?>" size="60" />
					<input class="button" type="button" name="button" id="ftptest" onclick="ftp_test()" value="<?php echo lang('html-127'); ?>" />
					<br><font color=""><?php echo lang('html-126'); ?></font>
                    </td>
                </tr>

                <tr class="r2">
                    <th>AK： </th>
                    <td>
                        <input id="baidu_ak" class="input-text" type="text" name="data[remote][2][ak]" value="<?php echo $data['remote'][2]['ak']; ?>" size="40" />
                    </td>
                </tr>
                <tr class="r2">
                    <th>SK： </th>
                    <td>
                        <input id="baidu_sk" class="input-text" type="text" name="data[remote][2][sk]" value="<?php echo $data['remote'][2]['sk']; ?>" size="40" />
                    </td>
                </tr>
                <tr class="r2">
                    <th>Bucket： </th>
                    <td>
                        <input id="baidu_bucket" class="input-text" type="text" name="data[remote][2][bucket]" value="<?php echo $data['remote'][2]['bucket']; ?>" size="25" />
                    </td>
                </tr>
                <tr class="r2">
                    <th><?php echo lang('html-123'); ?>： </th>
                    <td>
                        <input class="input-text" type="text" name="data[remote][2][SITE_ATTACH_EXTS]" value="<?php echo $data['remote'][2]['SITE_ATTACH_EXTS']; ?>" size="40" />
                        <div class="onShow"><?php echo lang('html-124'); ?></div>
                    </td>
                </tr>
                <tr class="r2">
                    <th>Host： </th>
                    <td>
                        <input id="baidu_host" class="input-text" type="text" name="data[remote][2][host]" value="<?php echo $data['remote'][2]['host']; ?>" size="40" />
                    </td>
                </tr>
                <tr class="r2">
                    <th><?php echo lang('html-125'); ?>： </th>
                    <td>
                        <input id="baidu_rurl" class="input-text" type="text" name="data[remote][2][SITE_ATTACH_URL]" value="<?php echo $data['remote'][2]['SITE_ATTACH_URL']; ?>" size="60" />
                        <input class="button" type="button" name="button" id="baidutest" onclick="baidu_test()" value="<?php echo lang('html-127'); ?>" />
                        <br>必须以http开头的域名地址，结尾不要加斜杠“/”，<a href="http://www.mantob.com/help/list-341.html" target="_blank" style="color:blue">百度云存储BCS配置教程</a>
                    </td>
                </tr>

                <tr class="r3">
                    <th>Access Key ID： </th>
                    <td>
                        <input id="aliyun_id" class="input-text" type="text" name="data[remote][3][id]" value="<?php echo $data['remote'][3]['id']; ?>" size="25" />
                    </td>
                </tr>
                <tr class="r3">
                    <th>Access Key Secret： </th>
                    <td>
                        <input id="aliyun_secret" class="input-text" type="text" name="data[remote][3][secret]" value="<?php echo $data['remote'][3]['secret']; ?>" size="40" />
                    </td>
                </tr>
                <tr class="r3">
                    <th>Bucket： </th>
                    <td>
                        <input id="aliyun_bucket" class="input-text" type="text" name="data[remote][3][bucket]" value="<?php echo $data['remote'][3]['bucket']; ?>" size="25" />
                    </td>
                </tr>
                <tr class="r3">
                    <th><?php echo lang('html-123'); ?>： </th>
                    <td>
                        <input class="input-text" type="text" name="data[remote][3][SITE_ATTACH_EXTS]" value="<?php echo $data['remote'][3]['SITE_ATTACH_EXTS']; ?>" size="40" />
                        <div class="onShow"><?php echo lang('html-124'); ?></div>
                    </td>
                </tr>
                <tr class="r3">
                    <th>节点请求地址： </th>
                    <td>
                        <select id="aliyun_host" onchange="dr_aliyun_host(this.value)" name="data[remote][3][host]">
                        <option value="">选择节点</option>
                        <option <?php if ($data['remote'][3]['host']=='oss-cn-hangzhou.aliyuncs.com') { ?>selected<?php } ?> value="oss-cn-hangzhou.aliyuncs.com">杭州节点</option>
                        <option <?php if ($data['remote'][3]['host']=='oss-cn-qingdao.aliyuncs.com') { ?>selected<?php } ?> value="oss-cn-qingdao.aliyuncs.com">青岛节点</option>
                        <option <?php if ($data['remote'][3]['host']=='oss-cn-beijing.aliyuncs.com') { ?>selected<?php } ?> value="oss-cn-beijing.aliyuncs.com">北京节点</option>
                        <option <?php if ($data['remote'][3]['host']=='oss-cn-hongkong.aliyuncs.com') { ?>selected<?php } ?> value="oss-cn-hongkong.aliyuncs.com">香港节点</option>
                        </select>
                    </td>
                </tr>
                <tr class="r3">
                    <th><?php echo lang('html-125'); ?>： </th>
                    <td>
                        <input id="aliyun_rurl" class="input-text" type="text" name="data[remote][3][SITE_ATTACH_URL]" value="<?php echo $data['remote'][3]['SITE_ATTACH_URL']; ?>" size="60" />
                        <input class="button" type="button" name="button" id="aliyuntest" onclick="aliyun_test()" value="<?php echo lang('html-127'); ?>" />
                        <br>必须以http开头的域名地址，结尾不要加斜杠“/”，<a href="http://www.mantob.com/help/list-341.html" target="_blank" style="color:blue">阿里云存储OSS配置教程</a>
                    </td>
                </tr>
                </table>
            </div>
			<div id="cnt_4" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-728'); ?>： </th>
                    <td>
                        <?php echo lang('html-727'); ?>
                    </td>
                </tr>
                <tr>
                    <th width="200"><?php echo lang('html-570'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SITE_IMAGE_RATIO]" value="1" <?php if ($data['SITE_IMAGE_RATIO']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SITE_IMAGE_RATIO]" value="0" <?php if (empty($data['SITE_IMAGE_RATIO'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<div class="onShow"><?php echo lang('html-571'); ?></div>
                    </td>
                </tr>
                <tr>
                    <th><?php echo lang('html-128'); ?>： </th>
                    <td>
                    <input type="radio" onclick="$('.dr_image').show()" name="data[SITE_IMAGE_WATERMARK]" value="1" <?php if ($data['SITE_IMAGE_WATERMARK']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" onclick="$('.dr_image').hide()" name="data[SITE_IMAGE_WATERMARK]" value="0" <?php if (empty($data['SITE_IMAGE_WATERMARK'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
                    </td>
                </tr>
				<tr class="dr_image">
                    <th><?php echo lang('html-129'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SITE_IMAGE_REMOTE]" value="1" <?php if ($data['SITE_IMAGE_REMOTE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SITE_IMAGE_REMOTE]" value="0" <?php if (empty($data['SITE_IMAGE_REMOTE'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<div class="onShow"><?php echo lang('html-130'); ?></div>
                    </td>
                </tr>
				<tr class="dr_image">
                    <th><?php echo lang('html-769'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SITE_IMAGE_CONTENT]" value="1" <?php if ($data['SITE_IMAGE_CONTENT']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('open'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SITE_IMAGE_CONTENT]" value="0" <?php if (empty($data['SITE_IMAGE_CONTENT'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('close'); ?></label>
					<div class="onShow"><?php echo lang('html-770'); ?></div>
                    </td>
                </tr>
				<tr class="dr_image">
					<th><?php echo lang('html-143'); ?>： </th>
					<td>
					<select name="data[SITE_IMAGE_VRTALIGN]">
                    <?php if (is_array($wm_vrt_alignment)) { $count=count($wm_vrt_alignment);foreach ($wm_vrt_alignment as $t) { ?>
                    <option<?php if ($t==$data['SITE_IMAGE_VRTALIGN']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					&nbsp;&nbsp;
					<select name="data[SITE_IMAGE_HORALIGN]">
                    <?php if (is_array($wm_hor_alignment)) { $count=count($wm_hor_alignment);foreach ($wm_hor_alignment as $t) { ?>
                    <option<?php if ($t==$data['SITE_IMAGE_HORALIGN']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					</td>
				</tr>
				<tr class="dr_image">
                    <th><?php echo lang('html-144'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_IMAGE_VRTOFFSET]" value="<?php echo $data['SITE_IMAGE_VRTOFFSET']; ?>" size="7" />
					&nbsp;&nbsp;
					<input class="input-text" type="text" name="data[SITE_IMAGE_HOROFFSET]" value="<?php echo $data['SITE_IMAGE_HOROFFSET']; ?>" size="7" />
					<div class="onShow"><?php echo lang('html-145'); ?></div>
                    </td>
                </tr>
				<tr class="dr_image">
                    <th><?php echo lang('html-131'); ?>： </th>
                    <td>
                    <input type="radio" name="data[SITE_IMAGE_TYPE]" value="1" onclick="dr_set_mw_type(1)" <?php if ($data['SITE_IMAGE_TYPE']) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-132'); ?></label>
                    &nbsp;&nbsp;&nbsp;
					<input type="radio" name="data[SITE_IMAGE_TYPE]" value="0" onclick="dr_set_mw_type(0)" <?php if (empty($data['SITE_IMAGE_TYPE'])) { ?>checked<?php } ?> />&nbsp;<label><?php echo lang('html-133'); ?></label>
                    </td>
                </tr>
				<tr class="dr_mw_1 dr_image" style="display:none">
					<th><?php echo lang('html-134'); ?>： </th>
					<td>
					<select name="data[SITE_IMAGE_OVERLAY]">
                    <?php if (is_array($wm_opacity)) { $count=count($wm_opacity);foreach ($wm_opacity as $t) { ?>
                    <option<?php if ($t==$data['SITE_IMAGE_OVERLAY']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
                    <div class="onShow"><?php echo lang('html-135'); ?></div>
					</td>
				</tr>
				<tr class="dr_mw_1 dr_image" style="display:none">
                    <th><?php echo lang('html-136'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_IMAGE_OPACITY]" value="<?php echo $data['SITE_IMAGE_OPACITY']; ?>" size="7" />
					<div class="onShow"><?php echo lang('html-137'); ?></div>
                    </td>
                </tr>
				<tr class="dr_mw_0 dr_image" style="display:none">
					<th><?php echo lang('html-138'); ?>： </th>
					<td>
					<?php if ($wm_font_path) { ?>
					<select name="data[SITE_IMAGE_FONT]">
                    <?php if (is_array($wm_font_path)) { $count=count($wm_font_path);foreach ($wm_font_path as $t) { ?>
                    <option<?php if ($t==$data['SITE_IMAGE_FONT']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
                    <?php } } ?>
                    </select>
					<?php } ?>
                    <div class="onShow"><?php echo lang('html-139'); ?></div>
					</td>
				</tr>
				<tr class="dr_mw_0 dr_image" style="display:none">
                    <th><?php echo lang('html-140'); ?>： </th>
                    <td>
					<?php echo dr_field_input('SITE_IMAGE_COLOR', 'Color', array('option'=>array('value'=>$data['SITE_IMAGE_COLOR']))); ?>
                    </td>
                </tr>
				<tr class="dr_mw_0 dr_image" style="display:none">
                    <th><?php echo lang('html-141'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_IMAGE_SIZE]" value="<?php echo $data['SITE_IMAGE_SIZE']; ?>" size="5" />
                    </td>
                </tr>
				<tr class="dr_mw_0 dr_image" style="display:none">
                    <th><?php echo lang('html-142'); ?>： </th>
                    <td>
                    <input class="input-text" type="text" name="data[SITE_IMAGE_TEXT]" value="<?php echo $data['SITE_IMAGE_TEXT']; ?>" size="33" />
                    </td>
                </tr>
                </table>
			</div>
			<div id="cnt_5" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <?php for ($i = 0; $i <= 9; $i ++) { ?>
                <tr>
                    <th width="200"></th>
                    <td align="left">
                    <input class="input-text" name="navigator[<?php echo $i; ?>]" type="text" value="<?php echo $navigator[$i]; ?>" />
					&nbsp;type=<?php echo $i; ?>
                    </td>
                </tr>
                <?php } ?>
				</table>
			</div>
            <div id="cnt_6" style="display:none" class="dr_hide">
				<table width="100%" class="table_form">
                <tr>
                    <th width="200"><?php echo lang('html-250'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[SITE_HOME_INDEX]" value="<?php if ($data['SITE_HOME_INDEX']) {  echo $data['SITE_HOME_INDEX'];  } else { ?>0<?php } ?>" size="10" />
                    <div class="onShow"><?php echo lang('html-696'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('html-270'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[SITE_MODULE_INDEX]" value="<?php if ($data['SITE_MODULE_INDEX']) {  echo $data['SITE_MODULE_INDEX'];  } else { ?>0<?php } ?>" size="10" />
                    <div class="onShow"><?php echo lang('html-696'); ?></div></td>
                </tr>
                <tr>
                    <th><?php echo lang('html-746'); ?>： </th>
                    <td><input class="input-text" type="text" name="data[SITE_QUERY_CACHE]" value="<?php if ($data['SITE_QUERY_CACHE']) {  echo $data['SITE_QUERY_CACHE'];  } else { ?>0<?php } ?>" size="10" />
                        <div class="onShow"><?php echo lang('html-747'); ?></div></td>
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
<script type="text/javascript">
<!--
function ftp_test() {
	var host = $('#host').val();
	var port = $('#port').val();
	var username = $('#username').val();
    var password = $('#password').val();
    var rurl = $('#rurl').val();
	var path = $("#path").val();
	var pasv = $(".pasv:checked").val();
	var mode = $(".mode:checked").val();
	$("#ftptest").val('Loading');
	$.get("<?php echo dr_url('api/testftp'); ?>",{rurl:rurl,host:host,port:port,username:username,password:password,pasv:pasv,path:path,mode:mode}, function(data){
		alert(data);
		$("#ftptest").val('<?php echo lang('html-127'); ?>');
	})
}
function aliyun_test() {
    var id = $('#aliyun_id').val();
    var secret = $('#aliyun_secret').val();
    var bucket = $('#aliyun_bucket').val();
    var host = $('#aliyun_host').val();
    var rurl = $('#aliyun_rurl').val();
    $("#aliyuntest").val('Loading');
    $.get("<?php echo dr_url('api/aliyuntest'); ?>",{rurl:rurl,id:id,secret:secret,bucket:bucket,host:host}, function(data){
        alert(data);
        $("#aliyuntest").val('<?php echo lang('html-127'); ?>');
    })
}
function baidu_test() {
    var ak = $('#baidu_ak').val();
    var sk = $('#baidu_sk').val();
    var bucket = $('#baidu_bucket').val();
    var host = $('#baidu_host').val();
    $('#baidu').val('http://'+host+'/'+bucket);
    var rurl = $('#baidu_rurl').val();
    $("#baidutest").val('Loading');
    $.get("<?php echo dr_url('api/baidutest'); ?>",{rurl:rurl,ak:ak,sk:sk,bucket:bucket,host:host}, function(data){
        alert(data);
        $("#baidutest").val('<?php echo lang('html-127'); ?>');
    })
}
//-->
</script>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>