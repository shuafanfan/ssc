<?php 
namespace Home\Model;
use Think\Model;
class OpenapiModel extends Model {
    
    /**
     * 编辑开奖接口配置
     */
    public function apiurlEdit($data) {
        $Model = M('openapi');
        if ($Model->save($data)){ return true;} else {return false;}
    }
    
    /**
     *  取接口列表
     */
    public function get_openapiList(){
        $Model = M('openapi');
        $openapiList = $Model->select();
        return $openapiList;
    }
    
    /**
     * 取开奖接口api
     */
    public function get_openapi($cateID){
        $Model = M('openapi');
        $openapi = $Model->where(array('category_id'=>$cateID))->getField('url');
        return $openapi;
    }
    
    /**
     * 取分类的开奖接口ID
     */
    public function get_openapi_id($cateID){
        $Model = M('openapi');
        $openapiID = $Model->where(array('category_id'=>$cateID))->getField('id');
        return $openapiID;
    }
    
    /**
     * 禁用api
     */
    public function openapiProhibit($ID) {
        $Model = M('openapi');
        $content = array('id'=>$ID,'status'=>1);
        if ($Model->save($content)){return true;} else {return false;}
    }
    
    /**
     * 启用api
     */
    public function openapiStart($ID) {
        $Model = M('openapi');
        $content = array('id'=>$ID,'status'=>0);
        if ($Model->save($content)){return true;} else {return false;}
    }
}
?>