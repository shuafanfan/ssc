<?php
namespace Html\Controller;
use Think\Controller;
class TdglController  extends CommonController {
    /*团队总数*/
    /*public function test(){
            $userList = M('user')->field('id,distributor_id,username')->select();
            dump($userList);exit;
            $userid=getList($userList,$_COOKIE['userId']);
            dump($userid);exit;
            $map['userId']=array('in',$userid);
            $map['type']=4;
            取出当前用户的信息
            $c=M('user_money_log')->where($map)->sum('moeny');

            $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();*/
    public function test() {
//        print_r($_COOKIE);
        $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
        //普通会员
        if($userInfo['type'] == 0){
            //没有上级
            if($userInfo['distributor_id'] == 0){
                $team_num = 1;
                $team_money = $userInfo['money'];
            }
            //有上级
            if($userInfo['distributor_id'] != 0){
                $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                $team_num = count($userId_array);
                $where['id'] = array('in',$userId_array);
                $team_money = M('user')->where($where)->sum('g_user.money');
            }

        }
        //代理会员
        if($userInfo['type'] == 1){
            $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
            $team_num = count($userId_array);
            $where['id'] = array('in',$userId_array);
            $team_money = M('user')->where($where)->sum('g_user.money');
        }
        $list = array('team_num'=>$team_num,'team_money'=>$team_money);
        return $list;
    }
    




    /**
     * 团队统计
     */
    public function tdtj() {
        $id=$_COOKIE['userId'];
        
        //dump($id);exit;
        $username=$_COOKIE['username'];
            /*dump($userId);exit;*/
            $OrderM=M('user');
            $OrderU=M('user_money_log');
            $OrderB=M('bet_record');        
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            $start = mktime(0,0,0,$month,$day,$year);//当天开始时间戳
            $end= mktime(23,59,59,$month,$day,$year);//当天结束时间戳
            //dump($nowstrtotime);exit;
            //团队统计
            $team_num_and_sumMoney = $this->test();  //返回团队人数 、团队余额
            //今日充值、取款、今日注册
            $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
            $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
            //dump($userId_array);exit ;        
            $where['g_user_money_log.userId'] = array('in',$userId_array);
            //dump($where);exit;           
            $where['g_user_money_log.time'] = array(array('EGT',$start),array('ELT',$end),'and');
            //充值
            $where['g_user_money_log.type'] = 1;
            $todayCZ = $OrderU->where($where)->sum('money');
            //取款
            $where['g_user_money_log.type'] = 2;
            $todayQK = $OrderU->where($where)->sum('money');
            //今日注册
            $data['g_user.id'] = array('in',$userId_array);
            //dump($data);exit;
            $data['g_user.registertime'] = array(array('EGT',$start),array('ELT',$end),'and');
            $toadayZCL = $OrderM
                    ->join('g_user_open_account_center ON g_user.id=g_user_open_account_center.userId')
                    ->where($data)
                    ->sum('registerNum');
            //在线人数
            $online= include './online.php';

            // 判断天数
            $begintime = $_POST['dateMin'];
            $endtime = $_POST['dateMax'];
            $strtotime = $endtime-$begintime+1;
            $time = $strtotime/86400;
            //dump($userId_array);exit;
            $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
            $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
            $a['g_bet_record.userId'] = array('in',$userId_array);
            //dump($userId_array);
            //$userId['userId'] = array('in',$userId_array);
            //dump($userId_array);
            //dump($data);
            //dump($a);
            $list=$OrderB
            ->field('FROM_UNIXTIME(time, "%Y%m%d") date ,sum(money) as num_money, sum(profitLoss) betMoney ')
            ->where($a)
            ->group('date')
            ->order('date DESC')
            ->limit($time)
            ->select();
                    foreach ($list as $key => $value) {                     
                        
                        //dump($a);exit;
                        $list[$key]['username']=$username;
                        /*返点*/
                        $a['g_user_money_log.type']=8;
                        $backwater_money=$OrderB
                            ->where($a)
                            ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                            ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as backwater_money')
                            ->group('date')
                            ->order('date DESC')
                            ->limit($time)
                            ->select();
                        if(!$backwater_money){
                            $list[$key]['backwater_money']= 0;                    
                        }else{
                            $list[$key]['backwater_money']=$backwater_money[$key]['backwater_money'];
                        }
                        //活动                    
                        $a['g_user_money_log.type']=9;
                        $active_money=$OrderB
                            ->where($a)
                            ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                            ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as active_money')
                            ->group('date')
                            ->order('date DESC')
                            ->limit($time)
                            ->select();
                        if(!$active_money){
                            $list[$key]['active_money']= 0;
                        }else{
                            $list[$key]['active_money']=$active_money[$key]['active_money'];
                        }
                        // /*投注量*/
                        // $map['type']=4;
                        // $num_money=$OrderU->where($map)->sum('money');
                        // if(!$num_money){
                        //     $list[$key]['num_money']= 0;                    
                        // }else{
                        //     $list[$key]['num_money']=$num_money;
                        // }
                    } 
                    // //$list[$key]['Register_today'] = $i;
                    // $list[$key]['team_num'] =  $team_num;
                    // $list[$key]['team_money'] = $team_money;
                    
                    $list['up']['team_num'] = $team_num_and_sumMoney['team_num'];
                    $list['up']['team_money'] = $team_num_and_sumMoney['team_money'];
                    if (!$todayCZ) {
                        $list['up']['todayCZ'] = $todayCZ;
                    }else{
                        $list['up']['todayCZ'] = 0;
                    }

                    $list['up']['toadayQK'] = $toadayQK;
                    $list['up']['toadayZCL'] = $toadayZCL;
                    $list['up']['online'] = $online['num'];
        //dump($list);
       // print_r($list);exit;
        //$list['count'] = count($list);
        $this->ajaxReturn($list);
    }
    
