<?php
require 'zip.php';
header("Content-type:text/html;charset=utf-8");
//$periodsDate=$_POST['periodsDate'];

if (isset($_POST['submit'])) {
    $tmpname = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
//获取当前目录的绝对路径

    $parentDir = $_POST['belong'];
    $dir="E://upload";
    $path=$dir."/".$parentDir.'/';
    if (!file_exists($path)){
        mkdir ($path,0777,true);
    }
    $filepath = $path . '/' . $filename;
    if (isset($filename)) {
        if (move_uploaded_file($tmpname, $filepath)) {
            $z = new Unzip();
            $z->unzip($filepath, $path, true, false);
            @unlink($filepath);
            $result['status'] = 1;
            $result['message'] = "文件上传成功";
        } else {
            $result['status'] = 0;
            $result['message'] = "文件上传失败";
        }
    }
    else
    {
        echo "请上传一个有效的文件";
    }
}
else{
    echo "出现错误,刷新重试";
}
?>
