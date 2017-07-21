<?php 
namespace Home\Controller;
use Think\Controller;
class Allkl10fController  extends Controller {
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
        // dump($open_prize_data);exit;
    }
    /**
     * 快乐十分、首位数投
     */
    public function swst() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $one_num = substr($opencode['str'],0,2);  
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 233;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();
            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $one_num){
                          $winPrize[$k] = $v;
                    }
                }else{
                    if(in_array($one_num, explode('&', $v['content']))){
                         $winPrize1[$k] = $v;
                    }
                }
            }
            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;
    }
    /**
     * 快乐十分、首位红投
     */
    public function swht() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
           $one_num = substr($opencode['str'],0,2);  
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 234;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                if(substr_count($v['content'], '&') == 0){
                    if($v['content'] == $one_num){
                          $winPrize[$k] = $v;
                    }
                }else{
                    if(in_array($one_num, explode('&', $v['content']))){
                         $winPrize1[$k] = $v;
                    }
                }
            }
            
            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;
    }
    /**
     * 快乐十分、二连直
     */
    public function elz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
           $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 235;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']); 
                if(substr_count($v['content'], '&') == 0){
                    foreach ($opencode['array'] as $_k => $_v) {
                        if($content[0] == $_v){
                            if($content[1] == $opencode['array'][$_k + 1]){
                                 $winPrize[$k] = $v;
                            }
                        }
                    }
                }else{
                    foreach ($opencode['array'] as $ke => $va) {
                        if(in_array($va, explode('&', $content[0]))){
                            if(in_array($opencode['array'][$ke+1], explode('&', $content[0]))){
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
     * 快乐十分、二连组
     */
    public function elzu() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 236;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                foreach ($content as $_k => $_v) {
                    if(in_array($_v, $opencode['array'])){
                        $num = array_keys($opencode['array'],$_v);
                        if($num == 0){
                            if($content[$_k + 1] == $opencode['array'][$num + 1]){
                                     $winPrize1[$k] = $v;
                            }
                        }elseif($num < count($opencode['array'])){
                            if($content[$_k + 1] == $opencode['array'][$num + 1] || $content[$_k + 1] == $opencode['array'][$num - 1]){
                                $winPrize[$k] = $v;
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
     * 前三直
     */
    public function qsz() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $qs_code_array = explode(',', substr($opencode['str'],0,8));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 237;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode(',', $v['content']);
                if(substr_count($v['content'], '&') == 0){
                    if($content[0] == $qs_code_array[0]){
                         if($content[1] == $qs_code_array[1]){
                             if($content[2] == $qs_code_array[2]){
                                 $winPrize[$k] = $v;
                             }
                         }
                    }
                }else{
                    if(in_array(explode('&', $content[0]), $qs_code_array[0])){
                        if(in_array(explode('&', $content[1]), $qs_code_array[1])){
                            if(in_array(explode('&', $content[2]), $qs_code_array[2])){
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
     * 前三组
     */
    public function qszu() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $qs_code_array = explode(',', substr($opencode['str'],0,8));
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 238;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(array_sum($content) >= array_sum($qs_code_array)){
                    $winPrize[$k] = $v;
                }
            }
        }

        return $winPrize;
    }
    
    /**
     * 快乐二
     */
    public function kle() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 239;
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
                            $winPrize1[$k] = $v;
                        }
                    }
                }else{
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >=2){
                        $winPrize[$k] = $v;
                    }
                }

            }

            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    /**
     * 快乐三
     */
    public function kls() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 240;
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
                                $winPrize1[$k] = $v;
                            }
                        }
                    }
                }else{
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >=3){
                        $winPrize[$k] = $v;
                    }
                }

            }

            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    /**
     * 快乐四
     */
    public function klsi() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 241;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 3){
                    if(in_array($content[0], $opencode['array'])){
                        if(in_array($content[1], $opencode['array'])){
                            if(in_array($content[2], $opencode['array'])){
                                if(in_array($content[3], $opencode['array'])){
                                    $winPrize1[$k] = $v;
                                }
                            }
                        }
                    }
                }else{
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >=4){
                        $winPrize[$k] = $v;
                    }
                }

            }

            $winPrize = array_merge($winPrize,$winPrize1);
        }
        return $winPrize;
    }
    
    /**
     * 快乐五
     */
    public function klw() {
        $opencode = $this->go_head();
        $winPrize = array();
        $winPrize1 = array();
        if (!empty($opencode)) {
            $data['category_id']  = $opencode['code'];  //$open_prize_data['code']  彩种id
            $data['play_way_id']  = 242;
            $data['issue']  = $opencode['expect'];
            $data['status']  = $opencode['status'];
            $data['time']  = array('LT',$opencode['opentime']);//$open_prize_data['opentime'] 开奖时间
            $list = M('bet_record')->where($data)->select();

            $count = 0;
            foreach ($list as $k => $v) {
                $content = explode('&', $v['content']);
                if(substr_count($v['content'], '&') == 4){
                    if(in_array($content[0], $opencode['array'])){
                        if(in_array($content[1], $opencode['array'])){
                            if(in_array($content[2], $opencode['array'])){
                                if(in_array($content[3], $opencode['array'])){
                                     if(in_array($content[4], $opencode['array'])){
                                          $winPrize1[$k] = $v;
                                     }
                                }
                            }
                        }
                    }
                }else{
                    foreach ($content as $va) {
                        if(in_array($va, $opencode['array'])){
                            $count += 1;
                        }
                    }
                    if($count >=5){
                        $winPrize[$k] = $v;
                    }
                }

            }

            $winPrize = array_merge($winPrize,$winPrize1);
        }

        return $winPrize;
    }
    
    
    
    
    /**
     * 所有快乐十分数组整合
     * @return type
     */
    public function all_kl10f_winPriz_array() {
        $ebth_ebtbz = $this->swst();
        $ebth_ebtds = $this->swht();
        $eth_ethbz = $this->elz();
        $eth_ethds = $this->elzu();
        $sbth_sbtbz = $this->qsz();
        $sbth_sbtds = $this->qszu();
        $sbth_sbthz = $this->kle();
        $sth_sthdx = $this->kls();
        $sth_sthtx = $this->klsi();
        $sth_slhtx = $this->klw();
        /*$winPrize = array_merge_recursive(
            $ebth_ebtbz,
            $ebth_ebtds,
            $eth_ethbz,
            $eth_ethds,
            $sbth_sbtbz,
            $sbth_sbtds,
            $sbth_sbthz,
            $sth_sthdx,
            $sth_sthtx,
            $sth_slhtx
        );*/
        $array_sum  =   [
            $ebth_ebtbz,
            $ebth_ebtds,
            $eth_ethbz,
            $eth_ethds,
            $sbth_sbtbz,
            $sbth_sbtds,
            $sbth_sbthz,
            $sth_sthdx,
            $sth_sthtx,
            $sth_slhtx
        ];
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