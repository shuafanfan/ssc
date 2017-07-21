<?php 
namespace Home\Controller;
use Think\Controller;
class distributorController extends CommonController {
    
    /**
     * 经销商列表
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function distributorList(){
        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $distributorModel = D('Home/User');
        $distributorList = $distributorModel->get_distributorList();
        $this->assign('threeMenuInfo', $threeMenu);
        $this->assign('distributor_list', $distributorList);
        $this->display();
    }
    
    /**
     * 经销商会员列表
     * Programmer : manty
     * Date: 01-07  13:56
     */
    public function distributorUser(){
        $UserModel = D('Home/User');
        $distributorID = I('get.ID');
        $distributorUsers = $UserModel->get_distributorUser($distributorID);
        
        $this->assign('user_list', $distributorUsers);
        $this->display();
    }
    
    /**
     * 代理佣金配置列表
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function brokerage_list(){
        $brokerage_list = M('brokerage')->select();
//        print_r($brokerage_list);exit;
        $this->assign('brokerage_list', $brokerage_list);
        $this->display();
    }
    /**
     * 关闭、代理佣金配置功能
     */
    public function close_brokerage() {
        $data['id'] = $_POST['ID'];
        $data['status'] = 1;
        if(M('brokerage')->save($data)){
            $return = array('state' => true);
        }  else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 开启、代理佣金配置功能
     */
    public function open_brokerage() {
        $data['id'] = $_POST['ID'];
        $data['status'] = 0;
        if(M('brokerage')->save($data)){
            $return = array('state' => true);
        }  else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 代理佣金配置
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function brokerage_config(){
        $ConfigModel = D('Home/webconfig');
        $brokerage_id = I('get.ID');
        $brokerage_config = json_decode($ConfigModel->get_brokerage_config($brokerage_id));
        $brokerage_config_value = $ConfigModel->get_brokerage_config_value($brokerage_id);
        
        foreach ($brokerage_config_value as $key=>$value){
            $brokerage_config_value[$key]['config_value'] = json_decode($brokerage_config_value[$key]['config_value']);
        }
        $data = I('post.');
        if (!empty($data)){
            foreach ($data as $key=>$value){
                $row[$key]['config_value'] = json_encode($data[$key]['config_value']);
                $row[$key]['id'] = $data[$key]['id'];
            }
            foreach ($row as $key=>$value){
                $ConfigModel->brokerage_config_value_edit($row[$key]['id'],$row[$key]['config_value']);
            }
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'代理佣金配置'));
            $this->success('修改成功!');
        }
        
        $this->assign('brokerage_id', $brokerage_id);
        $this->assign('brokerage_config_value', $brokerage_config_value);
        $this->assign('brokerage_config', $brokerage_config);
        $this->display();
    }
    
