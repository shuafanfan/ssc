<?php 
namespace Html\Controller;
use Think\Controller;
// class TogetherBuyController  extends CommonController
class TogetherBuyController  extends CommonController {
    


     /*
     *获取投注订单详情
     */
    public function getbetrecord(){
        $data['id']=$_POST['id'];
        $data2['expect']=$_POST['expect'];
        $list=M('bet_record')->where($data)->find();
        $list['time']=date('Y-m-d H:i:s',$list['time']);
        $prize=M('open_prize_data')->where($data2)->find();
        $data3['id']=$list['play_way_id'];
        $play=M('play_way')->where($data3)->find();
        $list['opencode']=$prize['opencode'];
        $list['playname']=$play['playname'];
        // dump($list);
        // dump($prize);
         $this->ajaxReturn($list);
        // dump(time());
        // dump(date('Y-m-d',time()));
    }


    /*
     *合买订单存储
     */
    public function together_buy(){
                $data['expect']=$_POST['issue'];
                $data['code']=$_POST['category'];
                $time=M('open_prize_data')->where($data)->find();
                // if(time()>$time['opentimestamp']){
                //     $this->ajaxReturn('2');//超时
                // }

                $data['bet_money']=$_POST['bet_money'];
                $data['play_way_id']=$_POST['play_way_id'];
                $data['category']=$_POST['category'];
                $data['issue']=$_POST['issue'];
                $data['addtime']=strtotime($_POST['addtime']);
                $data['times']=$_POST['times'];
                $data['type']=$_POST['type'];
                $data['code']=$_POST['code'];
                $data['name']=$_POST['name'];
                $data['point']=$_POST['point'];
                $data['see']=$_POST['see'];
                $data['remark']=$_POST['remark'];
                $data['num']=$_POST['num'];
                $data['user_id']=$_COOKIE['userId'];
                $res=M('together_buy')->add($data);
                if($res){
                    $this->ajaxReturn('1');
                }else{
                    $this->ajaxReturn('0');
                }
                
        
    }

    /*
     *合买订单列表
     */
    public function together_buy_list(){
        $limit=$_GET['total_num'];
        $data['category']=$_GET['pri_lotteryid'];
        $listcount=M('together_buy')->where($data)->count();
        $res=M('together_buy')
        ->join('g_user ON g_user.id=g_together_buy.user_id')
        ->join('g_open_prize_data ON g_together_buy.issue=g_open_prize_data.expect' )
        ->order('g_together_buy.addtime desc')
        ->field("g_together_buy.*,g_user.userName")
        ->limit($limit)
        ->where($data)
        ->cache(true)
        ->select();
        // 取当前期数
        $map['timeStamp']=array('GT',time());
        $map['cate_id']=$data['category'];

        $issue=M('cate_date_time')
        ->join('g_category ON g_cate_date_time.cate_id=g_category.id')
        ->where($map)
        ->order('timeStamp desc')
        ->field('g_cate_date_time.issue,g_category.catename')
        ->cache(true)
        ->find();

        $list=array("count:".$listcount,"issue:".$issue['issue'],"catename:".$issue['catename'],$res);
    	
        $this->ajaxReturn($list);
        //dump($res);exit();
        //$this->assign('res',123);
       // $this->display("Category:txffc");

    }

}
    

    




?>