<?php 
namespace Html\Controller;
use Think\Controller;
class FrequentcolorsController  extends CommonController {
    
    /**
     * 时时彩  返回值给前端
     */
    public function openData() {
        $data['cate_id'] = $_POST['pri_lotteryid']; 
        $data['date'] = date("Y-m-d"); 
        $data['timeStamp'] = array('EGT',time()); 
        $cate_date_time_info = M('cate_date_time')->where($data)->field('date,period,open_time,issue,cate_id')->order('timeStamp ASC')->find();
        $pri_issues = ''; 
        $pri_cur_issue = '';
        $pri_lastopen = '';
        $_pri_lastopen = '';
//        foreach ($list as $k => $v) {
//            if($k == 0){
                $_issue = $cate_date_time_info['issue'];
                $_endtime =  $cate_date_time_info['date'].' '.$cate_date_time_info['open_time'];
                $_opentime = date("Y-m-d H:i:s",  strtotime($_endtime));
                $pri_cur_issue = '{'.'issue'.':'."'$_issue'".','.'endtime'.':'."'$_endtime'".','.'opentime'.':'."'$_opentime'".'}';
                $condition['date'] = date('Y-m-d');
                $condition['issue'] = $cate_date_time_info['issue'] - 1;
                $condition['cate_id'] = $cate_date_time_info['cate_id'];
                $lastIssue = M('cate_date_time')->where($condition)->find();
//                print_r(M('cate_date_time')->getLastSql());exit;
                $issue = $lastIssue['issue'];
                $endtime =  $lastIssue['date'].' '.date("H:i:s",(strtotime($lastIssue['open_time'])));
                $opentime = date("Y-m-d H:i:s",  strtotime($endtime));
                $pri_lastopen = '{'.'issue'.':'."'$issue'".','.'endtime'.':'."'$endtime'".','.'opentime'.':'."'$opentime'".','.'statuscode'.':'."'0'".'}';
                $_pri_lastopen = '{'.'issue'.':'."'$issue'".','.'endtime'.':'."'$endtime'".'}'.',';
                $lastOpenInfo = M('open_prize_data')->where(array('code'=>$lastIssue['cate_id'],'expect'=>$lastIssue['issue']))->find();
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
//            }

//        }
        $pri_issues = $_pri_lastopen.($this->issue_cqssc($_POST['pri_lotteryid']));
        $pri_issues = '['.$pri_issues.']';
        $pri_servertime = date("Y-m-d H:i:s", time());
        $return = array('pri_lastopeninfo' =>$_lastOpenInfo,'pri_issues' =>$pri_issues,'pri_cur_issue'=>$pri_cur_issue,'pri_lastopen'=>$pri_lastopen,'pri_servertime'=>"'$pri_servertime'");
        exit(json_encode($return));
    }
    
