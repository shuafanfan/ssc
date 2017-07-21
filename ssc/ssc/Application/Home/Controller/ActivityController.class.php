<?php 
namespace Home\Controller;
use Think\Controller;
class ActivityController extends CommonController {
    
    /**
     * 充值送佣金
     * Programmer : manty
     * Date: 02-04  17:11
     */
    public function add(){
        if (IS_POST){
            $post = $_POST;
            $data['activity_name'] =   $post['activity_name'];
            $data['activity_status'] =   $post['activity_status'];
            $data['activity_logo'] =   $post['activity_logo'];
            $data['activity_url'] =   $post['activity_url'];
            $data['activity_detail'] =   $post['activity_detail'];

            $min    =   $post['min'];
            $max    =   $post['max'];
            $value    =   $post['value'];
            $activity_rule  =   [];
            if (empty($min)){
                $this->error('请选择活动规则');
            }
            for ($i=0;$i<count($min);$i++){
                $activity_rule[$i]['min']   =   $min[$i];
                if (!empty($max)){
                    $activity_rule[$i]['max']   =   $max[$i];
                }
                $activity_rule[$i]['value']   =   $value[$i];
            }
            $money    =   $post['money'];
            $rate    =   $post['rate'];
            $winning_rule = [];
            if (!empty($money)){
                for ($i=0;$i<count($money);$i++){
                    $winning_rule[$i]['money']   =   $money[$i];
                    if (!empty($rate)){
                        $winning_rule[$i]['rate']   =   $rate[$i];
                    }
                }
            }
            $data['activity_rule'] =   empty($activity_rules)?'':json_encode($activity_rule,true);
            $data['winning_rule'] =  empty($winning_rule)?'':json_encode($winning_rule,true);

            if ($data['activity_status']==1){
                $data['start_time'] = time();
            }
            $data['add_time'] = time();
           $result  =    M('Activity')->add($data);
           if ($result){
               R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加'.$data['activity_name']));
               $this->success('添加成功!', U('Activity/activityList'));
           }else{
               $this->error('添加失败');
           }

        }else{
            $this->display();
        }
    }

    public function edit(){
        if (IS_POST){
            $post = $_POST;
            if (empty($post['id'])){
                $this->error('参数错误');
            }
            $data['activity_name'] =   $post['activity_name'];
            $data['activity_logo'] =   $post['activity_logo'];
            $data['activity_status'] =   $post['activity_status'];
            $data['activity_url'] =   $post['activity_url'];
            $data['activity_detail'] =   $post['activity_detail'];

            $min    =   $post['min'];
            $max    =   $post['max'];
            $value    =   $post['value'];
            $activity_rule  =   [];
            if (empty($min)){
                $this->error('请选择活动规则');
            }
            for ($i=0;$i<count($min);$i++){
                $activity_rule[$i]['min']   =   $min[$i];
                if (!empty($max)){
                    $activity_rule[$i]['max']   =   $max[$i];
                }
                $activity_rule[$i]['value']   =   $value[$i];
            }

            $money    =   $post['money'];
            $rate    =   $post['rate'];
            $winning_rule = [];
            if (!empty($money)){
                for ($i=0;$i<count($money);$i++){
                    $winning_rule[$i]['money']   =   $money[$i];
                    if (!empty($rate)){
                        $winning_rule[$i]['rate']   =   $rate[$i];
                    }
                }
            }
            $data['activity_rule'] =   empty($activity_rule)?'':json_encode($activity_rule,true);
            $data['winning_rule'] =  empty($winning_rule)?'':json_encode($winning_rule,true);

            if ($data['activity_status']==1){
                $data['start_time'] = time();
            }
            $result  =    M('Activity')->where(['id'=>$post['id']])->save($data);
            if ($result){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'修改'.$data['activity_name']));
                $this->success('修改成功!', U('Activity/activityList'));
            }else{
                $this->error('修改失败');
            }
        }else{
            $id =   $_GET['id'];
            if (empty($id)){
                $this->error('链接错误');
            }
            $info   =   M('Activity')->where(['id'=>$id])->find();
            if (!empty($info['activity_rule'])){
                $info['activity_rule'] = json_decode($info['activity_rule'],true);
            }
            if (!empty($info['winning_rule'])){
                $info['winning_rule'] = json_decode($info['winning_rule'],true);
            }
            $this->assign('info', $info);
            $this->display();
        }
    }

    public function del(){
        if (IS_POST){
            $post   =   $_POST;
            $result  =    M('Activity')->where(['id'=>$post['ID']])->delete();
            if ($result){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除'));
                $data   =   [
                    'state'=>1
                ];
                echo json_encode($data);
                exit();
                //$this->success('删除成功!', U('Activity/activityList'));
            }else{
                $data   =   [
                    'state'=>0
                ];
                echo json_encode($data);
                exit();
                //$this->error('删除成功');
            }
        }
    }
    
    /**
     * 注册玩法送彩金
     * Programmer : manty
     * Date: 02-04  17:11
     */
    public function register_handsel(){
        $ActivityModel = D('Home/Activity');
        $data = I('post.');
        $where = array('id'=>2);
        $info = $ActivityModel->get_recharge_commission($where);
        if (!empty($data)){
            if ($ActivityModel->recharge_commission_edit($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'注册玩法送彩金'));
                $this->success('修改成功!', U('Activity/recharge_commission'));
            }else{
                $this->error('修改失败');
            }
        }
        $this->assign('info', $info);
        $this->display();
    }
    
    /**
     * 活动列表
     * Programmer : manty
     * Date: 02-04  17:11
     */
    public function activityList(){
        $ActivityModel = D('Home/Activity');
        $activityList = $ActivityModel->get_activityList();
        $this->assign('activity_list', $activityList);
        $this->display();
    }
    
}

?>