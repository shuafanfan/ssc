<?php 
namespace Home\Controller;
use Think\Controller;
class OpenDataController extends CommonController {
    
    /**
     * 开奖接口列表
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function apiList(){
        $cate_id =  $_GET['cate_id'];
        $categoryModel = M('category')->order('pid ASC')->where('pid !=0 AND status=1')->select();
        $date   =  $_GET['date'];

        if (!empty($date)){
            $this->assign('date', $date);
            $date_ymd   =   $date;
        }else{
            $date_ymd   =   date('Y-m-d', strtotime("0 days"));
        }
        $tart    =    strtotime($date_ymd);
        $date_where['timeStamp'] =  array('between',array($tart,$tart+86399));
        $cate_id    =   empty($_GET['cate_id'])?3:$_GET['cate_id'];
        $where['code'] = $cate_id;
        $date_time  =   M("cate_date_time");
        $date_where['cate_id'] =  $cate_id;
        $date_count =   $date_time->where($date_where)->count();
        $Page = getpage($date_count,20);
        $show = $Page->show();
        $list    =   $date_time->order('timeStamp DESC')->where($date_where)->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $k=>$v){
            $whereOpenData['code']  =   $cate_id;
            $whereOpenData['expect']    =   $v['period'];
            $OpenDataArr    =   M('open_prize_data')->where($whereOpenData)->find();
            if (empty($OpenDataArr)) {
                $list[$k]["opendata"]="- -";
                $list[$k]["openstatus"]="未开奖";
            } else {
                $list[$k]["opendata"]=$OpenDataArr['opencode'];
                $list[$k]["openstatus"]="已开奖";
            }
            /* 查询订单数*/
            $whereOrder["category_id"]=42;
            $whereOrder['issue']=$v['period'];
            $orderumb=M("bet_record")->where($whereOrder)->Count();
            if (!$orderumb) {
                $list[$k]["orderumb"]="- -";
            } else {
                $list[$k]["orderumb"]=$orderumb;
            }

            /*总派奖量*/
            $orderWinSum=M("bet_record")->where($whereOrder)->sum("winning_money");
            if (!$orderWinSum) {
                $list[$k]["orderWinSum"]="- -";
            } else {
                $list[$k]["orderWinSum"]=$orderWinSum;
            }

            /*盈亏*/
            $orderProSum=M("bet_record")->where($whereOrder)->sum("profitLoss");
            if (!$orderProSum) {
                $list[$k]["orderProSum"]="- -";
            } else {
                $list[$k]["orderProSum"]=$orderProSum;
            }

            /*注数*/
            $orderSum=M("bet_record")->where($whereOrder)->sum("nums");
            if (!$orderSum) {
                $list[$k]["orderSum"]="- -";
            } else {
                $list[$k]["orderSum"]=$orderSum;
            }

