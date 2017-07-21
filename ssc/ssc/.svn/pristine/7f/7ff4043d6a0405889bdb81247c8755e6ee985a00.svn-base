<?php 
namespace Html\Controller;
use Think\Controller;
class Bjpk10Controller  extends Controller {
    /**
     * 开始的判断
     */
    public function go_head() {
        $opencode = array();
        $_data['code'] = 26;
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if(!empty($open_prize_data)){
            $_opencode = explode(',', $open_prize_data['opencode']);
            $opencode = array('array'=>$_opencode,'str'=>$open_prize_data['opencode'],'code'=>$open_prize_data['code'],'opentime'=>$open_prize_data['opentimestamp'],'expect'=>$open_prize_data['expect'],'status'=>1);
            
        }
        return $opencode;
    }

    /**
     * 定位胆
     */
    public function dwd() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if(!empty($opencode)){
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 155;
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $str = explode('|', $v['content']);
                foreach ($str as $_k => $_v) {
                    if(substr_count($str[$_k], '&') == 0){
                        if($str[$_k]){
                            if($str[$_k] == $opencode['array'][$_k]){
                                $winPrize[$k] = $v; 
                            }
                        }

                    }  else {
                        if($str[$k]){
                           if(in_array($opencode['array'][$_k], explode('&', $str[$_k]))){
                               $winPrize1[$k] = $v; 
                           }
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }

    /**
     * 精确前四、直选复式
     */
    public function jqqs_xzfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,11); 
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 161;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $str = explode('|', $v['content']);
                foreach ($str as $_k => $_v) {
                    if(substr_count($str[$_k], '&') == 0){
                        if($str[$_k]){
                            if($str[$_k] == $_opencode_array[$_k]){
                                $winPrize[$k] = $v; 
                            }
                        }

                    }  else {
                        if($str[$k]){
                           if(in_array($_opencode_array[$_k], explode('&', $str[$_k]))){
                               $winPrize1[$k] = $v; 
                           }
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }

    /**
     * 精确前四、直选单式
     */
    public function jqqs_xzds() {
        $opencode = $this->go_head();
        $winPrize = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,11); 
            $_opencode_array = explode(',', $_opencode);
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 162;
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $str = explode(' ', $v['content']);
                foreach ($str as $_k => $_v) {
                    if($str[$_k] == $_opencode_array[$_k]){
                        $winPrize[$k] = $v;
                    }
                }
            }
        }
        return $winPrize;
    }

    
    /**
     * 精确前三、直选复式
     */
    public function jqqs_xzfs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,8); 
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 164;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $$opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode('|', $v['content']);
                    foreach ($str as $_k => $va) {
                        if($str[$_k] == $_opencode_array[$_k]){
                             $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    $_str = explode('|', $v['content']);
                    foreach ($_str as $key => $value) {
                        if(in_array($_opencode_array[$key], explode('&', $_str[$key]))){
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }

    /**
     * 精确前三、直选单式
     */
    public function jqqs_xzds1() {
        $opencode = $this->go_head();
        $winPrize = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,8); 
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 165;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $str = explode(' ', $v['content']);
                foreach ($str as $key => $value) {
                    if($str[$key] == $_opencode_array[$key]){
                        $winPrize[$k] = $v;
                    }
                }
            }
        }
        return $winPrize;
    }
    
    /**
     * 精确前二、直选复式
     */
    public function jqqe_xzfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,5); 
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 167;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                        $str = explode('|', $v['content']);
                        if($str[0] == $_opencode_array[0]){
                            if($str[1] == $_opencode_array[1]){
                                $winPrize[$k] = $v;
                            }
                        }
                }  else {
                    $_str = explode('|', $v['content']);
                    if(in_array($_opencode_array[0], explode('&', $_str[0]))){
                         if(in_array($_opencode_array[1], explode('&', $_str[1]))){
                             $winPrize1[$k] = $v;
                         }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    /**
     * 精确前二、直选单式
     */
    public function jqqe_xzds() {
        $opencode = $this->go_head();
        $winPrize = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,5); 
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 168;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $str = explode(' ', $v['content']);
                if($str[0] == $_opencode_array[0]){
                    if($str[1] == $_opencode_array[1]){
                        $winPrize[$k] = $v;
                    }
                }
            }
        }
        return $winPrize;
    }
    
    
    /**
     * 精确前一
     */
    public function jqqy() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if(!empty($opencode)){
            $_opencode = substr($opencode['str'],0,2); 
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 159;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
               if(substr_count($v['content'], '&') == 0){
                  if($_opencode == $v['content']){
                      $winPrize[$k] = $v;
                  }
               }else{
                  $str = explode('&', $v['content']);
                  if(in_array($_opencode, $str)){
                      $winPrize1[$k] = $v;
                  }

               }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    /**
     * 北京PK拾数组整合
     * @return type
     */
    public function all_bjpk10_winPriz_array() {
        $dwd = $this->dwd();
        $jqqs_xzfs = $this->jqqs_xzfs();
        $jqqs_xzds = $this->jqqs_xzds();
        $jqqs_xzfs1 = $this->jqqs_xzfs1();
        $jqqs_xzds1 = $this->jqqs_xzds1();
        $jqqe_xzds = $this->jqqe_xzds();
        $jqqy = $this->jqqy();
        $jqqe_xzfs = $this->jqqe_xzfs();
        //$winPrize = array_merge_recursive($dwd,$jqqs_xzfs,$jqqs_xzds,$jqqs_xzfs1,$jqqs_xzds1,$jqqe_xzds,$jqqy,$jqqe_xzfs);
        $array_sum = array_merge_recursive($dwd,$jqqs_xzfs,$jqqs_xzds,$jqqs_xzfs1,$jqqs_xzds1,$jqqe_xzds,$jqqy,$jqqe_xzfs);
        $winPrize = [];
        foreach ($array_sum as $v){
            if(!empty($v)){
                $winPrize[] = $v;
            }
        }

        if (!empty($winPrize)) {
            $winPrize = $winPrize[0];
            $record_id_array = array();
            foreach ($winPrize as $v) {
                $record_id_array[] = $v['id'];
            }
            $map['id'] = array('not in',$record_id_array);
            $map['issue'] = $winPrize[0]['issue'];
            $map['category_id'] = 26;
            $map['status'] = 1;
            $list = M('bet_record')->where($map)->select();
            foreach ($list as $va) {
                $data['id'] = $va['id'];
                $data['status'] = 3;
                $data['profitLoss'] = 0 - $va['money'];
                M('bet_record')->save($data);
            }
            BonusSend($winPrize,1);
        }  else {
            $map['category_id'] = 26;
            $map['status'] = 1;
            $list = M('bet_record')->where($map)->select();
            foreach ($list as $va) {
                $data['id'] = $va['id'];
                $data['status'] = 3;
                $data['profitLoss'] = 0 - $va['money'];
                M('bet_record')->save($data);
            }
        }

    }
}
?>