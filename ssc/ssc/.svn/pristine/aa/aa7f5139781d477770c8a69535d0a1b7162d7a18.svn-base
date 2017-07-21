<?php 
namespace Home\Controller;
use Think\Controller;
class WithdrawalsController extends CommonController {
    
    /**
     * 提现列表
     * Programmer : manty
     * Date: 02-03 20:10
     */
    public function cashList(){
        $threeMenuInfo = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $WithdrawalsModel = D('Home/withdrawals');
        $UserModel = D('Home/User');
        $status = I('get.status');
//        $where = empty($status) ? array('status'=>0) : array('status'=>$status);
        if($status){
            $where = array('status'=>$status);
        }
        $cashList = $WithdrawalsModel->get_cashList($where);
        foreach ($cashList as $key=>$value){
            $cashList[$key]['addtime'] = date('Y-m-d H:i:s', $cashList[$key]['addtime']);
            $cashList[$key]['username'] = $UserModel->get_username($cashList[$key]['user_id']);
        }
        if (empty($status)){
            $title = '未提现';
        }else{
            $title = '已提现';
        }
        $this->assign('threeMenuInfo', $threeMenuInfo);
        $this->assign('cash_list', $cashList);
        $this->assign('title', $title);
        $this->display();
    }
    
    /**
     * 提现审核通过
     * Programmer : manty
     * Date: 02-03 20:10
     */
    public function adopt(){
        $WithdrawalsModel = D('Home/withdrawals');
        $ID = I('post.ID');
        if ($WithdrawalsModel->adopt($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'提现审核通过'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 提现记录删除
     * Programmer : manty
     * Date: 02-03 20:10
     */
    public function cashDel(){
        $WithdrawalsModel = D('Home/withdrawals');
        $ID = I('post.ID');
        if ($WithdrawalsModel->cashDel($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'提现记录删除'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
}