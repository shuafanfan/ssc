(function ($) {
	if (/^1.2/.test($.fn.jquery) || /^1.1/.test($.fn.jquery)) {
		alert("requires jQuery v1.3 or later!  You are using v" + $.fn.jquery);
		return
	}
	$(".wfts .p01").hover(function () {
		$(".wfts-text").show();
	}, function () {
		$(".wfts-text").hide();
	});
	$.alert = function (msg, title, successMethod) {
		layer.open({
			icon: 0,
			title: title || '温馨提示',
			content: msg,
			yes: function () {
				layer.closeAll();
				successMethod && successMethod();
			}
		});
	}
	$.confirm = function (msg, successMethod) {
		layer.open({
			content: msg,
			btn: ['确定', '取消'],
			yes: function () {
				layer.closeAll();
				successMethod && successMethod();
			}
		});
	}
	$('.reveal-modal-bg').on('click', function () {
		this.parentNode.style.display = 'none'
	});
	$(document).ready(function () {
		$.playInit({
			data_label: face,
			data_prize: pri_user_data,
			cur_issue: pri_cur_issue,
			last_open: pri_lastopen,
			issues: pri_issues,
			issuecount: pri_issuecount,
			servertime: pri_servertime,
			lotteryid: pri_lotteryid,
			isdynamic: pri_isdynamic,
			ajaxurl: pri_ajaxurl,
			ajaxurl1: pri_ajaxurl1
		})
	});
	$.playInit = function (opts) {
		var ps = {
			data_label: [],
			data_prize: [],
			data_id: {
				id_cur_issue: "#current_issue",
				id_cur_end: "#current_endtime",
				id_cur_sale: "#current_sale",
				id_cur_left: "#current_left",
				id_count_down: "#count_down",
				id_submit_count_down: "#submit-count-down",
				id_labelbox: "#tabbar-div-s2",
				id_smalllabel: "#tabbar-div-s3",
				id_desc: "#lt_desc",
				id_help: "#lt_help",
				id_example: "#lt_example",
				id_selector: "#lt_selector",
				id_sel_num: "#lt_sel_nums",
				id_sel_money: "#lt_sel_money",
				id_sel_times: "#lt_sel_times",
				id_reduce_times: "#reducetime",
				id_plus_times: "#plustime",
				id_plus_times: "#plustime",
				id_sel_insert: "#lt_sel_insert",
				id_sel_modes: "#lt_sel_modes",
				id_sel_prize: "#lt_sel_prize",
				id_cf_count: "#lt_cf_count",
				id_cf_clear: "#lt_cf_clear",
				id_cf_content: "#lt_cf_content",
				id_cf_num: "#lt_cf_nums",
				id_cf_money: "#lt_cf_money",
				id_cf_help: "#lt_cf_help",
				id_issues: "#lt_issues",
				id_fastok: "#lt_fast_buy",
				id_sendok: "#lt_buy",
				id_tra_if: "#lt_trace_if",
				id_tra_if_btn: '#lt_trace_if_btn',
				id_tra_trace: "#J-trace-cancle",
				id_trace_sendok: "#lt_buy_trace",
				id_tra_area: "#lt_trace_box",
				id_tra_stop: "#lt_trace_stop",
				id_tra_box: "#lt_trace_box",
				id_tra_alct: "#lt_trace_alcount",
				id_tra_label: "#lt_trace_label",
				id_tra_lhtml: "#lt_trace_labelhtml",
				id_tra_ok: "#lt_trace_ok",
				id_tra_issues: "#lt_trace_issues"
			},
			cur_issue: {
				issue: "20100210-001",
				endtime: "2010-02-10 09:10:00",
				opentime: "2011-02-10 09:10:00"
			},
			last_open: {
				issue: "20100210-001",
				code: "12345",
				endtime: "2010-02-10 09:10:00",
				opentime: "2011-02-10 09:10:00"
			},
			issues: {},
			servertime: "2011-02-10 09:09:40",
			ajaxurl: "",
			lotteryid: 1,
			isdynamic: 1,
			ontimeout: function () {},
			onfinishbuy: function () {},
			test: ""
		};
		opts = $.extend({}, ps, opts || {});
		$.extend({
			lt_id_data: opts.data_id,
			lt_method_data: {},
			lt_method: methods,
			lt_issues: opts.issues,
			lt_issuecount: opts.issuecount,
			lt_ajaxurl: opts.ajaxurl,
			lt_lottid: opts.lotteryid,
			lt_isdyna: opts.isdynamic,
			lt_total_nums: 0,
			lt_total_money: 0,
			lt_time_leave: 0,
			lt_time_open: 0,
			lt_open_time: opts.cur_issue.opentime,
			lt_end_time: opts.cur_issue.endtime,
			lt_open_status: true,
			lt_last_open: opts.last_open,
			lt_same_code: [],
			lt_ontimeout: opts.ontimeout,
			lt_onfinishbuy: opts.onfinishbuy,
			lt_trace_base: 0,
			lt_submiting: false,
			lt_ismargin: true,
			lt_prizes: [],
			lt_dantuo: false,
			lt_danlen: 0
		});
		ps = null;
		opts.data_id = null;
		opts.issues = null;
		opts.ajaxurl = null;
		opts.lotteryid = null;
		if ($.browser.msie) {
			CollectGarbage()
		}
		var noRightMethod = [];
		var haveRight = false;
		$.each(opts.data_label, function (i, n) {
			noRightMethod = [];
			$.each(n.label, function (j, m) {
				haveRight = false;
				for (k in opts.data_prize) {
					if (m.methodid == opts.data_prize[k].methodid) {
						m.prize = opts.data_prize[k].prize;
						m.dyprize = opts.data_prize[k].dyprize;
						haveRight = true;
						break
					}
				}
				if (haveRight == false) {
					noRightMethod.push(m)
				}
			});
			for (var ll = 0; ll < noRightMethod.length; ll++) {
				opts.data_label[i].label.remove(noRightMethod[ll])
			}
		});
		$($.lt_id_data.id_count_down).lt_timerHtml(opts.servertime, opts.cur_issue.endtime);
		if ($.lt_last_open.statuscode < 1 && $.lt_last_open.issue != "" && $.lt_open_status == true) {
			$("#lt_opentimeleft").lt_opentimer($.lt_last_open.endtime, $.lt_last_open.opentime, $.lt_last_open.issue)
		}
		var bhtml = "";
		var postion = 0;
		$.each(opts.data_label, function (i, n) {
			if (n.label.length > 0) {
				if (typeof (n) == "object") {
					if (postion == 0 || n.isdefault == 1) {
						bhtml = bhtml.replace("class=\"on tab-btn\"", "class=\"tab-btn\"");
						bhtml += '<span class=\"on tab-btn\" value="' + i + '" tag="' + n.isrx + '" default="' + n.isdefault + '">' + n.title + '</span>';
						lt_smalllabel({
							title: n.title,
							label: n.label
						})
					} else {
						bhtml += '<span class=\"tab-btn\" value="' + i + '" tag="' + n.isrx + '" default="' + n.isdefault + '">' + n.title + '</span>'
					}
				}
				postion++
			}
		});
		$($.lt_id_data.id_labelbox).html(bhtml);
		$($.lt_id_data.id_labelbox).children('span').click(function () {
			if ($(this).hasClass("on")) {
				return
			}
			$(this).addClass("on").siblings('.on').removeClass('on');
			var index = parseInt($(this).attr("value"), 10);
			lt_smalllabel({
				title: opts.data_label[index].title,
				label: opts.data_label[index].label
			})
		});
		var chtml = '<select class="select" name="lt_issue_start" id="lt_issue_start">';
		var j = 0;
		var endtime = 0;
		var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
		$.each($.lt_issues, function (i, n) {
			endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
			if (j < $.lt_issuecount && endtime >= currentendtime) {
				j++;
				chtml += '<option value="' + n.issue + '"' + (n.issue == opts.cur_issue.issue ? selected="selected" : "") + '>' + n.issue + (n.issue == opts.cur_issue.issue ? lot_lang.dec_s7 : "") + "</option>"
			}
		});
		chtml += '</select><input type="hidden" name="lt_total_nums" id="lt_total_nums" value="0"><input type="hidden" name="lt_total_money" id="lt_total_money" value="0">';
		$(chtml).appendTo($.lt_id_data.id_issues);
		$("li", $($.lt_id_data.id_cf_content)).live("mouseover", function () {
			$(this).addClass("on")
		}).live("mouseout", function () {
			$(this).removeClass("on")
		});
		$($.lt_id_data.id_cf_clear).click(function () {
			$.confirm(lot_lang.am_s5, function () {
				$.lt_total_nums = 0;
				$.lt_total_money = 0;
				$.lt_trace_base = 0;
				$.lt_same_code = [];
				$($.lt_id_data.id_cf_num).html(0);
				$($.lt_id_data.id_cf_money).html(0);
				$($.lt_id_data.id_cf_count).html(0);
				//$($.lt_id_data.id_cf_content).html('<li class="total-table-l-li text-center">暂无投注项</li>');
				cleanTraceIssue();
				if ($.lt_ismargin == false) {
					traceCheckMarginSup()
				}
			})
		});
		$($.lt_id_data.id_help).mouseover(function () {
			var $h = $('<div class="tip_examplehelp">' + $.lt_method_data.methodhelp + '</div>');
			var left = event.x + 20;
			var top = event.y;
			$(this).openFloat($h, "more", left, top)
		}).mouseout(function () {
			$(this).closeFloat()
		});
		$($.lt_id_data.id_example).mouseover(function () {
			var $h = $('<div class="tip_examplehelp">' + $.lt_method_data.methodexample + '</div>');
			var offset = $(this).offset();
			var left = offset.left;
			var top = offset.top + 40;
			$(this).openFloat($h, "more", left, top)
		}).mouseout(function () {
			$(this).closeFloat()
		});
		$($.lt_id_data.id_tra_if).lt_trace({
			issues: opts.issues
		});
		$($.lt_id_data.id_fastok).fastSubmit();
		$($.lt_id_data.id_sendok).alertSubmit();
		$($.lt_id_data.id_trace_sendok).lt_ajaxSubmit();
	};
	var lt_smalllabel = function (opts) {
		var ps = {
			title: "",
			label: []
		};
		opts = $.extend({}, ps, opts || {});
		var html = "";
		var dyhtml = "";
		$.each(opts.label, function (i, n) {
			if (typeof (n) == "object") {
				if (i == 0) {
					html += '<span class="f-left con-btn" id="smalllabel_' + i + '">' + n.desc + "</span>"
					lt_selcountback();
					$.lt_method_data = {
						methodid: n.methodid,
						methodid1: n.methodid1,
						title: opts.title,
						name: n.name,
						str: n.show_str,
						prize: n.prize,
						dyprize: n.dyprize,
						modes: $.lt_method_data.modes ? $.lt_method_data.modes : {},
						sp: n.code_sp,
						methodhelp: n.methodhelp,
						methoddesc: n.methoddesc,
						methodexample: n.methodexample,
						maxcodecount: n.maxcodecount
					};
					$($.lt_id_data.id_selector).lt_selectarea(n.selectarea);
					selmodes = getCookie("modes");
					$($.lt_id_data.id_sel_modes).empty();
					$.each(n.modes, function (j, m) {
						$.lt_method_data.modes[m.modeid] = {
							name: m.name,
							rate: Number(m.rate)
						};
						if (selmodes == undefined) {
							selmodes = m.modeid;
						}
						var span = document.createElement('span');
						span.className = 'f-left unit ' + m.modeid;
						span.value = m.modeid;
						span.innerHTML = m.name;
						$($.lt_id_data.id_sel_modes).append(span);
					});
					$($.lt_id_data.id_sel_modes).attr('value', selmodes).find('.' + selmodes).addClass('on');
					$($.lt_id_data.id_sel_modes).children().click(function () {
						$(this).addClass('on').siblings('.on').removeClass('on').parent().attr('value', this.value);
						id_sel_modes_change();
					});
					dypoint = getCookie("dypoint");
					$($.lt_id_data.id_sel_prize).empty();
					if (n.dyprize.length == 1 && $.lt_isdyna == 1) {
						dyhtml = '<SELECT name="lt_sel_dyprize" id="lt_sel_dyprize" style="cursor:pointer">';
						$.each(n.dyprize[0].prize, function (j, m) {
							fsxiao =m.prize > faxiao? fsxiao :m.prize;fsda = (fsxiao/0.9)*fsbf + fsxiao ;bili = (fsda - fsxiao)/100;
							dyhtml += '<OPTION value="' + m.prize + "|" + m.point + '"' + (dypoint == m.point ? " selected" : "") + ">" + m.prize + "-" + (Math.ceil(m.point * 1000) / 10) + "%</OPTION>"
						});
						dyhtml += "</SELECT>";
						$($.lt_id_data.id_sel_prize).html('');
						$(dyhtml).appendTo($.lt_id_data.id_sel_prize)
					}
				} else {
					html += '<span class="f-left con-btn" id="smalllabel_' + i + '" href="javascript:void(0)">' + n.desc + "</span>"
				}
			}
		});
		if (opts.label.length == 1) {
			html = '';
		} else {
			html = '<li class="con-box-li">' + html + "</li>";
		}
		var _help = [];
		_help.push('<li class="con-box-li">');
		_help.push('  <div class="tips">');
		_help.push('    <a class="tips-font">玩法提示：</a>');
		_help.push('    <span id="lt_desc"></span>');
		_help.push('    <div class="tips-hover">');
		_help.push('      <span class="arrow-top"></span>');
		_help.push('      <div class="tips-hover-box"><div id="lt_desc_"></div><div id="lt_desc__"></div></div>');
		_help.push('    </div>');
		_help.push('  </div>');
		_help.push('</li>');
		html += _help.join('');
		$($.lt_id_data.id_smalllabel).html(html);
		$($.lt_id_data.id_desc).html($.lt_method_data.methoddesc);
		$("#lt_desc__").html($.lt_method_data.methodhelp);
		$("#lt_desc_").html($.lt_method_data.methodexample);
		$("[id^='smalllabel_']:first", $($.lt_id_data.id_smalllabel)).addClass('on').data("ischecked", "yes");
		$("[id^='smalllabel_']", $($.lt_id_data.id_smalllabel)).click(function () {
			if ($(this).data("ischecked") == "yes") {
				return
			}
			var index = parseInt($(this).attr("id").replace("smalllabel_", ""), 10);
			var tmpopts = opts;
			lt_selcountback();
			$.lt_method_data = {
				methodid: tmpopts.label[index].methodid,
				methodid1: tmpopts.label[index].methodid1,
				title: tmpopts.title,
				name: tmpopts.label[index].name,
				str: tmpopts.label[index].show_str,
				prize: tmpopts.label[index].prize,
				dyprize: tmpopts.label[index].dyprize,
				modes: $.lt_method_data.modes ? $.lt_method_data.modes : {},
				sp: tmpopts.label[index].code_sp,
				methoddesc: tmpopts.label[index].methoddesc,
				methodhelp: tmpopts.label[index].methodhelp,
				methodexample: tmpopts.label[index].methodexample,
				maxcodecount: tmpopts.label[index].maxcodecount
			};
			$("[id^='smalllabel_']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").removeClass('on');
			$(this).data("ischecked", "yes").addClass('on');
			$($.lt_id_data.id_selector).lt_selectarea(tmpopts.label[index].selectarea);
			$($.lt_id_data.id_sel_modes).empty();
			selmodes = getCookie("modes");
			$.each(tmpopts.label[index].modes, function (j, m) {
				$.lt_method_data.modes[m.modeid] = {
					name: m.name,
					rate: Number(m.rate)
				};
				if (selmodes == undefined) {
					selmodes = m.modeid;
				}
				var span = document.createElement('span');
				span.className = 'f-left unit ' + m.modeid;
				span.value = m.modeid;
				span.innerHTML = m.name;
				$($.lt_id_data.id_sel_modes).append(span);
			});
			$($.lt_id_data.id_sel_modes).attr('value', selmodes).find('.' + selmodes).addClass('on');
			$($.lt_id_data.id_sel_modes).children().click(function () {
				$(this).addClass('on').siblings('.on').removeClass('on').parent().attr('value', this.value);
				id_sel_modes_change();
			});
			dypoint = getCookie("dypoint");
			$($.lt_id_data.id_sel_prize).empty();
			if (tmpopts.label[index].dyprize.length == 1 && $.lt_isdyna == 1) {
				dyhtml = '<SELECT name="lt_sel_dyprize" id="lt_sel_dyprize" style="cursor:pointer">';
				$.each(tmpopts.label[index].dyprize[0].prize, function (j, m) {
					fsxiao =m.prize > faxiao? fsxiao :m.prize;fsda = (fsxiao/0.9)*fsbf + fsxiao ;bili = (fsda - fsxiao)/100;
					dyhtml += '<OPTION value="' + m.prize + "|" + m.point + '"' + (dypoint == m.point ? " selected" : "") + ">" + m.prize + "-" + (Math.ceil(m.point * 1000) / 10) + "%</OPTION>"
				});
				dyhtml += "</SELECT>";
				$($.lt_id_data.id_sel_prize).html('');
				$(dyhtml).appendTo($.lt_id_data.id_sel_prize)
			}
		})
	};
	var id_sel_modes_change = function () {
		var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
		var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
		var modes = parseInt($($.lt_id_data.id_sel_modes).attr('value'), 10);
		var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
		money = isNaN(money) ? 0 : money;
		$($.lt_id_data.id_sel_money).html(money);
	}
	var lt_selcountback = function () {
		$($.lt_id_data.id_sel_times).val(1);
		$($.lt_id_data.id_sel_money).html(0);
		$($.lt_id_data.id_sel_num).html(0)
	};
	$.fn.lt_selectarea = function (opts) {
		var ps = {
			type: "digital",
			layout: [{
				title: "\u767e\u4f4d",
				no: "0|1|2|3|4|5|6|7|8|9",
				place: 0,
				cols: 1
			}, {
				title: "\u5341\u4f4d",
				no: "0|1|2|3|4|5|6|7|8|9",
				place: 1,
				cols: 1
			}, {
				title: "\u4e2a\u4f4d",
				no: "0|1|2|3|4|5|6|7|8|9",
				place: 2,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: false
		};
		opts = $.extend({}, ps, opts || {});
		var data_sel = [];
		var minchosen = [];
		var max_place = 0;
		var otype = opts.type.toLowerCase();
		var methodname = $.lt_method[$.lt_method_data.methodid];
		var html = "";
		if (otype == "input") {
			var tempdes = "";
			switch (methodname) {
				case "LTZX3":
				case "LTZU3":
				case "LTZX2":
				case "LTZU2":
				case "LTRX1":
				case "LTRX2":
				case "LTRX3":
				case "LTRX4":
				case "LTRX5":
				case "LTRX6":
				case "LTRX7":
				case "LTRX8":
					tempdes = lot_lang.dec_s26;
					break;
				default:
					tempdes = lot_lang.dec_s4;
					break
			}
			html += '<div class="nbs single"><table class=ha><tr><td><textarea id="lt_write_box" class="danshi-box ml20 mt10 f-left"></textarea><br /></td></tr>' + '<tr><td class="total-bigbtns"><br/>' + tempdes + '<input id="lt_write_del" name="lt_write_del" class="button" type="button" value="删除重复号码">'  + '<input id="lt_write_import" name="lt_write_import" class="button" type="button" value="导入文件">' + '<input id="lt_write_empty" name="lt_write_empty" class="button" type="button" value="&nbsp;\u6e05&nbsp;&nbsp;\u7a7a&nbsp;">' + '</span></div>' + '</td></tr></table></div>';
			data_sel[0] = [];
			tempdes = null
		} else {
			if (otype == "digital") {
				$.each(opts.layout, function (i, n) {
					if (typeof (n) == "object") {
						n.place = parseInt(n.place, 10);
						max_place = n.place > max_place ? n.place : max_place;
						data_sel[n.place] = [];
						minchosen[n.place] = (typeof (n.minchosen) == "undefined") ? 1 : n.minchosen;
						if (i == 0) {
							html += '<li class="con-box-num-li" style="border-top:0px solid #fff;">';
						} else {
							html += '<li class="con-box-num-li">';
						}
						if (n.cols > 0) {
							html += '<span class="f-left con-title">';
							if (n.title.length > 0) {
								html += n.title
							}
							html += "</span>"
						} else {
							html += '<span class="f-left con-title"></span>';
						}
						html += '';
						numbers = n.no.split("|");
						j = numbers.length;
						for (i = 0; i < j; i++) {
							html += '<span class="f-left con-button" name="lt_place_' + n.place + '">' + numbers[i] + "</span>"
						}
						html += "</div>";
						if (opts.isButton == true) {
							if ((!opts.isDanTuo) || (opts.isDanTuo && n.place == 1)) {
								html += '<div class="control-btn f-right"><span class="f-left con-button dxjoq" name="all">' + lot_lang.bt_sel_all + '</span><span class="f-left con-button dxjoq" name="big">' + lot_lang.bt_sel_big + '</span><span class="f-left con-button dxjoq" name="small">' + lot_lang.bt_sel_small + '</span><span class="f-left con-button dxjoq" name="odd">' + lot_lang.bt_sel_odd + '</span><span class="f-left con-button dxjoq" name="even">' + lot_lang.bt_sel_even + '</span><span class="f-left con-button dxjoq" name="clean">' + lot_lang.bt_sel_clean + '</span></div>'
							}
						}
						html += "</li>";
					}
				})
			} else {
				if (otype == "dds") {
					$.each(opts.layout, function (i, n) {
						n.place = parseInt(n.place, 10);
						max_place = n.place > max_place ? n.place : max_place;
						data_sel[n.place] = [];
						if (i == 0) {
							html += '<li class="con-box-num-li" style="border-top:0px solid #fff;">';
						} else {
							html += '<li class="con-box-num-li">';
						}
						if (n.cols > 0) {
							html += '<span class="f-left con-title">';
							if (n.title.length > 0) {
								html += n.title
							}
							html += "</span>"
						}
						html += '';
						numbers = n.no.split("|");
						temphtml = "";
						if (n.prize) {
							tmpprize = n.prize.split(",")
						}
						j = numbers.length;
						for (i = 0; i < j; i++) {
							html += '<span class="f-left con-button con-sbutton" name="lt_place_' + n.place + '">' + numbers[i] + "</span>"
						}
						html += '<div class="control-btn f-right"><span class="f-left con-button dxjoq" name="clean">' + lot_lang.bt_sel_clean + '</span></div></li>';
						html += temphtml + "</div></li>";
					})
				}
			}
		}
		html += '';
		if (opts.isDanTuo) {
			$.lt_dantuo = true;
			$.lt_danlen = parseInt(methodname.substring(methodname.length - 1), 10)
		} else {
			$.lt_dantuo = false
		}
		$(this).html(html);
		$($.lt_id_data.id_desc).html($.lt_method_data.methoddesc);
		$("#lt_desc__").html($.lt_method_data.methodhelp);
		$("#lt_desc_").html($.lt_method_data.methodexample);
		var me = this;
		var _SortNum = function (a, b) {
			if (otype != "input") {
				a = a.replace(/5\u53550\u53cc/g, 0).replace(/4\u53551\u53cc/g, 1).replace(/3\u53552\u53cc/g, 2).replace(/2\u53553\u53cc/g, 3).replace(/1\u53554\u53cc/g, 4).replace(/0\u53555\u53cc/g, 5);
				b = b.replace(/5\u53550\u53cc/g, 0).replace(/4\u53551\u53cc/g, 1).replace(/3\u53552\u53cc/g, 2).replace(/2\u53553\u53cc/g, 3).replace(/1\u53554\u53cc/g, 4).replace(/0\u53555\u53cc/g, 5)
			}
			a = parseInt(a, 10);
			b = parseInt(b, 10);
			if (isNaN(a) || isNaN(b)) {
				return true
			}
			return (a - b)
		};
		var _SDinputCheck = function (n, len) {
			t = n.split(" ");
			l = t.length;
			for (i = 0; i < l; i++) {
				if (Number(t[i]) > 11 || Number(t[i]) < 1) {
					return false
				}
				for (j = i + 1; j < l; j++) {
					if (Number(t[i]) == Number(t[j])) {
						return false
					}
				}
			}
			return true
		};
		var _inputCheck_Num = function (l, e, fun, sort) {
			var nums = data_sel[0].length;
			var error = [];
			var newsel = [];
			var partn = "";
			l = parseInt(l, 10);
			switch (l) {
				case 2:
					partn = /^[0-9]{2}$/;
					break;
				case 5:
					partn = /^[0-9\s]{5}$/;
					break;
				case 8:
					partn = /^[0-9\s]{8}$/;
					break;
				case 11:
					partn = /^[0-9\s]{11}$/;
					break;
				case 14:
					partn = /^[0-9\s]{14}$/;
					break;
				case 17:
					partn = /^[0-9\s]{17}$/;
					break;
				case 20:
					partn = /^[0-9\s]{20}$/;
					break;
				case 23:
					partn = /^[0-9\s]{23}$/;
					break;
				default:
					partn = /^[0-9]{3}$/;
					break
			}
			fun = $.isFunction(fun) ? fun : function (s) {
				return true
			};
			$.each(data_sel[0], function (i, n) {
				n = $.trim(n);
				if (partn.test(n) && fun(n, l)) {
					if (sort) {
						if (n.indexOf(" ") == -1) {
							n = n.split("");
							n.sort(_SortNum);
							n = n.join("")
						} else {
							n = n.split(" ");
							n.sort(_SortNum);
							n = n.join(" ")
						}
					}
					data_sel[0][i] = n;
					newsel.push(n)
				} else {
					if (n.length > 0) {
						error.push(n)
					}
					nums = nums - 1
				}
			});
			if (e == true) {
				data_sel[0] = newsel;
				return error
			}
			return nums
		};

		function checkNum() {
			var nums = 0,
				mname = $.lt_method[$.lt_method_data.methodid];
			var modes = parseInt($($.lt_id_data.id_sel_modes).attr('value'), 10);
			if (otype == "input") {
				if (data_sel[0].length > 0) {
					switch (mname) {
						case "LTZX3":
							nums = _inputCheck_Num(8, false, _SDinputCheck, false);
							break;
						case "LTZU3":
							nums = _inputCheck_Num(8, false, _SDinputCheck, true);
							break;
						case "LTZX2":
							nums = _inputCheck_Num(5, false, _SDinputCheck, false);
							break;
						case "LTZU2":
							nums = _inputCheck_Num(5, false, _SDinputCheck, true);
							break;
						case "LTRX1":
							nums = _inputCheck_Num(2, false, _SDinputCheck, false);
							break;
						case "LTRX2":
							nums = _inputCheck_Num(5, false, _SDinputCheck, true);
							break;
						case "LTRX3":
							nums = _inputCheck_Num(8, false, _SDinputCheck, true);
							break;
						case "LTRX4":
							nums = _inputCheck_Num(11, false, _SDinputCheck, true);
							break;
						case "LTRX5":
							nums = _inputCheck_Num(14, false, _SDinputCheck, true);
							break;
						case "LTRX6":
							nums = _inputCheck_Num(17, false, _SDinputCheck, true);
							break;
						case "LTRX7":
							nums = _inputCheck_Num(20, false, _SDinputCheck, true);
							break;
						case "LTRX8":
							nums = _inputCheck_Num(23, false, _SDinputCheck, true);
							break;
						default:
							break
					}
				}
			} else {
				var tmp_nums = 1;
				switch (mname) {
					case "LTZX3":
						nums = 0;
						if (data_sel[0].length > 0 && data_sel[1].length > 0 && data_sel[2].length > 0) {
							for (i = 0; i < data_sel[0].length; i++) {
								for (j = 0; j < data_sel[1].length; j++) {
									for (k = 0; k < data_sel[2].length; k++) {
										if (data_sel[0][i] != data_sel[1][j] && data_sel[0][i] != data_sel[2][k] && data_sel[1][j] != data_sel[2][k]) {
											nums++
										}
									}
								}
							}
						}
						break;
					case "LTZX2":
						nums = 0;
						if (data_sel[0].length > 0 && data_sel[1].length > 0) {
							var h = Array.intersect(data_sel[0], data_sel[1]).length;
							nums = data_sel[0].length * data_sel[1].length - h
						}
						break;
					case "LTDWD":
					case "LTDDS":
						for (i = 0; i <= max_place; i++) {
							nums += data_sel[i].length
						}
						break;
					case "LTZU3":
					case "LTZU2":
					case "LTBDW":
					case "LTCZW":
					case "LTRX1":
					case "LTRX2":
					case "LTRX3":
					case "LTRX4":
					case "LTRX5":
					case "LTRX6":
					case "LTRX7":
					case "LTRX8":
						if (data_sel[0].length >= minchosen[0]) {
							nums += Combination(data_sel[0].length, minchosen[0])
						}
						break;
					case "LTDTZU3":
					case "LTDTZU2":
					case "LTRXDT2":
					case "LTRXDT3":
					case "LTRXDT4":
					case "LTRXDT5":
					case "LTRXDT6":
					case "LTRXDT7":
					case "LTRXDT8":
						var danlen = data_sel[0].length;
						var tuolen = data_sel[1].length;
						var sellen = mname.substring(mname.length - 1);
						if (danlen < 1 || tuolen < 1 || danlen >= sellen) {
							nums = 0
						} else {
							nums = Combination(tuolen, sellen - danlen)
						}
						break;
					default:
						for (i = 0; i <= max_place; i++) {
							if (data_sel[i].length == 0) {
								tmp_nums = 0;
								break;
								break
							}
							tmp_nums *= data_sel[i].length
						}
						nums = tmp_nums;
						break
				}
			}
			var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
			if (isNaN(times)) {
				times = 1;
				$($.lt_id_data.id_sel_times).val(1)
			}
			var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
			money = isNaN(money) ? 0 : money;
			$($.lt_id_data.id_sel_num).html(nums);
			$($.lt_id_data.id_sel_money).html(money)
		}
		var dumpNum = function (isdeal) {
			var l = data_sel[0].length;
			var err = [];
			var news = [];
			if (l == 0) {
				return err
			}
			if (l <= 5000) {
				for (i = 0; i < l; i++) {
					if ($.inArray(data_sel[0][i], err) != -1) {
						continue
					}
					for (j = i + 1; j < l; j++) {
						if (data_sel[0][i] == data_sel[0][j]) {
							err.push(data_sel[0][i]);
							break
						}
					}
					news.push(data_sel[0][i])
				}
				if (isdeal) {
					data_sel[0] = news
				}
			}
			return err
		};

		function _inptu_deal() {
			var s = $.trim($("#lt_write_box", $(me)).val());
			s = $.trim(s.replace(/[^\s\r,;\uff0c\uff1b\u3000\uff10\uff11\uff12\uff13\uff14\uff15\uff16\uff17\uff18\uff190-9]/g, ""));
			var m = s;
			switch (methodname) {
				case "LTZX3":
				case "LTZU3":
				case "LTZX2":
				case "LTZU2":
				case "LTRX1":
				case "LTRX2":
				case "LTRX3":
				case "LTRX4":
				case "LTRX5":
				case "LTRX6":
				case "LTRX7":
				case "LTRX8":
					s = s.replace(/[\r\n,;\uff0c\uff1b]/g, "|").replace(/(\|)+/g, "|");
					break;
				default:
					s = s.replace(/[\s\r,;\uff0c\uff1b\u3000]/g, "|").replace(/(\|)+/g, "|");
					break
			}
			s = s.replace(/\uff10/g, "0").replace(/\uff11/g, "1").replace(/\uff12/g, "2").replace(/\uff13/g, "3").replace(/\uff14/g, "4").replace(/\uff15/g, "5").replace(/\uff16/g, "6").replace(/\uff17/g, "7").replace(/\uff18/g, "8").replace(/\uff19/g, "9");
			if (s == "") {
				data_sel[0] = []
			} else {
				data_sel[0] = s.split("|")
			}
			return m
		}
		if (otype == "input") {
			$("#lt_write_del", $(me)).click(function () {
				var err = dumpNum(true);
				if (err.length > 0) {
					checkNum();
					switch (methodname) {
						case "LTZX3":
						case "LTZU3":
						case "LTZX2":
						case "LTZU2":
						case "LTRX1":
						case "LTRX2":
						case "LTRX3":
						case "LTRX4":
						case "LTRX5":
						case "LTRX6":
						case "LTRX7":
						case "LTRX8":
							$("#lt_write_box", $(me)).val(data_sel[0].join(";"));
							$.alert('<div class="datainfo">' + lot_lang.am_s3 + "\r" + err.join(";") + "\r </div>", "", "", 400);
							break;
						default:
							$("#lt_write_box", $(me)).val(data_sel[0].join(" "));
							$.alert('<div class="datainfo">' + lot_lang.am_s3 + "\r" + err.join(" ") + "\r </div>", "", "", 400);
							break
					}
				} else {
					$.alert(lot_lang.am_s4)
				}
			});
			$("#lt_write_import", $(me)).click(function () {
				$.ajaxUploadUI({
					title: lot_lang.dec_s27,
					url: "/FileUpload.shtml",
					loadok: lot_lang.dec_s28,
					filetype: ["txt", "csv"],
					success: function (data) {
						data = "<pre>" + data.replace(/<[^>]+>/g, "") + "</pre>";
						$("#lt_write_box", $(me)).val(data).change()
					},
					onfinish: function () {
						$("#lt_write_box", $(me)).focus()
					}
				})
			});
			$("#lt_write_box", $(me)).change(function () {
				var s = _inptu_deal();
				$(this).val(s);
				checkNum()
			}).keyup(function () {
				_inptu_deal();
				checkNum()
			});
			$("#lt_write_empty", $(me)).click(function () {
				data_sel[0] = [];
				$("#lt_write_box", $(me)).val("");
				checkNum()
			})
		}

		function selectNum(obj, isButton) {
			if ($(obj).hasClass('on')) {
				return
			}
			$(obj).addClass('on');
			place = Number($(obj).attr("name").replace("lt_place_", ""));
			var number = $.trim($(obj).text());
			if ($.lt_dantuo) {
				if (data_sel[0].length + 1 >= $.lt_danlen && place == 0) {
					var lastnumber = data_sel[0][data_sel[0].length - 1];
					$.each($('[name="lt_place_0"][class="f-left con-button on"]'), function (i, n) {
						if ($(this).html() == lastnumber) {
							$(this).attr("class", "f-left con-button");
							data_sel[0] = $.grep(data_sel[0], function (n, i) {
								return n == lastnumber
							}, true)
						}
					})
				}
				var unplace = 1 - place;
				if (data_sel[unplace].contains(number)) {
					$.each($('[name="lt_place_' + unplace + '"][class="f-left con-button on"]'), function (i, n) {
						if ($(this).html() == number) {
							$(this).attr("class", "f-left con-button");
							data_sel[unplace] = $.grep(data_sel[unplace], function (n, i) {
								return n == number
							}, true)
						}
					})
				}
			}
			data_sel[place].push(number);
			if (!isButton) {
				checkNum()
			}
		}

		function unSelectNum(obj, isButton) {
			if (!$(obj).hasClass('on')) {
				return
			}
			$(obj).removeClass('on');
			place = Number($(obj).attr("name").replace("lt_place_", ""));
			var number = $.trim($(obj).text());
			data_sel[place] = $.grep(data_sel[place], function (n, i) {
				return n == number
			}, true);
			if (!isButton) {
				checkNum()
			}
		}

		function changeNoCss(obj) {
			if ($(obj).hasClass('on')) {
				unSelectNum(obj, false)
			} else {
				selectNum(obj, false)
			}
		}

		function selectOdd(obj) {
			if (Number($(obj).text()) % 2 == 1) {
				selectNum(obj, true)
			} else {
				unSelectNum(obj, true)
			}
		}

		function selectEven(obj) {
			if (Number($(obj).text()) % 2 == 0) {
				selectNum(obj, true)
			} else {
				unSelectNum(obj, true)
			}
		}

		function selectBig(i, obj) {
			if (i >= opts.noBigIndex) {
				selectNum(obj, true)
			} else {
				unSelectNum(obj, true)
			}
		}

		function selectSmall(i, obj) {
			if (i < opts.noBigIndex) {
				selectNum(obj, true)
			} else {
				unSelectNum(obj, true)
			}
		}
		$(this).find("[name^='lt_place_']").click(function () {
			changeNoCss(this);
			$(".dxjoq", $(this).closest("li")).removeClass('on');
		});
		if (opts.isButton == true || otype == "dxds") {
			$(".dxjoq", $(this)).click(function () {
				$(".dxjoq", $(this).parent()).removeClass('on');
				$(this).addClass('on');
				switch ($(this).attr("name")) {
					case "all":
						$.each($(this).closest("li").find("[name^='lt_place_']"), function (i, n) {
							selectNum(n, true)
						});
						break;
					case "big":
						$.each($(this).closest("li").find("[name^='lt_place_']"), function (i, n) {
							selectBig(i, n)
						});
						break;
					case "small":
						$.each($(this).closest("li").find("[name^='lt_place_']"), function (i, n) {
							selectSmall(i, n)
						});
						break;
					case "odd":
						$.each($(this).closest("li").find("[name^='lt_place_']"), function (i, n) {
							selectOdd(n)
						});
						break;
					case "even":
						$.each($(this).closest("li").find("[name^='lt_place_']"), function (i, n) {
							selectEven(n)
						});
						break;
					case "clean":
						$(this).removeClass('on');
						$.each($(this).closest("li").find("[name^='lt_place_']"), function (i, n) {
							unSelectNum(n, true)
						});
					default:
						break
				}
				checkNum()
			})
		}
		$($.lt_id_data.id_sel_times).keyup(function () {
			var times = $(this).val().replace(/[^0-9]/g, "").substring(0, 5);
			if (times == "") {
				times = 0
			} else {
				times = parseInt(times, 10)
			}
			var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
			var modes = parseInt($($.lt_id_data.id_sel_modes).attr('value'), 10);
			var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
			money = isNaN(money) ? 0 : money;
			$($.lt_id_data.id_sel_money).html(money);
			$(this).val(times)
		});
		$($.lt_id_data.id_sel_times).nextAll("a").click(function () {
			$($.lt_id_data.id_sel_times).val($(this).html()).keyup()
		});
		$($.lt_id_data.id_reduce_times).unbind("click").click(function () {
			var times = Math.round(parseInt($($.lt_id_data.id_sel_times).val(), 10) - 1);
			if (times < 1) {
				times = 1
			}
			$($.lt_id_data.id_sel_times).val(times).keyup()
		});
		$($.lt_id_data.id_plus_times).unbind("click").click(function () {
			var times = Math.round(parseInt($($.lt_id_data.id_sel_times).val(), 10) + 1);
			if (times > 99999) {
				times = 99999
			}
			$($.lt_id_data.id_sel_times).val(times).keyup()
		});
		$($.lt_id_data.id_sel_insert).unbind("click").click(function () {
			var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
			var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
			var modes = parseInt($($.lt_id_data.id_sel_modes).attr('value'), 10);
			var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
			var mid = $.lt_method_data.methodid;
			var mid1 = $.lt_method_data.methodid1;
			var current_methodtitle = $.lt_method_data.title;
			var current_methodname = $.lt_method_data.name;
			if (isNaN(nums) || isNaN(times) || isNaN(money) || money <= 0) {
				$.alert(otype == "input" ? lot_lang.am_s29 : lot_lang.am_s19);
				return
			}
			if (otype == "input") {
				var mname = $.lt_method[mid];
				var error = [];
				var edump = [];
				var ermsg = "";
				edump = dumpNum(true);
				if (edump.length > 0) {
					ermsg += lot_lang.em_s2 + "\n" + edump.join(", ") + "\r ";
					checkNum();
					nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
					money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000
				}
				switch (mname) {
					case "LTZX3":
						error = _inputCheck_Num(8, true, _SDinputCheck, false);
						break;
					case "LTZU3":
						error = _inputCheck_Num(8, true, _SDinputCheck, true);
						break;
					case "LTZX2":
						error = _inputCheck_Num(5, true, _SDinputCheck, false);
						break;
					case "LTZU2":
						error = _inputCheck_Num(5, true, _SDinputCheck, true);
						break;
					case "LTRX1":
						error = _inputCheck_Num(2, true, _SDinputCheck, false);
						break;
					case "LTRX2":
						error = _inputCheck_Num(5, true, _SDinputCheck, true);
						break;
					case "LTRX3":
						error = _inputCheck_Num(8, true, _SDinputCheck, true);
						break;
					case "LTRX4":
						error = _inputCheck_Num(11, true, _SDinputCheck, true);
						break;
					case "LTRX5":
						error = _inputCheck_Num(14, true, _SDinputCheck, true);
						break;
					case "LTRX6":
						error = _inputCheck_Num(17, true, _SDinputCheck, true);
						break;
					case "LTRX7":
						error = _inputCheck_Num(20, true, _SDinputCheck, true);
						break;
					case "LTRX8":
						error = _inputCheck_Num(23, true, _SDinputCheck, true);
						break;
					default:
						break
				}
				if (error.length > 0) {
					ermsg += lot_lang.em_s1 + "\n" + error.join(", ") + "\r "
				}
				if (ermsg.length > 1) {
					$.alert("<div class='datainfo'>" + ermsg + "</div>", "", "", 400)
				}
			}
			var nos = $.lt_method_data.str;
			var serverdata = "{'type':'" + otype + "','methodid':" + mid1 + ",'codes':'";
			var temp = [];
			for (i = 0; i < data_sel.length; i++) {
				if (otype == "input") {
					nos = nos.replace("X", data_sel[i].sort(_SortNum).join("|"))
				} else {
					nos = nos.replace("X", data_sel[i].sort(_SortNum).join($.lt_method_data.sp.replace("s", " ")))
				}
				temp.push(data_sel[i].sort(_SortNum).join("&"))
			}
			if (nos.length > 40) {
				var nohtml = nos.substring(0, 35) + "..."
			} else {
				var nohtml = nos
			}
			if ($.lt_same_code[mid] != undefined && $.lt_same_code[mid][modes] != undefined && $.lt_same_code[mid][modes].length > 0) {
				if ($.inArray(temp.join("|"), $.lt_same_code[mid][modes]) != -1) {
					$.alert(lot_lang.am_s28);
					return false
				}
			}
			var sel_isdy = false;
			var sel_prize = 0;
			var sel_point = 1;
			if ($.lt_method_data.dyprize.length == 1 && $.lt_isdyna == 1) {
				if ($("#lt_sel_dyprize") == undefined) {
					$.alert(lot_lang.am_s27);
					return false
				}
				var sel_dy = $("#lt_sel_dyprize").val();
				sel_dy = sel_dy.split("|");
				if (sel_dy[1] == undefined) {
					$.alert(lot_lang.am_s27);
					return false
				}
				sel_isdy = true;
				sel_prize = Math.round(Number(sel_dy[0]) * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
				sel_point = Number(sel_dy[1])
			}
			noshtml = "[" + $.lt_method_data.title + "," + $.lt_method_data.name + "] " + nohtml;
			var myDate = new Date();
			var curTimes = myDate.getTime();
			var code01 = temp.join("|");
			var zipFlag = '0';
			var codesZip = '';
			var zipConFlag = false;
			if (otype == "input") {
				if (nums > 5000) {
					zipConFlag = true;
				}
			}
			if (zipConFlag) {
				var compression_mode = 6,
					my_lzma = new LZMA("/js/lzma/lzma_worker.js");
				my_lzma.compress(code01, compression_mode, function (result) {
					codesZip = convert_to_formated_hex(result);
					serverdata += codesZip + "','zip':" + 1 + ",'nums':" + nums + ",'times':" + times + ",'money':" + money + ",'mode':" + modes + ",'point':'" + sel_point + "','desc':'" + noshtml + "','curtimes':'" + curTimes + "'}";
					var _codes = '';
					if (temp.length == 1) {
						_codes = temp.join("").replace(/&/g, ',');
					} else {
						_codes = temp.join(",").replace(/&/g, '');
					}
					var cfhtml = [];
					cfhtml.push('<li class="total-table-l-li">');
					cfhtml.push('<span class="span01">' + ($.lt_method_data.title + "," + $.lt_method_data.name) + '</span>');
					cfhtml.push('<span class="span02">' + (_codes.length > 10 ? _codes.substring(0, 10) + "..." : _codes) + '</span>');
					cfhtml.push('<span class="span03">' + $.lt_method_data.modes[modes].name + '</span>');
					cfhtml.push('<span class="span04">' + nums + '注' + '</span>');
					cfhtml.push('<span class="span04">' + times + '倍' +'</span>');
					cfhtml.push('<span class="span05">' + money + lot_lang.dec_s3 + '</span>');
					cfhtml.push('<span class="span07">' + $('#wheel_number_jj span').html() +'/'+ $('#wheel_number_pl span').html() + '</span>');
					cfhtml.push('<span class="span06 delete-btn"></span>');
					cfhtml.push('<input type="hidden" name="lt_project[]" value="' + serverdata + '" /></li>');
					var $cfhtml = $(cfhtml.join(''));
					if ($.lt_total_nums == 0) {
						$($.lt_id_data.id_cf_content).html('');
					}
					$($.lt_id_data.id_cf_content).prepend($cfhtml);
					/*$('.span01', $cfhtml).parent().click(function () {
						var sss = '<h4 style="text-align:left;">' + lot_lang.dec_s30 + ": " + current_methodtitle + "_" + current_methodname + "<br/>" + lot_lang.dec_s32 + ": " + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (", " + lot_lang.dec_s33 + " " + sel_prize + ", " + lot_lang.dec_s34 + " " + (Math.ceil(sel_point * 1000) / 10) + "%") : "") + "<br/>" + lot_lang.dec_s35 + " " + nums + " " + lot_lang.dec_s1 + ", " + times + " " + lot_lang.dec_s2 + ", " + lot_lang.dec_s36 + " " + money + " " + lot_lang.dec_s3 + "</h4>";
						sss += '<div class="data" style="height:60px;"><table border=0 cellspacing=0 cellpadding=0><tr><td>' + nos + "</td></tr></table></div>";
						$.alert(sss, lot_lang.dec_s5, "", 400, false)
					});*/
					$.lt_total_nums += nums;
					$.lt_total_money += money;
					$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
					basemoney = Math.round(nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
					$.lt_trace_base = Math.round(($.lt_trace_base + basemoney) * 1000) / 1000;
					$($.lt_id_data.id_cf_num).html($.lt_total_nums);
					$($.lt_id_data.id_cf_money).html($.lt_total_money);
					$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) + 1);
					var pc = 0;
					var pz = 0;
					$.each($.lt_method_data.prize, function (i, n) {
						n = isNaN(Number(n)) ? 0 : Number(n);
						pz = pz > n ? pz : n;
						pc++
					});
					if (pc != 1) {
						pz = 0
					}
					pz = Math.round(pz * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
					pz = sel_isdy ? sel_prize : pz;
					$cfhtml.data("data", {
						methodid: mid,
						methodname: $.lt_method_data.title + "," + $.lt_method_data.name,
						nums: nums,
						money: money,
						modes: modes,
						modename: $.lt_method_data.modes[modes].name,
						basemoney: basemoney,
						prize: pz,
						code: temp.join("|"),
						desc: nohtml
					});
					if ($.lt_same_code[mid] == undefined) {
						$.lt_same_code[mid] = []
					}
					if ($.lt_same_code[mid][modes] == undefined) {
						$.lt_same_code[mid][modes] = []
					}
					$.lt_same_code[mid][modes].push(temp.join("|"));
					$(".span06", $cfhtml).attr("title", lot_lang.dec_s24).click(function () {
						var n = $cfhtml.data("data").nums;
						var m = $cfhtml.data("data").money;
						var b = $cfhtml.data("data").basemoney;
						var c = $cfhtml.data("data").code;
						var d = $cfhtml.data("data").methodid;
						var f = $cfhtml.data("data").modes;
						var i = null;
						$.each($.lt_same_code[d][f], function (k, code) {
							if (code == c) {
								i = k
							}
						});
						if (i != null) {
							$.lt_same_code[d][f].splice(i, 1)
						} else {
							$.alert(lot_lang.am_s27);
							return
						}
						$.lt_total_nums -= n;
						$.lt_total_money -= m;
						$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
						$.lt_trace_base = Math.round(($.lt_trace_base - b) * 1000) / 1000;
						$(this).parent().remove();
						if ($.lt_total_nums == 0) {
							//$($.lt_id_data.id_cf_content).append('<li class="item none">暂无投注项</li>');
						}
						$($.lt_id_data.id_cf_num).html($.lt_total_nums);
						$($.lt_id_data.id_cf_money).html($.lt_total_money);
						$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) - 1);
						cleanTraceIssue();
						if ($.lt_ismargin == false) {
							traceCheckMarginSup()
						}
						$(this).parent().closeFloat()
					});
					SetCookie("modes", modes, 86400);
					SetCookie("dypoint", sel_point, 86400);
					for (i = 0; i < data_sel.length; i++) {
						data_sel[i] = []
					}
					if (otype == "input") {
						$("#lt_write_box", $(me)).val("")
					} else {
						if (otype == "digital" || otype == "dxds" || otype == "dds") {
							$("span", $(me)).filter(".on").removeClass("on");
						}
					}
					$($.lt_id_data.id_sel_times).val(1);
					checkNum();
					cleanTraceIssue();
					if ($.lt_ismargin == true) {
						traceCheckMarginSup()
					}
				});
			} else {
				serverdata += temp.join(",") + "','zip':" + 0 + ",'nums':" + nums + ",'times':" + times + ",'money':" + money + ",'mode':" + modes + ",'point':'" + sel_point + "','desc':'" + noshtml + "','curtimes':'" + curTimes + "'}";
				var _codes = '';
				if (temp.length == 1) {
					_codes = temp.join("").replace(/&/g, ',');
				} else {
					_codes = temp.join(",").replace(/&/g, '');
				}
				var cfhtml = [];
				cfhtml.push('<li class="total-table-l-li">');
				cfhtml.push('<span class="span01">' + ($.lt_method_data.title + "," + $.lt_method_data.name) + '</span>');
				cfhtml.push('<span class="span02">' + (_codes.length > 10 ? _codes.substring(0, 10) + "..." : _codes) + '</span>');
				cfhtml.push('<span class="span03">' + $.lt_method_data.modes[modes].name + '</span>');
				cfhtml.push('<span class="span04">' + nums + '注' + '</span>');
				cfhtml.push('<span class="span04">' + times + '倍' +'</span>');
				cfhtml.push('<span class="span05">' + money + lot_lang.dec_s3 + '</span>');
				cfhtml.push('<span class="span07">' + $('#wheel_number_jj span').html() +'/'+ $('#wheel_number_pl span').html() + '</span>');
				cfhtml.push('<span class="span06 delete-btn"></span>');
				cfhtml.push('<input type="hidden" name="lt_project[]" value="' + serverdata + '" /></li>');
				var $cfhtml = $(cfhtml.join(''));
				if ($.lt_total_nums == 0) {
					$($.lt_id_data.id_cf_content).html('');
				}
				$($.lt_id_data.id_cf_content).prepend($cfhtml);
				/*$('.span01', $cfhtml).parent().click(function () {
					var sss = '<h4 style="text-align:left;">' + lot_lang.dec_s30 + ": " + current_methodtitle + "_" + current_methodname + "<br/>" + lot_lang.dec_s32 + ": " + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (", " + lot_lang.dec_s33 + " " + sel_prize + ", " + lot_lang.dec_s34 + " " + (Math.ceil(sel_point * 1000) / 10) + "%") : "") + "<br/>" + lot_lang.dec_s35 + " " + nums + " " + lot_lang.dec_s1 + ", " + times + " " + lot_lang.dec_s2 + ", " + lot_lang.dec_s36 + " " + money + " " + lot_lang.dec_s3 + "</h4>";
					sss += '<div class="data" style="height:60px;"><table border=0 cellspacing=0 cellpadding=0><tr><td>' + nos + "</td></tr></table></div>";
					$.alert(sss, lot_lang.dec_s5, "", 400, false)
				});*/
				$.lt_total_nums += nums;
				$.lt_total_money += money;
				$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
				basemoney = Math.round(nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
				$.lt_trace_base = Math.round(($.lt_trace_base + basemoney) * 1000) / 1000;
				$($.lt_id_data.id_cf_num).html($.lt_total_nums);
				$($.lt_id_data.id_cf_money).html($.lt_total_money);
				$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) + 1);
				var pc = 0;
				var pz = 0;
				$.each($.lt_method_data.prize, function (i, n) {
					n = isNaN(Number(n)) ? 0 : Number(n);
					pz = pz > n ? pz : n;
					pc++
				});
				if (pc != 1) {
					pz = 0
				}
				pz = Math.round(pz * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
				pz = sel_isdy ? sel_prize : pz;
				$cfhtml.data("data", {
					methodid: mid,
					methodname: $.lt_method_data.title + "," + $.lt_method_data.name,
					nums: nums,
					money: money,
					modes: modes,
					modename: $.lt_method_data.modes[modes].name,
					basemoney: basemoney,
					prize: pz,
					code: temp.join("|"),
					desc: nohtml
				});
				if ($.lt_same_code[mid] == undefined) {
					$.lt_same_code[mid] = []
				}
				if ($.lt_same_code[mid][modes] == undefined) {
					$.lt_same_code[mid][modes] = []
				}
				$.lt_same_code[mid][modes].push(temp.join("|"));
				$(".span06", $cfhtml).attr("title", lot_lang.dec_s24).click(function () {
					var n = $cfhtml.data("data").nums;
					var m = $cfhtml.data("data").money;
					var b = $cfhtml.data("data").basemoney;
					var c = $cfhtml.data("data").code;
					var d = $cfhtml.data("data").methodid;
					var f = $cfhtml.data("data").modes;
					var i = null;
					$.each($.lt_same_code[d][f], function (k, code) {
						if (code == c) {
							i = k
						}
					});
					if (i != null) {
						$.lt_same_code[d][f].splice(i, 1)
					} else {
						$.alert(lot_lang.am_s27);
						return
					}
					$.lt_total_nums -= n;
					$.lt_total_money -= m;
					$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
					$.lt_trace_base = Math.round(($.lt_trace_base - b) * 1000) / 1000;
					$(this).parent().remove();
					if ($.lt_total_nums == 0) {
						//$($.lt_id_data.id_cf_content).append('<li class="item none">暂无投注项</li>');
					}
					$($.lt_id_data.id_cf_num).html($.lt_total_nums);
					$($.lt_id_data.id_cf_money).html($.lt_total_money);
					$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) - 1);
					cleanTraceIssue();
					if ($.lt_ismargin == false) {
						traceCheckMarginSup()
					}
					$(this).parent().closeFloat()
				});
				SetCookie("modes", modes, 86400);
				SetCookie("dypoint", sel_point, 86400);
				for (i = 0; i < data_sel.length; i++) {
					data_sel[i] = []
				}
				if (otype == "input") {
					$("#lt_write_box", $(me)).val("")
				} else {
					if (otype == "digital" || otype == "dxds" || otype == "dds") {
						$("span", $(me)).filter(".on").removeClass("on");
					}
				}
				$($.lt_id_data.id_sel_times).val(1);
				checkNum();
				cleanTraceIssue();
				if ($.lt_ismargin == true) {
					traceCheckMarginSup()
				}
			}
		});
		$.fn.extend({
			fastBet: function () {
				var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
				var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
				var modes = parseInt($($.lt_id_data.id_sel_modes).attr('value'), 10);
				var money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
				var mid = $.lt_method_data.methodid;
				var mid1 = $.lt_method_data.methodid1;
				var current_methodtitle = $.lt_method_data.title;
				var current_methodname = $.lt_method_data.name;
				if (isNaN(nums) || isNaN(times) || isNaN(money) || money <= 0) {
					$.alert(otype == "input" ? lot_lang.am_s29 : lot_lang.am_s19);
					return
				}
				if (otype == "input") {
					var mname = $.lt_method[mid];
					var error = [];
					var edump = [];
					var ermsg = "";
					edump = dumpNum(true);
					if (edump.length > 0) {
						ermsg += lot_lang.em_s2 + "\n" + edump.join(", ") + "\r ";
						checkNum();
						nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);
						money = Math.round(times * nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000
					}
					switch (mname) {
						case "LTZX3":
							error = _inputCheck_Num(8, true, _SDinputCheck, false);
							break;
						case "LTZU3":
							error = _inputCheck_Num(8, true, _SDinputCheck, true);
							break;
						case "LTZX2":
							error = _inputCheck_Num(5, true, _SDinputCheck, false);
							break;
						case "LTZU2":
							error = _inputCheck_Num(5, true, _SDinputCheck, true);
							break;
						case "LTRX1":
							error = _inputCheck_Num(2, true, _SDinputCheck, false);
							break;
						case "LTRX2":
							error = _inputCheck_Num(5, true, _SDinputCheck, true);
							break;
						case "LTRX3":
							error = _inputCheck_Num(8, true, _SDinputCheck, true);
							break;
						case "LTRX4":
							error = _inputCheck_Num(11, true, _SDinputCheck, true);
							break;
						case "LTRX5":
							error = _inputCheck_Num(14, true, _SDinputCheck, true);
							break;
						case "LTRX6":
							error = _inputCheck_Num(17, true, _SDinputCheck, true);
							break;
						case "LTRX7":
							error = _inputCheck_Num(20, true, _SDinputCheck, true);
							break;
						case "LTRX8":
							error = _inputCheck_Num(23, true, _SDinputCheck, true);
							break;
						default:
							break
					}
					if (error.length > 0) {
						ermsg += lot_lang.em_s1 + "\n" + error.join(", ") + "\r "
					}
					if (ermsg.length > 1) {
						$.alert("<div class='datainfo'>" + ermsg + "</div>", "", "", 400)
					}
				}
				var nos = $.lt_method_data.str;
				var serverdata = "{'type':'" + otype + "','methodid':" + mid1 + ",'codes':'";
				var temp = [];
				for (i = 0; i < data_sel.length; i++) {
					if (otype == "input") {
						nos = nos.replace("X", data_sel[i].sort(_SortNum).join("|"))
					} else {
						nos = nos.replace("X", data_sel[i].sort(_SortNum).join($.lt_method_data.sp.replace("s", " ")))
					}
					temp.push(data_sel[i].sort(_SortNum).join("&"))
				}
				if (nos.length > 40) {
					var nohtml = nos.substring(0, 35) + "..."
				} else {
					var nohtml = nos
				}
				if ($.lt_same_code[mid] != undefined && $.lt_same_code[mid][modes] != undefined && $.lt_same_code[mid][modes].length > 0) {
					if ($.inArray(temp.join("|"), $.lt_same_code[mid][modes]) != -1) {
						$.alert(lot_lang.am_s28);
						return false
					}
				}
				var sel_isdy = false;
				var sel_prize = 0;
				var sel_point = 1;
				if ($.lt_method_data.dyprize.length == 1 && $.lt_isdyna == 1) {
					if ($("#lt_sel_dyprize") == undefined) {
						$.alert(lot_lang.am_s27);
						return false
					}
					var sel_dy = $("#lt_sel_dyprize").val();
					sel_dy = sel_dy.split("|");
					if (sel_dy[1] == undefined) {
						$.alert(lot_lang.am_s27);
						return false
					}
					sel_isdy = true;
					sel_prize = Math.round(Number(sel_dy[0]) * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
					sel_point = Number(sel_dy[1])
				}
				noshtml = "[" + $.lt_method_data.title + "," + $.lt_method_data.name + "] " + nohtml;
				var myDate = new Date();
				var curTimes = myDate.getTime();
				var code01 = temp.join("|");
				var zipFlag = '0';
				var codesZip = '';
				var zipConFlag = false;
				if (otype == "input") {
					if (nums > 5000) {
						zipConFlag = true;
					}
				}
				if (zipConFlag) {
					var compression_mode = 6,
						my_lzma = new LZMA("/js/lzma/lzma_worker.js");
					my_lzma.compress(code01, compression_mode, function (result) {
						codesZip = convert_to_formated_hex(result);
						serverdata += codesZip + "','zip':" + 1 + ",'nums':" + nums + ",'times':" + times + ",'money':" + money + ",'mode':" + modes + ",'point':'" + sel_point + "','desc':'" + noshtml + "','curtimes':'" + curTimes + "'}";
						var _codes = '';
						if (temp.length == 1) {
							_codes = temp.join("").replace(/&/g, '|');
						} else {
							_codes = temp.join("|").replace(/&/g, '');
						}
						var cfhtml = [];
						cfhtml.push('<li class="item">');
						cfhtml.push('<span class="td01">' + ($.lt_method_data.title + "," + $.lt_method_data.name) + '</span>');
						cfhtml.push('<span class="td02">' + _codes + '</span>');
						cfhtml.push('<span class="td03">' + $.lt_method_data.modes[modes].name + '</span>');
						cfhtml.push('<span class="td04">' + nums + '</span>');
						cfhtml.push('<span class="td05">' + times + '</span>');
						cfhtml.push('<span class="td06">' + money + lot_lang.dec_s3 + '</span>');
						cfhtml.push('<span class="td07 last"><img src="images/cathectic/pic12.png"/></span>');
						cfhtml.push('<input type="hidden" name="lt_project[]" value="' + serverdata + '" /></li>');
						var $cfhtml = $(cfhtml.join(''));
						if ($.lt_total_nums == 0) {
							$($.lt_id_data.id_cf_content).children().filter(".item").remove();
						}
						$($.lt_id_data.id_cf_content).find('li.first').after($cfhtml);
						$('.td01', $cfhtml).parent().click(function () {
							var sss = '<h4 style="text-align:left;">' + lot_lang.dec_s30 + ": " + current_methodtitle + "," + current_methodname + "<br/>" + lot_lang.dec_s32 + ": " + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (", " + lot_lang.dec_s33 + " " + sel_prize + ", " + lot_lang.dec_s34 + " " + (Math.ceil(sel_point * 1000) / 10) + "%") : "") + "<br/>" + lot_lang.dec_s35 + " " + nums + " " + lot_lang.dec_s1 + ", " + times + " " + lot_lang.dec_s2 + ", " + lot_lang.dec_s36 + " " + money + " " + lot_lang.dec_s3 + "</h4>";
							sss += '<div class="data" style="height:60px;"><table border=0 cellspacing=0 cellpadding=0><tr><td>' + nos + "</td></tr></table></div>";
							$.alert(sss, lot_lang.dec_s5, "", 400, false)
						});
						$.lt_total_nums += nums;
						$.lt_total_money += money;
						$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
						basemoney = Math.round(nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
						$.lt_trace_base = Math.round(($.lt_trace_base + basemoney) * 1000) / 1000;
						$($.lt_id_data.id_cf_num).html($.lt_total_nums);
						$($.lt_id_data.id_cf_money).html($.lt_total_money);
						$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) + 1);
						var pc = 0;
						var pz = 0;
						$.each($.lt_method_data.prize, function (i, n) {
							n = isNaN(Number(n)) ? 0 : Number(n);
							pz = pz > n ? pz : n;
							pc++
						});
						if (pc != 1) {
							pz = 0
						}
						pz = Math.round(pz * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
						pz = sel_isdy ? sel_prize : pz;
						$cfhtml.data("data", {
							methodid: mid,
							methodname: $.lt_method_data.title + "," + $.lt_method_data.name,
							nums: nums,
							money: money,
							modes: modes,
							modename: $.lt_method_data.modes[modes].name,
							basemoney: basemoney,
							prize: pz,
							code: temp.join("|"),
							desc: nohtml
						});
						if ($.lt_same_code[mid] == undefined) {
							$.lt_same_code[mid] = []
						}
						if ($.lt_same_code[mid][modes] == undefined) {
							$.lt_same_code[mid][modes] = []
						}
						$.lt_same_code[mid][modes].push(temp.join("|"));
						$(".td07", $cfhtml).attr("title", lot_lang.dec_s24).click(function () {
							var n = $cfhtml.data("data").nums;
							var m = $cfhtml.data("data").money;
							var b = $cfhtml.data("data").basemoney;
							var c = $cfhtml.data("data").code;
							var d = $cfhtml.data("data").methodid;
							var f = $cfhtml.data("data").modes;
							var i = null;
							$.each($.lt_same_code[d][f], function (k, code) {
								if (code == c) {
									i = k
								}
							});
							if (i != null) {
								$.lt_same_code[d][f].splice(i, 1)
							} else {
								$.alert(lot_lang.am_s27);
								return
							}
							$.lt_total_nums -= n;
							$.lt_total_money -= m;
							$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
							$.lt_trace_base = Math.round(($.lt_trace_base - b) * 1000) / 1000;
							$(this).parent().remove();
							if ($.lt_total_nums == 0) {
								//$($.lt_id_data.id_cf_content).append('<li class="item none">暂无投注项</li>');
							}
							$($.lt_id_data.id_cf_num).html($.lt_total_nums);
							$($.lt_id_data.id_cf_money).html($.lt_total_money);
							$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) - 1);
							cleanTraceIssue();
							if ($.lt_ismargin == false) {
								traceCheckMarginSup()
							}
							$(this).parent().closeFloat()
						});
						SetCookie("modes", modes, 86400);
						SetCookie("dypoint", sel_point, 86400);
						for (i = 0; i < data_sel.length; i++) {
							data_sel[i] = []
						}
						if (otype == "input") {
							$("#lt_write_box", $(me)).val("")
						} else {
							if (otype == "digital" || otype == "dxds" || otype == "dds" || otype == "digitalts") {
								$("span", $(me)).filter(".on").removeClass("on");
							}
						}
						$($.lt_id_data.id_sel_times).val(1);
						checkNum();
						cleanTraceIssue();
						if ($.lt_ismargin == true) {
							traceCheckMarginSup()
						}
						if ($('.layui-layer').length == 0 && $.lt_total_nums && $.lt_total_money) {
							$("#lt_total_nums").val($.lt_total_nums);
							$("#lt_total_money").val($.lt_total_money);
							$('#tk02').show();
							$('#td02_money').html($.lt_total_money);
							$('#tk02_content').html($('#lt_cf_content').html())
							$('.reveal-modal-close').on('click', function () {
								$(this).parents('.reveal-modal').parent().hide();
							});
							//订单提交事件
                                                        $('.alert-logo i').html($('#logo_img').html());
                                                        $(".alert-txt span em").html($('#current_issue').html());
                                                        $('#tk02 .reveal-modal-submit').unbind('click').on('click', function () {
                                                        $(this).parents('.alert-box').hide();
                                                        if(Number($('#td02_money').html()) <= Number($('#money span').html())){
                                                              ajaxSubmit(me);
                                                              list1Data();
                                                              $('#money').click();
                                                           }else {
                                                                   $.alert('账户资金不足');
                                                           };

                                                        });
						}
					});
				} else {
					serverdata += temp.join(",") + "','zip':" + 0 + ",'nums':" + nums + ",'times':" + times + ",'money':" + money + ",'mode':" + modes + ",'point':'" + sel_point + "','desc':'" + noshtml + "','curtimes':'" + curTimes + "'}";
					var _codes = '';
					if (temp.length == 1) {
						_codes = temp.join("").replace(/&/g, ',');
					} else {
						_codes = temp.join(",").replace(/&/g, '');
					}
					var cfhtml = [];
					cfhtml.push('<li class="total-table-l-li">');
					cfhtml.push('<span class="span01">' + ($.lt_method_data.title + "," + $.lt_method_data.name) + '</span>');
					cfhtml.push('<span class="span02">' + (_codes.length > 10 ? _codes.substring(0, 10) + "..." : _codes) + '</span>');
					cfhtml.push('<span class="span03">' + $.lt_method_data.modes[modes].name + '</span>');
					cfhtml.push('<span class="span04">' + nums + '注' + '</span>');
					cfhtml.push('<span class="span04">' + times + '倍' +'</span>');
					cfhtml.push('<span class="span05">' + money + lot_lang.dec_s3 + '</span>');
					cfhtml.push('<span class="span07">' + $('#wheel_number_jj span').html() +'/'+ $('#wheel_number_pl span').html() + '</span>');
					cfhtml.push('<span class="span06 delete-btn"></span>');
					cfhtml.push('<input type="hidden" name="lt_project[]" value="' + serverdata + '" /></li>');
					var $cfhtml = $(cfhtml.join(''));
					if ($.lt_total_nums == 0) {
						$($.lt_id_data.id_cf_content).html('');
					}
					$($.lt_id_data.id_cf_content).prepend($cfhtml);
					/*$('.span01', $cfhtml).parent().click(function () {
						var sss = '<h4 style="text-align:left;">' + lot_lang.dec_s30 + ": " + current_methodtitle + "_" + current_methodname + "<br/>" + lot_lang.dec_s32 + ": " + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (", " + lot_lang.dec_s33 + " " + sel_prize + ", " + lot_lang.dec_s34 + " " + (Math.ceil(sel_point * 1000) / 10) + "%") : "") + "<br/>" + lot_lang.dec_s35 + " " + nums + " " + lot_lang.dec_s1 + ", " + times + " " + lot_lang.dec_s2 + ", " + lot_lang.dec_s36 + " " + money + " " + lot_lang.dec_s3 + "</h4>";
						sss += '<div class="data" style="height:60px;"><table border=0 cellspacing=0 cellpadding=0><tr><td>' + nos + "</td></tr></table></div>";
						$.alert(sss, lot_lang.dec_s5, "", 400, false)
					});*/
					$.lt_total_nums += nums;
					$.lt_total_money += money;
					$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
					basemoney = Math.round(nums * 2 * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
					$.lt_trace_base = Math.round(($.lt_trace_base + basemoney) * 1000) / 1000;
					$($.lt_id_data.id_cf_num).html($.lt_total_nums);
					$($.lt_id_data.id_cf_money).html($.lt_total_money);
					$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) + 1);
					var pc = 0;
					var pz = 0;
					$.each($.lt_method_data.prize, function (i, n) {
						n = isNaN(Number(n)) ? 0 : Number(n);
						pz = pz > n ? pz : n;
						pc++
					});
					if (pc != 1) {
						pz = 0
					}
					pz = Math.round(pz * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
					pz = sel_isdy ? sel_prize : pz;
					$cfhtml.data("data", {
						methodid: mid,
						methodname: $.lt_method_data.title + "," + $.lt_method_data.name,
						nums: nums,
						money: money,
						modes: modes,
						modename: $.lt_method_data.modes[modes].name,
						basemoney: basemoney,
						prize: pz,
						code: temp.join("|"),
						desc: nohtml
					});
					if ($.lt_same_code[mid] == undefined) {
						$.lt_same_code[mid] = []
					}
					if ($.lt_same_code[mid][modes] == undefined) {
						$.lt_same_code[mid][modes] = []
					}
					$.lt_same_code[mid][modes].push(temp.join("|"));
					$(".span06", $cfhtml).attr("title", lot_lang.dec_s24).click(function () {
						var n = $cfhtml.data("data").nums;
						var m = $cfhtml.data("data").money;
						var b = $cfhtml.data("data").basemoney;
						var c = $cfhtml.data("data").code;
						var d = $cfhtml.data("data").methodid;
						var f = $cfhtml.data("data").modes;
						var i = null;
						$.each($.lt_same_code[d][f], function (k, code) {
							if (code == c) {
								i = k
							}
						});
						if (i != null) {
							$.lt_same_code[d][f].splice(i, 1)
						} else {
							$.alert(lot_lang.am_s27);
							return
						}
						$.lt_total_nums -= n;
						$.lt_total_money -= m;
						$.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
						$.lt_trace_base = Math.round(($.lt_trace_base - b) * 1000) / 1000;
						$(this).parent().remove();
						if ($.lt_total_nums == 0) {
							//$($.lt_id_data.id_cf_content).append('<li class="item none">暂无投注项</li>');
						}
						$($.lt_id_data.id_cf_num).html($.lt_total_nums);
						$($.lt_id_data.id_cf_money).html($.lt_total_money);
						$($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) - 1);
						cleanTraceIssue();
						if ($.lt_ismargin == false) {
							traceCheckMarginSup()
						}
						$(this).parent().closeFloat()
					});
					SetCookie("modes", modes, 86400);
					SetCookie("dypoint", sel_point, 86400);
					for (i = 0; i < data_sel.length; i++) {
						data_sel[i] = []
					}
					if (otype == "input") {
						$("#lt_write_box", $(me)).val("")
					} else {
						if (otype == "digital" || otype == "dxds" || otype == "dds") {
							$("span", $(me)).filter(".on").removeClass("on");
						}
					}
					$($.lt_id_data.id_sel_times).val(1);
					checkNum();
					cleanTraceIssue();
					if ($.lt_ismargin == true) {
						traceCheckMarginSup()
					}
					if ($('.layui-layer').length == 0 && $.lt_total_nums && $.lt_total_money) {
						$("#lt_total_nums").val($.lt_total_nums);
						$("#lt_total_money").val($.lt_total_money);
						$('#tk02').show();
						$('#td02_money').html($.lt_total_money);
						$('#tk02_content').html($('#lt_cf_content').html())
						$('.reveal-modal-close').on('click', function () {
							$(this).parents('.alert-box').hide();
						});
						//订单提交事件
                                                $('.alert-logo i').html($('#logo_img').html());
                                                $(".alert-txt span em").html($('#current_issue').html());
                                                $('#tk02 .reveal-modal-submit').unbind('click').on('click', function () {
                                                $(this).parents('.alert-box').hide();
                                                if(Number($('#td02_money').html()) <= Number($('#money span').html())){
                                                      ajaxSubmit(me);
                                                      list1Data();
                                                      $('#money').click();
                                                   }else {
                                                           $.alert('账户资金不足');
                                                   };

                                                });
					}
				}
			}
		});
	};
	$.fn.lt_trace = function () {
		var t_type = "margin";
		$.extend({
			lt_trace_issue: 0,
			lt_trace_money: 0
		});
		var t_count = $.lt_issuecount;
		var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
		var t_nowpos = 0;
		var htmllabel = '<a class="tab-btn f-left" id="lt_margin" href="javascript:void(0)">' + lot_lang.dec_s13 + '</a>';
		htmllabel += '<a class="tab-btn f-left" id="lt_sametime" href="javascript:void(0)">' + lot_lang.dec_s10 + '</a>';
		htmllabel += '<a class="tab-btn f-left" id="lt_difftime" href="javascript:void(0)">' + lot_lang.dec_s11 + '</a>';
		var htmltext = '<li id="lt_margin_html"><span class="f-left">' + lot_lang.dec_s14 + '</span> <input class="tab-input" name="lt_trace_times_margin" type="text" id="lt_trace_times_margin" value="1" size="3" />  ' + lot_lang.dec_s29 + ' <input class="tab-input" name="lt_trace_margin" type="text" id="lt_trace_margin" value="50" size="3" />%  </li>';
		htmltext += '<li id="lt_sametime_html" style="display:none;"><span class="f-left">' + lot_lang.dec_s14 + '</span> <input name="lt_trace_times_same"class="tab-input" type="text" id="lt_trace_times_same" value="1" size="3" /></li>';
		htmltext += '<li id="lt_difftime_html" style="display:none;"><span class="f-left">' + lot_lang.dec_s17 + '</span> <input class="tab-input" name="lt_trace_diff" type="text" id="lt_trace_diff" value="1" size="3" /> ' + lot_lang.dec_s18 + "  " + lot_lang.dec_s2 + " " + lot_lang.dec_s19 + ' <input name="lt_trace_times_diff" type="text" id="lt_trace_times_diff" value="2" size="3" /></li>';
		htmltext += "<li>  <span class=\"f-left\">" + lot_lang.dec_s15 + '</span> <input class="tab-input" name="lt_trace_count_input" type="text" id="lt_trace_count_input" style="width:36px" value="10" size="3" /><input type="hidden" id="lt_trace_money" name="lt_trace_money" value="0" /><input type="hidden" id="lt_trace_alcount" /></li>';
		$($.lt_id_data.id_tra_label).html(htmllabel);
		$($.lt_id_data.id_tra_lhtml).prepend(htmltext);
		$($.lt_id_data.id_tra_alct).val(t_count);
		$("#lt_margin").click(function () {
			var $this = $(this);
			if (!$this.hasClass('on')) {
				$this.addClass('on').siblings('.on').removeClass('on');
				$("#lt_margin_html").show();
				$("#lt_sametime_html").hide();
				$("#lt_difftime_html").hide();
				t_type = "margin";
			}
		});
		$("#lt_sametime").click(function () {
			var $this = $(this);
			if (!$this.hasClass('on')) {
				$this.addClass('on').siblings('.on').removeClass('on');
				$("#lt_margin_html").hide();
				$("#lt_sametime_html").show();
				$("#lt_difftime_html").hide();
				t_type = "same";
			}
		});
		$("#lt_difftime").click(function () {
			var $this = $(this);
			if (!$this.hasClass('on')) {
				$this.addClass('on').siblings('.on').removeClass('on');
				$("#lt_margin_html").hide();
				$("#lt_sametime_html").hide();
				$("#lt_difftime_html").show();
				t_type = "diff";
			}
		});

		function upTraceCount() {
			$("#lt_trace_count").html($.lt_trace_issue);
			if (parseInt($.lt_trace_issue, 10) == 0) {
				$("#lt_trace_qissueno").change()
			} else {
				$("#lt_trace_count_input").val($.lt_trace_issue)
			}
			$("#lt_trace_hmoney").html(JsRound($.lt_trace_money, 2, true));
			$("#lt_trace_nums").html($.lt_total_nums * $.lt_trace_issue);
			$("#lt_trace_money").val($.lt_trace_money)
		}
		$("input", $($.lt_id_data.id_tra_lhtml)).keyup(function () {
			$(this).val(Number($(this).val().replace(/[^0-9]/g, "0")))
		});
		$("#lt_trace_qissueno").change(function () {
			var t = 0;
			if ($(this).val() == "all") {
				t = parseInt($($.lt_id_data.id_tra_alct).val(), 10)
			} else {
				t = parseInt($(this).val(), 10)
			}
			t = isNaN(t) ? 0 : t;
			$("#lt_trace_count_input").val(t)
		});
		var issueshtml = '';
		var endtime = 0;
		var m = 0;
		$.each($.lt_issues, function (i, n) {
			endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
			if (m < t_count && endtime >= currentendtime) {
				m++;
				var _arr = [];
				_arr.push('<li id="tr_trace_' + n.issue + '">');
				//_arr.push('<span class="s01">' + i + '</span>');
				_arr.push('<span class="s02"><input type="checkbox" name="lt_trace_issues[]" value="' + n.issue + '" /></span>');
				_arr.push('<span class="s03">' + n.issue + '</span>');
				_arr.push('<span class="s04"><input name="lt_trace_times_' + n.issue + '" type="text" class="s04-input text-center" value="0" disabled/> ' + lot_lang.dec_s2 + '</span>');
				_arr.push('<span class="s05">' + lot_lang.dec_s20 + '<span id="lt_trace_money_' + n.issue + '">0.00</span></span>');
				_arr.push('<span class="s06">' + n.endtime + '</span>');
				_arr.push('</li>');
				issueshtml += _arr.join('');
			}
		});
		$($.lt_id_data.id_tra_issues).html(issueshtml);

		function changeIssueCheck(obj) {
			var money = $.lt_trace_base;
			var $j = $(obj).closest("li");
			if ($(obj).is(':checked')) {
				$j.addClass('checked').find("input[name^='lt_trace_times_']").val(1).attr("disabled", false).data("times", 1);
				$j.find("span[id^='lt_trace_money_']").html(JsRound(money, 2, true));
				$.lt_trace_issue++;
				$.lt_trace_money += money
			} else {
				var t = $j.find("input[name^='lt_trace_times_']").val();
				$j.removeClass('checked').find("input[name^='lt_trace_times_']").val(0).attr("disabled", true).data("times", 0);
				$j.find("span[id^='lt_trace_money_']").html("0.00");
				$.lt_trace_issue--;
				$.lt_trace_money -= money * parseInt(t, 10)
			}
			$.lt_trace_money = JsRound($.lt_trace_money, 2);
			upTraceCount()
		}
		$("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).live("keyup", function () {
			var v = Number($(this).val().replace(/[^0-9]/g, "0"));
			$.lt_trace_money += $.lt_trace_base * (v - $(this).data("times"));
			upTraceCount();
			$(this).val(v).data("times", v);
			$(this).closest("tr").find("span[id^='lt_trace_money_']").html(JsRound($.lt_trace_base * v, 2, true))
		});
		$(":checkbox", $.lt_id_data.id_tra_issues).live("click", function () {
			changeIssueCheck(this);
			stopPropagation()
		});
		$("li", $($.lt_id_data.id_tra_issues)).live("click", function () {
			if (!$(this).find(":checkbox").is(':checked')) {
				$(this).find(":checkbox").attr("checked", true)
			} else {
				$(this).find(":checkbox").attr("checked", false)
			}
			changeIssueCheck($(this).find(":checkbox"))
		});
		$("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).live("click", function () {
			return false
		});
		var _initTraceByIssue = function () {
			var st_issue = $("#lt_issue_start").val();
			cleanTraceIssue();
			var isshow = false;
			var acount = 0;
			var loop = 0;
			var mins = t_nowpos;
			var maxe = t_nowpos;
			var endtime = 0;
			var k = 0;
			var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
			$.each($.lt_issues, function (i, n) {
				endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
				if (k < $.lt_issuecount && endtime >= currentendtime) {
					k++;
					loop++;
					if (isshow == false && st_issue == n.issue) {
						isshow = true
					}
					if (isshow == false) {
						acount++;
						maxe = Math.max(maxe, acount)
					} else {
						mins = Math.min(mins, acount)
					}
					if (loop >= mins && loop <= maxe) {
						if (isshow == true) {
							$("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).show()
						} else {
							$("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).hide()
						}
					}
					if (loop > maxe) {
						return false
					}
				}
			});
			t_count = $.lt_issuecount - acount;
			if ($("#lt_trace_qissueno").val() == "all") {
				$("#lt_trace_count_input").val(t_count)
			}
			t_nowpos = acount;
			$($.lt_id_data.id_tra_alct).val(t_count);
			$.lt_trace_issue = 0;
			$.lt_trace_money = 0;
			upTraceCount()
		};
		$("#lt_issue_start").change(function () {
			if ($($.lt_id_data.id_tra_if).is(':checked')) {
				_initTraceByIssue()
			}
		});
		$($.lt_id_data.id_tra_if).attr("checked", false);
		$($.lt_id_data.id_tra_if_btn).click(function (e) {
			$($.lt_id_data.id_tra_if).attr("checked", function () {
				return !this.checked;
			});
			toggleTraBox(e);
		});
		$('#J-trace-cancle').click(function (e) {
			$($.lt_id_data.id_tra_if).attr("checked", false);
			$($.lt_id_data.id_tra_box).hide();
		});

		function toggleTraBox(e) {
			if ($($.lt_id_data.id_tra_if).is(':checked')) {
				if ($.lt_total_nums <= 0) {
					$.alert(lot_lang.am_s7);
					$($.lt_id_data.id_tra_if).attr("checked", false);
					return
				}
				if ($(e.target).attr('id') == 'J-trace-cancle') {
					$($.lt_id_data.id_tra_if).attr("checked", false);
					$($.lt_id_data.id_tra_box).hide();
				} else {
					$($.lt_id_data.id_tra_stop).attr("disabled", false).attr("checked", true);
					$($.lt_id_data.id_tra_box).show();
					_initTraceByIssue()
				}
			} else {
				$($.lt_id_data.id_tra_stop).attr("disabled", true).attr("checked", false);
				$($.lt_id_data.id_tra_box).hide()
			}
		}
		var computeByMargin = function (s, m, b, o, p) {
			s = s ? parseInt(s, 10) : 0;
			m = m ? parseInt(m, 10) : 0;
			b = b ? Number(b) : 0;
			o = o ? Number(o) : 0;
			p = p ? Number(p) : 0;
			var t = 0;
			if (b > 0) {
				if (m > 0) {
					t = Math.ceil(((m / 100 + 1) * o) / (p - (b * (m / 100 + 1))))
				} else {
					t = 1
				}
				if (t < s) {
					t = s
				}
			}
			return t
		};
		$($.lt_id_data.id_tra_ok).click(function () {
			var c = parseInt($.lt_total_nums, 10);
			if (c <= 0) {
				$.alert(lot_lang.am_s7);
				return false
			}
			var p = 0;
			if (t_type == "margin") {
				var marmt = 0;
				var marmd = 0;
				var martype = 0;
				$.each($("li", $($.lt_id_data.id_cf_content)), function (i, n) {
					if (marmt != 0 && marmt != $(n).data("data").methodid) {
						martype = 2;
						return false
					} else {
						marmt = $(n).data("data").methodid
					}
					if (marmd != 0 && marmd != $(n).data("data").modes) {
						martype = 3;
						return false
					} else {
						marmd = $(n).data("data").modes
					}
					if ($(n).data("data").prize <= 0 || (p != 0 && p != $(n).data("data").prize)) {
						martype = 1;
						return false
					} else {
						p = $(n).data("data").prize
					}
				});
				if (martype == 1) {
					$.alert(lot_lang.am_s32);
					return false
				} else {
					if (martype == 2) {
						$.alert(lot_lang.am_s31);
						return false
					} else {
						if (martype == 3) {
							$.alert(lot_lang.am_s33);
							return false
						}
					}
				}
			}
			var ic = parseInt($("#lt_trace_count_input").val(), 10);
			ic = isNaN(ic) ? 0 : ic;
			if (ic <= 0) {
				$.alert(lot_lang.am_s8);
				return false
			}
			if (ic > $.lt_issuecount) {
				$.alert(lot_lang.am_s9, "", "", 300);
				return false
			}
			var times = parseInt($("#lt_trace_times_" + t_type).val(), 10);
			times = isNaN(times) ? 0 : times;
			if (times <= 0) {
				$.alert(lot_lang.am_s10);
				return false
			}
			times = isNaN(times) ? 0 : times;
			var td = [];
			var tm = 0;
			var msg = "";
			if (t_type == "same") {
				var m = $.lt_trace_base * times;
				tm = m * ic;
				for (var i = 0; i < ic; i++) {
					td.push({
						times: times,
						money: m
					})
				}
				msg = lot_lang.am_s12.replace("[times]", times)
			} else {
				if (t_type == "diff") {
					var d = parseInt($("#lt_trace_diff").val(), 10);
					d = isNaN(d) ? 0 : d;
					if (d <= 0) {
						$.alert(lot_lang.am_s11);
						return false
					}
					var m = $.lt_trace_base;
					var t = 1;
					for (var i = 0; i < ic; i++) {
						if (i != 0 && (i % d) == 0) {
							t *= times
						}
						td.push({
							times: t,
							money: m * t
						});
						tm += m * t
					}
					msg = lot_lang.am_s13.replace("[step]", d).replace("[times]", times)
				} else {
					if (t_type == "margin") {
						var e = parseInt($("#lt_trace_margin").val(), 10);
						e = isNaN(e) ? 0 : e;
						if (e <= 0) {
							$.alert(lot_lang.am_s30);
							return false
						}
						var m = $.lt_trace_base;
						if (e >= ((p * 100 / m) - 100)) {
							$.alert(lot_lang.am_s30);
							return false
						}
						var t = 0;
						for (var i = 0; i < ic; i++) {
							t = computeByMargin(times, e, m, tm, p);
							td.push({
								times: t,
								money: m * t
							});
							tm += m * t
						}
						msg = lot_lang.am_s34.replace("[margin]", e).replace("[times]", times)
					}
				}
			}
			msg += lot_lang.am_s14.replace("[count]", ic);
			msg = lot_lang.am_s99.replace("[msg]", msg);
			$.confirm(msg, function () {
				cleanTraceIssue();
				var $s = $("li", $($.lt_id_data.id_tra_issues));
				for (i = 0; i < ic; i++) {
					$($s[i]).find(":checkbox").attr("checked", true);
					$($s[i]).find("input[name^='lt_trace_times_']").val(td[i].times).attr("disabled", false).data("times", td[i].times);
					$($s[i]).find("span[id^='lt_trace_money_']").html(JsRound(td[i].money, 2, true));
					$($s[i]).addClass("on")
				}
				$.lt_trace_issue = ic;
				$.lt_trace_money = tm;
				upTraceCount()
			}, "", "", 350)
		})
	};
	var cleanTraceIssue = function () {
		$("input[name^='lt_trace_issues']", $($.lt_id_data.id_tra_issues)).attr("checked", false);
		$("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).val(0).attr("disabled", true);
		$("span[id^='lt_trace_money_']", $($.lt_id_data.id_tra_issues)).html("0.00");
		$("li", $($.lt_id_data.id_tra_issues)).removeClass("on");
		$("#lt_trace_hmoney").html(0);
		$("#lt_trace_nums").html(0);
		$("#lt_trace_money").val(0);
		$("#lt_trace_count").html(0);
		$.lt_trace_issue = 0;
		$.lt_trace_money = 0
	};
	var traceCheckMarginSup = function () {
		var marmt = 0;
		var marmd = 0;
		var martype = 0;
		var p = 0;
		if ($.lt_total_nums > 0) {
			$.each($("li", $($.lt_id_data.id_cf_content)), function (i, n) {
				if (marmt != 0 && marmt != $(n).data("data").methodid) {
					martype = 2;
					return false
				} else {
					marmt = $(n).data("data").methodid
				}
				if (marmd != 0 && marmd != $(n).data("data").modes) {
					martype = 3;
					return false
				} else {
					marmd = $(n).data("data").modes
				}
				if ($(n).data("data").prize <= 0 || (p != 0 && p != $(n).data("data").prize)) {
					martype = 1;
					return false
				} else {
					p = $(n).data("data").prize
				}
			})
		}
		if (martype > 0) {
			$.lt_ismargin = false;
			$("#lt_margin").hide();
			$("#lt_margin_html").hide();
			$("#lt_sametime").click()
		} else {
			$.lt_ismargin = true;
			$("#lt_margin").show();
			$("#lt_margin_html").show();
			$("#lt_margin").click()
		}
		return true
	};
	$.fn.lt_timer = function (start, end) {
		var me = this;
		if (start == "" || end == "") {
			$.lt_time_leave = 0
		} else {
			$.lt_time_leave = (format(end).getTime() - format(start).getTime()) / 1000
		}

		function fftime(n) {
			return Number(n) < 10 ? "" + 0 + Number(n) : Number(n)
		}

		function format(dateStr) {
			return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"))
		}

		function diff(t) {
			return t > 0 ? {
				day: Math.floor(t / 86400),
				hour: Math.floor(t % 86400 / 3600),
				minute: Math.floor(t % 3600 / 60),
				second: Math.floor(t % 60)
			} : {
				day: 0,
				hour: 0,
				minute: 0,
				second: 0
			}
		}
		var firstTime = Math.ceil(Math.random() * (269 - 210) + 210);
		var secondTime = Math.ceil(Math.random() * (89 - 30) + 30);
		clearInterval(timerno);clearInterval(count_down_time);
		 timerno = window.setInterval(function () {
			if ($.lt_time_leave > 0 && ($.lt_time_leave % firstTime == 0 || $.lt_time_leave == secondTime)) {
				$.ajax({
					type: "POST",
					url: $.lt_ajaxurl,
					timeout: 30000,
					data: "lotteryid=" + $.lt_lottid + "&issue=" + $($.lt_id_data.id_cur_issue).html() + "&flag=gettime",
					success: function (data) {
						data = parseInt(data, 10);
						data = isNaN(data) ? 0 : data;
						data = data <= 0 ? 0 : data;
						$.lt_time_leave = data
					}
				})
			}
			if ($.lt_time_leave <= 0) {
				clearInterval(timerno);
				if ($.lt_open_status == true) {
					$("#lt_opentimeleft").lt_opentimer($($.lt_id_data.id_cur_end).html(), $.lt_open_time, $($.lt_id_data.id_cur_issue).html())
				}
				if ($.lt_submiting == false) {
					if ($.lt_total_money > 0) {
						$.unblockUI({
							fadeInTime: 0,
							fadeOutTime: 0
						});
						$.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15), function () {
							$.lt_reset(false);
							$.lt_ontimeout()
							if (!$($.lt_id_data.id_tra_area).is(':hidden')) {
								$($.lt_id_data.id_tra_area).hide();
							}
						}, function () {
							$.lt_reset(true);
							$.lt_ontimeout()
						}, "", 450)
					} else {
						$.lt_reset(true);
						$.lt_ontimeout()
					}
				}
			}
			var oDate = diff($.lt_time_leave--);
			$(me).html("" + (oDate.day > 0 ? oDate.day + (lot_lang.dec_s21) + " " : "") + fftime(oDate.hour) + ":" + fftime(oDate.minute) + ":" + fftime(oDate.second))
		}, 1000)
	};
	$.fn.lt_timerHtml = function (start, end) {
		var me = this;
		if (start == "" || end == "") {
			$.lt_time_leave = 0
		} else {
			$.lt_time_leave = (format(end).getTime() - format(start).getTime()) / 1000
		}

		function fftime(n) {
			return Number(n) < 10 ? "" + 0 + Number(n) : Number(n)
		}

		function format(dateStr) {
			return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"))
		}

		function diff(t) {
			return t > 0 ? {
				day: Math.floor(t / 86400),
				hour: Math.floor(t % 86400 / 3600),
				minute: Math.floor(t % 3600 / 60),
				second: Math.floor(t % 60)
			} : {
				day: 0,
				hour: 0,
				minute: 0,
				second: 0
			}
		}
		var firstTime = Math.ceil(Math.random() * (269 - 210) + 210);
		var secondTime = Math.ceil(Math.random() * (89 - 30) + 30);
		clearInterval(timerno);clearInterval(count_down_time);
		 timerno = window.setInterval(function () {
			if ($.lt_time_leave > 0 && ($.lt_time_leave % firstTime == 0 || $.lt_time_leave == secondTime)) {
				$.ajax({
					type: "POST",
					url: $.lt_ajaxurl,
					timeout: 30000,
					data: "lotteryid=" + $.lt_lottid + "&issue=" + $($.lt_id_data.id_cur_issue).html() + "&flag=gettime",
					success: function (data) {
						data = parseInt(data, 10);
						data = isNaN(data) ? 0 : data;
						data = data <= 0 ? 0 : data;
						$.lt_time_leave = data
					}
				})
			}
			if ($.lt_time_leave <= 0) {
				clearInterval(timerno);
				if ($.lt_open_status == true) {
					$("#lt_opentimeleft").lt_opentimer($($.lt_id_data.id_cur_end).html(), $.lt_open_time, $($.lt_id_data.id_cur_issue).html())
				}
				if ($.lt_submiting == false) {
					if ($.lt_total_money > 0) {
						$.unblockUI({
							fadeInTime: 0,
							fadeOutTime: 0
						});
						$.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15), function () {
							$.lt_reset(false);
							$.lt_ontimeout()
						}, function () {
							$.lt_reset(true);
							$.lt_ontimeout()
						}, "", 450)
					} else {
						$.lt_reset(true);
						$.lt_ontimeout()
					}
				}
			}
			var oDate = diff($.lt_time_leave--);
			$(me).html("" + (oDate.day > 0 ? oDate.day + (lot_lang.dec_s21) + " " : "") + '<span class="bet-btn bet-hour">' + (fftime(oDate.hour) + '').substr(0, 1) + (fftime(oDate.hour) + '').substr(1) + '</span><span class="bet-btn0">:</span><span class="bet-btn bet-minuter">' + (fftime(oDate.minute) + '').substr(0, 1) + (fftime(oDate.minute) + '').substr(1) + '</span><span class="bet-btn0">:</span><span class="bet-btn bet-second">' + (fftime(oDate.second) + '').substr(0, 1) + (fftime(oDate.second) + '').substr(1) + '</span> ');
			lt_count_down_num(fftime(oDate.hour), fftime(oDate.minute), fftime(oDate.second));
		}, 1000)
	};
	var lt_count_down_num = function (h, m, s) {
		var me = this;
		$($.lt_id_data.id_submit_count_down).html(h + ':' + m + ':' + s);
	};
	$.fn.lt_opentimer = function (start, end, openissue) {
		var me = this;
		if (start == "" || end == "") {
			var cc = 0
		} else {
			var cc = (format(end).getTime() - format(start).getTime()) / 1000
		}
		$.lt_time_open = Math.floor(cc);

		function fftime(n) {
			return Number(n) < 10 ? "" + 0 + Number(n) : Number(n)
		}

		function format(dateStr) {
			return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"))
		}

		function diff(t) {
			return t > 0 ? {
				day: Math.floor(t / 86400),
				hour: Math.floor(t % 86400 / 3600),
				minute: Math.floor(t % 3600 / 60),
				second: Math.floor(t % 60)
			} : {
				day: 0,
				hour: 0,
				minute: 0,
				second: 0
			}
		}
		$.lt_open_status = false;

		function _getcode(issue) {
			$.ajax({
				type: "POST",
				url: $.lt_ajaxurl,
				data: "lotteryid=" + $.lt_lottid + "&flag=gethistory&issue=" + issue,
				success: function (data) {
					console.log("开奖请求路径 ： " + $.lt_ajaxurl);
					console.log("开奖请求参数 ： " + "lotteryid=" + $.lt_lottid + "&flag=gethistory&issue=" + issue);
					console.log(data);
					var partn = /<script.*>.*<\/script>/;
					if (data == undefined || $.trim(data) == "") {
						console.log('data == undefined || $.trim(data) == ""');
						return;
					}
					if (data == "empty" || partn.test(data)) {
						console.log('data == "empty" || partn.test(data)');
						return
					}
					eval("data=" + data);
					$.lt_open_status = true;
					var codebox = $("#showcodebox").find("span");
					var $len = codebox.length;
					var $i = 0;
					clearInterval(opentimerget);
					console.log("开始插入结果data=");
					console.log(data);
					var opencodeno = window.setInterval(function () {
						if ($i > $len) {
							clearInterval(opencodeno)
						}
						$(codebox[$i]).attr("flag", "normal");
						if (data.code[$i] == "x") {
							$(codebox[$i]).attr("class", "gr_s gr_sx")
						} else {
							$(codebox[$i]).attr("class", "f-left bet-numli");
							$(codebox[$i]).html(data.code[$i]);
						}
						$i++
					}, 500);
					$("#lt_opentimebox").hide();
					$("#bet-num-title_id").css("font-size", "16px");
					$("#lt_opentimebox2").hide();
					$("#ifNewOpen").attr("src", "page/WORecord.shtml?id=" + $.lt_lottid + "&num=5&flag=" + Math.random());
					$("#lt_gethistorycode").html(data.issue)
				}
			})
		}
		//$("#showcodebox").hide("fast");
		//$("#showadvbox").show("fast");
		$("#lt_gethistorycode").html(openissue);
		$("#lt_opentimebox").show();
		$("#bet-num-title_id").css("font-size", "14px");
		$("#lt_opentimebox2").hide();
		var _getTimes = 0; clearInterval(opentimerget);
		window.setTimeout(function () {
			var tttime = Math.ceil(Math.random() * 15 + 10) * 1000;
			opentimerget = window.setInterval(function () {
				if ($.lt_open_status == true || _getTimes > 20) {
					if (_getTimes > 20) {
						//$("#lt_opentimebox2").html("<strong style='font-size:14px'> \u5f00\u5956\u8d85\u65f6,\u8bf7\u5237\u65b0</strong>").show();
						//$("#showcodebox").hide("fast");
						//$("#showadvbox").show("fast")
					}
					$.each($("#showcodebox").find("span"), function (i, n) {
						$(this).attr("class", "gr_s gr_sx");
						$(this).attr("flag", "normal")
					});
					clearInterval(opentimerget)
				}
				_getTimes++;
				_getcode($("#lt_gethistorycode").html())
			}, tttime)
		}, cc * 1000);
		var opentimerno = window.setInterval(function () {
			if ($.lt_time_open <= 0) {
				clearInterval(opentimerno);
				$("#lt_opentimebox").hide();
				$("#bet-num-title_id").css("font-size", "16px");
				$("#lt_opentimebox2").show();
				$("#showcodebox").find("span").attr("flag", "move");
				$.each($("#showcodebox").find("span"), function (i, n) {
					if ($(this).attr("flag") == "move") {
						//$(this).html("<img src='/images/mv.gif' width='43' style='margin-top:6px;'/>");
					}
				})
				//$("#showadvbox").hide("fast");
				//$("#showcodebox").show("fast")
			}
			var oDate = diff($.lt_time_open--);
			if ($.lt_time_open < 60) {
				$("#waitopendesc").html("\u5f00\u5956\u5012\u8ba1\u65f6:");
				$(me).html("" + (oDate.hour > 0 ? oDate.hour + ":" : "") + fftime(oDate.minute) + ":" + fftime(oDate.second))
			} else {
				$("#waitopendesc").html("\u7b49\u5f85\u5f00\u5956");
				$(me).html("")
			}
		}, 1000)
	};
	$.lt_reset = function (iskeep) {
		if (iskeep && iskeep === true) {
			iskeep = true
		} else {
			iskeep = false
		}
		if ($.lt_time_leave <= 0) {
			if (iskeep == false) {
				$("span[id^='smalllabel_'][class='tab-front']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").click()
			}
			if (iskeep == false) {
				$.lt_total_nums = 0;
				$.lt_total_money = 0;
				$.lt_trace_base = 0;
				$.lt_same_code = [];
				$($.lt_id_data.id_cf_num).html(0);
				$($.lt_id_data.id_cf_money).html(0);
				//$($.lt_id_data.id_cf_content).html('<li class="total-table-l-li text-center">暂无投注项</li>');
				$($.lt_id_data.id_cf_count).html(0);
				if ($.lt_ismargin == false) {
					traceCheckMarginSup()
				}
			}
			$.ajax({
				type: "POST",
				url: $.lt_ajaxurl,
				timeout: 30000,
				data: "lotteryid=" + $.lt_lottid + "&flag=read",
				success: function (data) {
					console.log("时间请求路径 ： " + $.lt_ajaxurl);
					console.log("时间请求参数 ： " + "lotteryid=" + $.lt_lottid + "&flag=read");
					console.log(data);
					if (data.length <= 0) {
						$.alert(lot_lang.am_s16);
						return false
					}
					var partn = /<script.*>.*<\/script>/;
					if (partn.test(data)) {
						alert(lot_lang.am_s17, "", "", 300);
						top.location.href = "./";
						return false
					}
					if (data == "empty") {
						alert(lot_lang.am_s18);
						window.location.href = "./default_notice.shtml";
						return false
					}
					eval("data=" + data);
					$('#lt_gethistorycode').html($($.lt_id_data.id_cur_issue).html());
					$('#showcodebox').html('<span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span><span class="gr_s gr_sx" flag="normal">x</span>');
					$($.lt_id_data.id_cur_issue).html(data.issue);
					$($.lt_id_data.id_cur_end).html(data.saleend);
					$($.lt_id_data.id_cur_sale).html(data.sale);
					$.lt_issuecount = data.left;
					if (parseInt($("#lt_trace_count_input").val(), 10) > $.lt_issuecount) {
						$("#lt_trace_count_input").val($.lt_issuecount)
					}
					$($.lt_id_data.id_count_down).lt_timerHtml(data.nowtime, data.saleend);
					$.lt_open_time = data.opentime;
					$.lt_end_time = data.saleend;
					var j = 0;
					var endtime = 0;
					var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
					var chtml = "";
					var lastissueshtml = "";
					$.each($.lt_issues, function (i, n) {
						endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
						if (j < $.lt_issuecount && endtime >= currentendtime) {
							j++;
							chtml += '<option value="' + n.issue + '">' + n.issue + (n.issue == data.issue ? lot_lang.dec_s7 : "") + "</option>";
							lastissueshtml += '<li id="tr_trace_' + n.issue + '">' /*+ '<span class="s01">' + j + '</span>'*/ + '<span class="s02"><input type="checkbox" name="lt_trace_issues[]" value="' + n.issue + '" /></span>' + '<span class="s03">' + n.issue + '</span>' + '<span class="s04"><input name="lt_trace_times_' + n.issue + '" type="text" class="s04-input text-center" value="0" disabled/> ' + lot_lang.dec_s2 + '</span>' + '<span class="s05">' + lot_lang.dec_s20 + '<span id="lt_trace_money_' + n.issue + '">0.00</span></span>' + '<span class="s06">' + n.endtime + '</span>' + '</li>';
						}
					});
					$("#lt_issue_start").empty();
					$(chtml).appendTo("#lt_issue_start");
					$("#lt_trace_issues").empty();
					$(lastissueshtml).appendTo("#lt_trace_issues");
					t_count = $.lt_issuecount;
					$($.lt_id_data.id_tra_alct).val(t_count);
					cleanTraceIssue()
				},
				error: function () {
					$.alert(lot_lang.am_s16);
					cleanTraceIssue();
					return false
				}
			})
		} else {
			if (iskeep == false) {
				$("span[id^='smalllabel_'][class='method-tab-front']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").click()
			}
			if (iskeep == false) {
				$.lt_total_nums = 0;
				$.lt_total_money = 0;
				$.lt_trace_base = 0;
				$.lt_same_code = [];
				$($.lt_id_data.id_cf_num).html(0);
				$($.lt_id_data.id_cf_money).html(0);
				//$($.lt_id_data.id_cf_content).html('<li class="total-table-l-li text-center">暂无投注项</li>');
				$($.lt_id_data.id_cf_count).html(0);
				if ($.lt_ismargin == false) {
					traceCheckMarginSup()
				}
			}
			if (iskeep == false) {
				cleanTraceIssue()
			}
		}
	};
	$.fn.alertSubmit = function () {
		var me = this;
		$(this).on('click', function () {
			if (checkTimeOut() == false) {
				return
			}
			$.lt_submiting = true;
			if ($.lt_total_nums <= 0 || $.lt_total_money <= 0) {
				$.lt_submiting = false;
				$.alert(lot_lang.am_s7);
				return
			}
			$("#lt_total_nums").val($.lt_total_nums);
			$("#lt_total_money").val($.lt_total_money);
			$('#tk02').show();
			$('#td02_money').html($.lt_total_money);
			$('#tk02_content').html($('#lt_cf_content').html())
			$('.reveal-modal-close').on('click', function () {
				$(this).parents('.alert-box').hide();
			});
			//订单提交事件
                        $('.alert-logo i').html($('#logo_img').html());
                        $(".alert-txt span em").html($('#current_issue').html());
                        $('#tk02 .reveal-modal-submit').unbind('click').on('click', function () {
                        $(this).parents('.alert-box').hide();
                        if(Number($('#td02_money').html()) <= Number($('#money span').html())){
                              ajaxSubmit(me);
                              list1Data();
                              $('#money').click();
                           }else {
                                   $.alert('账户资金不足');
                           };

                        });
		})
	}
	$.fn.lt_ajaxSubmit = function () {
		var me = this;
		$(this).click(function () {
			if (checkTimeOut() == false) {
				return
			}
			$.lt_submiting = true;
			var istrace = $($.lt_id_data.id_tra_if).prop("checked");
			if ($.lt_total_nums <= 0 || $.lt_total_money <= 0) {
				$.lt_submiting = false;
				$.alert(lot_lang.am_s7);
				return
			}
			if (istrace == true) {
				if ($.lt_trace_issue <= 0 || $.lt_trace_money <= 0) {
					$.lt_submiting = false;
					$.alert(lot_lang.am_s20);
					return
				}
				var terr = "";
				$("input[name^='lt_trace_issues']:checked", $($.lt_id_data.id_tra_issues)).each(function () {
					if (Number($(this).closest("tr").find("input[name^='lt_trace_times_']").val()) <= 0) {
						terr += $(this).val() + "  "
					}
				});
				if (terr.length > 0) {
					$.lt_submiting = false;
					$.alert(lot_lang.am_s21.replace("[errorIssue]", terr), "", "", 300, false);
					return
				}
			}
			if (istrace == true) {
				var msg = "<h4>" + lot_lang.am_s144.replace("[count]", $.lt_trace_issue) + "</h4>"
			} else {
				var msg = "<h4>" + lot_lang.dec_s8.replace("[issue]", $("#lt_issue_start").val()) + "</h4>"
			}
			msg += '<div class="data"><table border=0 cellspacing=0 cellpadding=0><tr class=hid><td width=115></td><td width=20></td><td></td></tr>';
			var modesmsg = [];
			var modes = 0;
			$.each($("li", $($.lt_id_data.id_cf_content)), function (i, n) {
				datas = $(n).data("data");
				msg += "<tr><td>" + datas.methodname + "</td><td>" + datas.modename + "</td><td>" + datas.desc + "</td></tr>"
			});
			msg += "</table></div>";
			btmsg = '<div class="binfo"><span class=bbl></span><span class=bbm>' + (istrace == true ? lot_lang.dec_s16 + ": " + JsRound($.lt_trace_money, 2, true) : lot_lang.dec_s9 + ": " + $.lt_total_money) + " " + lot_lang.dec_s3 + "</span><span class=bbr></span></div>";
			if ($('.layui-layer').length == 0 && $.lt_total_nums && $.lt_total_money) {
				$("#lt_total_nums").val($.lt_total_nums);
				$("#lt_total_money").val($.lt_total_money);
				$("#tk02int_con_id").html(lot_lang.am_s144.replace("[count]", $.lt_trace_issue));
				$('#tk02').show();
				$('#td02_money').html($("#lt_trace_hmoney").html());
				$('#tk02_content').html($('#lt_cf_content').html());
				$('.reveal-modal-close').on('click', function () {
					$(this).parents('.alert-box').hide();
				});
				//订单提交事件
                                $('.alert-logo i').html($('#logo_img').html());
                                $(".alert-txt span em").html($('#current_issue').html());
                                $('#tk02 .reveal-modal-submit').unbind('click').on('click', function () {
                                $(this).parents('.alert-box').hide();
                                if(Number($('#td02_money').html()) <= Number($('#money span').html())){
                                      ajaxSubmit(me);
                                      list1Data();
                                      $('#money').click();
                                   }else {
                                           $.alert('账户资金不足');
                                   };

                                });
			}
		});
	};
	$.fn.fastSubmit = function () {
		var me = this;
		$(this).click(function () {
			$.fn.fastBet();
		});
	}

	function checkTimeOut() {
		if ($.lt_time_leave <= 0) {
			$.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15), function () {
				$.lt_reset(false);
				$.lt_ontimeout()
			}, function () {
				$.lt_reset(true);
				$.lt_ontimeout()
			}, "", 450);
			return false
		} else {
			return true
		}
	}

	function ajaxSubmit(me) {
		var modeFlag = true;
		if ($.lt_total_money < 0.2) {
			modeFlag = false;
			var str = new Array();
			str = $("input[name='lt_project[]']");
			for (var i = 0; i < str.length; i++) {
				var json = eval('(' + str[i].defaultValue + ')');
				if (json.mode == 3) {
					modeFlag = true;
					continue;
				}
			}
		}
		if (modeFlag == false) {
			$.alert(lot_lang.am_s101, "", function () {
				if (checkTimeOut() == true) {
					$.lt_reset()
				}
				$.lt_onfinishbuy();
				$.fn.fastData();
			});
			return;
		} else {
			$.blockUI({
				message: lot_lang.am_s22,
				overlayCSS: {
					backgroundColor: "#000000",
					opacity: 0.3,
					cursor: "wait"
				}
			});
		}
		var form = $(me).parents("#mainForm").eq(0);
		$.ajax({
			type: "POST",
			url: $.lt_ajaxurl,
			timeout: 30000,
			data: $(form).serialize(),
			success: function (data) {
				if (!$($.lt_id_data.id_tra_area).is(':hidden')) {
					$($.lt_id_data.id_tra_area).hide();
				}
				$.unblockUI({
					fadeInTime: 0,
					fadeOutTime: 0
				});
				$.lt_submiting = false;
				if (data.length <= 0) {
					$.alert(lot_lang.am_s16);
					return false
				}
				var partn = /<script.*>.*<\/script>/;
				if (partn.test(data)) {
					alert(lot_lang.am_s17, "", "", 300);
					top.location.href = "./";
					return false
				}
				if (data.stats == "success") {
					$.alert(lot_lang.am_s24, lot_lang.dec_s25, function () {
						if (checkTimeOut() == true) {
							$.lt_reset()
						}
						$.lt_onfinishbuy();
						$.fn.fastData();
					});
					var istrace = $($.lt_id_data.id_tra_if).prop("checked");
					if (istrace == true) {
						$($.lt_id_data.id_tra_if).prop("checked", false);
					}
					$("#ifNewBet").attr("src", "page/NewBet.shtml?id=" + $.lt_lottid + "&flag=" + Math.random());
					return false
				} else {
					eval("data = " + data + ";");
					if (data.stats == "error") {
						$.alert(lot_lang.am_s100 + data.data, "", function () {
							return checkTimeOut()
						}, (data.data.length > 10 ? 350 : 250));
						return false
					}
					if (data.stats == "fail") {
						msg = "<h4>" + lot_lang.am_s26 + "</h4>";
						msg += '<div class="data"><table width="100%" border="0" cellspacing="0" cellpadding="0">';
						$.each(data.data.content, function (i, n) {
							msg += "<tr><td>" + n.desc + '</td><td width="30%">' + n.errmsg + "</td></tr>"
						});
						msg += "</table></div>";
						btmsg = '<div class="binfo"><span class=bbl></span><span class=bbm>' + lot_lang.am_s25.replace("[success]", data.data.success).replace("[fail]", data.data.fail) + "</span><span class=bbr></span></div>";
						$.confirm(msg, function () {
							if (checkTimeOut() == true) {
								$.lt_reset()
							}
							$.lt_onfinishbuy();
							$.fn.fastData();
						}, function () {
							$.lt_onfinishbuy();
							$.fn.fastData();
							return checkTimeOut()
						}, "", 500, true, btmsg)
					}
				}
			},
			error: function () {
				$.lt_submiting = false;
				$.unblockUI({
					fadeInTime: 0,
					fadeOutTime: 0
				});
				$.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s23), function () {
					if (checkTimeOut() == true) {
						$.lt_reset()
					}
					$.lt_onfinishbuy();
					$.fn.fastData();
				}, function () {
					$.lt_onfinishbuy();
					$.fn.fastData();
					return checkTimeOut()
				}, "", 480, true);
				return false
			}
		})
	}
	$.fn.fastData = function () {
		if (typeof (window.top.ebalance) != "object") {
			return true
		}
		var $lf = $("#ebalance", window.top.document);
		$.ajax({
			type: "POST",
			url: $.lt_ajaxurl,
			data: "flag=balance",
			timeout: 9000,
			success: function (data) {
				$lf.html("￥" + data);
				return true
			}
		})
	};
	$.fn.updatehistory = function () {
		$.ajax({
			type: "POST",
			URL: $.lt_ajaxurl,
			data: "lotteryid=" + $.lt_lottid + "&flag=betlist",
			success: function (data) {
				if (data.length <= 0) {
					$.alert(lot_lang.am_s16);
					return false
				}
				var partn = /<script.*>.*<\/script>/;
				if (partn.test(data)) {
					$.alert(lot_lang.am_s16);
					return false
				}
				eval("data=" + data + ";");
				$(".projectlist").empty();
				var $shtml = "";
				$.each(data, function (i, n) {
					if (parseInt(n.iscancel, 10) != 0) {
						$shtml += '<tr class="cancel">'
					} else {
						$shtml += "<tr>"
					}
					$shtml += '<td><a href="javascript:"  title="\u67e5\u770b\u6295\u6ce8\u8be6\u60c5" class="blue" rel="projectinfo">' + n.projectid + "</a></td>";
					$shtml += "<td>" + n.writetime + "</td>";
					$shtml += "<td>" + n.methodname + "</td>";
					$shtml += "<td>" + n.issue + "</td>";
					$shtml += "<td>" + n.code + "</td>";
					$shtml += "<td>" + n.multiple + "</td>";
					$shtml += "<td>" + n.modes + "</td>";
					$shtml += "<td>" + n.totalprice + "</td>";
					$shtml += "<td>" + n.bonus + "</td>";
					$shtml += "<td>" + n.statusdesc + "</td>";
					$shtml += "</tr>"
				});
				$(".projectlist").html($shtml)
			},
			error: function () {
				$.alert(lot_lang.am_s16)
			}
		})
	}
})(jQuery);