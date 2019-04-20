<?php
require 'zip.php';
header("Content-type:text/html;charset=utf-8");
//$periodsDate=$_POST['periodsDate'];

if (isset($_POST['submit'])) {
    $tmpname = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
//获取当前目录的绝对路径
    $var = explode(".",$filename);
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
            $servername = "localhost";
            $username = "root";
            $password = "123456";
            $mysql = "ModelsDataBase";

// 创建连接
            $conn = new mysqli($servername, $username, $password,$mysql);
// 检测连接
            if ($conn->connect_error) {
                echo "<script>alert('数据库访问出错：'.$conn->connect_error())</script>";
            }
            else{
                $dir = $parentDir.'/'.$var[0];
                $sql="select * from ModelsTable where Dir='$dir'";
                mysqli_query($conn,"set names 'utf8'"); //数据库输出编码
                $result=mysqli_query($conn,$sql);
                if (!$result) {
                    echo "<script>alert('数据库错误！请检查数据库配置！)');location.href='InputFileData.html';</script>";
                }
                if (mysqli_num_rows($result))
                {
                    echo "<script>alert('所上传数据已存在！请确认！');location.href='InputFileData.html';</script>";
                }
                else
                {
                    $sql = "insert into ModelsTable (Dir,FileName) values ('$dir','$var[0]')";
                    mysqli_query($conn,"set names 'utf8'"); //数据库输出编码
                    if($conn->multi_query($sql) ===true)
                    {
                        echo "<script>alert('上传成功！');location.href='InputFileData.html';</script>";
                    }
                    else
                    {
                        echo "<script>alert('上传至数据库失败，请检查！');location.href='InputFileData.html';</script>";
                    }
                    //关闭连接
                    $conn->close();
                }

            }
        } else {
            echo "<script>alert('上传失败！请确认上传信息无误！');location.href='InputFileData.html';</script>";
        }
    }
    else
    {
        echo "<script>alert('上传失败，请上传一个有效文件！');location.href='InputFileData.html';</script>";
    }
}
else{
    echo "<script>alert('上传失败，请重试！');location.href='InputFileData.html';</script>";
}
?>
