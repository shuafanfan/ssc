<?php 
namespace Html\Controller;
use Think\Controller;
class CategoryController  extends CommonController {
    /**
     * 重庆时时彩
     */
    public function ssccq() {
        $this->display();
    }
    
    /**
     * 云南时时彩
     */
    public function sscyn() {
        $this->display();
    }
    
    /**
     * 重庆时时彩 民间
     */
    public function ssccqmj() {
        $this->display();
    }
    
    /**
     * QQ分分彩
     */
    public function txffc() {
        $this->display();
    }
    
    /**
     * 新疆时时彩
     */
    public function sscxj() {
        $this->display();
    }
    /**
     * 天津时时彩
     */
    public function ssctj() {
        $this->display();
    }
    
    /**
     * 江苏快三
     */
    public function k3js() {
        $this->display();
    }
    /**
     * 广东11选5
     */
    public function gd11x5() {
        $this->display();
    }
    /**
     * 北京PK10
     */
    public function bjpk10() {
        $this->display();
    }
    /**
     * 重庆快乐十分
     */
    public function kl10fcq() {
        $this->display();
    }
    /**
     * 福彩3D
     */
    public function fc3d() {
        $this->display();
    }
    /**
     * 香港6合彩
     */
    public function xg6hc() {
        $this->display();
    }
    /**
     * 福彩3D  返回值给前端
     */
    public function fc3d_openData() {
        $data['cate_id'] = 28; 
        $_date = date("Y-m-d");
        $data['timeStamp'] = array('EGT',strtotime("$_date 21:15:00")); 
//        print_r($data);
        $list = M('cate_date_time')->where($data)->field('date,period,open_time')->order('timeStamp ASC ')->select();
//        print_r(M('cate_date_time')->getLastSql());exit
        $pri_issues = ''; 
        $pri_cur_issue = '';
        $pri_lastopen = '';
        $_pri_lastopen = '';
        $a = 'issue';
        $b = 'endtime';
        foreach ($list as $k => $v) {
            if($k == 0){
                $_issue = $v['period'];
                $_endtime =  $v['date'].' '.$v['open_time'];
                $_opentime = date("Y-m-d H:i:s",  strtotime($_endtime) + 60);
                $pri_cur_issue = '{'.'issue'.':'."'$_issue'".','.'endtime'.':'."'$_endtime'".','.'opentime'.':'."'$_opentime'".'}';
                $_pri_cur_issue = '{'.'issue'.':'."'$_issue'".','.'endtime'.':'."'$_endtime'".'}'.',';
                $condition['period'] = $v['period'] - 1;
                $condition['cate_id'] = 28; 
                $lastIssue = M('cate_date_time')->where($condition)->find();
//                print_r(M('cate_date_time')->getLastSql());exit;
                $issue = $lastIssue['period'];
                $endtime =  $lastIssue['date'].$lastIssue['open_time'];
                $opentime = date("Y-m-d H:i:s",  strtotime($endtime) + 60);
                $pri_lastopen = '{'.'issue'.':'."'$issue'".','.'endtime'.':'."'$endtime'".','.'opentime'.':'."'$opentime'".','.'statuscode'.':'."'0'".'}';
//                print_r($pri_lastopen);exit;
//                $_pri_lastopen = '{'.'issue'.':'."'$issue'".','.'endtime'.':'."'$endtime'".'}'.',';
                $_pri_lastopen  = '{'.$a.':'."'$issue'".','.$b.':'."'$endtime'".'}'.',';
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>28,'expect'=>$lastIssue['period']))->find();
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
    //                print_r($str);exit;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
            }  else {
                $pri_issues_issue[$k]=  $v['period'];
                $pri_issues_endtime[$k] =  $v['date'].' '.$v['open_time'];
                if($k == count($list) - 1){
                    $c = '{'.$a.':'."'$pri_issues_issue[$k]'".','.$b.':'."'$pri_issues_endtime[$k]'".'}';
                }else{
                    $pri_issues .= '{'.$a.':'."'$pri_issues_issue[$k]'".','.$b.':'."'$pri_issues_endtime[$k]'".'}'.',';
                }
                
            }
           
        }
        $pri_issues = $pri_issues.$c;
        $pri_issues = $_pri_lastopen.$_pri_cur_issue.$pri_issues.','.$c;
        $pri_issues = '['.$pri_issues.']';
        $pri_servertime = date("Y-m-d H:i:s", time());
//        print_r($_pri_lastopen);exit;
//        print_r($pri_issues);exit;
        $return = array('pri_lastopeninfo' =>$_lastOpenInfo,'pri_issues' =>$pri_issues,'pri_cur_issue'=>$pri_cur_issue,'pri_lastopen'=>$pri_lastopen,'pri_servertime'=>"'$pri_servertime'");
//        print_r($return);exit;  
         exit(json_encode($return));
    }
    
    
    
    /**
     * 重庆快乐十分  返回值给前端
     */
    public function cqkl10f_openData() {
        $data['cate_id'] = 17; 
        $data['timeStamp'] = array('EGT',  time()); 
        $list = M('cate_date_time')->where($data)->field('date,period,open_time,issue')->limit(120)->order('timeStamp ASC')->select();
        $a = 'issue';
        $b = 'endtime';
        $str = '';
        $_a = '';
        $_b = '';
        $pri_lastopen = '';
        $pri_cur_issue = '';
        foreach ($list as $k => $v) {
            $c = $v['period'];
            $d = $v['date'].' '.$v['open_time'];
            if($k == 0){
                $_a = '['.'{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.',';
                $opentime = date("Y-m-d H:i:s",  strtotime($d) + 60);
                $pri_cur_issue = '{'.$a.':'."'$c'".','.$b.':'."'$d'".','.'opentime'.':'."'$opentime'".'}';
                $last['period'] = $v['period'] - 1;
                $last['date'] = $v['date'];
                $last['cate_id'] = 17; 
                $lastInfo = M('cate_date_time')->where($last)->find();
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>17,'expect'=>$lastInfo['issue']))->find();
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $issue = $lastOpenInfo['expect'];
                    $str1 = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 7){
                            $_str1 = "'$va'";
                        }else{
                            $str1 .= "'$va'".',';
                        } 
                    }
                    $str1 = $str1.$_str1;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str1.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                $_c = $lastInfo['period'];
                $_d = $lastInfo['date'].' '.$lastInfo['open_time'];
                $pri_lastopen = '{'.$a.':'."'$_c'".','.$b.':'."'$_d'".','.'opentime'.':'."'$_d'".','.'statuscode'.':'."'2'".'}';
            }
            if($k >0 && $k < 119){
                $str .= '{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.',';
            }
            if($k == 119){
                $_b= '{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.']';
            }
        }
        $pri_issues = $_a.$str.$_b;
        $pri_servertime = date("Y-m-d H:i:s", time());
        $return = array('pri_lastopeninfo' =>$_lastOpenInfo,'pri_issues' =>$pri_issues,'pri_cur_issue'=>$pri_cur_issue,'pri_lastopen'=>$pri_lastopen,'pri_servertime'=>"'$pri_servertime'");
