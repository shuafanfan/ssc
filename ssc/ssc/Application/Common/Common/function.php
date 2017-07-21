<?php
/**
 * 邮件发送函数
 */
    function sendMail($to, $title, $content) {
     
        Vendor('PHPMailer.PHPMailerAutoload');     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
//        var_dump($mail);
        return($mail->Send());
    }
    /**
     * 取出数组相同的值
     * @param type $array
     * @return type
     */
    function FetchRepeatMemberInArray($array) { 
        $len = count ($array); 
        for($i = 0; $i < $len; $i ++) { 
            for($j = $i + 1; $j < $len; $j ++) { 
            if ($array [$i] == $array [$j]) { 
                $repeat = $array [$i]; 
                break; 
            } 
        } 
        } 
        return $repeat; 
    }


    /**
     * 下级分层团队
     */
    function return_next_userId($list = array(),$userId){
        $userInfo = M('user')->where('id ='.$userId)->find();        
        $where['distributor_id'] = $userInfo['id'];        
        $userId_array = M('user')->where($where)->field('id,type')->select();
//        print_r($userId_array);
        $next_agent_userId = array();
        foreach ($userId_array as $k => $v) {
            //普通会员
           if ($v['type'] == 0) {
               $list[] = $v['id'];
           }//代理会员
            if ($v['type'] == 1) {
                $list[] = $v['id'];
                $next_agent_userId[] = $v['id'];
           }
        }//代理会员下级
        if(!empty($next_agent_userId)){
            foreach ($next_agent_userId as $va) {
                $list = return_next_userId($list,$va);
            }
        }
//        print_r($list);exit;
        return  $list;
    }
    /**
     * 直属下级
     */
    function return_down_userId($list = array(),$userId){
        $userInfo = M('user')->where('id ='.$userId)->find();        
        $where['distributor_id'] = $userInfo['id'];        
        $userId_array = M('user')->where($where)->field('id')->select();    
        foreach ($userId_array as $k => $v) {
            $list[] = $v['id'];
            // print_r($v);exit;
        }
        //dump($userId_array);exit;
        return  $list;
        

    }

    /**
     * [return_userIds description]
     * @param  [type] $distributor_id [description]
     * @param  array  $list           [description]
     * @param  [type] $userId         [description]
     * @param  [type] $user_type      [description]
     * @return [type]                 [description]
     */
    function return_userIds($distributor_id,$list = array(),$userId,$user_type) {
        $where['distributor_id'] = $distributor_id;
        $where['type'] = 0;
        $userId_array = M('user')->where($where)->field('id')->select();
        foreach ($userId_array as $v) {
            $list[] = $v['id'];
        }
        $list[] = $distributor_id;
        if($user_type == 0){
            $userInfo = M('user')->where('id ='.$distributor_id)->find();
            if($userInfo['distributor_id'] != 0){
                $list = return_userIds($userInfo['distributor_id'],$list,$userInfo['id'],$userInfo['type']);
            }  else {
                $list = array_unique($list);
            }
        }  else {
            //下级
            $data['distributor_id'] = $userId;
            $userId_array = M('user')->where($data)->field('id,type')->select();
            $down_list = array();
            foreach ($userId_array as $v) {
                if($v['type'] == 0){
                    $list[] = $v['id'];
                }else{
                    $down_list[] = $v['id'];
                }
            }
            
            foreach ($down_list as $va) {
                $where['distributor_id'] = $v['id'];
                $where['type'] = 0;
                $userId_array = M('user')->where($where)->field('id')->select();
                foreach ($userId_array as $v) {
                    $list[] = $v['id'];
                }
            }
            $list = array_unique($list);
        }
        $list[] = $userId;
        return $list;
    }

