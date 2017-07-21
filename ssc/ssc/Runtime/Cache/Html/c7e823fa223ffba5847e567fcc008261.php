<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="/Public/Html/css/default.css"/>
<script src="/Public/Html/js/jquery.min.js"></script>
</head>
<body id="section">
<!--内容-->

 <div class="lottery"> 
    <!--左侧导航-->
    <div class="left_menu">
      <h5>热门彩种</h5>
      <div class="menu_top"> 
        <a href="javascript:void(0);" data-id="ssccq">
        <div>重庆时时彩
          <h1 class="alt-2">10:10:20</h1>
        </div>
        </a> 
        <a href="javascript:void(0);" data-id="bjpk10">
        <div>北京PK拾
          <h1 class="alt-2">10:30:20</h1>
        </div>
        </a> 
        <a href="javascript:void(0);" data-id="syx5gd">
        <div>广东11选5
          <h1 class="alt-2">12:30:10</h1>
        </div>
        </a> 
        <a href="javascript:void(0);" data-id="txffc">
        <div>腾讯分分彩
          <h1 class="alt-2">12:30:45</h1>
        </div>
        </a> 
        <a href="javascript:void(0);" data-id="k3js">
        <div>江苏快3
          <h1 class="alt-2">12:30:45</h1>
        </div>
        </a> 
        <a href="javascript:void(0);" data-id="kl10fcq">
        <div>重庆快乐十分
          <h1 class="alt-2">12:30:45</h1>
        </div>
        </a> 
      </div>
      <ul class="menu">
        <li class="level1"> <a href="javascript:void(0);" class="show"><i></i>时时彩</a>
          <ul class="level2">
            <li data-id="ssccq">重庆时时彩</li>
            <li data-id="ssctj">天津时时彩</li>
            <li data-id="sscxj">新疆时时彩</li>
            <li data-id="txffc">腾讯分分彩</li>
            <li data-id="sscyn">云南时时彩</li>
          </ul>
        </li>
        <li class="level1"> <a href="javascript:void(0);"><i></i>十一选五</a>
          <ul class="level2">
            <li data-id="syx5gd">广东11选5</li>
            <li data-id="syx5jx">江西11选5</li>
            <li data-id="syx5sd">山东11选5</li>
            <li data-id="syx5aw">安徽11选5</li>
            <li data-id="syx5sh">上海11选5</li>
          </ul>
        </li>
        <li class="level1"> <a href="javascript:void(0);"><i></i>快三</a>
          <ul class="level2">
            <li data-id="k3js">江苏快3</li>
            <li data-id="k3aw">安徽快3</li>
            <li data-id="k3jl">吉林快3</li>
            <li data-id="k3bj">北京快3</li>
            <li data-id="k3gx">广西快3</li>
          </ul>
        </li>
        <li class="level1"> <a href="javascript:void(0);"><i></i>快乐彩</a>
          <ul class="level2">
            <li data-id="fc3d">福彩3D</li>
            <li data-id="xg6hc">香港六合彩</li>
          </ul>
        </li>
        <li class="level1"> <a href="javascript:void(0);"><i></i>快乐十分</a>
          <ul class="level2">
            <li data-id="kl10fcq">重庆快乐十分</li>
            <li data-id="kl10ftj">天津快乐十分</li>
            <li data-id="kl10fgd">广东快乐十分</li>
            <li data-id="kl10fsx">山西快乐十分</li>
            <li data-id="kl10fhlj">黑龙江快乐十分</li>
            <li data-id="kl10fhn">湖南快乐十分</li>
          </ul>
        </li>
        <li class="level1"> <a href="javascript:void(0);"><i></i>其他</a>
          <ul class="level2">
            <li data-id="bjpk10">北京赛车</li>
          </ul>
        </li>
        <div class="lf_hidden"> <i></i> <span>隐藏列表</span> </div>
      </ul>
    </div>
    <div class="lf_show"> </div>
    <!--左侧导航结束-->
  </div>

<script>
    // 左导航开始
$(function(){
        $(".level1 > a").click(function(){
            $(this).addClass("current")
                    .next().show(200)
                    .parent().siblings().children("a").removeClass("current")        //父元素的兄弟元素的子元素移除"current"样式
                    .next().hide(200);                //它们的下一个元素隐藏
            return false;
        });
        $(".lf_hidden").click(function(){
            $(".left_menu").slideUp(1000);
            $(".lf_show").slideDown(1000);
        })
        $(".lf_show").click(function(){
            $(this).slideUp(1000);
            $(".left_menu").slideDown(1000);
        })
    });
