<?php 
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    
    /**
     * 公告列表
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleList() {
//        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $ArticleModel = D('Home/article');
        $type = I('get.type');
        $where = empty($type) ? array('type'=>0) : array('type'=>1);
        $articleList = $ArticleModel->get_articleList($where);
//        $this->assign('threeMenuInfo', $threeMenu);
        $this->assign('type', $type);
        $this->assign('article_list', $articleList);
        $this->display();

    }
    
    /**
     * 公告编辑
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleEdit() {
        $ArticleModel = D('Home/article');
        $articleID = I('get.articleID');
        $article = $ArticleModel->get_article($articleID);
        $cate_info = $ArticleModel->get_cate_detail($article['cate_id']);
        $cate_list = $ArticleModel->get_articlecate_list();
        $data = I('post.','','strip_tags');
        if (!empty($data)){
            if ($ArticleModel->article_edit($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'公告编辑'));
                $this->success('修改公告成功!', U('article/articleList'));
            }else{
                $this->error("修改公告失败!");
            }
        }

        $this->assign('cate_list', $cate_list);
        $this->assign('cate_info', $cate_info);
        $this->assign('detail', $article);
        $this->display('articleAdd');
    }
    
    /**
     * 公告添加
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleAdd() {
        $adminModel = D('Home/admin');
        $ArticleModel = D('Home/article');
        $account = $_COOKIE['name'];
        $type = I('get.type');
        $data = I('post.','','strip_tags');
//        print_r($data);exit;
        $cate_list = $ArticleModel->get_articlecate_list();
        if (!empty($data)){
            $data['type'] = $type;
            $data['adminID'] = $adminModel->get_adminID($account);

            if ($ArticleModel->article_add($data)){
                if (!empty($type)){
                    R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加文章成功'));
                    $this->success('添加文章成功!', U('Home/article/articleList/type/1'));
                }else{
                    R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加公告成功'));
                    $this->success('添加公告成功!', U('article/articleList'));
                }
            }else{
                if (!empty($type)){
                    $this->error("添文章失败!");
                }else{
                    $this->error("添加公告失败!");
                }
            }
        }
        $this->assign('type', $type);
        $this->assign('cate_list', $cate_list);
        $this->display();
    }
    
    /**
     * 文章分类列表
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleCate_list(){
        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $ArticleModel = D('Home/Article');
        $cateList = $ArticleModel->get_articlecate_list();
        $this->assign('cate_list', $cateList);
        $this->assign('threeMenuInfo', $threeMenu);
        $this->display();
    }
    
    /**
     * 添加文章分类
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleCate_add(){
        $ArticleModel = D('Home/Article');
        $data = I('post.');
        if (!empty($data)){
            if ($ArticleModel->cate_add($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'添加文章分类'));
                $this->success('添加文章分类成功!', U('Home/article/articleCate_list'));
            }else {
                $this->error('添加文章分类失败!');
            }
        }
        $this->display();
    }
    
    /**
     * 编辑文章分类
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleCate_edit(){
        $ArticleModel = D('Home/Article');
        $ID = I('get.ID');
        $cate_info = $ArticleModel->get_cate_detail($ID);
        $data = I('post.');
        if (!empty($data)){
            if ($ArticleModel->cate_edit($data)){
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'编辑文章分类成功'));
                $this->success('编辑文章分类成功!', U('Home/article/articleCate_list'));
            }else{
                $this->error('编辑文章分类失败!');
            }
        }
        $this->assign('detail', $cate_info);
        $this->display('articleCate_add');
    }
    
    /**
     * 删除文章分类
     * Programmer : manty
     * Date: 01-03  23:26
     */
    public function articleCate_del(){
        $ArticleModel = D('Home/article');
        $ID = I('post.ID');
        if ($ArticleModel->cate_del($ID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除文章分类'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
    
    /**
     * 删除公告
     * Programmer : manty
     * Date: 01-04  21:49
     */
    public function articleDel(){
        $ArticleModel = D('Home/article');
        $articleID = I('post.articleID');
        if ($ArticleModel->article_del($articleID)){
            R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'删除公告'));
            $return = array('state' => true);
        }else{
            $return = array('state' => false);
        }
        exit(json_encode($return));
    }
}