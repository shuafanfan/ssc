<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/Public/Html/css/login.css" />
		<script src="/Public/Html/lib/jquery.mousewheel.js"></script>
		<script src="/Public/Html/js/login.js"></script>
	</head>

	<body>
		<script type="text/javascript">

			var register ="<?php $res=M("setting")->where("id=9")->find(); if(9==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?> ";
			 //console.log(register)
			// 注册开关
			if(register != 1){
				$('#zhuche').remove();
				$('#num_5').remove();
			}
		</script>
		<div class="fixed_list">
			<ul>
				<li>登录</li>
				<li>测速</li>
				<li>用户反馈</li>
				<li>关于我们</li>
				<li>优惠活动</li>
				<li id="zhuche">注册</li>
			</ul>
		</div>
		<div class="num_box">
			<div class="num" id="num_0">
				<div id="login" class="clearfix">
					<div class="logo clearfix">
						<img src="/Public/Html/images/login_logo.png" alt="logo" />
						<div class="system"></div>
					</div>
					<div class="login_main clearfix">
						<form id="formlogin" method="post" onsubmit="return false;">
							<input type="text" placeholder="请输入用户名" id="username" name="account" />
							<input type="password" placeholder="请输入密码" id="password" name="password" />
							<a href="#" class="forget">忘记密码？</a>
							<input type="text" placeholder="请输入验证码" id="code" name="code" />
							<img id="code" src="<?php echo U('Html/Index/verify');?>" class="code_message" onClick="this.src=this.src+'&t='+Math.random()" />
							<input type="submit" value="立即登录" id="login_btn" />
						</form>
					</div>
				</div>
			</div>
			<div class="num" id="num_1">
				<div class="login_cs">
					<p>温馨提示：请根据最少毫秒数，选择最快的线路进入
						<a onclick='getping()'>重测</a>
					</p>
					<dl id="urllist">
						<dd><span id="span_color1">测速中</span><i id="time1"></i>
							<a id="links1" href="javascript:void(0);">进入</a>
							<div id="host1"></div>
						</dd>
						<dd><span id="span_color2">测速中</span><i id="time2"></i>
							<a id="links2" href="javascript:void(0);">进入</a>
							<div id="host2"></div>
						</dd>
						<dd><span id="span_color3">测速中</span><i id="time3"></i>
							<a id="links3" href="javascript:void(0);">进入</a>
							<div id="host3"></div>
						</dd>
						<dd><span id="span_color4">测速中</span><i id="time4"></i>
							<a id="links4" href="javascript:void(0);">进入</a>
							<div id="host4"></div>
						</dd>
						<dd><span id="span_color5">测速中</span><i id="time5"></i>
							<a id="links5" href="javascript:void(0);">进入</a>
							<div id="host5"></div>
						</dd>
					</dl>
				</div>
			</div>
			<script>
				var autourl = new Array();
				var bb = 1;
				b=0;
				var jishi,tim;

				function getping() {
					bb = 1;
					tim = 1;
					clearInterval(jishi);
					jishi = setInterval('tim++;console.log(tim);console.log("b="+b);if(tim>202){clearInterval(jishi);}', 100);
					$.ajax({
						type: "GET",
						url: "<?php echo U('Html/Getdata/getaurlping');?>",
						async: true,
						timeout: 10000,
						success: function(data) {
							$("#urllist").empty();
							var html = "";
							for(var i = 0; i < data.length; i++) {
								a = i + 1;
								html += '<dd><span id="span_color' + a + '">测速中</span><i id="time' + a + '"></i><a id="links' + a + '" href="javascript:void(0);">进入</a><div id="host' + a + '"></div></dd>';
								autourl[a] = 'http://' + data[i].url;

							}
							$("#urllist").append(html);
							run();
						}

					})
				}
				
				
				

				function auto(url) {
					//console.log(url);
					document.getElementById("host" + bb).innerHTML = url;
					document.getElementById("links" + bb).href = url;
					console.log(bb);
					if(tim <= 3) {
						document.getElementById("time" + bb).innerHTML = tim * 10 + "ms";
						$("#span_color" + bb).attr('class', 'span_0');
						$("#span_color" + bb).html('极速');
					}
					if(tim > 3 && tim < 12) {
						document.getElementById("time" + bb).innerHTML = tim * 10 + "ms";
						$("#span_color" + bb).attr('class', 'span_1');
						$("#span_color" + bb).html('正常');
					}
					if(tim > 12 && tim < 200) {
						document.getElementById("time" + bb).innerHTML = tim * 10 + "ms";
						$("#span_color" + bb).attr('class', 'span_2');
						$("#span_color" + bb).html('缓慢');
					}
					if(tim > 200) {
						document.getElementById("time" + bb).innerHTML = "超时";
						$("#span_color" + bb).attr('class', 'span_3');
						$("#span_color" + bb).html('超时');
					}

					bb++;
				}

				function run() {
					 $(".cesu").remove();
					for(var i = 1; i < autourl.length; i++) {
						$("body").append("<img src=" + autourl[i] + "/" + Math.random() + " width=1 height=1 onerror=auto('" + autourl[i] + "') style='display:none'>");
					}

				}
				
				$(".login_btn").click(function(){ clearInterval(jishi); tim=220; });

			</script>
			<div class="num" id="num_2">
				<div class="login_yh">
					<dl>
						<dd class="dd_1">
							<div>来JC真的会有奇迹发生，信不信由你 ，反正我是信了，下手就有机会</div><i></i><span><img src="/Public/Html/images/avatar2.png" width="40" height="40" alt=""/></span></dd>
						<dd class="dd_2">
							<div>JC是我用过最好的平台，我会常驻，值 得推荐给大家！</div><i></i><span><img src="/Public/Html/images/avatar5.png" width="40" height="40" alt=""/></span></dd>
						<dd class="dd_3" style="display: none;">
							<div>别人让我推荐什么好的平台，我都毫不 犹豫告诉他：JC</div><i></i><span><img src="/Public/Html/images/avatar3.png" width="40" height="40" alt=""/></span></dd>
						<dd class="dd_4" style="display: none;">
							<div>真正公平公正的投注平台，以娱乐的心 态玩彩，居然中了不少</div><i></i><span><img src="/Public/Html/images/avatar4.png" width="40" height="40" alt=""/></span></dd>
						<dd class="dd_5">
							<div>JC是我见过最流畅，最全面的平台</div><i></i><span><img src="/Public/Html/images/avatar.png" width="40" height="40" alt=""/></span></dd>
					</dl>
				</div>
			</div>
			<div class="num" id="num_3">
				<div class="login_gy">
					<dl>
						<dt><img src="/Public/Html/images/Betting-system1.png" width="296" height="100" alt=""/></dt>
						<dd class="dd_1">健全资金风险掌控力，为您阻风挡雨保驾护航！</dd>
						<dd class="dd_2">稳健的资金掌控能力，强大的现金流<br />100%兑现赔付，保您畅玩无忧！</dd>
						<dd class="dd_3">10家银行转账充值，15家银行快捷充值<br />19家银行银联快捷充值，微信充值<br />充值30秒内到账，提现3分钟内到账</dd>
						<dd class="dd_4">最优奖金组合+最强奖金兑现力的双重保障<br />返奖更高，盈利更多！</dd>
					</dl>
				</div>
			</div>
			<div class="num" id="num_4">
				<div class="login_hd">
					<dl>
						<dd class="dd_1">宝箱</dd>
						<dd class="dd_2">亿元壕送</dd>
						<dd class="dd_3">会员生日<br />庆生活动</dd>
						<dt><a href="javascript:void(0);">立即登录</a></dt>
						<dd class="dd_4">VIP特权</dd>
						<dd class="dd_5">24小时<br />嗨翻全场</dd>
					</dl>
				</div>
			</div>
			<!-- 注册界面-->
			<div class="num" id="num_5">
				<div id="login" class="clearfix">
					<div class="logo clearfix">
						<img src="/Public/Html/images/login_logo.png" alt="logo" />
						<h1 style="font-size: 48px;margin-top: 43px;">会员注册</h1>
					</div>
				</div>
				<div class="login_hd clearfix register" style="margin-top: 200px;">

					<form id="form_register" method="post" onsubmit="return false;">
						<div class="control_group">
							<span>用户名:</span><input type="text" placeholder="请输入用户名" name="name">
							<div class="txt_info" id="tip_1">请输入以字母开头8至16位的英文或数字</div>
						</div>
						<div class="control_group">
							<span>手机号:</span><input type="text" placeholder="请输入手机号" name="mobile" onkeyup="this.value=this.value.replace(/[^\d]/g,'') " onafterpaste="this.value=this.value.replace(/[^\d]/g,'') ">
							<div class="txt_info" id="tip_2">请输入您的手机号</div>
						</div>
						<div class="control_group">
							<span>设置密码:</span><input type="password" placeholder="请输入您要设置的密码" name="password">
							<div class="txt_info" id="tip_3">请输入6至12位的英文或数字</div>
						</div>
						<div class="control_group">
							<span>确认密码:</span><input type="password" placeholder="请重新输入密码" name="confirm_password">
							<div class="txt_info" id="tip_4"></div>
						</div>
						<div class="control_group">
							<span>验证码:</span><input type="text" placeholder="请输入验证码" maxlength="4" name="code"><span class="span_img"><img src="<?php echo U('index/verify',array());?>" alt="点击刷新验证码" id="verify_img"/></span>
							<div class="txt_info" id="tip_5" style="margin-left: 20px;">请输入验证码</div>
						</div>
						<div class="btn_sub">
							<button id="in_register" class="sub">立即注册</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<input type="hidden" value="0" class="ddw" />
		<input type="hidden" value="0" class="ddw2" />
	</body>

</html>