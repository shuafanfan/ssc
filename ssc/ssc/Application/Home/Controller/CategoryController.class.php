<?php 
namespace Home\Controller;
use Think\Controller;
class CategoryController extends CommonController {
    
    /**
     * 彩种分类列表
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function categoryList(){
        $CategoryModel = D('Home/category');
        $pid = I('get.ID');
        $where = empty($pid) ? array('pid'=>0) : array('pid'=>$pid);
        $categoryList = $CategoryModel->get_p_categoryList($where);
        foreach ($categoryList as $k => $v) {
                if($v['status'] == 0){
                    $categoryList[$k]['status'] = '禁用';
                }  else {
                    $categoryList[$k]['status'] = '开启';
                }
        }
        $this->assign('category_list', $categoryList);
        $this->assign('pid', $pid);
        $this->display();
    }
    
    /**
     * 添加彩种分类
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function categoryAdd(){
        $CategoryModel = D('Home/category');
        $pid = I('get.pid');
        $Info = $CategoryModel->get_category($pid);
        $data = I('post.');
        if (!empty($data)){
            if($CategoryModel->category_add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加彩种分类'));
                $this->success('添加分类成功!', U('category/categoryList'));
            }else {
                $this->error('添加分类失败');
            }
        }
        $this->assign('info', $Info);
        $this->assign('pid', $pid);
        $this->display();
    }
    
    /**
     * 编辑彩种分类
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function categoryEdit(){
        $CategoryModel = D('Home/category');
        $ID = I('get.ID');
        $info = $CategoryModel->get_category($ID);
        $data = I('post.');
        if (!empty($data)){
            if (M('category')->where('id ='.$ID)->save($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'编辑彩种分类'));
                $this->success('编辑分类成功!', U('category/categoryList'));
            }else {
                $this->error('编辑分类失败');
            }
        }
        $this->assign('detail', $info);
        $this->display('categoryAdd');
    }
    
    /**
     * 彩种分类删除
     * Programmer : manty
     * Date: 02-07  21:28
     */
    public function categoryDel(){
        $CategoryModel = D('Home/category');
        $id = I('post.ID');
        $c_category = $CategoryModel->get_c_category($id);
        if (!empty($c_category)){
            $return = array('state' => 3);
        }else {
            if ($CategoryModel->categoryDel($id)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'彩种分类删除'));
                $return = array('state' => 1);
            }else{
                $return = array('state' => 2);
            }
        }
        
        exit(json_encode($return));
    }
    
    /**
     * 玩法列表
     */
    public function playList(){
		$CategoryModel = D('Home/category');
        $PlayWayModel = D('Home/PlayWay');
        $list = $PlayWayModel->relation('Type')->where('1=1')->select();
        
        $count=count( $list);
        for($i=0; $i<$count; $i++){
            $map['id']=$list[$i]['Type']['cate_id'];
            $arr=M("category")->where($map)->find();

            $list[$i]['catename']=$arr['catename'];
        }    

        $list = M('new_play')->select();
        $this->assign('list', $list);
		$where['pid'] = 0; 
		$categoryList = $CategoryModel->get_p_categoryList($where);

        $this->assign('category_list', $categoryList);
        $this->display();
    }

    public function playRace(){
        $CategoryModel = M('Category');
        $PlayWayModel = M('PlayWay');
        $cate_id=I('cate_id');
       // $data['cate_id'] = $cate_id;->cache(true)
        $playList   =   $PlayWayModel->where(['cate_id'=>$cate_id])->select();
        $name    =   $CategoryModel->cache(true)->where(['id'=>$cate_id])->find();
        foreach ($playList as $k=>$v){
            $playList[$k]['catename'] =  $name['catename'];
        }
        $info = findChild($playList);
        $this->ajaxReturn($info);
    }



    /**
     * 玩法列表
     */
    public function playAdd(){
        $data = I('post.');
        if (!empty($data)){
            if(M('new_play')->add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加玩法成功'));
                $this->success('添加玩法成功!', U('category/playList'));
            }else {
                $this->error('添加玩法失败');
            }
        }
        $info['pid'] = 0;
        $types = M('category')->where($info)->field('catename')->select();
        $this->assign('types', $types);
        $this->display();
    }


    /**
     * 玩法列表
     */
    public function playEdit(){
        $data = I('post.');
        if (!empty($data)){
            if (M('new_play')->save($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'编辑玩法成功'));
                $this->success('编辑玩法成功!', U('category/playList'));
            }else {
                $this->error('编辑玩法失败');
            }
        }
        $ID = I('get.ID');
        $info = M('new_play')->where(array('id'=>$ID))->find();
        $condition['pid'] = 0;
        $types = M('category')->where($condition)->field('catename')->select();
        $this->assign('types', $types);
        $this->assign('detail', $info);
        $this->display('playAdd');
    }

    /**
     * 玩法列表
     */
    public function playDel(){
        $id = I('post.ID');
        $CategoryModel = D('Home/category')->categoryDelete($id);
      /*  if (M('new_play')->delete($id)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'玩法删除'));
            $return = array('state' => 1);
        } else {
            $return = array('state' => 2);
        }*/
        exit(json_encode($CategoryModel));
    }
    
    /**
     * 玩法列表
     */
    public function playTypeList(){
        $playTypeModel = D('Home/PlayWayType');
        $list = $playTypeModel->relation('Category')->where('1=1')->select();
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 玩法列表
     */
    public function playTypeAdd(){
        $playTypeModel = D('Home/PlayWayType');
        $data = I('post.');
        
        if (!empty($data)){
            if($playTypeModel->add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加玩法类型成功'));
                $this->success('添加玩法类型成功!', U('category/playTypeList'));
            }else {
                $this->error('添加玩法类型失败');
            }
        }
        $CategoryModel = D('Home/category');
        $cates = $CategoryModel->get_p_categoryList(['pid'=>0]);
        $this->assign('cates', $cates);
        $this->display();
    }


    /**
     * 玩法列表
     */
    public function playTypeEdit(){
        $playTypeModel = D('Home/PlayWayType');
        $data = I('post.');
        if (!empty($data)){
            if ($playTypeModel->save($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'编辑玩法类型成功'));
                $this->success('编辑玩法类型成功!', U('category/playTypeList'));
            }else {
                $this->error('编辑玩法类型失败');
            }
        }
        $ID = I('get.ID');
        $info = $playTypeModel->where(array('id'=>$ID))->find();
        $CategoryModel = D('Home/category');
        $cates = $CategoryModel->get_p_categoryList(['pid'=>0]);
        $this->assign('cates', $cates);
        $this->assign('detail', $info);
        $this->display('playTypeAdd');
    }

    /**
     * 玩法列表
     */
    public function playTypeDel(){
        $playTypeModel = D('Home/PlayWayType');
        $id = I('post.ID');
        if ($playTypeModel->delete($id)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除玩法类型'));
            $return = array('state' => 1);
        } else {
            $return = array('state' => 2);
        }
        exit(json_encode($return));
    }

    /**
     * 玩法奖金配置列表
     */
    public function playConfig() {
        $time=date('Y-m-d,time()');
       /* dump($time);exit;*/
        $id = I('get.ID');
        $playModel = D('Home/PlayWay');
        $list = $playModel->relation('PlayWay')->where(['cate_id'=>$id])->order('id ASC')->select();
        $cateInfo =  M('Category')->where(array('id'=>$id))->find();
        $this->assign('cateInfo', $cateInfo);
        $this->assign('list', $list);
        $this->display();
    }

    public function changeStatus(){
        $playModel = D('Home/PlayWay');
        $data = I('post.');
        if($data['status']==1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        if($playModel->save($data)) {
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'更新玩法数据'));
            $return = array('state' => 1);
        } else {
            $return = array('state' => 2);
        }
        exit(json_encode($return));
    }

    public function changeInfo(){
        $playModel = D('Home/PlayWay');
        $data = I('post.');
        if($playModel->save($data)) {
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'更新玩法数据'));
            $return = array('state' => 1);
        } else {
            $return = array('state' => 2);
        }
        exit(json_encode($return));
    }

    /**
     * 玩法列表
     */
    public function timeConfig() {
        
        //dump($data['date']);exit;
        $id = I('get.ID');
        //$id = 11;
        $time = date('Y-m-d');
        $data['date'] = $time;
        $cateModel = D('Home/Category');
        $cate = $cateModel->where(array('id'=>$id))->find();
        $timeModel = D('Home/CateDateTime');
        //$count = $cateModel->where($data)->count();
        //$Page = getpage($count,20);
        //$show = $Page->show();
        $list = $timeModel->where('cate_id='.$id)->where($data)->select();
        $this->assign('cate', $cate);
        //$this->assign('page',$show);
        $this->assign('list', $list);
        $this->display();
    }

    public function addPeriod(){
        $timeModel = D('Home/CateDateTime');
        $cateID = I('post.cate_id');
        $data = ['cate_id'=>$cateID, 'period'=>0, 'open_time'=>'00:00:00'];
        if($timeModel->add($data)) {
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加开奖时间数据'));
            $record = $timeModel->order('id desc')->find();
            $return = array('state' => 1, 'record'=>$record);
        } else {
            $return = array('state' => 2);
        }
        exit(json_encode($return));
    }

    public function updatePeriod(){
        $timeModel = D('Home/CateDateTime');
        $data = I('post.');
        if($timeModel->save($data)) {
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'更新开奖时间数据'));
            $return = array('state' => 1);
        } else {
            $return = array('state' => 2);
        }
        exit(json_encode($return));
    }

    public function cateStatus(){
        $CategoryModel = D('Home/category');
        $id = I('post.ID');
        $c_category = $CategoryModel->cateStatus($id);
        if (!empty($c_category)){
            $return = array('state' => 1);
        }else {
            $return = array('state' => 0);
        }
        exit(json_encode($return));
    }


    public function delPeriod(){
        $timeModel = D('Home/CateDateTime');
        $id = I('post.ID');
        if ($timeModel->delete($id)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除开奖时间数据'));
            $return = array('state' => 1);
        } else {
            $return = array('state' => 2);
        }
        exit(json_encode($return));
    }
    /**
     * 开启彩种
     */
    public function openCategory() {
        $ID = I('post.ID');
        $data['status'] = 1;
        if (M('category')->where('id ='.$ID)->save($data)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'开启彩种'));
            $return = array('state' => true);
        }else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    /**
     * 关闭彩种
     */
    public function closeCategory() {
        $ID = I('post.ID');
        $data['status'] = 0;
        if (M('category')->where('id ='.$ID)->save($data)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'关闭彩种'));
            $return = array('state' => true);
        }else {
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    /**
     * 彩种信息
     */
    public function categoryInfo() {
        $data['pid']  = array('GT',0);
        //$time = date('Y-m-d,time ()');
        //dump($data);exit;
        $cateList = M('category')->where($data)->select();
        //dump($cateList);exit;
        foreach ($cateList as $k => $v) {
            if($v['status'] == 0){
                    $cateList[$k]['status'] = '关闭';
            }  else {
                    $cateList[$k]['status'] = '开启';
            }
            $condition['id'] = $v['pid'];
            $oneCate = M('category')->where($condition)->find();
            $cateList[$k]['oneCate'] = $oneCate;
        }
        $this->assign('oneCate', $cateList);
        $this->display();
    }
    
}