    /**
     * 开户中心
     */
    public function khzx() {
        //if($_POST['btn']){
            $M=M('user_open_account_center');
            $list = $M->select();
            //dump($list);exit;
            $this->ajaxReturn($list);

        //}
       
        
    }
    /**
     * 配额管理
     */
    public function pegl() {
                   
            /*dump($userId);exit;*/
            $username=$_COOKIE['username'];
            $OrderM=M('bet_record');
            $OrderU=M('user_money_log');
            $where['g_bet_record.userid'] = $_COOKIE['userId'];
            $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }            
            $listnum=$OrderM
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date')
                ->where($where)
                ->group('date')
                ->select();
            $count = count($listnum);
            $list=$OrderM
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,g_bet_record.money')
                ->where($where)
                ->group('date')
                ->limit($content,10)
                ->select();
                foreach ($list as $key => $value) {
                    $list[$key]['username']=$username;
                    /*返水*/
                    $where['g_user_money_log.type']=8;
                    $active_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,sum(g_bet_record.money) as backwater_money')
                        ->group('date')
                        ->select();
                    if(!$backwater_money){
                        $list[$key]['backwater_money']= 0;                    
                    }else{
                        $list[$key]['backwater_money']=$backwater_money[$key]['backwater_money'];
                    }
                }
                
