<?php 
namespace Home\Controller;
use Think\Controller;
class UploadController extends Controller
{

    /**
     * 上传文件
     * Programmer : manty
     * Date: 02-04  17:11
     */
    public function index()
    {
        $upload = new \Think\Upload();
        $upload->rootPath = './Uploads';
        $upload->savePath = '/activity/'; // 设置附件上传（子）目录

        $info = $upload->uploadOne($_FILES['logo']);
        if (!$info) {// 上传错误提示错误信息
            $this->JsonUpload(0,$upload->getError());
        } else {// 上传成功
            $path   =    '/Uploads/'.$info['savepath'].$info['savename'];
            $this->JsonUpload(1,'上传成功！',['url'=>$path]);
        }
    }

    function JsonUpload($code, $msg, $data = '')
    {
        $data = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
        ];
       echo json_encode($data,true);
       exit();
    }
}