////处理方法
//function rmdirr($dirname) {
//    if (!file_exists($dirname)) {
//        return false;
//    }
//    if (is_file($dirname) || is_link($dirname)) {
//        return unlink($dirname);
//    }
//    $dir = dir($dirname);
//    if ($dir) {
//        while (false !== $entry = $dir->read()) {
//            if ($entry == '.' || $entry == '..') {
//                continue;
//            }
//            //递归
//            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
//        }
//    }
//}
//
////公共函数
////获取文件修改时间
//function getfiletime($file, $DataDir) {
//    $a = filemtime($DataDir . $file);
//    $time = date("Y-m-d H:i:s", $a);
//    return $time;
//}
//
////获取文件的大小
//function getfilesize($file, $DataDir) {
//    $perms = stat($DataDir . $file);
//    $size = $perms['size'];
//    // 单位自动转换函数
//    $kb = 1024;         // Kilobyte
//    $mb = 1024 * $kb;   // Megabyte
//    $gb = 1024 * $mb;   // Gigabyte
//    $tb = 1024 * $gb;   // Terabyte
//
//    if ($size < $kb) {
//        return $size . " B";
//    } else if ($size < $mb) {
//        return round($size / $kb, 2) . " KB";
//    } else if ($size < $gb) {
//        return round($size / $mb, 2) . " MB";
//    } else if ($size < $tb) {
//        return round($size / $gb, 2) . " GB";
//    } else {
//        return round($size / $tb, 2) . " TB";
//    }
//}
/**
 * 使用pdo连接数据库
 * @return PDO

function pdoMysql(){
    $dsn = 'mysql:host=118.89.29.73;dbname=gambling';
    try {
        $pdo = new PDO(
            $dsn,
            'root',
            'root123'
        );
        $pdo->exec("SET SQL_MODE=ANSI_QUOTES"); //设置数据类型
        $pdo->exec("SET NAMES 'utf8'");//设置字符集
        return $pdo;
    }
    catch (PDOException $e) {
        exit($e->getMessage());
    }
}


/**
 *
 * @param $bet_record_list //中奖列表
 * @param $type //返点类型 1高频 2 低频 3 民间
 * @return bool
 */
function BonusSend($bet_record_list,$type){
    if (empty($bet_record_list) || !is_array($bet_record_list)){
        return false;
    }
    foreach ($bet_record_list as $k=>$v){
        $bet_record_id =  $v['id'];
        $play_way_id =  $v['play_way_id'];
        $times =  $v['nums'];
        if ($v['mode'] == 1){//1、元2、角3、分4、厘
            $mode =  1;
        }else if ($v['mode'] == 2){
            $mode =  0.1;
        } else if ($v['mode'] == 3){
            $mode =  0.01;
        } else if ($v['mode'] == 4){
            $mode =  0.001;
        }
        $play_way_find  =   M('play_way')->where(['id'=>$play_way_id])->find();
        if ($v['type'] == 1){//民间
            $money = $v['money']*$play_way_find['max_bonus'];
        }else{//官方
            if (in_array($type,[1,2])){
                // $g_play_way_sql = "select max_bonus from g_play_way WHERE  id = $play_way_id AND status=1";
                //   $play_way_find =   pdoMysql()->query($g_play_way_sql)->fetch(PDO::FETCH_ASSOC);
                $money  =  $times*$mode*$play_way_find['max_bonus']; //倍数×对应玩法返点×圆角模式
            }else{
                $money  =  $times*$mode;
            }
        }
        $uid  =    $v['userId'];

       // $bet_record_info_sql = "select status from g_bet_record WHERE  id = $bet_record_id";
       // $bet_record_info_find =   pdoMysql()->query($bet_record_info_sql)->fetch(PDO::FETCH_ASSOC);
        $bet_record_info_find   =   M('bet_record')->where(['id'=>$bet_record_id])->find();
        if ($bet_record_info_find['status'] == 1){
            userMoney($uid,$money,$bet_record_id,$type,$v['money'],$v['issue'],$v['category_id']);
        }
    }
}


/**
 * 用户或用户上级代理 金额处理
 * @param $uid //用户id
 * @param $money //奖金
 * @param $bet_record_id //投注id
 * @param $type //返点类型 1高频 2 低频 3 民间
 * @return bool
 */
