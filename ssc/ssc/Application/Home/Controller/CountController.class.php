<?php 
namespace Home\Controller;
use Think\Controller;
class CountController extends CommonController {
    
    /**
     * 会员统计/代理商统计
     * Programmer : manty
     * Date: 02-03  21:28
     */
    public function user_count(){
        $userList  = M('user')->field('id,username,money,registertime,status')->order('id ASC')->select();
        $normal_list = array();
        foreach ($userList as $k => $v) {
            $userList[$k]['addtime']  = date('Y-m-d H:i:s',$v['registertime']);
            if($v['status'] == 0){
                $userList[$k]['status']  = '正常';
                $normal_list[$k] = $v; 
            }
            if($v['status'] == 1){
                $userList[$k]['status']  = '已被禁用';
            }
        }
        $sum_register = count($userList);//总注册量
        $normal_num = count($normal_list);//有效的会员
        $this->assign('sum_register', $sum_register);
         $this->assign('normal_num', $normal_num);
        $this->assign('userList', $userList);
        $this->display();
    }
    /**
     * 会员统计/代理商统计 查看数据
     */
    public function find_user_data() {
        if($_POST['date_min'] && $_POST['date_max']){
//            $where['registertime'] = array('EGT',  strtotime($_POST['date_min']));
//            $where['registertime'] = array('ELT',  strtotime($_POST['date_max']));
            $where['registertime'] = array(array('EGT',  strtotime($_POST['date_min'])),array('ELT',  strtotime($_POST['date_max'])),'and');
            $userList  = M('user')->field('id,username,money,registertime,status')->where($where)->order('id ASC')->select();
//            print_r(M('user')->getLastSql());exit;
            foreach ($userList as $k => $v) {
                $userList[$k]['addtime']  = date('Y-m-d H:i:s',$v['registertime']);
                if($v['status'] == 0){
                    $userList[$k]['status']  = '正常';
                    $normal_list[$k] = $v; 
                }
                if($v['status'] == 1){
                    $userList[$k]['status']  = '已被禁用';
                }
            }
            $num = count($userList);
            $return = array('num' => $num,'userList' =>$userList);
            $this->ajaxReturn($return);
        }

    }
    
    
    /**
     * 禁用用户
     */
    public function disable() {
        $data['status'] = 1;
        $data['id'] = $_POST['userId'];
        if (M('user')->save($data)){
//            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除管理员'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
        
    }
    /**
     * 解禁用户
     */
    public function allow() {
        $data['status'] = 0;
        $data['id'] = $_POST['userId'];
        if (M('user')->save($data)){
//            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除管理员'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
        
    }
    /**
     * 充值统计
     * Programmer : manty
     * Date: 02-03  21:28
     */
    public function racharge_count(){
        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $RechargeModel = D('Home/Recharge');
        $UserModel = D('Home/User');
        $time = date('Y-m-d H:i:s', time());
        $rechage_count = $RechargeModel->get_recharge_count();
        $rechargeList = $RechargeModel->get_rechargeList();
        foreach ($rechargeList as $key=>$key){
            $rechargeList[$key]['addtime'] = date('Y-m-d H:i:s', $rechargeList[$key]['addtime']);
            $rechargeList[$key]['username'] = $UserModel->get_username($rechargeList[$key]['user_id']);
        }
        $this->assign('threeMenuInfo', $threeMenu);
        $this->assign('recharge_count', $rechage_count);
        $this->assign('recharge_list', $rechargeList);
        $this->assign('time', $time);
        $this->display();
    }
    
    /**
     * 提现统计
     * Programmer : manty
     * Date: 02-04  15:24
     */
    public function cash_count(){
        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $WithdrawalsModel = D('Home/Withdrawals');
        $UserModel = D('Home/User');
        $time = date('Y-m-d H:i:s', time());
        $where = array('status'=>1);
        $cash_count = $WithdrawalsModel->get_cash_count();
        $cashList = $WithdrawalsModel->get_cashList($where);
        foreach ($cashList as $key=>$value){
            $cashList[$key]['addtime'] = date('Y-m-d H:i:s', $cashList[$key]['addtime']);
            $cashList[$key]['username'] = $UserModel->get_username($cashList[$key]['user_id']);
        }
        $this->assign('threeMenuInfo', $threeMenu);
        $this->assign('cash_list', $cashList);
        $this->assign('cash_count', $cash_count);
        $this->assign('time', $time);
        $this->display();
    }
    /**
     * 投注统计
     */
    public function betCount() {
        $CategoryModel = D('Home/Category');
        $list = $CategoryModel->field('count(g_bet_record.id) betNum, max(profitLoss) pfMoney, sum(money) betMoney, sum(winning_money) winMoney, g_category.id, g_category.catename')->group('g_category.id')->join(array(' left join g_bet_record ON g_bet_record.category_id = g_category.id'))->select();
        // var_dump($list);die();
        /*$list = $BetRecordModel->field('count(1) betNum, max(profitLoss) pfMoney, sum(money) betMoney, sum(winning_money) winMoney, category_id')->group('category_id')->select();*/
        $this->assign('list', $list);
        $this->display();
    }

    public function betDetail() {
        $cid = I('get.id');
        $this->assign('categoryID', $cid);
        $this->display();
    }

    public function betData() {
        $cid = I('get.id');
        $type = I('get.type');
        /*$begin = 0;
        $end = time();
        if($type=='3') {
            $begin = strtotime(date('Y-m-d 00:00:00', $end - 3*24*3600));
        } else if($type=='7') {
            $begin = strtotime(date('Y-m-d 00:00:00', $end - 7*24*3600));
        } else if($type=='30') {
            $begin = strtotime(date('Y-m-d 00:00:00', $end - 30*24*3600));
        } else if($type=='15') {
            $begin = strtotime(date('Y-m-d 00:00:00', $end - 15*24*3600));
        }*/


        $data_id    = $type;
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
            $br['code'] = $cid;//array('between',array($tart,$tart+86399));
          //  $map['status']  = array('in','1,2,3');
            $betSum    =   M('BetRecord')->where($br)->sum('money');
            $br1['time'] = array('between',array($tart,$tart+86399));
            $map['status']  = 1;
            $map['code']  = $cid;
            $profitLoss =   M('BetRecord')->where($map)->sum('profitLoss');
            $MoneyLog['time'] = array('between',array($tart,$tart+86399));
            $MoneyLog['status']   = 2;
            $MoneyLog['code']   = $cid;
            $wmlSum     = M('BetRecord')->where($MoneyLog)->sum('winning_money');
            $wmlSum = empty($wmlSum)?0:ceil($wmlSum);
            $betSum = empty($betSum)?0:ceil($betSum);
            $def = empty($profitLoss)?0:ceil($profitLoss);
//            $def  =     $betSum-$wmlSum;
            $deficit[]  =     -($def);
            $bet_record[] = $betSum;
            $wmlSumData[] = $wmlSum;
            $wnlSum_data += $wmlSum;
            $betSum_data += $betSum;
            $defSum_data += abs($def);
        }
      /*  $BetRecordModel = D('Home/BetRecord');
        $list = $BetRecordModel->field('count(1) betNum, max(profitLoss) pfMoney, sum(money) betMoney, sum(winning_money) winMoney, from_unixtime(time, \'%Y-%m-%d\') tt')->where('time>=\''.$begin.'\' and time<=\''.$end.'\'')->where('category_id='.$cid)->group('tt')->select();
        $dateList = [];
        foreach ($list as $item) {
            $dateList[$item['tt']]= $item;
        }
        $today = strtotime(date('Y-m-d 12:00:00'));
        $list = [];
        for($i=$type; $i>0; $i--) {
            $time = date('Y-m-d', $today-$i*24*3600);
            $list['date'][] = $time;
            if(isset($dateList[$time])) {
                $list['deficit'][] = $dateList[$time]['pfMoney'];
                $list['bet_record'][] = $dateList[$time]['betNum'];
                $list['brSumData'][] = $dateList[$time]['winMoney'];
            } else {
                $list['deficit'][] = 0;
                $list['bet_record'][] = 0;
                $list['brSumData'][] = 0;
            }
        }*/
        $data = [
            'date'=>implode(',',$date),
            'deficit'=>implode(',',$deficit),
            'bet_record'=>implode(',',$bet_record),
            'brSumData'=>implode(',',$wmlSumData),
            'wnlSum_data'=>$wnlSum_data, //派奖
            'betSum_data'=>$defSum_data, //投注
            'defSum_data'=>empty($defSum_data)?0:-($defSum_data), //亏
        ];
        $this->json(1,'获取成功',$data);

        /*$data = [
            'date'=>implode(',', $list['date']),
            'deficit'=>implode(',', $list['deficit']),
            'bet_record'=>implode(',', $list['bet_record']),
            'brSumData'=>implode(',', $list['brSumData']),
            'wnlSum_data'=>0, //派奖
            'betSum_data'=>0, //投注
            'defSum_data'=>0, //亏
        ];
        $this->ajaxReturn(['status'=>1, 'msg'=>'ss', 'data'=>$data]);*/
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
    /**
     *每天充值详情
     */
    public function rachargeInfo(){
        $date =  empty($_GET['date'])?date('Y-m-d',time()):$_GET['date'];

        $this->assign('date', $date);
        $this->display();
    }

    public function rachargeInfoData(){

        $date   =  $_POST['date'];
        if (!empty($date)){
            $this->assign('date', $date);
            $date_ymd   =   $date;
        }else{
            $date_ymd   =   date('Y-m-d', strtotime("0 days"));
        }
        $tart    =    strtotime($date_ymd);
            $date_ymd   =   date('Y-m-d', strtotime(" 0 days"));
            $tart    =    strtotime($date_ymd);
            $br['addtime'] = array('between',array($tart,$tart+86399));
            $br['status'] = 0;
            $recharge   =   M('recharge')->where($br)->group('user_id')->select();
            if ($recharge){
                $userName = [];
                $rechargeSum = [];
                $rechargeCount = [];
                foreach ($recharge as $value){
                    $user   =   M('user')->where(['id'=>$value['user_id']])->find();
                    $br['user_id'] = $value['user_id'];
                    $recharge   =   M('recharge')->where($br)->sum('money');
                    $count   =   M('recharge')->where($br)->count();
                    $userName[]    =    $user['username'];
                    $rechargeSum[]    =    empty($recharge)?0:$recharge;
                    $rechargeCount[]    =    empty($count)?0:$count;
                }
                $data   =   [
                    'userName'=>implode(',',$userName),
                    'rechargeSum'=>implode(',',$rechargeSum),
                    'rechargeCount'=>implode(',',$rechargeCount),
                ];
                $this->json(1,'获取数据',$data);
            }else{
                $this->json(0,'无数据');
            }

    }



}




?>