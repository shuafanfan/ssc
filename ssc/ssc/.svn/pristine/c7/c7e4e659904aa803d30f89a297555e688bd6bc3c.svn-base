<?php 
namespace Html\Controller;
use Think\Controller;
class TrackrecordController  extends CommonController {
    
    /**
     * 追号记录
     */
    public function trackrecord() {
        $_chaseRecord['userId'] = $_COOKIE['userId']; 
        $_chaseRecord['category_id'] = $_POST['pri_lotteryid']; 
        $_chaseRecord['if_chase'] = 1; 
        $betRecord_chase = M('bet_record')->where($_chaseRecord)->join('g_category on g_category.id = g_bet_record.category_id')->field('g_bet_record.profitLoss,g_bet_record.content,g_bet_record.issue,g_category.catename ,g_bet_record.id,g_bet_record.category_id')->order('g_bet_record.id DESC')->limit(10)->select();
        $this->ajaxReturn($betRecord_chase);
    }
    /**
     * 开奖记录
     * @param type $param
     */
    public function opencode() {
        $data['code'] = $_POST['pri_lotteryid'];
        $open_prize_data_list = M('open_prize_data')->where($data)->order('opentimestamp DESC')->limit(10)->select();
        $this->ajaxReturn($open_prize_data_list);
    }
    
    /**
     * 投注记录
     */
    public function bettingrecord() {
        $condition['userId'] = $_COOKIE['userId']; 
        $condition['category_id'] = $_POST['pri_lotteryid']; 
        $betRecord = M('bet_record')->where($condition)->join('g_category on g_category.id = g_bet_record.category_id')->field('g_bet_record.profitLoss,g_bet_record.content,g_bet_record.issue,g_category.catename ,g_bet_record.id,g_bet_record.category_id')->order('g_bet_record.id DESC')->limit(10)->select();
        $this->ajaxReturn($betRecord);
    }
    
}