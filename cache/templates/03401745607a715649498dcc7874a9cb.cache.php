<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.net" target="_blank"><em>技术支持</em></a>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
		<font color="gray">欢迎使用mantob系统维护工具 v<?php echo $version; ?></font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
		<table width="100%" class="table_form">
		<tr>
			<th width="200">当前安全密码： </th>
			<td><input class="input-text" type="text" name="code" value="<?php echo $_GET[page]; ?>"  size="20" />
			<input value="修改" type="submit" name="submit" class="button" />
			</td>
		</tr>
		</table>
		</form>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>