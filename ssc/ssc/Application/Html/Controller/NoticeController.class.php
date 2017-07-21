<?php 
namespace Html\Controller;
use Think\Controller;
use Think\Verify;
class NoticeController extends CommonController {
    
    /**
     * 公告
     * Programmer : manty
     * Date: 06-015  10:10
     */
    public function notice(){
        $userId = $_COOKIE['userId'];
        $M = M('article');
        $list = $M->select();
        //dump($list);
        $this->ajaxReturn($list);
    }
}

?>