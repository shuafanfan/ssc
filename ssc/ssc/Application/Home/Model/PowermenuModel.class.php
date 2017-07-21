<?php 
namespace Home\Model;
use Think\Model;
class PowermenuModel extends Model {
    
    /**
     * 去栏目列表
     */
    public function get_powermenuList(){
        $Model = M('powermenu');
        $powermenuList = $Model->select();
        return $powermenuList;
    }
}

?>