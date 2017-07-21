<?php 
namespace Home\Controller;
use Think\Controller;
class LiuheController extends CommonController {
    
    /**
     * 彩种分类列表
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function liuheList(){
        /*$LiuheModel = D('Home/Liuhe');*/
        $LiuheModel=M("cate_date_time");
        $Liuheid=42;
        $where['cate_id']=$Liuheid;
        $count = $LiuheModel->where($where)->count();
        $Page = getpage($count,10);
        $show = $Page->show(); 
        $LiuheList=$LiuheModel->order('date DESC')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('LiuheList', $LiuheList);
        $this->assign('page', $Page->show());
        $this->display();
    }
    
    /**
     * 添加开奖时间
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function liuheAdd(){
        $M=M("cate_date_time");
        $where['cate_id']=42;
        $period=$M->where($where)->Max("period");
        
        $data = I('post.');
        /*dump($data);exit;*/
        if (!empty($data)){
            $data['timeStamp']=strtotime($data['date']." ". $data['open_time']);
           $data["cate_id"]=42;
            $arr=$M->add($data);
            if($arr){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加彩种分类'));
                $this->success('六合彩开奖时间添加成功!');
            }else {
                $this->error('六合彩开奖时间添加失败');
            }
        }
        $this->assign('period', $period+1);
        $this->display();
    }
    
    /**
     * 删除开奖时间
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function liuheDel(){
        $ID = I('get.id');
        $where['id']=$ID;
        /*dump( $where);exit;*/
        $info = M("cate_date_time")->where($where)->delete();
        if (!empty($info)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除六合彩开奖时间'));
                $this->success('删除成功!');
            }else {
                $this->error('删除失败');

        }

        
    }
    
    /**
     * 六合彩开奖时间修改
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function liuheEdit(){
        $data=$_POST;
        /*dump($data);exit;*/
        $data['timeStamp']=strtotime($data['date']." ". $data['open_time']);
        $where["id"]=$data["id"];
        $info=  M("cate_date_time")->where($where)->save($data);
        if (!empty($info)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'修改六合彩开奖时间'));
                $this->success('修改成功!');
            }else {
                $this->error('修改失败');

        }

    }
    
    /**
     *六合开奖数据
     */
    public function liuhe_openDatas(){
		$M=M("cate_date_time");
       /* $M=M("bet_record");*/
        $map["cate_id"]=42;
        $count = $M->where($map)->count();
        $Page = getpage($count,20);
        $show = $Page->show();
        $list=$M->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
        $count=count($list);
        for ($i=0; $i < $count; $i++) { 
            $list[$i]["catename"]="香港六合彩";
            /*查询开奖数据*/
            $whereOpenData['code']=42;
            $whereOpenData['expect']=$list[$i]['period'];
            $OpenDataArr=M('open_prize_data')->where($whereOpenData)->find();
            if (!$OpenDataArr) {
                 $list[$i]["opendata"]="- -";
                 $list[$i]["openstatus"]="未开奖";
            } else {
                 $list[$i]["opendata"]=$OpenDataArr['opencode'];
                 $list[$i]["openstatus"]="以开奖";
            }
           /* 查询订单数*/
            $whereOrder["category_id"]=42;
            $whereOrder['issue']=$list[$i]['period'];
            $orderumb=M("bet_record")->where($whereOrder)->Count();
            if (!$orderumb) {
                 $list[$i]["orderumb"]="- -";
            } else {
                $list[$i]["orderumb"]=$orderumb;
            }
            
            /*总派奖量*/
            $orderWinSum=M("bet_record")->where($whereOrder)->sum("winning_money");
            if (!$orderWinSum) {
               $list[$i]["orderWinSum"]="- -";
            } else {
                $list[$i]["orderWinSum"]=$orderWinSum;
            }
            
            /*盈亏*/
            $orderProSum=M("bet_record")->where($whereOrder)->sum("profitLoss");
            if (!$orderProSum) {
                $list[$i]["orderProSum"]="- -";
            } else {
                $list[$i]["orderProSum"]=$orderProSum;
            }
            
            /*注数*/
            $orderSum=M("bet_record")->where($whereOrder)->sum("nums");
            if (!$orderSum) {
                $list[$i]["orderSum"]="- -";
            } else {
                $list[$i]["orderSum"]=$orderSum;
            }
            
            /*投注额*/
            $orderMoneySum=M("bet_record")->where($whereOrder)->sum("money");
                if (!$orderMoneySum) {
                                $list[$i]["orderMoneySum"]="- -";
                            } else {
                                $list[$i]["orderMoneySum"]=$orderMoneySum;
                            }
            /*参与人数*/
            $orderNumber=count(M("bet_record")->where($whereOrder)->group('userId')->select());
            if (!$orderNumber) {
            	$list[$i]["orderNumber"]="- -";
            }else{
            	$list[$i]["orderNumber"]=$orderNumber;
            }

        }
        $this->assign("list",$list);
        $this->assign('page', $Page->show());    
        $this->display();
    }

    public function opDataAdd(){
    	$m=M("open_prize_data");
    	
    		if (!$_POST['opencode'] or !$_POST['expect']) {
    		 $this->error('数据不能为空！');
	    	} else {
	    			$map['expect']=$_POST['expect'];
	    			$map['code']=42;
	    			$arr=$m->where($map)->select();
	    		if ($arr) {//如果存在当前期号，则变成修改开奖数据
	    			$datas['opencode']=$_POST['opencode'];
	    			$info=$m->where($map)->save($datas);
	    				if ($info) {
			    		R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'开奖号码修改成功'));
			            $this->success('开奖号码修改成功!');
				    	} else {
				            $this->error('开奖号码修改失败!');
				    	}
	    		} else {
	    			$data=$_POST;
			    	$data['code']=42;//六合彩ID是42
			    	$data['opentime']=date("Y-m-d h:i:s");
			    	$data['opentimestamp']=strtotime($data['opentime']);
			    	/*dump($data);exit;*/
			    	$info=$m->add($data);
			    	if ($info) {
			    		R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'开奖号码添加成功'));
			            $this->success('开奖号码添加成功!');
			    	} else {
			            $this->error('开奖号码添加失败!');
			    	}
	    		}
	    		
	    	}
    }
    /*六合彩订单列表*/
    public function liuheOrderList(){
        $M=M('bet_record');
        $map['category_id']=42;
        if(empty($_GET['userid'])==false){
                    $map['userId']=$_GET['userid'];
                    $count = $M->where($map)->count();
                    $Page = getpage($count,20);
                    $show = $Page->show();
                    $list =$M
                    ->where($map)
                    ->join('g_user ON  g_bet_record.userId= g_user.id')
                    ->join('g_play_way ON  g_bet_record.play_way_id= g_play_way.id')
                    ->join('g_category ON g_bet_record.category_id = g_category.id')
                    ->field('g_bet_record.* , g_user.username , g_category.catename,g_play_way.*')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();
                    
            }else{
                    $count = $M->where($map)->count();
                    $Page = getpage($count,20);
                    $show = $Page->show();
                    $list = $M
                    ->where($map)
                    ->join('g_user ON  g_bet_record.userId= g_user.id')
                    ->join('g_play_way ON  g_bet_record.play_way_id= g_play_way.id')
                    ->join('g_category ON g_bet_record.category_id = g_category.id')
                    ->field('g_bet_record.* , g_user.username , g_category.catename,g_play_way.*')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select();
                }
       
        $newList = array();
            foreach ($list as $k => $v) {
                    $newList[$k] = $v;
                    $twoName_info = M('play_way')->where('id ='.$v['pid'])->find();
                    $newList[$k]['twoName'] = $twoName_info['playname'];
            }

            $this->assign("list",$newList);
            $this->assign('page', $Page->show());
            $this->display();
    }
   /* 六合彩订单详情*/
  public function liuheOrderDetails(){
      $Order = M('bet_record')
        ->where('g_bet_record.id ='.$_GET["id"])
        ->join('g_user ON  g_bet_record.userId= g_user.id')
        ->join('g_category ON g_bet_record.category_id = g_category.id')
        ->join('g_play_way ON g_bet_record.play_way_id = g_play_way.id')
        ->find();
        /*dump($Order);exit;*/
        $this->assign($Order);
        $this->display();
   }

}
