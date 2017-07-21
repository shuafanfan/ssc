<?php 
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
    
    /**
     * 取管理员列表
     */
    public function get_adminList(){
        $Model = M('admin');
        $RoleModel = D('Home/Role');
        $adminList = $Model->select();
        foreach ($adminList as $key=>$value){
            $adminList[$key]['lasttime'] = date('Y-m-d H:i:s', $adminList[$key]['lasttime']);
            $adminList[$key]['power'] = $RoleModel->get_role($adminList[$key]['power']);
        }
        return $adminList;
    }
    
    /**
     * 取管理员账号
     */
    public function get_account($account){
        $Model = M('admin');
        $account = $Model->where(array('account'=>$account))->getField('account');
        return $account;
    }
    
    /**
     * 取管理员ID
     */
    public function get_adminID($account){
        $Model = M('admin');
        $adminID = $Model->where(array('account'=>$account))->getField('id');
        return $adminID;
    }
    
    /**
     * 取管理员密码
     */
    public function get_password($adminID){
        $Model = M('admin');
        $password = $Model->where(array('id'=>$adminID))->getField('password');
        return $password;
    }
    
    /**
     * 添加管理员
     */
    public function add_admin($data) {
        $Model = M('admin');
        $content = array(
            'account' => $data['account'],
            'password' => md5($data['password']),
            'power' => $data['power'],
        );
        if ($Model->add($content)){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 修改管理员密码
     */
    public function edit_password($adminID,$newpassword){
        $Model = M('admin');
        $content = array(
            'id' => $adminID,
            'password' => md5($newpassword),
        );
        if ($Model->save($content)){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 删除管理员
     */
    public function del_admin($admin_id){
        $Model = M('admin');
        if ($Model->where(array('id'=>$admin_id))->delete()){
            return true;
        }else{
            return false;
        }
    }
}


?>