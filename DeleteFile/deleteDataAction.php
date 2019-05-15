<?php
//1.连接数据库
        require "../DBConfig.php";
        require "deleteFile.php";
        $value = $_GET['value'];
        if(empty($_GET['value']))
        {
            echo "<script>alert('操作无效！');location.href='DeleteFileData.php?page=1';</script>";
        }

        $sql = "DELETE  FROM modelstable WHERE Dir='$value'";
        mysqli_query($link,"set names 'utf8'"); //数据库输出编码
        $rw = mysqli_query($link, $sql);
        $path="E://upload";
        $parentDir = explode('/',$value);
        $desPath = $path.'/'.$parentDir[0].'/'.$parentDir[1];
        $isDeleteFile = delFile($desPath,true);
       //删除当前文件夹：
        if($isDeleteFile) {
         if($rw>0){
              echo "<script>alert('删除成功！');location.href='DeleteFileData.php?page=1';</script>";
          }
       }
       else
           {
            echo "<script>alert('删除失败！请重试');location.href='DeleteFileData.php?page=1';</script>";
         }
?>
