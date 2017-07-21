// 加减删除
$(".plus").click(function() {
	$(this).next().val(parseInt($(this).next().val()) + 1);
	return false;
})
$(".minus").click(function() {
	$(this).prev().val(parseInt($(this).prev().val()) - 1);
	if($(this).prev().val() <= 1) {
		$(this).prev().val(1)
	}
	return false;
})
$(".delete").click(function() {
	$(".jspcontainer").empty();
})
$(".jspcontainer tr td:last-child").click(function() {
	$(this).parents('tr:first').remove();
})
// 左导航倒计时
//window.jQuery(function ($) {
//	"use strict";
//
//	$('.alt-2').countDown({
//		css_class: 'countdown-alt-2'
//	});
//
//});
// 左导航倒计时结束

// 右侧ssc倒计时
/*$(document).ready(function() {

	$("#countdown_knob").countdown(
		{
			skin: 'knob',
			option:{
					global:{thickness:0.12},
					day:{thickness:0.12},
					hour:{thickness:0.12},
					second:{thickness:0.12}
			},
			datePicker:'03/22/2017 11:01:30',
			dateEnd:'03/15/2018 18:01:30',
			dateStart:'03/15/2016 8:01:30',
			format:true,
			callback:function(){alert('Knob Ready')}
		},
		{
			timezone:true,
			offset:3
		}
	);
});*/
// 右侧ssc倒计时

function tzjl() {
	$('.jiluxx').removeClass('on');
	$('.tzjl').addClass('on');
	$('.tb_list').hide();
	$('.tb_list1').show();
}

function zhjl() {
	$('.jiluxx').removeClass('on');
	$('.zhjl').addClass('on');
	$('.tb_list').hide();
	$('.tb_list2').show();
}

function kjjl() {
	$('.jiluxx').removeClass('on');
	$('.kjjl').addClass('on');
	$('.tb_list').hide();
	$('.tb_list3').show();
	list3Data();
}

