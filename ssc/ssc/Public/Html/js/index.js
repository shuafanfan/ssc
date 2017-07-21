$(function() {
	/*报表*/
	$("#statement .tab_list li").click(function() {
		var sub = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$("#statement .account_content").eq(sub).addClass("active").siblings().removeClass("active");
		return false;
	});
	$('#statement .shortcut_btn li').click(function() {
		$(this).addClass("on").siblings().removeClass("on");
	});
	$('.lot_all li').click(function() {
		$(this).addClass("on").siblings().removeClass("on");
	});
	$('.short_handle li').click(function() {
		$(this).addClass("on").siblings().removeClass("on");
	});
	$("#statement .state_close").click(function() {
		$("#statement").hide();
	});
	/*充值*/
	$("#recharge .tab_list li").click(function() {
		var sub_in = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$("#recharge .account_content").eq(sub_in).addClass("active").siblings().removeClass("active");
		return false;
	});
	$('#recharge .shortcut_btn li').click(function() {
		$(this).addClass("on").siblings().removeClass("on");
	});
	$("#recharge .state_close").click(function() {
		$("#recharge").hide();
		return false;
	});
	$(".payhover1").click(function() {
		// 发送请求
		accountWithInfo();	
		$("#recharge").show();
		$("#recharge .tab_list li:nth-child(4)").click();
		return false;
	});
	$(".go_back").click(function() {
		$(".withdraw_bank").hide().siblings().show();
		return false;
	})
	$(document).on('click', '#btn_bank_card', function() {
		$(".withdraw").hide().siblings().show();
		return false;
	})
	$(".transfer").click(function() {
		$(this).addClass("on").siblings().removeClass("on");
		return fales;
	})
	$(".pay_record li").click(function() {
		$(this).addClass("on").siblings().removeClass("on");
		if($(this).index() == 0){
			$('.search_cz').fadeIn();
			$('.search_zz').hide();
			$('.search_qk').hide();
		}else if($(this).index() == 1){
			$('.search_qk').fadeIn();
			$('.search_cz').hide();
			$('.search_zz').hide();
		
		}else{
			$('.search_zz').fadeIn();
			$('.search_cz').hide();
			$('.search_qk').hide();
		}
		return false;
	})
	$("#withdraw_bank_list .item").click(function() {
		$(this).addClass("on").siblings().removeClass("on");
		return false;
	})
	// 帐变记录
	$('.modify_record').click(function() {
		$("#acc_record").show();
		$("#acc_record .tab_list li:nth-child(3)").click();
		return false;
	})
	$("#acc_record .tab_list li").click(function() {
		var sub = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$("#acc_record .account_content").eq(sub).addClass("active").siblings().removeClass("active");
		return false;
	});
	$("#acc_record .state_close").click(function() {
		$("#acc_record").hide();
		return false;
	});
	/*option*/
	$(function() {
		$('.sort').searchableSelect();
	});
	$(function() {
		$('.bank_list').searchableSelect();
	});
	$(function() {
		$('.lotter_list').searchableSelect();
	});
	$(function() {
		$('.palying_meth').searchableSelect();
	});
	// 账号管理
	$(".my_bank_card").click(function() {
		$("#user_manage .tab_list li:nth-child(4)").click();
		return false;
	});
	$(document).on('click', '.btn_set_password', function() {
		$("#user_manage .tab_list li:nth-child(3)").click();
		$(".content-nav li:nth-child(1)").click();
		return false;
	});
	$(document).on('click', '.btn_set_money', function() {
		$("#user_manage .tab_list li:nth-child(3)").click();
		$(".content-nav li:nth-child(2)").click();
		return false;
	});
	$("#user_manage .state_close").click(function() {
		$("#user_manage").hide();
	});
	$("#user_manage .tab_list li").click(function() {
		var sub = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$("#user_manage .account_content").eq(sub).addClass("active").siblings().removeClass("active");
		return false;
	});
	$(document).on('click', '.btn_bind_bank', function() {
		$(".bind_card_show").show().siblings().hide();
		return false;
	})
	$(document).on('click', '.bind_card_show .go_back', function() {
		$(".security_level").show().siblings().hide();
		return false;
	})
	//$(".bind_card_show .go_back").click(function(){
	//	$(".security_level").show().siblings().hide();
	//	return false;
	//})
	$(document).on('click', '.btn_bind_phone', function() {
		$(".iphone_show").show().siblings().hide();
		return false;
	})
	$(document).on('click', '.iphone_show .go_back', function() {
		$(".security_level").show().siblings().hide();
		return false;
	})
	$(document).on('click', '.btn_set_qq', function() {
		$(".qq_show").show().siblings().hide();
		return false;
	})
	$(document).on('click', '.qq_show .go_back', function() {
		$(".security_level").show().siblings().hide();
		return false;
	})
	$(document).on('click', '.btn_set_email', function() {
		$(".email_show").show().siblings().hide();
		return false;
	})
	$(document).on('click', '.email_show .go_back', function() {
		$(".security_level").show().siblings().hide();
		return false;
	})

	var tdvalue = $(".safe-log tbody td:last-child");
	for(var i = 0; i < tdvalue.length; i++) {
		if(tdvalue[i].innerHTML == "成功") {
			tdvalue[i].style.color = "#55df83";
		} else {
			tdvalue[i].style.color = "#ff6666";
		}
	}

	var tdvalue1 = $(".safe-logta tbody td:nth-child(5)");
	for(var i = 0; i < tdvalue1.length; i++) {
		if(tdvalue1[i].innerHTML == "成功") {
			tdvalue1[i].style.color = "#55df83";
		} else {
			tdvalue1[i].style.color = "#ff6666";
		}

	}

	$(".content-nav li").click(function() {
		var sub = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".cont-set-password").eq(sub).addClass("show").siblings().removeClass("show");
		return false;
	});
	$("#cancel").click(function() {
		$(".send_message_menu").hide();
		$(".message_wrap").show();
		$(".message_menu").eq(0).show();
	})
	$(".message_record li").click(function() {
		var _sub = $(this).index();
		$(this).addClass("on").siblings().removeClass("on");
		$(".message_menu").eq(_sub).show().siblings().hide();
		return false;
	})
	$("#send_message").click(function() {
		$(".message_wrap").hide();
		$(".send_message_menu").show();
		return false;
	})
	$(".send_message_menu label input[type='radio']").click(function() {
		var _val = $(this).val();
		console.log(_val)
		if(_val == "0") {
			$("#send-message-for-direct").show();
		} else {
			$("#send-message-for-direct").hide();
		}
	})
	/*团队*/
	$(".state_tab .td_delete i").click(function() {
		$(this).parents('tr').remove();
	})
	$('.team_ad .shortcut_btn li').click(function() {
		$(this).addClass("on").siblings().removeClass("on");
	});
	$(document).on('click', '#btn_plus', function() {
		$(this).parents('.team_ad_list').hide();
		$(this).parents('.team_ad_list').siblings().show();
		$(this).parents('.account_content').css({ 'background': '#e1f3ff' })
	})
	$('#btn_next').click(function() {
		$(this).parents('.team_ad_list').hide();
		$(this).parents('.team_ad_list').siblings().show();
		$(this).parents('.account_content').css({ 'background': '#e1f3ff' })
	})
	$('.team_ad_listf input[type=button]').click(function() {
		$(this).parents('.team_ad_listf').hide();
		$(this).parents('.team_ad_listf').siblings().show();
		$(this).parents('.account_content').css({ 'background': '#fff' })
	})
	$("#team_ad .state_close").click(function() {
		$("#team_ad").hide();
	});
	$("#team_ad .tab_list li").click(function() {
		var sub = $(this).index();
		$(this).addClass("active").siblings().removeClass("active");
		$("#team_ad .account_content").eq(sub).addClass("active").siblings().removeClass("active");
		return false;
	});
	/*退出*/
	$('#sign_out_qx').click(function() {
		$(this).parents(".top_tip").css({ "display": "none" });
	})
	$('.header_top_rt .tchover').mousemove(function() {
		$(this).find(".top_tip").css({ "display": "block" });
	}).mouseout(function() {
		$(this).find(".top_tip").css({ "display": "none" });
	});
	/*以上交互*/
	$('.top_tip dl dd a').click(function() {
		switch($(this).data("id")) {
			case 'a_wdxx':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(1)').click();
				break;
			case 'a_aqzx':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(2)').click();
				break;
			case 'a_xgmm':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(3)').click();
				break;
			case 'a_yhzl':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(4)').click();
				break;
			case 'a_wdxxi':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(5)').click();
				break;
			case 'a_jjxq':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(6)').click();
				break;
			case 'a_dljr':
				$('#user_manage').show();
				$('#user_manage .tab_list li:nth-child(7)').click();
				break;
			case 'b_gscz':
				$('#recharge').show();
				$('#recharge .tab_list li:nth-child(1)').click();
				break;
			case 'b_wxcz':
				$('#recharge').show();
				$('#recharge .tab_list li:nth-child(2)').click();
				break;
			case 'b_yhk':			
				$('#recharge').show();
				$('#recharge .tab_list li:nth-child(3)').click();
				break;
			case 'b_yhtk':
				accountWithInfo();
				$('#recharge').show();
				$('#recharge .tab_list li:nth-child(4)').click();
				break;
			case 'b_yhzz':
				$('#recharge').show();
				$('#recharge .tab_list li:nth-child(5)').click();
				break;
			case 'b_czqjl':
				$('#recharge').show();
				$('#recharge .tab_list li:nth-child(6)').click();
				break;
			case 'c_cpbb':
				$('#statement').show();
				$('#statement .tab_list li:nth-child(1)').click();
				break;
			case 'c_grbb':
				$('#statement').show();
				$('#statement .tab_list li:nth-child(2)').click();
				break;
			case 'c_ykbb':
				$('#statement').show();
				$('#statement .tab_list li:nth-child(3)').click();
				break;
			case 'c_ptbb':
				$('#statement').show();
				$('#statement .tab_list li:nth-child(4)').click();
				break;
			case 'c_qtbb':
				$('#statement').show();
				$('#statement .tab_list li:nth-child(5)').click();
				break;
			case 'c_qtbb':
				$('#statement').show();
				$('#statement .tab_list li:nth-child(5)').click();
				break;
			case 'd_tdtj':
				$('#team_ad').show();
				$('#team_ad .tab_list li:nth-child(1)').click();
				break;
			case 'd_khzx':
				$('#team_ad').show();
				$('#team_ad .tab_list li:nth-child(2)').click();
				break;
			case 'd_pegl':
				$('#team_ad').show();
				$('#team_ad .tab_list li:nth-child(3)').click();
				break;
			case 'd_xjgl':
				$('#team_ad').show();
				$('#team_ad .tab_list li:nth-child(4)').click();
				break;
			case 'd_xjcz':
				$('#team_ad').show();
				$('#team_ad .tab_list li:nth-child(5)').click();
				break;
			case 'd_xjqk':
				$('#team_ad').show();
				$('#team_ad .tab_list li:nth-child(6)').click();
				break;
			case 'e_gqjl':
				$('#acc_record').show();
				$('#acc_record .tab_list li:nth-child(1)').click();
				break;
			case 'e_zhjl':
				$('#acc_record').show();
				$('#acc_record .tab_list li:nth-child(2)').click();
				break;
			case 'e_zbjl':
				$('#acc_record').show();
				$('#acc_record .tab_list li:nth-child(3)').click();
				break;
			case 'e_dljl':
				$('#acc_record').show();
				$('#acc_record .tab_list li:nth-child(4)').click();
				break;
			case 'e_ctzjl':
				$('#acc_record').show();
				$('#acc_record .tab_list li:nth-child(5)').click();
				break;
			default:
				return false
		}
	})
	/*报表日期查询*/

	$(".laydate-icon").val((new Date().getFullYear()) + "-" + ((new Date().getMonth() + 1) < 10 ? ('0' + (new Date().getMonth() + 1)) : (new Date().getMonth() + 1)) + "-" + (new Date().getDate() < 10 ? ('0' + new Date().getDate()) : (new Date().getDate())));
	laydate.skin('danlan');
	$(".shortcut_time .item").click(function() {
		$(this).addClass("on").siblings().removeClass("on");
		var getAttr = $(this).attr("content");
		switch(getAttr) {
			case "today":
				$(".laydate-icon").val((new Date().getFullYear()) + "-" + ((new Date().getMonth() + 1) < 10 ? ('0' + (new Date().getMonth() + 1)) : (new Date().getMonth() + 1)) + "-" + (new Date().getDate() < 10 ? ('0' + new Date().getDate()) : (new Date().getDate())));
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "yesterday":
				$(".laydate-icon[name='date_min']").val((new Date().getFullYear()) + "-" + ((new Date().getMonth() + 1) < 10 ? ('0' + (new Date().getMonth() + 1)) : (new Date().getMonth() + 1)) + "-" + ((new Date().getDate() - 1) < 10 ? ('0' + (new Date().getDate() - 1)) : (new Date().getDate() - 1)));
				$(".laydate-icon[name='date_max']").val((new Date().getFullYear()) + "-" + ((new Date().getMonth() + 1) < 10 ? ('0' + (new Date().getMonth() + 1)) : (new Date().getMonth() + 1)) + "-" + ((new Date().getDate() - 1) < 10 ? ('0' + (new Date().getDate() - 1)) : (new Date().getDate() - 1)));
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "this_week":
				$(".laydate-icon[name='date_min']").val(
					function getWeek() {
						var myDate = new Date();
						var nowDayOfWeek = myDate.getDay();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var nowDay = myDate.getDate();
						if(month < 10) {
							month = "0" + month;
						}
						var weekStartDate = (nowDay - nowDayOfWeek + 1) < 10 && (nowDay - nowDayOfWeek + 1) > 0 ? '0' + (nowDay - nowDayOfWeek + 1) : (nowDay - nowDayOfWeek + 1) < 0 ? "01" : (nowDay - nowDayOfWeek + 1);
						var firsDay = year + "-" + month + "-" + weekStartDate;
						return firsDay;
					}
				);
				$(".laydate-icon[name='date_max']").val((new Date().getFullYear()) + "-" + ((new Date().getMonth() + 1) < 10 ? ('0' + (new Date().getMonth() + 1)) : (new Date().getMonth() + 1)) + "-" + (new Date().getDate() < 10 ? ('0' + new Date().getDate()) : (new Date().getDate())));
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "prev_week":
				$(".laydate-icon[name='date_min']").val(
					function getpreWeek() {
						var myDate = new Date();
						var nowDayOfWeek = myDate.getDay();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var nowDay = myDate.getDate();
						if(month < 10) {
							month = "0" + month;
						}
						var weekStartDate = (nowDay - nowDayOfWeek + 1 - 7) < 10 && (nowDay - nowDayOfWeek + 1 - 7) > 0 ? '0' + (nowDay - nowDayOfWeek + 1 - 7) : (nowDay - nowDayOfWeek + 1 - 7) < 0 ? "01" : (nowDay - nowDayOfWeek + 1 - 7);
						var firsDay = year + "-" + month + "-" + weekStartDate;
						return firsDay;
					});
				$(".laydate-icon[name='date_max']").val(
					function getpreWeek() {
						var myDate = new Date();
						var nowDayOfWeek = myDate.getDay();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var nowDay = myDate.getDate();
						if(month < 10) {
							month = "0" + month;
						}
						var weekStartDate = (nowDay - nowDayOfWeek + 1 - 1) < 10 && (nowDay - nowDayOfWeek + 1 - 1) > 0 ? '0' + (nowDay - nowDayOfWeek + 1 - 1) : (nowDay - nowDayOfWeek + 1 - 1) < 0 ? "01" : (nowDay - nowDayOfWeek + 1 - 1);
						var firsDay = year + "-" + month + "-" + weekStartDate;
						return firsDay;
					}
				);
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "this_month":
				$(".laydate-icon[name='date_min']").val(
					function getMonthi() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						if(month < 10) {
							month = "0" + month;
						}
						var firstDay = year + "-" + month + "-" + "01";
						return firstDay;
					});
				$(".laydate-icon[name='date_max']").val(
					function getMonth() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						if(month < 10) {
							month = "0" + month;
						}
						myDate = new Date(year, month, 0);
						var lastDay = year + "-" + month + "-" + myDate.getDate();
						return lastDay;
					});
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "prev_month":
				$(".laydate-icon[name='date_min']").val(
					function getpreMonthi() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth();
						if(month < 10) {
							month = "0" + month;
						}
						if(month == 0) {
							year -= 1;
						}
						var firstDay = year + "-" + (month == 0 ? "12" : month) + "-" + "01";
						return firstDay;
					});
				$(".laydate-icon[name='date_max']").val(
					function getpreMonth() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth();
						if(month < 10) {
							month = "0" + month;
						}
						if(month == 0) {
							year -= 1;
						}
						myDate = new Date(year, month, 0);
						var lastDay = year + "-" + (month == 0 ? "12" : month) + "-" + myDate.getDate();
						return lastDay;
					});
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "this_3":
				$(".laydate-icon[name='date_min']").val(
					function getMonthi() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var day = myDate.getDate() - 2;
						if(day < 3) {
							month = myDate.getMonth();
							var day0 = new Date(year, month, 0);
							year = day0.getFullYear();
							day = day0.getDate() + day;
						}

						if(day < 10) {
							day = "0" + day;
						}

						if(month < 10) {
							month = "0" + month;
						}

						var firstDay = year + "-" + month + "-" + day;
						return firstDay;
					});
				$(".laydate-icon[name='date_max']").val(
					function getMonth() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var day = myDate.getDate();
						if(month < 10) {
							month = "0" + month;
						}
						if(day < 10) {
							day = "0" + day;
						}
						var lastDay = year + "-" + month + "-" + day;
						return lastDay;
					});
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "this_7":
				$(".laydate-icon[name='date_min']").val(
					function getMonthi() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var day = myDate.getDate() - 6;
						if(day < 7) {
							month = myDate.getMonth();
							var day0 = new Date(year, month, 0);
							year = day0.getFullYear();
							day = day0.getDate() + day;
						}

						if(day < 10) {
							day = "0" + day;
						}

						if(month < 10) {
							month = "0" + month;
						}

						var firstDay = year + "-" + month + "-" + day;
						return firstDay;
					});
				$(".laydate-icon[name='date_max']").val(
					function getMonth() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var day = myDate.getDate();
						if(month < 10) {
							month = "0" + month;
						}
						if(day < 10) {
							day = "0" + day;
						}
						var lastDay = year + "-" + month + "-" + day;
						return lastDay;
					});
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
			case "this_30":
				$(".laydate-icon[name='date_min']").val(
					function getMonthi() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth();
						var day = myDate.getDate();
						if(day < 10) {
							day = "0" + day;
						}
						if(month < 10) {
							month = "0" + month;
						}

						var firstDay = year + "-" + month + "-" + day;
						return firstDay;
					});
				$(".laydate-icon[name='date_max']").val(
					function getMonth() {
						var myDate = new Date();
						var year = myDate.getFullYear();
						var month = myDate.getMonth() + 1;
						var day = myDate.getDate();
						if(month < 10) {
							month = "0" + month;
						}
						if(day < 10) {
							day = "0" + day;
						}
						var lastDay = year + "-" + month + "-" + day;
						return lastDay;
					});
				$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
				$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
				break;
		}
	});
	$(".account_edit_form .laydate-icon[name='date_min']").val(($(".laydate-icon[name='date_min']").val() + " 00:00:00"));
	$(".account_edit_form .laydate-icon[name='date_max']").val(($(".laydate-icon[name='date_max']").val() + " 23:59:59"));
});

// 合买
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