//        print_r($return);exit;
        exit(json_encode($return));
    }
    /**
     * QQ分分彩  返回值给前端
     */
    public function qqffc_openData() {
        $data['cate_id'] = 40; 
        $data['timeStamp'] = array('EGT',  time()); 
        $list = M('cate_date_time')->where($data)->field('date,period,open_time')->limit(119)->order('timeStamp ASC')->select();
        $pri_issues = ''; 
        $pri_cur_issue = '';
        $pri_lastopen = '';
        $_pri_lastopen = '';
        // print_r($_list);
        foreach ($list as $k => $v) {
            if($k == 0){
                $_issue = $v['period'];
                $_endtime =  $v['date'].' '.$v['open_time'];
                $_opentime = date("Y-m-d H:i:s",  strtotime($_endtime) + 60);
                $pri_cur_issue = '{'.'issue'.':'."'$_issue'".','.'endtime'.':'."'$_endtime'".','.'opentime'.':'."'$_opentime'".'}';
                $condition['date'] = date('Y-m-d');
                $condition['period'] = $v['period'] - 1;
                $lastIssue = M('cate_date_time')->where($condition)->find();
                $issue = $lastIssue['period'];
                $endtime =  $lastIssue['date'].' '.date("H:i:s",(strtotime($lastIssue['open_time']) - 60));
                $opentime = date("Y-m-d H:i:s",  strtotime($endtime) + 60);
                $pri_lastopen = '{'.'issue'.':'."'$issue'".','.'endtime'.':'."'$endtime'".','.'opentime'.':'."'$opentime'".','.'statuscode'.':'."'0'".'}';
                $_pri_lastopen = '{'.'issue'.':'."'$issue'".','.'endtime'.':'."'$endtime'".'}'.',';
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>40,'expect'=>$lastIssue['period']))->find();
                if(!empty($lastOpenInfo)){
//                    exit('sss');
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
//                    print_r($_lastOpenInfo);exit;
                }
//                else{
//                    $_lastOpenInfo = '';
//                }
            }

        }
        $pri_issues = $_pri_lastopen.($this->issue_cqssc(40));
        $pri_issues = '['.$pri_issues.']';
        // print_r($pri_issues);exit;
        $pri_servertime = date("Y-m-d H:i:s", time());
        // print_r($pri_issues);exit;
        $return = array('pri_lastopeninfo' =>$_lastOpenInfo,'pri_issues' =>$pri_issues,'pri_cur_issue'=>$pri_cur_issue,'pri_lastopen'=>$pri_lastopen,'pri_servertime'=>"'$pri_servertime'");

         exit(json_encode($return));
    }

    



     /**
     * 广东11选5  返回值给前端
     */
    public function gd11x5_openData() {
        $data['cate_id'] = 6; 
        $data['timeStamp'] = array('EGT',  time()); 
        $list = M('cate_date_time')->where($data)->field('date,period,open_time')->limit(120)->order('timeStamp ASC')->select();
        $a = 'issue';
        $b = 'endtime';
        $str = '';
        $_a = '';
        $_b = '';
        $pri_lastopen = '';
        $pri_cur_issue = '';
        foreach ($list as $k => $v) {
            $c = $v['period'];
            $d = $v['date'].' '.$v['open_time'];
            if($k == 0){
                $_a = '['.'{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.',';
                $opentime = date("Y-m-d H:i:s",  strtotime($d) + 60);
                $pri_cur_issue = '{'.$a.':'."'$c'".','.$b.':'."'$d'".','.'opentime'.':'."'$opentime'".'}';
                $last['period'] = $v['period'] - 1;
                $last['date'] = $v['date'];
                $lastInfo = M('cate_date_time')->where($last)->find();
                if(empty($lastInfo)){
                    $_last['date'] = date("Y-m-d",strtotime("-1 day"));
                    $_last['cate_id'] = 6; 
                    $lastInfo = M('cate_date_time')->where($_last)->order('period DESC')->find();
                }
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>6,'expect'=>'20'.$last['period']))->find();
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $issue = $lastOpenInfo['expect'];
                    $str1 = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str1 = "'$va'";
                        }else{
                            $str1 .= "'$va'".',';
                        } 
                    }
                    $str1 = $str1.$_str1;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str1.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                $_c = $lastInfo['period'];
                $_d = $lastInfo['date'].' '.$lastInfo['open_time'];
                $pri_lastopen = '{'.$a.':'."'$_c'".','.$b.':'."'$_d'".','.'opentime'.':'."'$_d'".','.'statuscode'.':'."'2'".'}';
            }
            if($k >0 && $k < 119){
                $str .= '{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.',';
            }
            if($k == 119){
                $_b= '{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.']';
            }
        }
        $pri_issues = $_a.$str.$_b;
        $pri_servertime = date("Y-m-d H:i:s", time());
        // print_r($pri_issues);exit;
        $return = array('pri_lastopeninfo' =>$_lastOpenInfo,'pri_issues' =>$pri_issues,'pri_cur_issue'=>$pri_cur_issue,'pri_lastopen'=>$pri_lastopen,'pri_servertime'=>"'$pri_servertime'");
