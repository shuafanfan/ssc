<?php 
namespace Home\Controller;
use Think\Controller;
class LogController extends CommonController {
    
    /**
     * 日志列表
     * Programmer : manty
     * Date: 02-04  17:11
     */
    public function logList(){
        if($_POST){
            $startTime = strtotime($_POST['startTime']);
            $endTime = strtotime($_POST['endTime']);
            $condition['time'] = array('EGT',$startTime);
            $condition['time'] = array('ELT',$endTime);
            if(M('admin_log')->where($condition)->delete()) $this->success('删除成功!', U('log/logList'));
        }

        if (!empty($_GET['id'])){
            $map['admin_id']    =  array('eq', $_GET['id']);
        }else{
            $map   =  [];
        }
        $adminLogModel   =   M('admin_log');
        $count      = $adminLogModel->where($map)->count();
        $Page = getpage($count,20);
        $show = $Page->show();
        $adminLog     = $adminLogModel->where($map)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('admin_log', $adminLog);
        $this->display();
    }
    /**
     * 添加管理员日志
     * @param type $twoMenu
     * @param type $content
     */
    public function addLog($twoMenu,$content) {
        //有2级菜单id  并且  $content 不空
        if($twoMenu && !empty($content)){
            $data['content'] = $content;
        }  
        //没有2级菜单id   并且  $content 不空
        if(!$twoMenu && !empty($content)){
            $data['content'] = $content;
        }  
        //有2级菜单  并且  $content 空
        if($twoMenu && empty($content)){
            $menu['id'] = $twoMenu;
            $menuInfo = M('auth_rule')->where($menu)->find();
            $data['content'] = $menuInfo['title'];
        }
            $data['name'] = $_COOKIE['name'];
            $data['action_ip'] = get_client_ip();
            $data['admin_id'] = $_COOKIE['admin_id'];
            $data['time'] = time();
            M('admin_log')->add($data);
    }
    /**
     * 删除单条日志
     */
    public function logDel() {
        $ID = I('post.ID');
        if (M('admin_log')->where(array('id'=>$ID))->delete()){
            $return = array('state' => true);
        }else{
             $return = array('state' => false);
        }
         exit(json_encode($return));
    }
}

?>