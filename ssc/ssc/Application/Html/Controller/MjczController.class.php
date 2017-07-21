<?php 
namespace Html\Controller;
use Think\Controller;
class MjczController  extends Controller {
    /**
     * 时时彩、数字
     */
    public function ssc_num() {
        $data['pid'] = 369;  //数字
        $data['playname'] = array('LT',10);  
        $list = M('play_way')->where($data)->order('playname ASC')->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        exit(json_encode($return));
//        exit(json_encode($newList,true));
        return  $newList;
    }
    /**
     * 时时彩、中文
     * @return type
     */
    public function ssc_chinese() {
        $data['pid'] = 380; 
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        return json_encode($newList,true);
        return  $newList;
    }
    /**
     * 时时彩、总和
     */
    public function sscSum() {
        $data['pid'] = 293; 
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        return json_encode($newList,true);
        return  $newList;
    }
    
    /**
     * 时时彩、龙、虎、和
     */
    public function ssc_animal() {
        $data['pid'] = 298; 
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        return json_encode($newList,true);
        return  $newList;
    }
    /**
     * 整合上面的
     */
    public function sum_array() {
       $ssc_animal =  $this->ssc_animal();
       $ssc_sum =  $this->ssc_num();
       $ssc_chinese =  $this->ssc_chinese();
       $sscSum =  $this->sscSum();
       $reture = array('ssc_animal'=>$ssc_animal,'ssc_num'=>$ssc_sum,'ssc_chinese'=>$ssc_chinese,'sscSum'=>$sscSum);
//       print_r($reture);
//       $this->ajaxReturn($return); 
       exit(json_encode($reture,true));
    }



    /*11选5数据*/
    public function j11x5_num() {
        $data['pid'] = 343;  //数字
        /*$data['playname'] = array('LT',10);*/  
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        exit(json_encode($return));
//        exit(json_encode($newList,true));
        return  $newList;
    }
    /**
     * 11选5、中文
     * @return type
     */
    public function j11x5_chinese() {
        $data['pid'] = 338; 
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        return json_encode($newList,true);
        return  $newList;
    }
    /**
     * 11选5、总和
     */
    public function j11x5_Sum() {
        $data['pid'] = 355; 
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        return json_encode($newList,true);
        return  $newList;
    }
    
    /**
     * 11选5、龙、虎、和
     */
    public function j11x5_animal() {
        $data['pid'] = 360; 
        $list = M('play_way')->where($data)->select();
        $newList = array();
        foreach ($list as $k => $v) {
            $newList[$k]['id'] =  $v['id'];
            $newList[$k]['value'] =  $v['max_bonus'];
            $newList[$k]['playname'] =  $v['playname'];
        }
//        print_r($newList);
//        return json_encode($newList,true);
        return  $newList;
    }
    /**
     * 整合上面的
     */
    public function j11x5_array() {
       $j11x5_animal =  $this->j11x5_animal();
       $j11x5_num =  $this->j11x5_num();
       $j11x5_chinese =  $this->j11x5_chinese();
       $j11x5_Sum =  $this->j11x5_Sum();
       $reture = array('ssc_animal'=>$j11x5_animal,'ssc_num'=>$j11x5_num,'ssc_chinese'=>$j11x5_chinese,'sscSum'=>$j11x5_Sum);
//       print_r($reture);
//       $this->ajaxReturn($return); 
       exit(json_encode($reture,true));
    }


    
    
    public function mjtz() {
        if($_POST['lt_project']){
            //判断投注期数是否截至
//            $cateInfo['cate_id'] = $_POST['lotteryid'];
//            $cateInfo['period'] = $_POST['lt_issue_start'];
//            $cate_date_time = M('cate_date_time')->where($cateInfo)->find();
//            // print_r($cate_date_time);
//            if ($cate_date_time['timeStamp'] <= time()) {
//                echo '投注时间已截止';exit;
//            }
            if($_POST['play'] == 'mjwf'){
                    $data['type'] = 1;
            }
            //用户投注数据
            foreach ($_POST['lt_project'] as  $v) {
                $newStr = json_decode(preg_replace("/\'/", '"', "$v"),true);
                //扣钱[
                $userInfo['id'] = $_COOKIE['userId'];
                $_userInfo = M('user')->where($userInfo)->find();
                $userInfo['money'] = $_userInfo['money'] - $newStr['money'];
                if ($userInfo['money'] < 0) {
                    echo '账户资金不足';exit;
                }else{
                    M('user')->save($userInfo);
                }

                $data['userId'] = $_COOKIE['userId'];
                $data['category_id'] = $_POST['lotteryid'];
                $data['content'] = $newStr['desc'];
                $data['issue'] = $_POST['lt_issue_start'];
                $data['time'] = time();
                $data['orderNum'] = md5(time().$_COOKIE['userId']);
                $data['money'] = $newStr['money'];
                $data['play_way_id'] = $newStr['methodid'];
                M('bet_record')->add($data);
            }
            //用户花钱记录
            $user['userId'] = $_COOKIE['userId'];
            $user['type'] = 4;  //(1、充值 2、提现 3、转账 4、下注)
            $user['money'] = $newStr['money'];
            $user['category_id'] = $_POST['lotteryid'];
            $user['time'] = time();
            M('user_money_log')->add($user);

        }
        $return = array('stats'=>'success');
        $this->ajaxReturn($return);
    }

    

    
    
    
    
