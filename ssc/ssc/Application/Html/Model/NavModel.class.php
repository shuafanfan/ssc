<?php 
namespace Home\Model;
use Think\Model;
class NavModel extends Model {
    
    /**
     * 取导航列表
     */
    public function get_navList($where){
        $Model = M('nav');
        $navList = $Model->where($where)->order('sort desc')->select();
        return $navList;
    }
    
    /**
     * 取详情
     */
    public function get_navInfo($ID){
        $Model = M('nav');
        $navInfo = $Model->where(array('id'=>$ID))->find();
        return $navInfo;
    }
    
    /**
     * 编辑导航
     */
    public function navEdit($data){
        $Model = M('nav');
        if ($Model->save($data)){ return true;} else{ return false;}
    }
    
    /**
     * 添加导航
     */
    public function nav_add($data){
        $Mdoel = M('nav');
        if ($Mdoel->add($data)){ return true;} else{ return false;}
    }
    
    /**
     * 删除导航
     */
    public function nav_del($ID){
        $Model = M('nav');
        if ($Model->where(array('id'=>$ID))->delete()) {return true;} else {return false;}
    }
}
?>