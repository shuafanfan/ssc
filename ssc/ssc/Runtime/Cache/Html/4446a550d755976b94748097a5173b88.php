<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>号码走势图</title>
		<link type="text/css" rel="stylesheet" href="/Public/Html/css/chart.css">
	</head>

	<body>
		<div class="wrapper">
			<div class="title" id="lottery_title">重庆时时彩历史号码走势</div>
			<div class="feature">
				<div class="row" id="lottery_feature"> <span> <span class="grid"><a action="canvas_type" type="wx" class="on" index="0">五星走势图</a></span><span class="grid"><a action="canvas_type" type="sx" index="1">四星走势图</a></span><span class="grid"><a action="canvas_type" type="qs" index="2">前三走势图</a></span><span class="grid"><a action="canvas_type" type="zs" index="3">中三走势图</a></span><span class="grid"><a action="canvas_type" type="hs">后三走势图</a></span><span class="grid"><a action="canvas_type" type="qe" index="3">前二走势图</a></span><span class="grid"><a action="canvas_type" type="he" index="4">后二走势图</a></span>
					<a class="act" id="display_feature">隐藏功能区</a>
					</span>
				</div>
				<div class="row" id="row_feature" style="border-top: 1px solid #ccc;">
					<span class="grid">
						<label><input type="checkbox" checked="true" class="checkbox" value="assist_line">辅助线 </label>
					</span>
					<!--<span class="grid">
						<label><input type="checkbox"  class="checkbox" value="omit">遗漏 </label>
					</span>
					<span class="grid">
						<label><input type="checkbox"  class="checkbox" value="canvas">走势 </label>
     			 	</span>-->
					<!--
            <span class="grid">
                <label>
                    <input type="checkbox" checked class="checkbox" value="num_hot">号温
                </label>
            </span>
            -->
					<span class="grid"> <a action="issue_count" value="30" class="on">最近30期</a> </span> <span class="grid"> <a action="issue_count" value="50">最近50期</a> </span> <span class="grid"> <a action="issue_count" value="100">最近100期</a> </span> <span class="grid"> <a action="issue_count" value="300">最近300期</a> </span> </div>
			</div>
			<div id="canvas_line"></div>
			<table id="data_table" border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr class="issue_header">
						<th rowspan="2" class="grey">期号</th>
						<th rowspan="2" colspan="5" action="th_run_num" class="grey border-right">开奖号码</th>
						<th class="grey border-right" colspan="10">万位</th>
						<th class="grey border-right" colspan="10">千位</th>
						<th class="grey border-right" colspan="10">百位</th>
						<th class="grey border-right" colspan="10">十位</th>
						<th class="grey border-right" colspan="10">个位</th>
						<th class="grey border-right daxiao" colspan="5">大小</th>
						<th class="grey danshuang" colspan="5">单双</th>
					</tr>
					<tr class="Num_distribution">
						<th class="grey " g="0">0</th>
						<th class="grey " g="0">1</th>
						<th class="grey " g="0">2</th>
						<th class="grey " g="0">3</th>
						<th class="grey " g="0">4</th>
						<th class="grey " g="0">5</th>
						<th class="grey " g="0">6</th>
						<th class="grey " g="0">7</th>
						<th class="grey " g="0">8</th>
						<th class="grey border-right" g="0">9</th>
						<th class="grey " g="1">0</th>
						<th class="grey " g="1">1</th>
						<th class="grey " g="1">2</th>
						<th class="grey " g="1">3</th>
						<th class="grey " g="1">4</th>
						<th class="grey " g="1">5</th>
						<th class="grey " g="1">6</th>
						<th class="grey " g="1">7</th>
						<th class="grey " g="1">8</th>
						<th class="grey border-right" g="1">9</th>
						<th class="grey " g="2">0</th>
						<th class="grey " g="2">1</th>
						<th class="grey " g="2">2</th>
						<th class="grey " g="2">3</th>
						<th class="grey " g="2">4</th>
						<th class="grey " g="2">5</th>
						<th class="grey " g="2">6</th>
						<th class="grey " g="2">7</th>
						<th class="grey " g="2">8</th>
						<th class="grey border-right" g="2">9</th>
						<th class="grey " g="3">0</th>
						<th class="grey " g="3">1</th>
						<th class="grey " g="3">2</th>
						<th class="grey " g="3">3</th>
						<th class="grey " g="3">4</th>
						<th class="grey " g="3">5</th>
						<th class="grey " g="3">6</th>
						<th class="grey " g="3">7</th>
						<th class="grey " g="3">8</th>
						<th class="grey border-right" g="3">9</th>
						<th class="grey " g="4">0</th>
						<th class="grey " g="4">1</th>
						<th class="grey " g="4">2</th>
						<th class="grey " g="4">3</th>
						<th class="grey " g="4">4</th>
						<th class="grey " g="4">5</th>
						<th class="grey " g="4">6</th>
						<th class="grey " g="4">7</th>
						<th class="grey " g="4">8</th>
						<th class="grey border-right" g="4">9</th>
						<th class="grey  wan">万</th>
						<th class="grey  qian">千</th>
						<th class="grey  bai">百</th>
						<th class="grey  shi">十</th>
						<th class="grey border-right ge">个</th>
						<th class="grey wan">万</th>
						<th class="grey qian">千</th>
						<th class="grey bai">百</th>
						<th class="grey shi">十</th>
						<th class="grey ge">个</th>
					</tr>
					<!--这里添加内容-->

					<!--			<tr>
						<th>出现总次数</th>
						<th class="border-right" colspan="5"></th>
						<th>1</th>
						<th>2</th>
						<th>2</th>
						<th>5</th>
						<th>2</th>
						<th>1</th>
						<th>3</th>
						<th>3</th>
						<th>7</th>
						<th class="border-right">4</th>
						<th>3</th>
						<th>8</th>
						<th>2</th>
						<th>2</th>
						<th>2</th>
						<th>5</th>
						<th>4</th>
						<th>1</th>
						<th>2</th>
						<th class="border-right">1</th>
						<th>4</th>
						<th>4</th>
						<th>3</th>
						<th>5</th>
						<th>2</th>
						<th>1</th>
						<th>2</th>
						<th>5</th>
						<th>1</th>
						<th class="border-right">3</th>
						<th>6</th>
						<th>2</th>
						<th>3</th>
						<th>0</th>
						<th>2</th>
						<th>8</th>
						<th>3</th>
						<th>2</th>
						<th>3</th>
						<th class="border-right">1</th>
						<th>3</th>
						<th>3</th>
						<th>2</th>
						<th>3</th>
						<th>6</th>
						<th>4</th>
						<th>2</th>
						<th>1</th>
						<th>3</th>
						<th class="border-right">3</th>

					</tr>
					<tr>
						<th>平均遗漏值</th>
						<th class="border-right" colspan="5"></th>
						<th>30</th>
						<th>15</th>
						<th>15</th>
						<th>6</th>
						<th>15</th>
						<th>30</th>
						<th>10</th>
						<th>10</th>
						<th>4</th>
						<th class="border-right">7</th>
						<th>10</th>
						<th>3</th>
						<th>15</th>
						<th>15</th>
						<th>15</th>
						<th>6</th>
						<th>7</th>
						<th>30</th>
						<th>15</th>
						<th class="border-right">30</th>
						<th>7</th>
						<th>7</th>
						<th>10</th>
						<th>6</th>
						<th>15</th>
						<th>30</th>
						<th>15</th>
						<th>6</th>
						<th>30</th>
						<th class="border-right">10</th>
						<th>5</th>
						<th>15</th>
						<th>10</th>
						<th>30</th>
						<th>15</th>
						<th>3</th>
						<th>10</th>
						<th>15</th>
						<th>10</th>
						<th class="border-right">30</th>
						<th>10</th>
						<th>10</th>
						<th>15</th>
						<th>10</th>
						<th>5</th>
						<th>7</th>
						<th>15</th>
						<th>30</th>
						<th>10</th>
						<th class="border-right">10</th>
					</tr>
					<tr>
						<th>最大遗漏值</th>
						<th class="border-right" colspan="5"></th>
						<th>28</th>
						<th>26</th>
						<th>20</th>
						<th>11</th>
						<th>15</th>
						<th>21</th>
						<th>14</th>
						<th>17</th>
						<th>6</th>
						<th class="border-right">12</th>
						<th>11</th>
						<th>7</th>
						<th>14</th>
						<th>24</th>
						<th>20</th>
						<th>6</th>
						<th>11</th>
						<th>19</th>
						<th>24</th>
						<th class="border-right">28</th>
						<th>10</th>
						<th>19</th>
						<th>10</th>
						<th>10</th>
						<th>26</th>
						<th>27</th>
						<th>14</th>
						<th>14</th>
						<th>16</th>
						<th class="border-right">7</th>
						<th>13</th>
						<th>14</th>
						<th>18</th>
						<th>30</th>
						<th>15</th>
						<th>7</th>
						<th>12</th>
						<th>18</th>
						<th>15</th>
						<th class="border-right">27</th>
						<th>13</th>
						<th>16</th>
						<th>14</th>
						<th>14</th>
						<th>8</th>
						<th>10</th>
						<th>12</th>
						<th>22</th>
						<th>17</th>
						<th class="border-right">18</th>
					</tr>
					<tr>
						<th>最大连出值</th>
						<th class="border-right" colspan="5"></th>
						<th>1</th>
						<th>2</th>
						<th>1</th>
						<th>2</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>2</th>
						<th class="border-right">1</th>
						<th>1</th>
						<th>2</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th class="border-right">1</th>
						<th>2</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>2</th>
						<th>1</th>
						<th class="border-right">1</th>
						<th>3</th>
						<th>1</th>
						<th>1</th>
						<th>0</th>
						<th>1</th>
						<th>4</th>
						<th>1</th>
						<th>1</th>
						<th>2</th>
						<th class="border-right">1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th>2</th>
						<th>2</th>
						<th>1</th>
						<th>1</th>
						<th>1</th>
						<th class="border-right">1</th>
					</tr>
				-->
					<tr class="issue issue_footer" style="display: none;">
						<th rowspan="2" class="grey">期号</th>
						<th rowspan="2" colspan="5" action="th_run_num" class="grey border-right">开奖号码</th>
						<th class="grey " index="0">0</th>
						<th class="grey " index="0">1</th>
						<th class="grey " index="0">2</th>
						<th class="grey " index="0">3</th>
						<th class="grey " index="0">4</th>
						<th class="grey " index="0">5</th>
						<th class="grey " index="0">6</th>
						<th class="grey " index="0">7</th>
						<th class="grey " index="0">8</th>
						<th class="grey border-right" index="0">9</th>
						<th class="grey " index="1">0</th>
						<th class="grey " index="1">1</th>
						<th class="grey " index="1">2</th>
						<th class="grey " index="1">3</th>
						<th class="grey " index="1">4</th>
						<th class="grey " index="1">5</th>
						<th class="grey " index="1">6</th>
						<th class="grey " index="1">7</th>
						<th class="grey " index="1">8</th>
						<th class="grey border-right" index="1">9</th>
						<th class="grey " index="2">0</th>
						<th class="grey " index="2">1</th>
						<th class="grey " index="2">2</th>
						<th class="grey " index="2">3</th>
						<th class="grey " index="2">4</th>
						<th class="grey " index="2">5</th>
						<th class="grey " index="2">6</th>
						<th class="grey " index="2">7</th>
						<th class="grey " index="2">8</th>
						<th class="grey border-right" index="2">9</th>
						<th class="grey " index="3">0</th>
						<th class="grey " index="3">1</th>
						<th class="grey " index="3">2</th>
						<th class="grey " index="3">3</th>
						<th class="grey " index="3">4</th>
						<th class="grey " index="3">5</th>
						<th class="grey " index="3">6</th>
						<th class="grey " index="3">7</th>
						<th class="grey " index="3">8</th>
						<th class="grey border-right" index="3">9</th>
						<th class="grey " index="4">0</th>
						<th class="grey " index="4">1</th>
						<th class="grey " index="4">2</th>
						<th class="grey " index="4">3</th>
						<th class="grey " index="4">4</th>
						<th class="grey " index="4">5</th>
						<th class="grey " index="4">6</th>
						<th class="grey " index="4">7</th>
						<th class="grey " index="4">8</th>
						<th class="grey border-right" index="4">9</th>
					</tr>
					<tr class="issue issue_footer1" style="display: none;">
						<th class="grey border-right" colspan="10">万位</th>
						<th class="grey border-right" colspan="10">千位</th>
						<th class="grey border-right" colspan="10">百位</th>
						<th class="grey border-right" colspan="10">十位</th>
						<th class="grey border-right" colspan="10">个位</th>
					</tr>

				</tbody>
			</table>
			<p class="explain" style="display: none;">参数说明：</p>
			<p class="explain" style="display: none;">万 千 百 十 个 不定位对应的走势。</p>
		</div>
		<script src="/Public/Html/lib/jquery.min.js"></script>
		<script src="/Public/Html/js/canvas.min.js"></script>
		<script src="/Public/Html/js/analyze.min.js"></script>
		<script src="/Public/Html/js/chart.min.js"></script>
		<script>
			//彩种
			var LOTTERY = {
				"2": "重庆时时彩",
				"3": "新疆时时彩",
				"4": "天津时时彩",
				"6": "广东11选5",
				"7": "江西11选5",
				"8": "山东11选5",
				"9": "安徽11选5",
				"11": "江苏快三",
				"12": "安徽快三",
				"13": "吉林快三",
				"14": "北京快三",
				"15": "广西快三",
				"17": "重庆快乐10分",
				"18": "天津快乐10分",
				"19": "广东快乐10分",
				"23": "北京5分彩",
				"24": "台湾5分彩",
				"26": "北京PK拾",
				"28": "福彩3D",
				"32": "云南时时彩",
				"35": "河内5分彩",
				"40": "腾讯分分彩",
				"42": "香港六合彩",
				"43": "黑龙江时时彩",
				"44": "内蒙古时时彩",
				"46": "北京时时彩",
				"48": "北京11选5",
				"49": "福建11选5",
				"50": "甘肃11选5",
				"51": "广西11选5",
				"52": "贵州11选5",
				"53": "河北11选5",
				"54": "黑龙江11选5",
				"55": "湖北11选5",
				"56": "吉林11选5",
				"57": "江苏11选5",
				"58": "辽宁11选5",
				"59": "内蒙古11选5",
				"60": "上海11选5",
				"61": "陕西11选5",
				"62": "山西11选5",
				"63": "天津11选5",
				"64": "新疆11选5",
				"65": "云南11选5",
				"66": "浙江11选5",
				"67": "福建快三",
				"68": "甘肃快三",
				"69": "贵州快三",
				"70": "河北快三",
				"71": "湖北快三",
				"72": "江西快三",
				"73": "内蒙古快三",
				"74": "上海快三",
				"75": "黑龙江快乐十分",
				"76": "湖南快乐十分",
				"77": "陕西快乐十分",
				"78": "山西快乐十分",
				"79": "云南快乐十分",

			};
			//彩种分类

			function get_url_param_by_key(key) {
				var reg = new RegExp("(^|&)" + key + "=([^&]*)(&|$)");
				var r = window.location.search.substr(1).match(reg);
				if(r != null) {
					return unescape(r[2]);
				}
				return '';
			}

			$(function() {
				var lottery_id = get_url_param_by_key('cp_id');
				//$chart.init(lottery_id);
			});
		</script>
		<div class="Loading" gp="Loading" style="top: 410px; left: 817px; display: block;"><span class="LoadingImg"></span>
			<font>努力加载中，请稍等……</font>
		</div>

	</body>

	<script type="text/javascript">
		function trendChart(index) {
			$(this).siblings().children('a').removeClass('on');
			$(this).children('a').addClass('on');
			// 全部显示   默认 五星走势图
			$('#data_table .grey[colspan="10"]').show();
			$('#data_table td[content="site_num"]').show();
			$('#data_table th.grey[g]').show();
			$('#data_table tr.issue th:first').show();
			$('#data_table tr.issue th[index]').show();
			$('#data_table tr.clear_tr th[index]').show();
			$('#data_table tr.issue_footer1 th').show();
			$('#data_table tr[content="data_row"] td[group="fb"]').show();
			$('.Num_distribution th').show();
			$('.daxiao').attr('colspan', '5');
			$('.danshuang').attr('colspan', '5');
			switch(index) {
				case 0:
					// 五星走势图		
					break;
				case 1:
					// 四星走势图
					// 隐藏第 0 个
					$('#data_table th.grey[colspan="10"]').eq(index - 1).hide();
					// 隐藏第 0 个 表格内容
					$('#data_table td[group="0"]').hide();
					// 表头数字
					$('#data_table th.grey[g="0"]').hide();
					$('#data_table tr.issue_footer1 th:first').hide();
					$('#data_table tr.issue th[index = "0"]').hide();
					$('#data_table tr.clear_tr th[index = "0"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="0"]').hide();
					$('.Num_distribution th.wan').hide();
					$('.daxiao').attr('colspan', '4');
					$('.danshuang').attr('colspan', '4');
					break;
				case 2:
					// 前三走势图
					// 隐藏后两个
					$('#data_table th.grey[colspan="10"]').eq(index + 1).hide().end().eq(index + 2).hide();
					// 隐藏后两个表格内容
					$('#data_table td[group="3"]').hide();
					$('#data_table td[group="4"]').hide();
					// 表头数字
					$('#data_table th.grey[g="3"]').hide();
					$('#data_table th.grey[g="4"]').hide();
					$('#data_table tr.issue th[index = "4"]').hide();
					$('#data_table tr.clear_tr th[index = "4"]').hide();
					$('#data_table tr.issue th[index = "3"]').hide();
					$('#data_table tr.clear_tr th[index = "3"]').hide();
					$('#data_table tr.issue_footer1 th').eq(3).hide();
					$('#data_table tr.issue_footer1 th').eq(4).hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="3"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="4"]').hide();
					$('.Num_distribution th.shi').hide();
					$('.Num_distribution th.ge').hide();
					$('.daxiao').attr('colspan', '3');
					$('.danshuang').attr('colspan', '3');
					break;
				case 3:
					// 中三走势图
					// 隐藏 第0个 和 最后一个(第4个)
					$('#data_table th.grey[colspan="10"]').eq(0).hide().end().eq(4).hide();
					// 隐藏 第0个 和 最后一个(第4个)表格内容
					$('#data_table td[group="0"]').hide();
					$('#data_table td[group="4"]').hide();
					// 表头数字
					$('#data_table th.grey[g="0"]').hide();
					$('#data_table th.grey[g="4"]').hide();
					$('#data_table tr.issue th[index = "0"]').hide();
					$('#data_table tr.clear_tr th[index = "0"]').hide();
					$('#data_table tr.issue th[index = "4"]').hide();
					$('#data_table tr.clear_tr th[index = "4"]').hide();
					$('#data_table tr.issue_footer1 th').eq(0).hide();
					$('#data_table tr.issue_footer1 th').eq(4).hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="0"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="4"]').hide();
					$('.Num_distribution th.wan').hide();
					$('.Num_distribution th.ge').hide();
					$('.daxiao').attr('colspan', '3');
					$('.danshuang').attr('colspan', '3');

					break;
				case 4:
					// 后三走势图
					//隐藏前两个 0  1
					$('#data_table th.grey[colspan="10"]').eq(0).hide().end().eq(1).hide();
					$('#data_table td[group="0"]').hide();
					$('#data_table td[group="1"]').hide();
					$('#data_table th.grey[g="0"]').hide();
					$('#data_table th.grey[g="1"]').hide();
					$('#data_table tr.issue th[index = "0"]').hide();
					$('#data_table tr.clear_tr th[index = "0"]').hide();
					$('#data_table tr.issue th[index = "1"]').hide();
					$('#data_table tr.clear_tr th[index = "1"]').hide();
					$('#data_table tr.issue_footer1 th').eq(0).hide();
					$('#data_table tr.issue_footer1 th').eq(1).hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="0"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="1"]').hide();
					$('.Num_distribution th.wan').hide();
					$('.Num_distribution th.qian').hide();
					$('.daxiao').attr('colspan', '3');
					$('.danshuang').attr('colspan', '3');
					break;
				case 5:
					// 前二走势图
					//隐藏后三个 2 3 4
					$('#data_table th.grey[colspan="10"]').eq(2).hide().end().eq(3).hide().end().eq(4).hide();
					$('#data_table td[group="2"]').hide();
					$('#data_table td[group="3"]').hide();
					$('#data_table td[group="4"]').hide();
					$('#data_table th.grey[g="2"]').hide();
					$('#data_table th.grey[g="3"]').hide();
					$('#data_table th.grey[g="4"]').hide();
					$('#data_table tr.issue th[index = "2"]').hide();
					$('#data_table tr.clear_tr th[index = "2"]').hide();
					$('#data_table tr.issue th[index = "3"]').hide();
					$('#data_table tr.clear_tr th[index = "3"]').hide();
					$('#data_table tr.issue th[index = "4"]').hide();
					$('#data_table tr.clear_tr th[index = "4"]').hide();
					$('#data_table tr.issue_footer1 th').eq(2).hide();
					$('#data_table tr.issue_footer1 th').eq(3).hide();
					$('#data_table tr.issue_footer1 th').eq(4).hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="2"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="3"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="4"]').hide();
					$('.Num_distribution th.bai').hide();
					$('.Num_distribution th.shi').hide();
					$('.Num_distribution th.ge').hide();
					$('.daxiao').attr('colspan', '2');
					$('.danshuang').attr('colspan', '2');
					break;
				case 6:
					// 后二走势图
					// 隐藏前三个 0 1 2
					$('#data_table th.grey[colspan="10"]').eq(0).hide().end().eq(1).hide().end().eq(2).hide();
					$('#data_table td[group="0"]').hide();
					$('#data_table td[group="1"]').hide();
					$('#data_table td[group="2"]').hide();
					$('#data_table th.grey[g="0"]').hide();
					$('#data_table th.grey[g="1"]').hide();
					$('#data_table th.grey[g="2"]').hide();
					$('#data_table tr.issue th[index = "0"]').hide();
					$('#data_table tr.clear_tr th[index = "0"]').hide();
					$('#data_table tr.issue th[index = "1"]').hide();
					$('#data_table tr.clear_tr th[index = "1"]').hide();
					$('#data_table tr.issue th[index = "2"]').hide();
					$('#data_table tr.clear_tr th[index = "2"]').hide();
					$('#data_table tr.issue_footer1 th').eq(0).hide();
					$('#data_table tr.issue_footer1 th').eq(1).hide();
					$('#data_table tr.issue_footer1 th').eq(2).hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="0"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="1"]').hide();
					$('#data_table tr[content="data_row"] td[group="fb"][index="2"]').hide();
					$('.Num_distribution th.wan').hide();
					$('.Num_distribution th.qian').hide();
					$('.Num_distribution th.bai').hide();
					$('.daxiao').attr('colspan', '2');
					$('.danshuang').attr('colspan', '2');
					break;
				default:
					break;
			}

		}
		$('#lottery_feature .grid').each(function(index, ele) {
			// 走势图
			$(this).click(function() {
				trendChart.call(this, index);
			});
		});
		// 隐藏功能区
		// 定义一个开关
		var flag = true;
		// 控制功能区的开关
		$(document).on('click', '#display_feature', function() {
			if(flag) {
				$(this).html('显示功能区');

			} else {
				$(this).html('隐藏功能区');
			}
			flag = !flag;
			$('#row_feature').toggle();
		});
		// 功能块选择
		$('input[type="checkbox"]').click(function() {
			// border-bottom: 1px solid #579bc8;
			// 辅助线
			if($(this).val() == 'assist_line') {
				if(this.checked) {
					$('.RC_l').addClass('assist_line').removeClass('RC_l');
					$('.RC_r').addClass('border-right').removeClass('RC_r');
				} else {
					$('.assist_line').removeClass('assist_line').addClass('RC_l');
					$('.border-right').removeClass('border-right').addClass('RC_r');
				}
			}
			// 遗漏
			//...
			// 遗漏条
			//...
			// 走势
			//...
		});
		var id = <?php echo ($_GET['id']); ?>;
	//	var title = { $_GET['title'] };
		var str = LOTTERY[id];
		
		var code_id = <?php echo ($_GET['code']); ?>;
		// 彩种为3 清除页面 添加新内容
		if(code_id == 3) {
			var innerHTML_footer_3 = '';
			var innerHTML_footer_4 = '';
			$('#lottery_feature span span.grid').remove();
			$('#lottery_feature span').html('<span class="grid"><a action="canvas_type" type="wx" class="on">快三走势图</a></span><a class="act" id="display_feature">隐藏功能区</a>');
			var innerHe1 = '<th  class="grey"  rowspan="2">期号</th><th rowspan="2" colspan="6" action="th_run_num" class="grey border-right">开奖号码</th>';
			var innerHe2 = '<th class="grey border-right" colspan="12">第一位</th><th class="grey border-right" colspan="12">第二位</th>	<th class="grey border-right" colspan="12">第三位</th>';
			var innerHe3 = '<th class="grey border-right" colspan="12">大小</th><th class="grey border-right" colspan="12">单双</th>';
			$('#data_table  .issue_header').html(innerHe1 + innerHe2 + innerHe3);
			for(var j = 0; j < 3; j++) {
				for(var i = 1; i < 7; i++) {
					if(i == 6) {
						innerHTML_footer_3 += '<th class="grey border-right" colspan="2">' + i + '</th>';
					} else {
						innerHTML_footer_3 += '<th class="grey " colspan="2">' + i + '</th>';
					}
				}
			}
			var figure = ['一', '二', '三'];
			for(var i = 0; i < 2; i++) {
				for(var j = 1; j < 4; j++) {
					if(i == 2) {
						innerHTML_footer_4 += '<th class="grey border-right" colspan="4"> 第' + figure[j - 1] + '位</th>';
					} else {
						innerHTML_footer_4 += '<th class="grey " colspan="4">第' + figure[j - 1] + '位</th>';
					}
				}
			}
			innerHe1 += innerHTML_footer_3;
			$('#data_table  .issue_footer1').html(innerHe2);
			$('#data_table .Num_distribution').html(innerHTML_footer_3 + innerHTML_footer_4);

			$('#data_table  .issue_footer').html(innerHe1);
		}
		if(code_id == 11) {
			var innerhtml = '';
			for(var i = 0; i < 5; i++) {
				for(var j = 1; j < 12; j++) {
					if(j == 11) {
						innerhtml += '<th class="grey border-right " g="' + i + '">' + j + '</th>';
					} else {
						innerhtml += '<th class="grey " g="' + i + '">' + j + '</th>';
					}
				}

			}
			var innerhtml2 = '';
			var ARRAY = ['万', '千', '百', '十', '个'];
			for(var i = 0; i < 2; i++) {
				for(var j = 0; j < 5; j++) {
					if(j == 4) {
						innerhtml2 += '<th class="grey   border-right">' + ARRAY[j] + '</th>';
					} else {
						innerhtml2 += '<th class="grey  ">' + ARRAY[j] + '</th>';
					}
				}
			}

			$('.Num_distribution').html(innerhtml + innerhtml2);
			innerhtml = '	<th rowspan="2" class="grey">期号</th><th rowspan="2" colspan="5" action="th_run_num" class="grey border-right">开奖号码</th>' + innerhtml;
			$('.issue_footer').html(innerhtml);
			innerhtml = '';
			innerhtml += '<th class="grey border-right" colspan="11">万位</th>' +
				'<th class="grey border-right" colspan="11">千位</th><th class="grey border-right" colspan="11">' +
				'百位</th><th class="grey border-right" colspan="11">十位</th><th class="grey border-right" colspan="11">个位</th>';
			$('.issue_footer1').html(innerhtml);
			innerhtml = '<th rowspan="2" class="grey">期号</th><th rowspan="2" colspan="5" action="th_run_num" class="grey border-right">开奖号码</th>' + innerhtml + '<th class="grey border-right daxiao" colspan="5">大小</th><th class="grey danshuang" colspan="5">单双</th>';
			$('.issue_header').html(innerhtml);
			$('#lottery_feature span span.grid:first').siblings('span').remove();
		}

		$('#lottery_title').html(str);
		$('#row_feature span a').each(function(index, ele) {
			$(this).click(function() {
				$('#row_feature span a.on').removeClass('on');
				$(this).addClass('on');
				var limit = $(this).attr('value');
				$('.Loading').css('display', 'block');
				$('.issue').hide();
				$('.explain').hide();
				GetTrendData(id, limit);
			});
		});
		GetTrendData(id, 30);
		// 封装发送请求方法
		function GetTrendData(code, limit) {
			$.get('<?php echo U("Html/getdata/getdata");?>', { code, limit }, function(resdata) {
				$('#data_table tr[content="data_row"]').remove();
				// 拼接页面内容
				var innerHTML = "";
				var innerHTML1 = "";
				var innerHTML2 = "";
				var innerHTML3 = "";
				var lottery_num = [];
				var r = 0;
				var assist_line = "";
				var border_right = "";
				var bgcolor = ['red', 'blue', 'orange'];
				var total_degree = [];
				var colspan = code_id == 3 ? 1 : 1;
				var innerHTML_k3 = "";
				var time = false;
				for(var i = 0; i < resdata.length; i++) {
					assist_line = (i + 1) % 5 == 0 && i != 0 ? 'assist_line' : '';
					// expect 期号
					innerHTML1 += '<tr content="data_row" index="' + i + '"><th class="' + assist_line + '">' + resdata[i].expect + '</th>';
					// 将开奖号码转化为数组元素
					lottery_num = resdata[i].opencode.split(',');
					// 处理彩票号码为3
					if(code_id == 3) {
						// 便利开奖号码拼接字符串
						for(var j = 0; j < lottery_num.length; j++) {
							if(j < 1) {
								// 开奖号码
								innerHTML1 += '<td for="run_num" colspan="2"    class="cur_num ' + assist_line + '">0' + lottery_num[j] + '</td>';
							} else if(j == 1) {
								innerHTML1 += '<td for="run_num" colspan="2"    class="cur_num ' + assist_line + '">0' + lottery_num[j] + '</td>';
							} else if(j == 2) {
								// 开奖号码
								innerHTML1 += '<td for="run_num" colspan="2"  class="cur_num border-right ' + assist_line + '">0' + lottery_num[j] + '</td>';
							}
						}
						for(var j = 0; j < lottery_num.length; j++) {
							for(var z = 1; z < 7; z++) {

								if(z == Number(lottery_num[j])) {

									innerHTML2 += '<td content="site_num" colspan="2" group="' + j + '" index="' + z + '"  class="' + assist_line + ' ' + border_right + '" ><span class="ball red">' + lottery_num[j] + '</span></td>';
								} else {
									innerHTML2 += '<td content="site_num" colspan="2"  group="' + j + '" index="' + z + '"  class="' + assist_line + ' ' + border_right + '"><span></span></td>';
								}
							}
						}
						innerHTML3 = sizeOddEven(lottery_num, code_id);
						innerHTML_k3 += innerHTML1 + innerHTML2 + innerHTML3 + '</tr>';
						innerHTML1 = "";
						innerHTML2 = "";
						innerHTML3 = "";

					} else {
						// 便利开奖号码拼接字符串
						console.log(lottery_num);
						for(var j = 0; j < lottery_num.length; j++) {
							if(j < 4) {
								// 开奖号码
								innerHTML1 += '<td for="run_num" class="cur_num ' + assist_line + '">' + lottery_num[j] + '</td>';
							} else if(j == 4) {
								// 开奖号码
								innerHTML1 += '<td for="run_num"  class="cur_num border-right ' + assist_line + '">' + lottery_num[j] + '</td>';
							}
						}
						for(var j = 0; j < lottery_num.length; j++) {
							// 循环十次  中间内容
							var z = code_id == 5 ? 0 : 1;
							length = code_id == 5 ? 10 : 12;
							for(z; z < length; z++) {
								border_right = z == length - 1 ? "border-right" : " ";
								if(z == Number(lottery_num[j])) {
									r = Math.floor(Math.random() * 3);
									innerHTML2 += '<td content="site_num" group="' + j + '" index="' + z + '"  class="' + assist_line + ' ' + border_right + '" ><span class="ball ' + bgcolor[r] + '">' + lottery_num[j] + '</span></td>';
								} else {
									innerHTML2 += '<td content="site_num" group="' + j + '" index="' + z + '"  class="' + assist_line + ' ' + border_right + '"><span></span></td>';
								}
							}
						}
						innerHTML1 += innerHTML2;
					}
					innerHTML3 = sizeOddEven(lottery_num, code_id);
					innerHTML += innerHTML1 + innerHTML3 + '</tr>'
					// 一次循环结束 变量初始化
					lottery_num = [];
					innerHTML2 = "";
					innerHTML3 = "";
					innerHTML1 = "";
				}
				$('#data_table tr.clear_tr').remove();
				$('#data_table tr[content="data_row"]').remove();
				for(var i = 0; i < resdata.length; i++) {
					lottery_num.push(resdata[i].opencode.split(','));
				}
				// 彩种为5
				if(code_id != 3) {
					var lty_num = { wan: [], qian: [], bai: [], shi: [], ge: [] };
					for(var i = 0; i < lottery_num.length; i++) {
						lty_num.wan.push(lottery_num[i][0]);
						lty_num.qian.push(lottery_num[i][1]);
						lty_num.bai.push(lottery_num[i][2]);
						lty_num.shi.push(lottery_num[i][3]);
						lty_num.ge.push(lottery_num[i][4]);
					}
					// 用于判断最大连出号
					/*		function consecutiveNumber(arr) {
								var obj = {}
								var preVal;
								for(var i = 0; i < arr.length; i++) {
									if(!obj[arr[i]]) {
										obj[arr[i]] = 1;
									}
									if(arr[i] == preVal) {
										obj[arr[i]]++;
									}
									preVal = arr[i];
								}
								return obj;
							}
					*/
					// 万位出现个数
					var wan = totalDegree(lty_num.wan, code_id);
					// 千位出现个数
					var qian = totalDegree(lty_num.qian, code_id);
					// 百位出现个数
					var bai = totalDegree(lty_num.bai, code_id);
					// 十位出现个数
					var shi = totalDegree(lty_num.shi, code_id);
					// 个位出现个数
					var ge = totalDegree(lty_num.ge, code_id);
					//	var a =consecutiveNumber(lty_num.wan);
					console.log(lottery_num)
					//	console.log(a)
					// 出现总次数
					innerHTML1 += '<tr class="clear_tr"><th>出现总次数</th><th class="border-right" colspan="5"></th>' + stringJoint(wan.total, code_id, 0) + stringJoint(qian.total, code_id, 1) + stringJoint(bai.total, code_id, 2) + stringJoint(shi.total, code_id, 3) + stringJoint(ge.total, code_id, 4) + '</tr>';
					// 最大遗漏值
					innerHTML1 += '<tr class="clear_tr"><th>最大遗漏值</th><th class="border-right" colspan="5"></th>' + stringJoint(wan.maxValue, code_id, 0) + stringJoint(qian.maxValue, code_id, 1) + stringJoint(bai.maxValue, code_id, 2) + stringJoint(shi.maxValue, code_id, 3) + stringJoint(ge.maxValue, code_id, 4) + '</tr>';
					// 最大连出值
					// ...
					// 平均遗漏值
					// ...	
					innerHTML += innerHTML1;
					$('#data_table tr').eq(1).after(innerHTML);
				} else {
					//..处理彩种为3的
					var lty_num = { frist: [], second: [], thirdly: [] }
					for(var i = 0; i < lottery_num.length; i++) {
						lty_num.frist.push(lottery_num[i][0]);
						lty_num.second.push(lottery_num[i][1]);
						lty_num.thirdly.push(lottery_num[i][2]);
					}

					// 第一位
					var first = totalDegree(lty_num.frist);
					// 第二位
					var second = totalDegree(lty_num.second);
					// 第三位
					var thirdly = totalDegree(lty_num.thirdly);
					innerHTML1 += '<tr class="clear_tr"><th>出现总次数</th><th class="border-right" colspan="6"></th>' + stringJoint(first.total, code_id) + stringJoint(second.total, code_id) + stringJoint(thirdly.total, code_id) + '</tr>';
					innerHTML1 += '<tr class="clear_tr"><th>最大遗漏值</th><th class="border-right" colspan="6"></th>' + stringJoint(first.maxValue, code_id) + stringJoint(second.maxValue, code_id) + stringJoint(thirdly.maxValue, code_id) + '</tr>';
					innerHTML_k3 += innerHTML1;
					$('#data_table tr').eq(1).after(innerHTML_k3);
				}

				$('.Loading').css('display', 'none');
				$('.issue').show();
				$('.explain').show();
				var index = $('#lottery_feature span a.on').attr('index');
				trendChart.call($('#lottery_feature span a.on'), Number(index));
				// 遗漏最大值
				function totalDegree(arr, code_id) {
					// 记录10个数字出现的次数					
					var total = code_id == 11 ? [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
					// 遗漏最大值
					var maxValue = code_id == 11 ? [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
					// 记录上一个出现重复号码的索引
					var count = code_id == 11 ? [-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1] : [-1, -1, -1, -1, -1, -1, -1, -1, -1, -1];
					var z = 0;
					for(var i = 0; i < arr.length; i++) {
						z = code_id == 11 && z > maxValue.length ? 0 : z;
						for(var j = 0; j < maxValue.length; j++) {
							z = code_id == 11 ? j + 1 : j
							if(Number(arr[i]) == z) {
								// 每查到一个重复数字 加1
								total[j] = total[j] + 1;
								// 判断第一个数字距离第二个重复号码的索引									 	
								if(Math.abs(i - count[j]) >= maxValue[j]) {
									maxValue[j] = Math.abs(i - count[j]) - 1;
								}
								count[j] = i;
							}
							console.log(z)
						}
					}
					for(var i = 0; i < count.length; i++) {
						if(arr.length - 1 - count[i] > maxValue[i]) {
							maxValue[i] = arr.length - 1 - count[i];
						}
					}
					console.log(total)
					var obj = {
						total,
						maxValue,
					}

					return obj;
				}
				//拼接大小 单双
				function sizeOddEven(lottery_num, code_id) {
					var length = code_id == 3 ? 7 : 10;
					var variable = code_id == 3 ? 3 : 4;
					var size, single_or_double;
					var innerHTML3 = '';
					var colspan = code_id == 3 ? 4 : 1;
					var count = 0;
					var median = code_id == 3 ? 4 : 5;
					for(var i = code_id == 3 ? 1 : 0; i < length; i++) {
						size = lottery_num[count] < median ? '小' : '大';
						single_or_double = Number(lottery_num[count]) % 2 == 0 ? '双' : '单';
						if(i < variable) {
							innerHTML3 += '<td colspan="' + colspan + '" group="fb" index="' + count + '"  class="' + assist_line + '"><span>' + size + '</span></td>';
						} else if(i == variable) {
							innerHTML3 += '<td colspan="' + colspan + '" group="fb" index="' + count + '"  class="border-right ' + assist_line + '"><span>' + size + '</span></td>';
						} else {
							innerHTML3 += '<td colspan="' + colspan + '" group="fb" index="' + count + '"  class="' + assist_line + '"><span>' + single_or_double + '</span></td>';
						}
						count = count >= variable ? 0 : count + 1;
					}
					return innerHTML3;

				}

				function stringJoint(arr, code_id, count) {
					var inner = "";
					var length = code_id == 3 ? 7 : 10;
					length = length == 10 && code_id == 11 ? 11 : length;
					var i = code_id == 3 ? 1 : 0;
					var colspan = code_id == 3 ? 2 : 1;
					for(i; i < length; i++) {
						if(i == length - 1) {
							inner += '<th class="border-right" colspan=' + colspan + ' index="' + count + '" >' + arr[i] + '</th>';
						} else {
							inner += '<th colspan=' + colspan + ' index="' + count + '">' + arr[i] + '</th>';
						}
					}
					return inner;
				}

			});

		}
	</script>

</html>