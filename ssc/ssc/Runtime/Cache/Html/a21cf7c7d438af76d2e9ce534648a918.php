<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/Public/Html/css/default.css" />
		<script src="/Public/Html/js/jquery.min.js"></script>
	</head>

	<body>
		<div id="sidebar" class="clear_fix">
			<ul class="sidebar_list">
				<li class="sidebar_item">
					<i class="sidebar_zk"></i>
				</li>
				<li class="sidebar_item">
					<i class="sidebar_zzfw"></i>
					<p>自助服务</p>
				</li>
				<li class="sidebar_item">
					<i class="sidebar_sy"></i>
					<p>声音</p>
				</li>
				<li class="sidebar_item">
					<i class="sidebar_ztms"></i>
					<p>主题模式</p>
				</li>
				<li class="sidebar_item">
					<i class="sidebar_xlxz"></i>
					<p>线路选择</p>
				</li>
				<li class="sidebar_item">
					<i class="sidebar_ymjc"></i>
					<p>域名检测</p>
				</li>
				<li class="sidebar_item">
					<i class="sidebar_yclb"></i>
					<p>隐藏列表</p>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			// 鼠标移入移除侧边栏效果
			$(document).on('mouseenter mouseleave','#sidebar .sidebar_list .sidebar_item', function(e) {
				var index = $(this).index();
				var bgImg = null;
				
				if(e.type == 'mouseenter') {
					// 鼠标移入
					switch(index) {
						case 0:
							bgImg = '/Public/Html/images/cut/zk2.png'
							break;
						case 1:
							bgImg = '/Public/Html/images/cut/zzkf2.png'
							break;
						case 2:
							bgImg = '/Public/Html/images/cut/sy2.png'
							break;
						case 3:
							bgImg = '/Public/Html/images/cut/ztms2.png'
							break;
						case 4:
							bgImg = '/Public/Html/images/cut/xlxz2.png'
							break;
						case 5:
							bgImg = '/Public/Html/images/cut/ymjc2.png'
							break;
						case 6:
							bgImg = '/Public/Html/images/cut/yclb2.png'
							break;
						default:
							break;
					}
				}else if(e.type =='mouseleave'){
					// 鼠标移出
						switch(index) {
						case 0:
							bgImg = '/Public/Html/images/cut/zk.png'
							break;
						case 1:
							bgImg = '/Public/Html/images/cut/zzkf.png'
							break;
						case 2:
							bgImg = '/Public/Html/images/cut/sy.png'
							break;
						case 3:
							bgImg = '/Public/Html/images/cut/ztms.png'
							break;
						case 4:
							bgImg = '/Public/Html/images/cut/xlxz.png'
							break;
						case 5:
							bgImg = '/Public/Html/images/cut/ymjc.png'
							break;
						case 6:
							bgImg = '/Public/Html/images/cut/yclb.png'
							break;
						default:
							break;
					}										
				}
				// 添加样式
				$(this).children('i').css('background-image', 'url("' + bgImg + '")');
			});
		 // 点击侧边栏子菜单
		</script>
	</body>

</html>