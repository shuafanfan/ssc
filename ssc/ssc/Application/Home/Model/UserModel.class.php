<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    
    /**
     * 获取用户列表
     */
    public function get_userList($where){
        $Model = M('user');
        $userList = $Model->where($where)->order('id desc')->select();
        foreach ($userList as $key=>$value){
            if ($userList[$key]['status'] == 1){
                $userList[$key]['status'] = '禁用';
            }else {
                $userList[$key]['status'] = '正常';
            }
        }
        return $userList;
    }
    
    /**
     * 获取代理商列表
     */
    public function get_distributorList(){
        $Model = M('user');
        $distributorList = $Model->where(array('type'=>2))->select();
        foreach ($distributorList as $key=>$value){
            if ($distributorList[$key]['status'] == 1){
                $distributorList[$key]['status'] = '禁用';
            }else {
                $distributorList[$key]['status'] = '正常';
            }
        }
        return $distributorList;
    }
    
    /**
     * 获取用户名
     */
    public function get_username($userID){
        $Model = M('user');
        $username = $Model->where(array('id'=>$userID))->getField('username');
        return $username;
    }
    
    /**
     * 获取用户详情
     */
    public function get_user($userID){
        $Model = M('user');
        $detail = $Model->where(array('id'=>$userID))->find();
        return $detail;
    }
    
    /**
     * 验证用户是否存在
     */
    public function is_user_exist($username){
        $Model = M('user');
        $result = $Model->where(array('username'=>$username))->find();
        return $result;
    }
    
    /**
     * 添加试玩用户、普通会员、代理商
     */
    public function tryuserAdd($data){
        $Model = M('user');
        $data['addtime'] = time();
        $data['password'] = md5($data['password']);
        $data['type']  = $data['type'];
        $data['top_rebate']  = $data['top_rebate'];
        $data['low_rebate']  = $data['low_rebate'];
        if ($Model->add($data)) {return true;} else {return false;}
    }
    
    /**
     * 添加经销商
     */
    public function distributorAdd($data,$images) {
        $Model = M('user');
        $data['weblogo'] = upload($images);
        $data['addtime'] = time();
        $data['password'] = md5($data['password']);
        $data['type'] = 1;
        if ($Model->add($data)) {return true;} else {return false;}
    }
    
    /**
     * 取经销商会员
     */
    public function get_distributorUser($distributorID){
        $Model = M('user');
        $distributorUsers = $Model->where(array('distributor_id'=>$distributorID))->select();
        return $distributorUsers;
    }
    
    /**
     * 取会员总数
     */
    public function get_user_count(){
        $Model = M('user');
        $user_count = $Model->count();
        return $user_count;
    }
    
    /**
     * 取当日新增的会员人数
     */
    public function get_add_user_day(){
        $Model = M('user');
        $todayTime = strtotime(date('Y-m-d', time()));
        $endTime = $todayTime + 86400;
        $time['registertime'] = [['gt', $todayTime], ['lt', $endTime]];
        $add_count = $Model->where($time)->count();
        return $add_count;
    }
    
    /**
     * 取当天登录人数
     */
    public function get_login_user_day(){
        $Model = M('user');
        $todayTime = strtotime(date('Y-m-d', time()));
        $endTime = $todayTime + 86400;
        $time['logintime'] = [['gt', $todayTime], ['lt', $endTime]];
        $login_count = $Model->where($time)->count();
        return $login_count;
    }
    
    /**
     * 编辑用户
     */
    public function userEdit($data,$userID){
        $Model = M('user');
        if ($Model->where('id = '.$userID)->save($data)) {return true;} else {return false;}
    }
    
    /**
     * 禁用用户
     */
    public function userProhibit($userID){
        $Model = M('user');
        $content = array('id'=>$userID,'status'=>1);
        if ($Model->save($content)) {return true;} else {return false;}
    }
    
    /**
     * 删除用户
     */
    public function userDel($userID){
        $Model = M('user');
        if ($Model->where(array('id'=>$userID))->delete()) {return true;} else {return false;}
    }
    
    /**
     * 添加vip会员
     */
    public function vipuser_add($data){
        $Model = M('user');
        $data['birthday'] = strtotime($data['birthday']);
        $data['addtime'] = time();
        $data['type'] = 3;
        $data['id'] = $data['user_id'];
        if ($Model->save($data)){ return true;} else {return false;}
    }
    
    /**
     * 取vip会员列表
     */
    public function get_vipuserList() {
        $Model = M('user');
        $map['type']  = array('between','3,4');
        $vipuserList = $Model->where($map)->select();
        return $vipuserList;
    }
    
    /**
     * 删除vip会员
     */
    public function vipuser_del($ID){
        $Model = M('vipuser');
        if ($Model->where(array('id'=>$ID))->delete()) {return true;} else {return false;}
    }
}