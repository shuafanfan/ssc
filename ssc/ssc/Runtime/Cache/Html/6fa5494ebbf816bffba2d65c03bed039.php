<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/Public/Html/css/index.css" />
		<link rel="stylesheet" href="/Public/Html/css/gycss.css" />
		<link rel="stylesheet" href="/Public/Html/laydate/need/laydate.css" />
		<link rel="stylesheet" href="/Public/Html/laydate/skins/default/laydate.css" />
		<link rel="stylesheet" href="/Public/Html/laydate/skins/danlan/laydate.css" />
		<script src="/Public/js/jquery.min.js"></script>

		<script src="/Public/js/echarts.min.js"></script>

		<style>
			.btn_searchclick {
				cursor: wait !important;
			}
		</style>
	<script type="text/javascript">
	
		var money =$('#money span').text();
		money = money.substring(0,money.indexOf('.')+"<?php $res=M("setting")->where("id=5")->find(); if(5==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?> ");
		$('#money span').text(money);
			
	</script>	
	</head>

	<body>
		<div id="header" class="clearfix">
			<div class="header_top clearfix">
				<ui class="header_top_lf">
					<li>
						<a href="index.html"><i class="icon_home"></i><span>返回首页</span></a>
					</li>
					<li class="grxxhover"><i class="portrait"></i><span><?php echo ($userInfo["nickname"]); ?></span>
						<div class="top_tip top_tip5">
							<div class="toumingchufa"></div>
							<dl>
								<dd>
									<a data-id="a_wdxx" href="javascript:void(0);">我的信息</a>
								</dd>
								<dd>
									<a data-id="a_aqzx" href="javascript:void(0);">安全中心</a>
								</dd>
								<dd>
									<a data-id="a_xgmm" href="javascript:void(0);">修改密码</a>
								</dd>
								<dd>
									<a data-id="a_yhzl" href="javascript:void(0);">银行资料</a>
								</dd>
								<dd>
									<a data-id="a_wdxxi" href="javascript:void(0);">我的消息</a>
								</dd>
								<dd>
									<a data-id="a_jjxq" href="javascript:void(0);">奖金详情</a>
								</dd>
								<dd>
									<a data-id="a_dljr" href="javascript:void(0);">登录记录</a>
								</dd>
							</dl>
							<span class="just-bottom"></span> </div>
					</li>
					<li id="money">￥<span><?php echo ($userInfo["money"]); ?></span></li>
				</ui>
				<ul class="header_top_rt">
					<li class="payhover"><i class="pay_icon"></i><span>充值</span>
						<div class="top_tip top_tip2">
							<div class="toumingchufa"></div>
							<dl>
								<dd>
									<a data-id="b_gscz" href="javascript:void(0);">光速充值</a>
								</dd>
								<dd>
									<a data-id="b_wxcz" href="javascript:void(0);">微信充值</a>
								</dd>
								<dd>
									<a data-id="b_yhk" href="javascript:void(0);">银行卡</a>
								</dd>
								<dd>
									<a data-id="b_yhtk" href="javascript:void(0);">账户提款</a>
								</dd>
								<dd>
									<a data-id="b_yhzz" href="javascript:void(0);">用户转账</a>
								</dd>
								<dd>
									<a data-id="b_czqjl" href="javascript:void(0);">充转取记录</a>
								</dd>
							</dl>
							<span class="just-bottom"></span> </div>
					</li>
					<li class="payhover1"><i class="draw_icon"></i><span>提现</span></li>
					<li class="state_search"><i class="report_icon"></i><span>报表查询</span>
						<div class="top_tip top_tip1">
							<div class="toumingchufa"></div>
							<dl>
								<dd>
									<a data-id="c_cpbb" href="javascript:void(0);">彩票报表</a>
								</dd>
								<dd>
									<a data-id="c_grbb" href="javascript:void(0);">个人报表</a>
								</dd>
								<dd>
									<a data-id="c_ykbb" href="javascript:void(0);">盈亏报表</a>
								</dd>
								<dd>
									<a data-id="c_ptbb" href="javascript:void(0);">平台报表</a>
								</dd>
								<dd>
									<a data-id="c_qtbb" href="javascript:void(0);">其他报表</a>
								</dd>
							</dl>
							<span class="just-bottom"></span> </div>
					</li>
					<?php if(($userInfo["type"] == 1)): ?><li class="grouphover"><i class="group_icon"></i><span>团队管理</span>
							<div class="top_tip top_tip3">
								<div class="toumingchufa"></div>
								<dl>
									<dd>
										<a data-id="d_tdtj" href="javascript:void(0);">团队统计</a>
									</dd>
									<dd>
										<a data-id="d_khzx" href="javascript:void(0);">开户中心</a>
									</dd>
									<dd>
										<a data-id="d_pegl" href="javascript:void(0);">配额管理</a>
									</dd>
									<dd>
										<a data-id="d_xjgl" href="javascript:void(0);">下级管理</a>
									</dd>
									<dd>
										<a data-id="d_xjcz" href="javascript:void(0);">下级充值</a>
									</dd>
									<dd>
										<a data-id="d_xjqk" href="javascript:void(0);">下级取款</a>
									</dd>
								</dl>
								<span class="just-bottom"></span> </div>
						</li><?php endif; ?>
					<?php if(($userInfo["type"] != 1)): endif; ?>
					<li class="accounthover"><i class="account_icon"></i><span>帐变记录</span>
						<div class="top_tip top_tip4">
							<div class="toumingchufa"></div>
							<dl>
								<dd>
									<a data-id="e_gqjl" href="javascript:void(0);">购彩记录</a>
								</dd>
								<dd>
									<a data-id="e_zhjl" href="javascript:void(0);">追号记录</a>
								</dd>
								<dd>
									<a data-id="e_zbjl" href="javascript:void(0);">账变记录</a>
								</dd>
								<dd>
									<a data-id="e_dljl" href="javascript:void(0);">代理记录</a>
								</dd>
								<dd>
									<a data-id="e_ctzjl" href="javascript:void(0);">充提转记录</a>
								</dd>
							</dl>
							<span class="just-bottom"></span> </div>
					</li>
					<li class="tchover"><i class="logout_icon"></i><span>安全退出</span>
						<div class="top_tip top_tip6">
							<div class="toumingchufa"></div>
							<dl>
								<dt>确定退出当前账号吗？</dt>
								<dt><a id="sign_out" class="btn_qd">确定</a><a id="sign_out_qx" class="btn_qx">取消</a></dt>
							</dl>
							<span class="just-bottom"></span>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--报表查询-->
		<!--dfdfeew-->
		<div id="statement" class="clearfix">
			<div class="statement_tab clearfix">
				<div class="tab_list">
					<i></i>
					<ul>
						<li class="lottery"><span>彩票报表</span></li>
						<li class="personal active"><span>个人报表</span></li>
						<li class="profitLoss"><span>盈亏报表</span></li>
						<li class="platform"><span>平台报表</span></li>
						<li class="other"><span>其他报表</span></li>
					</ul>
					<strong class="state_close"></strong>
				</div>
				<div class="tab_content">
					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time lottery">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<ul class="shortcut_btn">
									<li class="on" content="1">个人</li>
									<li content="2">团队</li>
								</ul>
								<a href="#" class="lottery btn_search page_submit ">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>日期</th>
									<th>总下注/笔数</th>
									<th>流水</th>
									<th>返水</th>
									<th>团队赚水</th>
									<th>返彩</th>
									<th>活动</th>
									<th>实际盈亏</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2016-11-20</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>2016-11-20</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>小计</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content per_account active">
						<form class="account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<a href="#" class="personal btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>日期</th>
									<th>充值金额</th>
									<th>取款金额</th>
									<th>总下注/笔数</th>
									<th>返水</th>
									<th>团队赚水</th>
									<th>返彩</th>
									<th>活动</th>
									<th>实际盈亏</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2016-11-20</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>2016-11-20</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>小计</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label> 用户名: <input type="text" class="userName"> 排序:
								<select class="sort">
									<option value="winReverse">盈亏倒序</option>
									<option value="winOrder">盈亏升序</option>
									<option value="backReverse">反彩倒序</option>
									<option value="backOrder">反彩升序</option>
								</select>

								<a href="#" class="profitLoss btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>用户账号</th>
									<th>有效投注</th>
									<th>返点</th>
									<th>团队赚水</th>
									<th>反彩</th>
									<th>活动</th>
									<th>实际盈亏</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>-</td>
									<td>lv57162370</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>
										<a>转账</a>
									</td>
								</tr>
								<tr>
									<td>-</td>
									<td>lv57162370</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>
										<a>转账</a>
									</td>
								</tr>
								<tr>
									<td colspan="2">小计</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max">
                    </label>
								<a href="#" class="platform btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>用户账号</th>
									<th>入款金额</th>
									<th>入款笔数</th>
									<th>出款金额</th>
									<th>出款笔数</th>
									<th>活动金额</th>
									<th>活动次数</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>lv57162370</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>lv57162370</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>小计</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<ul class="shortcut_btn">
									<li class="on" content="1">个人</li>
									<li content="2">团队</li>
								</ul>
								<a class="other btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>日期</th>
									<th>总下注/笔数</th>
									<th>返水</th>
									<th>团队赚水</th>
									<th>返彩</th>
									<th>活动</th>
									<th>实际盈亏</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2016-11-20</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>2016-11-20</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
								<tr>
									<td>小计</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000</td>
									<td>0.000/0</td>
									<td>0.000</td>
									<td>0.000</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--报表查询结束-->
		<!--充值提现-->
		<div id="recharge" class="clearfix">
			<div class="statement_tab clearfix">
				<div class="tab_list">
					<i class="chongzhi"></i>
					<ul>
						<li><span>光速充值</span></li>
						<li class="active"><span>微信充值</span></li>
						<li><span>银行卡</span></li>
						<li class="zhtk"><span>账户提款</span></li>
						<li><span>用户转账</span></li>
						<li><span>充取转记录</span></li>
					</ul>
					<strong class="state_close"></strong>
				</div>
				<div class="tab_content">
					<div class="account_content">
						<form class="recharge_form">
							<div class="velocity">
								<div class="sel_bank">
									选择银行：<label><input type="radio" name="account_id" checked="checked" value="5"><img src="/Public/Html/images/zhaoshang.png" alt="银行"></label>
									<label><input type="radio" name="account_id" value="6"><img src="/Public/Html/images/zhaoshang.png" alt="银行"></label>
									<label><input type="radio" name="account_id" value="7"><img src="/Public/Html/images/ccb.png" alt="银行"></label>
								</div>
								充值金额：<input type="text" id="credit" name="money"><i class="zhuyi"></i><span class=vel_money>请输入充值金额</span>
								<p class="quota">单笔充值限额 ：最低 <strong><?php $res=M("setting")->where("id=8")->find(); if(8==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?> </strong> ,最高 <strong>无限制</strong></p>
								<a class="submit_deposit">立即充值</a>
							</div>
						</form>
					</div>
					<div class="account_content active">
						<form class="wechar_form">
							<div class="deposit_wrap">
								<img src="/Public/Html/images/wechat.png" alt="微信充值"> 充值金额：
								<input type="text" id="weichar_cre" name="money"><i class="zhuyi"></i><span class=vel_money>请输入充值金额</span>
								<p class="quota">单笔充值限额 ：最低 <strong><?php $res=M("setting")->where("id=8")->find(); if(8==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?></strong> ,最高 <strong>无限制</strong></p>
								<a class="submit_deposit">立即充值</a>
								<div class="attention_list">
									<strong>注意事项</strong>
									<p>1.使用微信扫一扫功能,即可直接充值;</p>
									<p>2.本页中的二维码一次有效,切勿保存;</p>
									<p>3.通常您的到账时间为1秒至30秒,若出现超过5分钟未到账的情况,请联系我们24小时在线客服。</p>
								</div>
							</div>
						</form>
					</div>
					<div class="account_content">
						<form class="bank_form">
							<div class="bank_card">
								<div class="sel_bank">
									选择银行：<label><input type="radio" name="account_id" checked="checked" value="1"><img src="" alt="银行"></label>
									<label><input type="radio" name="account_id" value="2"><img src="" alt="银行"></label>
									<label><input type="radio" name="account_id" value="3"><img src="" alt="银行"></label>
								</div>
								<div class="bank_dep">
									存款人姓名：<input type="text" class="pay_account_user"><i class="zhuyi"></i><span>填写后可提高入款速度(可选项)</span><br>
									<div>
										充值金额：<input type="text" class="money"><i class="zhuyi"></i><span>请输入取款金额</span>
										<p class="quota">单笔充值限额 ：最低 <strong><?php $res=M("setting")->where("id=8")->find(); if(8==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?></strong> ,最高 <strong>无限制</strong></p>
										<a class="submit_deposit">立即充值</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="account_content" id="zhtk_content">
						<div class="withdraw_wrap">
							<div class="withdraw">
								<form class="drawings_form">
									<p>通常您的提款申请只需3-10分钟即可到账,高峰期可能需要15分钟左右。若超过30分未到账,请及时联系在线客服。</p>
									<table>
										<thead>
											<tr>
												<th>账户总额</th>
												<th>今日可提现次数</th>
												<th>提现次数周期</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><span></span></td>
												<td><span></span></td>
												<td>03:00 - 次日02:59</td>
											</tr>
										</tbody>
									</table>
									<div class="row">
										<div class="th">取款金额:</div>
										<lable class="td"><input type="text" name="withdrawing" id="withdrawing" onkeyup="this.value=this.value.replace(/[^\d]/g,'') " autocomplete="off"></lable>
										<div class="tip"><i class="zhuyi"></i><span class="vel_money">请输入取款金额</span></div>
									</div>
									<div class="row row20">
										<div class="th"></div>
										<div class="td ">单笔取款限额 ：最低<span><?php $res=M("setting")->where("id=7")->find(); if(7==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?></span>,最高<span>无限制</span></div>
									</div>
									<div class="row auto claearfix">
										<div class="th">收款银行卡:</div>
										<div id="withdraw_bank_list">
											<!--<div class="item">
												<i></i><span></span><span></span>
											</div>-->
											<!--<div class="item">
												<i></i><span></span><span></span>
											</div>-->
											<!--<div id="btn_bank_card">
												<i></i>
											</div>-->
										</div>
									</div>
									<div class="row clearfix">
										<div class="th">资金密码:</div>
										<lable class="td"><input type="password" name="password" id="capital_pwd" autocomplete="on"></lable>
										<div class="tip"><i class="zhuyi"></i><span>请输入资金密码(该密码为平台资金密码)</span></div>
									</div>
									<div class="row fl">
										<div class="th"></div>
										<label class="td"><a class="submit_deposit">立即提现</a></label>
									</div>
								</form>
							</div>
							<div class="withdraw_bank">
								<form class="bank_drawings_form">
									<div class="row">
										<div class="th">开户银行:</div>
										<div class="td">
											<select class="bank_list" name="bank">
												<option value="工商银行">工商银行</option>
												<option value="农业银行">农业银行</option>
												<option value="建设银行">建设银行</option>
												<option value="中国银行">中国银行</option>
												<option value="招商银行">招商银行</option>
												<option value="交通银行">交通银行</option>
												<option value="民生银行">民生银行</option>
												<option value="光大银行">光大银行</option>
												<option value="浦发银行">浦发银行</option>
												<option value="兴业银行">兴业银行</option>
												<option value="中信银行">中信银行</option>
												<option value="邮政储蓄">邮政储蓄</option>
												<option value="平安银行">平安银行</option>
												<option value="广发银行">广发银行</option>
												<option value="上海银行">上海银行</option>
												<option value="北京银行">北京银行</option>
												<option value="华夏银行">华夏银行</option>
												<option value="上海农行">上海农行</option>
												<option value="北京农商">北京农商</option>
												<option value="渤海银行">渤海银行</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="th">开户银行地址:</div>
										<lable class="td"><input type="text" name="address"></lable>
										<div class="tip address_tip"><i class="zhuyi"></i>请输入开户银行地址</div>
									</div>
									<div class="row">
										<div class="th">开户名:</div>
										<lable class="td"><input type="text" name="account_user"></lable>
										<div class="tip account_tip"><i class="zhuyi"></i>请输入开户名</div>
									</div>
									<div class="row">
										<div class="th">银行卡号:</div>
										<lable class="td"><input type="text" name="bank_key"></lable>
										<div class="tip bank_tip"><i class="zhuyi"></i>请输入银行卡号</div>
									</div>
									<div class="row">
										<div class="th">是否锁定:</div>
										<lable class="td">
											<lable><input type="radio" checked="checked" name="lock" value="1">锁定</lable>
											<lable><input type="radio" name="lock" value="0">不锁定</lable>
										</lable>
									</div>
									<div class="row">
										<div class="th">资金密码:</div>
										<lable class="td"><input type="password" name="fund_pwd"></lable>
										<div class="tip psw_tip"><i class="zhuyi"></i>请输入资金密码(该密码为平台资金密码)</div>
									</div>
									<div class="row">
										<div class="th"></div>
										<div class="hand">
											<a class="submit_deposit">提交</a>
											<a class="go_back">返回上一页</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="account_content">
						<div class="user_transfer">
							<div class="transfer_lf fl">
								<form class="user_transfer_form"></form>
								<div class="row">
									<div class="th">转点类型:</div>
									<div class="td my_radio">
										<input type="radio" name="transfer_type" id="transfer_type_replace" value="1" checked="checked">
										<label for="transfer_type_replace" class="transfer on">代充</label>
										<input type="radio" name="transfer_type" id="transfer_type_activity" value="2">
										<label for="transfer_type_activity" class="transfer">活动</label>
										<input type="radio" name="transfer_type" id="transfer_type_dividend" value="3">
										<label for="transfer_type_dividend" class="transfer">红利</label>
									</div>
								</div>
								<div class="row">
									<div class="th">转入账号:</div>
									<label class="td"><input type="text" name="shift_account"></label>
								</div>
								<div class="row">
									<div class="th"></div>
									<label class="td">
                                <div class="user_search page_submit"><i></i>查询</div>
                            </label>
								</div>
								<div class="row">
									<div class="th">转入账号平台余额:</div>
									<label class="td"><input type="text" name="terrace_balance"></label>
								</div>
								<div class="row">
									<div class="th">我的余额</div>
									<label class="td"><input type="text" name="my_balance"></label>
								</div>
								<div class="row">
									<div class="th">转账金额:</div>
									<label class="td"><input type="text" name="transfer_balance"></label>
								</div>
								<div class="row">
									<div class="th">资金密码:</div>
									<label class="td"><input type="password" name="fund_password"></label>
								</div>
								<div class="row">
									<div class="th"></div>
									<label class="td">
                                <div class="quick_recharge"><i></i>立即充值</div>
                            </label>
								</div>
								</form>
							</div>
							<div class="transfer_lr fl">
								<ul>
									<li>
										<span class="my_list_icon">1</span>
										<span class="font">上级对下级拨款以后,下级在接下来的8小时内不能发起提现操作。</span>
									</li>
									<li>
										<span class="my_list_icon">2</span>
										<span class="font">任何代理当他自己处于不能发起提现操作的状态的时候,他也不能往自己下级拨款。</span>
									</li>
									<li>
										<span class="my_list_icon">3</span>
										<span class="font">代理可以在帐变记录中查看自己的历史转账记录</span>
									</li>
									<li>
										<span class="my_list_icon">4</span>
										<span class="font">如果代理因失误拨款给错误对象,请立即联系平台客服尽最大可能挽回损失。</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form class="account_edit_form recharge_dr_form">
							<ul class="pay_record">
								<li class="on">充值记录</li>
								<li>取款记录</li>
								<li>转账记录</li>
							</ul>
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<a href="#" class="btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>申请日期</th>
									<th>付款方式</th>
									<th>付款人</th>
									<th>入款银行</th>
									<th>入款金额</th>
									<th>入款后余额</th>
									<th>审核时间</th>
									<th>状态</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2016-11-20</td>
									<td></td>
									<td></td>
									<td>建设银行</td>
									<td>1000.000</td>
									<td>1000.000</td>
									<td>2016-12-18</td>
									<td>审核通过</td>
								</tr>
								<tr>
									<td>2016-11-20</td>
									<td></td>
									<td></td>
									<td>建设银行</td>
									<td>1000.000</td>
									<td>1000.000</td>
									<td>2016-12-18</td>
									<td>不通过</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--充值提现结束-->
		<!--帐变记录开始-->
		<div id="acc_record" class="clearfix">
			<div class="statement_tab clearfix">
				<div class="tab_list">
					<i class="zhangbian"></i>
					<ul>
						<li class="gcjl"><span>购彩记录</span></li>
						<li class="zhzl active"><span>追号记录</span></li>
						<li class="zbzl"><span>帐变记录</span></li>
						<li class="dljl"><span>代理记录</span></li>
						<li class="czzjl"><span>充提转记录</span></li>
					</ul>
					<strong class="state_close"></strong>
				</div>
				<div class="tab_content">
					<div class="account_content">
						<form class="buy_record account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time lottery">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<!--<label>
                        用户账号：<input type="text" class="user_bank userName" name="user_name">
                    </label>-->
								<div class="lottery_va clearfix">
									<em class="lot_font">彩种:</em>
									<select class="lotter_list">
										<option value="重庆时时彩">重庆时时彩</option>
										<option value="北京PK拾">北京PK拾</option>
										<option value="江西11选5">江西11选5</option>
										<option value="韩国1.5分彩">韩国1.5分彩</option>
										<option value="江苏快3">江苏快3</option>
										<option value="新加坡2分彩">新加坡2分彩</option>
										<option value="东京1.5分彩">东京1.5分彩</option>
										<option value="官方五分彩">官方五分彩</option>
										<option value="福彩3D">福彩3D</option>
										<option value="排列三">排列三</option>
										<option value="香港六合彩">香港六合彩</option>
										<option value="北京5分彩">北京5分彩</option>
										<option value="加拿大3.5分彩">加拿大3.5分彩</option>
										<option value="台湾5分彩">台湾5分彩</option>
										<option value="天津时时彩">天津时时彩</option>
										<option value="新疆时时彩">新疆时时彩</option>
										<option value="安徽快3">安徽快3</option>
										<option value="吉林快3">吉林快3</option>
										<option value="北京快3">北京快3</option>
										<option value="广西快3">广西快3</option>
										<option value="天津快乐十分">天津快乐十分</option>
										<option value="广东快乐十分">广东快乐十分</option>
										<option value="重庆快乐十分">重庆快乐十分</option>
										<option value="广东11选5">广东11选5</option>
										<option value="山东11选5">山东11选5</option>
										<option value="安徽11选5">安徽11选5</option>
										<option value="上海11选5">上海11选5</option>
										<option value="排列五">排列五</option>
										<option value="上海时时乐">上海时时乐</option>
										<option value="分分3D">分分3D</option>
										<option value="分分11选5">分分11选5</option>
										<option value="北京28">北京28</option>
										<option value="韩国28">韩国28</option>
										<option value="加拿大28">加拿大28</option>
										<option value="台湾28">台湾28</option>
									</select>
									<em>玩法:</em>
									<select class="palying_meth">
										<option value="猜数字">猜数字</option>
										<option value="大小单双">大小单双</option>
										<option value="波色">波色</option>
										<option value="特码包三">特码包三</option>
										<option value="特殊组合">特殊组合</option>
										<option value="大小单双">大小单双</option>
										<option value="极大极小">极大极小</option>
									</select>
									<ul class="lot_all">
										<li class="on" content="1">个人</li>
										<li content="2">直属</li>
										<li content="3">全部</li>
									</ul>
									<a class="gcjl btn_search page_submit">
										<i></i> 查询
									</a>
								</div>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>用户名</th>
									<th>投注时间</th>
									<th>彩种</th>
									<th>期号</th>
									<th>玩法</th>
									<th>投注内容</th>
									<th>投注金额</th>
									<th>状态</th>
									<th>盈亏</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Zz123</td>
									<td>2016-12-27 15:34:18</td>
									<td>重庆时时彩</td>
									<td>20161230024</td>
									<td>直选复式</td>
									<td>7,5,6,3,2</td>
									<td>20.000</td>
									<td>未中奖</td>
									<td>-19.960</td>
								</tr>
								<tr>
									<td>Zz123</td>
									<td>2016-12-27 15:34:18</td>
									<td>重庆时时彩</td>
									<td>20161230024</td>
									<td>直选复式</td>
									<td>7,5,6,3,2</td>
									<td>20.000</td>
									<td>未中奖</td>
									<td>-19.960</td>
								</tr>
								<tr>
									<td>Zz123</td>
									<td>2016-12-27 15:34:18</td>
									<td>重庆时时彩</td>
									<td>20161230024</td>
									<td>直选复式</td>
									<td>7,5,6,3,2</td>
									<td>20.000</td>
									<td>未中奖</td>
									<td>-19.960</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content per_account active">
						<form class="chase_record account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time lottery">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<!--<label>
                        用户账号：<input type="text" class="user_bank userName" name="user_name">
                    </label>-->
								<div class="lottery_va clearfix">
									<em class="lot_font">彩种:</em>
									<select class="lotter_list">
										<option value="重庆时时彩">重庆时时彩</option>
										<option value="北京PK拾">北京PK拾</option>
										<option value="江西11选5">江西11选5</option>
										<option value="韩国1.5分彩">韩国1.5分彩</option>
										<option value="江苏快3">江苏快3</option>
										<option value="新加坡2分彩">新加坡2分彩</option>
										<option value="东京1.5分彩">东京1.5分彩</option>
										<option value="官方五分彩">官方五分彩</option>
										<option value="福彩3D">福彩3D</option>
										<option value="排列三">排列三</option>
										<option value="香港六合彩">香港六合彩</option>
										<option value="北京5分彩">北京5分彩</option>
										<option value="加拿大3.5分彩">加拿大3.5分彩</option>
										<option value="台湾5分彩">台湾5分彩</option>
										<option value="天津时时彩">天津时时彩</option>
										<option value="新疆时时彩">新疆时时彩</option>
										<option value="安徽快3">安徽快3</option>
										<option value="吉林快3">吉林快3</option>
										<option value="北京快3">北京快3</option>
										<option value="广西快3">广西快3</option>
										<option value="天津快乐十分">天津快乐十分</option>
										<option value="广东快乐十分">广东快乐十分</option>
										<option value="重庆快乐十分">重庆快乐十分</option>
										<option value="广东11选5">广东11选5</option>
										<option value="山东11选5">山东11选5</option>
										<option value="安徽11选5">安徽11选5</option>
										<option value="上海11选5">上海11选5</option>
										<option value="排列五">排列五</option>
										<option value="上海时时乐">上海时时乐</option>
										<option value="分分3D">分分3D</option>
										<option value="分分11选5">分分11选5</option>
										<option value="北京28">北京28</option>
										<option value="韩国28">韩国28</option>
										<option value="加拿大28">加拿大28</option>
										<option value="台湾28">台湾28</option>
									</select>
									<em>玩法:</em>
									<select class="palying_meth">
										<option value="猜数字">猜数字</option>
										<option value="大小单双">大小单双</option>
										<option value="波色">波色</option>
										<option value="特码包三">特码包三</option>
										<option value="特殊组合">特殊组合</option>
										<option value="大小单双">大小单双</option>
										<option value="极大极小">极大极小</option>
									</select>
									<ul class="lot_all">
										<li class="on" content="1">个人</li>
										<li content="2">直属</li>
										<li content="3">全部</li>
									</ul>
									<a class="zhzl btn_search page_submit">
										<i></i> 查询
									</a>
								</div>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>投注时间</th>
									<th>彩种</th>
									<th>玩法</th>
									<th>起始期号</th>
									<th>追号期数</th>
									<th>完成期数</th>
									<th>投注内容</th>
									<th>投注金额</th>
									<th>中奖追停</th>
									<th>状态</th>
									<th>盈亏</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="12">请选择查询条件之后进行查询</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form class="cur_record account_edit_form">
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        变动时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<div class="cur_user">
									用户账号: <input type="text" class="user_name userName">
									<ul class="lot_all">
										<li class="on" content="1">个人</li>
										<li content="2">直属</li>
										<li content="3">全部</li>
									</ul>
								</div>
								<div class="short_handle">
									<em>快捷操作:</em>
									<ul>
										<li class="on">变动时间</li>
										<li>用户账号</li>
										<li>转账帐变</li>
										<li>投注帐变</li>
										<li>奖金帐变</li>
										<li>返水帐变</li>
										<li>团队赚水</li>
										<li>活动礼金</li>
										<li>红包活动</li>
										<li>理财</li>
									</ul>
									<a class="zbzl btn_search page_submit">
										<i></i> 查询
									</a>
								</div>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>变动时间</th>
									<th>用户账号</th>
									<th>变动类型</th>
									<th>变动金额</th>
									<th>变动后余额</th>
									<th>彩种</th>
									<th>备注</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="7">请选择查询条件之后进行查询</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form action="agency_form">
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        投注时间:
                        <input class="laydate-icon" onclick="laydate()" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate()" name="date_max">
                    </label>
								<a href="#" class="dljl btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>日期</th>
									<th>佣金类型</th>
									<th>金额</th>
									<th>最后更新时间</th>
									<th>备注</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="7">请选择查询条件之后进行查询</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>
					<div class="account_content">
						<form class="account_edit_form recharge_dr_form">
							<ul class="pay_record">
								<li class="on" value="1">充值记录</li>
								<li value="2">取款记录</li>
								<li value="3">转账记录</li>
							</ul>
							<div class="search_date clearfix">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
								<a class="czzjl btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab state_tab_no clearfix">
							<thead>
								<tr>
									<th>申请日期</th>
									<th>付款方式</th>
									<th>付款人</th>
									<th>入款银行</th>
									<th>入款金额</th>
									<th>入款后余额</th>
									<th>审核时间</th>
									<th>状态</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2016-11-20</td>
									<td></td>
									<td></td>
									<td>建设银行</td>
									<td>1000.000</td>
									<td>1000.000</td>
									<td>2016-12-18</td>
									<td>审核通过</td>
								</tr>
								<tr>
									<td>2016-11-20</td>
									<td></td>
									<td></td>
									<td>建设银行</td>
									<td>1000.000</td>
									<td>1000.000</td>
									<td>2016-12-18</td>
									<td>不通过</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1" /></lable>
								<span class="go">跳转</span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!--帐变记录结束-->
		<!--账号管理开始-->
		<div id="user_manage" class="clearfix">
			<div class="statement_tab .clearfix">
				<div class="tab_list">
					<i class="chongzhi"></i>
					<ul>
						<li><span>我的信息</span></li>
						<li><span>安全中心</span></li>
						<li><span>修改密码</span></li>
						<li><span>银行资料</span></li>
						<li><span>我的消息</span></li>
						<li><span>奖金详情</span></li>
						<li><span>登录记录</span></li>
					</ul>
					<strong class="state_close"></strong>
				</div>
				<div class="tab_content">
					<div class="account_content my_information" id="my_information">
						<div class="user_cont_top">
							<div class="head_sculpture"></div>
							<span class="user-name"><?php echo ($userInfo["nickname"]); ?></span>
							<span class="user-type">代理</span>
							<span>余额:</span>
							<span class="money_num"><?php echo ($userInfo["money"]); ?></span>
							<span class="fa-refresh">刷新</span>
							<span class="my_bank_card">
                        <i></i>
                        我的银行卡
                        <span class="num">(2)</span>
							</span>
						</div>
						<ul class="info-item clearfix">
							<li>
								<i></i> 最近登录时间:
								<span><?php echo (date("Y-m-d H:i",$userInfo["logintime"])); ?></span>
							</li>
							<li class="even">
								<i></i> 最近登录IP:
								<span><?php echo ($userInfo["login_ip"]); ?></span>
							</li>
							<li>
								<i></i> 上次登录时间:
								<span><?php echo (date("Y-m-d H:i",$userInfo["last_logintime"])); ?></span>
							</li>
							<li class="even">
								<i></i> 上次登录IP:
								<span><?php echo ($userInfo["last_login_ip"]); ?></span>
							</li>
						</ul>
						<div class="account-info">
							<h3>账户信息</h3>
							<table>
								<thead>
									<tr>
										<th>用户名</th>
										<th>注册时间</th>
										<th>账户余额</th>
										<th>高频彩返点</th>
										<th>低频彩返点</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo ($userInfo["username"]); ?></td>
										<td><?php echo (date("Y-m-d H:i",$userInfo["addtime"])); ?></td>
										<td><?php echo ($userInfo["money"]); ?></td>
										<td><?php echo ($userInfo["top_rebate"]); ?></td>
										<td><?php echo ($userInfo["low_rebate"]); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="account-info">
							<h3>团队信息</h3>
							<table>
								<thead>
									<tr>
										<th>团队成员(人)</th>
										<th>今日注册</th>
										<th>当前在线</th>
										<th>今日返点</th>
										<th>团队余额(不包含自己)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>0</td>
										<td>0</td>
										<td>0</td>
										<td>0.000</td>
										<td>0.000</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="account-info acc_info_bottom">
							<h3>我的配额</h3>
							<table>
								<thead>
									<tr>
										<th>等级</th>
										<th>-</th>
										<th>-</th>
										<th>-</th>
										<th>-</th>
										<th>-</th>
										<th>-</th>
										<th>-</th>
										<th>-</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>剩余</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="account_content">
						<div class="security_level" id="security_level">
							<div class="safe-top clearfix">
								<div class="safe-info">
									<div class="safe-level">
										安全等级 :
										<i class="in-star"></i>
										<i class="out-star"></i>
										<i class="out-star"></i>
										<i class="out-star"></i>
										<i class="out-star"></i>
									</div>
									<div class="prev-info">
										<i></i> 上次登录IP:
										<span class="prev_login_ip">27.151.94.233</span>
									</div>
									<div class="prev-info">
										<i></i> 上次登录时间:
										<span class="prev_login_time">2017-01-09 09:10:28</span>
									</div>
								</div>
								<div class="safe-log clearfix">
									<table>
										<thead>
											<tr>
												<th>登录时间</th>
												<th>登录IP</th>
												<th>登录结果</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>2017-01-10 09:20:12</td>
												<td>27.151.94.233</td>
												<td>成功</td>
											</tr>
											<tr>
												<td>2017-01-10 09:20:12</td>
												<td>27.151.94.233</td>
												<td>失败</td>
											</tr>
											<tr>
												<td>2017-01-10 09:20:12</td>
												<td>27.151.94.233</td>
												<td>成功</td>
											</tr>
											<tr>
												<td>2017-01-10 09:20:12</td>
												<td>27.151.94.233</td>
												<td>成功</td>
											</tr>
											<tr>
												<td>2017-01-10 09:20:12</td>
												<td>27.151.94.233</td>
												<td>成功</td>
											</tr>
											<tr>
												<td>2017-01-10 09:20:12</td>
												<td>27.151.94.233</td>
												<td>成功</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="safe-center fl">
								<div class="line">
									<h3 class="lock-icon">登录密码<span>请定期修改密码</span></h3>
									<a class="btn_set_password">修改登录密码</a>
								</div>
								<div class="line">
									<h3 class="bank-car-icon">我的银行卡<span>2张</span></h3>
									<a class="btn_bind_bank">绑定三号卡</a>
								</div>
								<div class="line">
									<h3 class="phone-icon">绑定安全电话:<span>180****1458</span></h3>
									<a class="btn_bind_phone">修改绑定电话</a>
								</div>
							</div>
							<div class="safe-center fr">
								<div class="line">
									<h3 class="money-icon">资金密码<span>请修改默认密码</span></h3>
									<a class="btn_set_money">修改资金密码</a>
								</div>
								<div class="line" id="security_qq">
									<h3 class="qq-icon">绑定安全QQ:<span>未绑定</span></h3>
									<a class="btn_set_qq">立即绑定QQ</a>
								</div>
								<div class="line">
									<h3 class="email-icon">安全邮箱验证:<span>未绑定</span></h3>
									<a class="btn_set_email">立即认证邮箱</a>
								</div>
							</div>
						</div>
						<div class="security_list bind_card_show" id="withdraw_bank">
							<form class="account-edit-form" id="form-set-user-bank">
								<div class="row">
									<div class="th">开户银行:</div>
									<div class="td">
										<select class="bank_list">
											<option value="工商银行">工商银行</option>
											<option value="农业银行">农业银行</option>
											<option value="建设银行">建设银行</option>
											<option value="中国银行">中国银行</option>
											<option value="招商银行">招商银行</option>
											<option value="交通银行">交通银行</option>
											<option value="民生银行">民生银行</option>
											<option value="光大银行">光大银行</option>
											<option value="浦发银行">浦发银行</option>
											<option value="兴业银行">兴业银行</option>
											<option value="中信银行">中信银行</option>
											<option value="邮政储蓄">邮政储蓄</option>
											<option value="平安银行">平安银行</option>
											<option value="广发银行">广发银行</option>
											<option value="上海银行">上海银行</option>
											<option value="北京银行">北京银行</option>
											<option value="华夏银行">华夏银行</option>
											<option value="上海农行">上海农行</option>
											<option value="北京农商">北京农商</option>
											<option value="渤海银行">渤海银行</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="th">开户银行地址:</div>
									<lable class="td"><input type="text" name="address"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入开户银行地址</div>
								</div>
								<div class="row">
									<div class="th">开户名:</div>
									<lable class="td"><input type="text" name="account_user"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入开户名</div>
								</div>
								<div class="row">
									<div class="th">银行卡号:</div>
									<lable class="td"><input type="text" name="bank_key"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入银行卡号</div>
								</div>
								<div class="row">
									<div class="th">是否锁定:</div>
									<lable class="td">
										<lable><input type="radio" checked="checked" name="lock" value="1">锁定</lable>
										<lable><input type="radio" name="lock" value="0">不锁定</lable>
									</lable>
								</div>
								<div class="row">
									<div class="th">资金密码:</div>
									<lable class="td"><input type="text" name="fund_pwd"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入资金密码(该密码为平台资金密码)</div>
								</div>
								<div class="row">
									<div class="th"></div>
									<div class="hand">
										<a class="submit_deposit">提交</a>
										<a class="go_back">返回上一页</a>
									</div>
								</div>
							</form>
						</div>
						<div class="security_list iphone_show" id="iphone_show">
							<form class="account-edit-form">
								<div class="row">
									<div class="th">用户名:</div>
									<lable class="td" content="user-name">lv57162370</lable>
								</div>
								<div class="row">
									<div class="th">绑定安全电话:</div>
									<lable class="td"><input type="text" name="iphone"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入安全电话</div>
								</div>
								<div class="row">
									<div class="th"></div>
									<div class="hand">
										<a class="submit_deposit">提交</a>
										<a class="go_back">取消</a>
									</div>
								</div>
							</form>
						</div>
						<div class="security_list qq_show" id="apper_qq_form">
							<form class="account-edit-form" id="qq-form">
								<div class="row">
									<div class="th">用户名:</div>
									<lable class="td" content="user-name">lv57162370</lable>
								</div>
								<div class="row">
									<div class="th">绑定安全QQ:</div>
									<lable class="td"><input type="text" name="qq"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入安全QQ</div>
								</div>
								<div class="row">
									<div class="th"></div>
									<div class="hand">
										<a class="submit_deposit">提交</a>
										<a class="go_back">取消</a>
									</div>
								</div>
							</form>
						</div>
						<div class="security_list email_show" id="bd_email">
							<form class="account-edit-form">
								<div class="row">
									<div class="th">用户名:</div>
									<lable class="td" content="user-name">lv57162370</lable>
								</div>
								<div class="row">
									<div class="th">安全邮箱认证:</div>
									<lable class="td"><input type="text" name="email"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入安全邮箱</div>
								</div>
								<div class="row">
									<div class="th"></div>
									<div class="hand">
										<a class="submit_deposit">提交</a>
										<a class="go_back">取消</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="account_content">
						<ul class="content-nav">
							<li class="on">登录密码</li>
							<li>资金密码</li>
						</ul>
						<div class="set-password-warp  show" id="set-password-warp">
							<div class="cont-set-password">
								<form id="form-set-password">
									<div class="row">
										<div class="th">用户名:</div>
										<div class="td" content="user-name">lv57162370</div>
									</div>
									<div class="row">
										<div class="th">当前登入密码:</div>
										<label class="td"><input type="password" name="old_password"></label>
									</div>
									<div class="row30 clearfix">
										<div class="th"></div>
										<div class="tip tip1">
											<i class="zhuyi"></i> 请输入当前登录密码
										</div>
									</div>
									<div class="row">
										<div class="th">新的登入密码:</div>
										<label class="td"><input type="password" name="password"></label>
									</div>
									<div class="row30 clearfix">
										<div class="th"></div>
										<div class="tip tip2">
											<i class="zhuyi"></i> 请输入新的登录密码
										</div>
									</div>
									<div class="row">
										<div class="th">确认新的登入密码:</div>
										<label class="td"><input type="password" name="confirm_password"></label>
									</div>
									<div class="row30 clearfix">
										<div class="th"></div>
										<div class="tip tip3">
											<i class="zhuyi"></i> 请重新输入新的登录密码
										</div>
									</div>
									<div class="row">
										<a id="submit-set-password" class="btn">确认提交</a>
										<a id="cancel-set-password" class="btn">重新修改</a>
									</div>
								</form>
							</div>
							<div class="cont-set-password" id="cont-set-password">
								<form id="form-set-money-password">
									<div class="row">
										<div class="th">用户名:</div>
										<div class="td" content="user-name">lv57162370</div>
									</div>
									<div class="row">
										<div class="th">当前资金密码:</div>
										<label class="td"><input type="password" name="old_password"></label>
									</div>
									<div class="row30 clearfix">
										<div class="th"></div>
										<div class="tip tip1">
											<i class="zhuyi"></i> 请输入当前资金密码
										</div>
									</div>
									<div class="row">
										<div class="th">新的资金密码:</div>
										<label class="td"><input type="password" name="password"></label>
									</div>
									<div class="row30 clearfix">
										<div class="th"></div>
										<div class="tip tip2">
											<i class="zhuyi"></i> 请输入新资金密码
										</div>
									</div>
									<div class="row">
										<div class="th">确认新资金密码:</div>
										<label class="td"><input type="password" name="confirm_password"></label>
									</div>
									<div class="row30 clearfix">
										<div class="th"></div>
										<div class="tip tip3">
											<i class="zhuyi"></i> 默认资金密码:000000
										</div>
									</div>
									<div class="row">
										<a id="submit-set-money-password" class="btn">确认提交</a>
										<a id="cancel-set-money-password" class="btn">重新修改</a>
									</div>
								</form>
							</div>
						</div>
						<div class="pwd-explain fl">
							<div class="row_explain"><i>1</i>定期更换密码可以让您的账户更安全</div>
							<div class="row_explain"><i>2</i>请确保您的登录密码与资金密码不同</div>
							<div class="row_explain"><i>3</i>尽量使用复杂的密码, 以避免被盗号者轻易地破解. 比如"newFire8950*256" 这样的密码就是比较不错的选择, 但前提是您不会遗忘. 您可以将密码写在纸上或者记录在手机上.</div>
							<div class="row_explain"><i>4</i>JC系统同时采用了其他众多措施来尽力保障您的资金和账户安全.</div>
						</div>
					</div>
					<div class="account_content">
						<div class="menu-user-bank" id="menu-user-bank">
							<ul class="cont-explain">
								<li><i>1</i>您最多可以同时绑定6张银行卡用于提现, 并且可以随时更换, 但所有卡都必须属于同一持卡人名下.</li>
								<li><i>2</i>添加或修改银行卡后需要1个小时才能取款.</li>
							</ul>
							<ul class="user-bank-list clearfix">
								<li>
									<div class="edit-text">点击绑定一号卡</div>
								</li>
								<li>
									<div class="edit-text">点击绑定二号卡</div>
								</li>
								<li>
									<div class="edit-text">点击绑定三号卡</div>
								</li>
								<li>
									<div class="edit-text">点击绑定四号卡</div>
								</li>
								<li>
									<div class="edit-text">点击绑定五号卡</div>
								</li>
								<li>
									<div class="edit-text">点击绑定六号卡</div>
								</li>
							</ul>
							<ul class="hint_list">
								<li>
									<h1>提示:</h1></li>
								<li>为了您的账户和资金安全, 平台会在首次绑定后的1小小时内给予您继续绑定与删除银行卡的权限, 超过1个小时后将锁定银行卡绑定与删除功能;</li>
								<li>如若您的银行卡已经被锁定, 您需要解除锁定功能, 请联系在线客服;</li>
								<li>解除锁定后, 1小时内可以进行银行增加, 绑定与删除操作.</li>
							</ul>
						</div>
						<div class="security_list bind_card_show2" id="withdraw_bank2">
							<form class="account-edit-form" id="form-set-user-bank2">
								<div class="row">
									<div class="th">开户银行:</div>
									<div class="td">
										<select class="bank_list">
											<option value="工商银行">工商银行</option>
											<option value="农业银行">农业银行</option>
											<option value="建设银行">建设银行</option>
											<option value="中国银行">中国银行</option>
											<option value="招商银行">招商银行</option>
											<option value="交通银行">交通银行</option>
											<option value="民生银行">民生银行</option>
											<option value="光大银行">光大银行</option>
											<option value="浦发银行">浦发银行</option>
											<option value="兴业银行">兴业银行</option>
											<option value="中信银行">中信银行</option>
											<option value="邮政储蓄">邮政储蓄</option>
											<option value="平安银行">平安银行</option>
											<option value="广发银行">广发银行</option>
											<option value="上海银行">上海银行</option>
											<option value="北京银行">北京银行</option>
											<option value="华夏银行">华夏银行</option>
											<option value="上海农行">上海农行</option>
											<option value="北京农商">北京农商</option>
											<option value="渤海银行">渤海银行</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="th">开户银行地址:</div>
									<lable class="td"><input type="text" name="address"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入开户银行地址</div>
								</div>
								<div class="row">
									<div class="th">开户名:</div>
									<lable class="td"><input type="text" name="account_user"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入开户名</div>
								</div>
								<div class="row">
									<div class="th">银行卡号:</div>
									<lable class="td"><input type="text" name="bank_key"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入银行卡号</div>
								</div>
								<div class="row">
									<div class="th">是否锁定:</div>
									<lable class="td">
										<lable><input type="radio" checked="checked" name="lock" value="1">锁定</lable>
										<lable><input type="radio" name="lock" value="0">不锁定</lable>
									</lable>
								</div>
								<div class="row">
									<div class="th">资金密码:</div>
									<lable class="td"><input type="text" name="fund_pwd"></lable>
									<div class="tip"><i class="zhuyi"></i>请输入资金密码(该密码为平台资金密码)</div>
								</div>
								<div class="row">
									<div class="th"></div>
									<div class="hand">
										<a class="submit_deposit">提交</a>
										<a class="go_back">返回上一页</a>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="account_content">
						<div class="message_wrap">
							<ul class="message_record">
								<li class="on">我的消息</li>
								<li>系统消息</li>
								<li>系统公告</li>
							</ul>

							<div>
								<div class="message_menu show">
									<form class="account_edit_form my_message_form">
										<div class="search_date clearfix">
											<ul class="shortcut_time">
												<li>快捷选时:</li>
												<li class="item on" content="today" datatype="time">今天</li>
												<li class="item" content="yesterday" datatype="time">昨天</li>
												<li class="item" content="this_week" datatype="time">本周</li>
												<li class="item" content="prev_week" datatype="time">上周</li>
												<li class="item" content="this_month" datatype="time">本月</li>
												<li class="item" content="prev_month" datatype="time">上月</li>
											</ul>
											<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
											<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
											<label>
                        状态
                    <select>
                        <option value="全部">全部</option>
                        <option value="未读">未读</option>
                        <option value="已读">已读</option>
                    </select>
                    </label>
											<a class="btn_search page_submit">
												<i></i> 查询
											</a>
											<a class="btn_search" id="send_message">
												<i></i> 发送消息
											</a>
										</div>
									</form>
									<table class="state_tab state_tab_no clearfix">
										<thead>
											<tr>
												<th>发送时间</th>
												<th>发送人</th>
												<th>接收人</th>
												<th>标题</th>
												<th>内容</th>
												<th>阅读时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="7">查无数据</td>
											</tr>
										</tbody>
									</table>
									<div class="panging clearfix">
										<div class="panging_info fl">
											第<span>1</span>页 ,共<span>0</span>条 ,每页<span>10</span>条
										</div>
										<div class="page_jump fr">
											<span class="pre">上一页</span>
											<span class="this">1</span>
											<span class="next active">下一页</span>
											<lable><input type="text" value="1" /></lable>
											<span class="go">跳转</span>
										</div>
									</div>
								</div>
								<div class="message_menu">
									<form class="account_edit_form system_message_form">
										<div class="search_date clearfix">
											<ul class="shortcut_time">
												<li>快捷选时:</li>
												<li class="item on" content="today" datatype="time">今天</li>
												<li class="item" content="yesterday" datatype="time">昨天</li>
												<li class="item" content="this_week" datatype="time">本周</li>
												<li class="item" content="prev_week" datatype="time">上周</li>
												<li class="item" content="this_month" datatype="time">本月</li>
												<li class="item" content="prev_month" datatype="time">上月</li>
											</ul>
											<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min"/>
                    </label>
											<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max"/>
                    </label>
											<label>
                        状态
                    <select>
                        <option value="全部">全部</option>
                        <option value="未读">未读</option>
                        <option value="已读">已读</option>
                    </select>
                    </label>
											<a href="#" class="btn_search page_submit">
												<i></i> 查询
											</a>
										</div>
									</form>
									<table class="state_tab state_tab_no clearfix">
										<thead>
											<tr>
												<th>发送时间</th>
												<th>标题</th>
												<th>消息内容</th>
												<th>阅读时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="5">请选择查询条件之后进行查询</td>
											</tr>
										</tbody>
									</table>
									<div class="panging clearfix">
										<div class="panging_info fl">
											第<span>1</span>页 ,共<span>0</span>条 ,每页<span>10</span>条
										</div>
										<div class="page_jump fr">
											<span class="pre">上一页</span>
											<span class="this">1</span>
											<span class="next active">下一页</span>
											<lable><input type="text" value="1" /></lable>
											<span class="go">跳转</span>
										</div>
									</div>
								</div>
								<div class="message_menu">
									<form class="account_edit_form system_notice_form">
										<div class="search_date clearfix">
											<label>
                        公告类型:
                    <select>
                        <option value="全部">全部</option>
                        <option value="未读">系统公告</option>
                        <option value="已读">游戏公告</option>
                    </select>
                    </label>
											<a href="#" class="btn_search page_submit">
												<i></i> 查询
											</a>
										</div>
									</form>
									<table class="state_tab state_tab_no clearfix">
										<thead>
											<tr>
												<th>公告时间</th>
												<th>公告标题</th>
												<th>公告内容</th>
												<th>操作</th>
											</tr>

										</thead>
										<tbody>
											<tr>
												<td colspan="4">请选择查询条件之后进行查询</td>
											</tr>
										</tbody>
									</table>
									<div class="panging clearfix">
										<div class="panging_info fl">
											第<span>1</span>页 ,共<span>0</span>条 ,每页<span>10</span>条
										</div>
										<div class="page_jump fr">
											<span class="pre">上一页</span>
											<span class="this">1</span>
											<span class="next active">下一页</span>
											<lable><input type="text" value="1" /></lable>
											<span class="go">跳转</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--wrap-->
						<div class="send_message_menu">
							<div class="row">
								<div class="th">发送给:</div>
								<div class="td">
									<label><input type="radio" name="receiver_type" value="0" checked="checked">直属下级</label>
									<label><input type="radio" name="receiver_type" value="1">直属上级</label>
									<label><input type="radio" name="receiver_type" value="2">所有直属下级</label>
								</div>
							</div>
							<div class="directly_wrap">
								<div class="directly">
									<div class="row" id="send-message-for-direct">
										<div class="th">直属下级账号:</div>
										<div class="td">
											<label><input type="text" name="receiver_name" maxlength="20"></label>
										</div>
										<div class="tip">
											<i class="zhuyi"></i> 请输入直属下级账号
										</div>
									</div>
									<div class="row">
										<div class="th">主题:</div>
										<div class="td">
											<label><input type="text" name="theme" maxlength="20"></label>
										</div>
										<div class="tip">
											<i class="zhuyi"></i> 请输入消息主题
										</div>
									</div>
									<div class="row row90">
										<div class="th">消息内容:</div>
										<div class="td">
											<textarea name="content" style="width:230px;height:80px;"></textarea>
										</div>
										<div class="tip">
											<i class="zhuyi"></i> 请输入消息内容
										</div>
									</div>
									<div class="row">
										<a class="btn" id="submit-send-message">发送</a>
										<a class="btn" id="cancel">返回上一级</a>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="account_content">
						<div class="user_cont_top">
							<div class="head_sculpture"></div>
							<span class="user-name">lv57162370</span>
							<span class="user-type">代理</span>
							<span>高频彩返点:</span>
							<span class="num">8.5<span>(1970)</span></span>
							<span>低频彩返点:</span>
							<span class="num">6.5<span>(1930)</span></span>
						</div>
						<div id="lottery-bonus-classify">
						</div>
						<ul id="lottery-bonus-wf-list">
						</ul>
						<table class="state_tab state_tab_no" id="lottery-bonus-table">
						</table>

					</div>

					<div class="account_content">
						<div class="message_wrap">

							<div class="message_menu show">
								<form class="account_edit_form my_message_form" id="loginLog111" method="post" onsubmit="return false;">
									<div class="search_date clearfix">
										<ul class="shortcut_time">
											<li>快捷选时:</li>
											<li class="item on" content="today" datatype="time">今天</li>
											<li class="item" content="yesterday" datatype="time">昨天</li>
											<li class="item" content="this_week" datatype="time">本周</li>
											<li class="item" content="prev_week" datatype="time">上周</li>
											<li class="item" content="this_month" datatype="time">本月</li>
											<li class="item" content="prev_month" datatype="time">上月</li>
										</ul>
										<label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min">
                    </label>
										<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max">
                    </label> 用户账号: <input type="text" class="use_name" name="userName">
										<div style="padding: 3px 0 0 0;">
											&nbsp;登入网址:
											<input type="text" class="use_name" name="url"> 登入IP:
											<input type="text" class="use_name" name="ip">
											<label>
						登录结果
						<select name="status">
							<option value="-1">全部</option>
							<option value="1">成功</option>
							<option value="0">失败</option>
						</select>
						</label>
											<input type="submit" value="查询" id="login_btn" class="btn_search page_submit" />
											<!--						<a class="btn_search">

							<i></i>
							查询
						</a>-->
										</div>
									</div>
								</form>
								<div id="page_log">
									<table class="state_tab state_tab_no safe-logta clearfix" cellpadding=3 cellspacing=5>
										<thead>
											<tr>
												<th>用户名</th>
												<th>登录时间</th>
												<th>登录网址</th>
												<th>登录IP</th>
												<th>登录结果</th>
												<th>备注</th>
											</tr>
										</thead>
										<tbody id="a11111">
											<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
													<td><?php echo ($item["userName"]); ?></td>
													<td><?php echo (date("Y-m-d H:i",$item["loginTime"])); ?></td>
													<td><?php echo ($item["url"]); ?></td>
													<td><?php echo ($item["ip"]); ?></td>
													<td><?php echo ($item["status"]); ?></td>
													<td><?php echo ($item["content"]); ?></td>
												</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>
									</table>
									<!--<div class="pages"><?php echo ($page); ?></div>-->

									<div class="panging clearfix">
										<div class="panging_info fl">
											第<span><?php echo ($count["current"]); ?></span>页 ,共<span><?php echo ($count["count"]); ?></span>条 ,每页<span><?php echo ($count["number"]); ?></span>条
										</div>
										<div class="page_jump fr">
											<span id="last_page">上一页</span>
											<span class="active"><?php echo ($count["current"]); ?></span>
											<span class="active" id="next_page">下一页</span>
											<lable><input type="text" value="" name="jump"></lable>
											<span class="go" id="jump">跳转</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--账号管理结束-->
		<!--团队管理开始-->
		<div id="team_ad" class="team_ad">
			<div class="statement_tab">
				<div class="tab_list">
					<i class="tuandui"></i>
					<ul>
						<li class="tdtj active"><span>团队统计</span></li>
						<li class="khzx"><span>开户中心</span></li>
						<li class="pegl"><span>配额管理</span></li>
						<li class="xjgl"><span>下级管理</span></li>
						<li class="xjcz"><span>下级充值</span></li>
						<li class="xjqk"><span>下级取款</span></li>
					</ul>
					<strong class="state_close"></strong>
				</div>
				<div class="tab_content">
					<div class="account_content active">
						<ul class="team_ad_ultab clearfix">
							<li>团队人数：0</li>
							<li>在线人数：</li>
							<li>今日注册：0</li>
							<li>团队余额：¥ 0.00</li>
							<li>今日充值：¥ 0.00</li>
							<li>今日取款：¥ 0.00</li>
						</ul>
						<form class="account_edit_form">
							<div class="search_date clearfix">
								<ul class="shortcut_time shortcut_time_no">
									<li class="item on" content="this_3" datatype="time">最近3天</li>
									<li class="item" content="this_7" datatype="time">最近7天</li>
									<li class="item" content="this_30" datatype="time">最近一个月</li>
								</ul>
								<label>
                        统计时间:
                        <input class="laydate-icon" onclick="laydate()" name="date_min">
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate()" name="date_max">
                    </label>
								<a href="javascript:void(0);" class="tdtj btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<div class="team_ad_chart">
							<ul class="team_ad_ulcon clearfix">
								<li>转入</li>
								<li>转出</li>
								<li><span>投注量</span><span>¥92.170</span></li>
								<li><span>返点量</span><span>¥0.184</span></li>
								<li>活动奖励</li>
								<li><span>实际盈亏</span><span>¥-80.095</span></li>
							</ul>
							<div id="team_ad_chart" style="height: 300px; width: 90%; margin-top: 20px; ">
								<div id="main" style="width:970px; height:300px;"></div>
							</div>
						</div>
					</div>
					<div class="account_content">
						<div class="team_ad_list" id="team_ad_list">
							<div class="search_date clearfix">
								<span class="red">注意：</span>如果链接返点配额不足或者已删除，新用户默认返点为 <span class="red">0</span>
								<div class="fr">
									<a class="btn_search page_submit"><i></i> 查询</a>
									<a class="btn_search" id="btn_plus"><i></i> 添加新链接</a>
								</div>
							</div>
							<table class="state_tab state_tab_no safe-logta clearfix">
								<thead>
									<tr>
										<th>注册链接</th>
										<th>账户类型</th>
										<th>高频彩返点</th>
										<th>低频彩返点</th>
										<th>备注</th>
										<th>注册量</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="td_blue">http://vip.jctouzhu.com:8088/api/r/C/A/aoxwnaphvb</td>
										<td>代理</td>
										<td class="td_green">8.5(1970)</td>
										<td class="td_green">6.5(1930)</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>0</td>
										<td class="td_delete"><i></i></td>
									</tr>
								</tbody>
							</table>
							<div class="panging clearfix">
								<div class="panging_info fl">
									第<span>1</span>页 ,共<span>0</span>条 ,每页<span>10</span>条
								</div>
								<div class="page_jump fr">
									<span class="pre">上一页</span>
									<span class="this">1</span>
									<span class="next active">下一页</span>
									<lable><input type="text" value="1"></lable>
									<span class="go">跳转</span>
								</div>
							</div>
						</div>
						<div class="team_ad_listf " style="display: none">
							<div class="clearfix">
								用户类型：
								<ul class="shortcut_btn">
									<li class="on">代理</li>
									<li>会员</li>
								</ul> 备注：<input type="text" name="remarks">
							</div>
							<table class="state_tab clearfix">
								<thead>
									<tr>
										<th>彩种(模式)</th>
										<th>返点设置</th>
										<th>我的返点</th>
										<th>彩种(模式)</th>
										<th>返点设置</th>
										<th>我的返点</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>高频彩返点</td>
										<td><input type="text" name="high"> 范围：6.000 ~ 8.500</td>
										<td>8.500</td>
										<td>低频彩返点</td>
										<td><input type="text" name="low"> 范围：5.500 ~ 6.500</td>
										<td>6.500</td>
									</tr>
								</tbody>
							</table>
							<input type="submit" name="" value="提交"><input type="button" name="" value="返回上一页">
						</div>
					</div>
					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min">
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max">
                    </label>
								<label>
                        用户名：<input type="text" class="user_bank userName" name="user_name">
                    </label>
								<a class="pegl btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab  clearfix">
							<thead>
								<tr>
									<th>变动时间</th>
									<th>用户名</th>
									<th>返点</th>
									<th>修改前配额</th>
									<th>修改后配额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="5">查无数据</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1"></lable>
								<span class="go">跳转</span>
							</div>
						</div>

					</div>

					<div class="account_content">
						<div class="team_ad_list">
							<form class="account_edit_form my_message_form">
								<div class="search_date search_date_next">
									<label>
							&nbsp;&nbsp;&nbsp;&nbsp;用户名：<input type="text" class="user_bank userName" name="user_name">
						</label> &nbsp;&nbsp;余额：
									<input type="text" class="use_name balanceMin"> ~
									<input type="text" class="use_name balanceMax"> &nbsp;&nbsp;返点：
									<input type="text" class="use_name rebatesMin"> ~
									<input type="text" class="use_name rebatesMax">
									<label>
						&nbsp;&nbsp;用户类型：
							<select class="useType">
								<option value="全部">全部</option>
								<option value="代理">代理</option>
								<option value="会员">会员</option>
							</select>
						</label>
									<label>
						在线状态：
							<select class="online">
								<option value="全部">全部</option>
								<option value="在线">在线</option>
								<option value="离线">离线</option>
							</select>
						</label>
									<label>
						&nbsp;&nbsp;范围：
							<select class="junior">
								<option value="直属下级">直属下级</option>
								<option value="全部下级">全部下级</option>
							</select>
						</label> &nbsp;&nbsp;根据：
									<select class="AccordType">
										<option value="注册时间">注册时间</option>
										<option value="用户名">用户名</option>
										<option value="余额">余额</option>
									</select>
									<select class="AccordSequence">
										<option value="倒序">倒序</option>&nbsp;&nbsp;
										<option value="升序">升序</option>
									</select>
									<a class="xjgl btn_search page_submit">
										<i></i> 查询
									</a>
									<a class="btn_search" id="btn_next"><i></i> 添加下级</a>
								</div>
							</form>
							<table class="state_tab  clearfix">
								<thead>
									<tr>
										<th>用户名</th>
										<th>备注</th>
										<th>余额</th>
										<th>团队余额</th>
										<th>返点</th>
										<th>状态</th>
										<th>注册时间<br />上次登录时间</th>
										<th>注册IP<br />登录IP</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="9">&nbsp;<br />查无数据<br />&nbsp;</td>
									</tr>
								</tbody>
							</table>
							<div class="panging clearfix">
								<div class="panging_info fl">
									第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
								</div>
								<div class="page_jump fr">
									<span class="pre">上一页</span>
									<span class="this">1</span>
									<span class="next active">下一页</span>
									<lable><input type="text" value="1"></lable>
									<span class="go">跳转</span>
								</div>
							</div>
						</div>

						<div class="team_ad_listf" style="display: none">
							<div class="clearfix">
								用户类型：
								<ul class="shortcut_btn">
									<li class="on">代理</li>
									<li>会员</li>
								</ul> 用户名：<input type="text" name=""> &nbsp;密码：
								<input type="text" name=""> &nbsp;快速调点：
								<input style="width: 100px;" type="text" name="">
								<input class="in_qd" type="submit" name="" value="确定">
							</div>
							<table class="state_tab clearfix">
								<thead>
									<tr>
										<th>彩种(模式)</th>
										<th>返点设置</th>
										<th>我的返点</th>
										<th>彩种(模式)</th>
										<th>返点设置</th>
										<th>我的返点</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>高频彩返点</td>
										<td><input type="text" name=""> 范围：6.000 ~ 8.500</td>
										<td>8.500</td>
										<td>低频彩返点</td>
										<td><input type="text" name=""> 范围：5.500 ~ 6.500</td>
										<td>6.500</td>
									</tr>
								</tbody>
							</table>
							<input type="submit" name="" value="提交"><input type="button" name="" value="返回上一页">
						</div>
					</div>

					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min">
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max">
                    </label>
								<label>
                        用户名：<input type="text" class="user_bank userName" name="user_name">
                    </label>
								<a class="xjcz btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab  clearfix">
							<thead>
								<tr>
									<th>用户名</th>
									<th>收款银行</th>
									<th>入款银行</th>
									<th>充值前金额</th>
									<th>实际充值金额</th>
									<th>记录时间</th>
									<th>审核状态</th>
									<th>审核消息</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="8">查无数据</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1"></lable>
								<span class="go">跳转</span>
							</div>
						</div>
					</div>

					<div class="account_content">
						<form class="account_edit_form">
							<div class="search_date">
								<ul class="shortcut_time">
									<li>快捷选时:</li>
									<li class="item on" content="today" datatype="time">今天</li>
									<li class="item" content="yesterday" datatype="time">昨天</li>
									<li class="item" content="this_week" datatype="time">本周</li>
									<li class="item" content="prev_week" datatype="time">上周</li>
									<li class="item" content="this_month" datatype="time">本月</li>
									<li class="item" content="prev_month" datatype="time">上月</li>
								</ul>
								<label>
                        申请时间:
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_min">
                    </label>
								<label>
                        至
                        <input class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" name="date_max">
                    </label>
								<label>
                        用户名：<input type="text" class="user_bank userName" name="user_name">
                    </label>
								<a class="xjqk btn_search page_submit">
									<i></i> 查询
								</a>
							</div>
						</form>
						<table class="state_tab  clearfix">
							<thead>
								<tr>
									<th>用户名</th>
									<th>收款银行</th>
									<th>取款前金额</th>
									<th>取款金额</th>
									<th>记录时间</th>
									<th>审核状态</th>
									<th>审核消息</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="7">查无数据</td>
								</tr>
							</tbody>
						</table>
						<div class="panging clearfix">
							<div class="panging_info fl">
								第<span>1</span>页 ,共<span>2</span>条 ,每页<span>10</span>条
							</div>
							<div class="page_jump fr">
								<span class="pre">上一页</span>
								<span class="this">1</span>
								<span class="next active">下一页</span>
								<lable><input type="text" value="1"></lable>
								<span class="go">跳转</span>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
		<!--团队管理结束-->
		<script src="/Public/Html/lib/jquery.min.js"></script>
		<script src="/Public/Html/js/index.js"></script>
		<script src="/Public/Html/js/index.jjxq.js"></script>
		<script src="/Public/Html/lib/jquery.searchableselect.js"></script>
		<script src="/Public/Html/laydate/laydate.js"></script>
		<script>
			var page = 1,
				lists = 0; //页数，总条数
			var pageClick = false; //是否通过上下页面来获取数据
			var $tbody, $panging_info, $page_jump, request; //表格主体，总页数，上下页，ajax赋值对象

			// 时间戳转化成 2017-6-20 05:06:08
			function stampToDate(sta) {
				var newDate = new Date(parseInt(sta) * 1000);
				return date = newDate.getFullYear() + "-" + (newDate.getMonth() + 1) + "-" + newDate.getDate() + " " + (newDate.getHours() < 10 ? "0" + newDate.getHours() : newDate.getHours()) + ":" + (newDate.getMinutes() < 10 ? "0" + newDate.getMinutes() : newDate.getMinutes()) + ":" + (newDate.getSeconds() < 10 ? "0" + newDate.getSeconds() : newDate.getSeconds());
			}

			//数字转化成 2017-12-12
			function numToDate(num) {
				return num.substr(0, 4) + "-" + num.substr(4, 2) + "-" + num.substr(6, 2);
			}

			//彩种选择
			function changesing() {
				if($(".searchable-select-on .searchable-select-dropdown").hasClass("searchable-select-hide")) {
					var lotterKind = $(".searchable-select-on").siblings(".lotter_list").val();
					var tbhtmlListt = '';
					//console.log("lotterKind=" + lotterKind);
					if(request != null) { request.abort(); }
					request = $.ajax({
						type: "POST",
						url: "<?php echo U('Html/Zbzl/play_way');?>",
						data: "lotterKind=" + lotterKind,
						async: true,
						timeout: 10000,
						success: function(data) {
							for(var i = 0, len = data.length; i < len; i++) {
								tbhtmlListt += '<option value="' +
									data[i].id + '">' +
									data[i].playname + '</option>';
							}
							$(".searchable-select-on").siblings(".palying_meth").html(tbhtmlListt);
							$(".searchable-select-on").siblings(".palying_meth").next(".searchable-select").remove();
							$(".searchable-select-on").siblings(".palying_meth").searchableSelect();
						},
						error: function() {
							tbhtmlListt = '';
							$(".searchable-select-on").siblings(".palying_meth").next(".searchable-select").remove();
							$(".searchable-select-on").siblings(".palying_meth").html(tbhtmlListt);
							$(".searchable-select-on").siblings(".palying_meth").searchableSelect();
						}
					});
					$(".searchable-select-on").removeClass("searchable-select-on");
					return false;
				} else {
					setTimeout("changesing()", 20);
				}

			}

			//ajax结束 更新 表格主体
			function loadend(html) {
				$tbody.html(html);
				$panging_info.find("span").eq(0).text(page);
				$panging_info.find("span").eq(1).text(lists);
				$page_jump.find(".this").text(page);
				if(page > 1) {
					$page_jump.find(".pre").addClass("active");
				} else {
					$page_jump.find(".pre").removeClass("active");
				}
				if(page < Math.ceil(lists / 10)) {
					$page_jump.find(".next").addClass("active");
				} else {
					$page_jump.find(".next").removeClass("active");
				}
				$(".btn_searchclick").removeClass("btn_searchclick");
			}

			$(document).ready(function() {

				//团队统计 图片变量 
				var myChart = echarts.init(document.getElementById('main'));
				var option;

				//绑定点击
				$(".tab_list ul li").click(function() {
					if($(this).hasClass("lottery")) {
						$("#statement .btn_search.lottery").click();
					} else if($(this).hasClass("personal")) {
						$("#statement .btn_search.personal").click();
					} else if($(this).hasClass("profitLoss")) {
						$("#statement .btn_search.profitLoss").click();
					} else if($(this).hasClass("platform")) {
						$("#statement .btn_search.platform").click();
					} else if($(this).hasClass("other")) {
						$("#statement .btn_search.other").click();
					} else if($(this).hasClass("tdtj")) {
						$("#team_ad .btn_search.tdtj").click();
					} else if($(this).hasClass("pegl")) {
						$("#team_ad .btn_search.pegl").click();
					} else if($(this).hasClass("xjgl")) {
						$("#team_ad .btn_search.xjgl").click();
					} else if($(this).hasClass("xjcz")) {
						$("#team_ad .btn_search.xjcz").click();
					} else if($(this).hasClass("xjqk")) {
						$("#team_ad .btn_search.xjqk").click();
					} else if($(this).hasClass("gcjl")) {
						var tbhtmlListt = '';
						var $lotterList = $("#acc_record .btn_search.gcjl").parents(".account_content").find(".lotter_list");
						if(request != null) { request.abort(); }
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/category_list');?>",
							data: '',
							async: true,
							timeout: 10000,
							success: function(data) {
								for(var i = 0, len = data.length; i < len; i++) {
									tbhtmlListt += '<option value="' +
										data[i].id + '">' +
										data[i].catename + '</option>';
								}
								$lotterList.next(".searchable-select").remove();
								$lotterList.html(tbhtmlListt);
								$lotterList.searchableSelect();

								var lotterKind = $lotterList.val();
								var tbhtmlListtt = '';
							//	console.log("lotterKind=" + lotterKind);
								$.ajax({
									type: "POST",
									url: "<?php echo U('Html/Zbzl/play_way');?>",
									data: "lotterKind=" + lotterKind,
									async: true,
									timeout: 10000,
									success: function(data) {
										for(var i = 0, len = data.length; i < len; i++) {
											tbhtmlListtt += '<option value="' +
												data[i].id + '">' +
												data[i].playname + '</option>';
										}
										$lotterList.siblings(".palying_meth").html(tbhtmlListtt);
										$lotterList.siblings(".palying_meth").next().remove();
										$lotterList.siblings(".palying_meth").searchableSelect();
										$("#acc_record .btn_search.gcjl").click();
									},
									error: function() {
										tbhtmlListtt = '';
										$lotterList.siblings(".palying_meth").html(tbhtmlListtt);
										$lotterList.siblings(".palying_meth").next().remove();
										$lotterList.siblings(".palying_meth").searchableSelect();
									}
								});
							},
							error: function() {
								tbhtmlListt = '';
								$lotterList.next(".searchable-select").remove();
								$lotterList.html(tbhtmlListt);
								$lotterList.searchableSelect();
							}
						});
						//	$("#acc_record .btn_search.gcjl").click();
					} else if($(this).hasClass("zhzl")) {
						var tbhtmlListt = '';
						var $lotterList = $("#acc_record .btn_search.zhzl").parents(".account_content").find(".lotter_list");
						if(request != null) { request.abort(); }
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/category_list');?>",
							data: '',
							async: true,
							timeout: 10000,
							success: function(data) {
								for(var i = 0, len = data.length; i < len; i++) {

									tbhtmlListt += '<option value="' +
										data[i].id + '">' +
										data[i].catename + '</option>';
								}
								$lotterList.next(".searchable-select").remove();
								$lotterList.html(tbhtmlListt);
								$lotterList.searchableSelect();

								var lotterKind = $lotterList.val();
								var tbhtmlListtt = '';
							//	console.log("lotterKind=" + lotterKind);
								$.ajax({
									type: "POST",
									url: "<?php echo U('Html/Zbzl/play_way');?>",
									data: "lotterKind=" + lotterKind,
									async: true,
									timeout: 10000,
									success: function(data) {
										for(var i = 0, len = data.length; i < len; i++) {
											tbhtmlListtt += '<option value="' +
												data[i].id + '">' +
												data[i].playname + '</option>';
										}
										$lotterList.siblings(".palying_meth").html(tbhtmlListtt);
										$lotterList.siblings(".palying_meth").next().remove();
										$lotterList.siblings(".palying_meth").searchableSelect();
										$("#acc_record .btn_search.zhzl").click();
									},
									error: function() {
										tbhtmlListtt = '';
										$lotterList.siblings(".palying_meth").html(tbhtmlListtt);
										$lotterList.siblings(".palying_meth").next().remove();
										$lotterList.siblings(".palying_meth").searchableSelect();
									}
								});
							},
							error: function() {
								tbhtmlListt = '';
								$lotterList.next(".searchable-select").remove();
								$lotterList.html(tbhtmlListt);
								$lotterList.searchableSelect();
							}
						});
						//	$("#acc_record .btn_search.zhzl").click();
					} else if($(this).hasClass("zbzl")) {
						$("#acc_record .btn_search.zbzl").click();
					} else if($(this).hasClass("dljl")) {
						$("#acc_record .btn_search.dljl").click();
					} else if($(this).hasClass("czzjl")) {
						$("#acc_record .btn_search.czzjl").click();
					}
				});

				//报表查询
				$(document).on('click', '#statement .btn_search', function() {
					if($(this).hasClass("btn_searchclick")) { return false; } else { $(this).addClass("btn_searchclick"); }
					if(request != null) { request.abort(); }
					var dateMin = Date.parse(new Date($(this).siblings("label").find('[name="date_min"]').val())) / 1000;
					var dateMax = Date.parse(new Date($(this).siblings("label").find('[name="date_max"]').val())) / 1000;
					var tableLen = $(this).parents(".account_content").find("thead th").length;
					$tbody = $(this).parents(".account_content").find("table tbody");
					var tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
					var tbhtmlList = '';
					$panging_info = $(this).parents(".account_content").find(".panging_info");
					$page_jump = $(this).parents(".account_content").find(".page_jump");
					var perOrTeam = $(this).siblings(".shortcut_btn").find(".on").attr("content");
					var userName = $(this).siblings(".userName").val();
					var profSele = $(this).siblings(".searchable-select").find(".searchable-select-item.selected").data("value");
					$tbody.html("<tr><td colspan='" + tableLen + "'>数据加载中 ...</td></tr>");
					page = pageClick ? page : 1;
					lists = 0;
					pageClick = false;

					if($(this).hasClass("lottery")) {
						//console.log("perOrTeam=" + perOrTeam + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Indexpublic/lottery');?>",
							data: "perOrTeam=" + perOrTeam + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											numToDate(data[js].date) + "</td><td>" +
											data[js].Num + "</td><td>" +
											data[js].betMoney + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											data[js].Win_money + "</td><td>" +
											"010" + "</td><td>" +
											data[js].Pro_money +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("personal")) {
						//console.log("dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Indexpublic/personal');?>",
							data: "dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								//console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											numToDate(data[js].date) + "</td><td>" +
											data[js].Recharge_money + "</td><td>" +
											data[js].Withdrawals_money + "</td><td>" +
											data[js].Num + "</td><td>" +
											data[js].backwater_money + "</td><td>" +
											"010" + "</td><td>" +
											data[js].Win_money + "</td><td>" +
											data[js].active_money + "</td><td>" +
											data[js].profitLoss +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("profitLoss")) {
						console.log("use_name=" + userName + "&profSele=" + profSele + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Indexpublic/profitLoss');?>",
							data: "use_name=" + userName + "&profSele=" + profSele + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								//console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											data[js].username + "</td><td>" +
											data[js].Num + "</td><td>" +
											data[js].backwater_money + "</td><td>" +
											"010" + "</td><td>" +
											data[js].Win_money + "</td><td>" +
											data[js].active_money + "</td><td>" +
											data[js].profitLoss + "</td><td>" +
											"<a>转账</a>" +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("platform")) {
						console.log("dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Indexpublic/platform');?>",
							data: "dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											data[js].username + "</td><td>" +
											data[js].Win_money + "</td><td>" +
											data[js].win_numb + "</td><td>" +
											data[js].run_money + "</td><td>" +
											data[js].run_numb + "</td><td>" +
											data[js].active_money + "</td><td>" +
											data[js].active_numb +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("other")) {
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Indexpublic/other');?>",
							data: "perOrTeam=" + perOrTeam + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											numToDate(data[js].date) + "</td><td>" +
											data[js].Num + "</td><td>" +
											"0" + "</td><td>" +
											"0" + "</td><td>" +
											data[js].Win_money + "</td><td>" +
											data[js].active_money + "</td><td>" +
											data[js].Pro_money +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					}

				});

				//团队管理
				$(document).on('click', '#team_ad .btn_search', function() {
					if($(this).hasClass("btn_searchclick")) { return false; } else { $(this).addClass("btn_searchclick"); }
					if(request != null) { request.abort(); }
					var dateMin = Date.parse(new Date($(this).siblings("label").find('[name="date_min"]').val())) / 1000;
					var dateMax = Date.parse(new Date($(this).siblings("label").find('[name="date_max"]').val())) / 1000;
					var tableLen = $(this).parents(".account_content").find("thead th").length;
					$tbody = $(this).parents(".account_content").find("table tbody");
					var tbhtml = "<tr><td colspan='" + $(this).parents(".account_content").find("thead th").length + "'>暂无数据</td></tr>";
					var tbhtmlList = '';
					$panging_info = $(this).parents(".account_content").find(".panging_info");
					$page_jump = $(this).parents(".account_content").find(".page_jump");
					var $next = $(this).parents(".account_content").find(".page_jump .next");
					var userName = $(this).parent().find(".userName").val();
					if($("#team_ad .tab_list ul .khzx").hasClass("active")) {
						$(".btn_searchclick").removeClass("btn_searchclick");
					} else {
						$tbody.html("<tr><td colspan='" + tableLen + "'>数据加载中 ...</td></tr>");
					}
					page = pageClick ? page : 1;
					lists = 0;
					pageClick = false;

					if($(this).hasClass("tdtj")) {
						console.log("dateMin=" + dateMin + "&dateMax=" + dateMax);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Tdgl/tdtj');?>",
							data: "dateMin=" + dateMin + "&dateMax=" + dateMax,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								var $teamLi = $("#team_ad .account_content .team_ad_ultab li");
								$teamLi.eq(0).text("团队人数: " + data.up.team_num);
								$teamLi.eq(1).text("在线人数: " + data.up.online);
								$teamLi.eq(2).text("今日注册: " + (data.up.toadayZCL ? data.up.toadayZCL : 0));
								$teamLi.eq(3).text("团队余额: " + data.up.team_money);
								$teamLi.eq(4).text("今日充值: " + (data.up.todayCZ ? data.up.todayCZ : 0));
								$teamLi.eq(5).text("今日取款: " + (data.up.toadayQK ? data.up.toadayQK : 0));
								var $teamLi = $("#team_ad .team_ad_chart li");
								$teamLi.eq(0).html("<span>转入</span><span>￥" + "010" + "</span>");
								$teamLi.eq(1).html("<span>转出</span><span>￥" + "010" + "</span>");
								$teamLi.eq(2).html("<span>投注量</span><span>￥" + data[0].num_money + "</span>");
								$teamLi.eq(3).html("<span>返点量</span><span>￥" + data[0].backwater_money + "</span>");
								$teamLi.eq(4).html("<span>活动奖励</span><span>￥" + data[0].active_money + "</span>");
								$teamLi.eq(5).html("<span>实际盈亏</span><span>￥" + data[0].betMoney + "</span>");

								option = {
									tooltip: { trigger: 'axis' },
									legend: {
										data: ['转入', '转出', '投注量', '返点量', '活动奖励', '实际盈亏']
									},
									toolbox: { show: true, feature: { mark: { show: true }, dataView: { show: true, readOnly: false }, magicType: { show: true, type: ['#f00', '#0f0', '#00f', '#ff0', '#0ff', '#f0f'] }, restore: { show: true }, saveAsImage: { show: true } } },
									calculable: true,
									xAxis: [{
										type: 'category',
										boundaryGap: false,
										data: ['周一', '周一']
									}],
									yAxis: [{ type: 'value' }],
									series: [{
											name: '转入',
											type: 'line',
											stack: '总量',
											data: [0, 0]
										},
										{
											name: '转出',
											type: 'line',
											stack: '总量',
											data: [0, 0]
										},
										{
											name: '投注量',
											type: 'line',
											stack: '总量',
											data: [data[0].num_money, data[0].num_money]
										},
										{
											name: '返点量',
											type: 'line',
											stack: '总量',
											data: [data[0].backwater_money, data[0].backwater_money]
										},
										{
											name: '活动奖励',
											type: 'line',
											stack: '总量',
											data: [data[0].active_money, data[0].active_money]
										},
										{
											name: '实际盈亏',
											type: 'line',
											stack: '总量',
											data: [data[0].betMoney, data[0].betMoney]
										}
									]
								};
								myChart.setOption(option);
								$(".btn_searchclick").removeClass("btn_searchclick");
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								console.log("错误");
								$(".btn_searchclick").removeClass("btn_searchclick");
							}
						});
					} else if($(this).hasClass("pegl")) {
						console.log("use_name=" + userName + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Tdgl/pegl');?>",
							data: "use_name=" + userName + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											numToDate(data[js].date) + "</td><td>" +
											data[js].username + "</td><td>" +
											data[js].backwater_money + "</td><td>" +
											"010" + "</td><td>" +
											data[js].money +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("xjgl")) {
						var balanceMin = $(this).siblings(".balanceMin").val();
						var balanceMax = $(this).siblings(".balanceMax").val();
						var rebatesMin = $(this).siblings(".rebatesMin").val();
						var rebatesMax = $(this).siblings(".rebatesMax").val();
						var useType = $(this).parent().find(".useType").val();
						var online = $(this).parent().find(".online").val();
						var junior = $(this).parent().find(".junior").val();
						var AccordType = $(this).parent().find(".AccordType").val();
						var AccordSequence = $(this).parent().find(".AccordSequence").val();
						console.log("use_name=" + userName + "&balanceMin=" + balanceMin + "&balanceMax=" + balanceMax + "&rebatesMin=" + rebatesMin + "&rebatesMax=" + rebatesMax + "&useType=" + useType + "&online=" + online + "&junior=" + junior + "&AccordType=" + AccordType + "&AccordSequence=" + AccordSequence + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Tdgl/xjgl');?>",
							data: "use_name=" + userName + "&balanceMin=" + balanceMin + "&balanceMax=" + balanceMax + "&rebatesMin=" + rebatesMin + "&rebatesMax=" + rebatesMax + "&useType=" + useType + "&online=" + online + "&junior=" + junior + "&AccordType=" + AccordType + "&AccordSequence=" + AccordSequence + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											data[js].username + "</td><td>" +
											data[js].remark + "</td><td>" +
											data[js].backwater_money + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											data[js].registertime + "</td><td>" +
											"010" + "</td><td>" +
											"010" +
											"</td></tr>";
									}

								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("xjcz")) {
						console.log("use_name=" + userName + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Tdgl/xjcz');?>",
							data: "use_name=" + userName + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											data[js].username + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											data[js].money + "</td><td>" +
											"010" + "</td><td>" +
											stampToDate(data[js].time) + "</td><td>" +
											data[js].remark + "</td><td>" +
											"010" +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("xjqk")) {
						console.log("use_name=" + userName + "&dateMin=" + dateMin + "&dateMax=" + dateMax);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Tdgl/xjqk');?>",
							data: "use_name=" + userName + "&dateMin=" + dateMin + "&dateMax=" + dateMax,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											data[js].username + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											data[js].money + "</td><td>" +
											stampToDate(data[js].time) + "</td><td>" +
											data[js].remark + "</td><td>" +
											"010" +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					}

				});

				//帐变记录
				$(document).on('click', '#acc_record .btn_search', function() {
					if($(this).hasClass("btn_searchclick")) { return false; } else { $(this).addClass("btn_searchclick"); }
					if(request != null) { request.abort(); }
					var dateMin = Date.parse(new Date($(this).parents(".account_content").find('[name="date_min"]').val())) / 1000;
					var dateMax = Date.parse(new Date($(this).parents(".account_content").find('[name="date_max"]').val())) / 1000;
					var tableLen = $(this).parents(".account_content").find("thead th").length;
					$tbody = $(this).parents(".account_content").find("table tbody");
					var tbhtml = "<tr><td colspan='" + $(this).parents(".account_content").find("thead th").length + "'>暂无数据</td></tr>";
					var tbhtmlList = '';
					$panging_info = $(this).parents(".account_content").find(".panging_info");
					$page_jump = $(this).parents(".account_content").find(".page_jump");
					var userName = $(this).parents(".account_content").find(".userName").val();
					$tbody.html("<tr><td colspan='" + tableLen + "'>数据加载中 ...</td></tr>");
					page = pageClick ? page : 1;
					lists = 0;
					pageClick = false;

					if($(this).hasClass("gcjl")) {
						var lotterKind = $(this).parents(".search_date").find(".lotter_list").val();
						var palyingMeth = $(this).parents(".search_date").find(".palying_meth").val();
						var lotAll = $(this).parents(".search_date").find(".lot_all .on").text();
						console.log("lotterKind=" + lotterKind + "&palyingMeth=" + palyingMeth + "&lotAll=" + lotAll + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/gcjl');?>",
							data: "lotterKind=" + lotterKind + "&palyingMeth=" + palyingMeth + "&lotAll=" + lotAll + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											data[js].username + "</td><td>" +
											stampToDate(data[js].time) + "</td><td>" +
											data[js].catename + "</td><td>" +
											data[js].issue + "</td><td>" +
											data[js].play_way_id + "</td><td>" +
											data[js].content + "</td><td>" +
											data[js].money + "</td><td>" +
											data[js].status + "</td><td>" +
											data[js].profitLoss +
											"</td></tr>";
									}
								}

								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("zhzl")) {
						var lotterKind = $(this).parents(".search_date").find(".lotterKind").val();
						var palyingMeth = $(this).parents(".search_date").find(".palying_meth").val();
						var lotAll = $(this).parents(".search_date").find(".lot_all .on").text();
						console.log("use_name=" + userName + "&lotterKind=" + lotterKind + "&palyingMeth=" + palyingMeth + "&lotAll=" + lotAll + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/zhzl');?>",
							data: "use_name=" + userName + "&lotterKind=" + lotterKind + "&palyingMeth=" + palyingMeth + "&lotAll=" + lotAll + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											stampToDate(data[js].time) + "</td><td>" +
											data[js].category_id + "</td><td>" +
											data[js].play_way_id + "</td><td>" +
											data[js].firsissue + "</td><td>" +
											data[js].issue + "</td><td>" +
											"010" + "</td><td>" +
											data[js].content + "</td><td>" +
											data[js].money + "</td><td>" +
											data[js].if_stop_chase + "</td><td>" +
											data[js].status + "</td><td>" +
											data[js].profitLoss +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("zbzl")) {
						var lotAll = $(this).parents(".search_date").find(".lot_all .on").text();
						var shortHandle = $(this).parents(".search_date").find(".short_handle ul .on").val();
						console.log("use_name=" + userName + "&lotAll=" + lotAll + "&shortHandle=" + shortHandle + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/zbzl');?>",
							data: "use_name=" + userName + "&lotAll=" + lotAll + "&shortHandle=" + shortHandle + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											stampToDate(data[js].time) + "</td><td>" +
											data[js].username + "</td><td>" +
											data[js].type + "</td><td>" +
											data[js].money + "</td><td>" +
											"010" + "</td><td>" +
											data[js].category_id + "</td><td>" +
											data[js].remark +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("dljl")) {
						console.log("dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/dljl');?>",
							data: "dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											numToDate(data[js].date) + "</td><td>" +
											data[js].type + "</td><td>" +
											data[js].money + "</td><td>" +
											data[js].addtime + "</td><td>" +
											data[js].status +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					} else if($(this).hasClass("czzjl")) {
						var payRecord = $(this).parents(".account_content").find(".pay_record .on").text();
						console.log("payRecord=" + payRecord + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page);
						request = $.ajax({
							type: "POST",
							url: "<?php echo U('Html/Zbzl/czzj');?>",
							data: "payRecord=" + payRecord + "&dateMin=" + dateMin + "&dateMax=" + dateMax + "&page=" + page,
							async: true,
							timeout: 10000,
							success: function(data) {
								console.log(data);
								tbhtml = '';
								for(var js in data) {
									if(js == "count") {
										lists = data[js];
									} else {
										tbhtmlList += "<tr><td>" +
											stampToDate(data[js].time) + "</td><td>" +
											"010" + "</td><td>" +
											data[js].username + "</td><td>" +
											data[js].bank + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											"010" + "</td><td>" +
											data[js].remark +
											"</td></tr>";
									}
								}
								if(!tbhtmlList.length) {
									tbhtml = "<tr><td colspan='" + tableLen + "'>暂无数据</td></tr>";
								} else {
									tbhtml = tbhtmlList;
								}
								loadend(tbhtml);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								if(textStatus == "timeout") { tbhtml = "<tr><td colspan='" + tableLen + "'>查询超时  请重试</td></tr>"; } else {
									tbhtml = "<tr><td colspan='" + tableLen + "'>查询错误</td></tr>";
								}
								loadend(tbhtml);
							}
						});
					}

				});

				//彩种选择
				$(document).on('click', '.lotter_list + .searchable-select', function() {
					$(this).addClass("searchable-select-on");
					changesing();
				});

				//上一页
				$(document).on("click", ".page_jump .pre", function() {
					pageClick = true;
					page = parseInt($(this).siblings(".this").text());
					if(page < 2) { return false; } else {
						page--;
						$(this).parents(".account_content").find(".btn_search").click();
					}
				});

				//下一页
				$(document).on("click", ".page_jump .next", function() {
					pageClick = true;
					page = parseInt($(this).siblings(".this").text());
					if(page >= Math.ceil(lists / 10)) { return false; } else {
						page++;
						$(this).parents(".account_content").find(".btn_search").click();
					}
				});

				//跳到第几页
				$(document).on("click", ".page_jump .go", function() {
					pageClick = true;
					page = parseInt($(this).siblings("lable").find("input").val());
					if(page > Math.ceil(lists / 10)) { page = Math.ceil(lists / 10); } else if(page < 1) { page = 1; }
					$(this).siblings("lable").find("input").val(page);
					if(parseInt($(this).siblings(".this").text()) == page) { return false; } else { $(this).parents(".account_content").find(".btn_search").click(); }
				});

			});

			$(document).on('click', '.page_submit', function() {
				$.ajax({
					type: "POST",
					url: "<?php echo U('Html/User/loginLog');?>",
					data: $('#loginLog111').serialize(),
					async: false,
					success: function(data) {
						$('#page_log').html(data)
					}
				});
			});
			$(document).on('click', '.btn_bind_bank', function() {
				$.ajax({
					type: "POST",
					url: '<?php echo U("Html/User/bind_blank");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						$('#withdraw_bank').html(data)
					}
				});
			});
			$(document).on('click', '.user-bank-list .binding_blank', function() {
				$('#withdraw_bank2').show();
				$('#menu-user-bank').hide();

				$.ajax({
					type: "POST",
					url: '<?php echo U("Html/User/userBlank_info1");?>',
					data: 'blank' + '=' + 1,
					async: false,
					success: function(data) {
						$('#withdraw_bank2').html(data)
					}
				});
			});
			$(document).on('click', '#withdraw_bank2 .go_back', function() {
				$('#withdraw_bank2').hide();
				$('#menu-user-bank').show();

			});
			$(document).on('click', '.btn_set_qq', function() {
				$.ajax({
					type: "POST",
					url: '<?php echo U("Html/User/apperQQ");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						$('#apper_qq_form').html(data)
					}
				});
			});
			$(document).on('click', '.btn_set_email', function() {
				$.ajax({
					type: "POST",
					url: '<?php echo U("Html/User/appearEmail");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						$('#bd_email').html(data)
					}
				});
			});
			$(document).on('click', '.btn_bind_phone', function() {
				$.ajax({
					type: "POST",
					url: '<?php echo U("Html/User/appearIphone");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						$('#iphone_show').html(data)
					}
				});
			});

			$('.top_tip dl dd a').click(function() {

				switch($(this).data("id")) {
					case 'a_dljr':
						$('#user_manage').show();
						$('#user_manage .tab_list li:nth-child(7)').click();
						var form_sz = $('#user_manage').find('.account_content').eq(6).find('form').serialize();
						$('#user_manage').find('.account_content').eq(6).find('.page_submit').click();
						break;
					case 'a_wdxx':
						$('#user_manage').show();
						$('#user_manage .tab_list li:nth-child(1)').click();
						$.ajax({
							cache: true,
							type: "POST",
							url: '<?php echo U("Html/User/myInfo");?>',
							data: 'id' + '=' + 1,
							async: false,
							success: function(data) {
								$('#my_information').html(data)
							}
						});
						break;
					case 'a_aqzx':
						$('#user_manage').show();
						$('#user_manage .tab_list li:nth-child(2)').click();
						$.ajax({
							cache: true,
							type: "POST",
							url: '<?php echo U("Html/User/safe_core");?>',
							data: 'id' + '=' + 1,
							async: false,
							success: function(data) {
								$('#security_level').html(data)
							}
						});
						break;
					case 'a_xgmm':
						$('#user_manage').show();
						$('#user_manage .tab_list li:nth-child(3)').click();
						$.ajax({
							cache: true,
							type: "POST",
							url: '<?php echo U("Html/User/editPassword");?>',
							data: 'id' + '=' + 1,
							async: false,
							success: function(data) {
								$('#set-password-warp').html(data)
							}
						});
						break;

					case 'd_khzx':
						$('#team_ad').show();
						$('#team_ad .tab_list li:nth-child(2)').click();
						$.ajax({
							cache: true,
							type: "POST",
							url: '<?php echo U("Html/TeamManagement/openAccount_center");?>',
							data: 'id' + '=' + 1,
							async: false,
							success: function(data) {
								$('#team_ad_list').html(data)
							}
						});
						break;

					case 'a_yhzl':
						$('#user_manage').show();
						$('#user_manage .tab_list li:nth-child(4)').click();
						$.ajax({
							cache: true,
							type: "POST",
							url: '<?php echo U("Html/User/userBlank_info");?>',
							data: 'id' + '=' + 1,
							async: false,
							success: function(data) {
								$('#menu-user-bank').html(data)
							}
						});
						break;

				}
			})
			$('#user_manage .tab_list li:nth-child(4)').click(function() {
				$.ajax({
					cache: true,
					type: "POST",
					url: '<?php echo U("Html/User/userBlank_info");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						$('#menu-user-bank').html(data)
					}
				});
			})
			$('#user_manage .tab_list li:nth-child(7)').click(function() {
				$('#user_manage').find('.account_content').eq(6).find('.page_submit').click();
			})
			$('#user_manage .tab_list li:nth-child(1)').click(function() {
				$.ajax({
					cache: true,
					type: "POST",
					url: '<?php echo U("Html/User/myInfo");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						console.log(data);
						$('#my_information').html(data)
					}
				});
			})
			$('#user_manage .tab_list li:nth-child(2)').click(function() {
				$.ajax({
					cache: true,
					type: "POST",
					url: '<?php echo U("Html/User/safe_core");?>',
					data: 'id' + '=' + 1,
					async: false,
					success: function(data) {
						$('#security_level').html(data)
					}
				});
			})
			$('#user_manage .tab_list li:nth-child(3)').click();
			$.ajax({
				cache: true,
				type: "POST",
				url: '<?php echo U("Html/User/editPassword");?>',
				data: 'id' + '=' + 1,
				async: false,
				success: function(data) {
					$('#set-password-warp').html(data)
				}
			});
			$('#team_ad .tab_list li:nth-child(2)').click();
			$.ajax({
				cache: true,
				type: "POST",
				url: '<?php echo U("Html/TeamManagement/openAccount_center");?>',
				data: 'id' + '=' + 1,
				async: false,
				success: function(data) {
					$('#team_ad_list').html(data)
				}
			});
			//添加新链接
			$('.team_ad_listf input[type=submit]').click(function() {
				var ad_bu = $('.team_ad_listf input[type=submit]');
				var ad_li = $('.team_ad_listf .shortcut_btn li.on').html();
				var ad_in1 = $(".team_ad_listf input[name='remarks']").val();
				var ad_in2 = Math.floor($(".team_ad_listf input[name='high']").val() * 1000) / 1000;
				var ad_in3 = Math.floor($(".team_ad_listf input[name='low']").val() * 1000) / 1000;
				if(!(ad_in2 >= 6) || !(ad_in2 <= 8.5)) {
					alert('高频彩返点设置范围：6.000 ~ 8.500');
				} else if(!(ad_in3 >= 5.5) || !(ad_in3 <= 6.5)) {
					alert('低频彩返点设置范围：5.500 ~ 6.500')
				} else {
					ad_bu.parents('.team_ad_listf').hide();
					ad_bu.parents('.team_ad_listf').siblings().show();
					ad_bu.parents('.account_content').css({ 'background': '#fff' })
					$.ajax({
						cache: true,
						type: "POST",
						url: '<?php echo U("Html/TeamManagement/addNewUrl");?>',
						data: { 'ad_li': ad_li, 'remarks': ad_in1, 'high': ad_in2, 'low': ad_in3 },
						async: false,
						success: function(data) {
							ad_bu.parents('.team_ad_listf').hide();
							ad_bu.parents('.team_ad_listf').siblings().show();
							ad_bu.parents('.account_content').css({ 'background': '#fff' })
							alert('添加成功');
							$('.team_ad_listf input[type="text"]').val('')
							$("#ad_open").html(data);
						}
					});

				}

			})
			$(document).on('click', '#page_log .page_jump .active', function() {
				var page_s = $(this).parents('.page_jump').siblings('.panging_info').children('span:nth-child(1)').html();
				var page_i = $(this).html();
				var page_f = $(this).parents('.message_wrap').find('form').serialize();
				$.ajax({
					cache: true,
					type: "POST",
					url: '<?php echo U("Html/User/loginPage");?>',
					async: false,
					data: 'page_s' + '=' + page_s + '&' + 'page_i' + '=' + page_i + '&' + 'jump' + '=' + 0 + '&' + page_f,
					success: function(data) {
						$('#page_log').html(data)
					}
				});
			});
			$(document).on('click', '#page_log  .page_jump .go', function() {
				var page_s = $(this).parents('.page_jump').siblings('.panging_info').children('span:nth-child(1)').html();
				var page_i = $(this).siblings('lable').children('input').val();
				var page_f = $(this).parents('.message_wrap').find('form').serialize();
				$.ajax({
					cache: true,
					type: "POST",
					url: '<?php echo U("Html/User/loginPage");?>',
					data: 'page_s' + '=' + page_s + '&' + 'page_i' + '=' + page_i + '&' + 'jump' + '=' + 1 + '&' + page_f,
					async: false,
					success: function(data) {
						$('#page_log').html(data)
					}
				});
			});
			//money
			$(document).on('click', '#money', function() {
				var money = $(this).children('span').html();
				$.ajax({
					cache: true,
					type: "POST",
					url: '<?php echo U("Html/User/refreshMoney");?>',
					data: { 'money': money },
					async: false,
					timeout: 9000,
					dataType: 'json',
					success: function(data) {
						//                    alert(data.money);
						$('#money span').html(data.money);
					}
				});
			});
		</script>
		<script>
			// 充值页面
			// 光速充值
			// 判断输入金额是否为大于50的数字
			$(document).on('input', '#credit', function() {
				var money = $(this).val();
				if(isNaN(Number(money))) {
					$('.recharge_form .vel_money').html('请输入数字且大于50的金额').css('color', '#FF0000');
				} else {
					if(Number(money) < 50) {
						$('.recharge_form .vel_money').html('请输入大于50的金额').css('color', '#FF0000');
					} else {
						$('.recharge_form .vel_money').html(" ");
					}
				}
			})
			// 光速充值 立即充值
			$(document).on('click', '.recharge_form .submit_deposit', function() {
				// 获取表单数据
				var bank = $('.recharge_form input[name="account_id"]:checked').val();
				var money = $('.recharge_form #credit').val();
				if(money == '') {
					alert('请输入充值的金额');

				} else if(!isNaN(Number(money)) && parseInt(money) > 50) {
					$.ajax({
						cache: false,
						type: "post",
						url: '<?php echo U("Html/Recharge/speed_recharge");?>',
						data: { bank, money },
						dataType: 'json',
						success: function(resdata) {
							console.log(resdata);
						}
					})
				}
			});
			// 点击充值子菜单
			$(".tab_list ul li").click(function() {
				if($(this).hasClass("zhtk")) {
					var sub_in = $(this).index();
					$(this).addClass("active").siblings().removeClass("active");
					$("#recharge .account_content").eq(sub_in).addClass("active").siblings().removeClass("active");
					// 点击账户提款
					if($(this).index() == 3) {
						// 发送请求
						accountWithInfo();
					}
				}
			});
			// 点击 提现 按钮 发送请求
			$('.payhover1').click(function(){
				accountWithInfo();			
			})
			// 银行卡 号截取
			function replaceChars(num) {
				return num.substring(0, 3) + "***" + num.substring(num.length - 3, num.length);
			}
			// 获取账户提款模块信息
			function accountWithInfo() {
				$.get('<?php echo U("Html/Recharge/user_Withdrawals");?>', function(resdata) {
					$('#zhtk_content tbody tr  td:first span').html(resdata.balance);
					$('#zhtk_content tbody tr td:nth-child(2) span').html(resdata.remainingTimes);
					var innerHTML = '';
					var count = 0;
					for(i in resdata) {			
						count++;
						if(i == 'balance' || i =='remainingTimes') {
							break;
						}else{
							innerHTML += '<div class="item ite" data-id="' + resdata[i].unmb_id + '"><i></i><span>' + resdata[i].choice_bank +
							'</span><span>' + replaceChars(resdata[i].choice_numb) + '</span></div>';
						}						
					}
					if(count <=5) {
						innerHTML += '<div id="btn_bank_card" class="ite"><i></i>绑定银行卡</div>'
					}
					$('#zhtk_content #withdraw_bank_list').html(innerHTML);
					$('#zhtk_content #withdraw_bank_list .item:first').addClass('active_bank');
				})
			}
			// 选择银行卡的添加样式
			$('#recharge .drawings_form').on('click', '.item', function() {
				$(this).siblings().removeClass('active_bank');
				$(this).addClass('active_bank');
			});

			// 取款金额是否输入
			$('.drawings_form').on('input', '#withdrawing', function() {
				var money = $(this).val();
				if(money == '' || isNaN(Number(money)) || Number(money) < 100) {
					$(this).parent().siblings('.tip').children('span.vel_money').html('提款金额不能为空且金额为大于'+'<?php $res=M("setting")->where("id=7")->find(); if(7==5){ echo count(explode(",",$res["setting_value"])); }else{ echo $res["setting_value"]; }?>'+'的数字').css('color', '#FF0000');
				} else {
					$(this).parent().siblings('.tip').children('span.vel_money').html('');
				}
			});

			// 资金密码是否输入
			$('.drawings_form').on('input', '#capital_pwd', function() {
				var password = $(this).val();
				if(password == '') {
					$(this).parent().siblings('.tip').children('span').html('资金密码不能为空').css('color', '#FF0000');
				} else {
					$(this).parent().siblings('.tip').children('span').html('');
				}
			})

			// 点击账户提款 立即充值 
			$('.drawings_form .submit_deposit').click(function() {
				var money = $('#withdrawing').val();
				var password = $('#capital_pwd').val();
				var unmb_id = $('#zhtk_content #withdraw_bank_list .item.active_bank').data('id');
				if(money == '' || isNaN(Number(money)) || Number(money) < 100) {
					$('#withdrawing').parent().siblings('.tip').children('span.vel_money').html('提款金额不能为空且金额为大于100的数字').css('color', '#FF0000');
					return;
				}
				if(password == '') {
					//资金密码未输入
					$('#capital_pwd').parent().siblings('.tip').children('span').html('资金密码不能为空').css('color', '#FF0000');
					return;
				}
				var remainingTimes = $('#zhtk_content tbody tr td:nth-child(2) span').html();
				if(remainingTimes <= 0) {
					alert('今日提款次数耗尽');
					return;
				}
				var balance = $('#zhtk_content tbody tr  td:first span').text();
				var remainingTimes = $('#zhtk_content tbody tr td:nth-child(2) span').text();

				if(Number(money) < Number(balance)) {
					$('#withdrawing').parent().siblings('.tip').children('span.vel_money').html('提款金额不能超过账户额度').css('color', '#FF0000');
					return;
				}
				if(remainingTimes <= 0) {
					alert('今日可提款次数不足');
					return;
				}
				// 表单验证通过发送请求
				var data = {
					money,
					password,
					unmb_id
				}
				$.ajax({
					cache: false,
					type: "post",
					url: '<?php echo U("Html/Recharge/userWithdrawals");?>',
					data: data,
					dataType: 'json',
					success: function(resdata) {
						console.log(resdata);
						if(resdata.state == 5) {
							// 资金密码错误
							alert(resdata.info);
						}
						if(resdata.state == 2) {
							// 提现失败
							alert(resdata.info);
						}
						if(resdata.state == 1) {
							// 提现成功
							alert(resdata.info);
							// 刷新页面
							accountWithInfo();
						}
						if(resdata.state ==4){
							alert(resdata.info);							
						}
						if(resdata.state == 6) {
							// 资金密码错误超过五次 退出登录
							$('body div').remove();
							$('body').prepend('<div id="ym_login"></div>')
							$('#ym_login').load('/html/index/login.html');
						}
					}
				})
			})
			// 添加银行卡
			$('.bank_drawings_form .submit_deposit').on('click', function() {
				console.log($('.bank_drawings_form').serialize())
				$.ajax({
					type: "POST",
					url: "<?php echo U('Html/User/blank_info_add');?>",
					data: $('.bank_drawings_form').serialize(),
					async: false,
					dataType: 'json',
					success: function(data) {
						
						if(data.state == 0) {
							alert('银行重复');
						}
						if(data.state == 1) {
							
							alert('请输入开户银行地址');
						}
						if(data.state == 2) {
							alert('请输入开户名');
						}
						if(data.state == 3) {
							alert('请输入银行卡号');
						}
						if(data.state == 4) {
							alert('请输入资金密码');
						}

						if(data.state == 19) {
							alert('开户名不存在')
						}
						if(data.message != '' && data.state == 5) {
							alert(data.message);
						}
						if(data.state == 6) {
							//                            alert('sss');
							$.ajax({
								type: "POST",
								url: "<?php echo U('Html/Index/logout');?>",
								data: { 'status': 1 },
								async: false,
								dataType: 'json',
								success: function(data) {
									if(data.state == 1) {
										//                                        alert('退出成功！');
										login(false);
									}

								}
							});
						}
						if(data.state == 7) {
							alert('添加成功');
							//$(".bind_card_show2").hide().siblings('.menu-user-bank').show();
							$(".bind_card_show2").hide();
							$.ajax({
								cache: true,
								type: "POST",
								url: "<?php echo U('Html/User/userBlank_info');?>",
								data: 'id' + '=' + 1,
								async: false,
								success: function(data) {
									$('#menu-user-bank').html(data)
									$(".menu-user-bank").show();

								}
							});
						}
					}
				});
			})
		</script>

	</body>

</html>