// 左导航结束
$(document).on('click','.left_menu .menu_top a',function(){
      switch($(this).data("id"))
    {
    case 'ssccq':
      $('#ym-center').load('<?php echo U('Html/Category/ssccq');?>');
      break;
    case 'bjpk10':
      $('#ym-center').load('<?php echo U('Html/Category/bjpk10');?>');
      break;
    case 'syx5gd':
      $('#ym-center').load('<?php echo U('Html/Category/syx5gd');?>');
      break;
    case 'txffc':
      $('#ym-center').load('<?php echo U('Html/Category/txffc');?>');
      break;
    case 'k3js':
      $('#ym-center').load('<?php echo U('Html/Category/k3js');?>');
      break;
    case 'kl10fcq':
      $('#ym-center').load('<?php echo U('Html/Category/kl10fcq');?>');
      break;
    default:
      return false
    }
  });
$(document).on('click','.left_menu .menu li',function(){
	    switch($(this).data("id"))
		{
	    case 'ssccq':
		  $('#ym-center').load('<?php echo U('Html/Category/ssccq');?>');
		  break;
	    case 'ssctj':
		  $('#ym-center').load('<?php echo U('Html/Category/ssctj');?>');
		  break;
	    case 'sscxj':
		  $('#ym-center').load('<?php echo U('Html/Category/sscxj');?>');
		  break;
	    case 'txffc':
		  $('#ym-center').load('<?php echo U('Html/Category/txffc');?>');
		  break;
	    case 'sscyn':
		  $('#ym-center').load('<?php echo U('Html/Category/sscyn');?>');
		  break;
		case 'syx5gd':
		  $('#ym-center').load('<?php echo U('Html/Category/syx5gd');?>');
		  break;
		case 'syx5jx':
		  $('#ym-center').load('<?php echo U('Html/Category/syx5jx');?>');
		  break;
		case 'syx5sd':
		  $('#ym-center').load('<?php echo U('Html/Category/syx5sd');?>');
		  break;
		case 'syx5aw':
		  $('#ym-center').load('<?php echo U('Html/Category/syx5aw');?>');
		  break;
		case 'syx5sh':
		  $('#ym-center').load('<?php echo U('Html/Category/syx5sh');?>');
		  break;
		case 'k3js':
		  $('#ym-center').load('<?php echo U('Html/Category/k3js');?>');
		  break;
		case 'k3aw':
		  $('#ym-center').load('<?php echo U('Html/Category/k3aw');?>');
		  break;
		case 'k3jl':
		  $('#ym-center').load('<?php echo U('Html/Category/k3jl');?>');
		  break;
		case 'k3bj':
		  $('#ym-center').load('<?php echo U('Html/Category/k3bj');?>');
		  break;
		case 'k3gx':
		  $('#ym-center').load('<?php echo U('Html/Category/k3gx');?>');
		  break;
		case 'fc3d':
		  $('#ym-center').load('<?php echo U('Html/Category/fc3d');?>');
		  break;
		case 'xg6hc':
		  $('#ym-center').load('<?php echo U('Html/Category/xg6hc');?>');
		  break;
		case 'kl10fcq':
		  $('#ym-center').load('<?php echo U('Html/Category/kl10fcq');?>');
		  break;
		case 'kl10ftj':
		  $('#ym-center').load('<?php echo U('Html/Category/kl10ftj');?>');
		  break;
		case 'kl10fgd':
		  $('#ym-center').load('<?php echo U('Html/Category/kl10fgd');?>');
		  break;
		case 'kl10fsx':
		  $('#ym-center').load('<?php echo U('Html/Category/kl10fsx');?>');
		  break;
		case 'kl10fhlj':
		  $('#ym-center').load('<?php echo U('Html/Category/kl10fhlj');?>');
		  break;
		case 'kl10fhn':
		  $('#ym-center').load('<?php echo U('Html/Category/kl10fhn');?>');
		  break;
		case 'bjpk10':
		  $('#ym-center').load('<?php echo U('Html/Category/bjpk10');?>');
		  break;
		default:
		  return false
		}
	});
</script>
</body>
</html>