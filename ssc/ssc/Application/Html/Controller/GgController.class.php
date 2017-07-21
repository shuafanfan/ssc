<?php 
namespace Html\Controller;
use Think\Controller;
use Think\Verify;
class GgController extends CommonController {
    
    public function gg(){
        $userId = $_COOKIE['userId'];
        $M = M('article');
        $list = $M->select();
        //dump($list);
        $this->ajaxReturn($list);
    }
}

?>