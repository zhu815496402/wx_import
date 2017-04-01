define(function(require, exports, module) {
	var common = require('common');
	$('body').append("<style>.js-picture-list .upnow{display:none;}</style>");
	if ($('.LC-help').length > 0) {
		var body_h = $(window).height();
		var ifarme_top = $('.LC-help').offset().top;
		$('.LC-help').css('height',body_h-ifarme_top-50+'px');
	}
	if ($('.ajax_btn').length > 0) {
		require.async(siteurl + 'app/system/include/public/js/examples/editor/ueditor/ueditor.config');
		require.async(siteurl + 'app/system/include/public/js/examples/editor/ueditor/ueditor.all.min',function() {
			var ue = UE.getEditor('container_0',{
				iframeCssUrl: siteurl + 'app/system/include/public/bootstrap/css/bootstrap.min.css',
				scaleEnabled :true,
				initialFrameWidth : '100%',
				initialFrameHeight : '400'
			});
			$('.ajax_btn').on('click', function() {
				var url = $('.wx_url').val();
				if (url) {
					var url = adminurl+'n=wx_import&c=wx_import&a=doone&action=get_wx&wx_url='+encodeURIComponent(url);
					$(this).addClass('disabled').val('正在获取中...');
				} else {
					alert('请输入微信文章链接！');
					return false;
				};
			    $.ajax({
	                type:'GET',
	                url :url,
	                dataType:'json',
	                cache:false,
	                success:function(data){
	                	$('.wx_title').val(data.title);
	                	if (data.imgurl) {
		                	$('.wx_img input').attr('value',data.imgurl);
		                	var img_html = '<a href="'+data.imgurl+'" target="_blank">'
		                				 + '<img src="'+data.imgurl+'">'
		                				 + '</a>'
		                				 + '<span class="close hide" data-imgval="'+data.imgurl+'">×</span>';
		                	if ($('.wx_img .sort').length > 0) {
		                		$('.wx_img .sort').html(img_html);
		                	} else {
		                		$('.wx_img ul').prepend('<li class="sort">'+img_html+'</li>');
		                	}
		                }
						ue.setContent(data.content);
						$('.ajax_btn').removeClass('disabled').val('立即导入');
	                }
	            });
			});
		});
	}
	$('.ajax_btn_all').on('click', function() {
		var url_all = $('.wx_url').val();
		var class1 = $('.class1').val();
		var class2 = $('.class2').val();
		var class3 = $('.class3').val();
		class1 = class1?class1:'';
		class2 = class2?class2:'';
		class3 = class3?class3:'';
		var url_arr = url_all.split("\n");
		var arr = new Array();
		var count = 0;
		$.each(url_arr, function(i,val){
			if (val) {
				arr[count] = val;
				count++;
			};
		});
		if (arr.length && class1) {
			$(this).addClass('disabled').val('正在导入中...');
			$('.ajax_input').html('');
		} else {
			alert('请选择导入栏目，并且输入微信文章链接！');
			return false;
		};
		$.each(arr, function(i,val){
			var save_news = function() {
				var url = adminurl+'n=wx_import&c=wx_import&a=doall&action=get_wx&wx_url='+encodeURIComponent(val)+'&class1='+class1+'&class2='+class2+'&class3='+class3;
				console.log(url);
				$('.ajax_btn_all').val('共计 '+arr.length+' 篇文章，正在导入第 '+(i+1)+' 篇');
				$.ajax({
	                type:'GET',
	                url :url,
	                dataType:'json',
	                cache:false,
	                success:function(data){
	                	console.log(data);
	                	if (data.state === 'success') {
	                		$('.ajax_input').append((i+1)+'.<span style="color:green">【'+data.msg+'】</span>'+data.title+'--'+data.url+'<br>');
	                	} else {
	                		$('.ajax_input').append((i+1)+'.<span style="color:red">【导入失败】</span>'+data.url+'--'+data.msg+'<br>');
	                	}
	                	if (arr.length === (i+1)) {
							$('.ajax_btn_all').removeClass('disabled').val('导入完成，继续导入');
						}
	                }
	            });
			}
			setTimeout(function () { 
				save_news();
			}, i*3000);
		});
	});
	$('.ajax_update').on('click', function() {
		$(this).addClass('disabled').html('正在更新中...');
		var old_ver = $('.ajax_update_ver').html();
		var url = adminurl+'n=wx_import&c=wx_import&a=doindex&action=update';
		$.ajax({
            type:'GET',
            url :url,
            dataType:'json',
            cache:false,
            success:function(data){
            	if (old_ver == data.ver) {
            		$('.ajax_update').removeClass('disabled').html('并没有什么更新');
            	} else {
            		$('.ajax_update_ver').html(data.ver);
            		$('.ajax_update').removeClass('disabled').html('已更新到最新规则');
            	}
            }
        });
	});
});