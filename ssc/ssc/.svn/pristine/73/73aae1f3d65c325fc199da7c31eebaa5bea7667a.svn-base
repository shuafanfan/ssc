<?php 
namespace Html\Controller;
use Think\Controller;
use Think\Controller\RestController;
class CommonController  extends RestController {

       public function _initialize(){
            if(!isset($_COOKIE['username'])){
               $this->success('请登录!', U('Html/Index/index'));
            } else{
                $userName['username'] = $_COOKIE['username']; 
                $userInfo = M('user')->where($userName)->field('token')->find();
                if($_COOKIE['token'] != $userInfo['token'] && $_COOKIE['userId'] == $userInfo['id']){
                    echo '<script type="text/javascript">alert("你已经在别地登陆!");funout(); </script>';  
                }
            }
        }


    
    }
    

    




?>