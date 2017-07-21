<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
</style>
    <link rel="stylesheet" href="/Public/css/sweetalert.css">
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/js/alert.js"></script>
</head>
<body>
<script type="text/javascript">
$(function(){

    alertApp({
        'title':"<?php echo ($message); ?>",
        'type':"<?php echo ($type); ?>",
        'times':"2",
        'href':"<?php echo ($jumpUrl); ?>",
        'confirm':false,
    });
});
</script>
</body>
</html>