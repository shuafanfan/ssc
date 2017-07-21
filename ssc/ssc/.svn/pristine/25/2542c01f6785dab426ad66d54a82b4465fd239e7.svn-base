<?php 
namespace Home\Model;
use Think\Model\RelationModel;
class CategoryModel extends RelationModel {
    protected $_link = array(
        'PlayWayTypes'=>array(
            'mapping_type'      => self::HAS_MANY,
            'class_name'        => 'PlayWayType',
            'foreign_key'       => 'cate_id',
        ),
    );

    /**
     * 取分类
     */
    public function get_p_categoryList($where) {
        $Model = M('category');
        $p_categoryList = $Model->where($where)->select();
        return $p_categoryList;
    }
    
    /**
     * 分类详情
     */
    public function get_category($pid){
        $Model = M('category');
        $Info = $Model->where(array('id'=>$pid))->find();
        return $Info;
    }
    
    /**
     * 添加分类
     */
    public function category_add($data){
        $Model = M('category');
        $category_id = $Model->add($data);
        if (!empty($data['pid'])){
            $content = array(
                'category_id' => $category_id,
            );
            if (M('openapi')->add($content)){
                return true;
            }else {
                return false;
            }
        }else{
            return true;
        }
    }
    
    /**
     * 编辑分类
     */
    public function categoryEdit($data) {
        $Model = M('category');
        if ($Model->save($data)){return true;} else {return false;}
    }
    
    /**
     * 取二级分类
     */
    public function get_c_category($id){
        $Model = M('category');
        $c_categoty = $Model->where(array('pid'=>$id))->select();
        return $c_categoty;
    }
   
    /**
     * 删除分类
     */
    public function categoryDel($id) {
        $Model = M('category');
        if ($Model->delete($id)){return true;} else {return false;}
    }

    public function cateStatus($id){
        $Model = M('PlayWay');
        $c_categoty = $Model->where(array('id'=>$id))->find();

        if ($c_categoty['status'] == 1){
          return   $Model->where(array('id'=>$id))->save(['status'=>0]);
        }else{
            return   $Model->where(array('id'=>$id))->save(['status'=>1]);
        }
    }

    function categoryDelete($id){
        $Model = M('PlayWay');
        $c_categoty = $Model->where(array('pid'=>$id))->select();
        if ($c_categoty){
            $data = [
                'status'=>2,
                'msg'=>'存在下级无法删除',
            ];
        }else{
           $rerurnid =  $Model->delete($id);
           if ($rerurnid){
               $data = [
                   'status'=>1,
                   'msg'=>'删除成功',
               ];
           }else{
               $data = [
                   'status'=>0,
                   'msg'=>'删除失败',
               ];
           }
        }
        return $data;
    }



}
?>