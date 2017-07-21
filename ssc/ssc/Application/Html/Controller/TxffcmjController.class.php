<?php 
namespace Html\Controller;
use Think\Controller;
class TxffcmjController extends Controller {
    
     /**
     * 腾讯分分彩开奖数据获取
     */
    public function judge() {
        $list = array();
        $_data['code'] = 40;     
        $open_prize_data = M('open_prize_data')->where($_data)->order('opentime DESC')->find();
        if(!empty($open_prize_data)){
            $w = substr($open_prize_data['opencode'],0,1); //万位
            $q = substr($open_prize_data['opencode'],2,1);//千位
            $b = substr($open_prize_data['opencode'],4,1);//百位
            $s = substr($open_prize_data['opencode'],6,1);//十位
            $g = substr($open_prize_data['opencode'],8,1);//个位
            $one = $this->return_list('w',$w);
            $two = $this->return_list('q',$q);
            $three = $this->return_list('b',$b);
            $four = $this->return_list('s',$s);
            $five = $this->return_list('g',$g);
            $oen_five = array_merge($one,$two,$three,$four,$five);
            $sum_list = $this->return_sum_list($w, $q, $b, $s, $g);
            $all_list = array_merge($oen_five,$sum_list);
            $list = array(
                'code'=>$open_prize_data['code'],
                'all_list'=>$all_list,
                'opentime'=>$open_prize_data['opentimestamp'],
                'expect'=>$open_prize_data['expect'],
                'status'=>1
            );
           
        }
        return $list;
    }
    /**
     * return list  第几球_  大、小、单、双
     * @param type $a
     * @param type $b
     * @return type
     */
    public function return_list($a = 'w',$b = 1) {
        if($a == 'w'){
            $str = '第一球_';
        }
        if($a == 'q'){
            $str = '第二球_';
        }
        if($a == 'b'){
            $str = '第三球_';
        }
        if($a == 's'){
            $str = '第四球_';
        }
        if($a == 'g'){
            $str = '第五球_';
        }
        $xiao = array(0,1,2,3,4);
        if(in_array($b, $xiao)){
            $_xiao[] = $str.'小';
        }  else {
            $_xiao =array();
        }
        $da = array(5,6,7,8,9);
        if(in_array($b, $da)){
            $_da[] = $str.'大';
        }  else {
            $_da = array();
        }
        $dan = array(1,3,5,7,9);
        if(in_array($b, $dan)){
            $_dan[] = $str.'单';
        }  else {
            $_dan = array();
        }
        $shuang = array(0,2,4,6,8);
        if(in_array($b, $shuang)){
            $_shuang[] = $str.'双';
        }else{
            $_shuang = array();
        }
        $_num[] = $str.$b;
        $list = array();
        $list  = array_merge_recursive($list,$_xiao,$_da,$_dan,$_shuang,$_num);
        //dump($list);exit;
        return $list;
    }
    
    /**
     * return list  总和_  大、小、单、双、龙、虎、和
     * @param type $a
     * @param type $b
     * @param type $c
     * @param type $d
     * @param type $e
     * @return type
     */
    public function return_sum_list($a = 1,$b = 2,$c = 3,$d = 4 ,$e = 5) {
        $sum = $a + $b + $c + $d + $e;
        $sum_da = array();
        $sum_xiao = array();
        $sum_shuang = array();
        $sum_dan = array();
        $sum_long = array();
        $sum_hu = array();
        $sum_he = array();
        if($sum >= 25 ){
            $sum_da[] = '总和_大';
        }else{
            $sum_xiao[] = '总和_小';
        }
        if(($sum % 2) == 0){
            $sum_shuang[] = '总和_双';
        }else{
            $sum_dan[] = '总和_单';
        }
        if($a > $e){
            $sum_long[] = '总和_龙';
        }
        if($a < $e){
            $sum_hu[] = '总和_虎';
        }
        if($a == $e){
            $sum_he[] = '总和_和';
        }
        $list = array();
       
        $list  = array_merge($list,$sum_da,$sum_xiao,$sum_shuang,$sum_dan,$sum_long,$sum_hu,$sum_he);
        return $list;
    }
    
    /**
     * 派奖   中奖数据处理、没中奖数据处理
     * @return type
     */
    public function no_sum() {
    $openPrize = $this->judge();
    $winPrize = array();//中奖的
    $no_winPrize = array();//没中奖
    if(!empty($openPrize)){
//            $data['issue']  = $openPrize['expect'];
        $data['category_id']  = $openPrize['code'];
        $data['status']  = $openPrize['status'];
        $data['type']  = 1;
//      $data['time']  = array('LT',$openPrize['opentime']);
        $list = M('bet_record')->where($data)->select();
        foreach ($list as $k => $v) {
            if(in_array($v['content'], $openPrize['all_list'])){
                $winPrize[$k] = $v;
            }  else {
                $no_winPrize[$k] = $v;
            }
        }
//        print_r($no_winPrize);exit;
        if (!empty($winPrize)) {
            BonusSend($winPrize,1);
        }  
        if (!empty($no_winPrize)){
            foreach ($no_winPrize as $va) {
                $data['id'] = $va['id'];
                $data['status'] = 3;
                $data['profitLoss'] = 0 - $va['money'];
                M('bet_record')->save($data);
            }
        }

        
        
    }

}

    


    



    

    

    
    

    

    
    

    

    

    
    

    
    

    

    

    

    

    
    

   
    

    

    
    

    

    


    
    


    
    

    

    
    


    

    

    

    
    

    

    
    


    
    

    
    

    
}
        