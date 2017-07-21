<?php 
namespace Home\Model;
use Think\Model;
class RechargeModel extends Model {
    
    /**
     * 充值列表
     */
    public function get_rechargeList(){
        $Model = M('recharge');
        $rechargeList = $Model->order('id desc')->select();
        return $rechargeList;
    }
    
    /**
     * 删除充值记录
     */
    public function rechargeDel($ID){
        $Model = M('recharge');
        if ($Model->where(array('id'=>$ID))->delete()) {return true;} else {return false;}
    }
    
    /**
     * 取充值总数
     */
    public function get_recharge_count() {
        $Model = M('recharge');
        $recharge_count = $Model->sum('money');
        return $recharge_count;
    }
}