<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script src="http://www.mantob.com/member/statics/js/ueditor/uparse.js"></script><script>setTimeout(function(){ uParse('div',{    'highlightJsUrl':'http://www.mantob.com/member/statics/js/ueditor/third-party/SyntaxHighlighter/shCore.js',    'highlightCssUrl':'<?php echo SITE_PATH;  echo APP_DIR; ?>/statics/shCoreDefault.css'})},300)</script>
<style>
div th {
    background: none;
    border-top: none;
}
div td, div th {
    background: none;
    border: none;
}
</style>
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
		<table width="100%" class="table_form">
		<tr>
			<th width="100">第一步、</th>
			<td>将网站源数据上传到本站</td>
		</tr>
        <tr>
			<th>第二步、</th>
			<td>在本站的/config/database.php中修改数据库信息（切记不可用记事本之类的windows自带的编辑工具）</td>
		</tr>
        <tr>
			<th></th>
			<td>
            <pre class="brush:php;toolbar:false">
......
$db[&#39;default&#39;]    = array(
    &#39;dsn&#39;        =&gt; &#39;&#39;,
    &#39;hostname&#39;    =&gt; &#39;数据库服务器地址&#39;,
    &#39;username&#39;    =&gt; &#39;数据库账号&#39;,
    &#39;password&#39;    =&gt; &#39;数据库密码&#39;,
    &#39;port&#39;        =&gt; &#39;链接端口号，默认3306&#39;,
    &#39;database&#39;    =&gt; &#39;数据库名称&#39;,
    &#39;dbdriver&#39;    =&gt; &#39;驱动方式，默认mysql，建议mysqli&#39;,
    &#39;dbprefix&#39;    =&gt; &#39;数据表前缀，默认dr_&#39;,
	......
);</pre>
            </td>
		</tr>
        <tr>
			<th>第三步、</th>
			<td><input value="验证数据库" type="submit" name="submit" class="button" /></td>
		</tr>
		</table>
		</form>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>