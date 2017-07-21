var face = [{
	title: '快乐十分',
		label: [{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '首位',
					no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18',
					place: 0,
					cols: 1
				}],
				noBigIndex: 9,
				isButton: true
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 233,
			methodid: 493,
			name: '首位数投',
			methoddesc: '从01至18中任选1个,投注号码与开奖号码第一位相同即中奖。',
			methodhelp: '从01至18中任选1个,投注号码与开奖号码第一位相同即中奖。',
			methodexample: '',
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
			desc: '首位数投'
		},{
			selectarea: {
				type: 'digital',
				layout: [{
					title: '首位',
					no: '19|20',
					place: 0,
					cols: 1
				}],
				noBigIndex: 10,
				isButton: false
			},
			show_str: 'X',
			code_sp: ',',
			methodid1: 234,
			methodid: 493,
			name: '首位红投',
			methoddesc: '19，20为红号，从这两个号码任选一个投注，开奖号码第一位是红号（19或20）即中奖。',
			methodhelp: '19，20为红号，从这两个号码任选一个投注，开奖号码第一位是红号（19或20）即中奖。',
			methodexample: '',
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
			desc: '首位红投'
		},{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '前位',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1
			}, {
				title: '后位',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 1,
				cols: 1
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: 'X,X,-,-,-',
		code_sp: 's',
		methodid1: 235,
		methodid: 488,
		name: '二连直',
		methoddesc: '从20个号码中任选连续两位,投注号码与开奖号码任意连续两位数字、顺序均相同即中奖。',
		methodhelp: '从20个号码中任选连续两位,投注号码与开奖号码任意连续两位数字、顺序均相同即中奖。',
		methodexample: '',
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
		desc: '二连直'
	},{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '二连组',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1,
				minchosen: 2
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 236,
		methodid: 490,
		name: '二连组',
		methoddesc: '从20个号码中任选2个,投注号与开奖号任意连续两位数字相同(顺序不限)即中。',
		methodhelp: '从20个号码中任选2个,投注号与开奖号任意连续两位数字相同(顺序不限)即中。',
		methodexample: '',
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
		desc: '二连组'
	},{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '第一位',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1
			}, {
				title: '第二位',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 1,
				cols: 1
			}, {
				title: '第三位',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 2,
				cols: 1
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: 'X,X,X,-,-',
		code_sp: 's',
		methodid1: 237,
		methodid: 483,
		name: '前三直',
		methoddesc: '从20个号码中猜开奖号码前三位,投注号码与开奖号码前三位数字、顺序均相同即中奖。',
		methodhelp: '从20个号码中猜开奖号码前三位,投注号码与开奖号码前三位数字、顺序均相同即中奖。',
		methodexample: '',
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
		desc: '前三直'
	},{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '前三组',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1,
				minchosen: 3
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 238,
		methodid: 485,
		name: '前三组',
		methoddesc: '从20个号码中猜开奖号码的前三位,投注号与开奖号前三位数字相同(顺序不限)即中。',
		methodhelp: '从20个号码中猜开奖号码的前三位,投注号与开奖号前三位数字相同(顺序不限)即中。',
		methodexample: '',
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
		desc: '前三组'
	},{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '快乐二',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1,
				minchosen: 2
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 239,
		methodid: 490,
		name: '快乐二',
		methoddesc: '从20个号码中任选2个,投注号码与开奖号码任意两位相同即中奖。',
		methodhelp: '从20个号码中任选2个,投注号码与开奖号码任意两位相同即中奖。',
		methodexample: '',
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
		desc: '快乐二'
	},{
		selectarea: {
			type: 'digital',
			layout: [{
				title: '快乐三',
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1,
				minchosen: 3
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: 'X',
		code_sp: ',',
		methodid1: 240,
		methodid: 485,
		name: '快乐三',
		methoddesc: '从20个号码中任选3个,投注号码与开奖号码任意三位相同即中奖。',
		methodhelp: '从20个号码中任选3个,投注号码与开奖号码任意三位相同即中奖。',
		methodexample: '',
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
		desc: '快乐三'
	},{
		selectarea: {
			type: "digital",
			layout: [{
				title: "快乐四",
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1,
				minchosen: 4
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: "X",
		code_sp: ",",
		methodid1: 241,
		methodid: 511,
		name: "快乐四",
		methoddesc: "从20个号码中任选4个,投注号码与开奖号码任意四位相同即中奖。",
		methodhelp: "从20个号码中任选4个,投注号码与开奖号码任意四位相同即中奖。",
		methodexample: "",
		prize: {
			1 : "1700.00"
		},
		dyprize: [],
		modes: [{
			modeid: 1,
			name: "元",
			rate: 1
		},
		{
			modeid: 2,
			name: "角",
			rate: 0.1
		},
		{
			modeid: 3,
			name: "分",
			rate: 0.01
		},
		{
			modeid: 4,
			name: "厘",
			rate: 0.001
		}],
		maxcodecount: 0,
		isrx: 0,
		numcount: 0,
		defaultposition: "00000",
		desc: "快乐四"
	},{
		selectarea: {
			type: "digital",
			layout: [{
				title: "快乐五",
				no: '01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20',
				place: 0,
				cols: 1,
				minchosen: 5
			}],
			noBigIndex: 10,
			isButton: true
		},
		show_str: "X",
		code_sp: ",",
		methodid1: 242,
		methodid: 514,
		name: "快乐五",
		methoddesc: "从20个号码中任选5个,投注号码与开奖号码任意五位相同即中奖。",
		methodhelp: "从20个号码中任选5个,投注号码与开奖号码任意五位相同即中奖。",
		methodexample: "",
		prize: {
			1 : "1700.00"
		},
		dyprize: [],
		modes: [{
			modeid: 1,
			name: "元",
			rate: 1
		},
		{
			modeid: 2,
			name: "角",
			rate: 0.1
		},
		{
			modeid: 3,
			name: "分",
			rate: 0.01
		},
		{
			modeid: 4,
			name: "厘",
			rate: 0.001
		}],
		maxcodecount: 0,
		isrx: 0,
		numcount: 0,
		defaultposition: "00000",
		desc: "快乐五"
	}]
}];
