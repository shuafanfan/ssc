<?php 
namespace Html\Controller;
use Think\Controller;
class MoneytypeController  extends CommonController {
    /**
     * 控制前端元、角、分、厘
     */
    public function yuan_jiao_fen_li() {
        $where['id'] = 5;
        $where['type'] = 3;
        $setting_key = M('setting')->where($where)->field('setting_key')->find();
        $return = json_decode($setting_key['setting_key'],true);
        $this->ajaxReturn($return);
    }
    
    
    
    
    
    
    
    
    
}