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
	<script type="text/javascript" src="__S__/js/json.js"></script>
	
	
	<script src="__S__/js/jquery.dragsort-0.5.1.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$(".m-hd li").click(function(event) {
				$(".tab").hide();
				$("."+$(this).attr("rel")).show();
				$(".m-hd li").removeClass('z-crt');
				$(this).addClass('z-crt');
			});
			$("#type").change(function(event) {
				switch ($(this).val()) {
	                case "0": //数字
	                    $("#define").val("int(11)");
	                    break;
	                case "1":  //字符串
	                    $("#define").val("varchar(50)");
	                    break;
	                case "2":  //文本框
	                    $("#define").val("varchar(255)");
	                    break;
	                case "3":  //时间
	                    $("#define").val("int(11)");
	                    break;
	                case "4":  //布尔
	                    $("#define").val("tinyint(2)");
	                    break;
	                case "5":  //枚举
	                    $("#define").val("char(50)");
	                    break;
	                case "6":  //单选
	                    $("#define").val("char(10)");
	                    break;
	                case "7":  //多选
	                    $("#define").val("varchar(100)");
	                    break;
	                case "8":  //富文本
	                    $("#define").val("text");
	                    break;
	                case "9":  //上传图片
	                    $("#define").val("varchar(255)");
	                    break;
	                case "10":  //上传附件
	                    $("#define").val("varchar(255)");
	                    break;
	                default:
	                    $("#define").val("int(11)");
	                    break;
	            }
			});
			$("#f_type").change(function(event) {
				if($(this).val() == 0){
					$(".jing").show();
					$(".dong").hide();
				}
				if($(this).val() == 1){
					$(".jing").hide();
					$(".dong").show();
				}
			});
			$("#para_btn").click(function(event) {
				$(".m-layer").show();
			});
			$(".lyclose").click(function(event) {
				$(".m-layer").hide();
			});
			$("#btn_ok").click(function(event) {
				if($("#f_type").val() == 0){
					var para = ({
						"type": "0", 
						"data": $("#jing_para").val()
					});
					$str = para.toJSONString();
					$("#para").val($str);
					$("#para_span").text($str);
				}
				if($("#f_type").val() == 1){
					var para = ({
						"type": "1", 
						"table": $("#dong_table").val(),
						"key": $("#dong_key").val(),
						"value": $("#dong_value").val(),
					});
					$str = para.toJSONString();
					$("#para").val($str);
					$("#para_span").text($str);
				}
				$(".m-layer").hide();
			});
		});
	</script>

	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	
	<div id="main" class="g-main">
		<table class="m-table"></table>	
		<div class="row m-title">
			<h2>字段管理 - 新增字段</h2>
		</div>
		<div class="row">
			<a class="u-btn" href="<?php echo U('/Admin/Field/index/rid/'.$rid.'');?>">返回列表</a>
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
					<li rel="tab_2">
						<a href="#">扩展</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" action="__SELF__" method="post">
					<fieldset>
						<div class="tab tab_1">
							<div><input type="hidden" name="tbl_id" value="<?php echo ($rid); ?>"/></div>
							<div class="formitm">
								<label class="lab">名称:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="title"/>
									<p>用于后台显示的配置标题</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">标识:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="name"/>
									<p>标识用于程序控制</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">模型类型:</label>
								<div class="ipt">
									<select name="type" class="u-select" id="type">
										<option value="-1">==请选择==</option>
										<?php if(is_array($field_type)): $i = 0; $__LIST__ = $field_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vi); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<p>用于表单中的展示方式</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">字段定义:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="define" id="define"/>
									<p>字段属性的sql表示</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">参数:</label>
								<div class="ipt">
									<input type="hidden" name="para" id="para">
									<input type="button" class="u-btn" id="para_btn" value="参数">
									<span class="u-ipt" id="para_span"></span>
									<p>布尔、枚举、多选字段类型的定义数据</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">默认值:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="default"/>
									<p>字段的默认值</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">字段备注:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="description"/>
									<p>用于表单中的提示</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">是否显示:</label>
								<div class="ipt">
									<select name="show_type" class="u-select">
										<?php if(is_array($field_show_type)): $i = 0; $__LIST__ = $field_show_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vi); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<p>是否显示在表单中</p>
								</div>
							</div>
						</div>
						<div class="tab tab_2">
							<div class="formitm">
								<label class="lab">验证方式:</label>
								<div class="ipt">
									<select name="check_type" class="u-select">
										<?php if(is_array($field_check_type)): $i = 0; $__LIST__ = $field_check_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vi); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<p>是否显示在表单中</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">验证规则:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="check_rule"/>
									<p>根据验证方式定义相关验证规则</p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">出错提示:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="check_msg"/>
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">验证时间:</label>
								<div class="ipt">
									<select name="check_time" class="u-select">
										<?php if(is_array($field_check_time)): $i = 0; $__LIST__ = $field_check_time;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vi); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">自动完成方式:</label>
								<div class="ipt">
									<select name="default_type" class="u-select">
										<?php if(is_array($field_default_type)): $i = 0; $__LIST__ = $field_default_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vi); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">自动完成规则:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="default_rule"/>
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">自动完成时间:</label>
								<div class="ipt">
									<select name="default_time" class="u-select">
										<?php if(is_array($field_default_time)): $i = 0; $__LIST__ = $field_default_time;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($vi); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
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

	<div class="m-layer">
	    <div class="lymask"></div>
	    <table class="lytable"><tbody><tr><td class="lytd">
	    <div class="lywrap">
		    <div class="lytt"><h2 class="u-tt">参数</h2><span class="lyclose">×</span></div>
		    <div class="lyct">
		    	<div class="m-form">
			    	<div class="formitm">
						<label class="lab" style="width:40px;">类型:</label>
				    	<div class="ipt" style="margin-left:50px;">
							<select class="u-select" id="f_type">
								<option value="0">静态</option>
								<option value="1">动态</option>
							</select>
						</div>	
			    	</div>
			    	<div class="jing">
				    	<div class="formitm">
							<label class="lab" style="width:40px;">数据:</label>
							<div class="ipt" style="margin-left:50px;">
								<textarea id="jing_para" class="u-textarea"></textarea>
							</div>
						</div>	
			    	</div>
					<div class="dong" style="display:none;">
						<div class="formitm">
							<label class="lab" style="width:40px;">模型:</label>
							<div class="ipt" style="margin-left:50px;">
								<input type="text" id="dong_table" class="u-ipt">
							</div>
						</div>	
						<div class="formitm">
							<label class="lab" style="width:40px;">key:</label>
							<div class="ipt" style="margin-left:50px;">
								<input type="text" id="dong_key" class="u-ipt">
							</div>
						</div>	
						<div class="formitm">
							<label class="lab" style="width:40px;">value:</label>
							<div class="ipt" style="margin-left:50px;">
								<input type="text" id="dong_value" class="u-ipt">
							</div>
						</div>	

					</div>
		        </div>
		    </div>
		    <div class="lybt">
		        <div class="lyother">
		            <p> </p>
		        </div>
		        <div class="lybtns">
		            <button type="button" class="u-btn" id="btn_ok">确定</button>
		        </div>
		    </div>
	    </div></td></tr></tbody></table>
	</div>

</body>
</html>