$(function() {
	//Tabs 

	//	$(document).on('click', '.tzjl', function() {
	//		$('.jiluxx').removeClass('on');
	//		$('.tzjl').addClass('on');
	//		$('.tb_list').hide();
	//		$('.tb_list1').show();
	//		return false;
	//	});
	//
	//	$(document).on('click', '.zhjl', function() {
	//		$('.jiluxx').removeClass('on');
	//		$('.zhjl').addClass('on');
	//		$('.tb_list').hide();
	//		$('.tb_list2').show();
	//		return false;
	//	});
	//	$(document).on('click', '.kjjl', function() {
	//		$('.jiluxx').removeClass('on');
	//		$('.kjjl').addClass('on');
	//		$('.tb_list').hide();
	//		$('.tb_list3').show();
	//		return false;
	//	});
		// 订单弹窗
		$(".state_close").click(function() {
			$("#recharge2").hide();
			return false;
		});

		function modeSelection(value) {
			var mode = '';
			if(value == 1) {
				mode = '元';
			} else if(value == 2) {
				mode = '角';
			} else if(value == 3) {
				mode = '分';
			} else {
				mode = '厘';
			}
			return mode;
		}
		$('.tzjilu ul').on('click', 'li', function() {
			var id = $(this).data(id);
			// 期号
			var expect = $(this).children().eq(1).text();
			// 彩种名称
			var catename = $(this).children().eq(0).text();
			// 内容
			var content = $(this).children().eq(2).text();
			// 盈亏
			var profitLoss = $(this).children().eq(3).text();
			$.ajax({
				type: "post",
				data: { id: id.id, expect: expect },
				//	url: "TogetherBuy/getbetrecord",
				url: "/Html/TogetherBuy/getbetrecord",
				async: true,
				success: function(data) {
					//console.log(data);
					var status;
					if(data.status == 1) {
						status = "正常";
					} else if(data.status == 2) {
						status = "中奖 ";
					} else if(data.status == 3) {
						status = "未中奖";
					} else {
						status = "撤单";
					}
					var mode = modeSelection(data.mode);
					var innerhtml = '<td id="' + data.id + '">' + data.orderNum + '</td><td>' + data.opencode + '</td><td>' + data.money + '</td><td>' + data.winning_money +
						'</td><td>' + data.profitLoss + '</td><td>' + status + '</td>'
					$('#recharge2 table tbody tr').html(innerhtml);
					$('#recharge2 .jiluinfo ul li em').eq(0).attr('category_id', data.category_id);
					$('#recharge2 .jiluinfo ul li em').eq(0).html(catename);
					$('#recharge2 .jiluinfo ul li em').eq(1).html(data.playname);
					$('#recharge2 .jiluinfo ul li em').eq(2).html(data.issue);
					$('#recharge2 .jiluinfo ul li em').eq(3).html(data.time);
					$('#recharge2 .jiluinfo ul li em').eq(4).html(data.nums);
					// 返点金额
					//	$('#recharge2 .jiluinfo ul li em').eq(5).html();
					$('#recharge2 .jiluinfo ul li em').eq(6).html(data.times);
					// 中奖注树
					//$('#recharge2 .jiluinfo ul li em').eq(7).html();			
					$('#recharge2 .jiluinfo ul li em').eq(8).html(mode);
					// 单注奖金
					// $('#recharge2 .jiluinfo ul li em').eq(9).html();
					$('#recharge2 .jiluhaoma dt').html(data.content);
					$("#recharge2").show();
				}

			});
			return false;
		});

		// 订单列表
		$('#recharge2 .btnbox2 a').click(function() {
			if($(this).index() == 0) {
				//关闭弹出层
				$('#recharge2').hide();
			} else if($(this).index() == 1) {
				// 跳转到合买弹出层
				$('#chipped_modal').show();
				var flag = true;
				$('.select_group .count').click(function(e) {
					e.stopPropagation();
					if(flag) {
						$(this).siblings('.sel_opt').show();
					} else {
						$(this).siblings('.sel_opt').hide();
					}
					flag = !flag;
				});
				$('.sel_opt div').hover(function() {
					$(this).siblings().removeClass('act');
					$(this).addClass('act')
				});
				$('.sel_opt div').click(function() {
					$('.select_group .count').text($(this).text());
					$(this).parent().hide();
				});
				$(document).click(function() {

					$('.sel_opt').hide();
				});
			} else {
				// 撤销订单	
			}
		});

		$('#chipped_modal .chipped_pop_cloes').click(function() {
			$('#chipped_modal').hide();
		});
		$('#chipped_form input[name=look]').change(function() {
			if($(this).val().length == 0) {
				$(this).after('<span class="tip_red">请输入名称<span>');
			}
		});

		function Mode(value) {
			var mode = '';
			if(value == '元') {
				mode = 1;
			} else if(value == '角') {
				mode = 2;
			} else if(value == '分') {
				mode = 3;
			} else {
				mode = 4;
			}
			return mode;
		}
		// 发布合买
		$('#in_chipped').click(function() {
			$("#recharge2").hide();
			var data = {
				// 投注金额
				bet_money: $('#recharge2 table tbody tr td').eq(2).text(),
				// 玩法名称
				play_way_id: $('#recharge2 .jiluinfo ul li em').eq(1).text(),
				// 彩种
				category: $('#recharge2 .jiluinfo ul li em').eq(0).attr('category_id'),
				// 期号
				issue: $('#recharge2 .jiluinfo ul li em').eq(2).text(),
				// 时间
				addtime: $('#recharge2 .jiluinfo ul li em').eq(3).text(),
				// 投注倍数
				times: $('#recharge2 .jiluinfo ul li em').eq(6).text(),
				// 模式
				type: Mode($('#recharge2 .jiluinfo ul li em').eq(8).text()),
				// 号码
				code: $('#recharge2 table tbody tr td').eq(1).text(),
				// 名称
				name: $('#chipped_form input[name=name]').val(),
				// 点数
				point: $('#chipped_form .count').text(),
				// 是否查看
				see: $('#chipped_form input[name=look]:checked').val(),
				// 说明
				remark: $('#chipped_form input[name=explain]').val(),
				// 注数
				num: $('#recharge2 .jiluinfo ul li em').eq(4).text()
			}
			if(data.name.length != 0) {
				$.post('/Html/TogetherBuy/together_buy', data, function(data) {
					console.log(data);
					if(data == 1) {
						alert('发布合买成功');
						$('#chipped_modal').hide();
						$('#chipped_form input[name=name]').val("");
						$('#chipped_form input[name=explain]').val("");
					} else if(data == 0) {
						alert('系统繁忙，发布合买失败，请稍后再试');
					} else {
						alert('开奖时间已过期');
						$('#chipped_modal').hide();
						$('#chipped_form input[name=name]').val("");
						$('#chipped_form input[name=explain]').val("");
					}
				});
			}
		});
		$('.gendan_pop_cloes').click(function() {
			$('#gendan').hide();
		})

		// 合买-跟单列表开始
		// 一页展示的总条数
		var total_num = 10;
		// 总条数
		var total_count = null;
		//  总页数
		var total_page = null;
		// 当前期数
		var issue = '';
		// 彩种名称
		var catename = '';		
		var page = 1;
		// ...
		// 查询
		$('#lt_chipped_if_btn').click(function() {
			$('#gendan').show();
			$('#gandan_btn').click();
			//console.log(pri_lotteryid)
		});
		$('#gandan_btn').click(function() {
			var gd_id = $(this).siblings('input[name=search]').val();
			// 发送请求 添加数据
			//合买-跟单列表 获取页面数据 显示前十条数据
			$.ajax({
				type: "get",
				url: '/Html/TogetherBuy/together_buy_list?total_num=10&pri_lotteryid=' + pri_lotteryid+'&page='+page+'&id='+gd_id,
				async: true,
				timeout: 10000,
				success: function(data) {
				console.log(data);
				//  总条数
				total_count = data[0].count;
				// 当前期数
				issue = data[1].issue;
				// 彩种名称
				catename = data[2].catename;
				// 列表信息
				var data_Array = data[3];
				console.log(data_Array);
				$('#gendan .gendan_cz_title').html(catename);
				$('#gendan .gendan_issue_title').html(issue);
				var innerhtml = '';
				//				for(var i = 0; i < data_Array.length; i++) {
				//					innerhtml += '<tr><td>' + data_Array.id + '</td><td>' + data_Array.name + '</td><td>' + data_Array.admin 
				//					+ '</td><td>' + data_Array.point + '‰</td><td>' +data_Array.times + '</td><td>' + data_Array.num
				//					+ '</td><td>' +modeSelection(data_Array.mode)+ '</td><td>'++'</td></tr><td>'++'</td><td>'++'</td></tr>';
				//				}
			});
			//...
		});
		// 跳转页数
		// 上一页
		$('#gendan .pre_page').click(function() {
			var page = $(this).siblings('ul').children('li.act').text();
			if(page == 1) {
				return;
			} else {
				//...发送请求 获取 page - 1 的十条数据 填充到页面中
				// 移除之前的 act 样式  添加到对应页数的act 样式
			}
		});
		// 下一页
		$('#gendan .next_page').click(function() {
			var page = $(this).siblings('ul').children('li.act').text();
			total_num = 25;

			if(page == total_page) {
				return;
			} else {
				//...发送请求 获取 page + 1 的十条数据 填充到页面中
			}
		});
		// 选中跟单
		$('#gendan .gendan_list table tbody tr').click(function(e) {
			e.stopPropagation();
			$(this).siblings().removeClass('act').end().addClass('act');

		})
		// 添加倍数
		$('#gendan .gd_multiple .gd_m').click(function() {
			multiple = $('.gd_multiple .gd_m_text input[name=multiple]').val();
			if($(this).hasClass('gd_m_sub')) {
				// 减倍数
				if(multiple <= 1) {
					return;
				} else {
					$('.gd_multiple .gd_m_text input[name=multiple]').val(Number(multiple) - 1);
				}
			} else {
				// 加倍数
				$('.gd_multiple .gd_m_text input[name=multiple]').val(Number(multiple) + 1);
			}
		});
		$('.gd_multiple .gd_m_text input[name=multiple]').change(function() {
			// 
		});

		// 选择元角模式
		// 跟单
		// ...

		// 合买-跟单列表结束
	//民间切换
	$(".con_play li").click(function() {
		var _sub = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$(".sscmjwf").eq(_sub).show().siblings().hide();
		$(this).closest('.unit').find('.sscmjwf input[type=text]').val('');
		$(this).closest('.unit').find('.sscmjwf .mjwftz td').removeClass("on");
		$(this).closest('.unit').find('.sscmjwf .mjwftz td input[type=text]').removeClass("tr");
		return false;
	});

	//民间近期开奖切换
	$(".jqkjtu li").click(function() {
		var _sub = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".kjlztu").eq(_sub).show().siblings().hide();
		return false;
	});

	//民间方法
	var iNputval, iNputhtml;
	$('tbody tr').each(function() {
		for(var i = 0; i < 15; i++) {
			if(i % 3 != 0) {
				$('tbody tr td:nth-child(' + i + ')').addClass('to');
			}
		}
	});
	$('.sscmjwf input[type=text]').attr('maxlength', '6');

	$('.sscmjwf').on('click', ".mjssctzbox span:nth-child(2) a", function() {
		iNputhtml = Number($(this).closest('.sscmjwf').find('.user_bank').val()) + Number($(this).html());
		if(iNputhtml > 999999) {
			$(this).closest('.sscmjwf').find('.mjssctzbox input[type=text]').val(999999);
			$(this).closest('.sscmjwf').find('input[type=text].tr').val(999999);
		} else {
			$(this).closest('.sscmjwf').find('.mjssctzbox input[type=text]').val(iNputhtml);
			$(this).closest('.sscmjwf').find('input[type=text].tr').val(iNputhtml);
		}
	});

	$('.sscmjwf').on('click', ".yllowbg", function() {
		$(this).closest('.sscmjwf').find('input[type=text]').val('');
		$(this).closest('.sscmjwf').find('.mjwftz td').removeClass("on");
		$(this).closest('.sscmjwf').find('.mjwftz td input[type=text]').removeClass("tr");
	});
	$('.sscmjwf').on('click', ".mjwftz td.to", function() {
		iNputval = $(this).closest('.sscmjwf').find('.user_bank').val();
		if($(this).hasClass("on")) {
			$(this).removeClass('on');
			$(this).prev('.on').removeClass('on');
			$(this).next('.on').removeClass('on');
			$(this).next().find('input').val('');
			$(this).next().next().find('input').val('');
			$(this).next().find('input').removeClass('tr');
			$(this).next().next().find('input').removeClass('tr');
		} else if(!$(this).hasClass("on")) {
			$(this).addClass('on');
			$(this).prev('.to').addClass('on');
			$(this).next('.to').addClass('on');
			$(this).next().find('input').val(iNputval);
			$(this).next().next().find('input').val(iNputval);
			$(this).next().find('input').addClass('tr');
			$(this).next().next().find('input').addClass('tr');
		}
	});

	$('.sscmjwf').on('keyup', "input[type=text]", function() {
		if(this.value.length == 1) {
			this.value = this.value.replace(/[^1-9]/g, '')
		} else {
			this.value = this.value.replace(/\D/g, '')
		}
	});
	$('.sscmjwf').on('keyup', ".mjssctzbox input[type=text]", function() {
		$(this).closest('.sscmjwf').find('.mjwftz td input[type=text].tr').val($(this).val());
	});
	$('.sscmjwf').on('afterpaste', "input[type=text]", function() {
		if(this.value.length == 1) {
			this.value = this.value.replace(/[^1-9]/g, '')
		} else {
			this.value = this.value.replace(/\D/g, '')
		}
	});
});
//.con-title 两行样式bug
$(document).on('click', ".con-btn", function() {
	$(".con-title").each(function() {
		if(!$(this).html()) {
			$(this).css({
				"background-color": "#f1f1f1"
			});
		}
	});
	return false;
});
$(".con-title").each(function() {
	if(!$(this).html()) {
		$(this).css({
			"background-color": "#f1f1f1"
		});
	}
});
$(function() {
	$(".con-title").each(function() {
		if(!$(this).html()) {
			$(this).css({
				"background-color": "#f1f1f1"
			});
		}
	});
});

