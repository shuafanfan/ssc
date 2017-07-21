<?php 
namespace Html\Controller;
use Think\Controller;
class UserController  extends CommonController {
    /**
     * 我的信息头部 代理相关
     */
    public function myInfomation_top() {
        $userInfo = M('user')->where('id = '.$_COOKIE['userId'])->field('type,vip_type,test_type,distributor_id')->find();
        $this->ajaxReturn($userInfo);
    }
    /**
     * 登录日志分页加跳转
     */
    public function loginPage() {
//        print_r($_POST);exit;
        if(!empty($_POST['userName'])){
            $userName['username'] = $_POST['userName']; 
        }  else {
            $userName['username'] = $_COOKIE['username']; 
        }
        if(!empty($_POST['ip'])){
            $userName['ip'] = $_POST['ip']; 
        }
        if(!empty($_POST['url'])){
            $userName['url'] = $_POST['url']; 
        }
        if($_POST['status'] != -1){
        $userName['status'] = $_POST['status']; 
        }
        $startTime = strtotime($_POST['date_min']);
//        print_r($startTime);exit;
        $endTime = strtotime($_POST['date_max']);
        $userName['loginTime'] = array('between',array($startTime,$endTime));
//        print_r($_POST);exit;
        $count = M('user_login_log')->where($userName)->count();
        $num = ceil($count/10);  //一共多少页  取整 // echo(ceil(5.1);; //6 
        $page['count'] = $count;
        if($_POST['jump'] == 0){
            if(strcmp($_POST['page_i'], '上一页') == 0){
//                exit('sss');
                $page['current'] = $_POST['page_s'] - 1; //当前页面
                if($_POST['page_s'] - 1 == $num){
                    $page['number'] = ($count%10);
                    $page['lastPage'] = $num;
                }  else {
                    $page['number'] = 10;
                }
                $content = ($_POST['page_s'] - 2)*10;
            }  else {
                if($_POST['page_s'] + 1 == $num){
                    $page['number'] = ($count%10);
                    $page['lastPage'] = $num;
                }  else {
                    if($_POST['page_s'] + 1 > $num){
                        $page['number'] = 0;
                    }else{
                        $page['number'] = 10;
                    }

                }
                $page['current'] = $_POST['page_s'] + 1; //当前页面
                $content = $_POST['page_s']*10;
            }
            

        }  else {
            if($_POST['page_i'] == $num){
                $page['number'] = ($count%10);
                $page['lastPage'] = $num;
            }  else {
                if($_POST['page_s'] > $num){
                    $page['number'] = 0;
                }else{
                    $page['number'] = 10;
                }
            }
            $page['current'] = $_POST['page_i']; //当前页面
            $content = ($_POST['page_i'] - 1)*10;
        }
//        print_r($userName);exit;
        $list = M('user_login_log')->where($userName)->order('loginTime desc')->limit($content,10)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
//        print_r( M('user_login_log')->getLastSql());exit;
        foreach ($list as $k => $v) {
            if($v['status'] == 1)$list[$k]['status'] = '成功';
            if($v['status'] == 0)$list[$k]['status'] = '失败';
        }
        $this->assign('count',$page);
        $this->assign('list',$list);
        $this->display();
    }
    /**
     * 个人中心：登录记录(点击、查询)
     */
    public function loginLog() {
        if(!empty($_POST['date_min'])){
            $startTime =  strtotime($_POST['date_min']);
        }
        if(!empty($_POST['date_max'])){
            $endTime =  strtotime($_POST['date_max']);
        }
        if(!empty($_POST['userName'])){
            $userName['username'] = $_POST['userName']; 
        }  else {
            $userName['username'] = $_COOKIE['username']; 
        }
        if(!empty($_POST['url'])){
            $userName['url'] = $_POST['url']; 
        }
        if(!empty($_POST['ip'])){
            $userName['ip'] = $_POST['ip']; 
        }
        if($_POST['status'] != -1){
            $userName['status'] = $_POST['status']; 
        }
        $userName['loginTime'] = array('between',array($startTime,$endTime));
        $count = M('user_login_log')->where($userName)->count();
        $list = M('user_login_log')->where($userName)->order('loginTime desc')->limit(0,10)->select();
        foreach ($list as $k => $v) {
            if($v['status'] == 1)$list[$k]['status'] = '成功';
            if($v['status'] == 0)$list[$k]['status'] = '失败';
        }
        $page['count'] = $count;
        $page['current'] = 1;
        if($count > 10){
            $page['number'] = 10;
        }  else {
            $page['number'] = $count;
            $page['lastPage'] = $count;
        }
        $this->assign('count',$page);
        $this->assign('list',$list);
        $this->display();
    }
    
