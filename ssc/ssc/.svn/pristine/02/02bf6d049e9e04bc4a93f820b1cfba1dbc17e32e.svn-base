create table g_play_way(
    id int(4) primary key auto_increment,
    name varchar(50) not null default '' comment '名称',
    status tinyint(1) not null default 0 comment '状态: 0关闭 1开启',
    sort int(4) not null default 0 comment '排序',
    max_bonus double(10, 2) not null default 0 comment '最高奖金',
    min_bonus double(10, 2) not null default 0 comment '最低奖金',
    num int(4) not null default 0 comment '注数',
    type_id int(4) not null default 0 comment '玩法类型',
    created_at timestamp not null default '0000-00-00 00:00:00',
    updated_at timestamp not null default '0000-00-00 00:00:00'
) comment '玩法表' default charset=utf8;

create table g_play_way_type(
    id int(4) primary key auto_increment,
    name varchar(50) not null default '' comment '名称',
    status tinyint(1) not null default 0 comment '状态: 0关闭 1开启',
    cate_id int(4) not null default 0 comment '彩种ID',
    sort int(4) not null default 0 comment '排序'
) comment '玩法类型' default charset=utf8;

alter table g_play_way_type add column col varchar(20) not null DEFAULT '' COMMENT '列类型';