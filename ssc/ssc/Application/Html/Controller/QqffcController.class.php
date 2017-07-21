<?php 
namespace Html\Controller;
use Think\Controller;
class QqffcController extends Controller {
    
     /**
     * 腾讯分分彩开奖数据获取
     */
    public function judge() {
        $list = array();
        $_data['code'] = 40;     
//        $_data['expect'] = 201706160056;
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
//        print_r($open_prize_data);exit;
//        print_r(date('H:i',$open_prize_data['opentimestamp']));exit;
//        print_r(M('open_prize_data')->getLastSql());exit;
        if(!empty($open_prize_data)){
            $opencode = $open_prize_data['opencode'];
            $_opencode = explode(',', $opencode);
            $list = array('array'=>$_opencode,'str'=>$opencode,'code'=>$open_prize_data['code'],'opentime'=>$open_prize_data['opentimestamp'],'expect'=>$open_prize_data['expect'],'status'=>1);
           
        }
//        print_r($list);
        return $list;
    }
    
    
    /**
     * 五星、直选复式  play_way_id 138   issue 期号    opentime 开奖时间   code 彩种   opencode 开奖码
     */        
    public function five_zxfs() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $_opencode = explode(',', $openPrize['str']);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 3;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
//            print_r(M('bet_record')->getLastSql());exit;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if($this->comparison($_opencode[0],$str[0])){
                    if($this->comparison($_opencode[1],$str[1])){
                        if($this->comparison($_opencode[2],$str[2])){
                            if($this->comparison($_opencode[3],$str[3])){
                                if($this->comparison($_opencode[4],$str[4])){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }
                }
            }
        }
        if(!empty($winPrize)){
            return  $winPrize;
        }
    }
    
    /**
     * 比对字符串是否相等
     */
    public function comparison($a,$b) {
//        print_r($a);
//        print_r($b);exit;
        if(is_numeric($b)){
            if($a == $b){
                return true;
            }  else {
                return false;
            }
        }  else {
            $_b = explode('&', $b);
            if(in_array($a, $_b)){
                return true;
            }  else {
                return false;
            }
        }
    }
    /**
     * 五星、直选单式
     */
    public function five_zxds() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $openCode =  str_replace(',' ,'',$openPrize['str']);
            $data['category_id']  = $openPrize['code'];   //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 4;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $new = array(); //有&   64444&84423
            foreach ($list as $k => $v) {
                $str = $v['content'];
                if(strpos($str, '&')){
                    $new[$k] = $v;
                }  else {
                    if($str == $openCode){
                        $winPrize[$k] = $v;
                    }
                }
            }
            foreach ($new as $_k => $va) {
                $_str = explode('&', $v['content']);
                foreach ($_str as $_v) {
                    if($_v == $openCode){
                        $winPrize[$_k] = $va;
                    }
                }
            }
        }
        if(!empty($winPrize)){
            return  $winPrize;
        }
    }
    
   /**
     * 五星、组选120
     */
    public function five_zx120() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $_opencode = explode(',', $openPrize['str']);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 7;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $str = explode('&', $v['content']);
                if(count($str) == 10){
                    foreach ($_opencode as $va) {
                        if(in_array($va,$str)){
                            $winPrize[$k] = $v;
                        }
                    }

                }  else {
                    if($this->comparison($_opencode[0],$str[0])){
                        if($this->comparison($_opencode[1],$str[1])){
                            if($this->comparison($_opencode[2],$str[2])){
                                if($this->comparison($_opencode[3],$str[3])){
                                    if($this->comparison($_opencode[4],$str[4])){
                                        $winPrize[$k] = $v;
                                    }
                                }
                            }
                        }
                    }
                }

            }
        }
        if(!empty($winPrize)){
            return  $winPrize;
        }
    }
    /**
     * 五星、组选60
     * @param type $param
     */
    public function five_zx60() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode, -1,1); 
            $b = substr($opencode, -3,1);
            if($a == $b){
                $c = substr($opencode, 0,5);
                $cs = explode(',', $c);
    //            print_r($cs);
                $_c =  str_replace(',' ,'',$c);
    //            print_r($_c);
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 8;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
    //        print_r($list);
                foreach ($list as $k => $v) {
                    $str = explode(',', $v['content']);
                    if(is_numeric($str[0])){
                        if($str[0] == $a){
                            if(str_replace('&' ,'',$str[1]) == $_c){
                                $winPrize[$k] = $v;
                            }
                        }
                    }  else {
                        if(in_array($a, explode('&', $str[0]))){
                            foreach ($cs as $va) {
                                if(in_array($va, explode('&', $str[1]))){
                                    $winPrize[$k] = $v;
                                }
                            }

                        }
                    }
    //                print_r($str);
                }
            }
        }

        if(!empty($winPrize)){
            return  $winPrize;
        }
