var face = [{
	isrx: '0',
	isdefault: '0',
	title: '三星',
	label: [{
		gtitle: '三星直选',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '百位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}, {
					title: '十位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 1,
					cols: 1
				}, {
					title: '个位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 2,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: '-,-,X,X,X',
			code_sp: '',
			methodid1: 245,
			methodid: 569,
			name: '三星直选_直选复式',
			methoddesc: '从百位、十位、个位各选一个号码组成一注。',
			methodhelp: '从百位、十位、个位中选择一个3位数号码组成一注，所选号码与开奖号码后3位相同，且顺序一致，即为中奖。',
			methodexample: '投注方案：345<br>开奖号码：345，即中后三直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '直选复式'
		}, {
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 246,
			methodid: 569,
			name: '三星直选_直选单式',
			methoddesc: '手动输入号码，至少输入1个三位数号码组成一注。',
			methodhelp: '手动输入一个3位数号码组成一注，所选号码与开奖号码的百位、十位、个位相同，且顺序一致，即为中奖。',
			methodexample: '投注方案：345<br>开奖号码：345，即中后三直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '直选单式'
		}, {
			selectarea: {
				type: 'digital',
				layout: [{
					title: '和值',
					no: '0|1|2|3|4|5|6|7|8|9|10|11|12|13',
					place: 0,
					cols: 1
				}, {
					title: '',
					no: '14|15|16|17|18|19|20|21|22|23|24|25|26|27',
					place: 0,
					cols: 0
				}],
				isButton: false
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 247,
			methodid: 570,
			name: '三星直选_直选和值',
			methoddesc: '从0-27中任意选择1个或1个以上号码。',
			methodhelp: '所选数值等于开奖号码的百位、十位、个位三个数字相加之和，即为中奖。',
			methodexample: '投注方案：和值1<br>开奖号码：后三位001，010，100，即中后三直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '直选和值'
		}]
	}, {
		gtitle: '三星组选',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '组三',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 249,
			methodid: 572,
			name: '三星组选_组三复式',
			methoddesc: '从0-9中任意选择2个或2个以上号码。',
			methodhelp: '从0-9中选择2个数字组成两注，所选号码与开奖号码的百位、十位、个位相同，且顺序不限，即为中奖。',
			methodexample: '投注方案：588<br>开奖号码：后三位588（顺序不限），即可中后三组选三。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '组三复式'
		}, {
			methodexample: '投注方案：001；开奖号码：1 个 1，2 个 0 (顺序不限)，即中组选三。',
			selectarea: {
				type: 'input',
				singletypetips: '三星112,363'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 250,
			methodid: 572,
			name: '三星组选_组三单式',
			methoddesc: '手动输入号码，至少输入1个三位数号码（三个数字中必须有二个数字相同）。',
			methodhelp: '手动输入一个3位数号码组成一注，三个数字中必须有二个数字相同，输入号码与开奖号码的百位、十位、个位相同，顺序不限，即为中奖。',
			methodexample: '投注方案：001<br>开奖号码：后三位 010（顺序不限），即中后三组选三。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '组三单式'
		}, {
			selectarea: {
				type: 'digital',
				layout: [{
					title: '组六',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 251,
			methodid: 573,
			name: '三星组选_组六复式',
			methoddesc: '从0-9中任意选择3个或3个以上号码。',
			methodhelp: '从0-9中任意选择3个号码组成一注，所选号码与开奖号码的百位、十位、个位相同，顺序不限，即为中奖。',
			methodexample: '投注方案：258<br>开奖号码：后三位 852（顺序不限），即中后三组选六。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '组六复式'
		}, {
			methodexample: '投注方案：123；开奖号码：1 个 1，1 个 2，1 个 3 (顺序不限)，即中组选六。',
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 252,
			methodid: 573,
			name: '三星组选_组六单式',
			methoddesc: '手动输入号码，至少输入1个三位数号码（三个数字完全不相同）。',
			methodhelp: '手动输入一个3位数号码组成一注，所选号码与开奖号码的百位、十位、个位相同，且顺序不限，即为中奖。',
			methodexample: '投注方案：123<br>开奖号码：后三位 321（顺序不限），即中后三组选六。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '组六单式'
		}, {
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 253,
			methodid: 574,
			name: '三星组选_混合组选',
			methoddesc: '手动输入号码，至少输入1个三位数号码。',
			methodhelp: '手动输入一个3位数号码组成一注（不含豹子号），开奖号码的百位、十位、个位符合后三组三或者组六均为中奖。',
			methodexample: '投注方案：001 和 123<br>开奖号码：后三位 010（顺序不限）即中后三组选三，或者后三位 312（顺序不限）即中后三组选六。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '混合组选'
		}, {
			selectarea: {
				type: 'digital',
				layout: [{
					title: '和值',
					no: '1|2|3|4|5|6|7|8|9|10|11|12|13',
					place: 0,
					cols: 1
				}, {
					title: '',
					no: '14|15|16|17|18|19|20|21|22|23|24|25|26',
					place: 0,
					cols: 0
				}],
				noBigIndex: 5,
				isButton: false
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 254,
			methodid: 575,
			name: '三星组选_组选和值',
			methoddesc: '从1-26中选择1个号码。',
			methodhelp: '所选数值等于开奖号码百位、十位、个位三个数字相加之和(非豹子号)，即为中奖。',
			methodexample: '投注方案：和值3<br>开奖号码：后三位 003（顺序不限）即中后三组选三，或者后三位 012（顺序不限）即中后三组选六。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '组选和值'
		}]
	}]
}, {
	isrx: '0',
	isdefault: '0',
	title: '二星',
	label: [{
		gtitle: '二星直选',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '百位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}, {
					title: '十位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 1,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X,X,-',
			code_sp: '',
			methodid1: 257,
			methodid: 577,
			name: '二星直选_前二直选复式',
			methoddesc: '从百位、十位中至少各选1个号码组成一注。',
			methodhelp: '从百位、十位中选择一个2位数号码组成一注，所选号码与开奖号码的前2位相同，且顺序一致，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：前二位 58，即中前二直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(前二)直选复式'
		}, {
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 258,
			methodid: 577,
			name: '二星直选_前二直选单式',
			methoddesc: '手动输入号码，至少输入1个二位数号码组成一注。',
			methodhelp: '手动输入一个2位数号码组成一注，输入号码的百位、十位与开奖号码相同，且顺序一致，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：前二位 58，即中前二直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(前二)直选单式'
		}, {
			selectarea: {
				type: 'digital',
				layout: [{
					title: '十位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}, {
					title: '个位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 1,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: '-,X,X',
			code_sp: '',
			methodid1: 259,
			methodid: 581,
			name: '二星直选_后二直选复式',
			methoddesc: '从十位、个位中至少各选1个号码组成一注。',
			methodhelp: '从十位、个位中选择一个2位数号码组成一注，所选号码与开奖号码的前2位相同，且顺序一致，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：后二位 58，即中后二直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(后二)直选复式'
		}, {
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 260,
			methodid: 581,
			name: '二星直选_后二直选单式',
			methoddesc: '手动输入号码，至少输入1个二位数号码组成一注。',
			methodhelp: '手动输入一个2位数号码组成一注，输入号码的十位、个位与开奖号码相同，且顺序一致，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：后二位 58，即中后二直选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(后二)直选单式'
		}]
	}, {
		gtitle: '二星组选',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '组选',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 262,
			methodid: 579,
			name: '二星组选_前二组选复式',
			methoddesc: '从0-9中任意选择2个或2个以上号码。',
			methodhelp: '从0-9中选2个号码组成一注，所选号码与开奖号码的百位、十位相同，顺序不限，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：前二位 85 或者 58（顺序不限，不含对子号），即中前二组选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(前二)组选复式'
		}, {
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 263,
			methodid: 579,
			name: '二星组选_前二组选单式',
			methoddesc: '手动输入号码，至少输入1个二位数号码组成一注。',
			methodhelp: '手动输入一个2位数号码组成一注，输入号码的万位、千位与开奖号码相同，顺序不限，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：前二位 85 或者 58（顺序不限，不含对子号），即中前二组选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(前二)组选单式'
		}, {
			selectarea: {
				type: 'digital',
				layout: [{
					title: '组选',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 264,
			methodid: 583,
			name: '二星组选_后二组选复式',
			methoddesc: '从0-9中任意选择2个或2个以上号码。',
			methodhelp: '从0-9中选2个号码组成一注，所选号码与开奖号码的十位、个位相同（不含对子号），顺序不限，即中奖。',
			methodexample: '投注方案：58<br>开奖号码：后二位 85 或者 58（顺序不限，不含对子号），即中后二组选。。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(后二)组选复式'
		}, {
			selectarea: {
				type: 'input',
				singletypetips: '三星123,234'
			},
			show_str: 'X',
			code_sp: ' ',
			methodid1: 265,
			methodid: 583,
			name: '二星组选_后二组选单式',
			methoddesc: '手动输入号码，至少输入1个二位数号码组成一注。',
			methodhelp: '手动输入一个2位数号码组成一注，输入号码的十位、个位与开奖号码相同（不含对子号），顺序不限，即为中奖。',
			methodexample: '投注方案：58<br>开奖号码：前二位 85 或者 58（顺序不限，不含对子号），即中前二组选。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '(后二)组选单式'
		}]
	}]
}, {
	isrx: '0',
	isdefault: '0',
	title: '定位胆',
	label: [{
		gtitle: '定位胆',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '百位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}, {
					title: '十位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 1,
					cols: 1
				}, {
					title: '个位',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 2,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X,X,X',
			code_sp: '',
			methodid1: 266,
			methodid: 585,
			name: '定位胆',
			methoddesc: '在百位、十位、个位任意位置上任意选择1个或1个以上号码。',
			methodhelp: '从百位、十位、个位任意位置上至少选择1个以上号码，所选号码与相同位置上的开奖号码一致，即为中奖。',
			methodexample: '投注方案：百位 1<br>开奖号码：百位 1，即中定位胆百位。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '定位胆'
		}]
	}]
}, {
	isrx: '0',
	isdefault: '0',
	title: '不定位',
	label: [{
		gtitle: '不定位',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '一码 ',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 269,
			methodid: 589,
			name: '一码不定位',
			methoddesc: '从0-9中任意选择1个以上号码。',
			methodhelp: '从0-9中选择1个号码，每注由1个号码组成，只要开奖号码的百位、十位、个位中包含所选号码，即为中奖。',
			methodexample: '投注方案：1<br>开奖号码：后三位至少出现1个1，即中后三一码不定位。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '一码不定位'
		}, {
			selectarea: {
				type: 'digital',
				layout: [{
					title: '二码',
					no: '0|1|2|3|4|5|6|7|8|9',
					place: 0,
					cols: 1
				}],
				noBigIndex: 5,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 270,
			methodid: 591,
			name: '二码不定位',
			methoddesc: '从0-9中任意选择2个以上号码。',
			methodhelp: '从0-9中选择2个号码，每注由2个不同的号码组成，开奖号码的百位、十位、个位中同时包含所选的2个号码，即为中奖。',
			methodexample: '投注方案：12<br>开奖号码：至少出现1和2各1个，即中二码不定位。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '二码不定位'
		}]
	}]
}, {
	isrx: '0',
	isdefault: '0',
	title: '大小单双',
	label: [{
		gtitle: '大小单双',
		label: [{
			selectarea: {
				type: 'dxds',
				layout: [{
					title: '百位',
					no: '大|小|单|双',
					place: 0,
					cols: 1
				}, {
					title: '十位',
					no: '大|小|单|双',
					place: 1,
					cols: 1
				}]
			},
			show_str: 'X,X',
			code_sp: '',
			methodid1: 273,
			methodid: 593,
			name: '前二大小单双',
			methoddesc: '从百位、十位中的“大、小、单、双”中至少各选一个组成一注。',
			methodhelp: '对百位和十位的“大（56789）小（01234）、单（13579）双（02468）”形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。',
			methodexample: '投注方案：小双<br>开奖号码：百位与十位“小双”，即中前二大小单双。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '前二大小单双'
		}, {
			selectarea: {
				type: 'dxds',
				layout: [{
					title: '十位',
					no: '大|小|单|双',
					place: 0,
					cols: 1
				}, {
					title: '个位',
					no: '大|小|单|双',
					place: 1,
					cols: 1
				}]
			},
			show_str: 'X,X',
			code_sp: '',
			methodid1: 274,
			methodid: 594,
			name: '后二大小单双',
			methoddesc: '从十位、个位中的“大、小、单、双”中至少各选一个组成一注。',
			methodhelp: '对十位和个位的“大（56789）小（01234）、单（13579）双（02468）”形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。',
			methodexample: '投注方案：大单<br>开奖号码：十位与个位“大单”，即中后二大小单双。',
			prize: {
				1: '1700.00'
			},
			dyprize: [],
			modes: [{
				modeid: 1,
				name: '元',
				rate: 1
			}, {
				modeid: 2,
				name: '角',
				rate: 0.1
			}, {
				modeid: 3,
				name: '分',
				rate: 0.01
			}, {
				modeid: 4,
				name: '厘',
				rate: 0.001
			}],
			maxcodecount: 0,
			isrx: 0,
			numcount: 0,
			defaultposition: '00000',
			desc: '后二大小单双'
		}]
	}]
}];
