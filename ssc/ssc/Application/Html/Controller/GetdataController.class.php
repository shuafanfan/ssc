<?php 
namespace Html\Controller;
use Think\Controller;
class GetdataController extends Controller {


	/**
    * 获取彩种开奖结果
    */
    public function getdata(){
        $code=$_GET['code'];  //彩种ID
        $limit=$_GET['limit']; //获取最新条数
        $map['code']=$code;
        $m=M('open_prize_data');
        $list=$m->where($map)->limit($limit)->order('expect desc')->select();     
        $this->ajaxReturn($list);
    }
 


    /**
    * 获取彩票游戏彩种
    */
    public function getcategory(){
        $category=M('category')->select();
        dump($category);
        //return $category;
        //$this->ajaxReturn($category);
        // $this->assign("userInfo",$userInfo); 
        // $this->display('public');
    }

    /**
    * 获取优惠活动
    */
    public function getactivity(){
        $activity=M('activity')->select();
        // $this->assign('activity',$activity);

         //$this->display('Index/test');
         $this->ajaxReturn($activity,json);
    }

    /**
    * 获取线路检测值
    */
     public function getaurlping(){
        $activity=M('activity')->select();
        $data['status']=1;
        $data['type']=1;
        $url=M('siteurl')->where($data)->select();
        $this->ajaxReturn($url);
    }

 
//     /*
//      *获取玩法及赔率
//      */ 
//     public function getrebate(){
//         $map['cate_id']=1;
//         $list=M('play_way')->where($map)->select();
//         dump($list);
// // array (
// //   'methodid' => '654',
// //   'prize' => 
// //   array (
// //     1 => '180.0',
// //   ),
// //   'dyprize' => 
// //   array (
// //     0 => 
// //     array (
// //       'level' => '1',
// //       'prize' => 
// //       array (
// //         0 => 
// //         array (
// //           'point' => '0',
// //           'prize' => '194',
// //         ),
// //         1 => 
// //         array (
// //           'point' => '0.07',
// //           'prize' => '180',
// //         ),
// //       ),
// //     ),
// //   ),
// // )
//             foreach ($list as $key => $value) {
//                 $listarr[]=array(
//                     'methodid'=>$value['id'],
//                     'prize'=>array(
//                         1=>$value['min_bonus']
//                         ),
//                     'dyprize'=>array(
//                         0=>array(
//                             'level'=>'0',
//                             'prize'=>'196.6'
//                             ),
//                         1=>array(
//                             'level'=>'0',
//                             'prize'=>'180'
//                             ),
//                         ),
//                     )
//             }
//     }
    
        /*
     *获取玩法及赔率
     */ 
    // public function getrebate(){
    //     $data['cate_id']=10;
    //     $res=M('play_way')->where($data)->select();
    //     $list['methodid']=$data['cate_id'];
    //     foreach ($res as $k => $v) {
    //         $max_bonus=$v['max_bonus'];
    //         $min_bonus=$v['min_bonus'];
    //         $min=0;
    //         $max=0.07;
    //         $list['prize'][$k+1]=$v['min_bonus'];
    //         $list['dyprize'][$k]['level']=$k+1;
    //         $list['dyprize'][$k]['prize'][0]['point']=$max;
    //         $list['dyprize'][$k]['prize'][0]['prize']=$min_bonus;
    //         $list['dyprize'][$k]['prize'][1]['point']=$min;            
    //         $list['dyprize'][$k]['prize'][1]['prize']=$max_bonus;
    //     }
    //     dump($list);exit();
    //     $this->ajaxReturn($list);


    //     $list=array("count:".$listcount,"issue:".$issue['issue'],"catename:".$issue['catename'],$res);
        
    //     $this->ajaxReturn($list);
    // }
    
    /*
     *获取返点
     */
    public function getrebate(){
        $data['username']=$_COOKIE['username']; ;
        $rebate=M('user')->field('top_rebate')->where($data)->find();  
        $return=($rebate['top_rebate']-1800)/2000;
        $this->ajaxReturn($return);
    }
}
        