//        print_r($winPrize);
    }
    /**
     * 五星、组选30
     */
    public function five_zx30() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode, -1,1); 
            $b = substr($opencode, -3,1);
            $d = substr($opencode, -5,1);
            $e = substr($opencode, -7,1);
            $f = substr($opencode, 0,1);
            if($a == $b && $d == $e){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 9;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    $str = explode(',', $v['content']);
                    $_str = explode('&', $str[0]);
                    if(in_array($a, $_str) && in_array($d, $_str)){
                        if(is_numeric($str[1])){
                            if($str[1] == $f){
                                $winPrize[$k] = $v;
                            }
                        }  else {
                            if(in_array($f, explode('&', $str[1]))){
                                $winPrize[$k] = $v;
                            }
                        }
                    }
                }
            }
        }
        if(!empty($winPrize)){return  $winPrize;}

    }
    
    /**
     * 五星、组选20
     */
    public function five_zx20() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode, -1,1); 
            $b = substr($opencode, -3,1);
            $d = substr($opencode, -5,1);
            if($a == $b && $d == $b){
                $c = substr($opencode, 0,3);
                $cs = explode(',', $c);
                $_c =  str_replace(',' ,'',$c);
                $data['category_id']  =  $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 10;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                foreach ($list as $key => $value) {
                    $str = explode(',', $value['content']);
                    if(is_numeric($str[0])){
                        if($str[0] == $a){
                            if($_c == str_replace('&' ,'',$str[1])){
                                $winPrize[$key] = $value;
                            }
                        }
                    }else{
                        if(in_array($a, explode('&', $str[0]))){
                            if(in_array($cs[0], explode('&', $str[1])) && in_array($cs[1], explode('&', $str[1]))){
                                $winPrize[$key] = $value;
                            }
                        }
                    }
                }
                
            }
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 五星、组选10
     */
    public function five_zx10() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode, -1,1); 
            $b = substr($opencode, -3,1);
            $d = substr($opencode, -5,1);
            $e = substr($opencode, -7,1);
            $f = substr($opencode, 0,1);
            if($a == $b && $b == $d && $e == $f){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 11;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    $str = explode(',', $v['content']);
                    if(is_numeric($str[0])){
                        if($str[0] == $a){
                            if(is_numeric($str[1])){
                                if($str[1] == $e){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }  else {
                        if(in_array($a, explode('&', $str[0]))){
                            if(is_numeric($str[1])){
                                if($str[1] == $e){
                                    $winPrize[$k] = $v;
                                }
                            }  else {
                                if(in_array($e, explode('&', $str[1]))){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }
                }
                
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 五星、组选5
     */
    public function five_zx5() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode, -1,1); 
            $b = substr($opencode, -3,1);
            $d = substr($opencode, -5,1);
            $e = substr($opencode, -7,1);
            $f = substr($opencode, 0,1);
            if($a == $b && $b == $d && $e == $d){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 12;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
    //            print_r($list);
                foreach ($list as $k => $v) {
                    $str = explode(',', $v['content']);
                    if(is_numeric($str[0])){
                        if($str[0] == $a){
                            if(is_numeric($str[1])){
                                if($str[1] == $f){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }  else {
                        if(in_array($a, explode('&', $str[0]))){
                            if(is_numeric($str[1])){
                                if($str[1] == $f){
                                    $winPrize[$k] = $v;
                                }
                            }  else {
                                if(in_array($f, explode('&', $str[1]))){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }
                }
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 五星、一帆风顺
     */
    public function five_yffs() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $_opencode = explode(',', $openPrize['str']);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 14;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(is_numeric($v['content'])){
                    if(in_array($v['content'], $_opencode))$winPrize[$k] = $v;
                }else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                         if(in_array($va, $_opencode))$winPrize[$k] = $v;
                    }
                }
            }
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 五星、好事成双
     */
    public function five_hscs() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 15;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(is_numeric($v['content'])){
                    if(substr_count($opencode, $v['content']) == 2)$winPrize[$k] = $v;
                }else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            if(substr_count($opencode, $va) == 2)$winPrize[$k] = $v;
                        }
                }

            }
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 五星、三星报喜
     */
    public function five_sxbx() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 16;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(is_numeric($v['content'])){
                    if(substr_count($opencode, $v['content']) == 3)$winPrize[$k] = $v;
                }else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            if(substr_count($opencode, $va) == 3)$winPrize[$k] = $v;
                        }
                }

            }
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 五星、四季发财
     */
    public function five_sjfc() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 17;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(is_numeric($v['content'])){
                    if(substr_count($opencode, $v['content']) == 4)$winPrize[$k] = $v;
                }else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            if(substr_count($opencode, $va) == 4)$winPrize[$k] = $v;
                        }
                }

            }
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 四星、直选复式
     */
    public function four_zxhs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 20;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $opencode = substr($opencode, 2, 7); 
            $_opencode =  str_replace(',' ,'',$opencode);
            $opencode_s = explode(',', $opencode);
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 7){
                   if(str_replace(',' ,'',$v['content']) == $_opencode){
                       $winPrize[$k] = $v;
                   }  
               }else {
                       $str = explode(',',$v['content']);
                       foreach ($str as $_k => $va) {
                            if(in_array($opencode_s[$_k], explode('&', $va))){
                                $another[$k] = $v;
                            }    
                       }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 四星、直选单式
     */
    public function four_zxds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 21;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $opencode = substr($opencode, 2, 7); 
            $_opencode =  str_replace(',' ,'',$opencode);
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 4){
                   if(str_replace(',' ,'',$v['content']) == $_opencode){
                       $winPrize[$k] = $v;
                   }  
               }else {
                   $str = explode('&', $v['content']);
                   foreach ($str as $va) {
                       if($va == $_opencode){
                           $another[$k] = $v;
                       }
                   }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 四星、组选24
     */
    public function four_zx24() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 24;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
    //        print_r($list);exit;substr($opencode, -1, 1); 
            $opencode = substr($opencode, 2, 7); 
    //        print_r($opencode);exit;
            $_opencode =  str_replace(',' ,'',$opencode);
            $opencode_s = explode(',', $opencode);
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 7){
                   if(str_replace('&' ,'',$v['content']) == $_opencode){
                       $winPrize[$k] = $v;
                   }  
               }else {
                   $str = explode('&', $v['content']);
                   foreach ($str as $ke => $va) {
                       if(in_array($va, $opencode_s)){
                            $another[$k] = $v;
                       }
                   }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 四星、组选12
     */
    public function four_zx12() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 2, 7); 
            $a = substr($opencode, -1, 1);  //8
            $b = substr($opencode, -3, 1);  //8
            $c = substr($opencode, 0, 3);  //0,6
            $cs = explode(',', $c);
            $_c =  str_replace(',' ,'',$c);
            if($a == $b){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 25;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                   if(strlen($v['content']) == 5){
                       $str = explode(',', $v['content']);
                       if($str[0] == $a && $_c == str_replace('&' ,'',$str[1])){
                           $winPrize[$k] = $v;
                       }
                   }else {
                       $_str = explode(',', $v['content']);
                       if(in_array($a, explode('&', $_str[0]))){
                           if(in_array($cs[0], explode('&', $_str[1])) && in_array($cs[1], explode('&', $_str[1]))){
                                $another[$k] = $v;
                           }
                       }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 四星、组选6
     */
    public function four_zx6() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode, -1, 1);  //8
            $b = substr($opencode, -3, 1);  //8
            $e =  substr($opencode, -5, 1);  //2
            $f =  substr($opencode, -7, 1);  //2
            if($a == $b && $e == $f){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 26;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                   if(strlen($v['content']) == 3){
                       $str = explode('&', $v['content']);
                       if($str[0] == $e && $str[1] == $a){
                           $winPrize[$k] = $v;
                       }
                   }else {
                       $_str = explode('&', $v['content']);
                       if(in_array($e, $_str) && in_array($a, $_str)){
                           $another[$k] = $v;
                       }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
                
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 四星、组选4
     */
    public function four_zx4() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];  
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 27;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 3){
                   $str = explode(',', $v['content']);
                   if(substr_count($opencode, $str[0]) == 3 && substr_count($opencode, $str[1]) == 1){
                       $winPrize[$k] = $v;
                   }
               }else {
                  $_str = explode(',', $v['content']);
                  foreach (explode('&', $_str[0]) as $va) {
                      if(substr_count($opencode, $va) == 3){
                          foreach (explode('&', $_str[1]) as $_va) {
                              if(substr_count($opencode, $_va) == 1){
                                   $another[$k] = $v;
                              }
                          }
                      }
                  }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 后三、直选复式
     */
    public function backThree_zxfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 4, 5);
            $_opencode = str_replace(',','',$opencode);
            $codeArray = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 30;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 5){
                        if(str_replace(',','',$v['content']) == $_opencode){
                            $winPrize[$k] = $v;
                        }
               }else {
                    $str = explode(',', $v['content']);
                    foreach ($str as $_k => $va) {
                        if(in_array($codeArray[$_k], explode('&', $va))){
                             $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
   
    
    /**
     * 中三、直选复式
     */
    public function inThree_zxfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 2,5);
            $_opencode = str_replace(',','',$opencode);
            $codeArray = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 48;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 5){
                        if(str_replace(',','',$v['content']) == $_opencode){
                            $winPrize[$k] = $v;
                        }
               }else {
                    $str = explode(',', $v['content']);
    //                print_r($str);
                    foreach ($str as $_k => $va) {
                        if(in_array($codeArray[$_k], explode('&', $va))){
                             $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、直选单式
     */
    public function backThree_zxds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 4, 5);
            $_opencode = str_replace(',','',$opencode);
            $codeArray = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 31;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 3){
                        if($v['content'] == $_opencode){
                            $winPrize[$k] = $v;
                        }
               }else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $_opencode){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 中三、直选单式
     */
    public function inThree_zxds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 2, 5);
            $_opencode = str_replace(',','',$opencode);
            $codeArray = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 49;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
               if(strlen($v['content']) == 3){
                        if($v['content'] == $_opencode){
                            $winPrize[$k] = $v;
                        }
               }else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $_opencode){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、直选和值
     */
    public function backThree_zxhz() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 4, 5);
            $codeArray = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 33;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($codeArray)){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    if(array_sum($str) == array_sum($codeArray)){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 中三、直选和值
     */
    public function inThree_zxhz() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode, 2, 5);
            $codeArray = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 51;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($codeArray)){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    if(array_sum($str) == array_sum($codeArray)){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、直选跨度
     */
    public function backThree_zxkd() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $codeArray = explode(',', $opencode);
            $a = $codeArray[1] - $codeArray[0];
            $b = $codeArray[2] - $codeArray[1];
            $c = $codeArray[3] - $codeArray[2];
            $d = $codeArray[4] - $codeArray[3];
            if($a == $b && $b == $c && $c == $d ){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 34;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        if($v['content'] == $a){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            if($va == $a){
                                $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 中三、直选跨度
     */
    public function inThree_zxkd() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode = substr($opencode,2,5);
            $codeArray = explode(',', $opencode);
            $pos = array_search(max($codeArray), $codeArray);
            $_pos = array_search(min($codeArray), $codeArray);
            $max = $codeArray[$pos];
            $min = $codeArray[$_pos];
            $num = $max -  $min;
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 52;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $num){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $num){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    /**
     * 后三、组三复式
     */
    public function backThree_zsfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  //5,8,8
            $opencode_array = explode(',', $_opencode);
            $opencode_two = substr($opencode,0,3); //8,8
            $_opencode =  str_replace(',','',$_opencode); //588 
            $opencode_two =  str_replace(',','',$opencode_two); //88
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 36;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    if(str_replace('&','',$v['content']) == $opencode_two){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    if(in_array($opencode_array[0], $str) && in_array($opencode_array[1], $str) && in_array($opencode_array[2], $str)){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 中三、组三复式
     */
    public function inThree_zsfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,5,8
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 54;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $ss = explode('&', $v['content']);
                    if(in_array($ss[0], $opencode_array)){
                         if(in_array($ss[1], $opencode_array)){
                             $winPrize[$k] = $v;
                         }
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    if(in_array($opencode_array[0], $str) && in_array($opencode_array[1], $str) && in_array($opencode_array[2], $str)){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、组三单式
     */
    public function backThree_zsds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  //5,8,8
            $_opencode =  str_replace(',','',$_opencode); //588 
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 37;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 3){
                    if($v['content'] == $_opencode){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $_opencode){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 中三、组三单式
     */
    public function inThree_zsds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,0,0
            $_opencode_array = explode(',', $_opencode);
            if (count($_opencode_array) != count(array_unique($_opencode_array))) {   
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 55;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                    if(strlen($v['content']) == 3){
                        $bit = ($v['content']%10);
                        $ten = ($v['content']/10)%10;
                        $hundreds = ($v['content']/10)/10;
                        $num = $bit +  $ten + floor($hundreds);
                        if($num == array_sum($_opencode_array)){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            $_bit = ($va%10);
                            $_ten = ($va/10)%10;
                            $_hundreds = ($va/10)/10;
                            $_num = $_bit +  $_ten + floor($_hundreds);
                            if($_num  == array_sum($_opencode_array)){
                                $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    /**
     * 后三、组六复式
     */
    public function backThree_zlfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  //5,8,8
            $_opencode_array = explode(',', $_opencode);
            $_opencode =  str_replace(',','',$_opencode); //588 
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 38;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 5){
                    if(str_replace(',','',$v['content']) == $_opencode){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    if(in_array($_opencode_array[0], $str)){
                         if(in_array($_opencode_array[1], $str)){
                             if(in_array($_opencode_array[2], $str)){
                                  $another[$k] = $v;
                             }
                         }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 中三、组六复式
     */
    public function inThree_zlfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,8,8
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 56;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 5){
                    $str = explode('&', $v['content']);
                    if(in_array($_opencode_array[0], $str)){
                        if(in_array($_opencode_array[1], $str)){
                             if(in_array($_opencode_array[2], $str)){
                                 $winPrize[$k] = $v;
                             }
                        }
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    if(in_array($_opencode_array[0], $_str)){
                        if(in_array($_opencode_array[1], $_str)){
                             if(in_array($_opencode_array[2], $_str)){
                                 $another[$k] = $v;
                             }
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、组六单式
     */
    public function backThree_zlds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  //5,8,8
            $_opencode_array = explode(',', $_opencode);
            $_opencode =  str_replace(',','',$_opencode); //588 
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 39;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 3){
                    if($v['content'] == $_opencode){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $_opencode){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    /**
     * 计算123和  6
     * @param type $str  123
     * @return type
     */
    public function sumStr($str) {
        if($str){
            $str = $str;
        }  else {
            $str = '123';
        }
        $_bit = ($str%10);
        $_ten = ($str/10)%10;
        $_hundreds = ($str/10)/10;
        $_num = $_bit +  $_ten + floor($_hundreds);
        return  $_num;
    }
    
    /**
     * 中三、组六单式
     */
    public function inThree_zlds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,3,2
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 57;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 3){
                    if($this->sumStr($v['content']) == array_sum($_opencode_array)){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($this->sumStr($va) == array_sum($_opencode_array)){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 中三、混合组选
     */
    public function inThree_hhzx() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,3,2
            $_opencode_array = explode(',', $_opencode);
            if(count(array_unique($_opencode_array)) != 1){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 58;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                    if(strlen($v['content']) == 3){
                        if($this->sumStr($v['content']) == array_sum($_opencode_array)){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
                        foreach ($str as $va) {
                            if($this->sumStr($va) == array_sum($_opencode_array)){
                                $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 中三、组选包胆
     */
    public function inThree_zxbd() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,3,2
            $_opencode_array = explode(',', $_opencode);
            if(count(array_unique($_opencode_array)) != 1){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 60;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                foreach ($list as $k => $v) {
                    if(in_array($v['content'], $_opencode_array)){
                        $winPrize[$k] = $v;               
                    }
                }
                if(!empty($winPrize)){return  $winPrize;}
            }
        }

    }
    
    
    /**
     * 中三、和值尾数
     */
    public function inThree_hzws() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,3,2
            $_opencode_array = explode(',', $_opencode);
            $str = array_sum($_opencode_array);
            if(strlen($str) == 1){
                $str = $str;
            }  else {
                $str = substr($str,-1,1);
            }
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 62;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $str){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    foreach ($_str as $va) {
                        if($va == $str){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 中三、组选和值
     */
    public function inThree_zxhz1() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5);  //5,3,2
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 59;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($_opencode_array)){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == array_sum($_opencode_array)){
                             $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、混合组选
     */
    public function backThree_hhzx() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  //5,8,8
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 40;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 3){
                    $_str = str_split($v['content']);
                    if(in_array($_str[0], $_opencode_array)){
                        if(in_array($_str[1], $_opencode_array)){
                            if(in_array($_str[2], $_opencode_array)){
                                 $winPrize[$k] = $v;
                            }
                        }
                    }

                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        $_va = str_split($va);
                        if(in_array($_va[0], $_opencode_array)){
                            if(in_array($_va[1], $_opencode_array)){
                                if(in_array($_va[2], $_opencode_array)){
                                     $another[$k] = $v;
                                }
                            }
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、组选和值
     */
    public function backThree_zxhz1() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  //5,8,8
            $_opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 41;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                 if(substr_count($v['content'], '&') == 0){
                     if($v['content'] == array_sum($_opencode_array)){
                         $winPrize[$k] = $v;
                     }  
                 }else {
                         $str = explode('&', $v['content']);
                         foreach ($str as $va) {
                            if($v['content'] == array_sum($_opencode_array)){
                                $another[$k] = $v;
                            } 
                         }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 后三、组选包胆
     */
    public function backThree_zxbd() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,-1,1);  
            $b = substr($opencode,-3,1); 
            $c = substr($opencode,-5,1); 
            $_opencode = substr($opencode,4,6);  
            $_opencode_array = explode(',', $_opencode);
            if($a == $c && $b != $c  || $a == $b && $b != $c){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 42;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                        if(in_array($v['content'], $_opencode_array)){
                            $winPrize[$k] = $v;
                        }
                }
               
            }
        }   
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 后三、和值尾数
     */
    public function backThree_hzws() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6);  
            $_opencode_array = explode(',', $_opencode);
            $str = array_sum($_opencode_array);
            if(strlen($str) == 1){
                $str =  $str;
            }  else {
                $str = substr($str,-1,1);  
            }
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 44;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(strlen($v['content']) == 1){
                    if($v['content'] == $str){
                        $winPrize[$k] = $v;                
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    foreach ($_str as $va) {
                        if($va == $str){
                            $another[$k] = $v;                
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后三、特殊号
     */
    public function backThree_tsh() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,4,6); 
            $_opencode_two = substr($opencode,4,3); 
            $a = substr($opencode,-1,1);
            $b = substr($opencode,-3,1);
            $c = substr($opencode,-5,1);
            $num = '0,1,2,3,4,5,6,7,8,9';
            $_num = explode(',', $num);
            $bz = '';
            $_bz = '';
            $sz = '';
            foreach ($_num as $value) {
                if(substr_count($_opencode,$value) == 3){
                    $bz = '豹子';  
                }
                if(substr_count($_opencode_two,$value) == 2 && $b != $c){
                    $_bz = '对子'; 
                }
            }
            if($a - $b == 1 && $b - $c == 1){
                $sz = '顺子';  
            }
            if($bz || $_bz || $sz){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 45;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $str = $v['content'];
                        if($bz){
                            if($bz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                        if($_bz){
                            if($_bz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                        if($sz){
                            if($sz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                    }  else {
                        $_str = explode('&', $v['content']);
                        foreach ($_str as $va) {
                            if($bz){
                                if($bz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                            if($_bz){
                                if($_bz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                            if($sz){
                                if($sz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 中三、特殊号
     */
    public function inThree_tsh() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,2,5); 
            $_opencode_two = substr($opencode,4,3); 
            $a = substr($opencode,2,1);
            $b = substr($opencode,4,1);
            $c = substr($opencode,6,1);
            $num = '0,1,2,3,4,5,6,7,8,9';
            $_num = explode(',', $num);
            $bz = '';
            $_bz = '';
            $sz = '';
            foreach ($_num as $value) {
                if(substr_count($_opencode,$value) == 3){
                    $bz = '豹子';  
                }
                if(substr_count($_opencode_two,$value) == 2 && $b != $c){
                    $_bz = '对子'; 
                }
            }
            if($b - $a == 1 && $c - $b == 1){
                $sz = '顺子';  
            }
            if($bz || $_bz || $sz){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 63;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $str = $v['content'];
                        if($bz){
                            if($bz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                        if($_bz){
                            if($_bz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                        if($sz){
                            if($sz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                    }  else {
                        $_str = explode('&', $v['content']);
                        foreach ($_str as $va) {
                            if($bz){
                                if($bz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                            if($_bz){
                                if($_bz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                            if($sz){
                                if($sz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    
    /**
     * 后二、直选复式
     */
    public function backTwo_zxfs() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];  
            $_opencode_two = substr($opencode,4,3);
            $_opencode = str_replace(',','',$_opencode_two); 
            $_opencode_two_array = explode(',', $_opencode_two);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 84;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(str_replace(',','',$v['content'] == $_opencode)){
                        $winPrize[$k] = $v;
                    }  
                }else {
                         $str = explode(',', $v['content']);
                         foreach ($str as $va) {
                             if(in_array($_opencode_two_array[0], explode('&', $va))){
                                 if(in_array($_opencode_two_array[1], explode('&', $va))){
                                     $another[$k] = $v;
                                 }
                             }
                         }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 后二、直选单式
     */
    public function backTwo_zxds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode_two = substr($opencode,6,3);
            $_opencode = str_replace(',','',$_opencode_two);  //33
            $_opencode_two_array = explode(',', $_opencode_two);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 85;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
//            print_r($list);
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $_opencode){
                        $winPrize[$k] = $v;
                    }  
                }else {
                         $str = explode('&', $v['content']);
                         foreach ($str as $va) {
                            if($va == $_opencode){
                                $another[$k] = $v;
                            }    
                         }
                }

            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 后二、直选和值
     */
    public function backTwo_zxhz() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode_two = substr($opencode,6,3);
            $_opencode_two_array = explode(',', $_opencode_two);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 86;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($_opencode_two_array)){
                        $winPrize[$k] = $v;
                    }  
                }else {
                         $str = explode('&', $v['content']);
                         foreach ($str as $va) {
                            if($va == array_sum($_opencode_two_array)){
                                $another[$k] = $v;
                            }    
                         }
                }

            }
            $winPrize = array_merge($another,$winPrize);
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后二、直选跨度
     */
    public function backTwo_zxkd() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,-1,1);
            $b = substr($opencode,-3,1);
            if($a - $b == $b - $a){
                $c = $a - $b;
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 87;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
    //            print_r($list);
                $winPrize = array();
                $another = array();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        if($v['content'] == $c){
                            $winPrize[$k] = $v;
                        }  
                    }else {
                             $str = explode('&', $v['content']);
                             foreach ($str as $va) {
                                if($va == $c){
                                    $another[$k] = $v;
                                }    
                             }
                    }

                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后二、组选复式
     */
    public function backTwo_zxfs1() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,-5,3);
            $_a = explode(',', $a);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 89;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $str = explode('&', $v['content']);
                    if(in_array($str[0], $_a)){
                        if(in_array($str[1], $_a)){
                            $winPrize[$k] = $v;
                        }
                    }  
                }else {
                         $_str = explode('&', $v['content']);
                         foreach ($_str as $va) {
                            if(in_array($va, $_a)){
                                $another[$k] = $v;
                            }    
                         }
                }

            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后二、组选单式
     */
    public function backTwo_zxds1() {
        $_data['code'] = 2;        
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if(!$open_prize_data['opencode']){
            $opencode = '4,5,3,5,8';
        }  else {
            $opencode = $open_prize_data['opencode'];
        }
        if(!$open_prize_data['code']){
            $code = 2;
        }  else {
            $code = $open_prize_data['code'];
        }
        if(!$open_prize_data['opentime']){
            $opentime = '1494835840';
        }  else {
            $opentime = $open_prize_data['opentime'];
        }
        $a = substr($opencode,-5,3);
        $_a = explode(',', $a);
//        print_r($_a);
//        $b = substr($opencode,-3,1);
//        if($a - $b == $b - $a){
//            $c = $a - $b;
        $data['category_id']  = $code;  //$open_prize_data['code']  彩种id
        $data['play_way_id']  = 90;
        $data['remark']  = array('NEQ','任');
        $data['time']  = array('LT',$opentime);//$open_prize_data['opentime'] 开奖时间
        $list = M('bet_record')->where($data)->select();
//            print_r($list);
        $winPrize = array();
        $another = array();
        foreach ($list as $k => $v) {
            if(substr_count($v['content'], '&') == 0){
                if(in_array($v['content'], $_a)){
                        $winPrize[$k] = $v;
                }  
            }else {
                     $_str = explode('&', $v['content']);
                    foreach ($_str as $va) {
                        if(in_array($va, $_a)){
                            $another[$k] = $v;
                        }    
                     }
            }

        }
        $winPrize = array_merge($another,$winPrize);
        if(!empty($winPrize)){return  $winPrize;}
//        }
    }
    
    /**
     * 后二、组选和值
     */
    public function backTwo_zxhz1() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,-5,3);
            $_a = explode(',', $a);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 91;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $another = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($_a)){
                            $winPrize[$k] = $v;
                    }  
                }else {
                         $_str = explode('&', $v['content']);
                        foreach ($_str as $va) {
                            if($va == array_sum($_a)){
                                $another[$k] = $v;
                            }    
                         }
                }

            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 后二、组选包胆
     */
    public function backTwo_zxbd1() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,-1,1);
            $b = substr($opencode,-3,1);  //3
            if($a != $b){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 92;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if($v['content'] == $b){
                        $winPrize[$k] = $v;
                    }
                }
                
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
   /**
    * 前三、直选复式
    */
    public function frontThree_xzfs() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $_a = str_replace(',','',$a); 
            $b = explode(',', $a);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 66;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(str_replace(',','',$v['content']) == $_a){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode(',', $v['content']);
                    foreach ($str as $_k => $va) {
                        if(in_array($b[$_k], explode('&', $va))){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }

        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、直选单式
    */
    public function frontThree_xzds() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $_a = str_replace(',','',$a); 
            $b = explode(',', $a);
            $data['category_id']  =  $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 67;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $_a){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $_a){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    
    
    /**
    * 前三、直选和值
    */
    public function frontThree_zxhz() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $winPrize = array();
            $another = array();
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 69;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($b)){
                        $winPrize[$k] = $v;
                    }
                }  else {
                   $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == array_sum($b)){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
    * 前三、直选跨度
    */
    public function frontThree_zxkd() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $winPrize = array();
            $another = array();
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $pos = array_search(max($b), $b);
            $_pos = array_search(min($b), $b);
            $max = $codeArray[$pos];
            $min = $codeArray[$_pos];
            $num = $max -  $min;
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 70;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $num){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $num){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、组三复式
    */
    public function frontThree_zsfs() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 72;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $strNew = explode('&', $v['content']);
                    if(in_array($strNew[0], $b)){
                        if(in_array($strNew[1], $b)){
                             $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if(in_array($va, $b)){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
    * 前三、组三单式
    */
    public function frontThree_zsds() {
        $openPrize = $this->judge();
        if(!empty($openPrize)){
            $winPrize = array();
            $another = array();
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            if(count(array_unique($b)) == 2){
                $sum = array_sum($b);
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 73;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 1){
                        if($this->sumStr($v['content']) == $sum ){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
        //                print_r($str);
                        foreach ($str as $va) {
                            if($this->sumStr($va) == $sum){
                                $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、组六复式
    */
    public function frontThree_zlfs() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $sum = array_sum($b);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 74;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 2){
                    $strNew = str_replace('&','',$v['content']); 
                    if($this->sumStr($strNew) == $sum ){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
    //                print_r($str);
                    foreach ($str as $va) {
                        if(in_array($va, $b)){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、组六单式
    */
    public function frontThree_zlds() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $sum = array_sum($b);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 75;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 2){
    //                $strNew = str_replace('&','',$v['content']); 
                    if($this->sumStr($v['content']) == $sum ){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
    //                print_r($str);
                    foreach ($str as $va) {
                        if($this->sumStr($va) == $sum ){
                            $winPrize[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、混合组选
    */
    public function frontThree_hhzx() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            if(count(array_unique($b)) != 1){
                $sum = array_sum($b);
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 76;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        if($this->sumStr($v['content']) == $sum ){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
    //                    print_r($str);
                        foreach ($str as $va) {
                            if($this->sumStr($va) == $sum ){
                                $winPrize[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
    * 前三、组选和值
    */
    public function frontThree_zxhz1() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            if(count(array_unique($b)) != 1){
                $sum = array_sum($b);
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 77;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        if($this->sumStr($v['content']) == $sum ){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $str = explode('&', $v['content']);
    //                    print_r($str);
                        foreach ($str as $va) {
                            if($this->sumStr($va) == $sum ){
                                $winPrize[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、组选包胆
    */
    public function frontThree_zxbd() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $sum = array_sum($b);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 78;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(in_array($v['content'], $b)){
                    $winPrize[$k] = $v;
                }
            }
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
    * 前三、和值尾数
    */
    public function frontThree_hzws() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,5);
            $b = explode(',', $a);
            $sum = array_sum($b);
            if(strlen($sum) == 1){
                $sum = $sum;
            }  else {
                $sum = substr($sum,-1,1);
            }
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 80;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $sum){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if($va == $sum){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($another,$winPrize);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 前三、特殊号
     */
    public function frontThree_tsh() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,5); 
            $_opencode_two = substr($opencode,4,3); 
            $a = substr($opencode,0,1);
            $b = substr($opencode,2,1);
            $c = substr($opencode,4,1);
            $num = '0,1,2,3,4,5,6,7,8,9';
            $_num = explode(',', $num);
            $bz = '';
            $_bz = '';
            $sz = '';
            foreach ($_num as $value) {
                if(substr_count($_opencode,$value) == 3){
                    $bz = '豹子';  
                }
                if(substr_count($_opencode_two,$value) == 2 && $b != $c){
                    $_bz = '对子'; 
                }
            }
            if($b - $a == 1 && $c - $b == 1){
                $sz = '顺子';  
            }
            if($bz || $_bz || $sz){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 81;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();

                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $str = $v['content'];
                        if($bz){
                            if($bz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                        if($_bz){
                            if($_bz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                        if($sz){
                            if($sz == "$str"){
                                $winPrize[$k] = $v;
                            }
                        }
                    }  else {
                        $_str = explode('&', $v['content']);
                        foreach ($_str as $va) {
                            if($bz){
                                if($bz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                            if($_bz){
                                if($_bz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                            if($sz){
                                if($sz == "$va"){
                                    $winPrize[$k] = $v;
                                }
                            }
                        }
                    }
                }
                $winPrize = array_merge($another,$winPrize);
               
            }
        }
         if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 前二、直选复式
     */
    public function frontTwo_zxfs() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $int_opencode = str_replace(',','',$_opencode); 
            $array_opencode = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 95;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = str_replace(',','',$v['content']);
                    if($int_opencode == $str){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $_str = explode(',', $v['content']);
                    foreach ($_str as $va) {
                        if(in_array($array_opencode[0], explode('&', $va))){
                            if(in_array($array_opencode[1], explode('&', $va))){
                                $another[$k] = $v;
                            }
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 前二、直选单式
     */
    public function frontTwo_zxds() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $int_opencode = str_replace(',','',$_opencode); 
            $array_opencode = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 96;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $int_opencode){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    foreach ($_str as $va) {
                        if($va == $int_opencode){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 前二、直选和值
     */
    public function frontTwo_zxhz() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $array_opencode = explode(',', $_opencode);
            $str = array_sum($array_opencode);
            if(strlen($str) == 1){
                $str = $str;
            }  else {
                $str = substr($str,-1,1);
            }
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 97;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $str){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    foreach ($_str as $va) {
                        if($va == $str){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 前二、直选跨度
     */
    public function frontTwo_zxkd() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $array_opencode = explode(',', $_opencode);
            $pos = array_search(max($array_opencode), $array_opencode);
            $_pos = array_search(min($array_opencode), $array_opencode);
            $max = $array_opencode[$pos];
            $min = $array_opencode[$_pos];
            $num = $max -  $min;
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 98;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $num){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    foreach ($_str as $va) {
                        if($va == $num){
                            $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }

        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 前二、组选复式
     */
    public function frontTwo_zxfs1() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $array_opencode = explode(',', $_opencode);
            if(count(array_unique($array_opencode)) != 1){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 100;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 1){
                        $str = explode('&', $v['content']);
                        if(array_sum($array_opencode) == array_sum($str)){
                             $winPrize[$k] = $v;
                        }
                    }  else {
                        $_str = explode('&', $v['content']);
                        foreach ($_str as $va) {
                            if(in_array($va, $array_opencode)){
                                 $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($winPrize,$another);
              
            }
        }
            if(!empty($winPrize)){return  $winPrize;}

    }
    
    /**
     * 前二、组选单式
     */
    public function frontTwo_zxds1() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $array_opencode = explode(',', $_opencode);
            if(count(array_unique($array_opencode)) != 1){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 101;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $a = $v['content']%10;
                        $b = ($v['content']/10)%10;
                        if($a + $b == array_sum($array_opencode)){
                             $winPrize[$k] = $v;
                        }
                    }  else {
                        $_str = explode('&', $v['content']);
                        foreach ($_str as $va) {
                            $_a = $va%10;
                            $_b = ($va/10)%10;
                            if($_a + $_b == array_sum($array_opencode)){
                                 $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($winPrize,$another);
                if(!empty($winPrize)){return  $winPrize;}
            }
        }
    }
    
    
    /**
     * 前二、组选和值
     */
    public function frontTwo_zxhz1() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $array_opencode = explode(',', $_opencode);
            if(count(array_unique($array_opencode)) != 1){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 102;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        if($v['content'] == array_sum($array_opencode)){
                                $winPrize[$k] = $v;
                        }
                    }  else {
                        $_str = explode('&', $v['content']);
    //                    print_r($_str);
                        foreach ($_str as $va) {
                            if($va == array_sum($array_opencode)){
                                 $another[$k] = $v;
                            }
                        }
                    }
                }
                $winPrize = array_merge($winPrize,$another);
               
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 前二、组选包胆
     */
    public function frontTwo_zxbd1() {
        $openPrize = $this->judge();
        $winPrize = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode = substr($opencode,0,3);
            $array_opencode = explode(',', $_opencode);
            if(count(array_unique($array_opencode)) != 1){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 103;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(in_array($v['content'], $array_opencode)){
                        $winPrize[$k] = $v;
                    }
                }
               
            }
        }
            if(!empty($winPrize)){return  $winPrize;}

    }
    
    
    /**
     * 定位胆
     */
    public function dwd() {
        $openPrize = $this->judge();
//        print_r($openPrize);
        $winPrize = array();
        $another = array();
        $winPrize1 = array();
        $winPrize2 = array();
        $winPrize3 = array();
        $winPrize4 = array();
        $another1 = array();
        $another2 = array();
        $another3 = array();
        $another4 = array();
        if(!empty($openPrize)){
//            exit('sss');
            $opencode = $openPrize['str'];
            $_opencode =  explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 104;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
//            print_r($list);exit;
//            print_r(M('bet_record')->getLastSql());
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if($str[0]){
                     if(substr_count($v['content'], '&') == 0){
                       if($str[0] == $_opencode[0]){
                           $winPrize[$k] = $v;
                       }
                     }  else {
                         $_str = explode('&', $str[0]);
                         if(in_array($_opencode[0], $_str)){
                             $another[$k] = $v;
                         }
                     }
                }
                if(!$str[0] && $str[1]){
                     if(substr_count($v['content'], '&') == 0){
                       if($str[1] == $_opencode[1]){
                           $winPrize1[$k] = $v;
                       }
                     }  else {
                         $_str = explode('&', $str[1]);
                         if(in_array($_opencode[1], $_str)){
                             $another1[$k] = $v;
                         }
                     }
                }
                if(!$str[0] && !$str[1] && $str[2]){
                     if(substr_count($v['content'], '&') == 0){
                       if($str[2] == $_opencode[2]){
                           $winPrize2[$k] = $v;
                       }
                     }  else {
                         $_str = explode('&', $str[2]);
                         if(in_array($_opencode[2], $_str)){
                             $another2[$k] = $v;
                         }
                     }
                }
                if(!$str[0] && !$str[1] && !$str[2] && $str[3]){
                     if(substr_count($v['content'], '&') == 0){
                       if($str[3] == $_opencode[3]){
                           $winPrize3[$k] = $v;
                       }
                     }  else {
                         $_str = explode('&', $str[3]);
                         if(in_array($_opencode[3], $_str)){
                             $another3[$k] = $v;
                         }
                     }
                }
                if(!$str[0] && !$str[1] && !$str[2] && !$str[3] && $str[4]){
                     if(substr_count($v['content'], '&') == 0){
                       if($str[4] == $_opencode[4]){
                           $winPrize4[$k] = $v;
                       }
                     }  else {
                         $_str = explode('&', $str[4]);
                         if(in_array($_opencode[4], $_str)){
                             $another4[$k] = $v;
                         }
                     }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1,$winPrize2,$winPrize3,$winPrize4,$another,$another1,$another2,$another3,$another4);
        }
//        print_r($winPrize);exit;
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 不定位、后三一码
     */
    public function bdw_hsym() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        $another1 = array();
        $another2 = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode =  substr($opencode,4,5);
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 107;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $opencode_array)){
                        $winPrize[$k] = $v;
                    }

                }  else {
                    $str = explode('&', $v['content']);
                    if(in_array($opencode_array[0], $str)){
                        $another[$k] = $v;
                    }  else {
                         if(in_array($opencode_array[1], $str)){
                             $another1[$k] = $v;
                         }  else {
                             if(in_array($opencode_array[2], $str)){
                                 $another2[$k] = $v;
                             }
                         }
                    }
                }
            }

            $winPrize = array_merge($winPrize,$another,$another1,$another2);
        }

        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 不定位、前三一码
     */
    public function bdw_qsym() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        $another1 = array();
        $another2 = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode =  substr($opencode,0,5);
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 108;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $opencode_array)){
                        $winPrize[$k] = $v;
                    }

                }  else {
                    $str = explode('&', $v['content']);
                    if(in_array($opencode_array[0], $str)){
                        $another[$k] = $v;
                    }  else {
                         if(in_array($opencode_array[1], $str)){
                             $another1[$k] = $v;
                         }  else {
                             if(in_array($opencode_array[2], $str)){
                                 $another2[$k] = $v;
                             }
                         }
                    }
                }
            }

            $winPrize = array_merge($winPrize,$another,$another1,$another2);
        }

        if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 不定位、后三二码
     */
    public function bdw_hsem() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        $another1 = array();
        $another2 = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode =  substr($opencode,4,5);
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 109;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $str = explode('&', $v['content']);
                    if(in_array($str[0], $opencode_array)){
                        if(in_array($str[1], $opencode_array)){
                            $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    if(in_array($opencode_array[0], $_str)){
                        if(in_array($opencode_array[1], $_str)){
                            $another[$k] = $v;
                        }  else {
                            if(in_array($opencode_array[2], $_str)){
                                $another2[$k] = $v;
                            }
                        }
                    }else{
                        if(in_array($opencode_array[1], $_str)){
                            if(in_array($opencode_array[2], $_str)){
                                $another1[$k] = $v;
                            }
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another,$another1,$another2);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 不定位、前三二码
     */
    public function bdw_qsem() {
        $openPrize = $this->judge();
        $opencode = $openPrize['str'];
        $winPrize = array();
        $another = array();
        $another1 = array();
        $another2 = array();
        if(!empty($openPrize)){
            $_opencode =  substr($opencode,0,5);
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 110;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $str = explode('&', $v['content']);
                    if(in_array($str[0], $opencode_array)){
                        if(in_array($str[1], $opencode_array)){
                            $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    if(in_array($opencode_array[0], $_str)){
                        if(in_array($opencode_array[1], $_str)){
                            $another[$k] = $v;
                        }  else {
                            if(in_array($opencode_array[2], $_str)){
                                $another2[$k] = $v;
                            }
                        }
                    }else{
                        if(in_array($opencode_array[1], $_str)){
                            if(in_array($opencode_array[2], $_str)){
                                $another1[$k] = $v;
                            }
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another,$another1,$another2);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 不定位、四星一码
     */
    public function bdw_sxym() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode =  substr($opencode,2,7);
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 112;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $opencode_array)){
                         $winPrize[$k] = $v;
                    }
                }  else {
                    $str = explode('&', $v['content']);
                    foreach ($str as $va) {
                        if(in_array($va, $opencode_array)){
                         $another[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }
        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 不定位、四星二码
     */
    public function bdw_sxem() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $_opencode =  substr($opencode,2,7);
            $opencode_array = explode(',', $_opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 113;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $str = explode('&', $v['content']);
                    if(in_array($str[0], $opencode_array)){
                        if(in_array($str[1], $opencode_array)){
                            $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    if(count(array_intersect($_str, $opencode_array)) >= 2){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    /**
     * 不定位、五星二码
     */
    public function bdw_wxem() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode_array = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 115;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 1){
                    $str = explode('&', $v['content']);
                    if(in_array($str[0], $opencode_array)){
                        if(in_array($str[1], $opencode_array)){
                            $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    if(count(array_intersect($_str, $opencode_array)) >= 2){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }

        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 不定位、五星三码
     */
    public function bdw_wxsm() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $opencode_array = explode(',', $opencode);
            $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 116;
            $data['issue']  = $openPrize['expect'];
            $data['status']  = $openPrize['status'];
            $data['remark']  = array('NEQ','任');
            $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 2){
                    $str = explode('&', $v['content']);
                    if(count(array_intersect($str, $opencode_array)) >= 3){
                         $winPrize[$k] = $v;
                    }
                }  else {
                    $_str = explode('&', $v['content']);
                    if(count(array_intersect($_str, $opencode_array)) >= 3){
                        $another[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$another);
        }

        if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 大小单双、前二大小单双
     */
    public function dxds_qedxds() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,1);
            $b =  substr($opencode,2,1);
            $dan = array(1,3,5,7,9);
            $shuang = array(0,2,4,6,8);
            if(in_array($a, $dan)){
                $_dan = '单'; 
            }
            if(in_array($a, $shuang)){
                $_shuang = '双'; 
            }
            if($a >=5){
                $da = '大';
            }  else {
                $xiao = '小';
            }
            if($_dan){
                $str = $_dan;
            }  else {
                if($_shuang){
                    $str = $_shuang;
                }else{
                    if($da){
                        $str = $da;
                    }  else {
                        if($xiao){
                            $str = $da;
                        }   
                    }
                }
            }
            if(in_array($b, $dan)){
                $_dan_b = '单'; 
            }
            if(in_array($b, $shuang)){
                $_shuang_b = '双'; 
            }
            if($b >=5){
                $da_b = '大';
            }  else {
                $xiao_b = '小';
            }
            if($_dan_b){
                $_str = $_dan_b;
            }  else {
                if($_shuang_b){
                    $_str = $_shuang_b;
                }else{
                    if($da_b){
                        $_str = $da_b;
                    }  else {
                        if($xiao_b){
                            $_str = $xiao_b;
                        }   
                    }
                }
            }
            if($str && $_str){
                $data['category_id']  = $openPrize['code']; //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 119;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $strNew = explode(',', $v['content']);
                        if($strNew[0] == $str && $strNew[1] == $_str){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $_strNew = explode(',', $v['content']);
                        if(in_array($str, explode('&', $_strNew[0]))){
                                if(in_array($_str, explode('&', $_strNew[1]))){
                                     $another[$k] = $v;
                                }
                        }
                   }
                }
                $winPrize = array_merge($winPrize,$another);
               
            }
        }
             if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * 大小单双、前三大小单双
     */
    public function dxds_qsdxds() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,0,1);
            $b =  substr($opencode,2,1);
            $c =  substr($opencode,4,1);
            $dan = array(1,3,5,7,9);
            $shuang = array(0,2,4,6,8);
            if(in_array($c, $dan)){
                $_dan_c = '单'; 
            }
            if(in_array($c, $shuang)){
                $_shuang_c = '双'; 
            }
            if($c >=5){
                $da_c = '大';
            }  else {
                $xiao_c = '小';
            }
            if($_dan_c){
                $str_c = $_dan_c;
            }  else {
                if($_shuang_c){
                    $str_c = $_shuang_c;
                }else{
                    if($da_c){
                        $str_c = $da_c;
                    }  else {
                        if($xiao_c){
                            $str_c = $xiao_c;
                        }   
                    }
                }
            }
            if(in_array($a, $dan)){
                $_dan = '单'; 
            }
            if(in_array($a, $shuang)){
                $_shuang = '双'; 
            }
            if($a >=5){
                $da = '大';
            }  else {
                $xiao = '小';
            }
            if($_dan){
                $str = $_dan;
            }  else {
                if($_shuang){
                    $str = $_shuang;
                }else{
                    if($da){
                        $str = $da;
                    }  else {
                        if($xiao){
                            $str = $da;
                        }   
                    }
                }
            }
            if(in_array($b, $dan)){
                $_dan_b = '单'; 
            }
            if(in_array($b, $shuang)){
                $_shuang_b = '双'; 
            }
            if($b >=5){
                $da_b = '大';
            }  else {
                $xiao_b = '小';
            }
            if($_dan_b){
                $_str = $_dan_b;
            }  else {
                if($_shuang_b){
                    $_str = $_shuang_b;
                }else{
                    if($da_b){
                        $_str = $da_b;
                    }  else {
                        if($xiao_b){
                            $_str = $xiao_b;
                        }   
                    }
                }
            }
            if($str && $_str && $str_c){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 121;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $strNew = explode(',', $v['content']);
                        if($strNew[0] == $str && $strNew[1] == $_str && $strNew[2] == $str_c){
                            $winPrize[$k] = $v;
                        }
                    }  else {
    //                    print_r($v);
                        $_strNew = explode(',', $v['content']);
                        if(in_array($str, explode('&', $_strNew[0]))){
                                if(in_array($_str, explode('&', $_strNew[1]))){
                                    if(in_array($str_c, explode('&', $_strNew[2]))){
                                         $another[$k] = $v;
                                    }

                                }
                        }
                   }
                }
                $winPrize = array_merge($winPrize,$another);
                
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    
    /**
     * 大小单双、后三大小单双
     */
    public function dxds_hsdxds() {
        $openPrize = $this->judge();
        $winPrize = array();
        $another = array();
        if(!empty($openPrize)){
            $opencode = $openPrize['str'];
            $a = substr($opencode,4,1);
            $b =  substr($opencode,6,1);
            $c =  substr($opencode,8,1);
            $dan = array(1,3,5,7,9);
            $shuang = array(0,2,4,6,8);
            if(in_array($c, $dan)){
                $_dan_c = '单'; 
            }
            if(in_array($c, $shuang)){
                $_shuang_c = '双'; 
            }
            if($c >=5){
                $da_c = '大';
            }  else {
                $xiao_c = '小';
            }
            if($_dan_c){
                $str_c = $_dan_c;
            }  else {
                if($_shuang_c){
                    $str_c = $_shuang_c;
                }else{
                    if($da_c){
                        $str_c = $da_c;
                    }  else {
                        if($xiao_c){
                            $str_c = $xiao_c;
                        }   
                    }
                }
            }
            if(in_array($a, $dan)){
                $_dan = '单'; 
            }
            if(in_array($a, $shuang)){
                $_shuang = '双'; 
            }
            if($a >=5){
                $da = '大';
            }  else {
                $xiao = '小';
            }
            if($_dan){
                $str = $_dan;
            }  else {
                if($_shuang){
                    $str = $_shuang;
                }else{
                    if($da){
                        $str = $da;
                    }  else {
                        if($xiao){
                            $str = $da;
                        }   
                    }
                }
            }
            if(in_array($b, $dan)){
                $_dan_b = '单'; 
            }
            if(in_array($b, $shuang)){
                $_shuang_b = '双'; 
            }
            if($b >=5){
                $da_b = '大';
            }  else {
                $xiao_b = '小';
            }
            if($_dan_b){
                $_str = $_dan_b;
            }  else {
                if($_shuang_b){
                    $_str = $_shuang_b;
                }else{
                    if($da_b){
                        $_str = $da_b;
                    }  else {
                        if($xiao_b){
                            $_str = $xiao_b;
                        }   
                    }
                }
            }
            if($str && $_str && $str_c){
                $data['category_id']  = $openPrize['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 122;
                $data['issue']  = $openPrize['expect'];
                $data['status']  = $openPrize['status'];
                $data['remark']  = array('NEQ','任');
                $data['time']  = array('LT',$openPrize['opentime']);//$open_prize_data['opentime'] 开奖时间

                $list = M('bet_record')->where($data)->select();
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                        $strNew = explode(',', $v['content']);
                        if($strNew[0] == $str && $strNew[1] == $_str && $strNew[2] == $str_c){
                            $winPrize[$k] = $v;
                        }
                    }  else {
                        $_strNew = explode(',', $v['content']);
                        if(in_array($str, explode('&', $_strNew[0]))){
                                if(in_array($_str, explode('&', $_strNew[1]))){
                                    if(in_array($str_c, explode('&', $_strNew[2]))){
                                         $another[$k] = $v;
                                    }

                                }
                        }
                   }
                }
                $winPrize = array_merge($winPrize,$another);
                
            }
        }
            if(!empty($winPrize)){return  $winPrize;}
    }
    
    
    /**
     * QQ分分彩数组整合
     * @return type
     */
    public function all_qqffc_winPriz_array() {
        //腾讯分分彩任选
        R('Txffcrx/texffcrx_all_winPrize_array');
        
        $five_zxfs = $this->five_zxfs();
        $five_zxds = $this->five_zxds();
        $five_zx120 = $this->five_zx120();
        $five_zx60 = $this->five_zx60();
        $five_zx30 = $this->five_zx30();
        $five_zx20 = $this->five_zx20();
        $five_zx10 = $this->five_zx10();
        $five_zx5 = $this->five_zx5();
        $five_yffs = $this->five_yffs();
        $five_hscs = $this->five_hscs();
        $five_sxbx = $this->five_sxbx();
        $five_sjfc = $this->five_sjfc();
        $four_zxhs = $this->four_zxhs();
        $four_zxds = $this->four_zxds();
        $four_zx24 = $this->four_zx24();
        $four_zx12 = $this->four_zx12();
        $four_zx6 = $this->four_zx6();
        $four_zx4 = $this->four_zx4();
        $backThree_zxfs = $this->backThree_zxfs();
        $inThree_zxfs = $this->inThree_zxfs();
        $backThree_zxds = $this->backThree_zxds();
        $inThree_zxds = $this->inThree_zxds();
        $backThree_zxhz = $this->backThree_zxhz();
        $inThree_zxhz = $this->inThree_zxhz();
        $backThree_zxkd = $this->backThree_zxkd();
        $inThree_zxkd = $this->inThree_zxkd();
        $backThree_zsfs = $this->backThree_zsfs();
        $inThree_zsfs = $this->inThree_zsfs();
        $backThree_zsds = $this->backThree_zsds();
        $inThree_zsds = $this->inThree_zsds();
        $backThree_zlfs = $this->backThree_zlfs();
        $inThree_zlfs = $this->inThree_zlfs();
        $backThree_zlds = $this->backThree_zlds();
        $inThree_zlds = $this->inThree_zlds();
        $inThree_hhzx = $this->inThree_hhzx();
        $inThree_zxbd = $this->inThree_zxbd();
        $inThree_hzws = $this->inThree_hzws();
        $inThree_zxhz1 = $this->inThree_zxhz1();
        $backThree_hhzx = $this->backThree_hhzx();
        $backThree_zxhz1 = $this->backThree_zxhz1();
        $backThree_zxbd = $this->backThree_zxbd();
        $backThree_hzws = $this->backThree_hzws();
        $backThree_tsh = $this->backThree_tsh();
        $inThree_tsh = $this->inThree_tsh();
        $backTwo_zxfs = $this->backTwo_zxfs();
        $backTwo_zxds = $this->backTwo_zxds();
        $backTwo_zxhz = $this->backTwo_zxhz();
        $backTwo_zxkd = $this->backTwo_zxkd();
        $backTwo_zxfs1 = $this->backTwo_zxfs1();
        $backTwo_zxds1 = $this->backTwo_zxds1();
        $backTwo_zxhz1 = $this->backTwo_zxhz1();
        $backTwo_zxbd1 = $this->backTwo_zxbd1();
        $frontThree_xzfs = $this->frontThree_xzfs();
        $frontThree_xzds = $this->frontThree_xzds();
        $frontThree_zxhz = $this->frontThree_zxhz();
        $frontThree_zxkd = $this->frontThree_zxkd();
        $frontThree_zsfs = $this->frontThree_zsfs();
        $frontThree_zsds = $this->frontThree_zsds();
        $frontThree_zlfs = $this->frontThree_zlfs();
        $frontThree_zlds = $this->frontThree_zlds();
        $frontThree_hhzx = $this->frontThree_hhzx();
        $frontThree_zxhz1 = $this->frontThree_zxhz1();
        $frontThree_zxbd = $this->frontThree_zxbd();
        $frontThree_hzws = $this->frontThree_hzws();
        $frontThree_tsh = $this->frontThree_tsh();
        $frontTwo_zxfs = $this->frontTwo_zxfs();
        $frontTwo_zxds = $this->frontTwo_zxds();
        $frontTwo_zxhz = $this->frontTwo_zxhz();
        $frontTwo_zxkd = $this->frontTwo_zxkd();
        $frontTwo_zxfs1 = $this->frontTwo_zxfs1();
        $frontTwo_zxds1 = $this->frontTwo_zxds1();
        $frontTwo_zxhz1 = $this->frontTwo_zxhz1();
        $frontTwo_zxbd1 = $this->frontTwo_zxbd1();
        $dwd = $this->dwd();
        $bdw_hsym = $this->bdw_hsym();
        $bdw_qsym = $this->bdw_qsym();
        $bdw_hsem = $this->bdw_hsem();
        $bdw_qsem = $this->bdw_qsem();
        $bdw_sxym = $this->bdw_sxym();
        $bdw_sxem = $this->bdw_sxem();
        $bdw_wxem = $this->bdw_wxem();
        $bdw_wxsm = $this->bdw_wxsm();
        $dxds_qedxds = $this->dxds_qedxds();
        $dxds_qsdxds = $this->dxds_qsdxds();
        $dxds_hsdxds = $this->dxds_hsdxds();

        $array_sum  =   [
            $five_zxfs,
            $five_zxds,
            $five_zx120,
            $five_zx60,
            $five_zx30,
            $five_zx20,
            $five_zx10,
            $five_zx5,
            $five_yffs,
            $five_hscs,
            $five_sxbx,
            $five_sjfc,
            $four_zxhs,
            $four_zxds,
            $four_zx24,
            $four_zx12,
            $four_zx6,
            $four_zx4,
            $backThree_zxfs,
            $inThree_zxfs,
            $backThree_zxds,
            $inThree_zxds,
            $backThree_zxhz,
            $inThree_zxhz,
            $backThree_zxkd,
            $inThree_zxkd,
            $backThree_zsfs,
            $inThree_zsfs,
            $backThree_zsds,
            $inThree_zsds,
            $backThree_zlfs,
            $inThree_zlfs,
            $backThree_zlds,
            $inThree_zlds,
            $inThree_hhzx,
            $inThree_zxbd,
            $inThree_hzws,
            $inThree_zxhz1,
            $backThree_hhzx,
            $backThree_zxhz1,
            $backThree_zxbd,
            $backThree_hzws,
            $backThree_tsh,
            $inThree_tsh,
            $backTwo_zxfs,
            $backTwo_zxds,
            $backTwo_zxhz,
            $backTwo_zxkd,
            $backTwo_zxfs1,
            $backTwo_zxds1,
            $backTwo_zxhz1,
            $backTwo_zxbd1,
            $frontThree_xzfs,
            $frontThree_xzds,
            $frontThree_zxhz,
            $frontThree_zxkd,
            $frontThree_zsfs,
            $frontThree_zsds,
            $frontThree_zlfs,
            $frontThree_zlds,
            $frontThree_hhzx,
            $frontThree_zxhz1,
            $frontThree_zxbd,
            $frontThree_hzws,
            $frontThree_tsh,
            $frontTwo_zxfs,
            $frontTwo_zxds,
            $frontTwo_zxhz,
            $frontTwo_zxkd,
            $frontTwo_zxfs1,
            $frontTwo_zxds1,
            $frontTwo_zxhz1,
            $frontTwo_zxbd1,
            $dwd,
            $bdw_hsym,
            $bdw_qsym,
            $bdw_hsem,
            $bdw_qsem,
            $bdw_sxym,
            $bdw_sxem,
            $bdw_wxem,
            $bdw_wxsm,
            $dxds_qedxds,
            $dxds_qsdxds,
            $dxds_hsdxds
        ];
        $winPrize = [];
        foreach ($array_sum as $v){
            if(!empty($v)){
                $winPrize[] = $v;
            }
        }
//        print_r($winPrize);exit;
        if (!empty($winPrize)) {
            $winPrize = $winPrize[0];
            $record_id_array = array();
            foreach ($winPrize as $v) {
                $record_id_array[] = $v['id'];
            }
            $map['id'] = array('not in',$record_id_array);
//            $map['issue'] = $winPrize[0]['issue'];
            $map['category_id'] = 40;
            $map['status'] = 1;
            $map['type'] = 0;
            $map['remark']  = array('NEQ','任');
            $list = M('bet_record')->where($map)->select();
            foreach ($list as $va) {
                $data['id'] = $va['id'];
                $data['status'] = 3;
                $data['profitLoss'] = 0 - $va['money'];
                M('bet_record')->save($data);
            }
            BonusSend($winPrize,1);
        }  else {
            $map['category_id'] = 40;
            $map['status'] = 1;
            $map['type'] = 0;
            $map['remark']  = array('NEQ','任');
            $list = M('bet_record')->where($map)->select();
//            print_r(M('bet_record')->getLastSql());exit;
            foreach ($list as $va) {
                $data['id'] = $va['id'];
                $data['status'] = 3;
                $data['profitLoss'] = 0 - $va['money'];
                M('bet_record')->save($data);
            }
        }

    }
    
}
        