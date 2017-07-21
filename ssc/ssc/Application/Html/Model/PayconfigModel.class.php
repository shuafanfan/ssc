<?php 
namespace Home\Model;
use Think\Model;
class PayconfigModel extends Model {
    
    /**
     * 取支付列表
     */
    public function get_payList(){
        $Model = M('payconfig');
        $payList = $Model->select();
        return $payList;
    }
    
    /**
     * 支付配置详情
     */
    public function get_pay_info($pay_id){
        $Model = M('payconfig');
        $payInfo = $Model->where(array('id'=>$pay_id))->find();
        return $payInfo;
    }
    
    /**
     * 添加支付方式
     */
    public function pay_add($data){
        $Model = M('payconfig');
        if ($Model->add($data)){return true;} else {return false;}
    }
    
    /**
     * 编辑支付配置
     */
    public function pay_edit($data){
        $Model = M('payconfig');
        if ($Model->save($data)){return true;} else {return false;}
    }
    
    /**
     * 支付开启/支付关闭
     */
    public function pay_play($data){
        $Model = M('payconfig');
        if ($Model->save($data)){return true;} else {return false;}
    }
    
    /**
     * 删除支付方式
     */
    public function pay_del($id){
        $Model = M('payconfig');
        if ($Model->where(array('id'=>$id))->delete()){return true;} else {return false;}
    }
}

?>