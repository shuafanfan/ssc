<?php 
namespace Home\Controller;
use Think\Verify;
class LoginController extends BaseController {


    public function email(){
        if (IS_POST){
            if (empty($_POST['email'])){
                $this->error('请输入邮箱');
            }
            if (empty($_POST['code'])){
                $this->error('请输入验证码');
            }
            $verify = new \Think\Verify();
            $res = $verify->check($_POST['code'], $id = '');
            if ($res != true){
                $this->error("验证码错误");
            }
            $admin_pwd = M('admin')->where(array('email'=>$_POST['email']))->find();
            if (empty($admin_pwd)){
                $this->error("邮箱不存在");
            }
            $rand_code  =   $this->generateRandStr(16);
            $url    =   "http://".$_SERVER['HTTP_HOST']."/Home/login/login/rand_code/$rand_code/email/".$_POST['email'];
            $content    =   "<p>登录链接<a href='$url'>点击</a> </p>";
            $name   =   sendMail($_POST['email'],'登录链接',$content);
            if ($name){
                $data   =   [
                    'admin_id'=>$admin_pwd['id'],
                    'action_ip'=>get_client_ip(),
                    'email'=>$_POST['email'],
                    'rand_code'=>$rand_code,
                    'login_time'=>time(),
                ];
                $res    = M('admin_login')->add($data);
                if ($res){
                    $this->success("邮件已发送到您的邮箱中，请查收");
                }else{
                    $this->error("发送失败");
                }
            }
        }else{

        }
        $this->display('Index/email');
    }
    public function sendVerify(){
        if (IS_POST){
            $email  =    $_POST['email'];

        }else{

        }
        //svar_dump(sendMail('614296086@qq.com','登录密码','sds'));
    }

    function generateRandStr($length) {
        $mt_string = 'ABCDEFGHKMNPQRSTUVWXYZ23456789abcdefghkmnpqrstuvwxyz';
        $max = strlen($mt_string)-1;
        $randstr = '';
        for ($i = 0; $i < $length; $i++) {
            $randstr .= $mt_string[mt_rand(0, $max)];
        }
        return $randstr;
    }

    public function login(){
        if (empty($_GET['rand_code'])){
            $this->error('链接随机码错误',U('login/email'));
        }
        if (empty($_GET['email'])){
            $this->error('链接邮箱错误',U('login/email'));
        }
        $admin_pwd = M('admin_login')->where(array('email'=>$_GET['email'],'rand_code'=>$_GET['rand_code']))->order('id DESC')->find();

//       var_dump($admin_pwd);
       if (empty($admin_pwd)){
            $this->error('链接邮箱不存在错误',U('login/email'));
        }
        if (get_client_ip() !=$admin_pwd['action_ip']){
            $this->error('链接IP地址错误',U('login/email'));
        }

        if (time()-300 >$admin_pwd['login_time']){
            $this->error('链接超时',U('login/email'));
        }

        if (IS_POST){
            $data = I('post.');
            $verify = new \Think\Verify();
            if (!empty($data)){
                $res = $verify->check($data['code'], $id = '');
                if ($res != true){
                    $this->error("验证码错误");
                }
                $account = $data['account'];
                $password = $data['password'];
                $admin_pwd = M('admin')->where(array('account'=>$account))->find();
                if (empty($admin_pwd)){
                    $this->error("账号不存在！",U('index/login'));
                }
                if ($admin_pwd['email'] != $admin_pwd['email']){
                    $this->error("账号不是同一个账号！",U('index/login'));
                }
                if (md5($password) != $admin_pwd['password']){
                    $this->error("密码错误！",U('index/login'));
                }else{
                  //  $admin_id = M('admin')->where(array('account'=>$account))->getField('id');
                    $content = array('id'=>$admin_pwd['id'],'lasttime'=>time());
                    if (M('admin')->save($content)){
                        cookie('name', $account, 9999);
                        cookie('admin_id', $admin_pwd['id'], 9999);
                        R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'登录成功'));
                        $this->success('登录成功!',U('index/index'));
                    }else{
                        $this->error("登录失败！",U('index/login'));
                    }
                }
            }
        }
        $this->display('Index/login');
    }
    
    public function logout() {
        cookie('name', null);
        redirect(U("index/login"));
    }

    
    /**
     * 生成验证码
     * Programmer : manty
     * Date: 02-07  20:10
     */
    public function verify()
    {
        $config = [
            'fontSize' => 19, // 验证码字体大小
            'length' => 4, // 验证码位数
            'imageH' => 34
        ];
        $Verify = new Verify($config);
        $Verify->entry();
    }
    /**
     * 获取当前管理员三级菜单全部信息
     * @return type
     */
     public function threeMenu($twoMenu) {
        $twoMenu = $_GET['twoMenu'];
        //管理员  $adminInfo['power']  1超级管理 2普通管理  3财务管理
        $account['account'] = $_COOKIE['name'];
        if($account['account'] == 'admin'){
            // exit('sss');
            $condition['pid'] = $twoMenu;
            $threeMenuList = M('auth_rule')->where($condition)->select();
            // print_r($info);exit;
        }else {
            //角色有的权限
            $auth_group = M('admin')->where($account)->join(' g_auth_group_access ON g_admin.id = g_auth_group_access.uid')->join(' g_auth_group ON g_auth_group_access.group_id = g_auth_group.id')->field('g_auth_group.id as groupId,g_auth_group.rules ')->select();
            if(in_array($twoMenu, explode(',', $auth_group[0]['rules']))){
                $threeMenuList = M('auth_rule')->where('pid ='.$twoMenu)->select();
            }
        }
        if ($twoMenu != 24) {
            if(count($threeMenuList) == 1)$threeMenuList = $threeMenuList[0];
        }
        return $threeMenuList;
    }
}

?>