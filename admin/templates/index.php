<!--<?php
defined('IN_MET') or exit('No permission');
require_once $this -> template('ui/head');
echo <<<EOT
-->
<form method="POST" class="ui-from" name="myform" action="{$_M[url][own_form]}a=doindex&action=save" target="_self">
	<div class="v52fmbx">
		<dl>
			<dt>默认发布人</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input class="wx_title" type="text" name="LC[issue]" value="{$config['issue']}" placeholder="输入发布人名称" data-required="1">
				</div>
				<span class="tips"></span>
			</dd>
		</dl>
		<dl>
			<dt>默认阅读量</dt>
			<dd class="ftype_input">
				<div class="input-group" style="width:400px;">
					<span class="input-group-addon">最低</span>
					<input type="text" class="form-control" name="LC[hits_min]" value="{$config['hits_min']}">
					<span class="input-group-addon">最高</span>
					<input type="text" class="form-control" name="LC[hits_max]" value="{$config['hits_max']}">
					<span class="input-group-addon">随机生成</span>
				</div>
				<span class="tips"></span>
			</dd>
		</dl>
		<dl>
			<dt>更新导入规则</dt>
			<dd class="ftype_input">
				<div class="fbox">
					V<span class="ajax_update_ver">{$rule_ver}</span>
				</div>
				<a class="btn btn-success btn-xs ajax_update">检查更新</a>
				<br>
				<span class="tips" style="color:red">如果你发现无法正常导入微信文章时，可尝试更新导入规则，更新后还是无法正常导入，请联系我解决！</span>
			</dd>
		</dl>

		<dl class="noborder">
			<dt> </dt>
			<dd>
                <input type="submit" name="save" value="立即保存" class="btn btn-primary">
			</dd>
		</dl>
	</div>
</form>
<!--
EOT;
require_once $this -> template('ui/foot');
?>
