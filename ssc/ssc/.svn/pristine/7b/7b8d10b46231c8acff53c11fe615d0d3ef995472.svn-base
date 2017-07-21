<?php
namespace Html\Controller;
use Think\Controller;
class ZbzlController  extends CommonController {
    /**
     * 购彩记录
     */
    public function gcjl() {
        $userId = $_COOKIE['userId'];
        $username = $_COOKIE['username'];
        if ($_POST['lotterKind']) {
            $where['category_id'] = $_POST['lotterKind'];
            $where['play_way_id'] = $_POST['palyingMeth'];
            
        }//个人
        if ($_POST['lotAll'] == "个人") {
                $where['userId'] = $_COOKIE['userId'];
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            }   
        //直属
        if ($_POST['lotAll'] == "直属") {                
            $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
            if ($userInfo['type'] == 0) {
                $list  = array();
                $this->ajaxReturn($list);   
                exit;
            }
            if ($userInfo['type'] == 1) {
               $userId = $_COOKIE['userId'];
               $down_userId_list = return_down_userId($list = array(),$userId);
               $where['userId'] = array('in',$down_userId_list);      
            }
            $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
               
        }   
        //全部
        if ($_POST['lotAll'] == "全部") {
            $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
            $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
            $where['userId'] = array('in',$userId_array);
            $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
        }
        $OrderM=M('bet_record');      
        $list=$OrderM
                ->where($where)
                ->join('g_category ON g_bet_record.category_id=g_category.id')
                ->join('g_play_way ON g_bet_record.play_way_id=g_play_way.id')    
                ->field('FROM_UNIXTIME(time, "%Y%m%d") date ,time,catename,issue,play_way_id,content,money,g_bet_record.status,profitLoss')
                ->group('date')
                ->select();
                foreach ($list as $key => $value) {
                    $list[$key]['username'] = $username;
                }
                   
        $list['count'] = count($list);
            
        $this->ajaxReturn($list);
    }

    public function category_list(){
        //彩种
            $category_list = M('category')->where('pid !=0')->field('id,catename')->select();
             
            $this->ajaxReturn($category_list);
    }
    public function play_way(){ 
        if ($_POST['lotterKind']){
                $map['id']=$_POST['lotterKind'];
                $cidarr=M('category')->field('pid')->find();
                $where['cate_id'] = $cidarr['pid'];

                $where['status'] = 1;

                $play_way_List = M('play_way')->where($where)->field('id,playname')->select();
                // print_r($where);exit;
                // $list['play_way_List'] = $play_way_List;                
        }
        $this->ajaxReturn($play_way_List);
    }
    
