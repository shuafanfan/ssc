<?php 
namespace Home\Controller;
use Think\Controller;
class NavController extends CommonController {
    
    /**
     * 头部导航/底部导航
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function navList() {
        $threeMenuInfo = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $NavModel = D('Home/Nav');
        $type = I('get.type');
        $where = empty($type) ? array('type'=>0) : array('type'=>1);
        $navList = $NavModel->get_navList($where);
        $this->assign('threeMenuInfo', $threeMenuInfo);
        $this->assign('type', $type);
        $this->assign('nav_list', $navList);
        $this->display();
    }
    
    /**
     * 头部导航/底部导航 -- 编辑
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function navEdit(){
        $NavModel = D('Home/Nav');
        $ID = I('get.ID');
        $navInfo = $NavModel->get_navInfo($ID);
        $data = I('post.');
        if (!empty($data)){
            if ($NavModel->navEdit($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'编辑导航成功'));
                $this->success('编辑导航成功!', U('Home/nav/navList'));
            }else {
                $this->error('编辑导航失败');
            }
        }
        $this->assign('type', $navInfo['type']);
        $this->assign('detail', $navInfo);
        $this->display('navAdd');
    }
    
    /**
     * 头部导航/底部导航--添加
     * Programmer : manty
     * Date: 02-02  20:10
     */
    public function navAdd(){
        $NavModel = D('Home/Nav');
        $type = I('get.type');
        $data = I('post.');
        if (!empty($data)){
            if (empty($data['type'])){
                $data['type'] = '0';
            }else{
                $data['type'] = '1';
            }
            if ($NavModel->nav_add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加导航成功'));
                $this->success('添加导航成功！', U('Home/nav/navList'));
            }else{
                $this->error('添加导航失败！');
            }
        }
        $this->assign('type', $type);
        $this->display();
    }
    
    /**
     * 头部导航/底部导航--删除
     * Programmer : manty
     * Date: 02-21  20:10
     */
    public function navDel(){
        $NavModel = D('Home/Nav');
        $ID = I('post.ID');
        if ($NavModel->nav_del($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'头部导航/底部导航--删除'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
}