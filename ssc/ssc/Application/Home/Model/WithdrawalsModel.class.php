<?php 
namespace Home\Model;
use Think\Model;
class WithdrawalsModel extends Model {
    
    /**
     * 取提现列表
     */
    public function get_cashList($where){
        $Model = M('withdrawals');
        $cashList = $Model->where($where)->select();
        return $cashList;
    }
    
    /**
     * 提现审核通过
     */
    public function adopt($ID){
        $Model = M('withdrawals');
        $content = array('id'=>$ID,'status'=>1);
        if ($Model->save($content)) {return true;} else {return false;}
    }
    
    /**
     * 删除提现记录
     */
    public function cashDel($ID){
        $Model = M('withdrawals');
        if ($Model->where(array('id'=>$ID))->delete()) {return true;} else {return false;}
    }
    
    /**
     * 取提现总数
     */
    public function get_cash_count() {
        $Model = M('withdrawals');
        $cash_count = $Model->where(array('status'=>1))->sum('money');
        return $cash_count;
    }
    
}