function userMoney($uid, $money,$bet_record_id,$type,$bet_money,$expect,$cate_id){
//    $user_info_sql = "select top_rebate,top_rebate,low_rebate,plain_rebate from g_user WHERE  id = $uid limit 1 ";
//    $user_info_list_sql = "select distributor_id as pid,id,username,top_rebate,low_rebate,plain_rebate from g_user";
    $user_info_find =   M('user')->field("distributor_id as pid,money,id,username,top_rebate,low_rebate,plain_rebate")->where(['id'=>$uid])->find();//pdoMysql()->query($user_info_sql)->fetch(PDO::FETCH_ASSOC);
    if ($user_info_find['type'] == 1){ //处理代理
        $user_list =   M('user')->select();//pdoMysql()->query($user_info_list_sql)->fetchAll(PDO::FETCH_ASSOC);
        $userParentList = familyTree($user_list,$uid); //用户所有的上级
        $userParentCount =    count($userParentList);
        for ($i=1;$i<=$userParentCount;$i++){
            if ($userParentList[$i]['parnet'] == $i){
                $upUid = $userParentList[$i]['id'];
                if ($userParentList[$i]['id'] !=$uid){
                    if ($type == 1){
                        $rebate =  $userParentList[$i]['top_rebate'] - $user_info_find['top_rebate']; // 代理商高频 - 用户高频
                    }
                    if ($type == 2){
                        $rebate =   $userParentList[$i]['low_rebate'] - $user_info_find['low_rebate'];// 代理商低频 - 用户低频
                    }
                    if ($type == 3){
                        $rebate =  $userParentList[$i]['plain_rebate'] - $user_info_find['plain_rebate'];// 代理商民间 - 用户民间
                    }
                    //$user_update_money_sql = "update g_user set money=money+$rebate WHERE id=$upUid";
                    M('user')->where(['id'=>$upUid])->setInc('money',$userParentList[$i]['money']+$rebate);
                   // $user_update_money = pdoMysql()->query($user_update_money_sql)->execute();
                }else{
                    M('user')->where(['id'=>$upUid])->setInc('money',$userParentList[$i]['money']+$money);
                   // $user_update_money_sql = "update g_user set money=money+$money WHERE id=$uid";
                   // $user_update_money =   pdoMysql()->query($user_update_money_sql)->execute();
                }
            }
        }
        return true;
    }else{//处理普通用户
        $profitLoss =   $money - $bet_money;
        //$bet_record_sql = "update g_bet_record set winning_money=$money,status=2,profitLoss=$profitLoss WHERE id=$bet_record_id";
       M('bet_record')->where(['id'=>$bet_record_id])->save([
           'winning_money'=>$money,
           'status'=>2,
           'profitLoss'=>$profitLoss,
       ]);
        M('user')->where(['id'=>$uid])->setInc('money',$money);
        //pdoMysql()->prepare($bet_record_sql)->execute();
        //$user_update_money_sql = "update g_user set money=money+$money WHERE id=$uid";
       // pdoMysql()->prepare($user_update_money_sql)->execute();
        M('winning_money_log')->add([
            'bet_record_id'=>$bet_record_id,
            'uid'=>$uid,
            'expect'=>$expect,
            'cate_id'=>$cate_id,
            'money'=>$money,
            'add_time'=>time()
        ]);
        //$add_sql    =   "insert into g_winning_money_log (bet_record_id,uid,expect,cate_id,money,add_time) values ($bet_record_id,$uid,$expect,$cate_id,$money,".time().")";
       //$query_add  =   pdoMysql()->prepare($add_sql);
       // $query_add->execute();
        return true;
    }
}

/**
 * 代理上级
 * @param $arr
 * @param $id
 * @param int $level
 * @return array
 */
function familyTree($arr,$id,$level=1) {
    $tree = array();
    foreach($arr as $v) {
        if($v['id'] == $id) {// 判断要不要找父栏目
            $v['parnet'] = $level;
            if($v['pid'] > 0) { // parnet>0,说明有父栏目
                $level++;
                $tree = array_merge($tree,familytree($arr,$v['pid'],$level));
            }
            $tree[] = $v; // 以找到上地为例
        }
    }
    return $tree;
}



/**
 * 撤单
 * @param $expect //期号
 * @param $cate_id //彩种id
 * @param $user_id //用户名称
 */
function withdrawSingle($expect , $cate_id , $user_id = ''){
    //g_bet_record
    if (!empty($user_id) || is_numeric($user_id)){
        $where['expect']    =   $expect;
        $where['code']    =   $cate_id;
        $where['uid']    =   $user_id;
      //  $sql_bet_record =  "SElECT * FROM g_bet_record WHERE expect=$expect AND  code=$cate_id AND uid=$user_id";
    }else{
        $where['expect']    =   $expect;
        $where['code']    =   $cate_id;
      //  $sql_bet_record =  "SElECT * FROM g_bet_record WHERE expect=$expect AND  code=$cate_id ";
    }
    $pdoBetRecord   =   M('bet_record')->where($where)->select();
    //$pdoBetRecord = pdoMysql()->query($sql_bet_record)->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($pdoBetRecord)){
        foreach ($pdoBetRecord as $v){
            $uid    =   $v['userId'];
            $money  =   $v['money'];
          //  M('bet_record')->where()
            $bet_record_status_sql = "update g_bet_record set status=4 WHERE id=$uid";
            $bet_record_status =   M('bet_record')->where(['id'=>$uid])->save(['status'=>4]);
			//pdoMysql()->query($bet_record_status_sql)->execute();
            $user_update_money_sql = "update g_user set money=money+$money WHERE id=$uid";
            $user_update_money =  M('user')->where(['id'=>$uid])->setinc('money',$money);
//			pdoMysql()->query($user_update_money_sql)->execute();
        }
    }
}
/**
 * 多级团队递归
 * @param  [type]  $data    [description]
 * @param  integer $pid     [description]
 * @param  array   &$result [description]
 * @return [type]           [description]
 */
function getList( $data, $distributor_id=0,$result=array() ) {
    foreach ( $data as $key => $val ) {
        if ($distributor_id == $val['distributor_id'] ) {
            $result[] = $val['id'];
            getList( $data, $val['id'],  $result, $deep );
        }
    }
    // print_r($list);exit;
    return $result;
}

?>