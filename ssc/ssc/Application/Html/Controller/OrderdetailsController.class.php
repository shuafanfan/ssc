<?php 
namespace Html\Controller;
use Think\Controller;
class OrderdetailsController  extends CommonController {
    
    
    public function orderdetails() {
        $_GET['id'] = 2;
        $bet_record_id  = $_GET['id'];
        $condition['g_bet_record.userId'] = $_COOKIE['userId']; 
        $condition['g_bet_record.id'] = $bet_record_id; 
        $betRecord = M('bet_record')->where($condition)->join('g_category on g_category.id = g_bet_record.category_id')->join('g_user on g_user.id = g_bet_record.userId')->join('g_play_way on g_play_way.id = g_bet_record.play_way_id')->field('g_bet_record.profitLoss,g_bet_record.content,g_bet_record.issue,g_category.catename')->find();

        
    }
    
    
    
    
}