    /**
     * lotteryid:6&flag:mjwf
     */
    public function return_gd11x5_mj() {
        if($_POST['lotteryid'] && $_POST['flag'] == 'mjwf'){
            $where['code']= $_POST['lotteryid'];
            $data['cate_id'] = $where['code'];
            $data['timeStamp'] = array('EGT',time());
            $data['date'] = date("Y-m-d");
            $cate_date_time_info = M('cate_date_time')->order('period ASC')->where($data)->find();
            $enissue = $cate_date_time_info['issue']; //当期期数
            $entime =   date('Y-m-d').' '.$cate_date_time_info['open_time'];
            $datime = date('Y-m-d H:i:s'); //现在时间
            $where['expect']= $enissue - 1;
            $openPrize_info = M('open_prize_data')->where($where)->order('expect DESC')->find();
    //        print_r($openPrize_info);exit;
            $opissue =  $where['expect'];//上一期期数

            if(!empty($openPrize_info)){
                $str = '';
                $code = '';
                foreach (explode(',', $openPrize_info['opencode']) as $k => $v) {
                    if($k == 4){
                         $str = "'$v'";
                    }  else {
                        $code .= "'$v'".',' ;
                    }
                }
                $code = '['.$code.$str.']';//上一期开奖号
            }  else {
                $x = 'x';
                $code = '['."'$x'".$str.']';
            }
            //{'enissue':'201706220690','datime':'2017-06-22 11:29:11','entime':'2017-06-22 11:30:11','opissue':'201706220689','code':['4','4','4','0','5']};
            $a = "'enissue'".':'."'$enissue'".',';
            $b = "'datime'".':'."'$datime'".',';
            $c = "'entime'".':'."'$entime'".',';
            $d = "'opissue'".':'."'$opissue'".',';
            $e = "'code'".':'.$code;
            $return = '{'.$a.$b.$c.$d.$e.'}';
            $this->ajaxReturn($return);
        }
    }
    
    
    
    /**
     * lotteryid:11&flag:mjwf
     */
    public function return_jsk3_mj() {
        if($_POST['lotteryid'] && $_POST['flag'] == 'mjwf'){
            $where['code']= $_POST['lotteryid'];
            $data['cate_id'] = $where['code'];
            $data['timeStamp'] = array('EGT',time());
            $data['date'] = date("Y-m-d");
            $cate_date_time_info = M('cate_date_time')->order('period ASC')->where($data)->find();
            $enissue = $cate_date_time_info['issue']; //当期期数
            $entime =   date('Y-m-d').' '.$cate_date_time_info['open_time'];
            $datime = date('Y-m-d H:i:s'); //现在时间
            $where['expect']= $enissue - 1;
            $openPrize_info = M('open_prize_data')->where($where)->order('expect DESC')->find();
    //        print_r($openPrize_info);exit;
            $opissue =  $where['expect'];//上一期期数

            if(!empty($openPrize_info)){
                $str = '';
                $code = '';
                foreach (explode(',', $openPrize_info['opencode']) as $k => $v) {
                    if($k == 4){
                         $str = "'$v'";
                    }  else {
                        $code .= "'$v'".',' ;
                    }
                }
                $code = '['.$code.$str.']';//上一期开奖号
            }  else {
                $x = 'x';
                $code = '['."'$x'".$str.']';
            }
            //{'enissue':'201706220690','datime':'2017-06-22 11:29:11','entime':'2017-06-22 11:30:11','opissue':'201706220689','code':['4','4','4','0','5']};
            $a = "'enissue'".':'."'$enissue'".',';
            $b = "'datime'".':'."'$datime'".',';
            $c = "'entime'".':'."'$entime'".',';
            $d = "'opissue'".':'."'$opissue'".',';
            $e = "'code'".':'.$code;
            $return = '{'.$a.$b.$c.$d.$e.'}';
            $this->ajaxReturn($return);
        }
    }
    
