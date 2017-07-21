<?php 
namespace Home\Controller;
use Think\Controller;
class AdminController extends CommonController {
    
    /**
     * 管理员列表
     * Programmer : manty
     * Date: 12-31  18:07
     */
    public function adminList() {
//        $threeMenuInfo = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $adminModel = D('Home/admin');
        $adminList = M('admin')->select();
        foreach ($adminList as $k => $v) {
            $adminList[$k]['power'] = M('auth_group')->where('id ='.$v['power'])->getField('title'); 
            $adminList[$k]['lasttime'] = date('Y-m-d H:i:s',$v['lasttime']);
        }
//        print_r($adminList);exit;
//        $adminList = $adminModel->get_adminList();
//        print_r($adminList);exit;
        $this->assign('threeMenuInfo', $threeMenuInfo);
        $this->assign('admin_list', $adminList);
        $this->display();
    }
    
    
    
    /**
     * 添加管理员
     * Programmer : manty
     * Date: 12-31  18:07
     */
    public function adminAdd(){
//        exit('sss');
        $adminModel = D('Home/admin');
        $data = I('post.');
//        print_r($data);
        $roleList = M('auth_group')->select();
        if (!empty($data)){
            $account = $adminModel->get_account($data['account']);
            if (!empty($account)){
                $this->error("管理员账号已存在！");
            }
            $content = array(
                'account' => $data['account'],
                'password' => md5($data['password']),
                'power' => $data['power'],
             );
            if ($uid = M('admin')->add($content)){
                $group_access['uid'] = $uid;
                $group_access['group_id'] = $data['power'];
                M('auth_group_access')->add($group_access);
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加管理员'));
                $this->success('添加管理员成功!', U('admin/adminList'));
            }else{
                $this->error("添加管理员失败!");
            }
        }
        $this->assign('rolelist', $roleList);
        $this->display();
    }
    
    /**
     * 删除管理员
     * Programmer : manty
     * Date: 01-01  18:50
     */
    public function adminDel() {
        $adminModel = D('Home/admin');
        $adminID = I('post.adminID');
        if ($adminID == 1){
            $this->error("超级管理员不能删除！");
        }
        if ($adminModel->del_admin($adminID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除管理员'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 管理员修改密码
     * Programmer : manty
     * Date: 01-01  19:03
     */
    public function adminEdit() {
        $adminModel = D('Home/admin');
        $adminID = I('get.adminID');
        $data = I('post.');
        if (!empty($data)){
            $password = $adminModel->get_password($adminID);
            if (md5($data['password']) != $password){
                $this->error("旧密码错误");
            }
            if ($adminModel->edit_password($adminID,$data['new_password'])){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'管理员修改密码'));
                $this->success('修改密码成功!', U('index/logout'));
            }else{
                $this->error("修改密码失败~~");
            }
        }
        $this->display();
    }
    
}