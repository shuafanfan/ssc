var face = [{
	title: '三码',
	label: [{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '第一位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '第二位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}, {
				title: '第三位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 2,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X,X,X,-,-',
		show_str: 'X,X,X,-,-',
		code_sp: 's',
		methodid1: 190,
		methodid: 483,
		name: '前三直选复式',
		methoddesc: '从第一位、第二位、第三位中至少各选择1个号码。',
		methodhelp: '从01-11共11个号码中选择3个不重复的号码组成一注，所选号码与当期顺序摇出的5个号码中的前3个号码相同，且顺序一致，即为中奖。',
		methodexample: '投注方案：01 02 03<br>开奖号码：01 02 03 * *，即中前三直选。',
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
		desc: '前三直选复式'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 191,
		methodid: 483,
		name: '前三直选单式',
		methoddesc: '手动输入号码，至少输入1个三位数号码组成一注。',
		methodhelp: '手动输入3个号码组成一注，所输入的号码与当期顺序摇出的5个号码中的前3个号码相同，且顺序一致，即为中奖。',
		methodexample: '投注方案：01 02 03<br>开奖号码：01 02 03 * *，即中前三直选。',
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
		desc: '前三直选单式'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '组选',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 3
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 192,
		methodid: 485,
		name: '前三组选复式',
		methoddesc: '从01-11中任意选择3个或3个以上号码。',
		methodhelp: '从01-11中共11个号码中选择3个号码，所选号码与当期顺序摇出的5个号码中的前3个号码相同，顺序不限，即为中奖。',
		methodexample: '投注方案：01 02 03<br>开奖号码：03 01 02 * *（前三顺序不限），即中前三组选。',
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
		desc: '前三组选复式'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 193,
		methodid: 485,
		name: '前三组选单式',
		methoddesc: '手动输入号码，至少输入1个三位数号码组成一注。',
		methodhelp: '手动输入3个号码组成一注，所输入的号码与当期顺序摇出的5个号码中的前3个号码相同，顺序不限，即为中奖。',
		methodexample: '投注方案：01 02 03<br>开奖号码：03 01 02 * *（前三顺序不限），即中前三组选。',
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
		desc: '前三组选单式'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 195,
		methodid: 486,
		name: '前三组选胆拖',
		methoddesc: '从01-11中，选取3个及以上的号码进行投注，每注需至少包括1个胆码及2个拖码。',
		methodhelp: '从01-11中，选取3个及以上的号码进行投注，每注需至少包括1个胆码及2个拖码。<br>所选单注号码与当期顺序摇出的5个号码中的前3个号码相同，顺序不限，即为中奖。',
		methodexample: '投注方案：胆码 02，拖码 01 06<br>开奖号码：02 01 06 * *（前三顺序不限），即中前三组选胆拖。',
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
		desc: '前三组选胆拖'
	}]
}, {
	title: '二码',
	label: [{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '第一位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '第二位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X,X,-,-,-',
		code_sp: 's',
		methodid1: 196,
		methodid: 488,
		name: '前二直选复式',
		methoddesc: '从第一位、第二位中至少各选择1个号码。',
		methodhelp: '从01-11共11个号码中选择2个不重复的号码组成一注，所选号码与当期顺序摇出的5个号码中的前2个号码相同，且顺序一致，即中奖。',
		methodexample: '投注方案：01 02<br>开奖号码：01 02 * * *，即中前二直选。',
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
		desc: '前二直选复式'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 197,
		methodid: 488,
		name: '前二直选单式',
		methoddesc: '手动输入号码，至少输入1个两位数号码组成一注。',
		methodhelp: '手动输入2个号码组成一注，所输入的号码与当期顺序摇出的5个号码中的前2个号码相同，且顺序一致，即为中奖。',
		methodexample: '投注方案：01 02<br>开奖号码：01 02 * * *，即中前二直选。',
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
		desc: '前二直选单式'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '组选',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 2
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 198,
		methodid: 490,
		name: '前二组选复式',
		methoddesc: '从01-11中任意选择2个或2个以上号码。',
		methodhelp: '从01-11中共11个号码中选择2个号码，所选号码与当期顺序摇出的5个号码中的前2个号码相同，顺序不限，即为中奖。',
		methodexample: '投注方案：01 02<br>开奖号码：02 01 * * *，（前二顺序不限），即中前二组选。',
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
		desc: '前二组选复式'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 199,
		methodid: 490,
		name: '前二组选单式',
		methoddesc: '手动输入号码，至少输入1个两位数号码组成一注。',
		methodhelp: '手动输入2个号码组成一注，所输入的号码与当期顺序摇出的5个号码中的前2个号码相同，顺序不限，即为中奖。',
		methodexample: '投注方案：01 02<br>开奖号码：02 01 * * *，（前二顺序不限），即中前二组选。',
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
		desc: '前二组选单式'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 200,
		methodid: 491,
		name: '前二组选胆拖',
		methoddesc: '从01-11中，选取2个及以上的号码进行投注，每注需至少包括1个胆码及1个拖码。',
		methodhelp: '从01-11中，选取2个及以上的号码进行投注，每注需至少包括1个胆码及1个拖码。<br>所选单注号码与当期顺序摇出的5个号码中的前2个号码相同，顺序不限，即为中奖。',
		methodexample: '投注方案：胆码 01，拖码 06<br>开奖号码：06 01 * * *，（前二顺序不限），即中前二组选胆拖。',
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
		desc: '前二组选胆拖'
	}]
}, {
	title: '不定位',
	label: [{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '前三位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 201,
		methodid: 493,
		name: '前三位',
		methoddesc: '从01-11中任意选择1个或1个以上号码。',
		methodhelp: '从01-11中共11个号码中选择1个号码，每注由1个号码组成，只要当期顺序摇出的第一位、第二位、第三位开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：01<br>开奖号码：01 * * * *，* 01 * * *，* * 01 * *，即中前三位。',
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
		desc: '前三位'
	}]
}, {
	title: '定位胆',
	label: [{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '第一位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '第二位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}, {
				title: '第三位',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 2,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X,X,X,-,-',
		code_sp: 's',
		methodid1: 202,
		methodid: 495,
		name: '定位胆',
		methoddesc: '从第一位，第二位，第三位任意位置上任意选择1个或1个以上号码。',
		methodhelp: '从第一位，第二位，第三位任意1个位置或多个位置上选择1个号码，所选号码与相同位置上的开奖号码一致，即为中奖。',
		methodexample: '投注方案：第一位 01<br>开奖号码：01 * * * *，即中定位胆。',
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
}, {
	title: '趣味型',
	label: [{
		selectarea: {
			type: 'dds',
			layout: [{
				title: '',
				no: '5单0双|4单1双|3单2双|2单3双|1单4双|0单5双',
				place: 0,
				cols: 0
			}]
		},
		show_str: 'X',
		code_sp: '|',
		methodid1: 204,
		methodid: 499,
		name: '定单双',
		methoddesc: '从不同的单双组合中任意选择1个或1个以上的组合。',
		methodhelp: '从6种单双个数组合中选择1种组合，当期开奖号码的单双个数与所选单双组合一致，即为中奖。',
		methodexample: '投注方案：5单0双<br>开奖号码：01 03 05 07 09五个单数，即中趣味_定单双。',
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
		desc: '趣味_定单双'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '猜中位',
				no: '3|4|5|6|7|8|9',
				place: 0,
				cols: 1
			}],
			noBigIndex: 3,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 205,
		methodid: 501,
		name: '猜中位',
		methoddesc: '从3-9中任意选择1个或1个以上数字。',
		methodhelp: '从3-9中选择1个号码进行购买，所选号码与5个开奖号码按照大小顺序排列后的第3个号码相同，即为中奖。',
		methodexample: '投注方案：08<br>开奖号码：按号码大小顺序排列后04 05 08 09 11，中间数08，即中趣味_猜中位。',
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
		desc: '趣味_猜中位'
	}]
}, {
	title: '任选复式',
	label: [{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选1中1',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 207,
		methodid: 503,
		name: '任选一中一',
		methoddesc: '从01-11中任意选择1个或1个以上号码。',
		methodhelp: '从01-11共11个号码中选择1个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05<br>开奖号码：08 04 11 05 03，即中任选一中一。',
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
		desc: '任选一中一'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选2中2',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 2
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 208,
		methodid: 505,
		name: '任选二中二',
		methoddesc: '从01-11中任意选择2个或2个以上号码。',
		methodhelp: '从01-11共11个号码中选择2个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 04<br>开奖号码：08 04 11 05 03，即中任选二中二。',
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
		desc: '任选二中二'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选3中3',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 3
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 209,
		methodid: 508,
		name: '任选三中三',
		methoddesc: '从01-11中任意选择3个或3个以上号码。',
		methodhelp: '从01-11共11个号码中选择3个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 04 11<br>开奖号码：08 04 11 05 03，即中任选三中三。',
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
		desc: '任选三中三'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选4中4',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 4
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 210,
		methodid: 511,
		name: '任选四中四',
		methoddesc: '从01-11中任意选择4个或4个以上号码。',
		methodhelp: '从01-11共11个号码中选择4个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 04 08 03<br>开奖号码：08 04 11 05 03，即中任选四中四。',
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
		desc: '任选四中四'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选5中5',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 5
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 211,
		methodid: 514,
		name: '任选五中五',
		methoddesc: '从01-11中任意选择5个或5个以上号码。',
		methodhelp: '从01-11共11个号码中选择5个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 04 11 03 08<br>开奖号码：08 04 11 05 03，即中任选五中五。',
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
		desc: '任选五中五'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选6中5',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 6
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 212,
		methodid: 517,
		name: '任选六中五',
		methoddesc: '从01-11中任意选择6个或6个以上号码。',
		methodhelp: '从01-11共11个号码中选择6个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 10 04 11 03 08<br>开奖号码：08 04 11 05 03，即中任选六中五。',
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
		desc: '任选六中五'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选7中5',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 7
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 213,
		methodid: 520,
		name: '任选七中五',
		methoddesc: '从01-11中任意选择7个或7个以上号码。',
		methodhelp: '从01-11共11个号码中选择7个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 10 04 11 03 08 09<br>开奖号码：08 04 11 05 03，即中任选七中五。',
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
		desc: '任选七中五'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '选8中5',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1,
				minchosen: 8
			}],
			noBigIndex: 5,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 214,
		methodid: 523,
		name: '任选八中五',
		methoddesc: '从01-11中任意选择8个或8个以上号码。',
		methodhelp: '从01-11共11个号码中选择8个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所选号码，即为中奖。',
		methodexample: '投注方案：05 10 04 11 03 08 09 01<br>开奖号码：08 04 11 05 03，即中任选八中五。',
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
		desc: '任选八中五'
	}]
}, {
	title: '任选单式',
	label: [{
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 216,
		methodid: 503,
		name: '任选一中一',
		methoddesc: '手动输入号码，从01-11中任意输入1个号码组成一注。',
		methodhelp: '从01-11中手动输入1个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05<br>开奖号码：08 04 11 05 03，即中任选一中一。',
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
		desc: '任选一中一'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 217,
		methodid: 505,
		name: '任选二中二',
		methoddesc: '手动输入号码，从01-11中任意输入2个号码组成一注。',
		methodhelp: '从01-11中手动输入2个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 04<br>开奖号码：08 04 11 05 03，即中任选二中二。',
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
		desc: '任选二中二'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 218,
		methodid: 508,
		name: '任选三中三',
		methoddesc: '手动输入号码，从01-11中任意输入3个号码组成一注。',
		methodhelp: '从01-11中手动输入3个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 04 11<br>开奖号码：08 04 11 05 03，即中任选三中三。',
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
		desc: '任选三中三'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 219,
		methodid: 511,
		name: '任选四中四',
		methoddesc: '手动输入号码，从01-11中任意输入4个号码组成一注。',
		methodhelp: '从01-11中手动输入4个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 04 08 03<br>开奖号码：08 04 11 05 03，即中任选四中四。',
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
		desc: '任选四中四'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 220,
		methodid: 514,
		name: '任选五中五',
		methoddesc: '手动输入号码，从01-11中任意输入5个号码组成一注。',
		methodhelp: '从01-11中手动输入5个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 04 11 03 08<br>开奖号码：08 04 11 05 03，即中任选五中五。',
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
		desc: '任选五中五'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 221,
		methodid: 517,
		name: '任选六中五',
		methoddesc: '手动输入号码，从01-11中任意输入6个号码组成一注。',
		methodhelp: '从01-11中手动输入6个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 10 04 11 03 08<br>开奖号码：08 04 11 05 03，即中任选六中五。',
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
		desc: '任选六中五'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 222,
		methodid: 520,
		name: '任选七中五',
		methoddesc: '手动输入号码，从01-11中任意输入7个号码组成一注。',
		methodhelp: '从01-11中手动输入7个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 10 04 11 03 08 09<br>开奖号码：08 04 11 05 03，即中任选七中五。',
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
		desc: '任选七中五'
	}, {
		selectarea: {
			type: 'input',
			singletypetips: '三码 01 02 03;02 03 04任选 01 02 03 04 05'
		},
		show_str: 'X',
		code_sp: ';',
		methodid1: 223,
		methodid: 523,
		name: '任选八中五',
		methoddesc: '手动输入号码，从01-11中任意输入8个号码组成一注。',
		methodhelp: '从01-11中手动输入8个号码进行购买，只要当期顺序摇出的5个开奖号码中包含所输入号码，即为中奖。',
		methodexample: '投注方案：05 10 04 11 03 08 09 01<br>开奖号码：08 04 11 05 03，即中任选八中五。',
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
		desc: '任选八中五'
	}]
}, {
	title: '任选胆拖',
	label: [{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 225,
		methodid: 506,
		name: '任选二中二',
		methoddesc: '从01-11中，选取2个及以上的号码进行投注，每注需至少包括1个胆码及1个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和1个拖码组成一注，只要当期顺序摇出的5个开奖号码中同时包含所选的1个胆码和1个拖码，所选胆码必须全中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 06<br>开奖号码：06 08 11 09 02，即中任选二中二。',
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
		desc: '任选二中二'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 226,
		methodid: 509,
		name: '任选三中三',
		methoddesc: '从01-11中，选取3个及以上的号码进行投注，每注需至少包括1个胆码及2个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和2个拖码组成一注，只要当期顺序摇出的5个开奖号码中同时包含所选的1个胆码和2个拖码，所选胆码必须全中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 06 11<br>开奖号码：06 08 11 09 02，即中任选三中三。',
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
		desc: '任选三中三'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 227,
		methodid: 512,
		name: '任选四中四',
		methoddesc: '从01-11中，选取4个及以上的号码进行投注，每注需至少包括1个胆码及3个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和3个拖码组成一注，只要当期顺序摇出的5个开奖号码中同时包含所选的1个胆码和3个拖码，所选胆码必须全中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 06 09 11 <br>开奖号码：06 08 11 09 02，即中任选四中四。',
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
		desc: '任选四中四'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 228,
		methodid: 515,
		name: '任选五中五',
		methoddesc: '从01-11中，选取5个及以上的号码进行投注，每注需至少包括1个胆码及4个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和4个拖码组成一注，只要当期顺序摇出的5个开奖号码中同时包含所选的1个胆码和4个拖码，所选胆码必须全中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 02 06 09 11 <br>开奖号码：06 08 11 09 02，即中任选五中五。',
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
		desc: '任选五中五'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 229,
		methodid: 518,
		name: '任选六中五',
		methoddesc: '从01-11中，选取6个及以上的号码进行投注，每注需至少包括1个胆码及5个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和5个拖码组成一注，只要当期顺序摇出的5个开奖号码同时存在于胆码和拖码的任意组合中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 02 05 06 09 11<br>开奖号码：06 08 11 09 02，即中任选六中五。',
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
		desc: '任选六中五'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 230,
		methodid: 521,
		name: '任选七中五',
		methoddesc: '从01-11中，选取7个及以上的号码进行投注，每注需至少包括1个胆码及6个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和6个拖码组成一注，只要当期顺序摇出的5个开奖号码同时存在于胆码和拖码的任意组合中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 01 02 05 06 09 11<br>开奖号码：06 08 11 09 02，即中任选七中五。',
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
		desc: '任选七中五'
	}, {
		selectarea: {
			type: 'digital',
			layout: [{
				title: '胆码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 0,
				cols: 1
			}, {
				title: '拖码',
				no: '01|02|03|04|05|06|07|08|09|10|11',
				place: 1,
				cols: 1
			}],
			noBigIndex: 5,
			isButton: true,
			isDanTuo: true
		},
		show_str: 'X] X',
		code_sp: ',',
		methodid1: 231,
		methodid: 524,
		name: '任选八中五',
		methoddesc: '从01-11中，选取8个及以上的号码进行投注，每注需至少包括1个胆码及7个拖码。',
		methodhelp: '分别从胆码和拖码的01-11中，至少选择1个胆码和7个拖码组成一注，只要当期顺序摇出的5个开奖号码同时存在于胆码和拖码的任意组合中，即为中奖。',
		methodexample: '投注方案：胆码 08，拖码 01 02 03 05 06 09 11 <br>开奖号码：06 08 11 09 02，即中任选八中五。',
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
		desc: '任选八中五'
	}]
}];