//        print_r($return);exit;
        exit(json_encode($return));
    }
    
    
    
    /**
     * 江苏快3  返回值给前端
     */
    public function jsk3_openData() {
        $data['cate_id'] = 11; 
        $data['timeStamp'] = array('EGT',  time()); 
        $list = M('cate_date_time')->where($data)->field('date,period,open_time')->order('timeStamp ASC')->select();
        $a = 'issue';
        $b = 'endtime';
        $str = '';
        $_a = '';
        $_b = '';
        $pri_lastopen = '';
        $pri_cur_issue = '';
        foreach ($list as $k => $v) {
            $c = $v['period'];
            $d = $v['date'].' '.$v['open_time'];
            if($k == 0){
                $_a = '['.'{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.',';
                $opentime = date("Y-m-d H:i:s",  strtotime($d) + 60);
                $pri_cur_issue = '{'.$a.':'."'$c'".','.$b.':'."'$d'".','.'opentime'.':'."'$opentime'".'}';
                $last['period'] = $v['period'] - 1;
                $last['date'] = $v['date'];
                $lastInfo = M('cate_date_time')->where($last)->find();
                $expect = date("Ymd").'0'.substr($last['period'],6,2);  
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>11,'expect'=>$expect))->find();
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                $_c = $lastInfo['period'];
                $_d = $lastInfo['date'].' '.$lastInfo['open_time'];
                $pri_lastopen = '{'.$a.':'."'$_c'".','.$b.':'."'$_d'".','.'opentime'.':'."'$_d'".','.'statuscode'.':'."'2'".'}';
            }
            if($k >0 && $k < (count($list) - 1)){
                $str .= '{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.',';
            }
            if($k == (count($list) - 1)){
                $_b= '{'.$a.':'."'$c'".','.$b.':'."'$d'".'}'.']';
            }
        }
        $pri_issues = $_a.$str.$_b;
        $pri_servertime = date("Y-m-d H:i:s", time());
        $return = array('pri_lastopeninfo' =>$_lastOpenInfo,'pri_issues' =>$pri_issues,'pri_cur_issue'=>$pri_cur_issue,'pri_lastopen'=>$pri_lastopen,'pri_servertime'=>"'$pri_servertime'");
