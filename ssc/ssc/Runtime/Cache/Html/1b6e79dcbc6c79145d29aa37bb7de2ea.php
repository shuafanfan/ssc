<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/Public/Html/css/default.css" />
		<link rel="stylesheet" href="/Public/Html/css/gycss.css" />
		<link rel="stylesheet" href="/Public/Html/layer/layer.css" />
		<link rel="stylesheet" href="/Public/Html/css/bet.css" />

	</head>

	<body>
		<form id="mainForm" name="mainForm" method="post" action="./default.html" enctype="application/x-www-form-urlencoded">
			<input type="hidden" name="mainForm" value="mainForm">
			<input type="hidden" name="lotteryid" id="lotteryid" value="40">
			<input type="hidden" name="flag" id="flag" value="save">
			<div class="lottery_wrap">
				<div class="lottery_top clearfix">
					<div class="gm_con">
						<div class="gm_logo txffc">
							<div class="wfqh">
								<a href="javascript:void(0);">官方玩法<i></i></a>
								<a href="javascript:void(0);" onClick="$('#ym-center').load('<?php echo U('Html/Category/txffcmj');?>');">民间玩法</a>
							</div>
						</div>
					</div>
					<div class="gct_l">
						<p>第<span id="current_issue"></span>期 投注截止时间</p>
						<div class="count-down" id="count_down"></div>
						<span id="current_endtime" style="display:none;"></span>
					</div>
					<div class="bet-kai">
						<p>第<span id="lt_gethistorycode"></span>期 开奖结果</p>
						<div class="bet-nums" id="showcodebox">
							<span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span>
						</div>
					</div>
				</div>

				<!-- 玩法标签开始-->
				<div class="bet-box">
					<div class="bet-content-tabs" id="tabbar-div-s2">
						<!-- 加载大类别 -->
					</div>
					<div class="bet-contents">
						<div class="con01">
							<div class="conbok">
								<div class="con02">
									<ul class="con-box-ul" id="tabbar-div-s3">
										<!-- 加载小类别 -->
									</ul>
								</div>
								<div class="con03">
									<ul class="con-box-num-ul" id="lt_selector">
										<!-- 加载玩法选择 -->
									</ul>
								</div>
							</div>
							<div class="con04">
								<div class="total-box">
									<div class="f-left account-num">已选 <span class="tips-font" id="lt_sel_nums">0</span> 注</div>
									<div class="f-left multiple">
										<div class="f-left"> <span class="f-left jian-btn" id="reducetime"></span>
											<input class="f-left multiple-input" id="lt_sel_times" type="text" value="99">
											<span class="f-left jia-btn" id="plustime"></span></div>
										<span class="f-left f16">倍</span> </div>
									<div class="f-left total-type">
										<div class="f-left" id="lt_sel_modes" value="1"><span class="f-left unit 1 on">元</span><span class="f-left unit 2">角</span><span class="f-left unit 3">分</span><span class="f-left unit 4">厘</span></div>
									</div>
									<div class="f-left account-num f16">投注金额 <span class="tips-font" id="lt_sel_money">0</span> 元</div>
									<div style="display: none;" class="f-left">&#36820;&#28857;:<span id="lt_sel_prize"></span></div>
									<ul class="operate">
										<li id="lt_sel_insert">添加</li>
										<li id="lt_sel_jiabei">加倍</li>
										<!--<li>机选</li>-->
									</ul>
									<i class="delete" id="i_li_delete"></i> </div>
							</div>
							<div class="con03">
								<div class="total-table">
									<div class="total-table-l">
										<ul class="total-table-l-ul total-table-l-ul02" id="lt_cf_content">
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="gm_con_r fr">
					<div class="dis_txt_high" style="cursor: pointer;">
						<a onclick="tzjl()" class="jiluxx tzjl on">投注记录</a>
						<a onclick="zhjl()" class="jiluxx zhjl">追号记录</a>
						<a onclick="kjjl()" class="jiluxx kjjl">开奖记录</a>
					</div>
					<div class="tb_list tb_list1 clearfix tzjilu" style="display: block;">
						<div class="tab_bet_record"> <span>彩种</span> <span>期号</span> <span>投注内容</span> <span>盈亏</span> </div>
						<ul>
							<?php if(is_array($betRecord)): $i = 0; $__LIST__ = $betRecord;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$betRecord): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($betRecord["id"]); ?>"> <span><?php echo ($betRecord["catename"]); ?></span><span><?php echo ($betRecord["issue"]); ?></span><span><?php echo ($betRecord["content"]); ?></span><span><?php echo ($betRecord["profitLoss"]); ?></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>

						<div class="more_r">
							<a href="javascript:void(0);">更多</a><i></i></div>
					</div>
					<div class="tb_list tb_list2 clearfix">
						<div class="tab_bet_record"> <span>彩种</span> <span>期号</span> <span>投注内容</span> <span>盈亏</span> </div>
						<ul>
							<?php if(is_array($chaseRecord)): $i = 0; $__LIST__ = $chaseRecord;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$betRecord): $mod = ($i % 2 );++$i;?><li> <span><?php echo ($betRecord["catename"]); ?></span><span><?php echo ($betRecord["issue"]); ?></span><span><?php echo ($betRecord["content"]); ?></span><span><?php echo ($betRecord["profitLoss"]); ?></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<div class="more_r">
							<a href="javascript:void(0);">更多</a><i></i></div>
					</div>
					<div class="tb_list tb_list3 clearfix">
						<div class="tab_bet_record tab_bet_record_2"> <span>期号</span> <span>开奖号码</span> </div>
						<ul>
						</ul>
						<div class="more_r">
							<a target="view_window" href="<?php echo U('Index/hmzst',array('id'=>40,code=>5));?>">更多</a><i></i></div>
					</div>
					<div class="bet_divbg">
						<div id="icon" class="icon">
							<div class="wheel">
								<div id="indicator" class="indicator"></div>
								<div class="shade_div">
									<div id="lt_fast_buy" class="rel now_bet_div"></div>
									<div id="lt_buy" class="rel confirm_bet_div"></div>
								</div>
								<div class="wheel_number" id="wheel_number">
									<div class="fl"><span class="wheel_span_bf">8.5</span>%</div>
									<div class="fr">
										<div id="wheel_number_jj">+<span class="wheel_span_jj">18</span></div>
										<div id="wheel_number_pl">×<span class="wheel_span_pl">9</span></div>
										<div class="wheel_number_h">
											<div><span>奖金=<span class="wheel_span_jj">18</span></span><span>赔率=<span class="wheel_span_pl">9</span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="bet_type_list">
						<span id="lt_issues" style="display: none;"></span>
						<input name="lt_trace_if" id="lt_trace_if" type="checkbox" value="yes" style="display:none;">
						<span class=""><a href="javascript:void(0);" id="lt_trace_if_btn">追号</a></span> 
						<span class=""><a href="javascript:void(0);" id="lt_chipped_if_btn">合买</a></span> </div>
				</div>
			</div>
			<!--alert-追号设置 start-->
			<div class="alert-box" id="lt_trace_box" style="display:none;">
				<div class="alert-big">
					<div class="alert-title2">追号
						<span class="close-btn" id="J-trace-cancle"></span>
					</div>
					<div class="alert-body">
						<div class="alert-body-tabs" id="lt_trace_label"><span class="tab-btn f-left cur">利润率追号</span><span class="tab-btn f-left">同倍追号</span><span class="tab-btn f-left">翻倍追号</span></div>
						<div class="alert-body-tabcon">
							<div class="tabcon01">
								<div class="tabcon01_sz">
									<p class="text-center">追号期数选择：
										<select class="tab-select" id="lt_trace_qissueno">
											<option>请选择</option>
											<option value="5">5期</option>
											<option value="10">10期</option>
											<option value="15">15期</option>
											<option value="20">20期</option>
											<option value="25">25期</option>
											<option value="all">全部</option>
										</select>总期数：<span class="tips-font" id="lt_trace_count">0</span>期， 总投注金额：<span class="tips-font" id="lt_trace_hmoney">&yen;20.00</span>元</p>
									<ul class="tabcon-title" id="lt_trace_labelhtml">
										<li class="li_but">
											<a class="button text-center" id="lt_trace_ok">生成追号</a>
										</li>
									</ul>
									<label class="alert-title-r" for="lt_trace_stop">
				  <input class="checkbox" type="checkbox" name="lt_trace_stop" id="lt_trace_stop" value="yes" />
				  中奖后停止追号</label>
								</div>
								<div class="tabcon-tables">
									<ul class="tabcon-table tabcon-table02 tabcon-table03" id="lt_trace_issues">
									</ul>
								</div>
							</div>
						</div>
						<div class="alert-body-control">
							<div class="total-bigbtns2"><span class="button" id="lt_buy_trace">投注</span></div>
						</div>
					</div>
				</div>
			</div>
			<!--alert-追号设置 end-->
			<input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="j_id5" autocomplete="off" />
		</form>

		<!--订单详情-->
		<div id="recharge2" class="clearfix">
			<div class="tctip .clearfix">
				<div class="tctitile2">
					<div>订单详情</div>
					<strong class="state_close"></strong> </div>
				<div class="jltable">
					<table class="state_tab clearfix">
						<thead>
							<tr>
								<th>订单号</th>
								<th>开奖号码</th>
								<th>投注金额</th>
								<th>中奖金额</th>
								<th>盈亏金额</th>
								<th>状态</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>cs4455132145</td>
								<td>7,5,6,3,2</td>
								<td>20.000</td>
								<td>0.000</td>
								<td>-19.960</td>
								<td>未中奖</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="jiluinfo">
					<ul>
						<li><span>彩票名称：</span><em>重庆时时彩</em></li>
						<li><span>玩法名称：</span><em>定位胆五星定位胆</em></li>
						<li><span>投注期号：</span><em>20161230024</em></li>
						<li><span>下单时间：</span><em>2016-12-30 09:34:25</em></li>
						<li><span>投注数量：</span><em>1</em></li>
						<li><span>返点金额：</span><em>0.000</em></li>
						<li><span>投注倍数：</span><em>32</em></li>
						<li><span>中奖注数：</span><em>0</em></li>
						<li><span>元角模式：</span><em>厘</em></li>
						<li><span>单注奖金：</span><em></em></li>
					</ul>
				</div>
				<div class="jiluhaoma">
					<dd>投注号码：</dd>
					<dt>,,3,,</dt>
				</div>
				<div class="btnbox btnbox2">
					<a href="javascript:void(0);" class="btn_qd">确定</a>
					<a href="javascript:void(0);" class="btn_qd">发布合买</a>
					<a href="javascript:void(0);" class="btn_qd">撤销订单</a>
				</div>
			</div>
		</div>
		<!--合买-->
		<div id="chipped_modal">
			<section class="chipped_mask"></section>
			<section class="chipped_pop">
				<div class="chipped_header">
					<h2>合买-发布跟单</h2>
					<div class="chipped_pop_cloes"></div>
				</div>
				<div class="chipped_body">
					<form id="chipped_form">
						<div class="control_group">
							<span>名称：</span><input type="text" name="name">
						</div>
						<div class="control_group select_group">
							<span>点数：</span>
							<div class="count">0‰</div>
							<style>

							</style>
							<div class="sel_opt">
								<div class="act">0‰</div>
								<div>1‰</div>
								<div>2‰</div>
								<div>3‰</div>
								<div>4‰</div>
								<div>5‰</div>
							</div>
						</div>
						<div class="control_group">
							<span>查看：</span><input type="radio" name="look" checked value="1"><span class="radio_mg">是</span><input type="radio" name="look" value="0"><span>否</span>
						</div>
						<div class="control_group">
							<span>说明：</span><input type="text" name="explain">
						</div>
						<div class="btn_sub">
							<button id="in_chipped" type="button">提交</button>
						</div>
					</form>
				</div>
				<div class="chipped_footer">
					<h3>注:</h3>
					<div>
						<p>跟单可以根据其他玩家发起的方案照单投注，但需要支付发起人一点佣金。</p>
						<p>跟单费用与奖金是独立计算的，跟单后可以撤单，但已支付的佣金不退还</p>
						<p>若发起人设置了隐藏投注内容，跟单的玩家在开奖之前都无权查阅投注内容。</p>
						<p>若发起人未设置隐藏投注内容，则跟单的玩家可立即查阅投注内容。</p>
					</div>
				</div>
			</section>
		</div>
		<!--合买跟单列表-->
		<div id="gendan">
			<section class="gendan_mask"></section>
			<section class="gendan_pop">
				<div class="gendan_header">
					<h2>合买-跟单列表</h2>
					<div class="gendan_pop_cloes"></div>
				</div>
				<div class="gendan_body">
					<div class="gendan_b_header">
						<div>
							<div class="gendan_cz"><span>彩种：</span><span class="gendan_cz_title gendan_cz_color">重庆时时彩</span></div>
							<div class="gendan_cz"><span>期号：</span><span class="gendan_issue_title gendan_cz_color">20170118003</span></div>
						</div>
						<div class="gandan_search" style="clear: both;">
							<input type="text" name="search" placeholder="请输入跟单ID" />
							<a id="gandan_btn">
								<i></i> 查询
							</a>
						</div>
					</div>
					<div class="gendan_list">
						<table>
							<thead >
								<tr>
									<th>跟单ID</th>
									<th>名称</th>
									<th>会员号</th>
									<th>手续费</th>
									<th>投注倍数</th>
									<th>投注数量</th>
									<th>元角模式</th>
									<th>投注金额</th>
									<th>投注详情</th>
									<th rowspan="4">玩法</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>123456</td>
									<td>发布时填写</td>
									<td>admin</td>
									<td>1‰</td>
									<td>16</td>
									<td>1</td>
									<td>元</td>
									<td>66.00</td>
									<td>
										<a href="javascript:;">查看</a>
									</td>
									<td>五星</td>
								</tr>
								<tr>
									<td>123456</td>
									<td>发布时填写</td>
									<td>admin</td>
									<td>1‰</td>
									<td>16</td>
									<td>1</td>
									<td>元</td>
									<td>66.00</td>
									<td>
										<a href="javascript:void(0);">查看</a>
									</td>
									<td>五星</td>
								</tr>
							</tbody>

						</table>
					</div>
					<div class="gendan_P">
						<div class="gendan_page_1">
							<span>第1页</span>,
							<span>共2页</span>,
							<span>共16条</span>,
							<span>每页10条</span>
						</div>
						<div class="gendan_page_2">
							<span class="gd_float pre_page">上一页</span>
							<ul class="gd_float">
								<li class="act">1</li>
								<li>2</li>
							</ul>
							<span class="gd_float next_page">下一页</span>
							<span class="gd_float gd_num_papge">
								<div class="gd_skip">
									<input type="number" name="page"/>
								</div>
								<span><a href="javascript:void(0);">跳转</a></span>
							</span>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div>
						<div class="gd_multiple noselect">
							<span>						
								<span class="gd_m_sub gd_m">-</span>
							<span class="gd_m_text"><input type="number" name="multiple" value="1"/></span>
							<span class="gd_m_sup gd_m">+</span>倍
							</span>
							<span class="gd_pattern">
								<span class="act">元</span>
								<span>角</span>
								<span>分</span>
								<span>厘</span>
							</span>
							<span class="gd_money">
								<span>投注金额：</span>
							<span>0</span>元
							</span>
							<span id="gd_btn">
								<a href="javascript:void(0);">跟单</a>
							</span>
						</div>
					</div>
				</div>

			</section>
		</div>
		<!--alert-common start-->
		<div class="alert-box" id="tk02" style="display: none;">
			<div class="alert">
				<div class="alert-title1">
					<div class="alert-logo"><i><img src="images/cqssc.png"></i></div>
					<div class="alert-txt"> <span>第<em>1615651621</em>期</span>
						<p>是否提交购物车中的方案？</p>
					</div>
					<span class="close-btn f-right reveal-modal-close"></span> </div>
				<div class="alert-body">
					<div class="alert-body-con">
						<ul id="tk02_content">
						</ul>
					</div>
					<div class="alert-tishi">
						<p>温馨提示:<em class="red">本平台每单最高奖金20万，单期最高奖金50万，请会员谨慎投注！</em></p>
						<p>特别提醒:<em class="red">本平台任何彩种单挑最高奖金2万</em></p>
					</div>
					<div class="alert-body-control">
						<span>总单数：<span class="tips-font" id="td02_size">1</span></span>&nbsp;&nbsp;<span>付款总金额：<span class="tips-font red" id="td02_money">2</span>元</span>
					</div>
					<div class="total-bigbtns1">
						<span class="button reveal-modal-submit">确定</span><span class="button reveal-modal-close">取消</span>
					</div>
				</div>
			</div>
		</div>
		<!--alert-common end-->
		<script src="/Public/Html/js/jquery.min.js"></script>
		<script src="/Public/Html/layer/layer.js"></script>
		<script src="/Public/Html/js/byte2hex.js" type="text/javascript"></script>
		<script src="/Public/Html/js/lzma.js" type="text/javascript"></script>
		<script src="/Public/Html/js/reveal.js"></script>
		<script src="/Public/Html/js/gamecommon.js"></script>
		<script src="/Public/Html/js/jquery.dialogUI.js"></script>
		<script src="/Public/Html/js/lang_zh.js"></script>
		<script src="/Public/Html/js/face/face.txffc.js"></script>
		<script src="/Public/Html/js/methods/methods.txffc.js"></script>
		<script src="/Public/Html/js/game/jquery.game.txffc.js"></script>
		<script>
			window.onload = function() {
				console.log("p592");
				Rotatebutton();
				console.log("p594");
			}
			var pri_user_data = [{ methodid: 654, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 865, prize: { 1: '180000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194000.00 }, { 'point': '0.07', 'prize': 180000.0 }] }] }, { methodid: 755, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 867, prize: { 1: '180000.0', 2: '18000.0', 3: '1800.0', 4: '180.0', 5: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194000.00 }, { 'point': '0.07', 'prize': 180000.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 18000.0 }, { 'point': 0, 'prize': 19400.00 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 1800.0 }, { 'point': 0, 'prize': 1940.00 }] }, { 'level': 4, 'prize': [{ 'point': '0.07', 'prize': 180.0 }, { 'point': 0, 'prize': 194.00 }] }, { 'level': 5, 'prize': [{ 'point': '0.07', 'prize': 18.0 }, { 'point': 0, 'prize': 19.40 }] }] }, { methodid: 664, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 869, prize: { 1: '1500.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1616.62 }, { 'point': '0.07', 'prize': 1500.0 }] }] }, { methodid: 765, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 870, prize: { 1: '3000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 3233.31 }, { 'point': '0.07', 'prize': 3000.0 }] }] }, { methodid: 676, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 871, prize: { 1: '6000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 6466.62 }, { 'point': '0.07', 'prize': 6000.0 }] }] }, { methodid: 708, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 872, prize: { 1: '9000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 9700.00 }, { 'point': '0.07', 'prize': 9000.0 }] }] }, { methodid: 686, prize: { 1: '600.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }] }, { methodid: 873, prize: { 1: '18000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19400.00 }, { 'point': '0.07', 'prize': 18000.0 }] }] }, { methodid: 696, prize: { 1: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 323.31 }, { 'point': '0.07', 'prize': 300.0 }] }] }, { methodid: 874, prize: { 1: '36000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 38800.00 }, { 'point': '0.07', 'prize': 36000.0 }] }] }, { methodid: 775, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 718, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 725, prize: { 1: '18000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19400.00 }, { 'point': '0.07', 'prize': 18000.0 }] }] }, { methodid: 730, prize: { 1: '750.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 808.31 }, { 'point': '0.07', 'prize': 750.0 }] }] }, { methodid: 735, prize: { 1: '1500.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1616.62 }, { 'point': '0.07', 'prize': 1500.0 }] }] }, { methodid: 740, prize: { 1: '3000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 3233.31 }, { 'point': '0.07', 'prize': 3000.0 }] }] }, { methodid: 745, prize: { 1: '4500.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 4850.00 }, { 'point': '0.07', 'prize': 4500.0 }] }] }, { methodid: 85, prize: { 1: '4.38' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 4.72 }, { 'point': '0.07', 'prize': 4.38 }] }] }, { methodid: 86, prize: { 1: '22.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 23.71 }, { 'point': '0.07', 'prize': 22.0 }] }] }, { methodid: 87, prize: { 1: '210.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 226.31 }, { 'point': '0.07', 'prize': 210.0 }] }] }, { methodid: 88, prize: { 1: '3900.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 4204.29 }, { 'point': '0.07', 'prize': 3900.0 }] }] }, { methodid: 2, prize: { 1: '18000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19400.00 }, { 'point': '0.07', 'prize': 18000.0 }] }] }, { methodid: 4, prize: { 1: '18000.0', 2: '1800.0', 3: '180.0', 4: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19400.00 }, { 'point': '0.07', 'prize': 18000.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 1800.0 }, { 'point': 0, 'prize': 1940.00 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 180.0 }, { 'point': 0, 'prize': 194.00 }] }, { 'level': 4, 'prize': [{ 'point': '0.07', 'prize': 18.0 }, { 'point': 0, 'prize': 19.40 }] }] }, { methodid: 6, prize: { 1: '750.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 808.31 }, { 'point': '0.07', 'prize': 750.0 }] }] }, { methodid: 7, prize: { 1: '1500.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1616.62 }, { 'point': '0.07', 'prize': 1500.0 }] }] }, { methodid: 8, prize: { 1: '3000.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 3233.31 }, { 'point': '0.07', 'prize': 3000.0 }] }] }, { methodid: 9, prize: { 1: '4500.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 4850.00 }, { 'point': '0.07', 'prize': 4500.0 }] }] }, { methodid: 11, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 12, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 13, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 15, prize: { 1: '1800.0', 2: '180.0', 3: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 180.0 }, { 'point': 0, 'prize': 194.00 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 18.0 }, { 'point': 0, 'prize': 19.40 }] }] }, { methodid: 17, prize: { 1: '600.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }] }, { methodid: 18, prize: { 1: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 323.31 }, { 'point': '0.07', 'prize': 300.0 }] }] }, { methodid: 19, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 20, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 21, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 23, prize: { 1: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19.40 }, { 'point': '0.07', 'prize': 18.0 }] }] }, { methodid: 25, prize: { 1: '180.0', 2: '30.0', 3: '6.6' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 30.0 }, { 'point': 0, 'prize': 32.32 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 6.6 }, { 'point': 0, 'prize': 7.10 }] }] }, { methodid: 27, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 360, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 28, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 361, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 29, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 362, prize: { 1: '1800.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }] }, { methodid: 31, prize: { 1: '1800.0', 2: '180.0', 3: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 180.0 }, { 'point': 0, 'prize': 194.00 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 18.0 }, { 'point': 0, 'prize': 19.40 }] }] }, { methodid: 363, prize: { 1: '1800.0', 2: '180.0', 3: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 1940.00 }, { 'point': '0.07', 'prize': 1800.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 180.0 }, { 'point': 0, 'prize': 194.00 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 18.0 }, { 'point': 0, 'prize': 19.40 }] }] }, { methodid: 33, prize: { 1: '600.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }] }, { methodid: 364, prize: { 1: '600.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }] }, { methodid: 34, prize: { 1: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 323.31 }, { 'point': '0.07', 'prize': 300.0 }] }] }, { methodid: 365, prize: { 1: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 323.31 }, { 'point': '0.07', 'prize': 300.0 }] }] }, { methodid: 35, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 366, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 36, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 367, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 37, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 368, prize: { 1: '600.0', 2: '300.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 646.62 }, { 'point': '0.07', 'prize': 600.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 300.0 }, { 'point': 0, 'prize': 323.31 }] }] }, { methodid: 39, prize: { 1: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19.40 }, { 'point': '0.07', 'prize': 18.0 }] }] }, { methodid: 369, prize: { 1: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19.40 }, { 'point': '0.07', 'prize': 18.0 }] }] }, { methodid: 41, prize: { 1: '180.0', 2: '30.0', 3: '6.6' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 30.0 }, { 'point': 0, 'prize': 32.31 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 6.6 }, { 'point': 0, 'prize': 7.09 }] }] }, { methodid: 340, prize: { 1: '180.0', 2: '30.0', 3: '6.6' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 30.0 }, { 'point': 0, 'prize': 32.31 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 6.6 }, { 'point': 0, 'prize': 7.09 }] }] }, { methodid: 43, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 44, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 45, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 47, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 48, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 49, prize: { 1: '180.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 194.00 }, { 'point': '0.07', 'prize': 180.0 }] }] }, { methodid: 51, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 52, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 53, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 55, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 56, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 57, prize: { 1: '90.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 97.00 }, { 'point': '0.07', 'prize': 90.0 }] }] }, { methodid: 59, prize: { 1: '18.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19.40 }, { 'point': '0.07', 'prize': 18.0 }] }] }, { methodid: 65, prize: { 1: '6.6' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 7.10 }, { 'point': '0.07', 'prize': 6.6 }] }] }, { methodid: 66, prize: { 1: '6.6' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 7.10 }, { 'point': '0.07', 'prize': 6.6 }] }] }, { methodid: 68, prize: { 1: '33.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 35.58 }, { 'point': '0.07', 'prize': 33.0 }] }] }, { methodid: 69, prize: { 1: '33.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 35.58 }, { 'point': '0.07', 'prize': 33.0 }] }] }, { methodid: 71, prize: { 1: '5.2' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 5.59 }, { 'point': '0.07', 'prize': 5.2 }] }] }, { methodid: 73, prize: { 1: '18.4' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 19.83 }, { 'point': '0.07', 'prize': 18.4 }] }] }, { methodid: 75, prize: { 1: '12.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 12.95 }, { 'point': '0.07', 'prize': 12.0 }] }] }, { methodid: 77, prize: { 1: '41.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 44.19 }, { 'point': '0.07', 'prize': 41.0 }] }] }, { methodid: 79, prize: { 1: '7.2' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 7.76 }, { 'point': '0.07', 'prize': 7.2 }] }] }, { methodid: 80, prize: { 1: '7.2' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 7.76 }, { 'point': '0.07', 'prize': 7.2 }] }] }, { methodid: 82, prize: { 1: '14.4' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 15.52 }, { 'point': '0.07', 'prize': 14.4 }] }] }, { methodid: 83, prize: { 1: '14.4' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 15.52 }, { 'point': '0.07', 'prize': 14.4 }] }] }, { methodid: 1211, prize: { 1: '391.3', 2: '197.8', 3: '13.0', 4: '21.02', 5: '5.96', 6: '2.57' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 421.73 }, { 'point': '0.07', 'prize': 391.3 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 197.8 }, { 'point': 0, 'prize': 213.18 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 13.0 }, { 'point': 0, 'prize': 14.12 }] }, { 'level': 4, 'prize': [{ 'point': '0.07', 'prize': 21.02 }, { 'point': 0, 'prize': 22.66 }] }, { 'level': 5, 'prize': [{ 'point': '0.07', 'prize': 5.96 }, { 'point': 0, 'prize': 6.42 }] }, { 'level': 6, 'prize': [{ 'point': '0.07', 'prize': 2.57 }, { 'point': 0, 'prize': 2.77 }] }] }, { methodid: 1212, prize: { 1: '250.0' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 269.44 }, { 'point': '0.07', 'prize': 250.0 }] }] }, { methodid: 1213, prize: { 1: '57.6', 2: '57.6', 3: '11.52', 4: '11.52', 5: '5.76', 6: '5.76' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 62.08 }, { 'point': '0.07', 'prize': 57.6 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 57.6 }, { 'point': 0, 'prize': 62.08 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 11.52 }, { 'point': 0, 'prize': 12.42 }] }, { 'level': 4, 'prize': [{ 'point': '0.07', 'prize': 11.52 }, { 'point': 0, 'prize': 12.42 }] }, { 'level': 5, 'prize': [{ 'point': '0.07', 'prize': 5.76 }, { 'point': 0, 'prize': 6.21 }] }, { 'level': 6, 'prize': [{ 'point': '0.07', 'prize': 5.76 }, { 'point': 0, 'prize': 6.21 }] }] }, { methodid: 1214, prize: { 1: '57.6', 2: '57.6', 3: '11.52', 4: '11.52', 5: '5.76', 6: '5.76' }, dyprize: [{ 'level': 1, 'prize': [{ 'point': 0, 'prize': 62.08 }, { 'point': '0.07', 'prize': 57.6 }] }, { 'level': 2, 'prize': [{ 'point': '0.07', 'prize': 57.6 }, { 'point': 0, 'prize': 62.08 }] }, { 'level': 3, 'prize': [{ 'point': '0.07', 'prize': 11.52 }, { 'point': 0, 'prize': 12.42 }] }, { 'level': 4, 'prize': [{ 'point': '0.07', 'prize': 11.52 }, { 'point': 0, 'prize': 12.42 }] }, { 'level': 5, 'prize': [{ 'point': '0.07', 'prize': 5.76 }, { 'point': 0, 'prize': 6.21 }] }, { 'level': 6, 'prize': [{ 'point': '0.07', 'prize': 5.76 }, { 'point': 0, 'prize': 6.21 }] }] }];
			var pri_issues = "";
			var pri_cur_issue = "";
			var pri_lastopen = "";
			var pri_lastopeninfo;
			var pri_issuecount = 120;
			var pri_servertime = "";
			var pri_lotteryid = parseInt(40, 10);
			var pri_isdynamic = 1;
			var pri_showhistoryrecord = 0;
			var pri_ajaxurl = "<?php echo U('Html/Category/qqffc_return');?>";
			var pri_ajaxurl1 = "<?php echo U('Html/User/user_bet_refreshMoney');?>";

			function showNewWin(title, w, h, url) {
				//iframe层
				layer.open({
					type: 2,
					title: title,
					shadeClose: true,
					shade: 0.4,
					area: [w + 'px', h + 70 + 'px'],
					content: url //iframe的url
				});
			}

			$.ajax({
				cache: true,
				type: "POST",
				url: '<?php echo U("Html/Category/qqffc_openData");?>',
				data: { 'money': 1 },
				async: false,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					pri_issues = eval("(" + data.pri_issues + ")");
					pri_cur_issue = eval("(" + data.pri_cur_issue + ")");
					pri_lastopen = eval("(" + data.pri_lastopen + ")");
					pri_servertime = eval("(" + data.pri_servertime + ")");
					$('#current_issue').html(pri_cur_issue.issue);
					$('#lt_gethistorycode').html(pri_lastopen.issue);
					$('#current_endtime').html(pri_cur_issue.endtime);

					if(data.pri_lastopeninfo) {
						pri_lastopeninfo = eval("(" + data.pri_lastopeninfo + ")");
						var showcodebox = "";
						for(var i = 0; i < pri_lastopeninfo.code.length; i++) {
							showcodebox += '<span class="gr_s gr_sx" flag="move">' + pri_lastopeninfo.code[i] + '</span>';
						}
						$('#showcodebox').html(showcodebox);
					} else {
						console.log("没有开奖结果");
					}
				},
				error: function() {
					console.log("没有结果");
				}
			});
			$.ajax({
				type: "POST",
				url: "<?php echo U('Html/Moneytype/yuan_jiao_fen_li');?>",
				data: "",
				async: true,
				timeout: 10000,
				success: function(data) {
					console.log(data.length);
					var yjfl = "";
					for(var i = 0; i < data.length; i++) {
						yjfl += '<span class="f-left unit ' + data[i].value + (i == 0 ? "on" : "") + '">' + data[i].name + '</span>';
					}
					$("#lt_sel_modes").html(yjfl);
				}
			});

			var list3Data = function() {
				$.ajax({
					type: "POST",
					url: "<?php echo U('Html/Category/qqffc_open_code');?>",
					data: "tb_list3",
					timeout: 9000,
					dataType: 'json',
					success: function(data) {
						var list3 = "";
						for(var i = 0; i < data.qqffc_open_code.length; i++) {
							list3 += '<li><span style="width:50%;">' + data.qqffc_open_code[i].expect + '</span><span style="width:50%;">' + data.qqffc_open_code[i].opencode + '</span></li>';
						}
						$('.tb_list3 ul').html(list3);
					}
				})
			};
			list3Data();
			var list1Data = function() {
				$.ajax({
					type: "POST",
					url: $.lt_ajaxurl,
					data: "tb_list1",
					timeout: 9000,
					dataType: 'json',
					success: function(data) {
						var list1 = "";
						var list2 = "";
						for(var i = 0; i < data.betRecord.length; i++) {
							list1 += '<li data-id="' + data.betRecord[i].id + '" ><span>' + data.betRecord[i].catename + '</span><span>' + data.betRecord[i].issue + '</span><span>' + data.betRecord[i].content + '</span><span>' + data.betRecord[i].profitLoss + '</span></li>';
						}
						$('.tb_list1 ul').html(list1);
						for(var i = 0; i < data.chaseRecord.length; i++) {
							list2 += '<li><span>' + data.chaseRecord[i].catename + '</span><span>' + data.chaseRecord[i].issue + '</span><span>' + data.chaseRecord[i].content + '</span><span>' + data.chaseRecord[i].profitLoss + '</span></li>';
						}
						$('.tb_list2 ul').html(list2);
					}
				})
			};
		</script>

		<script src="/Public/Html/lib/jquery.rotate.min.js"></script>
		<script src="/Public/Html/lib/countdown.min.js"></script>
		<script src="/Public/Html/lib/jquery.knob.min.js"></script>
		<script src="/Public/Html/lib/tweenlite.min.js"></script>
		<script src="/Public/Html/lib/draggable.min.js"></script>
		<script src="/Public/Html/lib/cssplugin.min.js"></script>
		<script src="/Public/Html/lib/choos.js"></script>

	</body>

</html>