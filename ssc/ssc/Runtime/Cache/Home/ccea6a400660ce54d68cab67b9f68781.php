<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <title>JC投注后台管理</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link href="/Public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" /> 
  <link href="/Public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" /> 
  <link href="/Public/css/animate.min.css" rel="stylesheet" />
  <link href="/Public/css/plugins/iCheck/custom.css" rel="stylesheet"> 
  <link href="/Public/css/style.min862f.css?v=4.1.0" rel="stylesheet" /> 
 </head>
<body>
<style>
.login-back {background:url(/Public/img/bg.png) no-repeat top center;background-size:100% 100%;width:100%;height:100%;position:fixed;top:0;left:0;font-family:"Microsoft YaHei";}
.login-user {background:url(/Public/img/login.png) no-repeat bottom center;width:600px;height:500px;position:fixed;top:50%;left:50%;margin:-250px 0 0 -300px;}
.login-user h3 {height:60px;line-height:60px;padding:0;margin:0;text-align:center;letter-spacing:3px;font-size:36px;color:#fff;text-align:center;font-weight:400;}
.login-user h3 img {vertical-align:middle;margin:0 12px 0 0;}
.login-form {padding:68px 0 0 0;}
.login-group {/*height:50px;*/line-height:50px;padding:15px 0;}
.login-group .div-l {width:160px;text-align:right;font-size:15px;color:#fff;float:left;}
.login-group .div-r {float:left;}
.login-group input,.login-group button {width:336px;height:50px;padding:0 12px;line-height:50px;border-radius:3px;outline:none;border:none;font-family:"Microsoft YaHei";font-size:15px;color:#333;}
.login-group img {border-radius:3px;}
.login-group button {background:#3399ff;/*width:360px;*/padding:0;color:#fff; cursor: pointer;}
.login-group input.w165 {width:141px;margin:0 30px 0 0;}
.clearfix:after {content:".";display:block;height:0;clear:both;visibility:hidden}
</style>
<div class="login-back">
  <div class="login-user">
    <h3><img src="/Public/img/logo.png" width="64" height="60" alt=""/>后台管理系统</h3>
    <form class="login-form" role="form" action="" method="post">
      <div class="login-group clearfix">
        <div class="div-l">用户名：</div>
        <div class="div-r">
			<input type="text" class="form-control" name="account" required="">
        </div>
      </div>
      <div class="login-group clearfix">
        <div class="div-l">密码：</div>
        <div class="div-r">
			<input type="password" class="form-control" name="password" required="">
        </div>
      </div>
      <div class="login-group clearfix">
        <div class="div-l">验证码：</div>
        <div class="div-r"><input id="j_verify" name="code" type="text" class="form-control w165"></div>
        <div class="div-r"><img id="verify_img" width="165" height="50" alt="点击更换" title="点击更换" src="<?php echo U('login/verify',array());?>" ></div>
	  </div>
      <div class="login-group">
        <div class="div-l">&nbsp;</div>
		<div class="div-r"><button type="submit">登 录</button></div>
	  </div>
    </form>
  </div>
</div>
<script src="/Public/js/jquery.min.js?v=2.1.4"></script> 
  <script src="/Public/js/bootstrap.min.js?v=3.3.6"></script> 
  <script src="/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script> 
  <script src="/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
  <script src="/Public/js/plugins/layer/layer.min.js"></script> 
 <script src="/Public/js/hplus.min.js?v=4.1.0"></script> 
  <script type="text/javascript" src="/Public/js/contabs.min.js"></script> 
  <script src="/Public/js/plugins/pace/pace.min.js"></script>  
  <script src="/Public/js/plugins/peity/jquery.peity.min.js"></script>
  <script src="/Public/js/content.min.js?v=1.0.0"></script>
  <script src="/Public/js/plugins/iCheck/icheck.min.js"></script>
  <script src="/Public/js/demo/peity-demo.min.js"></script>
  <!-- <script src="/Public/js/plugins/echarts/echarts-all.js"></script>-->
 <!--<script src="/Public/js/demo/echarts-demo.min.js"></script>-->
  <script src="/Public/js/hplus.min.js?v=4.1.0"></script>
  <script src="/Public/js/plugins/pace/pace.min.js"></script>
  <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
  </script>

<script>
$("#verify_img").click(function() {
   var verifyURL = "<?php echo U('login/verify',array());?>";
   var time = new Date().getTime();
   $("#verify_img").attr({
      "src" : verifyURL
   });
});
</script>
</body>
</html>