<?php 
namespace Html\Controller;
use Think\Controller;
use Think\Verify;
class RechargeController extends CommonController {
    
    /**
     * 光速充值
     * Programmer : manty
     * Date: 06-015  10:10
     */
    
    public function speed_recharge(){
        if($_POST['btn']){
            if (empty($_POST['money'])) {
                      $this->error('请输入金额！');
                  }      
            if($_POST['money'] < 50){
                $this->error('单笔充值限额 ：最低 50 ,最高 无限制');
            }
            //回调成功
            // if(1){
                //充值到用户账号上
                $info['id'] = $_COOKIE["userId"];
                $userInfo = M('user')->where($info)->find();
                $updata['money'] = $userInfo['money'] + $_POST['money'];
                $updata['id'] = $_COOKIE["userId"];
                if(M('user') -> save($updata)){
                    //记录金钱日志
                    $data["userId"] = $_COOKIE["userId"];
                    $data['type']=1;
                    $data["money"] = $_POST["money"];
                    if($_POST["bank"]){
                        $data["remark"] = $_POST["bank"];
                    }else{
                        $data["remark"] = '微信';
                    }
                    $data["time"] = time();
                    // 写入数据
                    if(M('user_money_log')->add($data)){
                        echo "充值成功！";
                    } 
                    }else {
                    $this->error('充值失败！');
                    }
                
                }  else {
                $this->error('充值失败！');
                }
      
            // }  
    }


    
    /**
     * 微信充值
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function wechat_recharge(){
        $this->gscz();
        //1
    }
    /**
     * 银行卡
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function admin_bank(){
        $where['status'] = 0;
        $orderM = M('admin_bank');
        $list = $orderM->where($where)->select();
        $this->ajaxReturn($list);
    }
    public function bankCard(){
    	
        if (empty($_POST['money'])) {
            $this->error('请输入金额！');
             $rea['state'] = 3;
            
        }
        if($_POST['money'] < 100){
              $this->error('单笔充值限额 ：最低 100 ,最高 无限制');
              $rea['state'] = 4;
        }
        //充值到用户账号上
            $info['userId'] = $_COOKIE["userId"];
            $info['bank_id'] = $_POST['bank_id'];
            $info['money'] = $_POST['money'];
            $info['playtime'] = time();
            if(M('bank_play_money') -> add($info)){           
            // 构建写入的数据数组
               $rea['state'] = 1;
            }else{
               $rea['state'] = 2;
                
            }
 
        $this->ajaxReturn($rea);
    }
    /**
     * 账户提款
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function user_Withdrawals(){
        $info['id'] = $_COOKIE["userId"];
        $balance = M('user')->where($info)->getField('money as balance');
        
        $y = date("Y");
        $m = date("m");
        $d = date("d");
        $beginTime = mktime(3,0,0,$m,$d,$y);
        //dump($morningTime);exit;
        //获取当日24点的时间戳
        $endTime = $beginTime+86340;
        $where['userId'] = $_COOKIE["userId"];
        $where['time'] = array(array('EGT',$beginTime),array('ELT',$endTime),'and');
        $frequency = M('user_money_log')->where($where)->sum('type=2');
        if ($frequency==0) {
            $remainingTimes = 10;
        }else{
            $remainingTimes = 10-$frequency;
            if ($remainingTimes<=0) {
                $remainingTimes=0;
            }
                      
        }
        $where['uId'] = $_COOKIE['userId'];
        $receivingBank = M('user_bank')->where($where)->field('id as unmb_id ,bank as choice_bank,numb as choice_numb')->select();

            
        $receivingBank['remainingTimes'] = $remainingTimes;
        $receivingBank['balance'] = number_format($balance);
        // print_r($receivingBank);exit;
        $this->ajaxReturn($receivingBank);
    }
    public function userWithdrawals(){
        if($_POST){
            if (empty($_POST['unmb_id'])) {
                $res['info']='请先绑定银行卡！';
                $res['state']=4;
                $this->ajaxReturn($res);
            } 
            if (empty($_POST['money'])) {
                $this->error('请输入金额！');
            }
            if($_POST['money'] < 100){
                $this->error('单笔取款限额 ：最低 100 ,最高 无限制');
            }
            if (empty($_POST['password'])) {
                $this->error('请输入密码！');
            }
            if(!empty($_POST['password'])){
                $a = '<test id="1"  sid="12"/>';//资金密码次数限制
                $userName['username'] = $_COOKIE['username']; 
                $userInfo = M('user')->where($userName)->field('cashPassword,id,allowTime')->find();
                if($userInfo['allowTime']== $a){
    //                    cookie('name', null);
                        $return = array('state' => 6);
                        $time['loginTime']=time();
                        $time['content']='提现错误密码超过'.$a.'次';
                        $time['userName']=$_COOKIE['username'];
                        $time['url'] = $_SERVER['HTTP_HOST'];
                        $time['ip'] = $_SERVER['REMOTE_ADDR'];
                        M('user_login_log')->add($time);
                        exit(json_encode($return));
                } 
                if(md5($_POST['password']) != $userInfo['cashPassword']){
                   $data['id'] = $userInfo['id'];
                   if($userInfo['allowTime'] == 0){
                        $data['allowTime'] = 1;
                   }
                   if($userInfo['allowTime'] > 0 && $userInfo['allowTime'] < $a){
                       $data['allowTime'] = 1 + $userInfo['allowTime'];
                   }
                   if( $userInfo['allowTime'] == $a){
                       $data['status'] = 1; //封号
                   }
                   M('user')->save($data);

                    $message = '资金密码错误'.($data['allowTime']).'次'.'还剩'.($a - $data['allowTime']) .'次';
                    $return = array('info' => $message,'state' => 5);
                    exit(json_encode($return));
                }
            }   
            $info['id'] = $_COOKIE["userId"];
            $userInfo = M('user')->where($info)->find();
            $updata['money'] = $userInfo['money'] - $_POST['money'];
            if($updata['money']<0){
                 
                $res['info']='余额不足！';
                $res['state']=3;
            }else{
            $updata['id'] = $_COOKIE["userId"];
           
            if(M('user') -> save($updata)){
                
                // 构建写入的数据数组
                $data["userId"] = $_COOKIE["userId"];
                $data['type']=2;
                $data["money"] = $_POST["money"];
                $data["remark"] = $_POST["unmb_id"];
                $data["time"] = time();               
                //写入数据
                M('user_money_log')->add($data);

                
                $res['info']='提现成功！';
                $res['state']=1;
            }else{
               
                $res['info']='提现失败！';
                $res['state']=2;
            }
          } 
        }
         $this->ajaxReturn($res);
    }
    /**
     * 用户转账
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function transfer_query(){
        if (empty($_POST["transfer_id"])) {
            $this->error('请输出转入账号！');
        }
        if (!empty($_POST["transfer_id"])) {
            
        
            $info["username"] = $_POST["transfer_id"];
            // $info['id'] = '4';           
            $info=M('user')->where($info)->field('money as platform_balance')->find();
            if (empty($info)){
               $this->error('用户不存在！');
            }          
            //$platform_balance=$info['money'];

            $where["id"] = $_COOKIE["userId"];
            // dump($where);exit;
            $balance=M('user')->where($where)->field('money as mybalance')->find();
            //$mybalance=$balance['money'];  
        }
        $list = array($info,$balance);
        $this->ajaxReturn($list);
    }
    public function user_transfer(){
            // 判断是否能拨款或提现
            $where['id'] = $_COOKIE['userId'];
            //dump($where);exit;
            $info = M('user')->where($where)->find();
            // dump($info);
            // dump($info['distributor_id']);exit;
            if ($info['distributor_id'] == 0) {
                if ($info['allowTime']>=5) {
                    $this->error('用户已被锁定！');
                }
            }elseif ($info['distributor_id']!=0) {
                $inte['userId'] = $info['distributor_id'];
                $incl = M('user_transfer_accounts')->where($incl)->order('time DESC')->find();
                if ($incl) {
                    // 判断距离现在是否为8小时
                    $transfertime=$incl['time'];
                    //dump($transfertime);exit;
                    $nowtime = time();
                    //dump($nowtime);exit;
                    $a = $nowtime-$transfertime;
                    //dump($a);exit;
                    $b = 28800;
                    if ($a<$b) {
                        $this->error('上下级拨款完8小时内不能操作！');
                    }
                }
            }


        // if($_POST['btn']){
            
            // 构建写入的数据数组
            // print_r(sss);exit;
            if (empty($_POST['money'])) {
                $this->error('请输入金额！');
            }
            if (empty($_POST['password'])) {
                $this->error('请输入密码！');
            }
            if(!empty($_POST['password'])){
            $a = 5;//资金密码次数限制
            $userName['username'] = $_COOKIE['username']; 
            $userInfo = M('user')->where($userName)->field('cashPassword,id,allowTime')->find();
            // print_r($userInfo['cashPassword']);exit;
            // print_r($userInfo);exit;
            if($userInfo['allowTime'] + 1 == 6){
//                    cookie('name', null);
                    $return = array('state' => 6);
                    exit(json_encode($return));
            } 
            if(md5($_POST['password']) != $userInfo['cashPassword']){

               $data['id'] = $userInfo['id'];
               if($userInfo['allowTime'] == 0){
                    $data['allowTime'] = 1;
               }
               if($userInfo['allowTime'] > 0 && $userInfo['allowTime'] < 5){
                   $data['allowTime'] = 1 + $userInfo['allowTime'];
               }
               if( $userInfo['allowTime'] == 5){
                   $rea['state'] = 8;
                   $this->ajaxReturn($rea); //封号
               }
               //  print_r($data);exit;
               // $userInfo['allowTime'] = $data['allowTime'];
               M('user')->save($data);

                $message = '资金密码错误'.($data['allowTime']).'次'.'还剩'.($a - $data['allowTime']) .'次';
                $return = array('message' => $message,'state' => 5);
                // exit(json_encode($return));
            }
        }   
            // print_r(sss);exit;
            $intt['username'] = $_POST["transfer_id"];
            $inhh = M('user')->where($intt)->find();
                if (empty($inhh)) {            
                    $rea['state'] = 3;
                    $this->ajaxReturn($rea);                
                }
            $inff["id"] = $_COOKIE["userId"];
            // dump($where);exit;
            $inkk=M('user')->where($inff)->field('money as mybalance')->find();
                if ($_POST['money']>$inkk['mybalance']) {
                    $rea['state'] =4;
                    $this->ajaxReturn($rea);
                } 
            // print_r(sss);exit;       
            $into['id'] = $_COOKIE["userId"];
            $userInto = M('user')->where($into)->find();

            $downdata['money'] = $userInto['money'] - $_POST['money'];
            $downdata['id'] = $_COOKIE["userId"];

            $inxo['username'] = $_POST["transfer_id"];
            // print_r($inxo);
            $userinxo = M('user')->where($inxo)->find();
            // print_r($userInfo['money']);
            $updata['money'] = $userInfo['money'] + $_POST['money'];
            $updata['id'] = $userinxo['id'];
             // print_r($updata);
            if(M('user') -> save($updata) && M('user') -> save($downdata)){
                // echo "成功";
                // $rea['state'] = 0;
                $data['type']=2;
                if ($_POST['type']=='代充') {
                    $data['type'] = 0;                    
                }
                if ($_POST['type']=='活动') {
                    $data['type'] = 1;                    
                }
                if ($_POST['type']=='红利') {
                    $data['type'] = 2;                    
                }
                $data['money'] = $_POST['money'];
                $data['userId'] = $_COOKIE['userId'];
                $data['transfer_id'] = $_POST['transfer_id'];
                $data['time'] = time();
                $kata['userId'] = $_COOKIE['userId'];
                $kata['type'] = 2;
                $kata['money'] = $_POST['money'];
                $kata['time'] = time();
                // 写入数据
                    if(M('user_transfer_accounts')->add($data) && M('user_money_log')->add($kata)){
                        R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'转账成功！'));
                        $rea['state'] = 0;
                    } else {
                        $rea['state'] = 1;
                    }

            }else{
                $rea['state'] = 1;
            }
            
        $this->ajaxReturn($rea);
    }
    /**
     * 充取转记录
     * Programmer : manty
     * Date: 06-015  10:10
     */    
    public function record_taking(){        
        //$username = $_COOKIE['username'];
        $OrderM = M('user_money_log');
        if ($_POST['payRecord'] =='充值记录') {
            $where['g_user_money_log.type'] = 1;
        }elseif($_POST['payRecord'] =='取款记录'){
            $where['g_user_money_log.type'] = 2;
        }elseif($_POST['payRecord'] =='转账记录'){
            $where['g_user_money_log.type'] = 3;
        }
        $where['g_user_money_log.userId'] = $_COOKIE['userId'];
        // dump($where);exit;
        $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
        // 分页
        if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
                
        }
        $listnum=$OrderM
            ->where($where)
            ->join('g_user_bank ON g_user_money_log.userId = g_user_bank.uId')
            ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date')
            ->group('date')
            ->select();
        $count = count($listnum);
        $list=$OrderM
            ->where($where)
            ->join('g_user_bank ON g_user_money_log.userId = g_user_bank.uId')
            ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date,g_user_money_log.time,g_user_bank.bank,g_user_bank.name as username,g_user_bank.status as remark,g_user_money_log.money')
            ->group('date')
            ->limit($content,10)
            ->select();
        //$list['username'] = $username;
        $list['count'] = $count;
        $this->ajaxReturn($list);
    }

    /*
     *查询帐户余额及充值账号是否存在
     */
    public function transfer(){       
        $data['username']=$_GET['username'];
        $res=M('user')->where($data)->find();
        if(!$res){
            $return=array('state'=>0);
            exit(json_encode($return));
        }else{
            $user['username']=$_COOKIE['username'];
            $money=M('user')->where($user)->field('money')->find();
            $money['zhuanmoney']=$res['money'];
            $money['state']=1;
            exit(json_encode($money));  
        }

    }
}
?>