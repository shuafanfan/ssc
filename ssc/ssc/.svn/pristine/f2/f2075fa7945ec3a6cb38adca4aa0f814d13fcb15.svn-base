<?php 
namespace Html\Controller;
use Think\Controller;
class TxffcrxController extends Controller {
    
     /**
     * 腾讯分分彩开奖数据获取
     */
    public function judge() {
        $list = array();
        $_data['code'] = 40;     
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if(!empty($open_prize_data)){
            $list = array(
                'code_array'=>  explode(',', $open_prize_data['opencode']),
                'opentime'=>$open_prize_data['opentimestamp'],
                'expect'=>$open_prize_data['expect'],
                'code'=>$open_prize_data['code'],
                'status'=>1
            );
           
        }
        return $list;
    }
    /**
     * 返回开奖号码跟位置的组合 $list  适用于直选单式
     * @param type $a       位置字符串
     * @param type $code_array  开奖号码的数组
     * @return string
     */
    public function return_code_position($a = '0&1&2&3&4',$code_array) {
        $list = array();
        $position = explode('&', $a);
        $num = count($position);
        if($num == 2){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $list[] = $o1;
        }
         if($num == 3){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]].$code_array[$position[2]]; //02 组合
            $list[] = $o1;
            $list[] = $o2;
        }
         if($num == 4){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]].$code_array[$position[2]]; //02 组合
            $o3 = $code_array[$position[0]].$code_array[$position[3]]; //03 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $o3;
        }
         if($num == 5){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]].$code_array[$position[2]]; //02 组合
            $o3 = $code_array[$position[0]].$code_array[$position[3]]; //03 组合
            $o4 = $code_array[$position[0]].$code_array[$position[4]]; //04 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $o3;
            $list[] = $o4;
        }
        return  $list;
    }
    /**
     * 返回开奖号码跟位置的组合 $list  适用于和值、组选复式
     * @param type $a
     * @param type $code_array
     * @return type
     */
    public function return_code_position_hz($a = '0&1&2&3&4',$code_array) {
        $list = array();
        $position = explode('&', $a);
        $num = count($position);
        if($num == 2){
            $o1 = $code_array[$position[0]] + $code_array[$position[1]]; //01 组合
            $list[] = $o1;
        }
         if($num == 3){
            $o1 = $code_array[$position[0]] + $code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]] + $code_array[$position[2]]; //02 组合
            $list[] = $o1;
            $list[] = $o2;
        }
         if($num == 4){
            $o1 = $code_array[$position[0]] + $code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]] + $code_array[$position[2]]; //02 组合
            $o3 = $code_array[$position[0]] + $code_array[$position[3]]; //03 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $o3;
        }
         if($num == 5){
            $o1 = $code_array[$position[0]] + $code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]] + $code_array[$position[2]]; //02 组合
            $o3 = $code_array[$position[0]] + $code_array[$position[3]]; //03 组合
            $o4 = $code_array[$position[0]] + $code_array[$position[4]]; //04 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $o3;
            $list[] = $o4;
        }
        return  $list;
    }
    
    
    /**
     * 任选二、三、四 直选复式
     */
    public function rx_zxfs() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $no_winPrize = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  = '';
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
//            print_r($list);exit;
            $content = array();
            foreach ($list as $k => $v) {
                $content[$k] = explode(',', $v['content']);
                //剔除 $content array 键值为空的
                foreach ($content[$k] as $ke => $va) {
                    if($va == ''){
                        unset($content[$k][$ke]);
                       
                    }
                }
                
            }
            $num = 0;//相等的次数
            foreach ($content as $b => $a) {
                foreach ($a as $_k => $_v) {
                    if(substr_count($_v, '&') == 0){
                        if($openPrize['code_array'][$_k] == $_v){
                            $num = 1 + $num;
                        }
                    }else{
                        if(in_array($openPrize['code_array'][$_k], explode('&', $_v))){
                            $num = 1 + $num;
                        }
                    }
                }
                if($num == count($content[$b])){
                    $winPrize[$b] = $list[$b];
                }  else {
                    $no_winPrize[$b] = $list[$b];
                    foreach ($no_winPrize as $va) {
                        $data['id'] = $va['id'];
                        $data['status'] = 3;
                        $data['profitLoss'] = 0 - $va['money'];
                        M('bet_record')->save($data);
                    }
                }
            }
        }
        return  $winPrize;
    }
    
    /**
     * 任选二、三、四 直选单式
     */
    public function rx_zxds() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $winPrize1 = array();//中奖的
        $no_winPrize = array();//没中奖
        $no_winPrize1 = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = array('in',array(126,135,147));
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
               $return_code_position = $this->return_code_position($v['position'], $openPrize['code_array']);
               if(substr_count($v['content'], '&') == 0){
                   if(in_array($v['content'], $return_code_position)){
                       $winPrize[$k] = $v;
                   }else{
                       $no_winPrize[$k] = $v;
                   }
               }  else {
                   foreach (explode('&', $v['content']) as $va) {
                        if(in_array($v['content'], $return_code_position)){
                            $winPrize1[$k] = $v;
                        }  else {
                             $no_winPrize1[$k] = $v;
                        }
                   }
               }
            }
            $winPrize = array_merge_recursive($winPrize,$winPrize1);
            $no_winPrize = array_merge_recursive($no_winPrize,$no_winPrize1);
            foreach ($no_winPrize as $va) {
                        $data['id'] = $va['id'];
                        $data['status'] = 3;
                        $data['profitLoss'] = 0 - $va['money'];
                        M('bet_record')->save($data);
            }
            
        }
        return  $winPrize;
    }

    /**
     * 任选二、三 直选和值、组选和值  
     */
    public function rx_zxhz() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $winPrize1 = array();//中奖的
        $no_winPrize = array();//没中奖
        $no_winPrize1 = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = array('in',array(127,136,131,143));
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $return_code_position = $this->return_code_position_hz($v['position'], $openPrize['code_array']);
               if(substr_count($v['content'], '&') == 0){
                   if(in_array($v['content'], $return_code_position)){
                       $winPrize[$k] = $v;
                   }else{
                       $no_winPrize[$k] = $v;
                   }
               }  else {
                   foreach (explode('&', $v['content']) as $va) {
                        if(in_array($v['content'], $return_code_position)){
                            $winPrize1[$k] = $v;
                        }  else {
                             $no_winPrize1[$k] = $v;
                        }
                   }
               }
            }
            $winPrize = array_merge_recursive($winPrize,$winPrize1);
            $no_winPrize = array_merge_recursive($no_winPrize,$no_winPrize1);
            foreach ($no_winPrize as $va) {
                        $data['id'] = $va['id'];
                        $data['status'] = 3;
                        $data['profitLoss'] = 0 - $va['money'];
                        M('bet_record')->save($data);
            }
        }
        return  $winPrize;
    }


    /**
     * 任选二、组选复式
     */
    public function rx2_zxfs() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $no_winPrize = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = 129;
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $return_code_position = $this->return_code_position_hz($v['position'], $openPrize['code_array']);
                $content = explode('&', $v['content']);
                   if(in_array(array_sum($content), $return_code_position)){
                       $winPrize[$k] = $v;
                   }else{
                       $no_winPrize[$k] = $v;
                   }
            }
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }
    
    /**
     * 适用于组选单式
     * @param type $a
     * @param type $code_array
     * @return string
     */
    public function return_combination($a = '0&1&2&3&4',$code_array) {
        $list = array();
        $position = explode('&', $a);
        $num = count($position);
        if($num == 2){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $_o1 = $code_array[$position[1]].$code_array[$position[0]]; //10 组合
            $list[] = $o1;
            $list[] = $_o1;
        }
         if($num == 3){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]].$code_array[$position[2]]; //02 组合
            $_o1 = $code_array[$position[1]].$code_array[$position[0]]; //10 组合
            $_o2 = $code_array[$position[2]].$code_array[$position[0]]; //20 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $_o1;
            $list[] = $_o2;
        }
         if($num == 4){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]].$code_array[$position[2]]; //02 组合
            $o3 = $code_array[$position[0]].$code_array[$position[3]]; //03 组合
            $_o1 = $code_array[$position[1]].$code_array[$position[0]]; //10 组合
            $_o2 = $code_array[$position[2]].$code_array[$position[0]]; //20 组合
            $_o3 = $code_array[$position[3]].$code_array[$position[0]]; //30 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $o3;
            $list[] = $_o1;
            $list[] = $_o2;
            $list[] = $_o3;
        }
         if($num == 5){
            $o1 = $code_array[$position[0]].$code_array[$position[1]]; //01 组合
            $o2 = $code_array[$position[0]].$code_array[$position[2]]; //02 组合
            $o3 = $code_array[$position[0]].$code_array[$position[3]]; //03 组合
            $o4 = $code_array[$position[0]].$code_array[$position[4]]; //04 组合
            $_o1 = $code_array[$position[1]].$code_array[$position[0]]; //10 组合
            $_o2 = $code_array[$position[2]].$code_array[$position[0]]; //20 组合
            $_o3 = $code_array[$position[3]].$code_array[$position[0]]; //30 组合
            $_o4 = $code_array[$position[4]].$code_array[$position[0]]; //40 组合
            $list[] = $o1;
            $list[] = $o2;
            $list[] = $o3;
            $list[] = $o4;
            $list[] = $_o1;
            $list[] = $_o2;
            $list[] = $_o3;
            $list[] = $_o4;
        }
        return  $list;
    }
    /**
     * 任选二、组选单式
     * @return type
     */
    public function rx_rxzx_zxds() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $winPrize1 = array();//中奖的
        $no_winPrize = array();//没中奖
        $no_winPrize1 = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = 130;
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $return_combination = $this->return_combination($v['position'], $openPrize['code_array']);
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $return_combination)){
                       $winPrize[$k] = $v;
                    }else{
                       $no_winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($return_combination as $va) {
                        if(in_array($va, $content)){
                            $winPrize1[$k] = $v;
                        }else{
                           $no_winPrize1[$k] = $v;
                        }
                    }
                }

            }
            $winPrize = array_merge_recursive($winPrize,$winPrize1);
            $no_winPrize = array_merge_recursive($no_winPrize,$no_winPrize1);
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }


    /**
     * 组三复式、组六复式规则 判断
     * @param type $a 选择的位置
     * @param type $b  开奖号码  数组的形式
     * @param type $c   投注的内容
     * @return boolean
     */
    public function zs_gz($a = '0&3&4',$b = array(1,1,8,1,2),$c = '1&2') {
        $position = explode('&', $a);
        $content = explode('&', $c);
        $num = count($content);
        $list = array();
        foreach ($position as $v) {
            $list[] = $b[$v];
        }
        if($num == array_unique($list) && $content == array_unique($list)){
            return true;
        }  else {
            return false;
        }
    }
    
    /**
     * 任选三  组三复式、组六复式
     * @return type
     */
    public function rx_zs_zsfs_zlfs() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $no_winPrize = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = array('in',array(138,140));
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                $zs_gz = $this->zs_gz($v['position'],$openPrize['code_array'],$v['content']);
                if($zs_gz == true){
                    $winPrize[$k] = $v;
                }  else {
                    $no_winPrize[$k] = $v;
                }
            }
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }

    
    /**
     * 组六单式、混合组选规则
     * @param type $a
     * @param type $b
     * @param type $c
     * @return boolean
     */
    public function rxs_zl_he($a = '0&3&4',$b = array(1,1,8,1,2),$c = '123') {
        $position = explode('&', $a);
        $list = array();
        foreach ($position as $v) {
            $list[] = $b[$v];
        }
        $code_sum = array_sum($list);
        $bai = substr($c,0,1);  
        $shi = substr($c,1,1);  
        $ge = substr($c,-1,1);  
        if($code_sum == $bai + $shi + $ge ){
            return true;
        }  else {
            return false;
        }
        
    }
    
    
    /**
     * 任选三  组六单式、混合组选
     * @return type
     */
    public function rx_zs_zlds_hhzx() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $winPrize1 = array();//中奖的
        $no_winPrize = array();//没中奖
        $no_winPrize1 = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = array('in',array(141,142));
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $rxs_zl_he = $this->rxs_zl_he($v['position'],$openPrize['code_array'],$v['content']);
                    if($rxs_zl_he == true){
                        $winPrize[$k] = $v;
                    }  else {
                        $no_winPrize[$k] = $v;
                    }
                }  else {
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        $rxs_zl_he = $this->rxs_zl_he($v['position'],$openPrize['code_array'],$va);
                        if($rxs_zl_he == true){
                            $winPrize1[$k] = $v;
                        }  else {
                            $no_winPrize1[$k] = $v;
                        }
                    }
                    
                }
                

            }
            $winPrize = array_merge_recursive($winPrize,$winPrize1);
            $no_winPrize = array_merge_recursive($no_winPrize,$no_winPrize1);
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }
    
    /**
     * 组选24、组选6中奖规则
     * @param type $position
     * @param type $code
     * @param type $content
     * @return boolean
     */
    public function rxs_zx24_zx6($position = '1&2&3&4',$code = array(1,1,8,1,2),$content = '2&3&4&5') {
        $list = array();
        foreach (explode('&', $position) as $v) {
            $list[] = $code[$v];
        }
        $num = 0;//在开奖码里的次数
        foreach (explode('&', $content) as $va) {
            if(in_array($va, $list)){
                $num += 1;
            }
        }
        if($num == count($list)){
            return true;
        }else{
            return FALSE;
        }
    }

    /**
     * 任选四、组选24、组选4
     * @return type
     */
    public function rxs_zx24_and_zx6() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $no_winPrize = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = array('in',array(149,151));
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if($this->rxs_zx24_zx6($v['position'],$openPrize['code_array'],$v['content'])){
                    $winPrize[$k] = $v;
                }else{
                    $no_winPrize[$k] = $v;
                }
            }
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }
    
    
    
    
    
    /**
     * 组选12、组选4中奖规则
     * @param type $position
     * @param type $code
     * @param type $content
     * @return boolean
     */
    public function rxs_zx12_zx4($position = '1&2&3&4',$code = array(1,5,8,7,5),$content = '0&1&2&3&4&5&6&7&8&9,0&1&2&3&4&5&6&7&8&9') {
        $list = array();
        foreach (explode('&', $position) as $v) {
            $list[] = $code[$v];
        }
        $_list = array_unique($list);
        if(count($_list) == 5){
            return false;
        }
        $FetchRepeatMemberInArray = FetchRepeatMemberInArray($list);//取出数组相同的值
        foreach ($_list as $ke => $va) {
            if($va == $FetchRepeatMemberInArray ){
                unset($_list[$ke]);
            }
        }
        $num = 0;//有开奖的号码出现的次数
        $new_content = explode(',', $content);
        if(substr_count($new_content[0], '&') == 0){
            if($FetchRepeatMemberInArray == $new_content[0]){
                foreach ($_list as $value) {
                    if(in_array($value, explode('&', $new_content[1]))){
                        $num += 1;
                    }
                }
                if($num == count($_list)){
                    return true;
                }  else {
                     return false;
                }
            }  else {
                return false;
            }
        }  else {
            if(in_array($FetchRepeatMemberInArray, explode('&', $new_content[0]))){
                foreach ($_list as $value) {
                    if(in_array($value, explode('&', $new_content[1]))){
                        $num += 1;
                    }
                }
                if($num == count($_list)){
                    return true;
                }  else {
                     return false;
                }
            }  else {
                return false;
            }
        }
    }

    
    /**
     * 任选四、组选12、组选4
     * @return type
     */
    public function rxs_zx12_and_zx4() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $no_winPrize = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = array('in',array(150,152));
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if($this->rxs_zx12_zx4($v['position'],$openPrize['code_array'],$v['content'])){
                    $winPrize[$k] = $v;
                }else{
                    $no_winPrize[$k] = $v;
                }
            }
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }
    

    /**
     * 组三单式匹配规则
     * @param type $a
     * @param type $b
     * @param type $c
     * @return boolean
     */
    public function rxs_zs_gz($a = '0&3&4',$b = array(1,1,8,1,2),$c = '123') {
        $position = explode('&', $a);
        $list = array();
        foreach ($position as $v) {
            $list[] = $b[$v];
        }
        $code_sum =implode("",$list);
        $bai = substr($c,0,1);  
        $shi = substr($c,1,1);  
        $ge = substr($c,-1,1);
                 
        if($code_sum == $bai.$shi.$ge or $code_sum == $bai.$ge.$shi or $code_sum == $shi.$bai.$ge 
            or $code_sum ==  $shi.$ge.$bai  or $code_sum == $ge.$bai.$shi or $code_sum == $ge.$shi.$bai)
        {
            return true;
        }  else {
            return false;
        }

    }

    /**
     * 组三单式
     * @return type
     */
    public function rx_zs_zsds() {
        $openPrize = $this->judge();
        $winPrize = array();//中奖的
        $winPrize1 = array();//中奖的
        $no_winPrize = array();//没中奖
        $no_winPrize1 = array();//没中奖
        if(!empty($openPrize)){
            $data['category_id']  = $openPrize['code'];
            $data['status']  = $openPrize['status'];
            $data['type']  = 0;
            $data['remark']  = array('EQ','任');
            $data['position']  != '';
            $data['play_way_id']  = 139;
            $data['issue']  = $openPrize['expect'];
            $data['time']  = array('LT',$openPrize['opentime']);
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $rxs_zs_gz = $this->rxs_zs_gz($v['position'],$openPrize['code_array'],$v['content']);
                    if($rxs_zs_gz == true){
                        $winPrize[$k] = $v;
                    }  else {
                        $no_winPrize[$k] = $v;
                    }
                }  else {
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        $rxs_zs_gz = $this->rxs_zs_gz($v['position'],$openPrize['code_array'],$va);
                        if($rxs_zs_gz == true){
                            $winPrize1[$k] = $v;
                        }  else {
                            $no_winPrize1[$k] = $v;
                        }
                    }
                    
                }
                
            }
            $winPrize = array_merge_recursive($winPrize,$winPrize1);
            $no_winPrize = array_merge_recursive($no_winPrize,$no_winPrize1);
            foreach ($no_winPrize as $va) {
                    $data['id'] = $va['id'];
                    $data['status'] = 3;
                    $data['profitLoss'] = 0 - $va['money'];
                    M('bet_record')->save($data);
            }
            return $winPrize;
        }
    }
    
    /**
     * 腾讯分分彩任选数组中奖数据处理
     */
    public function texffcrx_all_winPrize_array() {
        $rx_zxfs = $this->rx_zxfs();
        $rx_zxds = $this->rx_zxds();
        $rx_zxhz = $this->rx_zxhz();
        $rx2_zxfs = $this->rx2_zxfs();
        $rx_rxzx_zxds = $this->rx_rxzx_zxds();
        $rx_zs_zsfs_zlfs = $this->rx_zs_zsfs_zlfs();
        $rx_zs_zsds = $this->rx_zs_zsds();      
        $rx_zs_zlds_hhzx = $this->rx_zs_zlds_hhzx();
        $rxs_zx24_and_zx6 = $this->rxs_zx24_and_zx6();
        $rxs_zx12_and_zx4 = $this->rxs_zx12_and_zx4();
        $winPrize = array_merge_recursive($rx_zxfs,$rx_zxds,$rx_zxhz,$rx2_zxfs,$rx_rxzx_zxds,$rx_zs_zsfs_zlfs,$rx_zs_zsds,$rx_zs_zlds_hhzx,$rxs_zx12_and_zx4);
        if (!empty($winPrize)) {
            BonusSend($winPrize,1);
        }
        
    }
    

    
    

    
    

    

    

    

    

    
    

   
    

    

    
    

    

    


    
    


    
    

    

    
    


    

    

    

    
    

    

    
    


    
    

    
    

    
}
        