<?php
//1.连接数据库
require "DBConfig.php";

        $value = $_GET['value'];
        if(empty($_GET['value']))
        {
            echo "<script>alert('操作无效！');location.href='DeleteFileData.php';</script>";
        }

        $sql = "DELETE  FROM modelstable WHERE id='$value'";
        $rw = mysqli_query($link, $sql);
        
        if($rw>0){
            echo "<script>alert('删除成功！');location.href='DeleteFileData.php';</script>";
        }else{
            echo "<script>alert('删除失败！请重试');location.href='DeleteFileData.php';</script>";
        }
?>