    /**
     * 个人中心：我的信息
     */
    public function myInfo() {
        // 个人信息
        $userName['username'] = $_COOKIE['username']; 
        $count = M('user_bank')->where($userName)->count();
        $userInfo = M('user')->where($userName)->find();
        $userInfo['count'] = $count;
        // 团队信息、团队人数 余额
        $OrderM = M('user');
        $OrderZ = M('user_money_log');
        $team_num_and_sumMoney = R('Tdgl/test');
        //团队信息、今日注册
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $start = mktime(0,0,0,$month,$day,$year);//当天开始时间戳
        $end= mktime(23,59,59,$month,$day,$year);//当天结束时间戳
        $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
        $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
        $data['g_user.id'] = array('in',$userId_array);
        $data['g_user.registertime'] = array(array('EGT',$start),array('ELT',$end),'and');
        $toadayZCL = $OrderM
                ->join('g_user_open_account_center ON g_user.id=g_user_open_account_center.userId')
                ->where($data)
                ->sum('registerNum');        
        if (empty($toadayZCL)) {
                    $toadayZCL = 0;
        }
        //当前在线
        $online= include './online.php';
        //今日返点
        $where['time'] = array(array('EGT',$start),array('ELT',$end),'and');
        $where['type'] = 4;
        // dump($where);exit;
        $now_back = $OrderZ->where($where)->sum('money');
        // dump($now_back);exit;
        if (empty($now_back)) {
            $now_back = 0;
        }
        foreach ($userInfo as $key => $value) {
            $userInfo['team_num'] = $team_num_and_sumMoney['team_num'];
            $userInfo['team_money'] = $team_num_and_sumMoney['team_money'];
            $userInfo['toadayZCL'] = $toadayZCL;
            $userInfo['online'] = $online['num'];
            $userInfo['now_back'] = $now_back;
        }
        // dump($userInfo);exit;
        $this->assign("userInfo",$userInfo); 
        $this->display();
        
        
    }
    /**
     * 个人中心：安全中心
     */
    public function safe_core() {
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('login_ip,logintime,qq,email,mobile')->find();
        $list = M('user_login_log')->where($userName)->order('loginTime desc')->limit(6)->field('loginTime,ip,status')->select();
        foreach ($list as $k => $v) {
            if($v['status'] == 1)$list[$k]['status'] = '成功';
            if($v['status'] == 0)$list[$k]['status'] = '失败';
        }
        if(!empty($userInfo['qq'])){
            $a = substr($userInfo['qq'],0,2);
            $qq = $a.'***';
            $userInfo['qq'] = $qq;
        }
        if(!empty($userInfo['email'])){
            $a = substr($userInfo['email'],0,2);
            $qq = $a.'***';
            $userInfo['email'] = $qq;
        }
        if($userInfo['mobile'] != 0){
            if(strlen($userInfo['mobile']) < 11){
                $userInfo['mobile'] = '***';
            }  else {
                $a = substr($userInfo['mobile'],0,2);
                $b = substr($userInfo['mobile'],-4);
                 $userInfo['mobile'] = $a.'***'.$b;
            }
        }
        $count = M('user_bank')->where($userName)->count();
        $userInfo['bank'] = $count;
        $this->assign("userInfo",$userInfo); 
        $this->assign('list',$list);
        $this->display();
    }
    /**
     * 个人中心：修改密码
     */
    public function editPassword() {
//        print_r($_POST);exit;
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('nickname,password')->find();
        $this->assign("userInfo",$userInfo); 

        $this->display();
    }
    /**
     * 个人中心：修改密码:修改登录密码、资金密码
     */
    public function editLoginPassword() {
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('password,id,cashPassword')->find();
        //修改登录密码
        if($_POST['cashpassword'] == 'false' ){
            if(strcmp(md5($_POST['oldpassword']),$userInfo['password']) != 0){
                    $return = array('state' => 1);
            }else{
                $data['id'] = $userInfo['id'];
                $data['password'] = md5($_POST['password']);
                if( M('user')->save($data)){
                    $return = array('state' => 2);
                }
            }
            exit(json_encode($return));
        }//修改资金密码
        else{
            if(strcmp(md5($_POST['oldpassword']),$userInfo['cashPassword']) != 0){
                    $return = array('state' => 1);
            }else{
                $data['id'] = $userInfo['id'];
                $data['cashPassword'] = md5($_POST['password']);
                if( M('user')->save($data)){
                    $return = array('state' => 2);
                }
            }
            exit(json_encode($return));
        }
    }
    /**
     * 绑定安全QQ
     */
    public function bindingQQ() {
        if($_POST['qq']){
            $userName['username'] = $_COOKIE['username']; 
            $userInfo = M('user')->where($userName)->field('qq,id')->find();
            $data['id'] = $userInfo['id'];
            $data['qq'] = $_POST['qq'];
            $a = substr($_POST['qq'],0,2);
            $qq = $a.'***';
            if(M('user')->save($data)){
                $return = array('state' => 1,'qq'=>$qq);
            }
            exit(json_encode($return));
        }
        
    }
    /**
     * 绑定邮箱
     */
    public function bindingEmail() {
        if($_POST['email']){
            $userName['username'] = $_COOKIE['username']; 
            $userInfo = M('user')->where($userName)->field('email,id')->find();
            $data['id'] = $userInfo['id'];
            $data['email'] = $_POST['email'];
            $a = substr($_POST['email'],0,2);
            $email = $a.'***';
            if(M('user')->save($data)){
                $return = array('state' => 1,'email'=>$email);
            }
            exit(json_encode($return));
        }
        
    }
    /**
     * 绑定手机号码
     */
    public function bindingIphone() {
        if($_POST['iphone']){
            $userName['username'] = $_COOKIE['username']; 
            $userInfo = M('user')->where($userName)->field('mobile,id')->find();
            $data['id'] = $userInfo['id'];
            $data['mobile'] = $_POST['iphone'];
            if(strlen($_POST['iphone']) < 11){
                $iphone = '***';
            }  else {
                $a = substr($_POST['iphone'],0,2);
                $b = substr($_POST['iphone'],-4);
                $iphone = $a.'***'.$b;
            }
            if(M('user')->save($data)){
                $return = array('state' => 1,'iphone'=>$iphone);
            }
            exit(json_encode($return));
        }
        
    }
    /**
     * 绑定安全QQ的出现页面
     * 
     */
    public function apperQQ() {
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('nickname')->find();
        $this->assign("userInfo",$userInfo);
        $this->display();
    }
    /**
     * 绑定安全邮箱的出现页面
     */
    public function appearEmail() {
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('nickname')->find();
        $this->assign("userInfo",$userInfo);
        $this->display();
    }
    /**
     * 绑定安全手机的出现页面
     */
    public function appearIphone() {
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('nickname')->find();
        $this->assign("userInfo",$userInfo);
        $this->display();
    }
    
