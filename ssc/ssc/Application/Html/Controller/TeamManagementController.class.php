<?php 
namespace Html\Controller;
use Think\Controller;
class TeamManagementController  extends CommonController {
    /**
     * 团队管理：开户中心(页面)
     */
    public function openAccount_center() {
        $this->display();
    }
    
    /**
     * 生成6个字符串
     * @return type
     */
    public function token() {
        $str = null;
        $num = 6;// 字符串长度
        $strPol = "0123456789abcdefghijklmnopqrstuvwxyz";//如果不需要小写字母，可以把小写字母都删除
        $max = strlen($strPol)-1;
         for($i=0;$i<$num;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
         }
         return $str;
    }
    
    /**
     * 团队管理：开户中心(添加新链接(保存数据))
     */
    public function addNewUrl() {
        $produceStr = $this->token();
        $data['url'] = $_SERVER['HTTP_HOST'].'/index.php/Html/Index/register?'.$produceStr;
        if($_POST['ad_li'] == '会员'){
            $data['type'] = 0;  // 0会员  1代理
        }else{
             $data['type'] = 1; 
        }
       if(!empty($_POST['remarks'])){
           $data['content'] = $_POST['remarks'];
       }
        if(!empty($_POST['high'])){
           $data['top_rebate'] = $_POST['high'];
       }
        if(!empty($_POST['low'])){
           $data['low_rebate'] = $_POST['low'];
       }
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('id')->find();
        $data['userId'] = $userInfo['id'];
        if(M('user_open_account_center')->add($data)){
            $condition['userId'] = $_COOKIE['userId'];
            $count = M('user_open_account_center')->where($condition)->count();
            $userOpenList = M('user_open_account_center')->where($condition)->limit(0,10)->select();
            foreach ($userOpenList as $k => $v) {
                if($v['type'] == 0)$userOpenList[$k]['type'] = '会员';
                if($v['type'] == 1)$userOpenList[$k]['type'] = '代理';
                if($v['top_rebate'] != 0)$userOpenList[$k]['top_rebate'] = $v['top_rebate'].'('.($v['top_rebate']*200).')';
                if($v['low_rebate'] != 0)$userOpenList[$k]['low_rebate'] = $v['low_rebate'].'('.($v['low_rebate']*200).')';
            }
            $page['count'] = $count;
            $page['current'] = 1;
            if($count >= 10){
                $page['number'] = 10;
            }  else {
                $page['number'] = $count;
                $page['lastPage'] = $count;
            }
            $this->assign('count',$page);
            $this->assign("userOpenList",$userOpenList); 
            $this->display();
        }
    }
    /**
     * 上下页
     */
    public function page() {
        $condition['userId'] = $_COOKIE['userId'];
        $count = M('user_open_account_center')->where($condition)->count();
        $num = ceil($count/10);  //3.1  4 
        if($_POST['page_i'] == '下一页'){
            $page['current'] = 1 + $_POST['page_s'];    
            $startId = $_POST['page_s'] * 10;
            if($_POST['page_s'] + 1 == $num){
                $page['number'] = ($count%10);
                $page['lastPage'] = $num;
            }else {
                if($_POST['page_s'] + 1 > $num){
                    $page['number'] = 0;
                }else{
                    $page['number'] = 10;
                }
            }
        }  else {
            $page['current'] = $_POST['page_s'] - 1;    
            $startId = ($_POST['page_s'] - 1) * 10;
            $page['number'] = 10;
        }
        $page['count'] = $count;
        $userOpenList = M('user_open_account_center')->where($condition)->limit($startId,10)->select();
        foreach ($userOpenList as $k => $v) {
                if($v['type'] == 0)$userOpenList[$k]['type'] = '会员';
                if($v['type'] == 1)$userOpenList[$k]['type'] = '代理';
                if($v['top_rebate'] != 0)$userOpenList[$k]['top_rebate'] = $v['top_rebate'].'('.($v['top_rebate']*200).')';
                if($v['low_rebate'] != 0)$userOpenList[$k]['low_rebate'] = $v['low_rebate'].'('.($v['low_rebate']*200).')';
        }
        $this->assign('count',$page);
        $this->assign("userOpenList",$userOpenList); 
        $this->display('addNewUrl');
    }
    /**
     *  跳转
     */
    public function jumpPage() {
        $condition['userId'] = $_COOKIE['userId'];
        $count = M('user_open_account_center')->where($condition)->count();
        $num = ceil($count/10);  //3.1  4 
        $page['count'] = $count;
        $page['current'] = $_POST['page_i']; 
        if($_POST['page_i'] > 0){
            $startId = ($_POST['page_i'] - 1) * 10;
        }
        if($_POST['page_i'] == $num){
            $page['number'] = ($count%10);
            $page['lastPage'] = $num;
        }else{
            $page['number'] = 10;
        }
        $userOpenList = M('user_open_account_center')->where($condition)->limit($startId,10)->select();
        foreach ($userOpenList as $k => $v) {
                if($v['type'] == 0)$userOpenList[$k]['type'] = '会员';
                if($v['type'] == 1)$userOpenList[$k]['type'] = '代理';
                if($v['top_rebate'] != 0)$userOpenList[$k]['top_rebate'] = $v['top_rebate'].'('.($v['top_rebate']*200).')';
                if($v['low_rebate'] != 0)$userOpenList[$k]['low_rebate'] = $v['low_rebate'].'('.($v['low_rebate']*200).')';
        }
        $this->assign('count',$page);
        $this->assign("userOpenList",$userOpenList); 
        $this->display('addNewUrl');
    }
    
    /**
     * 团队管理：开户中心(查询)
     */
    public function query() {
        $condition['userId'] = $_COOKIE['userId'];
        $count = M('user_open_account_center')->where($condition)->count();
        $userOpenList = M('user_open_account_center')->where($condition)->limit(0,10)->select();
        foreach ($userOpenList as $k => $v) {
                if($v['type'] == 0)$userOpenList[$k]['type'] = '会员';
                if($v['type'] == 1)$userOpenList[$k]['type'] = '代理';
                if($v['top_rebate'] != 0)$userOpenList[$k]['top_rebate'] = $v['top_rebate'].'('.($v['top_rebate']*200).')';
                if($v['low_rebate'] != 0)$userOpenList[$k]['low_rebate'] = $v['low_rebate'].'('.($v['low_rebate']*200).')';
        }
        $page['count'] = $count;
        $page['current'] = 1; 
        if($count < 10){
            $page['number'] = $count;
        }  else {
             $page['number'] = 10;
        }
        
        $this->assign('count',$page);
        $this->assign("userOpenList",$userOpenList); 
        $this->display('addNewUrl');
    }
    /**
     * 删除用户开户信息
     */
    public function delete() {
        if($_POST['td_r']){
            $data['id'] = $_POST['td_r'];
            if(M('user_open_account_center')->where($data)->delete()){
                $return = array('state' => 1);
                exit(json_encode($return));
            }
        }
    }
}
?>