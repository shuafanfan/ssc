<?php 
namespace Home\Model;
use Think\Model;
class SiteurlModel extends Model {
    
    /**
     * URL列表
     */
    public function get_SiteurlList($where){
        $Model = M('siteurl');
        $siteurlList = $Model->where($where)->select();
        return $siteurlList;
    }
    
    
    /**
     * 编辑URL
     */
    public function site_edit($data){
        $Model = M('siteurl');
        if ($Model->save($data)) {return true;} else {return false;}
    }
     
    /**
     * 添加Url
     */
    public function site_add($data){
        $Model = M('siteurl');
        if ($Model->add($data)){return true;}else{return false;}
    }
    
}

?>