//        print_r($return);exit;
        exit(json_encode($return));
    }
        /**
     * 广东11选5  接收值、处理
     */
    public function gd11x5_return() {
        $chase = array();//追号数据
        if($_POST['lt_project']){
            //判断投注期数是否截至
            $cateInfo['cate_id'] = $_POST['lotteryid'];
            $cateInfo['period'] = $_POST['lt_issue_start'];
            $cate_date_time = M('cate_date_time')->where($cateInfo)->find();
            // print_r($cate_date_time);
            if ($cate_date_time['timeStamp'] <= time()) {
                echo '投注时间已截止';exit;
            }
            if($_POST['lt_issue_start'] && $_POST['lt_trace_if'] != 'yes'){
//                exit('sss');
                $issue['cate_id'] = $_POST['lotteryid'];
                $issue['timeStamp'] = array('EGT',time());
                $currentIssue = M('cate_date_time')->where($issue)->order('period ASC')->getField('period');
                if($_POST['lt_issue_start'] != $currentIssue){
                    echo '投注失败';exit;
                }
            }
            
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
//                print_r($v);exit;
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
                //扣钱
                $userInfo['id'] = $_COOKIE['userId'];
                $_userInfo = M('user')->where($userInfo)->find();
                $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
                if ($userInfo['money'] < 0) {
                    echo '账户资金不足';exit;
                }else{
                    M('user')->save($userInfo);
                }
                if($_POST['lt_trace_if'] == 'yes'){
                    if($_POST['lt_trace_stop'] == 'yes'){
                         $if_stop_chase = 1;
                    }
                    $if_chase = 1;
                    $userId = $_COOKIE['userId'];
                    $category_id = $_POST['lotteryid'];
                    $content = $newStr['codes'];
                    $times = $newStr['times'];
                    $time = time();
                    $nums = $newStr['nums'];
                    $mode = $newStr['mode'];
                    if($newStr['position']){
                            $position = $newStr['position'];
                    }
                    if($newStr['desc']){
                        $remark = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                    }
                    $orderNum = md5(time().$_COOKIE['userId']);
                    $play_way_id = $newStr['methodid'];
                    foreach ($_POST['lt_trace_issues'] as $value) {
                        $issue = $value;
                        $trace_times = 'lt_trace_times_'.$value;
                        $money = $newStr['money'] * $_POST[$trace_times];

                        $conn=mysql_connect("43.249.205.109","root","Appapi123!") or die('连接错误：'.mysql_error());
                        if($conn)
                        {  
                            mysql_query("set names 'utf8'");
                            mysql_select_db('ssc');
                            $sql="INSERT INTO g_bet_record (remark,position,if_stop_chase,if_chase,userId,category_id,content,times,time,nums,mode,orderNum,play_way_id,issue,money) "
                                    . "VALUES ('$remark','$position','$if_stop_chase','$if_chase','$userId','$category_id','$content','$times','$time','$nums','$mode','$orderNum','$play_way_id','$issue','$money')";
//                            print_r($sql);exit;
                            mysql_query($sql);
                            mysql_close(); 
                        }
                        //扣钱
                        $userInfo['id'] = $_COOKIE['userId'];
                        $_userInfo = M('user')->where($userInfo)->find();
                        $userInfo['money'] = $_userInfo['money'] - $money;
                        if ($userInfo['money'] < 0) {
                            echo '账户资金不足';exit;
                        }else{
                            M('user')->save($userInfo);
                        }
                        //用户花钱记录
                        $user['userId'] = $_COOKIE['userId'];
                        $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
                        $user['money'] = $userInfo['money'];
                        $user['category_id'] = $_POST['lotteryid'];
                        $user['time'] = time();
                        M('user_money_log')->add($user);
                    }
                }
                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['codes'];
                $data['issue'] = $_POST['lt_issue_start'];
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['times'] = $newStr['times'];
                $data['nums'] = $newStr['nums'];
                $data['mode'] = $newStr['mode'];
                if($newStr['position']){
                    $data['position'] = $newStr['position'];
                }
                if($newStr['desc']){
                    $data['remark'] = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                }
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
//                print_r(M('bet_record')->getLastSql());exit;
                
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);


        }
         if($_POST['lotteryid'] && $_POST['flag'] == 'read'){
            $cqssc_status = $this->k3js_status();
            $this->response($cqssc_status,'rss'); 
         }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gettime' && $_POST['issue']){
            $end_open_prize_time = $this->end_open_prize_time();
            echo $end_open_prize_time;
        }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gethistory' && $_POST['issue']){
                $expect = '20'.$_POST['issue'];
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$_POST['lotteryid'],'expect'=>$expect))->find();
                $issue = $lastOpenInfo['expect'];
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
            $this->response($_lastOpenInfo,'rss'); 
        }
            $condition['userId'] = $_COOKIE['userId']; 
            $condition['category_id'] = 6; 
            $betRecord = M('bet_record')->where($condition)->order('id DESC')->limit(10)->select();
            foreach ($betRecord as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $betRecord[$k] = $v;
                $betRecord[$k]['catename'] = $cateName['catename'];
                $betRecord[$k]['issue'] = $v['issue'];
            }
            
            $_chaseRecord['userId'] = $_COOKIE['userId']; 
            $_chaseRecord['category_id'] = 6; 
            $_chaseRecord['if_chase'] = 1; 
            $betRecord_chase = M('bet_record')->where($_chaseRecord)->order('id DESC')->limit(10)->select();
            $chaseRecord = array();
            foreach ($betRecord_chase as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $chaseRecord[$k] = $v;
                $chaseRecord[$k]['catename'] = $cateName['catename'];
                $chaseRecord[$k]['issue'] = $v['issue'];
            }
            $return = array('stats'=>'success','betRecord'=>$betRecord,'chaseRecord'=>$chaseRecord);
            $this->ajaxReturn($return); 
    }

    
    
    

    /**
     * 江苏快三  接收值、处理
     */
    public function jsk3_return() {

        if($_POST['lt_project']){
            //判断投注期数是否截至
            $cateInfo['cate_id'] = $_POST['lotteryid'];
            $cateInfo['period'] = $_POST['lt_issue_start'];
            $cate_date_time = M('cate_date_time')->where($cateInfo)->find();
            // print_r($cate_date_time);
            if ($cate_date_time['timeStamp'] <= time()) {
                echo '投注时间已截止';exit;
            }
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
                //扣钱
                $userInfo['id'] = $_COOKIE['userId'];
                $_userInfo = M('user')->where($userInfo)->find();
                $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
                if ($userInfo['money'] < 0) {
                    echo '账户资金不足';exit;
                }else{
                    M('user')->save($userInfo);
                }

                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['codes'];
                $data['issue'] = date("Ymd").substr($_POST['lt_issue_start'], -3, 3);
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['times'] = $newStr['times'];
                $data['nums'] = $newStr['nums'];
                $data['mode'] = $newStr['mode'];
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
                
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);

            
        }
         if($_POST['lotteryid'] && $_POST['flag'] == 'read'){
            $cqssc_status = $this->k3js_status();
            $this->response($cqssc_status,'rss'); 
         }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gettime' && $_POST['issue']){
            $end_open_prize_time = $this->end_open_prize_time();
            echo $end_open_prize_time;
        }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gethistory' && $_POST['issue']){
                $expect = date('Ymd').'0'.substr($_POST['issue'],6,2);
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$_POST['lotteryid'],'expect'=>$expect))->find();
                $issue = substr($lastOpenInfo['expect'],2,9);  
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
            $this->response($_lastOpenInfo,'rss'); 
        }
    }


    
    
    /**
     * 重庆时时彩  接收值、处理
     */
    public function receive_and_return() {
        $chase = array();//追号数据
        if($_POST['lt_project']){
            //判断投注期数是否截至
            $cateInfo['cate_id'] = $_POST['lotteryid'];
            $cateInfo['issue'] = $_POST['lt_issue_start'];
            $cate_date_time = M('cate_date_time')->where($cateInfo)->find();
            if ($cate_date_time['timeStamp'] <= time()) {
                echo '投注时间已截止';exit;
            }
            if($_POST['lt_issue_start'] && $_POST['lt_trace_if'] != 'yes'){
                $issue['cate_id'] = $_POST['lotteryid'];
                $issue['timeStamp'] = array('EGT',time());
                $issue['date'] = date("Y-m-d");
                $currentIssue = M('cate_date_time')->where($issue)->order('issue ASC')->getField('issue');
//                print_r(M('cate_date_time')->getLastSql());exit;
                if($_POST['lt_issue_start'] != $currentIssue ){
                    echo '投注失败';exit;
                }
            }
            
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
//                print_r($v);exit;
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
                //扣钱
                $userInfo['id'] = $_COOKIE['userId'];
                $_userInfo = M('user')->where($userInfo)->find();
                $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
                if ($userInfo['money'] < 0) {
                    echo '账户资金不足';exit;
                }else{
                    M('user')->save($userInfo);
                }
                if($_POST['lt_trace_if'] == 'yes'){
                    if($_POST['lt_trace_stop'] == 'yes'){
                         $if_stop_chase = 1;
                    }
                    $if_chase = 1;
                    $userId = $_COOKIE['userId'];
                    $category_id = $_POST['lotteryid'];
                    $content = $newStr['codes'];
                    $times = $newStr['times'];
                    $time = time();
                    $nums = $newStr['nums'];
                    $mode = $newStr['mode'];
                    if($newStr['position']){
                            $position = $newStr['position'];
                    }
                    if($newStr['desc']){
                        $remark = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                    }
                    $orderNum = md5(time().$_COOKIE['userId']);
                    $play_way_id = $newStr['methodid'];
                    foreach ($_POST['lt_trace_issues'] as $value) {
                        $issue = $value;
                        $trace_times = 'lt_trace_times_'.$value;
                        $money = $newStr['money'] * $_POST[$trace_times];

                        $conn=mysql_connect("43.249.205.109","root","Appapi123!") or die('连接错误：'.mysql_error());
                        if($conn)
                        {  
                            mysql_query("set names 'utf8'");
                            mysql_select_db('ssc');
                            $sql="INSERT INTO g_bet_record (remark,position,if_stop_chase,if_chase,userId,category_id,content,times,time,nums,mode,orderNum,play_way_id,issue,money) "
                                    . "VALUES ('$remark','$position','$if_stop_chase','$if_chase','$userId','$category_id','$content','$times','$time','$nums','$mode','$orderNum','$play_way_id','$issue','$money')";
//                            print_r($sql);exit;
                            mysql_query($sql);
                            mysql_close(); 
                        }
                        //扣钱
                        $userInfo['id'] = $_COOKIE['userId'];
                        $_userInfo = M('user')->where($userInfo)->find();
                        $userInfo['money'] = $_userInfo['money'] - $money;
                        if ($userInfo['money'] < 0) {
                            echo '账户资金不足';exit;
                        }else{
                            M('user')->save($userInfo);
                        }
                        //用户花钱记录
                        $user['userId'] = $_COOKIE['userId'];
                        $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
                        $user['money'] = $userInfo['money'];
                        $user['category_id'] = $_POST['lotteryid'];
                        $user['time'] = time();
                        M('user_money_log')->add($user);
                    }
                }
                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['codes'];
                $data['issue'] = $_POST['lt_issue_start'];
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['times'] = $newStr['times'];
                $data['nums'] = $newStr['nums'];
                $data['mode'] = $newStr['mode'];
                if($newStr['position']){
                    $data['position'] = $newStr['position'];
                }
                if($newStr['desc']){
                    $data['remark'] = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                }
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
//                print_r(M('bet_record')->getLastSql());exit;
                
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);


        }
         if($_POST['lotteryid'] && $_POST['flag'] == 'read'){
            $cqssc_status = $this->cqssc_status();
            $this->response($cqssc_status,'rss'); 
         }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gettime' && $_POST['issue']){
            $end_open_prize_time = $this->end_open_prize_time();
            echo $end_open_prize_time;
        }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gethistory' && $_POST['issue']){
                $expect = str_replace('-','',$_POST['issue']);
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$_POST['lotteryid'],'expect'=>$expect))->find();
                $issue = $lastOpenInfo['expect'];
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
            $this->response($_lastOpenInfo,'rss'); 
        }
            $condition['userId'] = $_COOKIE['userId']; 
            $condition['category_id'] = 2; 
            $betRecord = M('bet_record')->where($condition)->order('id DESC')->limit(10)->select();
            foreach ($betRecord as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $betRecord[$k] = $v;
                $betRecord[$k]['catename'] = $cateName['catename'];
                $betRecord[$k]['issue'] = $v['issue'];
            }
            
            $_chaseRecord['userId'] = $_COOKIE['userId']; 
            $_chaseRecord['category_id'] = 2; 
            $_chaseRecord['if_chase'] = 1; 
            $betRecord_chase = M('bet_record')->where($_chaseRecord)->order('id DESC')->limit(10)->select();
            $chaseRecord = array();
            foreach ($betRecord_chase as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $chaseRecord[$k] = $v;
                $chaseRecord[$k]['catename'] = $cateName['catename'];
                $chaseRecord[$k]['issue'] = $v['issue'];
            }
            $return = array('stats'=>'success','betRecord'=>$betRecord,'chaseRecord'=>$chaseRecord);
            $this->ajaxReturn($return); 
    }  


    /**
     * QQ分分彩  接收值、处理
     */
    public function qqffc_return() {
        $chase = array();//追号数据
        if($_POST['lt_project']){
            //判断投注期数是否截至
            $cateInfo['cate_id'] = $_POST['lotteryid'];
            $cateInfo['period'] = $_POST['lt_issue_start'];
            $cate_date_time = M('cate_date_time')->where($cateInfo)->find();
            // print_r($cate_date_time);
            if ($cate_date_time['timeStamp'] <= time()) {
                echo '投注时间已截止';exit;
            }
            if($_POST['lt_issue_start'] && $_POST['lt_trace_if'] != 'yes'){
//                exit('sss');
                $issue['cate_id'] = $_POST['lotteryid'];
                $issue['timeStamp'] = array('EGT',time());
                $issue['date'] = date("Y-m-d");
                $currentIssue = M('cate_date_time')->where($issue)->order('issue ASC')->getField('issue');
                if($_POST['lt_issue_start'] != $currentIssue ){
                    echo '投注失败';exit;
                }
            }
            
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
//                print_r($v);exit;
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
                //扣钱
                $userInfo['id'] = $_COOKIE['userId'];
                $_userInfo = M('user')->where($userInfo)->find();
                $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
                if ($userInfo['money'] < 0) {
                    echo '账户资金不足';exit;
                }else{
                    M('user')->save($userInfo);
                }
                if($_POST['lt_trace_if'] == 'yes'){
                    if($_POST['lt_trace_stop'] == 'yes'){
                         $if_stop_chase = 1;
                    }
                    $if_chase = 1;
                    $userId = $_COOKIE['userId'];
                    $category_id = $_POST['lotteryid'];
                    $content = $newStr['codes'];
                    $times = $newStr['times'];
                    $time = time();
                    $nums = $newStr['nums'];
                    $mode = $newStr['mode'];
                    if($newStr['position']){
                            $position = $newStr['position'];
                    }
                    if($newStr['desc']){
                        $remark = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                    }
                    $orderNum = md5(time().$_COOKIE['userId']);
                    $play_way_id = $newStr['methodid'];
                    foreach ($_POST['lt_trace_issues'] as $value) {
                        $issue = $value;
                        $trace_times = 'lt_trace_times_'.$value;
                        $money = $newStr['money'] * $_POST[$trace_times];

                        $conn=mysql_connect("43.249.205.109","root","Appapi123!") or die('连接错误：'.mysql_error());
                        if($conn)
                        {  
                            mysql_query("set names 'utf8'");
                            mysql_select_db('ssc');
                            $sql="INSERT INTO g_bet_record (remark,position,if_stop_chase,if_chase,userId,category_id,content,times,time,nums,mode,orderNum,play_way_id,issue,money) "
                                    . "VALUES ('$remark','$position','$if_stop_chase','$if_chase','$userId','$category_id','$content','$times','$time','$nums','$mode','$orderNum','$play_way_id','$issue','$money')";
//                            print_r($sql);exit;
                            mysql_query($sql);
                            mysql_close(); 
                        }
                        //扣钱
                        $userInfo['id'] = $_COOKIE['userId'];
                        $_userInfo = M('user')->where($userInfo)->find();
                        $userInfo['money'] = $_userInfo['money'] - $money;
                        if ($userInfo['money'] < 0) {
                            echo '账户资金不足';exit;
                        }else{
                            M('user')->save($userInfo);
                        }
                        //用户花钱记录
                        $user['userId'] = $_COOKIE['userId'];
                        $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
                        $user['money'] = $userInfo['money'];
                        $user['category_id'] = $_POST['lotteryid'];
                        $user['time'] = time();
                        M('user_money_log')->add($user);
                    }
                }
                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['codes'];
                $data['issue'] = $_POST['lt_issue_start'];
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['times'] = $newStr['times'];
                $data['nums'] = $newStr['nums'];
                $data['mode'] = $newStr['mode'];
                if($newStr['position']){
                    $data['position'] = $newStr['position'];
                }
                if($newStr['desc']){
                    $data['remark'] = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                }
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
//                print_r(M('bet_record')->getLastSql());exit;
                
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);


        }
         if($_POST['lotteryid'] && $_POST['flag'] == 'read'){
            $cqssc_status = $this->cqssc_status();
            $this->response($cqssc_status,'rss'); 
         }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gettime' && $_POST['issue']){
            $end_open_prize_time = $this->end_open_prize_time();
            echo $end_open_prize_time;
        }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gethistory' && $_POST['issue']){
                $expect = str_replace('-','',$_POST['issue']);
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$_POST['lotteryid'],'expect'=>$expect))->find();
                $issue = $lastOpenInfo['expect'];
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
            $this->response($_lastOpenInfo,'rss'); 
        }
            $condition['userId'] = $_COOKIE['userId']; 
            $condition['category_id'] = 40; 
            $betRecord = M('bet_record')->where($condition)->order('id DESC')->limit(10)->select();
            foreach ($betRecord as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $betRecord[$k] = $v;
                $betRecord[$k]['catename'] = $cateName['catename'];
                $betRecord[$k]['issue'] = $v['issue'];
            }
            
            $_chaseRecord['userId'] = $_COOKIE['userId']; 
            $_chaseRecord['category_id'] = 40; 
            $_chaseRecord['if_chase'] = 1; 
            $betRecord_chase = M('bet_record')->where($_chaseRecord)->order('id DESC')->limit(10)->select();
            $chaseRecord = array();
            foreach ($betRecord_chase as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $chaseRecord[$k] = $v;
                $chaseRecord[$k]['catename'] = $cateName['catename'];
                $chaseRecord[$k]['issue'] = $v['issue'];
            }
            $return = array('stats'=>'success','betRecord'=>$betRecord,'chaseRecord'=>$chaseRecord);
            $this->ajaxReturn($return); 
    }




    /**
     * 福彩3D  接收值、处理
     */
    public function fc3d_return() {
//        print_r($_POST['lt_project'][0]);exit;
        if($_POST['lt_project']){
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
//                print_r($newStr);
                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['codes'];
                $data['issue'] = date("Ymd").substr($_POST['lt_issue_start'], -3, 3);
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['times'] = $newStr['times'];
                $data['nums'] = $newStr['nums'];
                $data['mode'] = $newStr['mode'];
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
                
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);
            //扣钱
            $userInfo['id'] = $_COOKIE['userId'];
            $_userInfo = M('user')->where($userInfo)->find();
            $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
            M('user')->save($userInfo);
        }
        if($_POST['lotteryid'] && $_POST['flag'] && $_POST['issue']){
                $expect = str_replace('-','',$_POST['issue']);
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$_POST['lotteryid'],'expect'=>$expect))->find();
                $issue = substr($lastOpenInfo['expect'],0,8).'-'.substr($lastOpenInfo['expect'],8,3);  
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
    //                print_r($str);exit;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
        }
        $condition['userId'] = $_COOKIE['userId']; 
        $condition['category_id'] = 28; 
        $betRecord = M('bet_record')->where($condition)->order('id DESC')->limit(10)->select();
        foreach ($betRecord as $k => $v) {
            $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
            $betRecord[$k]['catename'] = $cateName['catename'];
            $betRecord[$k]['issue'] = substr($v['issue'], -3,3);
        }
