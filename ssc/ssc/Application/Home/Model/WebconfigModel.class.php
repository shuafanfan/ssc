<?php 
namespace Home\Model;
use Think\Model;
class WebconfigModel extends Model {
    
    /**
     * 取所有配置信息
     */
    public function get_webconfig(){
        $Model = M('webconfig');
        $webconfig = $Model->select();
        return $webconfig;
    }
    
    /**
     * 保存配置信息
     */
    public function save_config($data,$weblogo) {
        $Model = M('webconfig');
        $data['weblogo'] = upload($weblogo);
        if ($Model->save($data)) {return true;} else {return false;}
    }
    
    /**
     * 取客服配置信息
     */
    public function get_service_config() {
        $Model = M('webconfig');
        $server_info = $Model->where(array('id'=>1))->getField('service_config');
        return $server_info;
    }
    
    /**
     * 编辑客服配置信息
     */
    public function service_config_edit($data) {
        $Model = M('webconfig');
        if ($Model->save($data)){return true;} else {return false;}
    }
    
    /**
     * 取代理佣金配置
     */
    public function get_brokerage_list() {
        $Model = M('brokerage');
        $brokerage_list = $Model->select();
        return $brokerage_list;
    }
    
    /**
     * 取代理佣金配置键
     */
    public function get_brokerage_config($brokerage_id) {
        $Model = M('brokerage');
        $config = $Model->where(array('id'=>$brokerage_id))->getField('config_value');
        return $config;
    }
    
    /**
     * 取代理佣金配置值
     */
    public function get_brokerage_config_value($brokerage_id) {
        $Model = M('brokerage_config');
        $config_value = $Model->where(array('brokerage_id'=>$brokerage_id))->select();
        return $config_value;
    }
    
    /**
     * 编辑代理佣金配置值
     */
    public function brokerage_config_value_edit($id,$config_value){
        $Model = M('brokerage_config');
        $data['config_value'] = $config_value;
        $condition['id'] = $id;
        $Model->where($condition)->save($data);
    }
    
    /**
     * 添加代理佣金配置值
     */
    public function brokerage_config_value_add($data){
        $Model = M('brokerage_config');
        if ($Model->add($data)){ return true;} else {return false;}
    }

}