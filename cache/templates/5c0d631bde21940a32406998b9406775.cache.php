<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>admin</title>
<link href="<?php echo SITE_URL; ?>mantob/statics/css/index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SITE_URL; ?>mantob/statics/css/table_form.css" rel="stylesheet" type="text/css" />
<link href="<?php echo MEMBER_PATH; ?>statics/js/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var memberpath = "<?php echo MEMBER_PATH; ?>";</script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/<?php echo SITE_LANGUAGE; ?>.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/jquery.artDialog.js?skin=default"></script> 
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/validate.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/admin.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/mantob.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/swfupload/fileprogress.js"></script>
<script type="text/javascript" src="<?php echo MEMBER_PATH; ?>statics/js/swfupload/handlers.js"></script>
<script type="text/javascript">
var swfu = '';
$(document).ready(function(){
	SwapTab(<?php echo $page; ?>);
	swfu = new SWFUpload({
		flash_url:"<?php echo MEMBER_PATH; ?>statics/js/swfupload/swfupload.swf?"+Math.random(),
		upload_url:memberpath+"index.php?c=api&m=swfupload",
		file_post_name : "Filedata",
		post_params:{"session":"<?php echo $session; ?>", "code":"<?php echo $code; ?>", "fileid":"<?php echo $fileid; ?>"},
		file_size_limit:"<?php echo $size; ?>",
		file_types:"<?php echo $types; ?>",
		file_types_description:"All Files",
		file_upload_limit:"<?php echo $fcount; ?>",
		custom_settings : {progressTarget : "fsUploadProgress",cancelButtonId : "btnCancel"},

		button_image_url: "",
		button_width: 75,
		button_height: 28,
		button_placeholder_id: "buttonPlaceHolder",
		button_text_style: "",
		button_text_top_padding: 3,
		button_text_left_padding: 12,
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,

		file_dialog_start_handler : fileDialogStart,
		file_queued_handler : fileQueued,
		file_queue_error_handler:fileQueueError,
		file_dialog_complete_handler:fileDialogComplete,
		upload_progress_handler:uploadProgress,
		upload_error_handler:uploadError,
		upload_success_handler:uploadSuccess,
		upload_complete_handler:uploadComplete
	});
})
</script>
</head>
<body>
<div class="pad-10">
    <div class="table-list col-tab" id="myform">
        <ul class="tabBut cu-li">
            <li onclick="SwapTab(0);" class="on"><?php echo lang('m-119'); ?></li>
			<li onclick="SwapTab(1);"><?php echo lang('m-132'); ?></li>
			<?php if ($member['adminid']) { ?><li onclick="SwapTab(2);set_iframe('myattach',memberpath+'index.php?c=api&m=myattach&ext=<?php echo $ext; ?>&fcount=<?php echo $fcount; ?>');"><?php echo lang('m-310'); ?></li><?php }  if ($notused) { ?><li onclick="SwapTab(3);"><?php echo lang('m-134'); ?></li><?php } ?>
        </ul>
        <div class="content pad-10" style="clear:both">
			<div id="cnt_0" style="display:block" class="dr_hide">
				<div>
					<div class="addnew" id="addnew">
						<span id="buttonPlaceHolder"></span>
					</div>
					<input type="button" id="btupload" value="<?php echo lang('m-135'); ?>" onClick="swfu.startUpload();" />
					<div id="nameTip" class="onShow"><?php echo dr_lang('m-136', $fcount, $size/1024); ?></div>
					<div class="bk3"></div>
					<div class="lh24"><?php echo dr_lang('m-138', str_replace('|', '、', $ext)); ?></div>
				</div> 	
				<div class="bk10"></div>
				<fieldset class="blue pad-10" id="swfupload">
				<legend><?php echo lang('m-120'); ?></legend>
				<ul class="attachment-list" id="fsUploadProgress">    
				</ul>
				</fieldset>
			</div>
			<div id="cnt_1" style="display: none;" class="dr_hide">
				<input type="text" name="url" class="input-text" value="" style="width:99%;" onblur="addonlinefile(this)">
				<br><?php echo lang('m-139'); ?>
			</div>
			<?php if ($member['adminid']) { ?>
			<div id="cnt_2" style="display: none;" class="dr_hide">
				<iframe name="myfile" src="<?php echo SITE_URL; ?>mantob/statics/images/loading.gif" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none" width="100%" height="330" allowtransparency="true" id="myattach"></iframe>
			</div>
			<?php }  if ($notused) { ?>
			<div id="cnt_3" style="display: none;" class="dr_hide">
				<div class="explain-col"><?php echo lang('m-140'); ?></div>
				<ul class="attachment-list" id="album">
				<?php if (is_array($notused)) { $count=count($notused);foreach ($notused as $t) { ?>
				<li id="notused_<?php echo $t['id']; ?>">
					<div class="img-wrap">
						<a id="a_notused_<?php echo $t['id']; ?>" href="javascript:;" class="off" title="<?php echo $t['filename']; ?>">
							<div onclick="javascript:album_cancel(<?php echo $t['id']; ?>)" class="icon"></div>
							<div onclick="dr_delete_file(<?php echo $t['id']; ?>)" class="delete"></div>
							<img width="80" aid="<?php echo $t['id']; ?>" path="<?php echo $t['icon']; ?>" src="<?php echo $t['show']; ?>" size="<?php echo $t['size']; ?>" title="<?php echo $t['filename']; ?>" />
						</a>
					</div>
				</li>
				<?php } } ?>
			    </ul>
			</div>
			<?php } ?>
    	</div>
        <div id="att-status" class="hidden"></div>
        <div id="att-status-del" class="hidden"><?php echo $fileid; ?></div>
        <!-- swf -->
    </div>
