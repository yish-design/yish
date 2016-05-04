<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>

<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?><span>|</span><a href="http://www.mantob.net" target="_blank"><em>技术支持</em></a>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
		<font color="gray">网站搬家指将网站数据从本地或者其他站点迁移到当前站点</font>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
        <input name="todo" type="hidden" value="1" />
		<table width="100%" class="table_form">
		<tr>
			<th width="100">第四步、</th>
			<td><?php if (!$ok) { ?>数据库信息验证成功<?php } else { ?><font color="#FF0000"><?php echo $ok; ?></font><?php } ?></td>
		</tr>
        <?php if (!$ok) { ?>
        <tr>
			<th>第五步、</th>
			<td>为站点指定域名</td>
		</tr>
        <?php if (is_array($site)) { $count=count($site);foreach ($site as $id=>$t) { ?>
        <tr>
			<th></th>
			<td>
            <?php echo $t['name']; ?>：<input class="input-text" type="text" name="site[<?php echo $id; ?>]" value="<?php echo $t['domain']; ?>"  size="30" />
            </td>
		</tr>
        <?php } } ?>
        <tr>
			<th>第六步、</th>
			<td><input value="生成配置" type="submit" name="submit" class="button" /></td>
		</tr>
        <?php } else { ?>
        <tr>
			<th>第五步、</th>
			<td><input value="返回" type="button" onclick="window.location.href='<?php echo $back; ?>'" name="button" class="button" /></td>
		</tr>
        <?php } ?>
		</table>
		</form>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>