            /*投注额*/
            $orderMoneySum=M("bet_record")->where($whereOrder)->sum("money");
            if (!$orderMoneySum) {
                $list[$k]["orderMoneySum"]="- -";
            } else {
                $list[$k]["orderMoneySum"]=$orderMoneySum;
            }
            /*参与人数*/
            $orderNumber=count(M("bet_record")->where($whereOrder)->group('userId')->select());
            if (!$orderNumber) {
                $list[$k]["orderNumber"]="- -";
            }else{
                $list[$k]["orderNumber"]=$orderNumber;
            }
        }
        $this->assign('category_list', $categoryModel);
        $this->assign('page', $show);
        $this->assign('list', $list);
        if (empty($cate_id)){
            $this->assign('cate_id', $cate_id);
            $this->assign('cate_name',$categoryModel[0]['catename']);
        }else{
            $category   =   M('category')->where(['id'=>$cate_id])->find();
            $this->assign('cate_id', $cate_id);
            $this->assign('cate_name',$category['catename']);
        }

        $this->display();
    }

    /**
     * 投注
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function bet(){
        $cate_id =  $_GET['cate_id'];
        $categoryModel = M('category')->order('pid ASC')->where('pid !=0 AND status=1')->select();
        // $this->assign('cate_id', empty($cate_id)?$categoryModel[0]['id']:$cate_id);
        $date   =  $_GET['date'];
        if (!empty($date)){
            $this->assign('date', $date);
            $date_ymd   =   $date;//date('Y-m-d', strtotime("0 days"));
        }else{
            $date_ymd   =   date('Y-m-d', strtotime("0 days"));
        }
        $cate_id    =   empty($_GET['cate_id'])?3:$_GET['cate_id'];
        $tart    =    strtotime($date_ymd);
        $where['category_id'] = $cate_id;
        $where['time'] = array('between',array($tart,$tart+86399));
        $count      = M('bet_record')->where($where)->count();
        $Page = getpage($count,20);
        $show = $Page->show();
        $open_prize_data    =   M('bet_record')->order('issue DESC')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('category_list', $categoryModel);
        $this->assign('open_prize_data', $open_prize_data);
        $this->assign('page', $show);
        if (empty($cate_id)){
            $this->assign('cate_id', $cate_id);
            $this->assign('cate_name',$categoryModel[0]['catename']);
        }else{
            $category   =   M('category')->where(['id'=>$cate_id])->find();
            $this->assign('cate_id', $cate_id);
            $this->assign('cate_name',$category['catename']);
        }

        $this->display();
    }

    public function openAdd(){
        if (IS_POST){
            $m  =   M("open_prize_data");
            $cate_id = $_POST['cate_id'];
            if (empty($cate_id)){
                $this->error('菜种类型错误！');
            }
            if (empty($_POST['opencode']) || empty($_POST['expect'])){
                $this->error('数据不能为空！');
            }

            $map['expect']  = $_POST['expect'];
            $map['code']    =   $cate_id;
            $arr    =   $m->where($map)->find();
            $category   =   M('category')->where(['id'=>$cate_id])->find();
            if (empty($category)){
                $this->error('未设置开奖链接！');
            }
            if (empty($category['winningUrl'])){
                $this->error('未设置开奖链接！');
            }

            if ($arr) {//如果存在当前期号，则变成修改开奖数据
                $datas['opencode']  =   $_POST['opencode'];
                $info   =  $m->where($map)->save($datas);
                if ($info) {
                    HttpCurl($category['winningUrl']);
                    R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'开奖号码修改成功'));
                    $this->success('开奖号码修改成功!');
                } else {
                    $this->error('开奖号码修改失败!');
                }
            }else{
                $data=$_POST;
                $data['code']   =   $cate_id;

                $data['opentime']   =  date("Y-m-d h:i:s");
                $data['opentimestamp']=strtotime($data['opentime']);
                $info   =   $m->add($data);
                if ($info) {
                    HttpCurl($category['winningUrl']);
                    R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'开奖号码添加成功'));
                    $this->success('开奖号码添加成功!');
                } else {
                    $this->error('开奖号码添加失败!');
                }
            }
        }
    }

    public function openData(){
            $cate_id    =   $_POST['cate_id'];
            $page   =   $_POST['p'];
            $count      = M('open_prize_data')->where(['code'=>$cate_id])->count();
            $Page = getpage($count,20);
            var_dump($Page->firstRow);
            var_dump($Page->listRows);
            M('open_prize_data')->where(['code'=>$cate_id])->limit($Page->firstRow.','.$Page->listRows)->select();

    }

    /**
     * 开奖接口编辑
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function apiAdd(){
        $OpenapiModel = D('openapi');
        $categoryModel = D('category');
        $cateID = I('get.cateID');
        $category = $categoryModel->get_category($cateID);
        $openapi = $OpenapiModel->get_openapi($cateID);
        $data = I('post.');
        if (!empty($data)){
            $data['id'] = $OpenapiModel->get_openapi_id($cateID);
            if ($OpenapiModel->apiurlEdit($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'开奖接口编辑'));
                $this->success('编辑成功!');
            }else {
                $this->error('编辑失败!');
            }
        }
        $this->assign('url', $openapi);
        $this->assign('category', $category);
        $this->display();
    }
    
    /**
     * 禁用开奖接口
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function openapiProhibit(){
        $OpenapiModel = D('openapi');
        $ID = I('post.ID');
        if ($OpenapiModel->openapiProhibit($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'禁用开奖接口'));
            $return = array('state' => true);
        }else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 启用开奖接口
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function openapiStart(){
        $OpenapiModel = D('openapi');
        $ID = I('post.ID');
        if ($OpenapiModel->openapiStart($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'启用开奖接口'));
            $return = array('state' => true);
        }else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
}
?>