    public function issue_cqssc($cate_id){
        $a = 'issue';
        $b = 'endtime';
        $data['cate_id'] = $cate_id; 
        $data['timeStamp'] = array('EGT',  time()); 
        $list = M('cate_date_time')->where($data)->field('date,issue,open_time')->limit(119)->order('timeStamp ASC')->select();
        foreach ($list as $k => $v) {
                $pri_issues_issue[$k]=  $v['issue'];
                $pri_issues_endtime[$k] =  $v['date'].' '.$v['open_time'];
                if($k == 118){
                    $c = '{'.$a.':'."'$pri_issues_issue[$k]'".','.$b.':'."'$pri_issues_endtime[$k]'".'}';
                }else{
                    $pri_issues .= '{'.$a.':'."'$pri_issues_issue[$k]'".','.$b.':'."'$pri_issues_endtime[$k]'".'}'.',';
                }
                $pri_issues = $pri_issues.$c;
        }
        return $pri_issues;
    }  
    
    
    /**
     * 时时彩  接收值、处理
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

                        $conn=mysql_connect("43.249.205.131","root","Appapi123!") or die('连接错误：'.mysql_error());
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
            $return = array('stats'=>'success');
            $this->ajaxReturn($return); 
    } 
    
    
    
    /**
     * 期数：lotteryid:2,3,4,40,32
     * @return string
     */
    public function cqssc_status() {
//        $_POST['lotteryid'] = 3;
        $condition['cate_id'] = $_POST['lotteryid'];
        $condition['date'] = date('Y-m-d');
        $condition['timeStamp'] = array('EGT',time());
        $count = M('cate_date_time')->where($condition)->count();
        $cur_issue = M('cate_date_time')->where($condition)->order('timeStamp ASC')->find();
//        print_r(M('cate_date_time')->getLastSql());exit;
        if ($_POST['lotteryid'] == 2) {
            $left = 120 - $count;
        }
        if ($_POST['lotteryid'] == 4) {
            $left = 84 - $count;
        } 
        if ($_POST['lotteryid'] == 3) {
            $left = 96 - $count;
        }
        if ($_POST['lotteryid'] == 40) {
            $left = 1440  - $count;
        }
        if ($_POST['lotteryid'] == 32) {
            $left = 71  - $count;
        }
        $issue = $cur_issue['issue'];
        $nowtime = date('Y-m-d H:i:s');
        $opentime = $cur_issue['date'].' '.$cur_issue['open_time'];
        $saleend = date('Y-m-d H:i:s',strtotime($opentime));
        $sale = $count - 1;
        $str = '{'.'issue'.':'."'$issue'".','.'nowtime'.':'."'$nowtime'".','.'opentime'.':'."'$opentime'".','.'saleend'.':'."'$saleend'".','.'sale'.':'."'$sale'".','.'left'.':'."'$left'".'}';
//        print_r($str);exit;
        return $str;
    }
    // *
     // * 重庆时时彩剩下多少时间开奖 单位s
     
    public function end_open_prize_time() {
        $data['cate_id'] = $_POST['lotteryid'];
        $data['date'] = date('Y-m-d');
        $data['period'] =  $_POST['issue'];
        $info = M('cate_date_time')->where($data)->find();
        $a = substr($info['timeStamp'],strlen($info['timeStamp'])- 4,4); 
        $b = substr(time(),strlen(time())- 4,4); 
        $time = $a - $b;

        return  $time;
    }
    
    
    /**
     * lotteryid:2,3,4,40,32&flag:mjwf
     */
    public function return_ssc_mj() {
        if($_POST['lotteryid'] && $_POST['flag'] == 'mjwf'){
            $where['code']= $_POST['lotteryid'];
            $data['cate_id'] = $where['code'];
            $data['timeStamp'] = array('EGT',time());
            $data['date'] = date("Y-m-d");
            $cate_date_time_info = M('cate_date_time')->order('period ASC')->where($data)->find();
    //        print_r($cate_date_time_info);
            $enissue = $cate_date_time_info['issue']; //当期期数
            $entime =   date('Y-m-d').' '.$cate_date_time_info['open_time'];
            $datime = date('Y-m-d H:i:s'); //现在时间
            $where['expect']= $enissue - 1;
            $openPrize_info = M('open_prize_data')->where($where)->order('expect DESC')->find();
    //        print_r($openPrize_info);exit;
            $opissue =  $where['expect'];//上一期期数

            if(!empty($openPrize_info)){
                $str = '';
                $code = '';
                foreach (explode(',', $openPrize_info['opencode']) as $k => $v) {
                    if($k == 4){
                         $str = "'$v'";
                    }  else {
                        $code .= "'$v'".',' ;
                    }
                }
                $code = '['.$code.$str.']';//上一期开奖号
            }  else {
                $x = 'x';
                $code = '['."'$x'".$str.']';
            }
            //{'enissue':'201706220690','datime':'2017-06-22 11:29:11','entime':'2017-06-22 11:30:11','opissue':'201706220689','code':['4','4','4','0','5']};
            $a = "'enissue'".':'."'$enissue'".',';
            $b = "'datime'".':'."'$datime'".',';
            $c = "'entime'".':'."'$entime'".',';
            $d = "'opissue'".':'."'$opissue'".',';
            $e = "'code'".':'.$code;
            $return = '{'.$a.$b.$c.$d.$e.'}';
            $this->ajaxReturn($return);
        }
    }
    
    
 
    
    
    
    
    
    









    
}