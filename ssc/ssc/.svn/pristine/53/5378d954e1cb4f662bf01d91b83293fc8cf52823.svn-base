<?php 
namespace Html\Controller;
use Think\Controller;
class Allk3Controller  extends Controller {
    /**
     * 开始的判断
     */
    public function go_head() {
        $list = array();
        $_data['code'] = $_GET['numb'];
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if (!empty($open_prize_data)) {
            $opencode = $open_prize_data['opencode'];
            $_opencode = explode(',', $opencode);
            $list = array('array'=>$_opencode,'str'=>$opencode,'code'=>$open_prize_data['code'],'opentime'=>$open_prize_data['opentimestamp'],'expect'=>$open_prize_data['  expect'],'status'=>1);
        }
        return $list;
    }
    /**
     * 二不同号、二不同标准
     */
    public function ebth_ebtbz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 175;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
           
            foreach ($list as $k => $v) {
               if(substr_count($v['content'], '&') == 1){
                   $str = explode('&', $v['content']);
                   if(in_array($str[0], $_opencode_array)){
                       if(in_array($str[1], $_opencode_array)){
                           $winPrize[$k] = $v;
                       }
                   }
               }else{
                  $_str = explode('&', $v['content']);
                  if(count(array_intersect($_opencode_array, $_str)) >=2){
                      $winPrize1[$k] = $v;
                  }
                  
               }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    
    /**
     * 二不同号、二不同单式
     */
    public function ebth_ebtds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);

            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 176;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
               if(substr_count($v['content'], '&') == 0){
                   $g = $v['content']%10;
                   $s = ($v['content']/10)%10;
                   if(in_array($g, $_opencode_array)){
                       if(in_array($s, $_opencode_array)){
                           $winPrize[$k] = $v;
                       }
                   }
               }else{
                   $str = explode('&', $v['content']);
                   foreach ($str as $_k => $va) {
                        $_g = $str[$_k]%10;
                        $_s = ($str[$_k]/10)%10;
                        if(in_array($_g, $_opencode_array)){
                            if(in_array($_s, $_opencode_array)){
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
     * 二同号、二同号标准
     */
    public function eth_ethbz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);
            $unique_array = array_unique($_opencode_array);
            if(count($unique_array) == 2){
                $num = 0;//出现2次的值
                $one = 0;//1次
                foreach (array_count_values($_opencode_array) as $_k => $va) {
                        if($va == 2){
                            $num = $_k;
                        }  else {
                            $one = $_k;
                        }
                }
                $_num = $num.$num;
                $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 178;
                $data['issue']  = $opencode['expect'];
                $data['status']  = $opencode['status'];
                $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                     $str = explode(',', $v['content']);
                   if(substr_count($v['content'], '&') == 0){
                       if(in_array($str[0]%10, $unique_array)){
                           if(in_array($str[1], $unique_array)){
                               $winPrize[$k] = $v;
                           }
                       }
                   }else{
                       if(in_array($_num, explode('&', $str[0]))){
                           if(in_array($one, explode('&', $str[1]))){
                               $winPrize1[$k] = $v;
                           }
                       }                 


                   }
                }
                $winPrize = array_merge($winPrize,$winPrize1);
                
            }
        }
          return $winPrize;

    }
    
    
    /**
     * 二同号、二同号单式
     */
    public function eth_ethds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);
            $unique_array = array_unique($_opencode_array);
            if(count($unique_array) == 2){
                $num = 0;//出现2次的值
                $one = 0;//1次
                foreach (array_count_values($_opencode_array) as $_k => $va) {
                        if($va == 2){
                            $num = $_k;
                        }  else {
                            $one = $_k;
                        }
                }
                $_num = $num.$num.$one;
                $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 179;
                $data['issue']  = $opencode['expect'];
                $data['status']  = $opencode['status'];
                $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        if($v['content'] == $_num){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $value) {
                            if($value == $_num){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($winPrize,$winPrize1);
                
            }
        }
          return $winPrize;

    }
    
    
    /**
     * 三不同号、三不同标准
     */
    public function sbth_sbtbz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 181;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $str = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 2){
                   if(array_sum($str) == array_sum($_opencode_array)){
                       $winPrize[$k] = $v;
                   }
                }else{
                    if(array_sum($str) >= array_sum($_opencode_array)){
                       $winPrize1[$k] = $v;
                   }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;

    }
    
    
    /**
     * 三不同号、三不同单式
     */
    public function sbth_sbtds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 182;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $str = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                    $a = $v['content'];//任意
                    $gewei = $a%10;
                    $a = (int)($a/10);
                    $shiwei = $a%10;
                    $baiwei = (int)($a/10);
                   if($gewei + $shiwei + $baiwei == array_sum($_opencode_array)){
                       $winPrize[$k] = $v;
                   }
                }else{
                    foreach ($str as $va) {
                        $_a = $va;//任意
                        $_gewei = $_a%10;
                        $_a = (int)($_a/10);
                        $_shiwei = $_a%10;
                        $_baiwei = (int)($_a/10);
                        if($_gewei + $_shiwei + $_baiwei == array_sum($_opencode_array)){
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
     * 三不同号、三不同和值
     */
    public function sbth_sbthz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 183;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                   if($v['content'] == array_sum($_opencode_array)){
                       $winPrize[$k] = $v;
                   }
                }else{
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == array_sum($_opencode_array)){
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
     * 三同号、三同号单选
     */
    public function sth_sthdx() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $intCode = str_replace(',','',$_opencode);
            $_opencode_array = explode(',', $_opencode);
            if(count(array_unique($_opencode_array)) == 1){
                $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 185;
                $data['issue']  = $opencode['expect'];
                $data['status']  = $opencode['status'];
                $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                       if($v['content'] == $intCode){
                           $winPrize[$k] = $v;
                       }
                    }else{
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            if($va == $intCode){
                                $winPrize1[$k] = $v;
                            }
                        }

                    }
                }
                $winPrize = array_merge($winPrize,$winPrize1);
                
            }
        }
          return $winPrize;
    }
    
    /**
     * 三同号、三同号通选
     */
    public function sth_sthtx() {
        $opencode = $this->go_head();
        $winPrize = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $intCode = str_replace(',','',$_opencode);
            $_opencode_array = explode(',', $_opencode);
            if(count(array_unique($_opencode_array)) == 1){
                $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 186;
                $data['issue']  = $opencode['expect'];
                $data['status']  = $opencode['status'];
                $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                
                foreach ($list as $k => $v) {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($intCode == $va){
                            $winPrize[$k] = $v;
                        }
                    }

                }
                
            }
        }
          return $winPrize;
    }
    
    /**
     * 三同号、三连号通选
     */
    public function sth_slhtx() {
        $opencode = $this->go_head();
        $winPrize = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $a = substr($_opencode,0,1);
            $b = substr($_opencode,2,1);
            $c = substr($_opencode,4,1);
            $intCode = str_replace(',','',$_opencode);
            if($b - $a == 1 && $c -$b == 1){
                $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 187;
                $data['issue']  = $opencode['expect'];
                $data['status']  = $opencode['status'];
                $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($intCode == $va){
                            $winPrize[$k] = $v;
                        }
                    }

                }
                
            }
        }
            return $winPrize;
    }
    
    /**
     * 和值
     */
    public function hz1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 173;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($opencode_array)){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == array_sum($opencode_array)){
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
     * 所有快三数组整合
     * @return type
     */
    public function all_k3_winPriz_array() {
        $ebth_ebtbz = $this->ebth_ebtbz();
        $ebth_ebtds = $this->ebth_ebtds();
        $eth_ethbz = $this->eth_ethbz();
        $eth_ethds = $this->eth_ethds();
        $sbth_sbtbz = $this->sbth_sbtbz();
        $sbth_sbtds = $this->sbth_sbtds();
        $sbth_sbthz = $this->sbth_sbthz();
        $sth_sthdx = $this->sth_sthdx();
        $sth_sthtx = $this->sth_sthtx();
        $sth_slhtx = $this->sth_slhtx();
        $hz1 = $this->hz1();
        
       // $winPrize = array_merge_recursive($ebth_ebtbz,$ebth_ebtds,$eth_ethbz,$eth_ethds,$sbth_sbtbz,$sbth_sbtds,$sbth_sbthz,$sth_sthdx,$sth_sthtx,$sth_slhtx,$hz1);
        $array_sum = array_merge_recursive($ebth_ebtbz,$ebth_ebtds,$eth_ethbz,$eth_ethds,$sbth_sbtbz,$sbth_sbtds,$sbth_sbthz,$sth_sthdx,$sth_sthtx,$sth_slhtx,$hz1);
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
            $map['category_id'] = $_GET['numb'];
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
            $map['category_id'] = $_GET['numb'];
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