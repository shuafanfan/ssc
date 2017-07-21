<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo ($title); ?></title>
		<link rel="stylesheet" href="/Public/Html/css/index.css">
		<link rel="stylesheet" href="/Public/Html/lib/jquery.searchableselect.css" />
		<script src="/Public/Html/lib/jquery.min.js"></script>
		<script src="/Public/Html/lib/jquery.rotate.min.js"></script> 

	</head>

	<body>
	 

		<script>
			$(function() {
				login("<?php echo ($status); ?>");
			});

			
			//页面切换ajax
			function login(login) {
				

				if(login == 1) {
					console.log("home");
					$('body div').remove();
					$('body').prepend('<div id="ym_home"></div>')
					$('#ym_home').load('/html/index/home.html');
					$('body').prepend('<div id="ym_public"></div>')
					$('#ym_public').load('/html/index/footer');
				} else {
					console.log("login");
					$('body div').remove();
					$('body').prepend('<div id="ym_login"></div>')
					$('#ym_login').load('/html/index/login.html');
				}
			};

			$(document).on('click', '#login_btn_zh', function() {
				$('#ym_login').remove();
				$('body').prepend('<div id="ym_register"></div>')
				$('#ym_register').load('/html/index/register.html');
			});
			$(document).on('click', '#a_ym_login', function() {
				$('#ym_register').remove();
				$('body').prepend('<div id="ym_login"></div>')
				$('#ym_login').load('/html/index/login.html');
			});
			//$(document).on('click','#login_btn',function(){
			//	    $('#ym_login').remove();
			//	    $('body').prepend('<div id="ym_home"></div>')
			//		$('#ym_home').load('home');
			//	    $('body').prepend('<div id="ym_public"></div>')
			//		$('#ym_public').load('public');
			//});

			$(document).on('click', '#login_btn', function() {
				$.ajax({
					//                cache: true,
					type: "POST",
					url: '<?php echo U("Html/Index/login");?>',
					data: $('#formlogin').serialize()+"&index=yes",
					async: false,
					dataType: 'json',
					success: function(data) {
						if(data.state == 8) {
							alert('账号异常，请联系客服！');
						}
						if(data.state == 7) {
							alert('账号异常，请等待'+ "<?php $res=M("setting")->where("id=13")->find(); if(13==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?> "+'分钟再登录！');
						}
						if(data.state == 3) {
							alert('密码错误！');
						}
						if(data.state == 2) {
							alert('账号不存在！');
						}
						if(data.state == 1) {
							alert('验证码错误！');
						}
						if(data.state == 4) {
							alert('登陆成功！');
							login(true);
						} else if(data.state == 5) {
							alert('登陆失败！');

						}
						if(data.state == 6) {
							alert('账号已经被封，请联系客服！');
						}
					},
					error:function(){
						console.log("ccc");
					}
				});
			});
			//$(document).on('click','#sign_out',function(){
			//	    $('body div').remove();
			//	    $('body').prepend('<div id="ym_login"></div>')
			//		$('#ym_login').load('login.html');
			//	    $('body').attr("id","");
			//});
			$(document).on('click', '#sign_out', function() {
				$.ajax({
					//                cache: true,
					type: "POST",
					url: '<?php echo U("Html/Index/logout");?>',
					data: { 'status': 1 },
					async: false,
					dataType: 'json',
					success: function(data) {
						if(data.state == 1) {
							alert('退出成功！');
							login(false);
						}

					}
				});

			});

			$(document).on('click', '.section_content > div ul a', function() {
				$('#ym_home').remove();
				$('#ym_public').after('<div id="ym-center"></div>');
				$('#ym_public').after('<div id="ym_side"></div>');
				$('#ym_public').after('<div id="ym_sildebar">');
				$('#ym_sildebar').load('/html/index/sidebar.html');
				$('#ym_side').load('/html/index/side.html');
				$('body').attr("id", "section");

				switch($(this).data("id")) {
					case 'ssccq':
						$('#ym-center').load('<?php echo U("Html/Category/ssccq");?>');
						break;
					case 'sscyn':
						$('#ym-center').load('<?php echo U("Html/Category/sscyn");?>');
						break;
					case 'ssctj':
						$('#ym-center').load('<?php echo U("Html/Category/ssctj");?>');
						break;
					case 'sscxj':
						$('#ym-center').load('<?php echo U("Html/Category/sscxj");?>');
						break;
					case 'txffc':
						$('#ym-center').load('<?php echo U("Html/Category/txffc");?>');
						break;
					case 'syx5gd':
						$('#ym-center').load('<?php echo U("Html/Category/syx5gd");?>');
						break;
					case 'syx5jx':
						$('#ym-center').load('<?php echo U("Html/Category/syx5jx");?>');
						break;
					case 'syx5sd':
						$('#ym-center').load('<?php echo U("Html/Category/syx5sd");?>');
						break;
					case 'syx5aw':
						$('#ym-center').load('<?php echo U("Html/Category/syx5aw");?>');
						break;
					case 'syx5sh':
						$('#ym-center').load('<?php echo U("Html/Category/syx5sh");?>');
						break;
					case 'k3js':
						$('#ym-center').load('<?php echo U("Html/Category/k3js");?>');
						break;
					case 'k3aw':
						$('#ym-center').load('<?php echo U("Html/Category/k3aw");?>');
						break;
					case 'k3jl':
						$('#ym-center').load('<?php echo U("Html/Category/k3jl");?>');
						break;
					case 'k3bj':
						$('#ym-center').load('<?php echo U("Html/Category/k3bj");?>');
						break;
					case 'k3gx':
						$('#ym-center').load('<?php echo U("Html/Category/k3gx");?>');
						break;
					case 'kl10fcq':
						$('#ym-center').load('<?php echo U("Html/Category/kl10fcq");?>');
						break;
					case 'kl10ftj':
						$('#ym-center').load('<?php echo U("Html/Category/kl10ftj");?>');
						break;
					case 'kl10fgd':
						$('#ym-center').load('<?php echo U("Html/Category/kl10fgd");?>');
						break;
					case 'kl10fhlj':
						$('#ym-center').load('<?php echo U("Html/Category/kl10fhlj");?>');
						break;
					case 'kl10fsx':
						$('#ym-center').load('<?php echo U("Html/Category/kl10fsx");?>');
						break;
					case 'kl10fhn':
						$('#ym-center').load('<?php echo U("Html/Category/kl10fhn");?>');
						break;
					case 'bjpk10':
						$('#ym-center').load('<?php echo U("Html/Category/bjpk10");?>');
						break;
					case 'fc3d':
						$('#ym-center').load('<?php echo U("Html/Category/fc3d");?>');
						break;
					case 'xg6hc':
						$('#ym-center').load('<?php echo U("Html/Category/xg6hc");?>');
						break;
					case 'shssl':
						$('#ym-center').load('<?php echo U("Html/Category/shssl");?>');
						break;
					default:
						return false
				}

			});
			var count_down_time,timerno,opentimerget;
		</script>
		<script src="/Public/Html/lib/jquery.rotate.min.js"></script>
</body>