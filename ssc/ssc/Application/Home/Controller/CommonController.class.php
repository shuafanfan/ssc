<?php 
namespace Home\Controller;
class CommonController  extends BaseController {

       public function _initialize(){
            // 自动运行方法
            if($_COOKIE['name'] ==  ''){
                $this->redirect('/home/login/email');
//                 $this->error("没有登陆",);
             } 
            if($_COOKIE['name'] !=  '' && $_GET['twoMenu'] && $_COOKIE['name'] !=  'admin'){
                    $Auth = new \Think\Auth();
                    $account['account'] = $_COOKIE['name'];
                    $adminInfo = M('admin')->where($account)->find();
                    $getGroups = $Auth->getGroups($adminInfo['id']);
                    if(!in_array($_GET['twoMenu'], explode(',',$getGroups[0]['rules'] ))){
                        $this->error('没权限');
                    }
            } 
        }
        /**
         * 获取一、二级菜单
         */
        public function Menus() {
            //1级菜单
           // $power['pid'] =0;//->where($power)
           // $auth_rule =  $_SESSION['auth_rule'];
            //if (empty($auth_rule)){
                $onelist = M('auth_rule')->order('id asc')->select();
              //  $_SESSION['auth_rule'] = $onelist;
            //}
            //var_dump($onelist);
            $menuList   =   $this->order1($onelist);
            //var_dump($name);
            /*$menuList = array();
            foreach ($onelist as $k => $v) {
                    $menuList[$k] = $v;
                    $twoList = M('auth_rule')->where('pid ='.$v['id'])->select();
                    $menuList[$k]['twoMenu'] = $twoList;
            }
            foreach ($menuList as $_k => $_v) {
                foreach ($_v['twoMenu'] as $ke => $va) {
                    $threeList = M('auth_rule')->where('pid ='.$va['id'])->select();
                    $menuList[$_k]['twoMenu'][$ke]['threeMenu'] = $threeList;
                }
            }*/
            return  $menuList;
        }

    /**
     * 无限极分类 下级节点
     * @param $array
     * @param int $pid
     * @return array
     */
    function order1 ($array,$pid=0){
        $tree = array();
        foreach($array as $v){
            if($v['pid'] == $pid){
                $v['twoMenu']  = empty($this->order1($array,$v['id']))?[]:$this->order1($array,$v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }


}




    




?>