<?php
namespace Home\Controller;
use Think\Controller;
class BakController extends CommonController {

    public function index() {
        $threeMenu = R('Index/threeMenu',array('twoMenu'=>$_GET['twoMenu']));
        $DataDir = "databak/";
        mkdir($DataDir);
        if (!empty($_GET['Action'])) {
            import("Common.Org.MySQLReback");
            $config = array(
                'host' => C('DB_HOST'),
                'port' => C('DB_PORT'),
                'userName' => C('DB_USER'),
                'userPassword' => C('DB_PWD'),
                'dbprefix' => C('DB_PREFIX'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0
            );
            $mr = new MySQLReback($config);
            $mr->setDBName(C('DB_NAME'));
            if ($_GET['Action'] == 'backup') {
                $resualt = $mr->backup();
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'数据库备份成功'));
                $this->success( '数据库备份成功！');
                echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
            } elseif ($_GET['Action'] == 'RL') {
                $mr->recover($_GET['File']);
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'数据库还原成功'));
                $this->success( '数据库还原成功！');
                echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
            } elseif ($_GET['Action'] == 'Del') {
                if (@unlink($DataDir . $_GET['File'])) {
                     M('backup_record')->where('id ='.$_GET['row'])->delete(); 
                     R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'备份删除成功'));
                     $this->success('删除成功！');
                    echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
                } else {
                    $this->error('删除失败！');
                }
            }
            if ($_GET['Action'] == 'download') {
                R('log/addLog',array('twoMenu'=>$_GET['twoMenu'],'content'=>'下载备份'));
                function DownloadFile($fileName) {
                    ob_end_clean();
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                    header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . $_GET['file']);
                exit();
            }
        }
        //备份记录
        $saveLog['adminName'] = cookie('name');
        $saveLog['saveRoute'] = $resualt;
        $saveLog['saveTime'] = time();
        if(!empty($resualt)){
            M('backup_record')->add($saveLog);
        }
        $lists = $this->MyScandir('databak/');
        $logList = M('backup_record')->select();
        $this->assign("list", $logList);
        $this->assign('threeMenuInfo', $threeMenu);
        $this->display('Config/dbBackup');
    }

    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

}

?>