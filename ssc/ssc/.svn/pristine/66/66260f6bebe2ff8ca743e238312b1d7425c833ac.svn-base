<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <meta http-equiv="refresh" content="5">
</head>
<body>
<?php
$src = 'http://f.apiplus.cn/cqssc-1.json';
$src .= '?_='.time();
$json = file_get_contents(urldecode($src));
$json = json_decode($json,true);
//print_r($json);exit;
$con = mysql_connect("118.89.29.73","root","root123");
mysql_query("set names 'utf8'");
mysql_select_db('gambling');
if(!empty($json['code'])){
        $code = 2;  //重庆时时彩
        foreach ($json['data'] as $v) {
    //    print_r($v);exit;
        $expect = $v['expect'];
        $opencode = $v['opencode'];
        $opentime = $v['opentime'];
        $opentimestamp = $v['opentimestamp'];
        $find = "SELECT * FROM  `g_open_prize_data` WHERE  `expect` = '$expect'";
        $result = mysql_query($find);
        $test = mysql_fetch_array($result);
        if(empty($test)){
            $sql = "insert into g_open_prize_data set code = '$code',expect = '$expect', opencode = '$opencode', opentimestamp =  '$opentimestamp',opentime = '$opentime'";
            mysql_query($sql);
        }
    }
    mysql_close(); 
}

?>
</body>
</html>