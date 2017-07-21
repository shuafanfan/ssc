<?php 
namespace Home\Controller;
use Think\Controller;
class OpenapiController extends CommonController {
    
    /**
     * 开奖接口列表
     * Programmer : manty
     * Date: 02-20  20:10
     */
    public function apiList(){
        $OpenapiModel = D('openapi');
        $categoryModel = D('category');
        $openapiList = $OpenapiModel->get_openapiList();
        foreach ($openapiList as $key=>$value){
            $openapiList[$key]['category'] = $categoryModel->get_category($openapiList[$key]['category_id']);
            if ($openapiList[$key]['status'] == 0){
                $openapiList[$key]['status'] = '启用';
            }else {
                $openapiList[$key]['status'] = '禁用';
            }
        }
        $this->assign('openapi_list', $openapiList);
        $this->display();
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