    /**
     * 追号记录
     */
    public function zhzl() {
        $userId = $_COOKIE['userId'];
        //$down_userId_list = return_down_userId($list = array(),$userId);
        $username = $_COOKIE['username'];
        //dump($_COOKIE);exit;
        if ($_POST['lotterKind']) {
            $where['category_id'] = $_POST['lotterKind'];
            $where['play_way_id'] = $_POST['palyingMeth'];
            
        }//个人
        if ($_POST['lotAll'] == "个人") {
                $where['userId'] = $_COOKIE['userId'];
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
                // print_r($where);exit;
            }   
            //直属
            if ($_POST['lotAll'] == "直属") {                
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                if ($userInfo['type'] == 0) {
                    // $where['userId'] = array('in',$userInfo['id']);    
                    $list  = array();
                    $this->ajaxReturn($list);   
                    exit;
                }
                if ($userInfo['type'] == 1) {
                   $userId = $_COOKIE['userId'];
                   $down_userId_list = return_down_userId($list = array(),$userId);
                   $where['userId'] = array('in',$down_userId_list);      
                }
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
               /* dump($where);exit;*/
               
            }   
            //全部
            if ($_POST['lotAll'] == "全部") {
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                //print_r($userId_array);exit;
                $where['userId'] = array('in',$userId_array);
                $where['g_bet_record.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            }
        /*dump($where);exit;*/
        $OrderM=M('bet_record');
        if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
            } 
        $listnum=$OrderM
                ->where($where)                
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date')
                ->group('date')
                ->select();
        $count = count($listnum);
        $list=$OrderM
                ->where($where)
                ->join('g_category ON g_bet_record.category_id=g_category.id')
                ->join('g_play_way ON g_bet_record.play_way_id=g_play_way.id')                 
                ->field('FROM_UNIXTIME(g_bet_record.time, "%Y%m%d") date ,g_bet_record.time,catename,issue,playname,g_bet_record.content,g_bet_record.money,g_bet_record.if_stop_chase,g_bet_record.status ,g_bet_record.profitLoss')
                ->group('date')
                ->order('time')
                ->limit($content,10)
                ->select();

                foreach ($list as $key => $value) {
                    $list[$key]['username'] = $username;
                    $list[$key]['firsissue'] = $list[0]['issue'];
                }
        //dump($list);exit;
        $list['count'] = $count;
        $this->ajaxReturn($list);
        
    }
    /**
     * 账变记录
     */
    public function zbzl() {
        $userId = $_COOKIE['userId'];
        $username = $_COOKIE['username'];
        $OrderM=M('user_money_log');
        //dump($_COOKIE);exit;
        if ($_POST['perOrTeam'] == 1) {
                $where['userId'] = $_COOKIE['userId'];
                $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
                // print_r($where);exit;
            }
            //直属
            if ($_POST['perOrTeam'] == 2) {
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                $down_userId_list = return_down_userId($list = array(),$userInfo);
                //print_r($userId_array);exit;
                $where['userId'] = array('in',$down_userId_list);
                $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
               
            }   
            //全部
            if (!$_POST['perOrTeam'] == 3) {
                $userInfo = M('user')->where('id ='.$_COOKIE['userId'])->find();
                $userId_array = return_userIds($userInfo['distributor_id'],array(),$userInfo['id'],$userInfo['type']);
                //print_r($userId_array);exit;
                $where['userId'] = array('in',$userId_array);
                $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
            }
        if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
        }
        $listnum=$OrderM
                ->where($where)                
                ->field('FROM_UNIXTIME(time, "%Y%m%d") date')
                ->group('date')
                ->select();
        
        $count = count($listnum);
        //dump($count);exit;    
        $list=$OrderM
                ->where($where)
                ->join('g_category ON g_user_money_log.category_id=g_category.id')               
                ->field('FROM_UNIXTIME(time, "%Y%m%d") date,time,type,money,catename as category_id,remark')
                ->group('date')
                ->limit($content,10)
                ->select();
                foreach ($list as $key => $value) {
                    $list[$key]['username'] = $username;
                }
                
        //dump($list);exit;
        $list['count'] = $count;
        $this->ajaxReturn($list);
    }
    /**
     * 代理记录
     */
    public function dljl() {
        
        $username = $_COOKIE['username'];
        //dump($_COOKIE);exit;
        $OrderM=M('user');
        $where['id'] = $_COOKIE['userId'];
        $where['time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
        if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
        }
        $listnum=$OrderM
                ->where($where)              
                ->field('FROM_UNIXTIME(registertime, "%Y%m%d") date')
                ->group('date')
                ->select();
        $count = count($listnum);
        $list=$OrderM
                ->where($where)              
                ->field('FROM_UNIXTIME(registertime, "%Y%m%d") date,type,addtime,money,registertime,status')
                ->group('date')
                ->limit($content,10)
                ->select();
                
                
        //dump($list);exit;
        $list['count'] = $count;
        $this->ajaxReturn($list);
    }
    /**
     * 充值转记录
     */
    public function czzj() {        
        $username = $_COOKIE['username'];
        /*dump($userId);exit;*/
        $OrderM = M('user_money_log');
        
        
        if ($_POST['payRecord'] =='充值记录') {
            $where['g_user_money_log.type'] = 1;
        }elseif($_POST['payRecord'] =='取款记录'){
            $where['g_user_money_log.type'] = 2;
        }elseif($_POST['payRecord'] =='转账记录'){
            $where['g_user_money_log.type'] = 3;
        }
        $where['g_user_money_log.userId'] = $_COOKIE['userId'];
        $where['g_user_money_log.time'] = array(array('EGT',$_POST['dateMin']),array('ELT',$_POST['dateMax']),'and');
        //分页的时候
        if ($_POST['page']) {
                $content = ($_POST['page'] - 1)*10;
                
        }
        //print_r($where);
        // print_r($online);exit
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
        //print_r($OrderM->getLastSql());exit;
          
        // foreach ($list as $key => $value) {
        //     $list[$key]['username']=$username;
        // }  
        //dump($list);exit; 
        $list['count'] = $count;
        $this->ajaxReturn($list);

    
    }
    
}
?>
