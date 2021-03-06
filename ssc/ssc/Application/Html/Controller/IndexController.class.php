<?php 
namespace Html\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller {
    
    public function index(){
//        $config = require('Application/Common/Conf/webconfig.php');
        $setting=M('setting')->order('id asc')->select();
        //dump($setting);exit;
//        print_r($setting);exit;
        if($setting[1]['setting_value']==2){
            $this->assign('taininfo',$setting[2]['setting_value']);
            $this->display('Index/maintain');
            exit;
        } //判断是否开启网站
        $this->assign('title',$setting[0]['setting_value']);//网站名
        // $this->assign('category',$setting[3]['setting_value']);//彩种玩法
        // $this->assign('mintx',$setting[6]['setting_value']);//最小提现
        // $this->assign('mincz',$setting[7]['setting_value']);//最小充值
        // $this->assign('register',$setting[8]['setting_value']);//邀请注册
        // $this->assign('customer',$setting[9]['setting_value']);//客服API
        // $this->assign('passwrong',$setting[11]['setting_value']);//密码输错
        // $this->assign('waiting',$setting[12]['setting_value']);//等待时间
        $moneynum=count(explode(',',$setting[4]['setting_value']));//钞票单位
        // $_SESSION['moneynum']=$moneynum;//钞票单位a
        // $_SESSION['category']=$setting[3]['setting_value'];//彩种玩法
        // $_SESSION['mintx']=$setting[6]['setting_value'];//最小提现
        // $_SESSION['mincz']=$setting[7]['setting_value'];//最小充值
        // $_SESSION['register']=$setting[8]['setting_value'];//邀请注册
        // $_SESSION['customer']=$setting[9]['setting_value'];//客服API
        // $_SESSION['passwrong']=$setting[11]['setting_value'];//密码输错
        // $_SESSION['waiting']=$setting[12]['setting_value'];//等待时间
        // $moneynum = 4; 
          
        $this->assign('moneynum',$moneynum);
//        if($config['checkbox'][0] == 'on'){
            if(isset($_COOKIE['username'])){
                $this->assign("status",1); 
             }else{
                cookie('userId', null);
                cookie('username', null);
                $this->assign("status",0); 
             }
            $this->display();
            
//        }  else {
//            exit('网站维护中');
//        }
       
       return $moneynum;
    }
    /**
     * 注册页面
     */
    public  function register() {
        $this->display();
    }
    /**
     * 保存注册数据
     */
    public function user_register() {
        if ($_POST['name']) {
            $where['username'] = $_POST['name'];
            $info = M('user')->where($where)->find();
            if ($info) {
                $return = array('state' => 2);
                exit(json_encode($return));
            }else{
                $return = array('state' => 3);
                exit(json_encode($return));
            }
        }
    }
    public function save_register() {
        if ($_POST['name']) {
            $where['username'] = $_POST['name'];
            $info = M('user')->where($where)->find();
            if ($info) {
                $return = array('state' => 2);
                exit(json_encode($return));
            }
        }
        $verify = new \Think\Verify();
        $res = $verify->check($_GET['code'], $id = '');
        //验证码错误
        if($res != true){
            $return = array('state' => 0);
            exit(json_encode($return));
        }
        //用户注册信息
        $data['username'] = $_POST['name'];
        // $data['nickname'] = $_POST['nickname'];
        $data['mobile'] = $_POST['mobile'];
        $data['registertime'] = time();
        $data['register_ip'] = getClientIp();
        $data['password'] = md5($_POST['password']);
        $data['cashPassword'] = md5('000000');
        if(M('user')->add($data)){
            if ($_POST['url'] != 1 ) {
            
                $currentUrl['url'] = $_POST['url'];
            //        print_r($_POST);exit;
                $user_open_account_center = M('user_open_account_center')->where($currentUrl)->find();
            //        print_r($user_open_account_center);exit;
                $data['type'] = $user_open_account_center['type'];
                $data['top_rebate'] = $user_open_account_center['top_rebate'];
                $data['low_rebate'] = $user_open_account_center['low_rebate'];
            
                //开户中心
                $condition['registerNum'] = $user_open_account_center['registerNum'] + 1;
                $condition['id'] = $user_open_account_center['id'];

                if(M('user_open_account_center')->save($condition)){
                        $return = array('state' => 1);
                        exit(json_encode($return));
                }
            }else{
                $return = array('state' => 1);
                exit(json_encode($return));
            }
        }else{
            $return = array('state' => 4);
            exit(json_encode($return));
        }
        
    }
    
