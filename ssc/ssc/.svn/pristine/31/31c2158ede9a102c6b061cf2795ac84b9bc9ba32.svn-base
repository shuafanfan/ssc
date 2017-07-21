<?php 
namespace Home\Controller;
use Think\Controller;
class ChartController extends CommonController {

    public function recharge() {
        $this->display();
    }

    public function rechargeData() {
        $rechargeModel = M('Recharge'); // 实例化User对象
        $results = $rechargeModel->field('sum(money) total, FROM_UNIXTIME(addtime, "%Y-%m-%d") date')->where('status=0')->group('date')->select(); 
        $list = [];
        foreach ($results as $row) {
            $time = strtotime($row['date']);
            $list[] = ['Y'=>date('Y', $time), 'n'=>(date('n', $time)-1), 'j'=>date('j', $time), 'money'=>floatval($row['total'])];
        }
        $data = ['status'=>0, 'data'=>$list];
        $this->ajaxReturn($data);
    }

    function moneyData(){
        $data_id    = $_POST['data_id'];
        if (empty($data_id)){
            $this->json(0,'获取失败');
        }
        $data_id = $data_id-1;
        $wnlSum_data = 0;
        $betSum_data = 0;
        for ($i=$data_id;$i>=0;$i--){
            $date_ymd   =   date('Y-m-d', strtotime("-$i days"));
            $date[] =  $date_ymd;
            $tart    =    strtotime($date_ymd);
            $br['addtime'] = array('between',array($tart,$tart+86399));
            $betSum    =   M('Recharge')->where($br)->sum('money');
            $MoneyLog['addtime'] = array('between',array($tart,$tart+86399));
            $wmlSum     =   M('Withdrawals')->where($MoneyLog)->sum('money');
            $wmlSum = empty($wmlSum)?0:ceil($wmlSum);
            $betSum = empty($betSum)?0:ceil($betSum);
            $bet_record[] = $betSum;
            $wmlSumData[] = -($wmlSum);
            $wnlSum_data += $wmlSum;
            $betSum_data += $betSum;
        }

        $data = [
            'date'=>implode(',',$date),
            'bet_record'=>implode(',',$bet_record),
            'brSumData'=>implode(',',$wmlSumData),
            'wnlSum_data'=>$wnlSum_data, //派奖
            'betSum_data'=>$betSum_data, //投注
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

    public function withdraw() {
        $this->display();
    }

    public function withdrawData() {
        $withdrawModel = M('Withdrawals'); // 实例化User对象
        $results = $withdrawModel->field('sum(money) total, FROM_UNIXTIME(addtime, "%Y-%m-%d") date')->where('status=1')->group('date')->select();
         $list = [];
        foreach ($results as $row) {
            $time = strtotime($row['date']);
            $list[] = ['Y'=>date('Y', $time), 'n'=>(date('n', $time)-1), 'j'=>date('j', $time), 'money'=>floatval($row['total'])];
        }
        $data = ['status'=>0, 'data'=>$list];
        $this->ajaxReturn($data);
    }

    public function user() {
        $this->display();
    }

    public function userData() {
        $withdrawModel = M('User'); // 实例化User对象
        $results = $withdrawModel->field('count(id) total, FROM_UNIXTIME(registertime, "%Y-%m-%d") date')->where('status=1')->group('date')->select();
         $list = [];
        foreach ($results as $row) {
            $time = strtotime($row['date']);
            $list[] = ['Y'=>date('Y', $time), 'n'=>(date('n', $time)-1), 'j'=>date('j', $time), 'money'=>floatval($row['total'])];
        }
        $data = ['status'=>0, 'data'=>$list];
        $this->ajaxReturn($data);
    }
}