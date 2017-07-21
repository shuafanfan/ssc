<?php 
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
    /**
     * 会员列表
     * Programmer : manty
     * Date: 01-07  20:10
     */
    public function userList() {
            if ($_GET['pid']) {
                $where['distributor_id']=$_GET['pid'];
            }

            if($_POST){
                $keyword = trim($_POST['keyword']);
                if(is_numeric($keyword)){
                    $where['mobile'] = array('like',"%$keyword%");
                }else{
                    $where['username'] = array('like',"%$keyword%");
                }
            }
            $p  = $_GET['p'];
            $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
            $UserModel = D('Home/User');
            $type = I('get.type');
            $test_type = I('get.test_type');
            $vip_type = I('get.vip_type');
            if (!empty($type)){
                $where['type'] = 1;
                $this->assign('type', $type);
            }
            if (!empty($test_type)){
                $where['test_type'] = array('gt',0);//$test_type;
                $this->assign('test_type', $test_type);
            }
            if (!empty($vip_type)){
                $where['vip_type'] = $vip_type;
                $this->assign('vip_type', $vip_type);
            }
            $count      = $UserModel->where($where)->count();
            $Page = getpage($count,20);
            $show = $Page->show();
            $userList = $UserModel->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
            $userTypeModel  =   M('user_type')->where(['status'=>1])->select();
            $this->assign('threeMenuInfo', $threeMenu);

            $this->assign('vip_user_type', $userTypeModel);
            $this->assign('page', $show);
            $this->assign('p', $p);
            $this->assign('user_list', $userList);
            $this->display();

    }
      


    /**
     * 会员拨款
     * Programmer : manty
     * Date: 01-07  20:10
     */
    public function user_appropriation(){
        $UserModel = D('Home/User');
        $userID = I('get.userID');
        $userInfo = $UserModel->get_user($userID);
        $data = I('post.');
        if (!empty($data)){
            $data['money'] = $data['money'] + $userInfo['money'];
            if ($UserModel->userEdit($data,$data['id'])){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'拨款成功'));
                $this->success('拨款成功!', U('Home/user/userList'));
            }else {
                $this->error('拨款失败!');
            }
        }
        
        $this->assign('detail', $userInfo);
        $this->display();
    }
    
    /**
     * 添加试玩会员
     * Programmer : manty
     * Date: 01-07  20:10
     */
    public function userAdd(){
        $UserModel = D('Home/User');
        $type = I('get.type');
        $data = I('post.');
        if (!empty($data)){
            $result = $UserModel->is_user_exist($data['username']);
            if (empty($result)){
                if ($UserModel->tryuserAdd($data)){
                    if (!empty($data['type'])){
                        R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加试玩会员成功'));
                        $this->success('添加试玩会员成功!', U('Home/user/userList/type/2'));
                    }else{
                        R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加会员成功'));
                        $this->success('添加会员成功!', U('Home/user/userList'));
                    }
                    
                }
            }else{
                $this->error('用户名已存在!');
            }
        }
        $this->assign('type', $type);
        $this->display();
    }
    
    
    /**
     * 会员编辑
     * Programmer : manty
     * Date: 01-06  14:30
     */
    public function userEdit(){
        $UserModel = D('Home/User');
        $userID = I('get.userID');
        $detail = $UserModel->get_user($userID);
        $vip = M('user_type')->select();
        $data = I('post.');
        if (!empty($data)){
            if ($UserModel->userEdit($data,$userID)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'修改会员成功'));
                $this->success('修改会员成功！');
            }else {
                $this->error('修改会员失败！');
            }
        }
        $this->assign('vip', $vip);
        $this->assign('detail', $detail);
        $this->display('userAdd');
    }
    
    /**
     * 会员禁用
     * Programmer : manty
     * Date: 01-07  21:03
     */
    public function userProhibit(){
        $UserModel = D('Home/User');
        $userID = I('post.userID');
        if ($UserModel->userProhibit($userID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'会员禁用'));
            $return = array('state' => true);
        }else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 会员删除
     * Programmer : manty
     * Date: 01-06  14:30
     */
    public function userDel(){
        $UserModel = D('Home/User');
        $userID = I('post.userID');
        if ($UserModel->userDel($userID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'会员删除'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * Vip会员列表
     * Programmer : manty
     * Date: 01-06  14:30
     */
    public function vipuserList(){
        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $user_typeModel   =   M('user_type');
        $count      = $user_typeModel->count();
        $Page = getpage($count,20);
        $show = $Page->show();
        $user_type     = $user_typeModel->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('threeMenuInfo', $threeMenu);
        $this->assign('vip_list', $user_type);
        $this->assign('page', $show);
        $this->display();
    }
    
    /**
     * 添加Vip会员
     * Programmer : manty
     * Date: 01-06  14:30
     */
    public function vipuser_add(){
        $UserModel =  M('user_type');
        $data = I('post.');
        if (!empty($data)){
            if (empty($data['id'])){
                if ($UserModel->add($data)){
                    R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加VIP等级'));
                    $this->success('添加VIP等级!', U('Home/user/vipuserList'));
                }else {
                    $this->error('添加Vip会员失败!');
                }
            }else{
                if ($UserModel->where(['id'=>$data['id']])->save($data)){
                    R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加VIP等级'));
                    $this->success('修改VIP等级!', U('Home/user/vipuserList'));
                }else {
                    $this->error('修改VIP等级!');
                }
            }
        }
        $id = $_GET['id'];
        if (!empty($id)){
            $detail    =   $UserModel->where(['id'=>$id])->find();
            $this->assign('detail',$detail);
        }
        $this->display();
    }

    public function userTypeDel(){
        if (IS_POST){
            $userTypeModel  =   M('user_type');
            $id =    $_POST['id'];

            if (empty($id)){
                $data['state'] = 0;
            }
            $delete =   $userTypeModel->where(['id'=>$id])->delete();
            if ($delete){
                    $data['state'] = 1;
            }else{
                $data['state'] = 0;
            }
            echo json_encode($data,true);
            exit();
        }else{

        }
    }


    /**
     * 删除Vip会员
     * Programmer : manty
     * Date: 01-06  14:30
     */
    public function vipuser_del(){
        $UserModel = D('Home/User');
        $ID = I('post.ID');
        if ($UserModel->vipuser_del($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除Vip会员'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
        public function exportExcel($expTitle,$expCellName,$expTableData){
        if(!$this->checkLogin()){
                exit;
        }
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
            
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
	/**
     *
     * 导出Excel
     */
    function expUser(){
        $xlsName  = "会员信息";
        $xlsCell  = array();
        $xlsModel = M('User');
        $xlsData  = $xlsModel->select();
        $field  = array();
        foreach ($xlsData as $v)
        {
            $field = array_keys($v);
        }
        for ($x=0; $x<count($field); $x++) {
           $xlsCell[$x]= array($field[$x],$field[$x]);
        } 

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
            
    }
	/**
     *
     * 显示导入页面 ...
     */

    /**实现导入excel
     **/
    function impUser(){
        if (!empty($_FILES)) {
            $upload = new \Think\Upload();// 实例化上传类
            $filepath='./Public/Excel/'; 
            $upload->exts = array('xlsx','xls');// 设置附件上传类型
            $upload->rootPath  =  $filepath; // 设置附件上传根目录
            $upload->saveName  =     'time';
            $upload->autoSub   =     false;
            if (!$info=$upload->upload()) {
                $this->error($upload->getError());
            }
//            print_r($info);exit;
            foreach ($info as $key => $value) {
                unset($info);
                $info[0]=$value;
                $info[0]['savepath']=$filepath;
            }
            vendor("PHPExcel.PHPExcel");
            $file_name=$info[0]['savepath'].$info[0]['savename'];
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_name,$encode='utf-8');
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow(); // 取得总行数
            $highestColumn = $sheet->getHighestColumn(); // 取得总列数
            $j=0;
            for($i=3;$i<=$highestRow;$i++)
            {
                $data['id']= $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
                $data['type']= $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
                $data['distributor_id']= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
                $data['username']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
                $data['nickname']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
                $data['password']= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
                $data['mobile']= $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
                $data['sex']= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
                $data['city']= $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
                $data['weblogo']= $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
                $data['registertime']= $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
                $data['logintime']= $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();
                $data['money']= $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();
                $data['status']= $objPHPExcel->getActiveSheet()->getCell("N".$i)->getValue();
//                print_r($data);exit;
                if(M('User')->where("id='".$data['id']."'")->find()){
                    //如果存在相同联系人。判断条件：电话 两项一致，上面注释的代码是用姓名/电话判断
                    M('User')->save($data);
                }else{
                    M('User')->add($data);
                    $j++;
                }
            }
            unlink($file_name);
//            User_log('批量导入联系人，数量：'.$j);
            $this->success('导入成功！本次导入联系人数量：'.$j);
        }else
        {
            $this->error("请选择上传的文件");
        }
    }
    public function DownloadFile($fileName) {
        ob_end_clean();
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($fileName));
        header('Content-Disposition: attachment; filename=' . basename($fileName));
        readfile($fileName);
    }
    public function down() {
        $DataDir = "Public/Excel/";
        if ($_GET['Action'] == 'download'){
            $this->DownloadFile($DataDir .'1488507809.xls');
                exit();
        }
    }
    /**
     * 数据查看
     */
    public function watchData() {
        $M=M('bet_record');
        $map['userId']  = $_GET['userID'];
        $count = $M->where($map)->count();
        $Page = getpage($count,20);
        $show = $Page->show();
        $list=$M
        ->where($map)
        ->join('g_user ON  g_bet_record.userId= g_user.id')
        ->join('g_category ON g_bet_record.category_id = g_category.id')
        ->join('g_play_way ON g_bet_record.play_way_id = g_play_way.id')
        ->field('g_bet_record.* , g_user.username, g_category.catename,g_play_way.playname')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
        $user_money_log  =   M('user_money_log')->where(['userId'=>$_GET['userID']])->select();
        $userLogin  =   M('user_login_log')->where(['userId'=>$_GET['userID']])->select();
        $this->assign('list',$list);
        $this->assign('user_login',$userLogin);
        $this->assign('user_money_log',$user_money_log);
        $this->assign('page', $Page->show());
        $this->assign('tab', empty($_GET['tab'])?'tab1':$_GET['tab']);
        $this->display();
        
    }
    /**
     * 投注详情
     */
    public function betOrder() {
        $list=M('bet_record')
        ->where('g_bet_record.id ='.$_GET["id"])
        ->join('g_user ON  g_bet_record.userId= g_user.id')
        ->join('g_category ON g_bet_record.category_id = g_category.id')
        ->join('g_play_way ON g_bet_record.play_way_id = g_play_way.id')
        ->find();
        //dump($list);
        $this->assign($list);
        
        $this->display();
    }
    /**
     * 银行卡
     */
    public function bankCard() {
        $map['uId']=$_GET['userID'];
        $M=M('user_bank');
        $banklist=$M->where($map)->select();
        if (!empty($banklist)) {
           $banklist["arr"]=0;
        } 
        
        $this->assign('banklist',$banklist);
        $this->display(); 
    }
    /*删除银行卡*/
    public function delbank() {
        $map['id']=$_GET['id'];
        $M=M('user_bank');
        $del=$M->where($map)->delete();
            if ($del){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除会员银行卡成功'));
                $this->success('删除成功！');
            }else {
                $this->error('删除失败！');
            }
    }
   /* 修改状态*/
    public function lockbank() {
        $map=$_GET;
        $M=M('user_bank');
        $seve=$M->save($map);
        dump($seve);
            if ($seve){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'会员银行卡修改成功'));
                $this->success('修改成功！');
            }else {
                $this->error('修改失败！');
            }
    }
    /*信息修改*/
    public function editbank() {
        $map=$_GET;
        $M=M('user_bank');
        $arr=$M->where($map)->find();
        /*dump($arr);exit;*/
        if (IS_POST) {
            $data=$_POST;
           /* $data['id']=$map['id'];*/
           /* dump( $data);exit;*/
            $seve=$M->save($data);
            if ($seve){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'会员银行卡修改成功'));
                $this->success('修改成功！');
            }else {
                $this->error('修改失败！');
            }
        }else{

            $this->assign('arr',$arr);
            $this->display();
        }
        
    }
}