<?php 
namespace Home\Model;
use Think\Model;
class ActivityModel extends Model {
    
    /**
     * 编辑充值送佣金/编辑注册玩法送彩金
     */
    public function recharge_commission_edit($data){
        $Model = M('activity');
        $data['key'] = json_encode($data['key']);
        $data['value'] = json_encode($data['value']);
        if ($Model->save($data)){return true;} else {return false;}
    }
    
    /**
     * 充值送佣金详情
     */
    public function get_recharge_commission($where){
        $Model = M('activity');
        $info = $Model->where($where)->find();
        return $info;
    }
    
    /**
     * 活动列表
     */
    public function get_activityList(){
        $Model = M('activity');
        $activityList = $Model->select();
        return $activityList;
    }
}

?>