//倍数小0变1
$('#lt_sel_times').blur(function() {
	if(this.value == 0) {
		this.value = 1;
	}
});
//倍数加倍
$('#lt_sel_jiabei').click(function() {
	var ltseltimesVal0 = $('#lt_sel_times').val();
	var ltselmoneyHtml0 = $('#lt_sel_money').html();
	var ltselmoneyHtml = ltselmoneyHtml0 / ltseltimesVal0;
	var ltseltimesVal = ltseltimesVal0 * 2;
	if(ltseltimesVal > 999999) {
		$('#lt_sel_times').val(999999);
		$('#lt_sel_money').html(999999 * ltselmoneyHtml)
	} else {
		$('#lt_sel_times').val(ltseltimesVal);
		$('#lt_sel_money').html(ltselmoneyHtml * ltseltimesVal)
	}

});
//号码选定删除
/* $(document).on('click',".total-table-l-li",function(){
		  if(!$(this).hasClass("text-center")){
			  $(this).toggleClass('to');
		  }  
	  });*/
$('#i_li_delete').click(function() {
	$(".total-table-l-li").remove();
});
//投注  单数
$('#lt_fast_buy').click(function() {
	$('#td02_size').html($('#lt_cf_content').children('li').length + 1)
});
$('#lt_buy').click(function() {
	$('#td02_size').html($('#lt_cf_content').children('li').length)
});