    public function login(){
        $data = I('post.');     
        $verify = new \Think\Verify();
        if (!empty($data)){
            $account = $data['account'];
            $password = $data['password'];
            $res = $verify->check($data['code'], $id = '');
            if ($res != true){
                $userCondition['userName'] = $account;
                $userCondition['status'] = 0;
                $num = M('user_login_log')->where($userCondition)->count();
                $nowNum = $num + 1;
                $data['userName'] = $account;
                $data['loginTime'] = time();
                $data['url'] = $_SERVER['HTTP_HOST'];
                $data['ip'] = getClientIp();
                $data['status'] = 0; //1、成功 0、失败
                $data['content'] = '错误的用户名或密码或验证码!连续失败'.$nowNum.'次!';
                M('user_login_log')->add($data);
                $return = array('state' => 1);
                exit(json_encode($return));
            }
            $type=M('user')->field('status')->where($data)->find();
            if($type==1){
                 $return = array('state' => 8);
                exit(json_encode($return));
            }
            $time['userName']=$account;
            $time['content']=array('like','%提现错误密码%');
            $limitlogin=M('user_login_log')->where($time)->order('loginTime desc')->find();
            $limittime=time()-($limitlogin['loginTime']+60*$_SESSION['waiting']);
            if($limittime<0){
                $return = array('state' => 7);
                $this->ajaxReturn($return);
            }

            $admin_pwd = M('user')->where(array('username'=>$account))->find();
            if (empty($admin_pwd['password'])){
                $return = array('state' => 2);
                exit(json_encode($return));
            }
            if (md5($password) != $admin_pwd['password']){
                    $userCondition['userName'] = $account;
                    $userCondition['status'] = 0;
                    $num = M('user_login_log')->where($userCondition)->count();
                    $nowNum = $num + 1;
                    $data['userName'] = $account;
                    $data['loginTime'] = time();
                    $data['url'] = $_SERVER['HTTP_HOST'];
                    $data['ip'] = getClientIp();
                    $data['status'] = 0; //1、成功 0、失败
                    $data['content'] = '错误的用户名或密码或验证码!连续失败'.$nowNum.'次!';
                    M('user_login_log')->add($data);
                    $return = array('state' => 3);
                    exit(json_encode($return));
            }else{
                if($admin_pwd['status'] == 1){
                    $return = array('state' => 6);
                    exit(json_encode($return));
                }
                $admin_id = M('user')->where(array('username'=>$account))->getField('id');
                if(strcmp($admin_pwd['login_ip'],  getClientIp())==0){
                    $content = array('id'=>$admin_id,'logintime'=>time(),'phpSessid'=>$_COOKIE['PHPSESSID'],'login_ip'=>getClientIp());

                }  else {
                    $content = array('id'=>$admin_id,'logintime'=>time(),'phpSessid'=>$_COOKIE['PHPSESSID'],'login_ip'=>getClientIp(),'last_logintime'=>$admin_pwd['logintime'],'last_login_ip'=>$admin_pwd['login_ip']);
                }
                $content['token'] = $this->token();
                if (M('user')->save($content)){
                    //记录用户登录日志
                    $userCondition['userName'] = $account;
                    $userCondition['status'] = 1;
                    $num = M('user_login_log')->where($userCondition)->count();
                    $nowNum = $num + 1;
                    $data['userName'] = $account;
                    $data['loginTime'] = time();
                    $data['url'] = $_SERVER['HTTP_HOST'];
                    $data['ip'] = getClientIp();
                    $data['status'] = 1; //1、成功 0、失败
                    $data['content'] = '成功'.$nowNum.'次';
                    M('user_login_log')->add($data);
//                    if($_COOKIE['userId'] != $admin_id){
                    cookie('userId', $admin_id, 360000);
                    cookie('username', $account, 360000);
//                    }
                    cookie('top_rebate', $admin_pwd['top_rebate'], 360000);
                    cookie('low_rebate', $admin_pwd['low_rebate'], 360000);
                    cookie('plain_rebate', $admin_pwd['plain_rebate'], 360000);
                    cookie('token', $content['token'], 360000);
                    $return = array('state' => 4,'userId'=>$admin_id,'top_rebate'=>$admin_pwd['top_rebate'],'low_rebate'=>$admin_pwd['low_rebate'],'plain_rebate'=>$admin_pwd['plain_rebate'],'token'=>$content['token']);
                    exit(json_encode($return));
                }  else {
                    $userCondition['userName'] = $account;
                    $userCondition['status'] = 0;
                    $num = M('user_login_log')->where($userCondition)->count();
                    $nowNum = $num + 1;
                    $data['userName'] = $account;
                    $data['loginTime'] = time();
                    $data['url'] = $_SERVER['HTTP_HOST'];
                    $data['ip'] = getClientIp();
                    $data['status'] = 0; //1、成功 0、失败
                    $data['content'] = '错误的用户名或密码或验证码!连续失败'.$nowNum.'次!';
                    M('user_login_log')->add($data);
                    $return = array('state' => 5);
                    exit(json_encode($return));
                }
               
            }

            
        }
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
    
    
    public function logout() {
//        $userName['username'] = $_COOKIE['username']; 
//        $userInfo = M('user')->where($userName)->field('id')->find();
//        $data['id'] = $userInfo['id'];
//        $data['token'] = '';
//        if(M('user')->save($data)){
            cookie('top_rebate', null);
            cookie('low_rebate', null);
            cookie('plain_rebate', null);
            cookie('token', null);
            cookie('username', null);
            cookie('userId', null);
            $return = array('state' => 1);
            exit(json_encode($return));
//        }

        
    }
    
    /**
     * 生成验证码
     * Programmer : manty
     * Date: 02-07  20:10
     */
    public function verify()
    {
        $config = [
            'fontSize' => 23, // 验证码字体大小
            'length' => 4, // 验证码位数
            'imageH' => 50,
            'imageW' => 160
        ];
        $Verify = new Verify($config);
        $Verify->entry();
    }

    
    
    public function home() {
        if(!isset($_COOKIE['username'])){
           $this->success('请登录!', U('Html/Index/index'));
        }else{
                $userName['username'] = $_COOKIE['username']; 
                $userInfo = M('user')->where($userName)->field('token')->find();
                if($_COOKIE['token'] != $userInfo['token'] && $_COOKIE['userId'] == $userInfo['id']){
                    echo '<script type="text/javascript">alert("你已经在别地登陆!");funout(); </script>';  
                }
        }
        $this->display();
    }
    public function footer() {
        if(!isset($_COOKIE['username'])){
           $this->success('请登录!', U('Html/Index/index'));
        }else{
                $userName['username'] = $_COOKIE['username']; 
                $userInfo = M('user')->where($userName)->field('token')->find();
                if($_COOKIE['token'] != $userInfo['token'] && $_COOKIE['userId'] == $userInfo['id']){
                    echo '<script type="text/javascript">alert("你已经在别地登陆!");funout(); </script>';  
                }
        }
        $userName['username'] = $_COOKIE['username']; 
        $userInfo = M('user')->where($userName)->field('nickname,money,type')->find();
        $userInfo['money'] = $userInfo['money'];
        $this->assign("userInfo",$userInfo); 
        $this->display('public');
    }
    

    
}

?>