    /**
     * 代理佣金配置项添加
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function brokerage_config_add(){
        $ConfigModel = D('Home/webconfig');
        $brokerage_id = I('get.ID');
        $brokerage_config = json_decode($ConfigModel->get_brokerage_config($brokerage_id));
        $data = I('post.');
        if (!empty($data)){
            $data['config_value'] = json_encode($data['config_value']);
            if ($ConfigModel->brokerage_config_value_add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'代理佣金配置项添加'));
                $this->success('添加成功!', U('Home/distributor/brokerage_config/ID/'.$brokerage_id));
            }else {
                $this->error('添加失败!');
            }
        }
        $this->assign('brokerage_id', $brokerage_id);
        $this->assign('brokerage_config', $brokerage_config);
        $this->display();
    }
    
    /**
     * 代理佣金配置项删除
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function brokerage_config_del(){
        $id = I('post.id');
        if (M('brokerage_config')->delete($id)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'代理佣金配置项删除'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 经销商添加
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function distributorAdd(){
        $distributorModel = D('Home/User');
        $data = I('post.');
        if (!empty($data)){
            $is_user = $distributorModel->is_user_exist($data['username']);
            if (empty($is_user)){
               $images = empty($_FILES['weblogo']) ? '' : $_FILES['weblogo'];
               if ($distributorModel->distributorAdd($data,$images)){
                   R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'经销商添加'));
                  $this->success('添加经销商成功!', U('Home/distributor/distributorList'));
               }else{
                   $this->error("添加经销商失败!");
               }
            }else{
                $this->error('用户名已存在!');
            }
        }
        $this->display();
    }
    
    /**
     * 经销商编辑
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function distributorEdit(){
        $distributorModel = D('Home/User');
        $id = I('get.ID');
        $distributor = $distributorModel->get_user($id);
        $data = I('post.');
        if (!empty($data)){
            if ($distributorModel->userEdit($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'编辑经销商成功'));
                $this->success('编辑经销商成功!', U('Home/distributor/distributorList'));
            }else{
                $this->error("编辑经销商失败!");
            }
        }
        $this->assign('detail', $distributor);
        $this->display('distributorAdd');
    }
    
    /**
     * 代理数据统计
     * Programmer : manty
     * Date: 01-07  09:09
     */
    public function distributorCount(){
        $M=M('user');
        /*取下线会员数*/
        $where['distributor_id']=$_GET['ID'];
        $userCount=$M->where($where)->field('id')->count();

        $userid=$M->where($where)->field('id')->select();
       /* dump($userid);*/
        /*构造in查询参数*/
        $useridArr = Array();
        foreach ($userid as $key => $value) {
            foreach ($userid[$key] as $keys => $value) {
                $useridArr[]=$value;
            }
        }
        $map['userid']=array('in',$useridArr);
        /*查询帐变记录表*/

        /*充值情况*/
        $map['type']=1;//充值为1
        $RechargeCount=M('user_money_log')->where($map)->sum("money");
        if (!$RechargeCount) {
            $RechargeCount="0";
        }
        /*提现统计*/
        $map['type']=2;//提现为2
        $WithdrawalsCount=M('user_money_log')->where($map)->sum("money");
        if (!$WithdrawalsCount) {
            $WithdrawalsCount="0";
        }
        /*用户盈亏查询*/
        $datamap['userid']=array('in',$useridArr);
        $ProfitLossCount=M('bet_record')->where($map)->sum("profitLoss");

        /*采种查询*/
           /* $count = $M->where($map)->count();
            $Page = getpage($count,20);
            $show = $Page->show();
            $lottery=M('category')->where("status=1")->field('id,catename,pid')->limit($Page->firstRow.','.$Page->listRows)->select();*/

            $lottery=M('category')->where("status=1")->field('id,catename,pid')->order('id')->select();
            $lotterylist=findChild($lottery);
        foreach ($lotterylist as $key => $value) {
            $lotteryMap['category_id']= $lotterylist[$key]['id'];
            $lotteryMap['userId']= array('in',$useridArr);
            /*下注量*/
                $orderSum=M("bet_record")->where($lotteryMap)->sum("nums");
                    if (!$orderSum) {
                        $lotterylist[$key]["orderSum"]="- -";
                    } else {
                       $lotterylist[$key]["orderSum"]=$orderSum;
                    }

            /*派奖金额*/
                $orderWinSum=M("bet_record")->where($lotteryMap)->sum("winning_money");
                    if (!$orderWinSum) {
                      $lotterylist[$key]["orderWinSum"]="- -";
                    } else {
                       $lotterylist[$key]["orderWinSum"]=$orderWinSum;
                    }
            /*投注金额*/
                $orderMoneySum=M("bet_record")->where($lotteryMap)->sum("money");
                    if (!$orderMoneySum) {
                           $lotterylist[$key]["orderMoneySum"]="- -";
                        } else {
                           $lotterylist[$key]["orderMoneySum"]=$orderMoneySum;
                        }
            /*盈亏金额*/
                $orderProSum=M("bet_record")->where($lotteryMap)->sum("profitLoss");
                    if (!$orderProSum) {
                       $lotterylist[$key]["orderProSum"]="- -";
                    } else {
                       $lotterylist[$key]["orderProSum"]=$orderProSum;
                    }

        }

        $this->assign("userCount",$userCount);
        $this->assign("RechargeCount",$RechargeCount);
        $this->assign("WithdrawalsCount",$WithdrawalsCount);
        $this->assign("ProfitLossCount",$ProfitLossCount);
        $this->assign("lotterylist",$lotterylist);
        $this->display();
    }

