var face = [{
    isrx: "0",
    isdefault: "0",
    title: "五星",  //一级菜单
    label: [{
        gtitle: "五星直选",  //二级菜单不可点
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",//二级菜单
                    no: "0|1|2|3|4|5|6|7|8|9",//号码
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 4,
                    cols: 1
                }],
                noBigIndex: 5,//no: "0|1|2|3|4|5|6|7|8|9",的一半
                isButton: true
            },
            show_str: "X,X,X,X,X",//选择五个才能投
            code_sp: "",
			methodid1: 3,
            methodid: 865,  // 规则，  method.js 里对应的， jquery.game.0.js 调 method.js 里的值
            name: "五星直选_直选复式",  // 投注调用的分类
            methoddesc: "从万位、千位、百位、十位、个位各选一个号码组成一注。", //显示说明
            methodhelp: "从万位、千位、百位、十位、个位中选择一个5位数号码组成一注，所选号码与开奖号码全部相同，且顺序一致，即为中奖。",//隐藏说明
            methodexample: "投注方案：13456<br>开奖号码：13456，即中五星直选。",//隐藏说明
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
            desc: "直选复式" //二级菜单
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
            methodid1: 4,
            methodid: 865,
            name: "五星直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个五位数号码组成一注(一次最大可投注100000注)。",
            methodhelp: "手动输入一个5位数号码组成一注，所选号码的万位、千位、百位、十位、个位与开奖号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：23456<br>开奖号码：23456，即中五星直选。",
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
            desc: "直选单式"
        }/*,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 4,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,X,X",
            code_sp: "",
            methodid1: 5,
            methodid: 867,
            name: "五星直选_五星组合",
            methoddesc: "从万位、千位、百位、十位、个位各选一个号码组成五注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少各选一个号码组成1-5星的组合，共五注，所选号码的个位与开奖号码全部相同，则中1个5等奖；所选号码的个位、十位与开奖号码相同，则中1个5等奖以及1个4等奖，依此类推，最高可中5个奖。",
            methodexample: "投注方案：购买4+5+6+7+8，该票共10元，由以下5注：45678(五星)、5678(四星)、678(三星)、78(二星)、8(一星)构成。<br>开奖号码：45678，即可中五星、四星、三星、二星、一星各1注",
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
            desc: "五星组合"
        }*/]
    },
    {
        gtitle: "五星组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组选120",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 5
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
            methodid1: 7,
            methodid: 869,
            name: "五星组选_组选120",
            methoddesc: "从0-9中选择5个号码组成一注。",
            methodhelp: "从0-9中任意选择5个号码组成一注，所选号码与开奖号码的万位、千位、百位、十位、个位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：10568<br>开奖号码：10568（顺序不限），即可中五星组选120。",
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
            desc: "组选120"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 3
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
            methodid1: 8,
            methodid: 870,
            name: "五星组选_组选60",
            methoddesc: "从“二重号”选择一个号码，“单号”中选择三个号码组成一注。",
            methodhelp: "选择1个二重号码和3个单号号码组成一注，所选的单号号码与开奖号码相同，且所选二重号码在开奖号码中出现了2次，即为中奖。",
            methodexample: "投注方案：二重号：8；单号：016<br>开奖号码：01688（顺序不限），即可中五星组选60。",
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
            desc: "组选60"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 2
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
            methodid1: 9,
            methodid: 871,
            name: "五星组选_组选30",
            methoddesc: "从“二重号”选择两个号码，“单号”中选择一个号码组成一注。",
            methodhelp: "选择2个二重号和1个单号号码组成一注，所选的单号号码与开奖号码相同，且所选的2个二重号码分别在开奖号码中出现了2次，即为中奖。",
            methodexample: "投注方案：二重号：68；单号：0<br>开奖号码：06688（顺序不限），即可中五星组选30。",
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
            desc: "组选30"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "三重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 2
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
            methodid1: 10,
            methodid: 872,
            name: "五星组选_组选20",
            methoddesc: "从“三重号”选择一个号码，“单号”中选择两个号码组成一注。",
            methodhelp: "选择1个三重号码和2个单号号码组成一注，所选的单号号码与开奖号码相同，且所选三重号码在开奖号码中出现了3次，即为中奖。",
            methodexample: "投注方案：三重号：8；单号：01<br>开奖号码：01888（顺序不限），即可中五星组选20。",
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
            desc: "组选20"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "三重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
            methodid1: 11,
            methodid: 873,
            name: "五星组选_组选10",
            methoddesc: "从“三重号”选择一个号码，“二重号”中选择一个号码组成一注。",
            methodhelp: "选择1个三重号码和1个二重号码，所选三重号码在开奖号码中出现3次，并且所选二重号码在开奖号码中出现了2次，即为中奖。",
            methodexample: "投注方案：三重号：8；二重号：1<br>开奖号码：11888（顺序不限），即可中五星组选10。",
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
            desc: "组选10"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "四重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
            methodid1: 12,
            methodid: 874,
            name: "五星组选_组选5",
            methoddesc: "从“四重号”选择一个号码，“单号”中选择一个号码组成一注。",
            methodhelp: "选择1个四重号码和1个单号号码组成一注，所选的单号号码与开奖号码相同，且所选四重号码在开奖号码中出现了4次，即为中奖。",
            methodexample: "投注方案：四重号：8；单号：1<br>开奖号码：18888（顺序不限），即可中五星组选5。",
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
            desc: "组选5"
        }]
    },
    {
        gtitle: "五星特殊",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "一帆风顺",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 14,
            methodid: 85,
            name: "五星特殊_一帆风顺",
            methoddesc: "从0-9中任意选择1个以上号码。",
            methodhelp: "从0-9中任意选择1个号码组成一注，只要开奖号码的万位、千位、百位、十位、个位中包含所选号码，即为中奖。",
            methodexample: "投注方案：8<br>开奖号码：至少出现1个8，即中一帆风顺。",
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
            desc: "一帆风顺"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "好事成双",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 15,
            methodid: 86,
            name: "五星特殊_好事成双",
            methoddesc: "从0-9中任意选择1个以上的二重号码。",
            methodhelp: "从0-9中任意选择1个号码组成一注，只要所选号码在开奖号码的万位、千位、百位、十位、个位中出现2次，即为中奖。",
            methodexample: "投注方案：8<br>开奖号码：至少出现2个8，即中好事成双。",
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
            desc: "好事成双"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "三星报喜",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 16,
            methodid: 87,
            name: "五星特殊_三星报喜",
            methoddesc: "从0-9中任意选择1个以上的三重号码。",
            methodhelp: "从0-9中任意选择1个号码组成一注，只要所选号码在开奖号码的万位、千位、百位、十位、个位中出现3次，即为中奖。",
            methodexample: "投注方案：8<br>开奖号码：至少出现3个8，即中三星报喜。",
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
            desc: "三星报喜"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "四季发财",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 17,
            methodid: 88,
            name: "五星特殊_四季发财",
            methoddesc: "从0-9中任意选择1个以上的四重号码。",
            methodhelp: "从0-9中任意选择1个号码组成一注，只要所选号码在开奖号码的万位、千位、百位、十位、个位中出现4次，即为中奖。",
            methodexample: "投注方案：8<br>开奖号码：至少出现4个8，即中四季发财。",
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
            desc: "四季发财"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "四星",
    label: [{
        gtitle: "四星直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,X,X,X,X",
            code_sp: "",
			methodid1: 20,
            methodid: 2,
            name: "四星直选_直选复式",
            methoddesc: "从千位、百位、十位、个位各选一个号码组成一注。",
            methodhelp: "从千位、百位、十位、个位中选择一个4位数号码组成一注，所选号码与开奖号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：3456<br>开奖号码：3456，即中四星直选。",
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
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 21,
            methodid: 2,
            name: "四星直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个四位数号码组成一注。",
            methodhelp: "手动输入一个4位数号码组成一注，所选号码的千位、百位、十位、个位与开奖号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：3456<br>开奖号码：3456，即中四星直选。",
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
            desc: "直选单式"
        }/*,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,X,X,X,X",
            code_sp: "",
			methodid1: 22,
            methodid: 4,
            name: "四星直选_四星组合",
            methoddesc: "从千位、百位、十位、个位各选一个号码组成四注。",
            methodhelp: "从千位、百位、十位、个位中至少各选一个号码组成1-4星的组合，共四注，所选号码的个位与开奖号码相同，则中1个4等奖；<br>所选号码的个位、十位与开奖号码相同，则中1个4等奖以及1个3等奖，依此类推，最高可中4个奖。",
            methodexample: "投注方案：购买5+6+7+8，该票共8元，由以下4注：5678(四星)、678(三星)、78(二星)、8(一星)构成。<br>开奖号码：5678，即可中四星、三星、二星、一星各1注",
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
            desc: "四星组合"
        }*/]
    },
    {
        gtitle: "四星组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组选24",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 4
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 24,
            methodid: 6,
            name: "四星组选_组选24",
            methoddesc: "从0-9中选择4个号码组成一注。",
            methodhelp: "从0-9中任意选择4个号码组成一注，所选号码与开奖号码的千位、百位、十位、个位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：0568<br>开奖号码：*0568（顺序不限），即可中四星组选24。",
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
            desc: "组选24"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 2
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
			methodid1: 25,
            methodid: 7,
            name: "四星组选_组选12",
            methoddesc: "从“二重号”选择一个号码，“单号”中选择两个号码组成一注。",
            methodhelp: "选择1个二重号码和2个单号号码组成一注，所选号码与开奖号码的千位、百位、十位、个位相同，且所选二重号码在开奖号码中出现了2次，即为中奖。",
            methodexample: "投注方案：二重号：8；单号：06<br>开奖号码：*0688（顺序不限），即可中四星组选12。",
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
            desc: "组选12"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 2
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 26,
            methodid: 8,
            name: "四星组选_组选6",
            methoddesc: "从“二重号”中选择两个号码组成一注。",
            methodhelp: "选择2个二重号码组成一注，所选的2个二重号码在开奖号码的千位、百位、十位、个位中分别出现了2次，即为中奖。",
            methodexample: "投注方案：二重号：28<br>开奖号码：*2288（顺序不限），即可中四星组选6。",
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
            desc: "组选6"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "三重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X",
            code_sp: "",
			methodid1: 27,
            methodid: 9,
            name: "四星组选_组选4",
            methoddesc: "从“三重号”中选择一个号码，“单号”中选择一个号码组成一注。",
            methodhelp: "选择1个三重号码和1个单号号码组成一注，所选号码与开奖号码的千位、百位、十位、个位相同，且所选三重号码在开奖号码中出现了3次，即为中奖。",
            methodexample: "投注方案：三重号：8；单号：2<br>开奖号码：*8828（顺序不限），即可中四星组选4。",
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
            desc: "组选4"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "后三",
    label: [{
        gtitle: "后三直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,-,X,X,X",
            code_sp: "",
			methodid1: 30,
            methodid: 11,
            name: "后三直选_直选复式",
            methoddesc: "从百位、十位、个位各选一个号码组成一注。",
            methodhelp: "从百位、十位、个位中选择一个3位数号码组成一注，所选号码与开奖号码后3位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：345<br>开奖号码：345，即中后三直选。",
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
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 31,
            methodid: 11,
            name: "后三直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码组成一注。",
            methodhelp: "手动输入一个3位数号码组成一注，所选号码与开奖号码的百位、十位、个位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：345<br>开奖号码：345，即中后三直选。",
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
            desc: "直选单式"
        }/*,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,-,X,X,X",
            code_sp: "",
			methodid1: 32,
            methodid: 15,
            name: "后三直选_后三组合",
            methoddesc: "从百位、十位、个位各选一个号码组成三柱。",
            methodhelp: "从百位、十位、个位中至少各选择一个号码组成1-3星的组合共三注，当个位号码与开奖号码相同，则中1个3等奖；如果个位与十位号码与开奖号码相同，则中1个3等奖以及1个2等奖，依此类推，最高可中3个奖。",
            methodexample: "投注方案：购买：6+7+8，该票共6元，由以下3注：678(三星)、78(二星)、8(一星)构成<br>开奖号码：678，即可中三星、二星、一星各1注。",
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
            desc: "后三组合"
        }*/,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26|27",
                    place: 0,
                    cols: 0
                }],
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 33,
            methodid: 12,
            name: "后三直选_直选和值",
            methoddesc: "从0-27中任意选择1个或1个以上号码。",
            methodhelp: "所选数值等于开奖号码的百位、十位、个位三个数字相加之和，即为中奖。",
            methodexample: "投注方案：和值1<br>开奖号码：后三位001，010，100，即中后三直选。",
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
            desc: "直选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "跨度",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 34,
            methodid: 13,
            name: "后三直选_直选跨度",
            methoddesc: "从0-9中选择1个以上号码。",
            methodhelp: "所选数值等于开奖号码的后3位最大与最小数字相减之差，即为中奖。",
            methodexample: "投注方案：跨度8<br>开奖号码：后三位0,8,X，其中X不等于9；或者后三位1,9,X，其中X不等于0，即可中后三直选。",
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
            desc: "直选跨度"
        }]
    },
    {
        gtitle: "后三组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组三",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 36,
            methodid: 17,
            name: "后三组选_组三复式",
            methoddesc: "从0-9中任意选择2个或2个以上号码。",
            methodhelp: "从0-9中选择2个数字组成两注，所选号码与开奖号码的百位、十位、个位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：588<br>开奖号码：后三位588（顺序不限），即可中后三组选三。",
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
            desc: "组三复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 37,
            methodid: 17,
            name: "后三组选_组三单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码（三个数字中必须有二个数字相同）。",
            methodhelp: "手动输入一个3位数号码组成一注，三个数字中必须有二个数字相同，输入号码与开奖号码的百位、十位、个位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：001<br>开奖号码：后三位 010（顺序不限），即中后三组选三。",
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
            desc: "组三单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组六",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 38,
            methodid: 18,
            name: "后三组选_组六复式",
            methoddesc: "从0-9中任意选择3个或3个以上号码。",
            methodhelp: "从0-9中任意选择3个号码组成一注，所选号码与开奖号码的百位、十位、个位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：258<br>开奖号码：后三位 852（顺序不限），即中后三组选六。",
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
            desc: "组六复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 39,
            methodid: 18,
            name: "后三组选_组六单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码（三个数字完全不相同）。",
            methodhelp: "手动输入一个3位数号码组成一注，所选号码与开奖号码的百位、十位、个位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：123<br>开奖号码：后三位 321（顺序不限），即中后三组选六。",
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
            desc: "组六单式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 40,
            methodid: 19,
            name: "后三组选_混合组选",
            methoddesc: "手动输入号码，至少输入1个三位数号码。",
            methodhelp: "手动输入一个3位数号码组成一注（不含豹子号），开奖号码的百位、十位、个位符合后三组三或者组六均为中奖。",
            methodexample: "投注方案：001 和 123<br>开奖号码：后三位 010（顺序不限）即中后三组选三，或者后三位 312（顺序不限）即中后三组选六。",
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
            desc: "混合组选"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26",
                    place: 0,
                    cols: 0
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 41,
            methodid: 20,
            name: "后三组选_组选和值",
            methoddesc: "从1-26中选择1个号码。",
            methodhelp: "所选数值等于开奖号码百位、十位、个位三个数字相加之和(非豹子号)，即为中奖。",
            methodexample: "投注方案：和值3<br>开奖号码：后三位 003（顺序不限）即中后三组选三，或者后三位 012（顺序不限）即中后三组选六。",
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
            desc: "组选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "包胆",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "",
			methodid1: 42,
            methodid: 21,
            name: "后三组选_组选包胆",
            methoddesc: "从0-9中选择1个号码。",
            methodhelp: "从0-9中任意选择1个包胆号码，开奖号码的百位、十位、个位中任意1位与所选包胆号码相同(不含豹子号)，即为中奖。",
            methodexample: "投注方案：包胆3<br>开奖号码：后三位 3XX 或者 33X，即中后三组选三，后三位 3XY，即中后三组选六。",
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
            maxcodecount: 1,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组选包胆"
        }]
    },
    {
        gtitle: "后三其它",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值尾数",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 44,
            methodid: 23,
            name: "后三其它_和值尾数",
            methoddesc: "从0-9中选择1个号码。",
            methodhelp: "所选数值等于开奖号码的百位、十位、个位三个数字相加之和的尾数，即为中奖。",
            methodexample: "投注方案：和值尾数 8<br>开奖号码：后三位 936，和值位数为8，即中和值尾数。",
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
            desc: "和值尾数"
        },
        {
            selectarea: {
                type: "digitalts",
                layout: [{
                    title: "特殊号",
                    no: "豹子|顺子|对子",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "|",
			methodid1: 45,
            methodid: 25,
            name: "后三其它_特殊号",
            methoddesc: "选择一个号码形态。",
            methodhelp: "所选的号码特殊属性和开奖号码后3位的属性一致，即为中奖。其中：1.顺子号的个、十、百位不分顺序；2.对子号指的是开奖号码的后三位当中，任意2位数字相同的三位数号码。",
            methodexample: "投注方案：豹子顺子对子<br>开奖号码：后三位 888，即中豹子；后三位 678，即中顺子；后三位 558，即中对子。",
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
            desc: "特殊号"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "中三",
    label: [{
        gtitle: "中三直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,X,X,X,-",
            code_sp: "",
			methodid1: 48,
            methodid: 360,
            name: "中三直选_直选复式",
            methoddesc: "从千位、百位、十位各选一个号码组成一注。",
            methodhelp: "从千位、百位、十位中选择一个3位数号码组成一注，所选号码与开奖号码中3位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：345<br>开奖号码：345，即中中三直选。",
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
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 49,
            methodid: 360,
            name: "中三直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码组成一注。",
            methodhelp: "手动输入一个3位数号码组成一注，所选号码与开奖号码的千位、百位、十位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：345<br>开奖号码：345，即中中三直选。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "直选单式"
        }/*,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,X,X,X,-",
            code_sp: "",
			methodid1: 50,
            methodid: 363,
            name: "中三直选_中三组合",
            methoddesc: "从千位、百位、十位各选一个号码组成三柱。",
            methodhelp: "从千位、百位、十位中至少各选择一个号码组成1-3星的组合共三注，当十位号码与开奖号码相同，则中1个3等奖；如果十位与百位号码与开奖号码相同，则中1个3等奖以及1个2等奖，依此类推，最高可中3个奖。",
            methodexample: "投注方案：购买：6+7+8，该票共6元，由以下3注：678(三星)、78(二星)、8(一星)构成<br>开奖号码：678，即可中三星、二星、一星各1注。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "中三组合"
        }*/,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26|27",
                    place: 0,
                    cols: 0
                }],
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 51,
            methodid: 361,
            name: "中三直选_直选和值",
            methoddesc: "从0-27中任意选择1个或1个以上号码。",
            methodhelp: "所选数值等于开奖号码的千位、百位、十位三个数字相加之和，即为中奖。",
            methodexample: "投注方案：和值1<br>开奖号码：中三位001，010，100，即中中三直选。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "直选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "跨度",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 52,
            methodid: 362,
            name: "中三直选_直选跨度",
            methoddesc: "从0-9中选择1个以上号码。",
            methodhelp: "所选数值等于开奖号码的中3位最大与最小数字相减之差，即为中奖。",
            methodexample: "投注方案：跨度8<br>开奖号码：中三位0,8,X，其中X不等于9；或者中三位1,9,X，其中X不等于0，即可中中三直选。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "直选跨度"
        }]
    },
    {
        gtitle: "中三组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组三",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 54,
            methodid: 364,
            name: "中三组选_组三复式",
            methoddesc: "从0-9中任意选择2个或2个以上号码。",
            methodhelp: "从0-9中选择2个数字组成两注，所选号码与开奖号码的千位、百位、十位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：588<br>开奖号码：中三位588（顺序不限），即可中中三组选三。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组三复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 55,
            methodid: 364,
            name: "中三组选_组三单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码（三个数字中必须有二个数字相同）。",
            methodhelp: "手动输入一个3位数号码组成一注，三个数字中必须有二个数字相同，输入号码与开奖号码的千位、百位、十位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：001<br>开奖号码：中三位 010（顺序不限），即中中三组选三。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组三单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组六",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 56,
            methodid: 365,
            name: "中三组选_组六复式",
            methoddesc: "从0-9中任意选择3个或3个以上号码。",
            methodhelp: "从0-9中任意选择3个号码组成一注，所选号码与开奖号码的千位、百位、十位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：258<br>开奖号码：中三位 852（顺序不限），即中中三组选六。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组六复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 57,
            methodid: 365,
            name: "中三组选_组六单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码（三个数字完全不相同）。",
            methodhelp: "手动输入一个3位数号码组成一注，所选号码与开奖号码的千位、百位、十位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：123<br>开奖号码：中三位 321（顺序不限），即中中三组选六。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组六单式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 58,
            methodid: 366,
            name: "中三组选_混合组选",
            methoddesc: "手动输入号码，至少输入1个三位数号码。",
            methodhelp: "手动输入一个3位数号码组成一注（不含豹子号），开奖号码的千位、百位、十位符合中三组三或者组六均为中奖。",
            methodexample: "投注方案：001 和 123<br>开奖号码：中三位 010（顺序不限）即中中三组选三，或者中三位 312（顺序不限）即中中三组选六。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "混合组选"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26",
                    place: 0,
                    cols: 0
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 59,
            methodid: 367,
            name: "中三组选_组选和值",
            methoddesc: "从1-26中选择1个号码。",
            methodhelp: "所选数值等于开奖号码千位、百位、十位三个数字相加之和(非豹子号)，即为中奖。",
            methodexample: "投注方案：和值3<br>开奖号码：中三位 003（顺序不限）即中中三组选三，或者中三位 012（顺序不限）即中中三组选六。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "包胆",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "",
			methodid1: 60,
            methodid: 368,
            name: "中三组选_组选包胆",
            methoddesc: "从0-9中选择1个号码。",
            methodhelp: "从0-9中任意选择1个包胆号码，开奖号码的千位、百位、十位中任意1位与所选包胆号码相同(不含豹子号)，即为中奖。",
            methodexample: "投注方案：包胆3<br>开奖号码：中三位 3XX 或者 33X，即中中三组选三，中三位 3XY，即中中三组选六。",
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
            }],
            maxcodecount: 1,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组选包胆"
        }]
    },
    {
        gtitle: "中三其它",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值尾数",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 62,
            methodid: 369,
            name: "中三其它_和值尾数",
            methoddesc: "从0-9中选择1个号码。",
            methodhelp: "所选数值等于开奖号码的千位、百位、十位三个数字相加之和的尾数，即为中奖。",
            methodexample: "投注方案：和值尾数 8<br>开奖号码：中三位 936，和值位数为8，即中和值尾数。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "和值尾数"
        },
        {
            selectarea: {
                type: "digitalts",
                layout: [{
                    title: "特殊号",
                    no: "豹子|顺子|对子",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "|",
			methodid1: 63,
            methodid: 340,
            name: "中三其它_特殊号",
            methoddesc: "选择一个号码形态。",
            methodhelp: "所选的号码特殊属性和开奖号码中3位的属性一致，即为中奖。其中：1.顺子号的个、百、千位不分顺序；2.对子号指的是开奖号码的中三位当中，任意2位数字相同的三位数号码。",
            methodexample: "投注方案：豹子顺子对子<br>开奖号码：中三位 888，即中豹子；中三位 678，即中顺子；中三位 558，即中对子。",
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
            }],
            maxcodecount: 0,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "特殊号"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "前三",
    label: [{
        gtitle: "前三直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,-,-",
            code_sp: "",
			methodid1: 66,
            methodid: 27,
            name: "前三直选_直选复式",
            methoddesc: "从万位、千位、百位各选一个号码组成一注。",
            methodhelp: "从万位、千位、百位中选择一个3位数号码组成一注，所选号码与开奖号码前3位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：345<br>开奖号码：前三位 345，即中前三直选。",
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
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 67,
            methodid: 27,
            name: "前三直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码组成一注。",
            methodhelp: "手动输入一个3位数号码组成一注，所选号码与开奖号码的万位、千位、百位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：345<br>开奖号码：前三位 345，即中前三直选。",
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
            desc: "直选单式"
        }/*,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,-,-",
            code_sp: "",
			methodid1: 68,
            methodid: 31,
            name: "前三直选_前三组合",
            methoddesc: "从万位、千位、百位各选一个号码组成三注。",
            methodhelp: "从万位、千位、百位中至少各选择一个号码组成1-3星的组合共三注，当百位号码与开奖号码相同，则中1个3等奖；<br>如果百位与千位号码与开奖号码相同，则中1个3等奖以及1个2等奖，依此类推，最高可中3个奖。",
            methodexample: "投注方案：购买：6+7+8，该票共6元，由以上3注：678(三星)、78(二星)、8(一星)构成<br>开奖号码：前三位 678，即可中三星、二星、一星各1注。",
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
            desc: "前三组合"
        }*/,
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26|27",
                    place: 0,
                    cols: 0
                }],
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 69,
            methodid: 28,
            name: "前三直选_直选和值",
            methoddesc: "从0-27中任意选择1个或1个以上号码。",
            methodhelp: "所选数值等于开奖号码的万位、千位、百位三个数字相加之和，即为中奖。",
            methodexample: "投注方案：和值 1<br>开奖号码：前三位 001、010、100，即中前三直选。",
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
            desc: "直选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "跨度",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 70,
            methodid: 29,
            name: "前三直选_直选跨度",
            methoddesc: "从0-9中选择1个号码。",
            methodhelp: "所选数值等于开奖号码的前3位最大与最小数字相减之差，即为中奖。",
            methodexample: "投注方案：跨度8<br>开奖号码：前三位0,8,X，其中X不等于9；或者前三位1,9,X，其中X不等于0，即可中前三直选。",
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
            desc: "直选跨度"
        }]
    },
    {
        gtitle: "前三组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组三",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 72,
            methodid: 33,
            name: "前三组选_组三复式",
            methoddesc: "从0-9中任意选择2个或2个以上号码。",
            methodhelp: "从0-9中选择2个数字组成两注，所选号码与开奖号码的万位、千位、百位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：588<br>开奖号码：前三位588（顺序不限），即可中前三组选三。",
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
            desc: "组三复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 73,
            methodid: 33,
            name: "前三组选_组三单式",
            methoddesc: "手动输入号码，至少输入1个三位数号码（三个数字当中必须有二个数字相同）。",
            methodhelp: "手动输入一个3位数号码组成一注，三个数字当中必须有二个数字相同，所选号码与开奖号码的百位、十位、个位相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：588<br>开奖号码：前三位588（顺序不限），即可中前三组选三。",
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
            desc: "组三单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组六",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 74,
            methodid: 34,
            name: "前三组选_组六复式",
            methoddesc: "从0-9中任意选择3个或3个以上号码。",
            methodhelp: "从0-9中任意选择3个号码组成一注，所选号码与开奖号码的万位、千位、百位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：258<br>开奖号码：前三位 852（顺序不限），即中前三组选六。",
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
            desc: "组六复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 75,
            methodid: 34,
            name: "前三组选_组六单式",
            methoddesc: "手动输入号码，至少输入1个三位数号（三个数字全不相同）。",
            methodhelp: "手动输入一个3位数号码组成一注，所选号码与开奖号码的万位、千位、百位相同，顺序不限，即为中奖。",
            methodexample: "投注方案：123<br>开奖号码：前三位 312（顺序不限），即中前三组选六。",
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
            desc: "组六单式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 76,
            methodid: 35,
            name: "前三组选_混合组选",
            methoddesc: "手动输入号码，至少输入1个三位数号码。",
            methodhelp: "手动输入一个3位数号码组成一注（不含豹子号），开奖号码的万位、千位、百位符合前三组三或组六均为中奖。",
            methodexample: "投注方案：001 和 123<br>开奖号码：前三位 010（顺序不限）即中前三组选三，或者前三位 312（顺序不限）即中前三组选六。",
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
            desc: "混合组选"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26",
                    place: 0,
                    cols: 0
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 77,
            methodid: 36,
            name: "前三组选_组选和值",
            methoddesc: "从1-26中任意选择1个以上号码。",
            methodhelp: "所选数值等于开奖号码万位、千位、百位三个数字相加之和(非豹子号)，即为中奖。",
            methodexample: "投注方案：和值3<br>开奖号码：前三位 003（顺序不限）即中前三组选三，或者前三位 012（顺序不限）即中前三组选六。",
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
            desc: "组选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "包胆",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "",
			methodid1: 78,
            methodid: 37,
            name: "前三组选_组选包胆",
            methoddesc: "从0-9中任选1个号码。",
            methodhelp: "从0-9中任意选择1个包胆号码，开奖号码的万位、千位、百位中任意1位只要和所选包胆号码相同，即为中奖。",
            methodexample: "投注方案：包胆3<br>开奖号码：前三位 3XX 或者 33X，即中前三组选三，或者前三位 3XY，即中前三组选六。",
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
            maxcodecount: 1,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组选包胆"
        }]
    },
    {
        gtitle: "前三其它",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值尾数",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 80,
            methodid: 39,
            name: "前三其它_和值尾数",
            methoddesc: "从0-9中选择1个号码。",
            methodhelp: "所选数值等于开奖号码的万位、千位、百位三个数字相加之和的尾数，即为中奖。",
            methodexample: "投注方案：和值尾数 8开奖号码：前三位 936，和值位数为8，即中和值尾数。",
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
            desc: "和值尾数"
        },
        {
            selectarea: {
                type: "digitalts",
                layout: [{
                    title: "特殊号",
                    no: "豹子|顺子|对子",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "|",
			methodid1: 81,
            methodid: 41,
            name: "前三其它_特殊号",
            methoddesc: "选择一个号码形态。",
            methodhelp: "所选的号码特殊属性和开奖号码前3位的属性一致，即为中奖。<br>其中：1.顺子号的万、千、百位不分顺序；<br>2.对子号指的是开奖号码的前三位当中，任意2位数字相同的三位数号码。",
            methodexample: "投注方案：豹子顺子对子<br>开奖号码：前三位 888，即中豹子；前三位 678，即中顺子；前三位 558，即中对子。",
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
            desc: "特殊号"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "后二",
    label: [{
        gtitle: "后二直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "-,-,-,X,X",
            code_sp: "",
			methodid1: 84,
            methodid: 47,
            name: "后二直选_直选复式",
            methoddesc: "从十位、个位中至少各选1个号码组成一注。",
            methodhelp: "从十位、个位中选择一个2位数号码组成一注，所选号码与开奖号码的后2位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：58<br>开奖号码：后二位 58，即中后二直选。",
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
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 85,
            methodid: 47,
            name: "后二直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个二位数号码组成一注。",
            methodhelp: "手动输入一个2位数号码组成一注，输入号码的十位、个位与开奖号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：58<br>开奖号码：后二位 58，即中后二直选。",
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
            desc: "直选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "10|11|12|13|14|15|16|17|18",
                    place: 0,
                    cols: 0
                }],
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 86,
            methodid: 48,
            name: "后二直选_直选和值",
            methoddesc: "从0-18中任意选择1个或1个以上的和值号码。",
            methodhelp: "所选数值等于开奖号码的十位、个位二个数字相加之和，即为中奖。",
            methodexample: "投注方案：和值1<br>开奖号码：后二位 01，10，即中后二直选。",
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
            desc: "直选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "跨度",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 87,
            methodid: 49,
            name: "后二直选_直选跨度",
            methoddesc: "从0-9中任意选择1个号码组成一注。",
            methodhelp: "所选数值等于开奖号码的后2位最大与最小数字相减之差，即为中奖。",
            methodexample: "投注方案：跨度9<br>开奖号码：后二位 90或09，即中后二直选。",
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
            desc: "直选跨度"
        }]
    },
    {
        gtitle: "后二组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组选",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 89,
            methodid: 55,
            name: "后二组选_组选复式",
            methoddesc: "从0-9中任意选择2个或2个以上号码。",
            methodhelp: "从0-9中选2个号码组成一注，所选号码与开奖号码的十位、个位相同（不含对子号），顺序不限，即中奖。",
            methodexample: "投注方案：58<br>开奖号码：后二位 85 或者 58（顺序不限，不含对子号），即中后二组选。。",
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
            desc: "组选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 90,
            methodid: 55,
            name: "后二组选_组选单式",
            methoddesc: "手动输入号码，至少输入1个二位数号码组成一注。",
            methodhelp: "手动输入一个2位数号码组成一注，输入号码的十位、个位与开奖号码相同（不含对子号），顺序不限，即为中奖。",
            methodexample: "投注方案：58<br>开奖号码：前二位 85 或者 58（顺序不限，不含对子号），即中前二组选。",
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
            desc: "组选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
            methodid1: 91,
            methodid: 56,
            name: "后二组选_组选和值",
            methoddesc: "从1-17中任意选择1个或者1个以上号码。",
            methodhelp: "所选数值等于开奖号码的十位、个位二个数字相加之和（不含对子号），即为中奖。",
            methodexample: "投注方案：和值 1<br>开奖号码：后二位 10 或者 01（顺序不限，不含对子号），即中后二组选。",
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
            desc: "组选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "包胆",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "",
            methodid1: 92,
            methodid: 57,
            name: "后二组选_组选包胆",
            methoddesc: "从0-9中任意选择1个包胆号码。",
            methodhelp: "从0-9中任意选择1个包胆号码，开奖号码的十位，个位中任意1位包含所选的包胆号码相同（不含对子号），即为中奖。",
            methodexample: "投注方案：包胆 8 <br>开奖号码：后二位 8X，且X不等于8，即中后二组选。",
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
            maxcodecount: 1,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组选包胆"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "前二",
    label: [{
        gtitle: "前二直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,-,-,-",
            code_sp: "",
            methodid1: 95,
            methodid: 43,
            name: "前二直选_直选复式",
            methoddesc: "从万位、千位中至少各选1个号码组成一注。",
            methodhelp: "从万位、千位中选择一个2位数号码组成一注，所选号码与开奖号码的前2位相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：58<br>开奖号码：前二位 58，即中前二直选。",
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
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 96,
            methodid: 43,
            name: "前二直选_直选单式",
            methoddesc: "手动输入号码，至少输入1个二位数号码组成一注。",
            methodhelp: "手动输入一个2位数号码组成一注，输入号码的万位、千位与开奖号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：58<br>开奖号码：前二位 58，即中前二直选。",
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
            desc: "直选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "10|11|12|13|14|15|16|17|18",
                    place: 0,
                    cols: 0
                }],
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 97,
            methodid: 44,
            name: "前二直选_直选和值",
            methoddesc: "从0-18中任意选择1个或1个以上的和值号码。",
            methodhelp: "所选数值等于开奖号码的万位、千位二个数字相加之和，即为中奖。",
            methodexample: "投注方案：和值1<br>开奖号码：前二位 01，10，即中前二直选。",
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
            desc: "直选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "跨度",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 98,
            methodid: 45,
            name: "前二直选_直选跨度",
            methoddesc: "从0-9中任意选择1个号码组成一注。",
            methodhelp: "所选数值等于开奖号码的前2位最大与最小数字相减之差，即为中奖。",
            methodexample: "投注方案：跨度9<br>开奖号码：前二位 90或09，即中前二直选。",
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
            desc: "直选跨度"
        }]
    },
    {
        gtitle: "前二组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组选",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 100,
            methodid: 51,
            name: "前二组选_组选复式",
            methoddesc: "从0-9中任意选择2个或2个以上号码。",
            methodhelp: "从0-9中选2个号码组成一注，所选号码与开奖号码的万位、千位相同，顺序不限，即中奖。",
            methodexample: "投注方案：58<br>开奖号码：前二位 85 或者 58（顺序不限，不含对子号），即中前二组选。",
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
            desc: "组选复式"
        },
        {
            selectarea: {
                type: "input"
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 101,
            methodid: 51,
            name: "前二组选_组选单式",
            methoddesc: "手动输入号码，至少输入1个二位数号码组成一注。",
            methodhelp: "手动输入一个2位数号码组成一注，输入号码的万位、千位与开奖号码相同，顺序不限，即为中奖。",
            methodexample: "投注方案：58<br>开奖号码：前二位 85 或者 58（顺序不限，不含对子号），即中前二组选。",
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
            desc: "组选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 102,
            methodid: 52,
            name: "前二组选_组选和值",
            methoddesc: "从1-17中任意选择1个或者1个以上号码。",
            methodhelp: "所选数值等于开奖号码的万位、千位二个数字相加之和（不含对子号），即为中奖。",
            methodexample: "投注方案：和值 1<br>开奖号码：前二位 10 或者 01（顺序不限，不含对子号），即中前二组选。",
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
            desc: "组选和值"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "包胆",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false
            },
            show_str: "X",
            code_sp: "",
			methodid1: 103,
            methodid: 53,
            name: "前二组选_组选包胆",
            methoddesc: "从0-9中任意选择1个包胆号码。",
            methodhelp: "从0-9中任意选择1个包胆号码，开奖号码的万位，千位中任意1位包含所选的包胆号码相同（不含对子号），即为中奖。",
            methodexample: "投注方案：包胆 8 <br>开奖号码：前二位 8X，且X不等于8，即中前二组选。",
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
            maxcodecount: 1,
            isrx: 0,
            numcount: 0,
            defaultposition: "00000",
            desc: "组选包胆"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "定位胆",
    label: [{
        gtitle: "定位胆",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 4,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,X,X",
            code_sp: "",
			methodid1: 104,
            methodid: 59,
            name: "定位胆",
            methoddesc: "在万位、千位、百位、十位、个位任意位置上任意选择1个或1个以上号码。",
            methodhelp: "从万位、千位、百位、十位、个位任意位置上至少选择1个以上号码，所选号码与相同位置上的开奖号码一致，即为中奖。",
            methodexample: "投注方案：万位 1<br>开奖号码：万位 1，即中定位胆万位。",
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
            desc: "定位胆"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "不定位",
    label: [{
        gtitle: "三星",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 107,
            methodid: 65,
            name: "三星_后三一码",
            methoddesc: "从0-9中任意选择1个以上号码。",
            methodhelp: "从0-9中选择1个号码，每注由1个号码组成，只要开奖号码的百位、十位、个位中包含所选号码，即为中奖。",
            methodexample: "投注方案：1<br>开奖号码：后三位至少出现1个1，即中后三一码不定位。",
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
            desc: "后三一码"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 108,
            methodid: 66,
            name: "三星_前三一码",
            methoddesc: "从0-9中任意选择1个以上号码。",
            methodhelp: "从0-9中选择1个号码，每注由1个号码组成，只要开奖号码的万位、千位、百位中包含所选号码，即为中奖。",
            methodexample: "投注方案：1<br>开奖号码：前三位，至少出现1个1，即中前三一码不定位。",
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
            desc: "前三一码"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 109,
            methodid: 68,
            name: "三星_后三二码",
            methoddesc: "从0-9中任意选择2个以上号码。",
            methodhelp: "从0-9中选择2个号码，每注由2个不同的号码组成，开奖号码的百位、十位、个位中同时包含所选的2个号码，即为中奖。",
            methodexample: "投注方案：12<br>开奖号码：后三位，至少出现1和2各1个，即中后三二码不定位。",
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
            desc: "后三二码"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 110,
            methodid: 69,
            name: "三星_前三二码",
            methoddesc: "从0-9中任意选择2个以上号码。",
            methodhelp: "从0-9中选择2个号码，每注由2个不同的号码组成，开奖号码的万位、千位、百位中同时包含所选的2个号码，即为中奖。",
            methodexample: "投注方案：12<br>开奖号码：前三位，至少出现1和2各1个，即中前三二码不定位。",
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
            desc: "前三二码"
        }]
    },
    {
        gtitle: "四星",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 112,
            methodid: 71,
            name: "四星_四星一码",
            methoddesc: "从0-9中任意选择1个以上号码。",
            methodhelp: "从0-9中选择1个号码，每注由1个号码组成，只要开奖号码的千位、百位、十位、个位中包含所选号码，即为中奖。",
            methodexample: "投注方案：1<br>开奖号码：后四位，至少出现1个1，即中四星一码不定位。",
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
            desc: "四星一码"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 113,
            methodid: 73,
            name: "四星_四星二码",
            methoddesc: "从0-9中任意选择2个以上号码。",
            methodhelp: "从0-9中选择2个号码，每注由2个不同的号码组成，开奖号码的千位、百位、十位、个位中同时包含所选的2个号码，即为中奖。",
            methodexample: "投注方案：12<br>开奖号码：后四位，至少出现1和2各一个，即中四星二码不定位。",
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
            desc: "四星二码"
        }]
    },
    {
        gtitle: "五星",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 115,
            methodid: 75,
            name: "五星_五星二码",
            methoddesc: "从0-9中任意选择2个以上号码。",
            methodhelp: "从0-9中选择2个号码，每注由2个不同的号码组成，开奖号码的万位、千位、百位、十位、个位中同时包含所选的2个号码，即为中奖。",
            methodexample: "投注方案：12<br>开奖号码：至少出现1和2各一个，即中五星二码不定位。",
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
            desc: "五星二码"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "不定位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 116,
            methodid: 77,
            name: "五星_五星三码",
            methoddesc: "从0-9中任意选择3个以上号码。",
            methodhelp: "从0-9中选择3个号码，每注由3个不同的号码组成，开奖号码的万位、千位、百位、十位、个位中同时包含所选的3个号码，即为中奖。",
            methodexample: "投注方案：123<br>开奖号码：至少出现1、2、3各1个，即中五星三码不定位。",
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
            desc: "五星三码"
        }]
    }]
},
{
    isrx: "0",
    isdefault: "0",
    title: "大小单双",
    label: [{
        gtitle: "大小单双",
        label: [{
            selectarea: {
                type: "dxds",
                layout: [{
                    title: "万位",
                    no: "大|小|单|双",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "大|小|单|双",
                    place: 1,
                    cols: 1
                }]
            },
            show_str: "X,X",
            code_sp: "",
			methodid1: 119,
            methodid: 79,
            name: "大小单双_前二大小单双",
            methoddesc: "从万位、千位中的“大、小、单、双”中至少各选一个组成一注。",
            methodhelp: "对万位、千位的“大（56789）小（01234）、单（13579）双（02468）”形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。",
            methodexample: "投注方案：小双<br>开奖号码：万位与千位“小双”，即中前二大小单双。",
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
            desc: "前二大小单双"
        },
        {
            selectarea: {
                type: "dxds",
                layout: [{
                    title: "十位",
                    no: "大|小|单|双",
                    place: 0,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "大|小|单|双",
                    place: 1,
                    cols: 1
                }]
            },
            show_str: "X,X",
            code_sp: "",
            methodid: 120,
            name: "大小单双_后二大小单双",
            methoddesc: "从十位、个位中的“大、小、单、双”中至少各选一个组成一注。",
            methodhelp: "对十位和个位的“大（56789）小（01234）、单（13579）双（02468）”形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。",
            methodexample: "投注方案：大单<br>开奖号码：十位与个位“大单”，即中后二大小单双。",
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
            desc: "后二大小单双"
        },
        {
            selectarea: {
                type: "dxds",
                layout: [{
                    title: "万位",
                    no: "大|小|单|双",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "大|小|单|双",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "大|小|单|双",
                    place: 2,
                    cols: 1
                }]
            },
            show_str: "X,X,X",
            code_sp: "",
			methodid1: 121,
            methodid: 82,
            name: "大小单双_前三大小单双",
            methoddesc: "从万位、千位、百位中的“大、小、单、双”中至少各选一个组成一注。",
            methodhelp: "对万位、千位和百位的“大（56789）小（01234）、单（13579）双（02468）”形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。",
            methodexample: "投注方案：小双小<br>开奖号码：万位、千位、百位“小双小”，即中前三大小单双。",
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
            desc: "前三大小单双"
        },
        {
            selectarea: {
                type: "dxds",
                layout: [{
                    title: "百位",
                    no: "大|小|单|双",
                    place: 0,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "大|小|单|双",
                    place: 1,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "大|小|单|双",
                    place: 2,
                    cols: 1
                }]
            },
            show_str: "X,X,X",
            code_sp: "",
			methodid1: 122,
            methodid: 83,
            name: "大小单双_后三大小单双",
            methoddesc: "从百位、十位、个位中的“大、小、单、双”中至少各选一个组成一注。",
            methodhelp: "对百位、十位和个位的“大（56789）小（01234）、单（13579）双（02468）”形态进行购买，所选号码的位置、形态与开奖号码的位置、形态相同，即为中奖。",
            methodexample: "投注方案：大单大<br>开奖号码：百位、十位、个位“大单大”，即中后三大小单双。",
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
            desc: "后三大小单双"
        }]
    }]
},
{
    isrx: "1",
    isdefault: "0",
    title: "任选二",
    label: [{
        gtitle: "任二直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 4,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,X,X",
            code_sp: "",
			methodid1: 125,
            methodid: 654,
            name: "任二直选_直选复式",
            methoddesc: "从万位、千位、百位、十位、个位中至少两位上各选1个号码组成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少两位上各选1个号码组成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：万位5，百位8<br>开奖号码：51812，即中任二直选。",
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
            isrx: 1,
            numcount: 2,
            defaultposition: "00011",
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 126,
            methodid: 654,
            name: "任二直选_直选单式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择两个位置,至少手动输入一个两位数的号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择两个位置,至少手动输入一个两位数的号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位，输入号码58<br>开奖号码：51812，即中任二直选(单式)。",
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
            isrx: 1,
            numcount: 2,
            defaultposition: "00011",
            desc: "直选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "10|11|12|13|14|15|16|17|18",
                    place: 0,
                    cols: 0
                }],
                isButton: false,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 127,
            methodid: 755,
            name: "任二直选_直选和值",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择两个位置,至少选择一个和值号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择两个位置,至少选择一个和值号码构成一注，所选号码与开奖号码的和值相同，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位，选择和值号码13<br>开奖号码：51812，即中任二直选(单式)。",
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
            isrx: 1,
            numcount: 2,
            defaultposition: "00011",
            desc: "直选和值"
        }]
    },
    {
        gtitle: "任二组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组选",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 129,
            methodid: 664,
            name: "任二组选_组选复式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择两个位置,号码区至少选择两个号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择两个位置,号码区至少选择两个号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位，选择号码85<br>开奖号码：51812或者81512，即中任二组选。",
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
            isrx: 1,
            numcount: 2,
            defaultposition: "00011",
            desc: "组选复式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 130,
            methodid: 664,
            name: "任二组选_组选单式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择两个位置,至少手动输入一个两位数的号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择两个位置,至少手动输入一个两位数的号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位，输入号码85<br>开奖号码：51812或者81512，即中任二组选(单式)。",
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
            isrx: 1,
            numcount: 2,
            defaultposition: "00011",
            desc: "组选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: false,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 131,
            methodid: 765,
            name: "任二组选_组选和值",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择两个位置,至少选择一个和值号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择两个位置,至少选择一个和值号码构成一注，所选号码与开奖号码的和值相同，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位，选择和值号码13<br>开奖号码：51812，即中任二组选和值。",
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
            isrx: 1,
            numcount: 2,
            defaultposition: "00011",
            desc: "组选和值"
        }]
    }]
},
{
    isrx: "1",
    isdefault: "0",
    title: "任选三",
    label: [{
        gtitle: "任三直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 4,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,X,X",
            code_sp: "",
			methodid1: 134,
            methodid: 676,
            name: "任三直选_直选复式",
            methoddesc: "从万位、千位、百位、十位、个位中至少三位上各选1个号码组成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少三位上各选1个号码组成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：万位5，百8,个位2<br>开奖号码：51812，即中任三直选。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 135,
            methodid: 676,
            name: "任三直选_直选单式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,至少手动输入一个三位数的号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,至少手动输入一个三位数的号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位,个位，输入号码582<br>开奖号码：51812，即中任三直选(单式)。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "直选单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "0|1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26|27",
                    place: 0,
                    cols: 0
                }],
                isButton: false,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 136,
            methodid: 708,
            name: "任三直选_直选和值",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,至少选择一个和值号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,至少选择一个和值号码构成一注，所选号码与开奖号码的和值相同，即为中奖。",
            methodexample: "投注方案：位置选择万位、百位、个位，选择和值号码15<br>开奖号码：51812，即中任二直选(单式)。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "直选和值"
        }]
    },
    {
        gtitle: "任三组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组三",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 138,
            methodid: 686,
            name: "任三组选_组三复式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,号码区至少选择两个号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,号码区至少选择两个号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：选择位置万位、十位、个位,选择号码12<br>开奖号码：11812，即中任三组三。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "组三复式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 139,
            methodid: 686,
            name: "任三组选_组三单式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,手动至少输入两个号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,手动至少输入两个号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：选择位置万位、十位、个位,输入号码12<br>开奖号码：11812，即中任三组三(单式)。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "组三单式"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组六",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X",
            code_sp: "",
			methodid1: 140,
            methodid: 696,
            name: "任三组选_组六复式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,号码区至少选择三个号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,号码区至少选择三个号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：选择位置万位、十位、个位,选择号码512<br>开奖号码：51812，即中任三组六。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "组六复式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 141,
            methodid: 696,
            name: "任三组选_组六单式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,手动至少输入三个号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,手动至少输入三个号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：选择位置万位、十位、个位,输入号码512<br>开奖号码：51812，即中任三组六(单式)。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "组六单式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 142,
            methodid: 775,
            name: "任三组选_混合组选",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,手动至少输入三个号码构成一注(不包含豹子号)。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择三个位置,手动至少输入三个号码构成一注(不包含豹子号)，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：选择位置万位、十位、个位,输入号码512<br>开奖号码：51812，即中任三混合组选。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "混合组选"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "和值",
                    no: "1|2|3|4|5|6|7|8|9|10|11|12|13",
                    place: 0,
                    cols: 1
                },
                {
                    title: "",
                    no: "14|15|16|17|18|19|20|21|22|23|24|25|26",
                    place: 0,
                    cols: 0
                }],
                noBigIndex: 5,
                isButton: false,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 143,
            methodid: 718,
            name: "任三组选_组选和值",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择三个位置,至少选择一个和值号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择两个位置,至少选择一个和值号码构成一注，所选号码与开奖号码的和值(不包含豹子号)相同，即为中奖。",
            methodexample: "投注方案：选择位置万位、十位、个位,选择和值号码8<br>开奖号码：51812，即中任三组选和值。",
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
            isrx: 1,
            numcount: 3,
            defaultposition: "00111",
            desc: "组选和值"
        }]
    }]
},
{
    isrx: "1",
    isdefault: "0",
    title: "任选四",
    label: [{
        gtitle: "任四直选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "万位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1
                },
                {
                    title: "千位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1
                },
                {
                    title: "百位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 2,
                    cols: 1
                },
                {
                    title: "十位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 3,
                    cols: 1
                },
                {
                    title: "个位",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 4,
                    cols: 1
                }],
                noBigIndex: 5,
                isButton: true
            },
            show_str: "X,X,X,X,X",
            code_sp: "",
			methodid1: 146,
            methodid: 725,
            name: "任四直选_直选复式",
            methoddesc: "从万位、千位、百位、十位、个位中至少四位上各选1个号码组成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少四位上各选1个号码组成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：万位5，千位1,百位8,十位1<br>开奖号码：51812，即中任四直选。",
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
            isrx: 1,
            numcount: 4,
            defaultposition: "01111",
            desc: "直选复式"
        },
        {
            selectarea: {
                type: "input",
                selPosition: true
            },
            show_str: "X",
            code_sp: " ",
			methodid1: 147,
            methodid: 725,
            name: "任四直选_直选单式",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择四个位置,至少手动输入一个四位数的号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择四个位置,至少手动输入一个四位数的号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序一致，即为中奖。",
            methodexample: "投注方案：选择万位、千位、百位、十位，输入号码5181<br>开奖号码：51812，即中任四直选(单式)。",
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
            isrx: 1,
            numcount: 4,
            defaultposition: "01111",
            desc: "直选单式"
        }]
    },
    {
        gtitle: "任四组选",
        label: [{
            selectarea: {
                type: "digital",
                layout: [{
                    title: "组选24",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 4
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 149,
            methodid: 730,
            name: "任四组选_组选24",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择四个位置,号码区至少选择四个号码构成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择四个位置,号码区至少选择四个号码构成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：位置选择千位、百位、十位、个位,号码选择0568<br>开奖号码：10568(指定位置号码顺序不限)，即可中任四组选24。",
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
            isrx: 1,
            numcount: 4,
            defaultposition: "01111",
            desc: "组选24"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 2
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X,X",
            code_sp: "",
			methodid1: 150,
            methodid: 735,
            name: "任四组选_组选12",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择四个位置,从“二重号”选择一个号码，“单号”中选择两个号码组成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择四个位置,从“二重号”选择一个号码，“单号”中选择两个号码组成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：位置选择千位、百位、十位、个位,二重号：8；单号：06<br>开奖号码：10688(指定位置号码顺序不限)，即可中任四组选12。",
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
            isrx: 1,
            numcount: 4,
            defaultposition: "01111",
            desc: "组选12"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "二重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 2
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X",
            code_sp: ",",
			methodid1: 151,
            methodid: 740,
            name: "任四组选_组选6",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择四个位置,从“二重号”中选择两个号码组成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择四个位置,从“二重号”中选择两个号码组成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：位置选择千位、百位、十位、个位,二重号：28<br>开奖号码：12288(指定位置号码顺序不限)，即可中任四组选6。",
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
            isrx: 1,
            numcount: 4,
            defaultposition: "01111",
            desc: "组选6"
        },
        {
            selectarea: {
                type: "digital",
                layout: [{
                    title: "三重号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 0,
                    cols: 1,
                    minchosen: 1
                },
                {
                    title: "单　号",
                    no: "0|1|2|3|4|5|6|7|8|9",
                    place: 1,
                    cols: 1,
                    minchosen: 1
                }],
                noBigIndex: 5,
                isButton: true,
                selPosition: true
            },
            show_str: "X,X",
            code_sp: "",
			methodid1: 152,
            methodid: 745,
            name: "任四组选_组选4",
            methoddesc: "从万位、千位、百位、十位、个位中至少选择四个位置,从“三重号”中选择一个号码，“单号”中选择一个号码组成一注。",
            methodhelp: "从万位、千位、百位、十位、个位中至少选择四个位置,从“三重号”中选择一个号码，“单号”中选择一个号码组成一注，所选号码与开奖号码的指定位置上的号码相同，且顺序不限，即为中奖。",
            methodexample: "投注方案：位置选择千位、百位、十位、个位,三重号：8；单号：2<br>开奖号码：18828(指定位置号码顺序不限)，即可中任四组选4。",
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
            isrx: 1,
            numcount: 4,
            defaultposition: "01111",
            desc: "组选4"
        }]
    }]
}];