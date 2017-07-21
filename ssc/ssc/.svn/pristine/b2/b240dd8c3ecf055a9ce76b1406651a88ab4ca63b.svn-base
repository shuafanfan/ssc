<?php 
namespace Html\Controller;
use Think\Controller;
use Think\Verify;
class IndexpublicController extends CommonController {
    
    /**
     * 彩票报表
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function lottery(){            
            $username=$_COOKIE['username'];  
            $OrderM=M('bet_record');
            $OrderU=M('user_money_log');          
            //个人
            if ($_POST['perOrTeam'] == 1) {
                $where['g_bet_record.userId'] = $_COOKIE['userId'];
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
                // print_r($where);exit;
            }
            //团队
            if ($_POST['perOrTeam'] == 2) {
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                //print_r($userId_array);exit;
                $where['g_bet_record.userId'] = array('in',$userId_array);
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
               
            }   
            //第一次加载
            if (!$_POST['perOrTeam']) {
                $list = array();
            } 
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            $listnum=$OrderM
                ->where($where)
                ->join('g_user ON g_bet_record.userId=g_user.id')
                ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ')
                ->group('date')                
                ->select();
            $count = count($listnum);
            $list=$OrderM
                ->where($where)
                ->join('g_user ON g_bet_record.userId=g_user.id')
                ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,count(nums) Num , sum(g_bet_record.money) betMoney , sum(g_bet_record.winning_money) Win_money , sum(g_bet_record.profitLoss) Pro_money,g_user.username')
                ->group('date')
                ->limit($content,10)
                ->select();
                foreach ($list as $key => $value) {             
                    // 团队赚水
                    $where['g_user_money_log.type'] = 8;
                    $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                    $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                    $where['g_user_money_log.userId']=array('in',$userId_array);
                    $teamwater_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as teamwater_money')
                        ->group('date')
                        ->select();
                    if(!$teamwater_money){
                        $list[$key]['teamwater_money']= 0;
                    }else{
                        $list[$key]['teamwater_money']=$teamwater_money[$key]['teamwater_money'];
                    }
                    // 流水
                    $where['g_user_money_log.type']=4;
                    $active_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as runningwater_money')
                        ->group('date')
                        ->select();
                    if(!$active_money){
                        $list[$key]['runningwater_money']= 0;
                    }else{
                        $list[$key]['runningwater_money']=$active_money[$key]['runningwater_money'];
                    }
                    //活动                    
                    $where['g_user_money_log.type']=9;
                    $active_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as active_money')
                        ->group('date')
                        ->select();
                    if(!$active_money){
                        $list[$key]['active_money']= 0;
                    }else{
                        $list[$key]['active_money']=$active_money[$key]['active_money'];
                    }
                    /*返水*/
                    $where['g_user_money_log.type']=8;
                    $backwater_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as backwater_money')
                        ->group('date')
                        ->select();
                    if(!$backwater_money){
                        $list[$key]['backwater_money']= 0;                    
                    }else{
                        $list[$key]['backwater_money']=$backwater_money[$key]['backwater_money'];
                    }
                    
                    
                }
                // print_r($list);exit;
            $list['count'] = $count;
            $this->ajaxReturn($list);
            /* dump($list);exit;*/



    }
    /**
     * 个人报表
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function personal(){
                        
            $username=$_COOKIE['username'];
            $OrderU=M('user_money_log');
            // print_r($_COOKIE);exit;
            $where['g_user_money_log.userId'] = $_COOKIE['userId'];
            $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            //print_r($where);exit;
            /*表1
            时间  订单数  派奖  投注量 
            type (1、充值 2、提现 3、转账 4、下注5、派奖6、亏损分红7、充值分红8、返水9、活动10、流水分红)
            表2*/
            //$where['g_user_money_log.type'] = array('in',array(1,2,4,5,8,9));
            
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
                
            }
            
            // $where['g_user_money_log.type'] = array('in',array(1,2,4,5,8,9));
            $listnum=$OrderU
                ->where($where)
                ->join('g_bet_record ON g_user_money_log.userId=g_bet_record.userId')
                ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ')                
                ->group('date')                
                ->select();
            
            $count = count($listnum);
            //$where['g_user_money_log.type'] = array('in',array(1,2,4,5,8,9));
            $list=$OrderU
                ->where($where)
                ->join('g_bet_record ON g_user_money_log.userId=g_bet_record.userId')
                ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,count(g_bet_record.nums) as Num,sum(g_bet_record.profitLoss) as profitLoss,sum(g_bet_record.winning_money) as Win_money')                
                ->group('date')
                ->limit($content,10)
                ->select();            
            foreach ($list as $key => $value) {
                // 团队赚水
                $where['type'] = 8;
                    $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                    $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                    $where['g_user_money_log.userId']=array('in',$userId_array);
                    $teamwater_money=$OrderU
                        ->where($where)                        
                        ->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as teamwater_money')
                        ->group('date')
                        ->select();
                    if(!$teamwater_money){
                        $list[$key]['teamwater_money']= 0;
                    }else{
                        $list[$key]['teamwater_money']=$teamwater_money[$key]['teamwater_money'];
                    }
                /*充值*/
                $where['type']=1;
                $Recharge_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as Recharge_money')->group('date')->select();
                if(!$Recharge_money){
                    $list[$key]['Recharge_money']= 0;
                }else{          
                    $list[$key]['Recharge_money']=$Recharge_money[$key]['Recharge_money'];
                    
                }
                /*提现*/
                $where['type']=2;
                //print_r($where);exit;
                $Withdrawals_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as Withdrawals_money')->group('date')->select();
                if(!$withdrawing_money){
                    $list[$key]['Withdrawals_money']= 0;
                }else{
                    $list[$key]['Withdrawals_money']=$Withdrawals_money[$key]['Withdrawals_money'];
                }
                /*返水*/
                $where['type']=8;
                $backwater_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as backwater_money')->group('date')->select();
                if(!$backwater_money){
                    $list[$key]['backwater_money']= 0;                    
                }else{
                    $list[$key]['backwater_money']=$backwater_money[$key]['backwater_money'];
                }
                /*活动*/
                $where['type']=9;
                $active_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as active_money')->group('date')->select();
                if(!$active_money){
                    $list[$key]['active_money']= 0;
                }else{
                    $list[$key]['active_money']=$active_money[$key]['active_money'];
                }
                // 用户民
                $list[$key]['username']=$username;


            }
            //dump($list);exit;
            $list['count'] = $count;
            $this->ajaxReturn($list);
        



    }
    /**
     * 盈亏报表
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function profitLoss(){
            // $userId=$_COOKIE['userId'];
            $OrderM = M('bet_record');
            $OrderU=M('user_money_log');
            $username=$_COOKIE['username'];
           /* dump($username);exit;*/
            /*if ($_POST['use_name']) {
                $where['username'] = array('like',"%$_POST['use_name']%");
            }*/
            $where['g_bet_record.userId'] = $_COOKIE['userId'];
            if ($_POST['profSele'] == 'winReverse') {
                $sort = 'g_bet_record.winning_money DESC';
                //$where['g_user_money_log.type'] = 5;
            }elseif ($_POST['profSele'] == 'winOrder') {
                $sort = 'g_bet_record.winning_money ASC';
                //$where['g_user_money_log.type'] = 5;
            }elseif ($_POST['profSele'] == 'backReverse') {
                $sort = 'g_bet_record.profitLoss DESC';
            }elseif ($_POST['profSele'] == 'backOrder') {
                $sort = 'g_bet_record.profitLoss ASC';
            }
            $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            //print_r($where);
            /**
            type (1、充值 2、提现 3、转账 4、下注5、派奖6、亏损分红7、充值分红8、返水9、活动10、流水分红)
            表2*/
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            $listnum=$OrderM
                ->where($where)
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ')                
                ->group('date')                
                ->select();
            $count = count($listnum);
            //print_r($where);
            
            $list=$OrderM
                ->where($where)
                ->join('g_user_money_log ON g_bet_record.userId = g_user_money_log.userId')
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,count(g_bet_record.nums) Num,sum(g_bet_record.profitLoss) as profitLoss,sum(g_bet_record.winning_money) as Win_money')
                ->limit($content,10)
                ->group('date')
                ->order($sort)
                ->select();
            //dump($list);exit;
            foreach ($list as $key => $value) {
                // 团队赚水
                $where['g_user_money_log.type'] = 4;
                //print_r($where);exit;
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                $where['g_bet_record.userId']=array('in',$userId_array);
                //print_r($where);exit;
                $teamwater_money=$OrderM
                    ->where($where)
                    ->join('g_user_money_log ON g_bet_record.userId = g_user_money_log.userId')
                    ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,sum(g_user_money_log.money) as teamwater_money')->group('date')->select();
                if(!$teamwater_money){
                    $list[$key]['teamwater_money']= 0;                    
                }else{
                    $list[$key]['teamwater_money']=$teamwater_money[$key]['teamwater_money'];
                }         
                /*返水*/
                $where['g_user_money_log.type']=8;
                $backwater_money=$OrderM
                    ->where($where)
                    ->join('g_user_money_log ON g_bet_record.userId = g_user_money_log.userId')
                    ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,sum(g_user_money_log.money) as backwater_money')->group('date')->select();
                if(!$backwater_money){
                    $list[$key]['backwater_money']= 0;                    
                }else{
                    $list[$key]['backwater_money']=$backwater_money[$key]['backwater_money'];
                }
                /*活动*/
                $where['g_user_money_log.type']=9;
                $active_money=$OrderM
                    ->where($where)
                    ->join('g_user_money_log ON g_bet_record.userId = g_user_money_log.userId')
                    ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,sum(g_user_money_log.money) as active_money')->group('date')->select();
                if(!$active_money){
                    $list[$key]['active_money']= 0;
                }else{
                    $list[$key]['active_money']=$active_money[$key]['active_money'];
                }               
                $list[$key]['username'] = $username;
            }
            
            $list['count'] = $count;
            $this->ajaxReturn($list);      



    }
    /**
     * 平台报表
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function platform(){            
            $OrderU=M('user_money_log');
            $username=$_COOKIE['username'];
            $where['userId'] = $_COOKIE['userId'];
            $where['time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            //print_r($where);exit;
            /**
            type (1、充值 2、提现 3、转账 4、下注5、派奖6、亏损分红7、充值分红8、返水9、活动10、流水分红)
            表2*/
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            $listnum=$OrderU
                ->where($where)
                ->field('FROM_UNIXTIME(time, "%Y%m%d") date')                
                ->group('date')
                ->select();
            $count = count($listnum);
            //print_r($count);exit;
            $list=$OrderU
                ->where($where)
                ->field('FROM_UNIXTIME(time, "%Y%m%d") date ,count(type=1) Recharge_Num,count(type=2) Withdrawals_Num,count(type=9) active_Num')                
                ->group('date')                
                ->limit($content,10)
                ->select();           
            foreach ($list as $key => $value) {
                /*充值*/
                $where['type']=1;
                $Recharge_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as Recharge_money')->group('date')->select();
                if(!$Recharge_money){
                    $list[$key]['Recharge_money']= 0;
                }else{          
                    $list[$key]['Recharge_money']=$Recharge_money[$key]['Recharge_money'];
                    
                }
                /*提现*/
                $where['type']=2;
                $Withdrawals_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as Withdrawals_money')->group('date')->select();
                if(!$withdrawing_money){
                    $list[$key]['Withdrawals_money']= 0;
                }else{
                    $list[$key]['Withdrawals_money']=$Withdrawals_money[$key]['Withdrawals_money'];
                }
                /*活动*/
                $where['type']=9;
                $active_money=$OrderU->where($where)->field('FROM_UNIXTIME(g_user_money_log.time, "%Y%m%d") date ,sum(g_user_money_log.money) as active_money')->group('date')->select();
                if(!$active_money){
                    $list[$key]['active_money']= 0;
                }else{
                    $list[$key]['active_money']=$active_money[$key]['active_money'];
                }

                $list[$key]['username'] = $username; 

            }
            
            $list['count'] = $count;
            $this->ajaxReturn($list);      



    }
    /**
     * 其他报表
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function other(){            
            $username=$_COOKIE['username'];
            /*dump($userId);exit;*/
            $OrderM=M('bet_record');
            $OrderU=M('user_money_log');
            //个人
            if ($_POST['perOrTeam'] == 1) {
                $where['g_bet_record.userId'] = $_COOKIE['userId'];
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
                // print_r($where);exit;
            }
            //团队
            if ($_POST['perOrTeam'] == 2) {
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                //print_r($userId_array);exit;
                $where['g_bet_record.userId'] = array('in',$userId_array);
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
                //print_r($where);exit;
               
            }   
            //第一次加载
            if (!$_POST['perOrTeam']) {
                $list = array();
            } 
            if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            }
            $listnum=$OrderM
                ->field('FROM_UNIXTIME(time, "%Y%m%d") date')
                ->where($where)                
                ->group('date')
                ->select();
            $count = count($listnum);
            $list=$OrderM
                    ->where($where)
                    ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                    ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,count(1) Num ,sum(g_bet_record.winning_money) Win_money,sum(g_bet_record.profitLoss)Pro_money ')                
                    ->limit($content,10)
                    ->group('date')
                    ->select();
                foreach ($list as $key => $value) {
                    $list[$key]['username']=$username;
                    /*活动*/
                    $where['g_user_money_log.type']=9;
                    $active_money=$OrderM
                        ->where($where)
                        ->join('g_user_money_log ON g_bet_record.userId=g_user_money_log.userId')
                        ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,sum(g_bet_record.money) as active_money')
                        ->group('date')
                        ->select();
                    if(!$active_money){
                        $list[$key]['active_money']= 0;
                    }else{
                        $list[$key]['active_money']=$active_money[$key]['active_money'];
                    }

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
            //dump($this->ajaxReturn($list));exit;
            $list['count'] = $count;
            $this->ajaxReturn($list);
           /* dump($list);exit;*/



    }
}

?>