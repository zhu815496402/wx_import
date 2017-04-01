<!--<?php
defined('IN_MET') or exit('No permission');
require_once $this -> template('ui/head');
echo <<<EOT
-->
	<div class="v52fmbx">
		<dl>
			<dt>选择导入栏目</dt>
			<dd class="ftype_select-linkage">
				<div class="fbox" data-selectdburl="{$_M[url][own_form]}a=doone&action=class">
					<select name="" class="prov class1" data-required="1"></select>  
					<select name="" class="city class2"></select>
					<select name="" class="dist class3"></select>
				</div>
				<span class="tips">只能选择文章模块的栏目导入哦</span>
			</dd>
		</dl>
		<dl>
			<dt>文章URL</dt>
			<dd class="ftype_textarea">
				<div class="fbox">
					<textarea name="" class="wx_url" style="width:800px;height:300px;"></textarea>
				</div>
				<span class="tips">只能识别微信文章，每行一条URL，可以先在记事本里把链接整理好，然后复制进来</span>
			</dd>
		</dl>
		<dl class="noborder">
			<dt> </dt>
			<dd>
                <input type="submit" value="立即导入" class="btn btn-success btn-block ajax_btn_all" style="width:800px;">
			</dd>
		</dl>
		<dl>
			<dt></dt>
			<dd class="ajax_input"></dd>
		</dl>
	</div>

<!--
EOT;
require_once $this -> template('ui/foot');
?>