// 旋转按钮
var cbs = 2;

function Rotatebutton() {
	var preX, preY; //上一次鼠标点的坐标
	var curX, curY; //本次鼠标点的坐标
	var preAngle; //上一次鼠标点与圆心(150,150)的X轴形成的角度(弧度单位)
	var transferAngle; //当前鼠标点与上一次preAngle之间变化的角度

	var wheel_jj = $('#wheel_number .wheel_span_jj'); //奖金
	var wheel_pl = $('#wheel_number .wheel_span_pl'); //赔率
	var wheel_bf = $('#wheel_number .wheel_span_bf'); //百分比
	var wheel_bf_b = (deg / (235 / 8.3)).toFixed(2); //比例
	console.log("wheel_bf_b");
	console.log(wheel_bf_b);

	var lt_sel_modes = $('#lt_sel_modes'); //元角分厘
	var y_j_f_l = 1;
	var v = lt_sel_modes.val();

	var g = 0;
	var oRotate = $("#indicator");
	var Y = oRotate.offset().top;
	var X = oRotate.offset().left;

	var aBcd = oRotate.css('transform').substring(7).split(',');
	var a = aBcd[0];
	var b = aBcd[1];
	var c = aBcd[2];
	var d = aBcd[3];
	var deg = 0;

	lt_sel_modes.click(function() {

		v = lt_sel_modes.val();

		switch(v) {
			case 4:
				return y_j_f_l = 0.001;
				break;
			case 3:
				return y_j_f_l = 0.01;
				break;
			case 2:
				return y_j_f_l = 0.1;
				break;
			default:
				return y_j_f_l = 1;
		}

	});

	//点击事件
	oRotate.mousedown(function(event) {
		
			console.log("wheel_bf_b");
	console.log(wheel_bf_b);
		$("html").addClass("buxuan");
		Y = oRotate.offset().top;
		X = oRotate.offset().left;
		preX = event.clientX;
		preY = event.clientY;
		//计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
		preAngle = Math.atan2(preY - 80 - Y, preX - 80 - X);
		//移动事件
		$("html").mousemove(function(event) {
			curX = event.clientX;
			curY = event.clientY;

			//计算当前点击的点与圆心(150,150)的X轴的夹角(弧度) --> 上半圆为负(0 ~ -180), 下半圆未正[0 ~ 180]
			var curAngle = Math.atan2(curY - 80 - Y, curX - 80 - X);
			transferAngle = curAngle - preAngle;
			g += (transferAngle * 180 / Math.PI);
			oRotate.rotate(g);
			preX = curX;
			preY = curY;
			preAngle = curAngle;

			aBcd = oRotate.css('transform').substring(7).split(',');
			console.log(aBcd);
			getmatrix(a = aBcd[0], b = aBcd[1], c = aBcd[2], d = aBcd[3], null, null);

			function getmatrix(a, b, c, d, e, f) {
				var aa = Math.round(180 * Math.asin(a) / Math.PI);
				var bb = Math.round(180 * Math.acos(b) / Math.PI);
				var cc = Math.round(180 * Math.asin(c) / Math.PI);
				var dd = Math.round(180 * Math.acos(d) / Math.PI);

				if(aa == bb || -aa == bb) {
					deg = dd;
				} else if(-aa + bb == 180) {
					deg = 180 + cc;
				} else if(aa + bb == 180) {
					deg = 360 - cc || 360 - dd;
				}
				deg >= 360 ? 0 : deg;
				//return (aa+','+bb+','+cc+','+dd); 
				wheel_bf_b = (deg / (235 / 8.3)).toFixed(1);
				wheel_bf.html((8.5 - wheel_bf_b).toFixed(1));
				if(y_j_f_l < 1) {
					wheel_jj.html(((18 + wheel_bf_b * 0.2).toFixed(2) * y_j_f_l).toFixed(3));
				} else {
					wheel_jj.html((18 + wheel_bf_b * 0.2).toFixed(2));
				}

				wheel_pl.html((9 + wheel_bf_b * 0.1).toFixed(2));

				if(deg > 235 && deg < 300) {
					oRotate.css("transform", "rotate(235deg)");
					wheel_bf.html(0.2);
					if(y_j_f_l < 1) {
						wheel_jj.html((19.66 * y_j_f_l).toFixed(3));
					} else {
						wheel_jj.html(19.66);
					}
					wheel_pl.html(9.83);
				} else if(deg >= 290 && deg <= 360) {
					oRotate.css("transform", "rotate(0deg)");
					wheel_bf.html(8.5);
					if(y_j_f_l < 1) {
						wheel_jj.html((18 * y_j_f_l).toFixed(3));
					} else {
						wheel_jj.html(18);
					}
					wheel_pl.html(9);

					switch(y_j_f_l) {
						case 0.001:
							return wheel_jj.html(0.018);
							break;
						case 0.01:
							return wheel_jj.html(0.18);
							break;
						case 0.1:
							return wheel_jj.html(1.8);
					}
					return deg = 0;
				}

				if(deg == 0) {
					return deg = 0;
				}

				if(deg > 226 && deg < 300) {
					if(y_j_f_l == 0.01) {
						wheel_jj.html(0.196);
					}
				}
				if(deg > 115 && deg < 300) {
					if(y_j_f_l == 0.001) {
						wheel_jj.html(0.019);
					}
				} else {
					if(y_j_f_l == 0.001) {
						wheel_jj.html(0.018);
					}
				}

			}

		});
		//释放事件
		$("html").mouseup(function(event) {
			$("html").removeClass("buxuan");
			$("html").unbind("mousemove");
		});
	});

	lt_sel_modes.click(function() {
		wheel_bf_b = (deg / (235 / 8.3)).toFixed(1);
		var s = wheel_jj.html();
		v = lt_sel_modes.val();

		if(s > 10) {
			switch(v) {
				case 4:
					v4()
					break;
				case 3:
					vn()
					v3()
					break;
				case 2:
					vn()
					v2()
					break;
				default:
					v1()
			}
		} else if(s > 1 && s < 10) {
			switch(v) {
				case 4:
					v4()
					break;
				case 3:
					vn()
					v3()
					break;
				case 2:
					vn()
					v2()
					break;
				default:
					v1()
			}
		} else if(s > 0.1 && s < 1) {
			switch(v) {
				case 4:
					v4()
					break;
				case 3:
					vn()
					v3()
					break;
				case 2:
					vn()
					v2()
					break;
				default:
					v1()
			}

		} else if(s > 0.01 && s < 0.1) {
			switch(v) {
				case 4:
					v4()
					break;
				case 3:
					vn()
					v3()
					break;
				case 2:
					vn()
					v2()
					break;
				default:
					v1()
			}
		}

	});
	//封装调用
	function vn() {
		wheel_jj.html(((18 + wheel_bf_b * 0.2).toFixed(2) * y_j_f_l).toFixed(3));
	};

	function v1() {
		wheel_jj.html((18 + wheel_bf_b * 0.2).toFixed(2));
		if(deg > 233 && deg < 300) {
			wheel_jj.html(19.66);
		}
	};

	function v2() {
		if(deg > 233 && deg < 300) {
			wheel_jj.html(1.966);
		}
	};

	function v3() {
		if(deg > 226 && deg < 300) {
			wheel_jj.html(0.196);
		}
	};

	function v4() {
		if(deg > 115 && deg < 300) {
			wheel_jj.html(0.019);
		} else {
			wheel_jj.html(0.018);
		}
	};

};

$(document).ready(function() {
	Rotatebutton();
});