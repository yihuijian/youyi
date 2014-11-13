<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>APP定制平台--ITZI</title>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="viewport" content="width=device-width"/>
	<link rel="stylesheet" href="__S__/css/reset.css"/>
	<link rel="stylesheet" href="__S__/css/style.css"/>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="__S__/js/jquery-1.10.2.min.js"></script>
	<![endif]-->
	<!--[if gte IE 9]>
	<!-->
	<script type="text/javascript" src="__S__/js/jquery-2.0.3.min.js"></script>
	<!--<![endif]-->
	<script type="text/javascript" src="__S__/js/jquery.cookie.js"></script>
	<!--<script type="text/javascript" src="__S__/js/json.js"></script>-->
	
	
	<script>
		$(document).ready(function() {
			$(".m-hd li").click(function(event) {
				$(".tab").hide();
				$("."+$(this).attr("rel")).show();
				$(".m-hd li").removeClass('z-crt');
				$(this).addClass('z-crt');
			});
		});
	</script>

	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	<div class="g-header">
	<div class="m-logo left">
		<div style="text-align:center;line-height:60px;">
			<img src="__PUBLIC__/image/ycp_logo.png?w=140&h=30" alt="" style="position:relative;top:10px;">
		</div>
	</div>
	<div class="m-topmenu left">
		<ul>
			<?php if(is_array($admin_top_menu)): $i = 0; $__LIST__ = $admin_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (u($vo["url"])); ?>?currnav=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>" <?php if(session("currnav") == $vo["id"]) echo ' class="on" ' ?>><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="m-topaction right">
		<a href="<?php echo U('/Admin/Public/logout');?>" title="<?php echo ($menu["title"]); ?>">Admin</a> | 
		<a href="<?php echo U('/Admin/Public/logout');?>" title="<?php echo ($menu["title"]); ?>">退出登录</a>
	</div>
</div>


	<div class="clear"></div>
	<div>
		<table style="border:0;width:100%;" class="block">
			<tbody>
				<tr>
					<td style="width: 200px;background:#f0f0f0;border-right:1px solid #dedfdf;" valign="top">
						<div class="g-leftbar">
							<ul>
							<?php if(is_array($admin_left_menu)): $i = 0; $__LIST__ = $admin_left_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php if($vo["hchildren"]) echo '&nbsp;&nbsp;+'; else echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?><a href="<?php echo (u($vo["url"])); ?>" title=""><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							
							</ul>
						</div>
					</td>
					<td valign="top">
						
	<link rel="stylesheet" href="/Static/kindeditor/default/default.css">
	<script charset="utf-8" src="/Static/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/Static/kindeditor/zh_CN.js"></script>
	<div id="main" class="g-main">
		<table class="m-table"></table>
		<div class="row m-title">
			<h2>广告管理 - 编辑广告</h2>
		</div>
		<div class="row">
<?php  $rurl = base64_decode($_GET["rurl"]); $rurl = empty($rurl)?U("/Admin/Adv"):$rurl; ?>			<a class="u-btn" href="<?php echo ($rurl); ?>">返回列表</a>
		</div>
		<div class="row">
			<div class="m-hd m-hd-bg">
				<h2 class="u-tt"></h2>
				<div class="more">
					<!-- <a href="#">更多&raquo;</a> -->
				</div>
				<ul>
					<li class="z-crt" rel="tab_1">
						<a href="#">基本</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
							<div><input type="hidden" name="id" value="<?php echo ($doc["id"]); ?>"/></div>
							<div class="formitm">
									<label class="lab">图片:</label>
									<div class="ipt">
										<input type="file" class="u-file" name="img" /><div><img src="<?php echo ($doc["img"]); ?>" style="height:100px;"></div>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">链接:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="url" value="<?php echo ($doc["url"]); ?>"/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">文字:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="text" value="<?php echo ($doc["text"]); ?>"/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">位置:</label>
									<div class="ipt">
										<?php if(is_array($field_position)): $i = 0; $__LIST__ = $field_position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="radio" name="position" value="<?php echo ($key); ?>" <?php if($key == $doc["position"]) echo 'checked="checked"'; ?> >&nbsp;&nbsp;<?php echo ($vo); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
										<p></p>
									</div>
								</div>
						</div>
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">保存</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<link href="/Static/css/datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="/Static/css/dropdown.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/Static/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/Static/js/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.time').datetimepicker({
				format: 'yyyy-mm-dd hh:ii',
				language:"zh-CN",
				minView:2,
				autoclose:true
			});
		});		
	</script>

					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="clear"></div>
	<div class="g-footer">
	<div class="m-copyright">
        <div class="left">感谢使用<a href="http://www.card7.net" target="_blank">APP定制平台</a></div>
        <div class="right">V1.0.131218</div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>