    /*分红计算*/
    public function distributorBonus(){
            $map['userid']=$_GET['ID'];
            $map['type']=10;
             /*dump($map);*/
            $D_B_time=M("bonus_log")->where($map)->max('time');
            $map['type']=7;
            $C_B_time=M("bonus_log")->where($map)->max('time');
//            print_r(M("bonus_log")->getLastSql());exit;
            $map['type']=6;
            $K_B_time=M("bonus_log")->where($map)->max('time');
            
/*            dump($C_B_time);
            dump($D_B_time);
            dump($K_B_time);*/
        $M=M('user');
        /*取下线会员*/
        $where['distributor_id']=$_GET['ID'];
        $userid=$M->where($where)->field('id')->select();
        $useridArr = Array();
        foreach ($userid as $key => $value) {
            foreach ($userid[$key] as $keys => $value) {
                $useridArr[]=$value;
            }
        }
        $map['userid']=array('in',$useridArr);
        /*充值情况*/
        $map['type']=1;//充值为1
        $map['time']=array('gt',$C_B_time);
        $RechargeCount=M('user_money_log')->where($map)->sum("money");
//        print_r(M('user_money_log')->getLastSql());exit;
        if (!$RechargeCount) {
            $RechargeCount= 0;
        }
//        print_r($RechargeCount);
        /*计算充值返佣*/
         
        $Recharge_rateList=M('brokerage_config')->where('brokerage_id=1')->select();
//        print_r($Recharge_rateList);exit;
        foreach ($Recharge_rateList as $key => $value) {
            $Recharge_rate[]=json_decode($Recharge_rateList[$key]['config_value']);
        }
        //dump($Recharge_rate);exit;
        foreach ($Recharge_rate as $ke => $va) {
                $min_arr[]=$Recharge_rate[$ke][0];
                /*将最小值存入数组*/
                $max_arr[]=$Recharge_rate[$ke][1];
                 /*将最大值存入数组*/
                $a_arr[]=$Recharge_rate[$ke][2];
                 /*将返佣比例值存入数组*/
                
                if($RechargeCount > $va[0] && $RechargeCount <= $va[1] ){
                    $C_B_P = $va[2];
                }
            } 
        $min_key = array_search(min($min_arr), $min_arr);//取最小值数组的KEY
        $min=$min_arr[$min_key];//取最小值
        $max_key = array_search(max($max_arr), $max_arr);//取最大值数组的KEY
        $max=$max_arr[$max_key];//取最大值
        $a=$a_arr[$max_key];//取最大值对应的返点
            if ($RechargeCount<=$min) {
                $C_B_P=0;
            }
            if ($RechargeCount > $max) {
                $C_B_P=$a;
            }
            //dump($min_arr);
            //dump($max_arr);
            //dump($a_arr);
            //dump($RechargeCount);
        /*foreach ($Recharge_rate as $ke => $va) {
            foreach ($va as $ky => $ve) {
                if($ky == 2){
                    unset($va[$ky]);
                }
            }
            $max = array_search(max($va), $va);
            $min = array_search(min($va), $va);
            if($RechargeCount > $va[$max]){
                $Recharge_rate = $Recharge_rate[$ke][2];
            }
            if($RechargeCount < $va[$min]){
                $Recharge_rate = 0;
            }
            if($RechargeCount >= $va[0]){
                 if($RechargeCount <= $va[1]){
                     $Recharge_rate = $Recharge_rate[$ke][2];
                 }
            }
        }
*/
        $R_moeny=$RechargeCount * $C_B_P;
        //dump($R_moeny);
        //$this->assign('R_moeny',$R_moeny);



        /*取下线亏损*/
        $min_arr=array();
        $max_arr=array();
        $a_arr=array();
        /*先取下线投注金额*/
         $mapc['type']=4;
         $mapc['time']=array('gt',$K_B_time);
         /*dump($map);exit;*/
         $orderMoneySum=M("user_money_log")->where($mapc)->sum("money");
            if (!$orderMoneySum) {
                     $orderMoneySum=0;
                   }
        /*dump($map);exit;*/
        /*取其他金额*/
        $map['type']<>4;
        $Win_moeny-=M("user_money_log")->where($mapc)->sum("money");
            if (!$Win_moeny) {
                     $Win_moeny=0;
                }
        $K_moeny=$orderMoneySum-$Win_moeny;


         /*计算亏损分红*/
        $loss_rateList=M('brokerage_config')->where('brokerage_id=3')->select();
        foreach ($loss_rateList as $key => $value) {
            $loss_rate[]=json_decode($loss_rateList[$key]['config_value']);
        }
       foreach ($loss_rate as $ke => $va) {
                $min_arr[]=$loss_rate[$ke][1];
                /*将最小值存入数组*/
                $max_arr[]=$loss_rate[$ke][2];
                 /*将最大值存入数组*/
                $a_arr[]=$loss_rate[$ke][3];
                 /*将返佣比例值存入数组*/
                
                if($K_moeny > $va[1] && $K_moeny <= $va[2] ){
                    $K_B_P = $va[3];
                }
            } 
        $min_key = array_search(min($min_arr), $min_arr);//取最小值数组的KEY
        $min=$min_arr[$min_key];//取最小值
        $max_key = array_search(max($max_arr), $max_arr);//取最大值数组的KEY
        $max=$max_arr[$max_key];//取最大值
        $a=$a_arr[$max_key];//取最大值对应的返点
            if ($K_moeny<$min) {
                $K_B_P=0;
            }
            if ($K_moeny > $max) {
                $K_B_P=$a;
            }

       /* $K_B_P=0.001;//分红比例*/
        $K_B_moeny=(int)$Win_moeny*$K_B_P;
        /*dump($K_B_moeny);exit;*/

        $min_arr=array();
        $max_arr=array();
        $a_arr=array();


        /*计算打码量*/
        $map['time']=array('gt',$D_B_time);
        $map['type']=4;
        /*dump($map);*/
        $D_moeny=M("user_money_log")->where($map)->sum("money");
        $this->assign("D_moeny",$D_moeny);
        //dump($D_moeny);exit;
        //计算打码分红
        $L_P_list=M('brokerage_config')->where('brokerage_id=6')->select();
        foreach ($L_P_list as $key => $value) {
            $L_P_rate[]=json_decode($L_P_list[$key]['config_value']);
        }//返回数组
        /*dump($L_P_rate);exit;*/
       /* dump($L_P_rate);exit;*/
        foreach ($L_P_rate as $ke => $va) {
                $min_arr[]=$L_P_rate[$ke][0];
                /*将最小值存入数组*/
                $max_arr[]=$L_P_rate[$ke][1];
                 /*将最大值存入数组*/
                $a_arr[]=$L_P_rate[$ke][2];
                 /*将返佣比例值存入数组*/
                
                if($D_moeny > $va[0] && $D_moeny <= $va[1] ){
                    $D_B_P = $va[2];
                }
            } 
        $min_key = array_search(min($min_arr), $min_arr);//取最小值数组的KEY
        $min=$min_arr[$min_key];//取最小值
        $max_key = array_search(max($max_arr), $max_arr);//取最大值数组的KEY
        $max=$max_arr[$max_key];//取最大值
        $a=$a_arr[$max_key];//取最大值对应的返点
            if ($D_moeny<$min) {
                $D_B_P=0;
            }
            if ($D_moeny > $max) {
                $D_B_P=$a;
            }
        $orderMoney=$D_moeny*$D_B_P;

       /* dump($D_moeny);*/
        /*取派发时间*/
        /*流水分红10  充值分红7 亏损分红6*/
            
            /*dump($C_B_time);*/
        $this->assign('K_B_time',$K_B_time);
        $this->assign('D_B_time',$D_B_time);
        $this->assign('C_B_time',$C_B_time);
        $this->assign('K_B_P',$K_B_P);
        $this->assign('D_B_P',$D_B_P);
        $this->assign('C_B_P',$C_B_P);
        $this->assign('orderMoney',$orderMoney);
        $this->assign('orderMoneySum',$orderMoneySum);
        $this->assign('K_B_moeny',$K_B_moeny);
        $this->assign('Recharge_rate',$Recharge_rate);
        $this->assign('K_moeny',$K_moeny);
        $this->assign('RechargeCount',$RechargeCount);
        $this->assign('R_moeny',$R_moeny);
        $this->assign("userId",$_GET['ID']);
        $this->display();
    }
    /*派发分红*/
    public function distributorBonusAdd(){
        $_POST['userId']= $_POST['userid'];
        $_POST['time']=time();
       $info=M('user_money_log')->add($_POST);
       if ($info) {
            $_POST['admin_id']=$_COOKIE['admin_id'];
           
            $a=M('bonus_log')->add($_POST);
            if($a){
                $this->success("派发成功");
            }
       } else {
           $this->success("派发失败");
       }
        
    }

    public function distributorDel(){
       $distributorModel = D('Home/User');
       $id = I('post.ID');
       if ($distributorModel->userDel($id)){
           $return = array('state' => true);
       }else{
           $return = array('state' => false);
       }
       exit(json_encode($return));
    }
    
}