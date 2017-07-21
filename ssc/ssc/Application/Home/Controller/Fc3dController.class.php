<?php 
namespace Home\Controller;
use Think\Controller;
class Fc3dController  extends Controller {
    /**
     * 开始的判断
     */
    public function go_head() {
        $list = array();
        $_data['code'] = 28;
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if (!empty($open_prize_data)) {
            $opencode = $open_prize_data['opencode'];
            $_opencode = explode(',', $opencode);
            $list = array('array'=>$_opencode,'str'=>$opencode,'code'=>$open_prize_data['code'],'opentime'=>$open_prize_data['opentimestamp'],'expect'=>$open_prize_data['  expect'],'status'=>1);
        }
        return $list;
    }

    /**
     * 三星、直选复式
     * @return type
     */
    public function sx_zxfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
           $_opencode = $opencode['str'];
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 245;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(str_replace(',','',$v['content']) == str_replace(',','',$_opencode)){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode(',', $v['content']);
                    if(in_array($opencode['array'][0], explode('&', $content[0]))){
                        if(in_array($opencode['array'][1], explode('&', $content[1]))){
                             if(in_array($opencode['array'][2], explode('&', $content[2]))){
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
     * 三星、直选单式
     * @return type
     */
    public function sx_zxds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $_opencode = $opencode['str'];
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 246;
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content']  == str_replace(',','',$_opencode)){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($va  == str_replace(',','',$_opencode)){
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
     * 三星、直选和值
     * @return type
     */
    public function sx_zxhz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 247;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($va  ==  array_sum($opencode['array'])){
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
     * 三星、组三复式
     * @return type
     */
    public function sx_zsfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 249;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 1){
                    if(in_array($content[0], $opencode['array'])){
                        if(in_array($content[1], $opencode['array'])){
                             $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach ($content as $k => $va) {
                        if(in_array($va, $opencode['array'])){
                            $count += 1;
                            
                        }
                    }
                    if($count >=3){
                         $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    /**
     * 三星、组三单式
     * @return type
     */
    public function sx_zsds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $unique_array = array_unique($opencode['array']);
            if(count($unique_array) == 2){
                $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
                $data['play_way_id']  = 250;
                $data['issue']  = $opencode['expect'];
                $data['status']  = $opencode['status'];
                $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
                $list = M('bet_record')->where($data)->select();
                $count = 0;
                foreach ($list as $k => $v) {
                    if(substr_count($v['content'], '&') == 0){
                            for($i=strlen($v['content']);$i>0;$i--){
                                $sum += substr($v['content'],$i-1,1);
                            }
                            if($sum == array_sum($opencode['array'])){
                                 $winPrize[$k] = $v;
                            }
                    }else{
                        $content = explode('&', $v['content']);
                        foreach ($content as $k => $va) {
                            for($i=strlen($va);$i>0;$i--){
                                $sum_arr += substr($va,$i-1,1);
                                if($sum_arr == array_sum($opencode['array'])){
                                    $winPrize1[$k] = $v;
                                }
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
     * 三星、组六复式
     * @return type
     */
    public function sx_zlfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 251;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 2){
                    if(in_array($content[0], $opencode['array'])){
                        if(in_array($content[1], $opencode['array'])){
                            if(in_array($content[2], $opencode['array'])){
                                 $winPrize[$k] = $v;
                            }
                        }
                    }
                }else{
                    foreach ($content as $k => $va) {
                        if(in_array($va, $opencode['array'])){
                            $count += 1;
                            
                        }
                    }
                    if($count >=3){
                         $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;
    }
    /**
     * 计算三位数之和
     */
    public function sum_three($a) {
        if($a){
            $a = $a;
        }  else {
            $a = '123';//任意
        }
        $gewei = $a%10;
        $a = (int)($a/10);
        $shiwei = $a%10;
        $baiwei = (int)($a/10);
        return $gewei + $shiwei +  $baiwei;
    }
    
    
    /**
     * 三星、组六单式
     * @return type
     */
    public function sx_zlds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 252;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $winPrize = array();
            $winPrize1 = array();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($this->sum_three($v['content']) == array_sum($opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($this->sum_three($va) == array_sum($opencode['array'])){
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
     * 三星、混合组选
     * @return type
     */
    public function sx_hzzx() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 253;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($this->sum_three($v['content']) == array_sum($opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($this->sum_three($va) == array_sum($opencode['array'])){
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
     * 三星、组选和值
     * @return type
     */
    public function sx_zxhz1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 254;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == array_sum($opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($va == array_sum($opencode['array'])){
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
     * 二星、(前二)直选复式
     * @return type
     */
    public function sx_qezxfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 257;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                    if($content[0] == $opencode['array'][0]){
                        if($content[1] == $opencode['array'][1]){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                        if(in_array($opencode['array'][0], explode('&', $content[0]))){
                             if(in_array($opencode['array'][1], explode('&', $content[1]))){
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
     * 二星、(前二)直选单式
     * @return type
     */
    public function sx_qezxds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $two_int = str_replace(',', '',substr($opencode['str'],0,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 258;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                        if($two_int == $v['content']){
                            $winPrize[$k] = $v;
                        }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($two_int == $va){
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
     * 二星、(前二)组选复式
     * @return type
     */
    public function sx_qezxfs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],0,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 262;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 1){
                        if(array_sum($content) == array_sum($two_array)){
                            $winPrize[$k] = $v;
                        }
                }else{
                        if(array_sum($content) >= array_sum($two_array)){
                            $winPrize1[$k] = $v;
                        }
                }

            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;
    }
    
    /**
     * 二星、(前二)组选单式
     * @return type
     */
    public function sx_qezxds1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],0,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 263;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                        if($this->sum_three($v['content'].'0') == array_sum($two_array)){
                            $winPrize[$k] = $v;
                        }
                }else{
                    foreach ($content as $va) {
                        if($this->sum_three($va.'0') == array_sum($two_array)){
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
     * 二星、(后二)直选复式
     * @return type
     */
    public function sx_hezxfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],2,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 259;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                        if($content[0] == $two_array[0]){
                            if($content[1] == $two_array[1]){
                                 $winPrize[$k] = $v;
                            }
                        }
                }else{
                        if(in_array($two_array[0], explode('&', $content[0]))){
                            if(in_array($two_array[1], explode('&', $content[1]))){
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
     * 二星、(后二)直选单式
     * @return type
     */
    public function sx_hezxds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $two_int = str_replace(',','',substr($opencode['str'],2,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 260;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                            if($v['content'] == $two_int){
                                 $winPrize[$k] = $v;
                            }
                }else{
                    foreach ($content as $va) {
                            if($va == $two_int){
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
     * 二星、(后二)组选复式
     * @return type
     */
    public function sx_hezxfs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],2,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 264;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                foreach ($content as $va) {
                    if($this->sum_three($va.'0') >= array_sum($two_array)){
                            $winPrize[$k] = $v;
                    }
                }


            }
        }

        return $winPrize;
    }
    
    /**
     * 二星、(后二)组选单式
     * @return type
     */
    public function sx_hezxds1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],2,3));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 265;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                        if($this->sum_three($v['content'].'0') == array_sum($two_array)){
                                $winPrize[$k] = $v;
                        }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($this->sum_three($va.'0') == array_sum($two_array)){
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
     * 定位胆
     */
    public function dwd() {
        $opencode = $this->go_head();
        $winPrize1 = array();
        $winPrize2 = array();
        $winPrize3 = array();
        $winPrize4 = array();
        $winPrize5 = array();
        $winPrize6 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 266;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                    if($content[0] == $opencode['array'][0]){
                        $winPrize1[$k] = $v;
                    }else{
                        if($content[1] == $opencode['array'][1]){
                            $winPrize2[$k] = $v;
                        }else{
                            if($content[2] == $opencode['array'][2]){
                                $winPrize3[$k] = $v;
                            }
                        }
                    }
                }else{
                   if(in_array($opencode['array'][0], explode('&', $content[0]))){
                        $winPrize4[$k] = $v;
                   }  else {
                       if(in_array($opencode['array'][1], explode('&', $content[1]))){
                           $winPrize5[$k] = $v;
                       }else{
                           if(in_array($opencode['array'][2], explode('&', $content[2]))){
                               $winPrize6[$k] = $v;
                           }
                       }
                   }
                }
            }
            $winPrize = array_merge($winPrize1,$winPrize2,$winPrize3,$winPrize4,$winPrize5,$winPrize6);
        }

        return $winPrize;
    }
    /**
     * 不定位、一码不定位
     */
    public function bdw_ymbdw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 269;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }  else {
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
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
     * 不定位、二码不定位
     */
    public function bdw_embdw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 270;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 1){
                    if(in_array($content[0], $opencode['array'])){
                        if(in_array($content[1], $opencode['array'])){
                             $winPrize[$k] = $v;
                        }
                    }
                }  else {
                    
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
                             $count += 1;
                        }
                    }
                    if($count >= 2){
                        $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;
    }
    /**
     * 大小单双、前二大小单双
     */
    public function dxds_qedxds() {
        $opencode = $this->go_head();
        $winPrize1 = array();
        $winPrize2 = array();
        $winPrize3 = array();
        $winPrize4 = array();
        $winPrize5 = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],0,3));
            $bai = '';
            $_bai = '';
            $shi = '';
            $_shi = '';
            if($two_array[0] >4){
                $bai = '大';
            }else{
                $bai = '小';
            }
            if($two_array[1] >4){
                $shi = '大';
            }else{
                $shi = '小';
            }
            if($two_array[0]%2==0){
                $_bai = '双';
            }  else {
                $_bai = '单';
            }
            if($two_array[1]%2==0){
                $_shi = '双';
            }  else {
                $_shi = '单';
            }
            $str = array($bai,$shi,$_bai,$_shi);
            $_str = array_unique($str);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 273;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                   if($content[0] == $str[0]){
                       if($content[1] == $str[1]){
                           $winPrize1[$k] = $v;
                       }else{
                           if($content[3] == $str[3]){
                               $winPrize2[$k] = $v;
                           }
                       }
                   } 
                    if($content[2] == $str[2]){
                       if($content[1] == $str[1]){
                           $winPrize3[$k] = $v;
                       }else{
                           if($content[3] == $str[3]){
                               $winPrize4[$k] = $v;
                           }
                       }
                   }
                   
                }  else {
                    if(in_array($_str[0], explode('&', $content[0]))){
                         if(in_array($_str[2], explode('&', $content[1]))){
                             $winPrize5[$k] = $v;
                         }
                    }
                }
            }
            $winPrize = array_merge($winPrize1,$winPrize2,$winPrize3,$winPrize4,$winPrize5);
        }

        return $winPrize;
    }
    /**
     * 大小单双、后二大小单双
     */
    public function dxds_hedxds() {
        $opencode = $this->go_head();
        $winPrize1 = array();
        $winPrize2 = array();
        $winPrize3 = array();
        $winPrize4 = array();
        $winPrize5 = array();
        if (!empty($opencode)) {
            $two_array = explode(',',substr($opencode['str'],2,3));
            $bai = '';
            $_bai = '';
            $shi = '';
            $_shi = '';
            if($two_array[0] >4){
                $bai = '大';
            }else{
                $bai = '小';
            }
            if($two_array[1] >4){
                $shi = '大';
            }else{
                $shi = '小';
            }
            if($two_array[0]%2==0){
                $_bai = '双';
            }  else {
                $_bai = '单';
            }
            if($two_array[1]%2==0){
                $_shi = '双';
            }  else {
                $_shi = '单';
            }
            $str = array($bai,$shi,$_bai,$_shi);
            $_str = array_unique($str);
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 274;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                   if($content[0] == $str[0]){
                       if($content[1] == $str[1]){
                           $winPrize1[$k] = $v;
                       }else{
                           if($content[3] == $str[3]){
                               $winPrize2[$k] = $v;
                           }
                       }
                   } 
                    if($content[2] == $str[2]){
                       if($content[1] == $str[1]){
                           $winPrize3[$k] = $v;
                       }else{
                           if($content[3] == $str[3]){
                               $winPrize4[$k] = $v;
                           }
                       }
                   }
                   
                }  else {
                    if(in_array($_str[0], explode('&', $content[0]))){
                         if(in_array($_str[2], explode('&', $content[1]))){
                             $winPrize5[$k] = $v;
                         }
                    }
                }
            }
            $winPrize = array_merge($winPrize1,$winPrize2,$winPrize3,$winPrize4,$winPrize5);
        }

        return $winPrize;
    }
    
    
    
    
    
    /**
     * 福彩3D数组整合
     * @return type
     */
    public function all_fc3d_winPriz_array() {
        $ebth_ebtbz = $this->sx_zxfs();
        $ebth_ebtds = $this->sx_zxds();
        $eth_ethbz = $this->sx_zxhz();
        $eth_ethds = $this->sx_zsfs();
        $sbth_sbtbz = $this->sx_zsds();
        $sbth_sbtds = $this->sx_zlfs();
        $sbth_sbthz = $this->sx_zlds();
        $sth_sthdx = $this->sx_hzzx();
        $sth_sthtx = $this->sx_zxhz1();
        $sth_slhtx = $this->sx_qezxfs();
        $hz1 = $this->sx_qezxds();
        $sx_qezxfs1 = $this->sx_qezxfs1();
        $sx_qezxds1 = $this->sx_qezxds1();
        $sx_hezxfs = $this->sx_hezxfs();
        $sx_hezxds = $this->sx_hezxds();
        $sx_hezxfs1 = $this->sx_hezxfs1();
        $sx_hezxds1 = $this->sx_hezxds1();
        $dwd = $this->dwd();
        $bdw_ymbdw = $this->bdw_ymbdw();
        $bdw_embdw = $this->bdw_embdw();
        $dxds_qedxds = $this->dxds_qedxds();
        $dxds_hedxds = $this->dxds_hedxds();

    /*    $winPrize = array_merge_recursive($ebth_ebtbz,$ebth_ebtds,$eth_ethbz,$eth_ethds,$sbth_sbtbz,$sbth_sbtds,$sbth_sbthz,$sth_sthdx,$sth_sthtx,$sth_slhtx,$hz1,
        $sx_qezxfs1,$sx_qezxds1,$sx_hezxfs,$sx_hezxds,$sx_hezxfs1,$sx_hezxds1,$dwd,$bdw_ymbdw,$bdw_embdw,$dxds_qedxds,$dxds_hedxds);*/


        $array_sum = array($ebth_ebtbz,$ebth_ebtds,$eth_ethbz,$eth_ethds,$sbth_sbtbz,$sbth_sbtds,$sbth_sbthz,$sth_sthdx,$sth_sthtx,$sth_slhtx,$hz1,
            $sx_qezxfs1,$sx_qezxds1,$sx_hezxfs,$sx_hezxds,$sx_hezxfs1,$sx_hezxds1,$dwd,$bdw_ymbdw,$bdw_embdw,$dxds_qedxds,$dxds_hedxds);
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
            $map['category_id'] = 28;
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
            $map['category_id'] = 28;
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