<!--<?php
defined('IN_MET') or exit('No permission');
require_once $this -> template('ui/head');
echo <<<EOT
-->
	<style type="text/css">
		.met_affix_save{position: fixed;width: 100%;bottom: 0px;z-index: 9999;padding: 10px 150px;background: rgba(37, 53, 68, 0.5);}
	</style>
	<div class="v52fmbx">
		<dl>
			<dt>文章链接</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input class="wx_url" name="wx_url" type="text" value="" placeholder="输入微信文章链接">
				</div>
				<input type="submit" value="立即导入" class="btn btn-success ajax_btn">
				<span class="tips"></span>
			</dd>
		</dl>
		<form method="POST" class="ui-from" name="myform" action="{$_M[url][own_form]}a=doone&action=save" target="_self">
			<dl>
				<dt>选择导入栏目</dt>
				<dd class="ftype_select-linkage">
					<div class="fbox" data-selectdburl="{$_M[url][own_form]}a=doone&action=class">
						<select name="LC[class1]" class="prov" data-required="1"></select>  
						<select name="LC[class2]" class="city"></select>
						<select name="LC[class3]" class="dist"></select>
					</div>
					<span class="tips">只能选择文章模块的栏目导入哦</span>
				</dd>
			</dl>
			<dl>
				<dt>文章标题</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input class="wx_title" type="text" name="LC[title]" value="" placeholder="输入文章标题" data-required="1">
					</div>
					<span class="tips"></span>
				</dd>
			</dl>
			<dl>
				<dt>其它</dt>
				<dd class="ftype_input">
					<div class="input-group" style="width:800px;">
						<span class="input-group-addon">发布人</span>
						<input type="text" class="form-control" name="LC[issue]" value="{$config['issue']}">
						<span class="input-group-addon">访问量</span>
						<input type="text" class="form-control" name="LC[hits]" value="{$config['hits']}">
						<span class="input-group-addon">发布日期</span>
						<input type="text" class="form-control" name="LC[addtime]" value="{$config['addtime']}">
					</div>
					<span class="tips"></span>
				</dd>
			</dl>
			<dl>
				<dt>状态</dt>
				<dd class="ftype_checkbox ftype_transverse">
					<div class="fbox">
						<label><input name="LC[displaytype]" type="checkbox" value="1" data-checked="1" checked="checked">前台显示</label>
						<label><input name="LC[com_ok]" type="checkbox" value="1" data-checked="">推荐</label>
						<label><input name="LC[top_ok]" type="checkbox" value="1" data-checked="">置顶</label>
					</div>
				</dd>
			</dl>
			<dl>
				<dt>封面图片</dt>
				<dd class="ftype_upload wx_img">
					<div class="fbox">
						<input 
							name="LC[imgurl]" 
							type="text" 
							data-upload-type="doupimg"
							value="" 
						/>
					</div>
					<span class="tips"></span>
				</dd>
			</dl>
			<dl>
				<dt>内容</dt>
				<dd class="ftype_ckeditor">
					<div class="fbox">
						<script id="container_0" name="LC[content]" type="text/plain" style="width:800px"></script>
					</div>
				</dd>
			</dl>
			<h3 class="v52fmbx_hr">SEO设置</h3>
			<dl>
				<dt>自定义页面title</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input type="text" name="LC[ctitle]" value="">
					</div>
					<span class="tips">为空则系统自动构成，可以到 营销-SEO 中设置构成规则。</span>
				</dd>
			</dl>
			<dl>
				<dt>关键词</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input type="text" name="LC[keywords]" value="">
					</div>
					<span class="tips">多个关键词请用 , 或 | 隔开</span>
				</dd>
			</dl>
			<dl>
				<dt>描述文字</dt>
				<dd class="ftype_textarea">
					<div class="fbox">
						<textarea name="LC[description]" class=""></textarea>
					</div>
					<span class="tips">为空则系统自动抓取详情</span>
				</dd>
			</dl>
			<dl>
				<dt>TGA标签</dt>
				<dd class="ftype_tags">
					<div class="fbox">
						<input name="LC[tag]" type="hidden" data-label="|" value="">
					</div>
					<span class="tips">点击 + 号输入选项名，再点击 + 号或回车完成添加</span>
				</dd>
			</dl>
			<dl>
				<dt>静态页面名称</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input type="text" name="LC[filename]" value="">
					</div>
					<span class="tips">支持中文、大小写字母、数字、下划线</span>
				</dd>
			</dl>
			<br>

			<div class="met_affix_save">
				<input type="submit" name="save" value="立即保存" class="btn btn-primary btn-block">
			</div>
		</form>
	</div>

<!--
EOT;
require_once $this -> template('ui/foot');
?>