    /**
     * lotteryid:17&flag:mjwf
     */
    public function return_cqkl10f_mj() {
        if($_POST['lotteryid'] && $_POST['flag'] == 'mjwf'){
            $where['code']= $_POST['lotteryid'];
            $data['cate_id'] = $where['code'];
            $data['timeStamp'] = array('EGT',time());
            $data['date'] = date("Y-m-d");
            $cate_date_time_info = M('cate_date_time')->order('period ASC')->where($data)->find();
            $enissue = $cate_date_time_info['issue']; //当期期数
            $entime =   date('Y-m-d').' '.$cate_date_time_info['open_time'];
            $datime = date('Y-m-d H:i:s'); //现在时间
            $where['expect']= $enissue - 1;
            $openPrize_info = M('open_prize_data')->where($where)->order('expect DESC')->find();
    //        print_r($openPrize_info);exit;
            $opissue =  $where['expect'];//上一期期数

            if(!empty($openPrize_info)){
                $str = '';
                $code = '';
                foreach (explode(',', $openPrize_info['opencode']) as $k => $v) {
                    if($k == 4){
                         $str = "'$v'";
                    }  else {
                        $code .= "'$v'".',' ;
                    }
                }
                $code = '['.$code.$str.']';//上一期开奖号
            }  else {
                $x = 'x';
                $code = '['."'$x'".$str.']';
            }
            //{'enissue':'201706220690','datime':'2017-06-22 11:29:11','entime':'2017-06-22 11:30:11','opissue':'201706220689','code':['4','4','4','0','5']};
            $a = "'enissue'".':'."'$enissue'".',';
            $b = "'datime'".':'."'$datime'".',';
            $c = "'entime'".':'."'$entime'".',';
            $d = "'opissue'".':'."'$opissue'".',';
            $e = "'code'".':'.$code;
            $return = '{'.$a.$b.$c.$d.$e.'}';
            $this->ajaxReturn($return);
        }
    }
    
    

    
    
    
    /**
     * lotteryid:28&flag:mjwf
     */
    public function return_fc3d_mj() {
        if($_POST['lotteryid'] && $_POST['flag'] == 'mjwf'){
            $where['code']= $_POST['lotteryid'];
            $data['cate_id'] = $where['code'];
            $data['timeStamp'] = array('EGT',time());
            $data['date'] = date("Y-m-d");
            $cate_date_time_info = M('cate_date_time')->order('period ASC')->where($data)->find();
            $enissue = $cate_date_time_info['issue']; //当期期数
            $entime =   date('Y-m-d').' '.$cate_date_time_info['open_time'];
            $datime = date('Y-m-d H:i:s'); //现在时间
            $where['expect']= $enissue - 1;
            $openPrize_info = M('open_prize_data')->where($where)->order('expect DESC')->find();
    //        print_r($openPrize_info);exit;
            $opissue =  $where['expect'];//上一期期数

            if(!empty($openPrize_info)){
                $str = '';
                $code = '';
                foreach (explode(',', $openPrize_info['opencode']) as $k => $v) {
                    if($k == 4){
                         $str = "'$v'";
                    }  else {
                        $code .= "'$v'".',' ;
                    }
                }
                $code = '['.$code.$str.']';//上一期开奖号
            }  else {
                $x = 'x';
                $code = '['."'$x'".$str.']';
            }
            //{'enissue':'201706220690','datime':'2017-06-22 11:29:11','entime':'2017-06-22 11:30:11','opissue':'201706220689','code':['4','4','4','0','5']};
            $a = "'enissue'".':'."'$enissue'".',';
            $b = "'datime'".':'."'$datime'".',';
            $c = "'entime'".':'."'$entime'".',';
            $d = "'opissue'".':'."'$opissue'".',';
            $e = "'code'".':'.$code;
            $return = '{'.$a.$b.$c.$d.$e.'}';
            $this->ajaxReturn($return);
        }
    }
    
    

    
}
    

    




?>