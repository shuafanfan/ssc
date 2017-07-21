<?php 
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model {
    
    /**
     * 取公告列表
     */
    public function get_articleList($where){
        $Model = M('article');
        $articleList = $Model->where($where)->select();
        foreach ($articleList as $key=>$value){
            $articleList[$key]['admin'] = M('admin')->where(array('id'=>$articleList[$key]['adminID']))->getField('account');
            $articleList[$key]['addtime'] = date('Y-m-d H:i:s', $articleList[$key]['addtime']);
        }
        return $articleList;
    }
    
    /**
     * 取公告详情
     */
    public function get_article($articleID){
        $Model = M('article');
        $article = $Model->where(array('id'=>$articleID))->find();
        return $article;
    }
    
    /**
     * 编辑公告
     */
    public function article_edit($data){
        $Model = M('article');
        if ($Model->save($data)) {return true;} else {return false;}
    }
    
    /**
     * 删除公告
     */
    public function article_del($articleID){
        $Model = M('article');
        if ($Model->where(array('id'=>$articleID))->delete()) {return true;} else {return false;}
    }
    
    /**
     * 添加公告
     */
    public function article_add($data){
        $Model = M('article');
        $data['addtime'] = time();
        if ($Model->add($data)){return true;}else{return false;}
    }
    
    /**
     * 添加文章分类
     */
    public function cate_add($data){
        $Model = M('article_cate');
        if ($Model->add($data)){return true;} else{return false;}
    }
    
    /**
     * 取文章分类列表
     */
    public function get_articlecate_list(){
        $Model = M('article_cate');
        $articlecate_list = $Model->select();
        return $articlecate_list;
    }
    
    /**
     * 取文章分类详情
     */
    public function get_cate_detail($ID){
        $Model = M('article_cate');
        $detail = $Model->where(array('id'=>$ID))->find();
        return $detail;
    }
    
    /**
     * 编辑文章分类
     */
    public function cate_edit($data){
        $Model = M('article_cate');
        if ($Model->save($data)){return true;} else{return false;}
    }
    
    /**
     * 删除文章分类
     */
    public function cate_del($ID){
        $Model = M('article_cate');
        if ($Model->where(array('id'=>$ID))->delete()) {return true;} else {return false;}
    }
}

?>