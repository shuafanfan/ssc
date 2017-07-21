<?php


// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件
header("Content-type:text/html;charset=utf-8");
//print_r(PHP_VERSION);exit;
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define('RUNTIME_PATH','Runtime/');
// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
//$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//$list = explode('/', $url);
////加载前台的项目代码
//if($list[2] == 'Html'){
//       R('Html/Index');
//}
//if($list[2] == 'Home'){
//    R('Home/Index');
//}
// 亲^_^ 后面不需要任何代码了 就是如此简单