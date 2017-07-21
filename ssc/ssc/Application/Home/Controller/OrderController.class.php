<?php 
namespace Home\Controller;
use Think\Controller;
class OrderController extends CommonController {

    /**
     * 订单列表
     * Programmer : manty
     * Date: 05-26  15:10
     */
    public function orderManagement() {
            $M=M('bet_record');
            //$x=M('play_way');
            
            if(empty($_GET['category_id'])==false){
                    $map['category_id']=$_GET['category_id'];
                    $count = $M->where($map)->count();
                    //dump($count);exit;
                    $Page = getpage($count,20);
                    $show = $Page->show();
                    $list = $M
                    ->where($map)
                    ->order('g_bet_record.id DESC ')
                    ->join('g_user ON  g_bet_record.userId= g_user.id')
                    ->join('g_play_way ON  g_bet_record.play_way_id= g_play_way.id')
                    ->join('g_category ON g_bet_record.category_id = g_category.id')
                    ->field('g_bet_record.id as gid , g_bet_record.* , g_user.username , g_category.catename,g_play_way.*')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();

            }else{
                if(empty($_GET['userid'])==false){
                    $map['userId']=$_GET['userid'];
                    $count = $M->where($map)->count();
                    $Page = getpage($count,20);
                    $show = $Page->show();
                    $list =$M
                    ->where($map)
                    ->order('g_bet_record.id DESC ')
                    ->join('g_user ON  g_bet_record.userId= g_user.id')
                    ->join('g_play_way ON  g_bet_record.play_way_id= g_play_way.id')
                    ->join('g_category ON g_bet_record.category_id = g_category.id')
                    ->field('g_bet_record.id as gid , g_bet_record.* , g_user.username , g_category.catename,g_play_way.*')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();
                    
            }else{
                    $count = $M->count();
                    $Page = getpage($count,20);
                    $show = $Page->show();
                    $list = $M
                     ->order('g_bet_record.id DESC ')
                     ->join('g_user ON  g_bet_record.userId= g_user.id ')
                     ->join('g_play_way ON  g_bet_record.play_way_id= g_play_way.id')
                     ->join('g_category ON g_bet_record.category_id = g_category.id')
                     ->field('g_bet_record.id as gid, g_bet_record.* , g_user.username , g_category.catename,g_play_way.*')
                     ->limit($Page->firstRow.','.$Page->listRows)
                     ->select();
                }

            }
            
            $newList = array();
            foreach ($list as $k => $v) {
                    $newList[$k] = $v;
                    $twoName_info = M('play_way')->where('id ='.$v['pid'])->find();
                    $newList[$k]['twoName'] = $twoName_info['playname'];
            }
            // print_r($newList);exit;
             //dump($list);exit;
            // $this->assign($y);
            $this->assign("list",$newList);
            $this->assign('page', $Page->show());
            $this->display('Order/orderManagement');

        
         }        

    /**
     * 订单详情
     * Programmer : manty
     * Date: 05-26  15:10
     */
    public function orderDetails() {
            // exit('sss');
            // $map['id']=$_GET["id"];
            // print_r($map);exit;
            $Order = M('bet_record')
            ->where('g_bet_record.id ='.$_GET["id"])
            ->join('g_user ON  g_bet_record.userId= g_user.id')
            ->join('g_category ON g_bet_record.category_id = g_category.id')
            ->join('g_play_way ON g_bet_record.play_way_id = g_play_way.id')
            ->field('g_bet_record.* , g_user.username , g_category.catename,g_play_way.*')
            ->find();
            //print_r($Order);exit;
            $this->assign($Order);
            $this->display('Order/orderDetails');
    }
}