    /**
     * 绑定银行卡页面
     */
    public function bind_blank() {
        $userName['username'] = $_COOKIE['username']; 
        $userBlank = M('user')->join(' g_user_bank ON g_user.id = g_user_bank.uId')->where($userName)->field('name')->find();
        if(!empty($userBlank['name']) && mb_strlen($userBlank['name'],'UTF8') > 1){
            $a = $this->mbStrSplit($userBlank['name'], 1);
            $userBlank['name'] = $a[0].'**';
        }
        $userBlank['blank'] = $_POST['blank'];
        $this->assign("userBlank",$userBlank);
        $this->display();
       
    }
    
    /**
     * 添加银行卡信息
     */
    public function blank_info_add() {
        $where['uId'] = $_COOKIE['userId'];
        //$where['bank'] = $_POST['bank'];
        $bank_info = M('user_bank')->where($where)->find();
        if ($bank_info) {
            $info['bank'] = $_POST['bank'];
            $bank_info = M('user_bank')->where($info)->find();
            if ($bank_info) {
                $return = array('state' => 0);
                exit(json_encode($return));
               }
            $into['name'] = $_POST['account_user'];
            $name_into = M('user_bank')->where($into)->find();
            if (empty($name_into)) {
                $return = array('state' => 19);
             exit(json_encode($return));
            }
            
        }
        if(empty($_POST['address'])){
            $return = array('state' => 1);
             exit(json_encode($return));
        }
        if(empty($_POST['account_user'])){
            $return = array('state' => 2);
             exit(json_encode($return));
        }
        if(empty($_POST['bank_key'])){
            $return = array('state' => 3);
            exit(json_encode($return));
        }
        if($_POST['fund_pwd'] == ''){
            $return = array('state' => 4);
            exit(json_encode($return));
        } 
        if(!empty($_POST['fund_pwd'])){
            $a = 5;//资金密码次数限制
            $userName['username'] = $_COOKIE['username']; 
            $userInfo = M('user')->where($userName)->field('cashPassword,id,allowTime')->find();
            // print_r($userInfo);exit;
            if($userInfo['allowTime'] + 1 == 6){
//                    cookie('name', null);
                    $return = array('state' => 6);
                    exit(json_encode($return));
            } 
            if(md5($_POST['fund_pwd']) != $userInfo['cashPassword']){
               $data['id'] = $userInfo['id'];
               if($userInfo['allowTime'] == 0){
                    $data['allowTime'] = 1;
               }
               if($userInfo['allowTime'] > 0 && $userInfo['allowTime'] < 5){
                   $data['allowTime'] = 1 + $userInfo['allowTime'];
               }
               if( $userInfo['allowTime'] == 5){
                   $data['status'] = 1; //封号
               }
               M('user')->save($data);

                $message = '资金密码错误'.($data['allowTime']).'次'.'还剩'.($a - $data['allowTime']) .'次';
                $return = array('message' => $message,'state' => 5);
                exit(json_encode($return));
        
            }  else {
                $blank['bank'] = $_POST['bank'];
                $blank['status'] = $_POST['lock'];
                $blank['uId'] = $userInfo['id'];
                $blank['openBank'] = $_POST['address'];
                $blank['name'] = $_POST['account_user'];
                $blank['numb'] = $_POST['bank_key'];
                $blank['addTime'] = time();
                if(M('user_bank')->add($blank)){
                    if($_POST['blank']){
                        $return = array('state' => 8);
                        exit(json_encode($return));
                    }  else {
                        $return = array('state' => 7);
                        exit(json_encode($return));
                    }

                }
            }
        }
       
    }
    /**
     * 分割中文字符
     * @param type $string
     * @param type $len
     * @return type
     */
    public  function mbStrSplit ($string, $len=1) {
      $start = 0;
      $strlen = mb_strlen($string);
      while ($strlen) {
        $array[] = mb_substr($string,$start,$len,"utf8");
        $string = mb_substr($string, $len, $strlen,"utf8");
        $strlen = mb_strlen($string);
      }
      return $array;
    }
    /**
     * 用户银行资料
     */
    public function userBlank_info() {
        $userName['uId'] = $_COOKIE['userId']; 

        $userBlank = M('user_bank')->where($userName)->field('numb,name,bank')->limit(6)->order('id ASC ')->select();
        //dump($userBlank);exit;
        $this->assign("userBlank",$userBlank);
        $countUserBlank=count($userBlank);
        $this->assign("countUserBlank",$countUserBlank);
        $this->display();
    }
    /**
     * 刷新用户账户余额
     */
    public function refreshMoney() {
        $userName['id'] = $_COOKIE['userId']; 
        $userInfo = M('user')->where($userName)->field('money')->find();
        $return = array('money'=>$userInfo['money']);
        exit(json_encode($return));
    }
    /**
     * 用户中心刷新账号余额
     */
    public function user_refreshMoney() {
        $userName['id'] = $_COOKIE['userId']; 
        $userInfo = M('user')->where($userName)->field('money')->find();
        $userInfo['money']= $userInfo['money'];
        $return = array('money'=>$userInfo['money']);
        exit(json_encode($return));
    }
    /**
     * 用户投注金钱变化
     */
    public function user_bet_refreshMoney() {
        $userName['id'] = $_COOKIE['userId']; 
        $userInfo = M('user')->where($userName)->field('money')->find();
        $return = array('money'=>$userInfo['money']);
        exit(json_encode($return));
    }
    
}
    

    




?>