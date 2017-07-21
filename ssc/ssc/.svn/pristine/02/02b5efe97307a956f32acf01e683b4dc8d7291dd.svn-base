<?php

namespace Html\Controller;

use Think\Controller;

class All11x5Controller extends Controller {

    /**
     * 开始的判断
     */
    public function go_head() {        
        $list = array();
        $_data['code'] = $_GET['numb'];
        // dump($_data);exit;
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if (!empty($open_prize_data)) {
            $opencode = $open_prize_data['opencode'];
            $_opencode = explode(',', $opencode);
            $list = array('array'=>$_opencode,'str'=>$opencode,'code'=>$open_prize_data['code'],'opentime'=>$open_prize_data['opentimestamp'],'expect'=>$open_prize_data['  expect'],'status'=>1);
        }
        return $list;
    }

    /**
     * 三码、前三直选复式
     */
    public function sm_qszxfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 190;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if (substr_count($v['content'], '&') == 0) {
                    foreach ($content as $_k => $_v) {
                        if ($content[$_k] == $str_array[$_k]) {
                            $winPrize[$k] = $v;
                        }
                    }
                } else {
                    foreach ($content as $key => $value) {
                        if (in_array($str_array[$key], explode('&', $value))) {
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 三码、前三直选单式
     */
    public function sm_qszxds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 191;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if (substr_count($v['content'], '&') == 0) {
                    $content = explode(' ', $v['content']);
                    foreach ($content as $_k => $_v) {
                        if ($content[$_k] == $str_array[$_k]) {
                            $winPrize[$k] = $v;
                        }
                    }
                } else {
                    $_content = explode('&', $v['content']);
                    foreach ($_content as $key => $value) {
                        if (in_array($str_array[$key], explode(' ', $value))) {
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 三码、前三组选复式
     */
    public function sm_qszxfs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 192;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if (substr_count($v['content'], '&') == 2) {
                    if (array_sum($content) == array_sum($str_array)) {
                        $winPrize[$k] = $v;
                    }
                } else {
                    if (array_sum($content) >= array_sum($str_array)) {
                        $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 三码、前三组选单式
     */
    public function sm_qszxds1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 193;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if (substr_count($v['content'], '&') == 0) {
                    $content = explode(' ', $v['content']);
                    if (array_sum($content) == array_sum($str_array)) {
                        $winPrize[$k] = $v;
                    }
                } else {
                    $_content = explode('&', $v['content']);
                    foreach ($_content as $va) {
                        if (array_sum($va) == array_sum($str_array)) {
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 三码、前三组选胆拖
     */
    public function sm_qszxdt() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 195;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if (substr_count($content[0], '&') == 0) {
                    if (in_array($content[0], $str_array)) {
                        $two = explode('&', $content[1]);
                        if (in_array($two[0], $str_array)) {
                            if (in_array($two[0], $str_array)) {
                                $winPrize[$k] = $v;
                            }
                        }
                    }
                } else {
                    $one = explode('&', $content[0]);
                    foreach ($one as $va) {
                        if (in_array($va, $str_array)) {
                            $_two = explode('&', $content[1]);
                            foreach ($_two as $value) {
                                if (in_array($value, $str_array)) {
                                    $count += 1;
                                }
                            }
                        }
                    }
                    if ($count >= 2) {
                        $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 二码、前二直选复式
     */
    public function em_qezxfs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 5);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 196;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if (substr_count($v['content'], '&') == 0) {
                    if ($content[0] == $str_array[0]) {
                        if ($content[1] == $str_array[1]) {
                            $winPrize[$k] = $v;
                        }
                    }
                } else {
                    foreach ($content as $key => $value) {
                        if (in_array($str_array[$key], explode('&', $value))) {
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 二码、前二直选单式
     */
    public function em_qezxds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 5);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 197;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                if (substr_count($v['content'], '&') == 0) {
                    $content = explode(' ', $v['content']);
                    if ($content[0] == $str_array[0]) {
                        if ($content[1] == $str_array[1]) {
                            $winPrize[$k] = $v;
                        }
                    }
                } else {
                    $_content = explode('&', $v['content']);
                    foreach ($_content as $key => $value) {
                        if (in_array($str_array[$key], explode(' ', $value))) {
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 二码、前二组选复式
     * 
     */
    public function em_qezxfs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 5);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 198;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if (substr_count($v['content'], '&') == 1) {
                    if (array_sum($str_array) == array_sum($content)) {
                        $winPrize[$k] = $v;
                    }
                } else {
                    if (array_sum($content) >= array_sum($str_array)) {
                        $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 二码、前二组选单式
     * 
     */
    public function em_qezxds1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 5);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 199;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                if (substr_count($v['content'], '&') == 0) {
                    $content = explode(' ', $v['content']);
                    if (array_sum($str_array) == array_sum($content)) {
                        $winPrize[$k] = $v;
                    }
                } else {
                    $_content = explode('&', $v['content']);
                    foreach ($_content as $va) {
                        if (array_sum(explode(' ', $va)) >= array_sum($str_array)) {
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

       return $winPrize;
    }

    /**
     * 二码、前二组选胆拖
     * 
     */
    public function em_qezxdt1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 5);
            $str_array = explode(',', $str);
            $sum_array = array_sum($str_array);

            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 200;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if (substr_count($content[1], '&') == 0) {
                    if (array_sum($content) == $sum_array) {
                        $winPrize[$k] = $v;
                    }
                } else {
                    $a = $sum_array - $content[0];
                    if (in_array($a, explode('&', $content[1]))) {
                        $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 不定位
     * 
     */
    public function bdw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 201;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                if (substr_count($v['content'], '&') == 0) {
                    if (in_array($v['content'], $str_array)) {
                        $winPrize[$k] = $v;
                    }
                } else {
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if (in_array($va, $str_array)) {
                            $count += 1;
                        }
                    }
                    if ($count) {
                        $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize, $winPrize1);
        }

        return $winPrize;
    }

    /**
     * 定位胆
     * 
     */
    public function dwd() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        $winPrize2 = array();
        $winPrize3 = array();
        $winPrize4 = array();
        $winPrize5 = array();
        if (!empty($opencode)) {
            $str = substr($opencode['str'], 0, 8);
            $str_array = explode(',', $str);
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 202;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();


            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if (substr_count($v['content'], '&') == 0) {
                    if ($content[0]) {
                        if ($content[0] == $str_array[0]) {
                            $winPrize[$k] = $v;
                        }
                    } else {
                        if ($content[1]) {
                            if ($content[1] == $str_array[1]) {
                                $winPrize1[$k] = $v;
                            }
                        } else {
                            if ($content[2]) {
                                if ($content[2] == $str_array[2]) {
                                    $winPrize2[$k] = $v;
                                }
                            }
                        }
                    }
                } else {
                    if (in_array($str_array[0], explode('&', $content[0]))) {
                        $winPrize3[$k] = $v;
                    } else {
                        if (in_array($str_array[1], explode('&', $content[1]))) {
                            $winPrize4[$k] = $v;
                        } else {
                            if (in_array($str_array[2], explode('&', $content[2]))) {
                                $winPrize5[$k] = $v;
                            }
                        }
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1, $winPrize2, $winPrize3, $winPrize4, $winPrize5);
        return $winPrize;
    }

    
    /**
     * 趣味型、趣味_定单双
     * 
     */
    public function qwx_qw_dds() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $opencode_array = $opencode['array'];
            $dan = 0;
            $shuang = 0;
            foreach ($opencode_array as $value) {
                if(($value%2) == 0){
                    $shuang += 1;
                }  else {
                    $dan += 1;
                }
            }
            $str =  $dan.'单'.$shuang.'双';
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 204;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $str){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($va == $str){
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 趣味型、趣味_猜中位
     * 
     */
    public function qwx_qw_czw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $mid_code = substr($opencode['str'],6,2);  
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 205;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $mid_code){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if($va == $mid_code){
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选复式、任选一中一
     * 
     */
    public function rxfs_rxyzy() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 207;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
                            $winPrize1[$k] = $v;
                        }
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    
    /**
     * 任选复式、任选二中二
     * 
     */
    public function rxfs_rxeze() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 208;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
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
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选复式、任选三中三
     * 
     */
    public function rxfs_rxszs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 209;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
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
                  if(array_sum($content) >= array_sum($opencode['array'])){
                      $winPrize1[$k] = $v;
                  }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选复式、任选四中四
     * 
     */
    public function rxfs_rxszs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 210;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $_count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 3){
                    foreach ($content as $value) {
                        if(in_array($va, $opencode['array'])){
                            $_count += 1;
                        }
                    }
                    if($_count == 4){
                        $winPrize[$k] = $v;
                    }
                }else{
                  if(array_sum($content) >= array_sum($opencode['array'])){
                      $winPrize1[$k] = $v;
                  }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选复式、任选五中五
     * 
     */
    public function rxfs_rxwzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 211;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            $_count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 4){
                    foreach ($content as $value) {
                        if(in_array($va, $opencode['array'])){
                            $_count += 1;
                        }
                    }
                    if($_count == 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                  if(array_sum($content) >= array_sum($opencode['array'])){
                      $winPrize1[$k] = $v;
                  }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选复式、任选六中五
     * 
     */
    public function rxfs_rxlzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 212;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $_count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 5){
                    foreach ($content as $value) {
                        if(in_array($va, $opencode['array'])){
                            $_count += 1;
                        }
                    }
                    if($_count == 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                  if(array_sum($content) >= array_sum($opencode['array'])){
                      $winPrize1[$k] = $v;
                  }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选复式、任选七中五
     * 
     */
    public function rxfs_rxqzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 213;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $_count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 6){
                    foreach ($content as $value) {
                        if(in_array($va, $opencode['array'])){
                            $_count += 1;
                        }
                    }
                    if($_count == 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                  if(array_sum($content) >= array_sum($opencode['array'])){
                      $winPrize1[$k] = $v;
                  }
                }
            }
        }
        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    
    /**
     * 任选复式、任选八中五
     * 
     */
    public function rxfs_rxbzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 214;
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $_count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 7){
                    foreach ($content as $value) {
                        if(in_array($va, $opencode['array'])){
                            $_count += 1;
                        }
                    }
                    if($_count == 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                  if(array_sum($content) >= array_sum($opencode['array'])){
                      $winPrize1[$k] = $v;
                  }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选一中一
     * 
     */
    public function rxds_rxyzy() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 216;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if(in_array($v['content'], $opencode['array'])){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array($_v, $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 1){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    
    /**
     * 任选单式、任选二中二
     * 
     */
    public function rxds_rxeze() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 217;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 == 2){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 2){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选三中三
     * 
     */
    public function rxds_rxszs() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 218;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 == 3){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 3){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选四中四
     * 
     */
    public function rxds_rxszs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 219;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 == 4){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 4){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选五中五
     * 
     */
    public function rxds_rxwzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 220;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 == 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 5){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选六中五
     * 
     */
    public function rxds_rxlzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 221;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 >= 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 5){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选七中五
     * 
     */
    public function rxds_rxqzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 222;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 >= 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                   foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 5){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选单式、任选八中五
     * 
     */
    public function rxds_rxbzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 223;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    $str = explode(' ', $v['content']);
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 >= 5){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $v['content']);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >= 5){
                        $winPrize1[$k] = $v;
                    }
                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    
    /**
     * 任选胆拖、任选二中二
     * 
     */
    public function rxdt_rxeze() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        $winPrize2 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 225;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            $count2 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                    foreach ($str as $value) {
                        if(in_array($value, $opencode['array'])){
                            $count1 += 1;
                        }
                    }
                    if($count1 == 2){
                        $winPrize[$k] = $v;
                    }
                }else{
                    $content = explode('&', $str[1]);
                    foreach ($content as $_v) {
                        if(in_array(explode(' ', $_v), $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if(substr_count($str[0], '&') == 0){
                        if(in_array($str[0], $opencode['array'])){
                            if($count >= 1){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }else{
                        $_content = explode('&', $str[0]);
                        foreach ($_content as $_vs) {
                            if(in_array(explode(' ', $_vs), $opencode['array'])){
                                $count2 += 1;
                            }
                        }
                        if($count2 >= 1){
                            if($count >= 1){
                                $winPrize2[$k] = $v;
                            }
                        }
                    }


                }
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1,$winPrize2);
        return $winPrize;
    }
    
    /**
     * 任选胆拖、任选三中三
     * 
     */
    public function rxdt_rxszs() {
        $opencode = $this->go_head();        
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 226;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($str[0], '&') == 0){
                    if (in_array($str[0], $opencode['array'])){
                        foreach (explode('&', $str[1]) as $va) {
                            if(in_array($va, $opencode['array'])){
                                $count += 1;
                            }
                        }
                        if($count >= 2){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach (explode('&', $str[0]) as $value) {
                        if (in_array($value, $opencode['array'])){
                            foreach (explode('&', $str[1]) as $va) {
                                if(in_array($va, $opencode['array'])){
                                    $count1 += 1;
                                }
                            }
                            if($count1 >= 2){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }

                }
                
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选胆拖、任选四中四
     * 
     */
    public function rxdt_rxszs1() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 227;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($str[0], '&') == 0){
                    if (in_array($str[0], $opencode['array'])){
                        foreach (explode('&', $str[1]) as $va) {
                            if(in_array($va, $opencode['array'])){
                                $count += 1;
                            }
                        }
                        if($count >= 3){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach (explode('&', $str[0]) as $value) {
                        if (in_array($value, $opencode['array'])){
                            foreach (explode('&', $str[1]) as $va) {
                                if(in_array($va, $opencode['array'])){
                                    $count1 += 1;
                                }
                            }
                            if($count1 >= 3){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }

                }
                
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选胆拖、任选五中五
     * 
     */
    public function rxdt_rxwzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 228;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($str[0], '&') == 0){
                    if (in_array($str[0], $opencode['array'])){
                        foreach (explode('&', $str[1]) as $va) {
                            if(in_array($va, $opencode['array'])){
                                $count += 1;
                            }
                        }
                        if($count >= 4){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach (explode('&', $str[0]) as $value) {
                        if (in_array($value, $opencode['array'])){
                            foreach (explode('&', $str[1]) as $va) {
                                if(in_array($va, $opencode['array'])){
                                    $count1 += 1;
                                }
                            }
                            if($count1 >= 4){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }

                }
                
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选胆拖、任选六中五
     * 
     */
    public function rxdt_rxlzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 229;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($str[0], '&') == 0){
                    if (in_array($str[0], $opencode['array'])){
                        foreach (explode('&', $str[1]) as $va) {
                            if(in_array($va, $opencode['array'])){
                                $count += 1;
                            }
                        }
                        if($count >= 4){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach (explode('&', $str[0]) as $value) {
                        if (in_array($value, $opencode['array'])){
                            foreach (explode('&', $str[1]) as $va) {
                                if(in_array($va, $opencode['array'])){
                                    $count1 += 1;
                                }
                            }
                            if($count1 >= 4){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }

                }
                
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选胆拖、任选七中五
     * 
     */
    public function rxdt_rxqzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 230;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($str[0], '&') == 0){
                    if (in_array($str[0], $opencode['array'])){
                        foreach (explode('&', $str[1]) as $va) {
                            if(in_array($va, $opencode['array'])){
                                $count += 1;
                            }
                        }
                        if($count >= 4){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach (explode('&', $str[0]) as $value) {
                        if (in_array($value, $opencode['array'])){
                            foreach (explode('&', $str[1]) as $va) {
                                if(in_array($va, $opencode['array'])){
                                    $count1 += 1;
                                }
                            }
                            if($count1 >= 4){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }

                }
                
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 任选胆拖、任选八中五
     * 
     */
    public function rxdt_rxbzw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id'] = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id'] = 231;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time'] = array('LT', $opencode['opentime']); //$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            $count1 = 0;
            foreach ($list as $k => $v) {
                $str = explode(',', $v['content']);
                if(substr_count($str[0], '&') == 0){
                    if (in_array($str[0], $opencode['array'])){
                        foreach (explode('&', $str[1]) as $va) {
                            if(in_array($va, $opencode['array'])){
                                $count += 1;
                            }
                        }
                        if($count >= 4){
                            $winPrize[$k] = $v;
                        }
                    }
                }else{
                    foreach (explode('&', $str[0]) as $value) {
                        if (in_array($value, $opencode['array'])){
                            foreach (explode('&', $str[1]) as $va) {
                                if(in_array($va, $opencode['array'])){
                                    $count1 += 1;
                                }
                            }
                            if($count1 >= 4){
                                $winPrize1[$k] = $v;
                            }
                        }
                    }

                }
                
            }
        }

        $winPrize = array_merge($winPrize, $winPrize1);
        return $winPrize;
    }
    
    /**
     * 所有11选5数组整合
     * @return type
     */
    public function all_11x5_winPriz_array() {
        $sm_qszxfs = $this->sm_qszxfs();
        $sm_qszxds = $this->sm_qszxds();
        $sm_qszxfs1 = $this->sm_qszxfs1();
        $sm_qszxds1 = $this->sm_qszxds1();
        $sm_qszxdt = $this->sm_qszxdt();
        $em_qezxfs = $this->em_qezxfs();
        $em_qezxds = $this->em_qezxds();
        $em_qezxfs1 = $this->em_qezxfs1();
        $em_qezxds1 = $this->em_qezxds1();
        $em_qezxdt1 = $this->em_qezxdt1();
        $bdw = $this->bdw();
        $dwd = $this->dwd();
        $qwx_qw_dds = $this->qwx_qw_dds();
        $qwx_qw_czw = $this->qwx_qw_czw();
        $rxfs_rxyzy = $this->rxfs_rxyzy();
        $rxfs_rxeze = $this->rxfs_rxeze();
        $rxfs_rxszs = $this->rxfs_rxszs();
        $rxfs_rxszs1 = $this->rxfs_rxszs1();
        $rxfs_rxwzw = $this->rxfs_rxwzw();
        $rxfs_rxlzw = $this->rxfs_rxlzw();
        $rxfs_rxqzw = $this->rxfs_rxqzw();
        $rxfs_rxbzw = $this->rxfs_rxbzw();
        $rxds_rxyzy = $this->rxds_rxyzy();
        $rxds_rxeze = $this->rxds_rxeze();
        $rxds_rxszs = $this->rxds_rxszs();
        $rxds_rxszs1 = $this->rxds_rxszs1();
        $rxds_rxwzw = $this->rxds_rxwzw();
        $rxds_rxlzw = $this->rxds_rxlzw();
        $rxds_rxqzw = $this->rxds_rxqzw();
        $rxds_rxbzw = $this->rxds_rxbzw();
        $rxdt_rxeze = $this->rxdt_rxeze();
        $rxdt_rxszs = $this->rxdt_rxszs();
        $rxdt_rxszs1 = $this->rxdt_rxszs1();
        $rxdt_rxwzw = $this->rxdt_rxwzw();
        $rxdt_rxlzw = $this->rxdt_rxlzw();
        $rxdt_rxqzw = $this->rxdt_rxqzw();
        $rxdt_rxbzw = $this->rxdt_rxbzw();
        
        /*$winPrize = array_merge_recursive($sm_qszxfs,$sm_qszxds,$sm_qszxfs1,$sm_qszxds1,$sm_qszxdt,$em_qezxfs,$em_qezxds,$em_qezxfs1,$em_qezxds1,$em_qezxdt1,$bdw,$dwd,$qwx_qw_dds,$qwx_qw_czw,$rxfs_rxyzy,$rxfs_rxeze
        ,$rxfs_rxszs,$rxfs_rxszs1,$rxfs_rxwzw,$rxfs_rxlzw,$rxfs_rxqzw,$rxfs_rxbzw,$rxds_rxyzy,$rxds_rxeze,$rxds_rxszs,$rxds_rxszs1,$rxds_rxwzw,$rxds_rxlzw,$rxds_rxqzw,$rxds_rxbzw,$rxdt_rxeze,
        $rxdt_rxszs,$rxdt_rxszs1,$rxdt_rxwzw,$rxdt_rxlzw,$rxdt_rxqzw,$rxdt_rxbzw);*/
        $array_sum = array_merge_recursive($sm_qszxfs,$sm_qszxds,$sm_qszxfs1,$sm_qszxds1,$sm_qszxdt,$em_qezxfs,$em_qezxds,$em_qezxfs1,$em_qezxds1,$em_qezxdt1,$bdw,$dwd,$qwx_qw_dds,$qwx_qw_czw,$rxfs_rxyzy,$rxfs_rxeze
            ,$rxfs_rxszs,$rxfs_rxszs1,$rxfs_rxwzw,$rxfs_rxlzw,$rxfs_rxqzw,$rxfs_rxbzw,$rxds_rxyzy,$rxds_rxeze,$rxds_rxszs,$rxds_rxszs1,$rxds_rxwzw,$rxds_rxlzw,$rxds_rxqzw,$rxds_rxbzw,$rxdt_rxeze,
            $rxdt_rxszs,$rxdt_rxszs1,$rxdt_rxwzw,$rxdt_rxlzw,$rxdt_rxqzw,$rxdt_rxbzw);

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