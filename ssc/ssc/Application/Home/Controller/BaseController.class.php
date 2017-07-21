<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController  extends Controller {
       public function _initialize(){

        }

    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param string $message 错误信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    public function error($message='',$jumpUrl='',$ajax=false) {
        $this->assign('type','error');// 提示信息
        $this->assign('message',empty($message)?'错误信息':$message);// 提示信息
        $this->assign("jumpUrl",empty($jumpUrl)?$_SERVER["HTTP_REFERER"]:$jumpUrl);
        $this->display('Public/dispatch');
        exit();
    }

    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param string $message 提示信息
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @return void
     */
    public function success($message='',$jumpUrl='',$ajax=false) {

        $this->assign('message',empty($message)?'错误信息':$message);// 提示信息
        $this->assign('type','success');// 提示信息
        $this->assign("jumpUrl",empty($jumpUrl)?$_SERVER["HTTP_REFERER"]:$jumpUrl);
        $this->display('Public/dispatch');
        exit();
    }



}




    




?>