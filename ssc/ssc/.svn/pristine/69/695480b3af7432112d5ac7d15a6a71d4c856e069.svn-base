<?php 
namespace Home\Controller;
use Think\Controller;
class WarnController extends CommonController {
    /**
     * 预警配置
     */
    public function warn_config() {
        $threeMenuInfo = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
//        print_r($threeMenuInfo);exit;
        $gcId = I('get.gcId');
        if($cid){
            $where['cid'] = $cid;
            $payList = M('warn_config')
            ->join(' g_category ON g_warn_config.cid = g_category.id')
            ->join('g_play_way ON g_warn_config.playid = g_play_way.id')
            ->Field('g_warn_config.*,g_category.catename,g_play_way.playname')
            ->where($where)
            ->select();
        }  else {
            $payList = M('warn_config')
            ->join(' g_category ON g_warn_config.cid = g_category.id')
            ->join('g_play_way ON g_warn_config.playid = g_play_way.id')
            ->Field('g_warn_config.*,g_category.catename,g_play_way.playname')
            ->select();
        }
       /* dump($payList);*/
        foreach ($payList as $key => $value) {
           $map['id']=$value['ctype'];
           $a=M('category')->where($map)->find();
           $payList[$key]['cname']=$a['catename'];
        }
        /*dump($payList);exit;*/
        $categoryList = M('category')->select();
        $this->assign('threeMenuInfo', $threeMenuInfo);
        $this->assign('categoryList', $categoryList);
        $this->assign('pay_list', $payList);
        $this->display();
    }
    
    
    /**
     * 添加预警方式
     */
    public function warn_add(){
        $categoryList = M('category')->where('pid=0')->select();
        $this->assign('categoryList', $categoryList);
        $data = I('post.');
        /*dump($categoryList);exit;*/

        if (!empty($data)){

               /* dump($data);exit;
                $adddata['gcId'] = $data['sid'];
                $adddata['playName'] = $data['playName'];
                $adddata['mark'] = $data['mark'];
                $adddata['stakes'] = $data['stakes'];
                $adddata['num'] = $data['num'];
                $adddata['warnLeve'] = $data['warnLeve'];*/
            if (M('warn_config')->add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加预警成功'));
                $this->success('添加预警成功!', U('warn/warn_config'));
            }else{
                $this->error('添加失败');
            }
        }
        $this->display();
    }
    /*获取采种列表名称*/
    public function GetCname(){
    	$map['pid']=$_POST['pid'];
        $map['status']=1;
        $list=M('category')->where($map)->select();
        $this->ajaxReturn($list);
    }
      /*获取玩法列表名称*/
    public function GetPlay(){
        $map['cate_id']=$_POST['playid'];
        $map['status']=1;
        $list=M('play_way')->where($map)->select();
        $this->ajaxReturn($list);
    }
    /**
     * 预警开启
     */
    public function warn_open(){
        $data['status'] = 1;
        if (M('warn_config')->where('id = '.I('post.id'))->save($data)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'预警开启'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    /**
     * 预警关闭
     */
    public function warn_close(){
        $data['status'] = 0;
        if (M('warn_config')->where('id = '.I('post.id'))->save($data)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'预警关闭'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    /**
     * 预警删除
     */
    public function warn_del(){
         $pay_id = I('post.id');
        if (M('warn_config')->where('id ='.$pay_id)->delete()){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'预警删除'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    /**
     * 预警列表
     * 
     */
    public function warn_list() {
        $threeMenuInfo = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $payList = M('warn')->select();
        $this->assign('threeMenuInfo', $threeMenuInfo);
        $this->assign('pay_list', $payList);
        $this->display();
    }
    /**
     * 预警信息添加
     */
    public function warn_list_add(){
        $categoryList = M('category')->select();
        $this->assign('categoryList', $categoryList);
        $data = I('post.');
        if (!empty($data)){
                $adddata['typeName'] = $data['sid'];
                $adddata['playName'] = $data['playName'];
                $adddata['mark'] = $data['mark'];
                $adddata['stakes'] = $data['stakes'];
                $adddata['num'] = $data['num'];
                $adddata['warnLeve'] = $data['warnLeve'];
                $adddata['content'] = $data['content'];
                $adddata['time'] = time();
                $adddata['userName'] = $_COOKIE['name'];
            if (M('warn')->add($adddata)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加预警信息成功'));
                $this->success('添加预警信息成功!', U('warn/warn_list'));
            }else{
                $this->error('添加失败');
            }
        }
        $this->display();
    }
    /**
     * 预警信息删除
     */
    public function warn_list_del(){
        $pay_id = I('post.id');
        if (M('warn')->where('id ='.$pay_id)->delete()){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'预警信息删除'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    /**
     * 开奖记录
     */
    public function openPrizeLog() {
        $this->display();
    }

    
}