//        print_r($betRecord);exit;
        $return = array('stats'=>'success','betRecord'=>$betRecord,'code'=>$_lastOpenInfo);
        $this->ajaxReturn($return); 
    }
    /**
     * 重庆快乐十分  接收值、处理
     */
    public function cqkl10f_return() {
        $chase = array();//追号数据
        if($_POST['lt_project']){
            //判断投注期数是否截至
            $cateInfo['cate_id'] = $_POST['lotteryid'];
            $cateInfo['period'] = $_POST['lt_issue_start'];
            $cate_date_time = M('cate_date_time')->where($cateInfo)->find();
            // print_r($cate_date_time);
            if ($cate_date_time['timeStamp'] <= time()) {
                echo '投注时间已截止';exit;
            }
            if($_POST['lt_issue_start'] && $_POST['lt_trace_if'] != 'yes'){
//                exit('sss');
                $issue['cate_id'] = $_POST['lotteryid'];
                $issue['timeStamp'] = array('EGT',time());
                $currentIssue = M('cate_date_time')->where($issue)->order('period ASC ')->getField('period');
                if($_POST['lt_issue_start'] != $currentIssue){
                    echo '投注失败';exit;
                }
            }
            
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
//                print_r($v);exit;
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
                //扣钱
                $userInfo['id'] = $_COOKIE['userId'];
                $_userInfo = M('user')->where($userInfo)->find();
                $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
                if ($userInfo['money'] < 0) {
                    echo '账户资金不足';exit;
                }else{
                    M('user')->save($userInfo);
                }
                if($_POST['lt_trace_if'] == 'yes'){
                    if($_POST['lt_trace_stop'] == 'yes'){
                         $if_stop_chase = 1;
                    }
                    $if_chase = 1;
                    $userId = $_COOKIE['userId'];
                    $category_id = $_POST['lotteryid'];
                    $content = $newStr['codes'];
                    $times = $newStr['times'];
                    $time = time();
                    $nums = $newStr['nums'];
                    $mode = $newStr['mode'];
                    if($newStr['position']){
                            $position = $newStr['position'];
                    }
                    if($newStr['desc']){
                        $remark = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                    }
                    $orderNum = md5(time().$_COOKIE['userId']);
                    $play_way_id = $newStr['methodid'];
                    foreach ($_POST['lt_trace_issues'] as $value) {
                        $issue = $value;
                        $trace_times = 'lt_trace_times_'.$value;
                        $money = $newStr['money'] * $_POST[$trace_times];

                        $conn=mysql_connect("43.249.205.109","root","Appapi123!") or die('连接错误：'.mysql_error());
                        if($conn)
                        {  
                            mysql_query("set names 'utf8'");
                            mysql_select_db('ssc');
                            $sql="INSERT INTO g_bet_record (remark,position,if_stop_chase,if_chase,userId,category_id,content,times,time,nums,mode,orderNum,play_way_id,issue,money) "
                                    . "VALUES ('$remark','$position','$if_stop_chase','$if_chase','$userId','$category_id','$content','$times','$time','$nums','$mode','$orderNum','$play_way_id','$issue','$money')";
//                            print_r($sql);exit;
                            mysql_query($sql);
                            mysql_close(); 
                        }
                        //扣钱
                        $userInfo['id'] = $_COOKIE['userId'];
                        $_userInfo = M('user')->where($userInfo)->find();
                        $userInfo['money'] = $_userInfo['money'] - $money;
                        if ($userInfo['money'] < 0) {
                            echo '账户资金不足';exit;
                        }else{
                            M('user')->save($userInfo);
                        }
                        //用户花钱记录
                        $user['userId'] = $_COOKIE['userId'];
                        $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
                        $user['money'] = $userInfo['money'];
                        $user['category_id'] = $_POST['lotteryid'];
                        $user['time'] = time();
                        M('user_money_log')->add($user);
                    }
                }
                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['codes'];
                $data['issue'] = $_POST['lt_issue_start'];
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['times'] = $newStr['times'];
                $data['nums'] = $newStr['nums'];
                $data['mode'] = $newStr['mode'];
                if($newStr['position']){
                    $data['position'] = $newStr['position'];
                }
                if($newStr['desc']){
                    $data['remark'] = mb_substr($newStr['desc'], 1, 1, 'utf-8');
                }
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
//                print_r(M('bet_record')->getLastSql());exit;
                
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);


        }
         if($_POST['lotteryid'] && $_POST['flag'] == 'read'){
            $cqssc_status = $this->k3js_status();
            $this->response($cqssc_status,'rss'); 
         }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gettime' && $_POST['issue']){
            $end_open_prize_time = $this->end_open_prize_time();
            echo $end_open_prize_time;
        }
        if($_POST['lotteryid'] && $_POST['flag'] == 'gethistory' && $_POST['issue']){
                $expect = '20'.$_POST['issue'];
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$_POST['lotteryid'],'expect'=>$expect))->find();
                $issue = $lastOpenInfo['expect'];
                if(!empty($lastOpenInfo)){
                    $code = $lastOpenInfo['opencode'];
                    $str = '';
                    foreach (explode(',', $code) as $ke => $va) {
                        if($ke == 4){
                            $_str = "'$va'";
                        }else{
                            $str .= "'$va'".',';
                        } 
                    }
                    $str = $str.$_str;
                    $_lastOpenInfo = '{'."'code'".':'.'['.$str.']'.','."'issue'".':'."'$issue'".','."'statuscode'".':'."'2'".'}';
                }
                else{
                    $_lastOpenInfo = '';
                }
            $this->response($_lastOpenInfo,'rss'); 
        }
            $condition['userId'] = $_COOKIE['userId']; 
            $condition['category_id'] = 17; 
            $betRecord = M('bet_record')->where($condition)->order('id DESC')->limit(10)->select();
            foreach ($betRecord as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $betRecord[$k] = $v;
                $betRecord[$k]['catename'] = $cateName['catename'];
                $betRecord[$k]['issue'] = $v['issue'];
            }
            
            $_chaseRecord['userId'] = $_COOKIE['userId']; 
            $_chaseRecord['category_id'] = 17; 
            $_chaseRecord['if_chase'] = 1; 
            $betRecord_chase = M('bet_record')->where($_chaseRecord)->order('id DESC')->limit(10)->select();
            $chaseRecord = array();
            foreach ($betRecord_chase as $k => $v) {
                $cateName = M('category')->where('id ='.$v['category_id'])->field('catename')->find();
                $chaseRecord[$k] = $v;
                $chaseRecord[$k]['catename'] = $cateName['catename'];
                $chaseRecord[$k]['issue'] = $v['issue'];
            }
            $return = array('stats'=>'success','betRecord'=>$betRecord,'chaseRecord'=>$chaseRecord);
            $this->ajaxReturn($return); 
    }
    
    
    
    
    

    
    
    

    
 
    /**
     * 期数：lotteryid:'11' flag:'read'
     * @return string
     */
    public function k3js_status() {
        $data['cate_id'] = $_POST['lotteryid'];
        $data['date'] = date('Y-m-d');
        $data['timeStamp'] = array('LT',time());
        $count = M('cate_date_time')->where($data)->count();
        $noewCount = $count;
        $noewCount += 1;
        $num = strlen($noewCount); //长度
        if($num == 1){
            $_noewCount = '0'.$noewCount;
        }
        if($num == 2){
            $_noewCount = $noewCount;
        }
        $condition['cate_id'] = $_POST['lotteryid'];
        $condition['date'] = date('Y-m-d');
        if($_POST['lotteryid'] == 17){
            $condition['issue'] = date('Ymd').'0'.$_noewCount;
        }else{
            $condition['issue'] = date('Ymd').$_noewCount;
        }
        
        $cur_issue = M('cate_date_time')->where($condition)->find();
        //{issue:'20170509-068',nowtime:'2017-05-09 17:09:25',opentime:'2017-05-09 17:21:00',saleend:'2017-05-09 17:19:20',sale:'68',left:'52'}
        $issue = $cur_issue['period'];
        $nowtime = date('Y-m-d H:i:s');
        $opentime = $cur_issue['date'].' '.$cur_issue['open_time'];
        $saleend = date('Y-m-d H:i:s',strtotime($opentime) - 60);
        $sale = $noewCount;
        if($_POST['lotteryid'] == 11){
            $left = 82 - $noewCount;
        }
        if($_POST['lotteryid'] == 6){
            $left = 84 - $noewCount;
        }
        if($_POST['lotteryid'] == 17){
            $left = 97 - $noewCount;
        }
        $str = '{'.'issue'.':'."'$issue'".','.'nowtime'.':'."'$nowtime'".','.'opentime'.':'."'$opentime'".','.'saleend'.':'."'$saleend'".','.'sale'.':'."'$sale'".','.'left'.':'."'$left'".'}';
        return $str;
    }

    /**
     * 期数：lotteryid:'2' flag:'read'
     * @return string
     */
    public function cqssc_status() {
//        $_POST['lotteryid'] = 2;
        $data['cate_id'] = $_POST['lotteryid'];
        $data['date'] = date('Y-m-d');
        $data['timeStamp'] = array('LT',time());
        $count = M('cate_date_time')->where($data)->count();
//        print_r($count);exit;
        $noewCount = $count;
        $condition['cate_id'] = $_POST['lotteryid'];
        $condition['date'] = date('Y-m-d');
        if ($_POST['lotteryid'] == 40) {
            if(strlen($noewCount) == 1){
                $_noewCount = '000'.$noewCount;
            }
            if(strlen($noewCount) == 2){
                $_noewCount = '00'.$noewCount;
            }
            if(strlen($noewCount) == 3){
                $_noewCount = '0'.$noewCount;
            }
            if(strlen($noewCount) == 4){
                $_noewCount = $noewCount;
            }
            $condition['period'] = date('Ymd').$_noewCount;
        }
        if ($_POST['lotteryid'] == 2) {
            if(strlen($noewCount) == 1){
                $_noewCount = '00'.$noewCount;
            }
            if(strlen($noewCount) == 2){
                $_noewCount = '0'.$noewCount;
            }
            if(strlen($noewCount) == 3){
                $_noewCount = $noewCount;
            }
            $condition['period'] = $_noewCount;
        }
        $data['timeStamp'] = array('LT',time());
        $cur_issue = M('cate_date_time')->where($condition)->find();
//        print_r($cur_issue);exit;
        if($_POST['lotteryid'] == 2){
            $issue = $cur_issue['issue'];
        }
        if($_POST['lotteryid'] != 2){
            $issue = $cur_issue['period'];
        }
        if ($_POST['lotteryid'] == 2) {
            $left = 120 - $noewCount;
         } 
        if ($_POST['lotteryid'] == 40) {
            
            $left = 1440 - $noewCount;
         } 
        $nowtime = date('Y-m-d H:i:s');
        $opentime = $cur_issue['date'].' '.$cur_issue['open_time'];
        if ($_POST['lotteryid'] == 40){
            $saleend = $opentime;
        }
        if ($_POST['lotteryid'] == 2){
            $saleend = date('Y-m-d H:i:s',strtotime($opentime));
        }
         if ($_POST['lotteryid'] == 2){
            $sale = $count - 1;
         }  else {
            $sale = $noewCount;
         }
        $str = '{'.'issue'.':'."'$issue'".','.'nowtime'.':'."'$nowtime'".','.'opentime'.':'."'$opentime'".','.'saleend'.':'."'$saleend'".','.'sale'.':'."'$sale'".','.'left'.':'."'$left'".'}';
//        print_r($str);exit;
        return $str;
    }
    // *
     // * 重庆时时彩剩下多少时间开奖 单位s
     
    public function end_open_prize_time() {
        $issue = $_POST['issue'];
        $data['cate_id'] = $_POST['lotteryid'];
        $data['date'] = date('Y-m-d');
        if ($_POST['lotteryid'] == 2) {
            $data['period'] =  substr($issue,strlen($issue)- 3,3); 
        }
        if ($_POST['lotteryid'] == 11 || $_POST['lotteryid'] == 40 || $_POST['lotteryid'] == 6 || $_POST['lotteryid'] == 17) {
            $data['period'] =  $issue;
        }
        $info = M('cate_date_time')->where($data)->find();
        $a = substr($info['timeStamp'],strlen($info['timeStamp'])- 4,4); 
        $b = substr(time(),strlen(time())- 4,4); 
        $time = $a - $b;

        return  $time;
    }
    
    
}
    

    




?>