</div>
</body>
<script type="text/javascript">
if ($.browser.mozilla) {
	window.onload=function(){
	    if (location.href.indexOf("&rand=")<0) {
			location.href=location.href+"&rand="+Math.random();
		}
	}
}
function imgWrap(obj){
	$(obj).hasClass('on') ? $(obj).removeClass("on") : $(obj).addClass("on");
}

function addonlinefile(obj) {
	var strs = $(obj).val() ? '|'+ $(obj).val()+',<?php echo SITE_URL; ?>mantob/statics/images/ext/url.gif,' :'';
	$('#att-status').html(strs);
}
function dr_delete_file(id) {
	$.post(memberpath+"index.php?c=api&m=swfdelete", {id: id}, function(data){
		$('#notused_'+id).remove();
	});
	return;
}
function change_params(){
	if($('#watermark_enable').attr('checked')) {
		swfu.addPostParam('watermark_enable', '1');
	} else {
		swfu.removePostParam('watermark_enable');
	}
}
function set_iframe(id,src){
	$("#"+id).attr("src",src); 
}
function album_cancel(id){
	var obj = $('#a_notused_'+id);
	var aid = $(obj).children("img").attr("aid");
	if ($(obj).hasClass('on')){
		$(obj).attr("class", "off");
		var imgstr = $("#att-status").html();
		var length = $("a[class='on']").children("img").length;
		var strs = '';
		for (var i=0;i<length;i++){
			strs += '|'+$("a[class='on']").children("img").eq(i).attr('aid')+','+$("a[class='on']").children("img").eq(i).attr('path')+','+$("a[class='on']").children("img").eq(i).attr('size')+','+$("a[class='on']").children("img").eq(i).attr('title');
		}
		$('#att-status').html(strs);
	} else {
		var num = $('#att-status').html().split('|').length;
		var file_upload_limit = '<?php echo $fcount; ?>';
		if(num > <?php echo $fcount; ?>) {
		    dr_tips("<?php echo dr_lang('m-141', $fcount); ?>");
			return false;
		}
		$(obj).attr("class", "on");
		$('#att-status').append('|'+aid+','+$(obj).children("img").attr("path")+','+$(obj).children("img").attr("size")+','+$(obj).children("img").attr("title"));
	}
}
</script>
</html>