            //dump($list);exit;
            $list['count'] = $count;
            $this->ajaxReturn($list);
           /* dump($list);exit;*/
    }
    /**
     * 调点记录
     */
    /*public function ddjl() {
        $userId=$_COOKIE['userId'];            
            
            $username=$_COOKIE['username'];
            $OrderM=M('bet_record');
            $OrderU=M('user_money_log');


            $list=$OrderM->field('FROM_UNIXTIME(time, "%Y%m%d") date ,time,category_id,mode,money')->
                where('userid='.$userId)->group('date')->select();
                foreach ($list as $key => $value) {
                    $list[$key]['username']=$username;
                    返水
                    $map['type']=8;
                    $map['userId']=$userId;
                    $backwater_money=$OrderU->where($map)->sum('money');
                    if(!$backwater_money){
                        $list[$key]['backwater_money']= 0;                    
                    }else{
                        $list[$key]['backwater_money']=$backwater_money;
                    }
                }
                
            
            $this->ajaxReturn($list);
           
    }*/





    /**
     * 下级管理
     */
    public function xjgl() {

            $where['g_user.id']=$_POST['userId'];
            //获取下级所有用户的id
            $next_userId_list = return_next_userId($list = array(),$_COOKIE['userId']);
            //获取直属下级用户的id
            $down_userId_list = return_down_userId($list = array(),$_COOKIE['userId']);
            //print_r($down_userId_list);
            if ($_POST['use_name']) {
                $where['g_user.username'] = $_POST['use_name'];    
            }
            if ($_POST['balanceMin'] && $_POST['balanceMax']) {
                $where['g_user.money'] = array(array('EGT',$_POST['balanceMin']),array('ELT',$_POST['balanceMax']),'and');
            }
            if ($_POST['rebatesMin'] && $_POST['rebatesMax']) {
                $where['g_user.top_rebate'] = array(array('EGT',$_POST['rebatesMin']),array('ELT',$_POST['rebatesMax']),'and');
            }
            if ($_POST['useType'] == '全部') {

            }
            if ($_POST['useType'] == '代理') {
                $where['g_user.type'] = 1;
                    
            } 
            if ($_POST['useType'] == '会员') {
                $where['g_user.type'] = 0;   
            }
            if ($_POST['online'] == '全部') {

            }
            if ($_POST['online'] == '在线') {
                    $online= include './online.php';
                    $online_userIds = $online['userIds'];//在线人数userIds
                    //$where['id'] = array('in',$online_userIds);
            } 
            if ($_POST['online'] == '离线') {
                    $userInfo = M('user')->where('g_user.id ='.$_COOKIE['userId'])->find();
                    $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                    //$a = array('id',$userId_array);
                    print_r($userId_array);
                    $online= include './online.php';
                    $online_userIds = $online['userIds'];//在线人数userIds
                    //$b = array('id',$online_userIds);                    
                    print_r($online_userIds);
                    $Off_line = array();
                    foreach ($userId_array as $value) {
                        if (!in_array($value,$online_userIds)) {
                            $Off_line[]=$value;
                        }
                    }
                    print_r($Off_line);exit;
                    //$where['id'] = array('in',$intersection);
            }
            if ($_POST['junior'] == '直属下级') {
                $userInfo = M('user')->where('g_user.id='.$_COOKIE['userId'])->find();
                //print_r($userInfo);
                if ($userInfo['g_user.type'] == 0) {
                    // $where['userId'] = array('in',$userInfo['id']);    
                    $list  = array();
                    $this->ajaxReturn($list);   
                    exit;
                }
                if ($userInfo['g_user.type'] == 1) {
                   $down_userId_list = return_down_userId($list = array(),$userInfo['id']);
                   //print_r($down_userId_list);exit;
                   $where['g_user.id'] = array('in',$down_userId_list);      
                }
            }
            if ($_POST['junior'] == '全部下级') {
                $userInfo = M('user')->where('g_user.id ='.$_COOKIE['userId'])->find();
                $userId_array = return_next_userId($list = array(),$userInfo['id']);
                //print_r($userId_array);exit;
                $where['g_user.id'] = array('in',$userId_array);
            }
            if ($_POST['AccordType'] == '注册时间') {
                $sort = 'g_user.registertime'; 
            }
            if ($_POST['AccordType'] == '用户名') {
                $sort = 'g_user.username';
            }
            if ($_POST['AccordType'] == '余额') {
                $sort = 'g_user.money';
            }
            if ($_POST['AccordSequence'] == '倒序') {
                $reorder = 'DESC'; 
            }
            if ($_POST['AccordSequence'] == '升序') {
                $reorder = 'ASC';
            }
            if ($_POST['junior'] == '直属下级' && $_POST['online'] == '在线') {
                    $id_add=array();
                    foreach ($down_userId_list as $v) {
                        if(in_array($v, $online_userIds)){
                            $id_add[] = $v;
                        }
                    }
                    if (!empty($id_add)) {
                        $where['g_user.id'] = array('in',$id_add);                    
                    }                    
                    
            }if ($_POST['junior'] == '直属下级' && $_POST['online'] == '离线') {
                    $id_add=array();
                    foreach ($down_userId_list as $v) {
                        if(in_array($v, $offOnline)){
                            $id_add[] = $v;
                        }
                    }
                    if (!empty($id_add)) {
                        $where['g_user.id'] = array('in',$id_add);                    
                    } 
            }if ($_POST['junior'] == '全部下级' && $_POST['online'] == '在线') {
                    $id_add=array();
                    foreach ($userId_array as $v) {
                        if(in_array($v, $online_userIds)){
                            $id_add[] = $v;
                        }
                    }
                    if (!empty($id_add)) {
                        $where['g_user.id'] = array('in',$id_add);                    
                    } 
            }if ($_POST['junior'] == '全部下级' && $_POST['online'] == '离线') {
                    $id_add=array();
                    foreach ($userId_array as $v) {
                        if(in_array($v, $offOnline)){
                            $id_add[] = $v;
                        }
                    }
                    if (!empty($id_add)) {
                        $where['g_user.id'] = array('in',$id_add);                    
                    } 
            }
            $username=$_COOKIE['username'];
            $OrderM=M('user');           
            $OrderU=M('user_money_log');
            
            //print_r($where);exit;
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            $listnum=$OrderM
                ->field('g_user.username')
                ->where($where)
                ->select();
            $count = count($listnum);    
            $list=$OrderM
                ->field('g_user.username,g_user.remark,g_user.money,g_user.top_rebate,g_user.status,g_user.registertime,g_user.register_ip')
                ->where($where)
                ->order($sort.' '.$reorder)
                ->limit($content,10)
                ->select();
                foreach ($list as $key => $value) { 
                    $list[$key]['username']=$username;
                    /*返水*/
                    $where['g_user_money_log.type']=8;
                    $active_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_user.id=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as backwater_money')
                        ->group('date')
                        ->select();
                    if(!$backwater_money){
                        $list[$key]['backwater_money']= 0;                    
                    }else{
                        $list[$key]['backwater_money']=$backwater_money[$key]['backwater_money'];
                    }
                }
                
            //dump($list);exit;
            /*dump($this->ajaxReturn($list));exit;*/
            $list['count'] = $count;
            $this->ajaxReturn($list);
           /* dump($list);exit;*/
    }
    /**
     * 下级充值
     */
    public function xjcz() {
            $username=$_COOKIE['username'];           
            $OrderU=M('user_money_log');
            $next_userId_list = return_next_userId($list = array(),$_COOKIE['userId']);
            $where['g_user_money_log.userId'] = array('in',$next_userId_list);
            //dump($where);exit;
            $where['g_user_money_log.type'] = 1;
            $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            //print_r($where);
            $listnum=$OrderU
                 ->where($where)
                 ->join('g_user_bank ON g_user_money_log.userId = g_user_bank.uId')
                 ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date')                 
                 ->group('date')
                 ->select();
            $count = count($listnum); 
            $list=$OrderU
                 ->where($where)
                 ->join('g_user_bank ON g_user_money_log.userId = g_user_bank.uId')
                 ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date,g_user_money_log.time,g_user_bank.bank,g_user_bank.name as username,g_user_bank.status as remark,g_user_money_log.money')                 
                 ->group('date')
                 ->limit($content,10)
                 ->select();
                foreach ($list as $key => $value) {
                    $list[$key]['username']=$username;
                    
                }
                
            //dump($list);exit;
            /*dump($this->ajaxReturn($list));exit;*/
            $list['count'] = $count;
            $this->ajaxReturn($list);
           /* dump($list);exit;*/
    }

    /**
     * 下级取款
     */
    public function xjqk() {
            $username=$_COOKIE['username'];
            $next_userId_list = return_next_userId($list = array(),$_COOKIE['userId']);
            $where['g_user_money_log.userId'] = array('in',$next_userId_list);
            $OrderM=M('bet_record');
            $OrderU=M('user_money_log');
            $where['g_user_money_log.type'] = 2;
            $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            $listnum=$OrderU
                ->where($where)
                ->join('g_user_bank ON g_user_money_log.userId = g_user_bank.uId')
                ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date')             
                ->group('date')
                ->select();
            $count = count($listnum);
            $list=$OrderU
                ->where($where)
                ->join('g_user_bank ON g_user_money_log.userId = g_user_bank.uId')
                ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date,g_user_money_log.time,g_user_bank.bank,g_user_bank.name as username,g_user_bank.status as remark,g_user_money_log.money')             
                ->group('date')
                ->limit($content,10)
                ->select();
                // foreach ($list as $key => $value) {
                //     $list[$key]['username']=$username;
                    
                // }
            $list['count'] = $count;
            $this->ajaxReturn($list);
           /* dump($list);exit;*/
    }
}
?>
