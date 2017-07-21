<?php 
namespace Home\Controller;
use Think\Controller;
class RechargeController extends CommonController {
    
    /**
     * 充值列表
     * Programmer : manty
     * Date: 02-02  20:10
     */
    public function rechargeList() {
//        $RechargeModel = D('Home/Recharge');
//        $UserModel = D('Home/User');
//        $rechargeList = $RechargeModel->get_rechargeList();
//        foreach ($rechargeList as $key=>$key){
//            $rechargeList[$key]['addtime'] = date('Y-m-d H:i:s', $rechargeList[$key]['addtime']);
//            $rechargeList[$key]['username'] = $UserModel->get_username($rechargeList[$key]['user_id']);
//        }
        $rechargeList = M('user_money_log as a')->where('a.type =1')->join('g_user as b on b.id = a.userId')->field('a.id,a.money,a.time as addtime,b.username,b.id as user_id')->select();
        foreach ($rechargeList as $k => $v) {
            $rechargeList[$k]['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
            $rechargeList[$k]['pay'] = 2;
        }
//        print_r($rechargeList);exit;
        $this->assign('recharge_list', $rechargeList);
        $this->display();
    }
    
    /**
     * 删除充值记录
     * Programmer : manty
     * Date: 02-02  20:10
     */
    public function rechargeDel(){
        $RechargeModel = D('Home/Recharge');
        $ID = I('post.ID');
        if ($RechargeModel->rechargeDel($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除充值记录'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    
}