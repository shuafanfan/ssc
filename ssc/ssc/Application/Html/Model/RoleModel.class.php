<?php 
namespace Home\Model;
use Think\Model;
class RoleModel extends Model {
    
    /**
     * 取角色名称
     */
    public function get_role($roleID) {
        $Molde = M('role');
        $roleInfo = $Molde->where(array('id'=>$roleID))->getField('name');
        return $roleInfo;
    }
    
    /**
     * 取角色列表
     */
    public function get_roleList() {
        $Model = M('role');
        $roleList = $Model->select();
        return $roleList;
    }
    
    /**
     * 取角色权限
     */
    public function get_rolepower($id){
        $Model = M('role');
        $rolepower = $Model->where(array('id'=>$id))->getField('power');
        return $rolepower;
    }
    
    /**
     * 编辑角色权限
     */
    public function power_edit($roleID,$power) {
        $Model = M('role');
        $data = array('id'=>$roleID,'power'=>$power);
        if ($Model->save($data)) {return true;} else {return false;}
    }
    
    /**
     * 添加角色
     */
    public function role_add($data) {
        $Model = M('role');
        if ($Model->add($data)){ return true;} else{ return false;}
    }
    
    /**
     * 删除角色
     */
    public function role_del($ID){
        $Model = M('role');
        if ($Model->where(array('id'=>$ID))->delete()) {return true;} else {return false;}
    }
}
?>