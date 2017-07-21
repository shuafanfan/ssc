<?php 
namespace Home\Controller;
use Think\Verify;
class IndexController extends CommonController {
    
    public function index(){

            $account['account'] = $_COOKIE['name'];
            //超级管理员
            if(strcmp($_COOKIE['name'],'admin') == 0){
                $menuList = R('Common/Menus');
            }//检查权限
            else {
                $Auth = new \Think\Auth();
                $adminInfo = M('admin')->where($account)->find();
                $getGroups = $Auth->getGroups($adminInfo['id']);
//                $getGroups = $Auth->getGroups(5);
//                print_r($getGroups);exit;
                //$power['pid'] =0;
                $power['id'] =array('in',  explode(',', $getGroups[0]['rules']));
                $onelist = M('auth_rule')->where($power)->field('title,name,id,pid')->select();
                $menuList   =   $this->order1($onelist);
            }
            $auth_group = M('admin')->where($account)->join(' g_auth_group_access ON g_admin.id = g_auth_group_access.uid')->join(' g_auth_group ON g_auth_group_access.group_id = g_auth_group.id')->field('g_auth_group.title,g_admin.account')->find();
        $this->assign('auth_group', $auth_group);
        $this->assign('menuList', $menuList);
        $this->display();
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


    /**
     * 主页
     */
    public function main(){
//        exit();
        $tart    =    strtotime(date('Y-m-d',strtotime('0 day')));
        $map['registertime']  = array('between',array($tart,$tart+86399));
        $userCount  =   M('user')->where($map)->count();
        $userSum    =   M('user')->count();
        $withMap['addtime']    =   array('between',array($tart,$tart+86399));
        $withdrawals    =   M('Withdrawals')->where($withMap)->sum('money');
        $recharge    =   M('Recharge')->where($withMap)->sum('money');

        $br['time'] = array('between',array($tart,$tart+86399));
        $map['status']  = array('in','1,2,3');
        $brSum    =   M('BetRecord')->where($br)->sum('money');
        $br1['time'] = array('between',array($tart,$tart+86399));
        $map['status']  = array('in','1');
        $MoneyLog['add_time'] = array('between',array($tart,$tart+86399));
        $br1Sum     =   M('WinningMoneyLog')->where($MoneyLog)->sum('money');
        if (!empty($brSum) && !empty($br1Sum)){
            $deficit = $brSum-$br1Sum;
        }else{
            $deficit =0;
        }
        $this->assign('deficit', empty($deficit)?0:$deficit);
        $this->assign('recharge', empty($recharge)?0:$recharge);
        $this->assign('withdrawals', empty($withdrawals)?0:$withdrawals);
        $this->assign('userSum', $userSum);
        $this->assign('userCount', $userCount);

        $this->assign('betTz', M('BetRecord')->sum('money'));
        $this->assign('betPj', M('BetRecord')->where(['status'=>2])->sum('winning_money'));
        $this->assign('betKy', M('BetRecord')->sum('profitLoss'));
        $this->display('Index/main');
    }


    /**
     * 价格统计
     */
    public function moneyCount(){
//        exit();
        $data_id    = $_POST['data_id'];
        if (empty($data_id)){
            $this->json(0,'获取失败');
        }

        $data_id = $data_id-1;
        $wnlSum_data = 0;
        $betSum_data = 0;
        $defSum_data = 0;
        for ($i=$data_id;$i>=0;$i--){
            $date_ymd   =   date('Y-m-d', strtotime("-$i days"));
            $date[] =  $date_ymd;
            $tart    =    strtotime($date_ymd);
            $br['time'] = array('between',array($tart,$tart+86399));
            $map['status']  = array('in','1,2,3');

            $betSum    =   M('BetRecord')->where($br)->sum('money');

            $br1['time'] = array('between',array($tart,$tart+86399));
            $map['status']  = array('in','1');
            $MoneyLog['add_time'] = array('between',array($tart,$tart+86399));
            $wmlSum     =   M('WinningMoneyLog')->where($MoneyLog)->sum('money');

            $wmlSum = empty($wmlSum)?0:ceil($wmlSum);
            $betSum = empty($betSum)?0:ceil($betSum);
            $def  =     $betSum-$wmlSum;
            $deficit[]  =     -($betSum-$wmlSum);
            $bet_record[] = $betSum;
            $wmlSumData[] = $wmlSum;
            $wnlSum_data += $wmlSum;
            $betSum_data += $betSum;
            $defSum_data += abs($def);
        }

        $data = [
            'date'=>implode(',',$date),
            'deficit'=>implode(',',$deficit),
            'bet_record'=>implode(',',$bet_record),
            'brSumData'=>implode(',',$wmlSumData),
            'wnlSum_data'=>$wnlSum_data, //派奖
            'betSum_data'=>$defSum_data, //投注
            'defSum_data'=>empty($defSum_data)?0:($defSum_data), //亏
        ];
        $this->json(1,'获取成功',$data);
    }


    function json($code,$msg,$data=null){
        $data = [
            'status'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ];
        echo json_encode($data,true);
        exit();
    }
}

?>