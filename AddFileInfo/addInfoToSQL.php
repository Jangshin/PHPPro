<?php
require '../DBConfig.php';
header("Content-type:text/html;charset=utf-8");
$FileName = $_GET["value"];

//这个是要得到操作模型的文件名

$InfoTxt = $_POST["txtInfo"];
//这个是得到所属模型的备注信息
$sql="select * from ModelsTable where FileName='$FileName'";
mysqli_query($link,"set names 'utf8'"); //数据库输出编码
$result=mysqli_query($link,$sql);
if (!$result) {
    echo "<script>alert('写入数据出错！模型文件不存在)');location.href='../DeleteFile/DeleteFileData.php';</script>";
}
else
{
    $sql="select * from ModelsTable where FileName='$FileName'and Info is not null";
    $result=mysqli_query($link,$sql);
    if ($result->num_rows > 0)
    {
        echo "<script> var sure=confirm( '模型备注信息已存在！如果确认上传之前的模型备注信息就不存在了，您还要继续上传吗？ ');
       if (1==sure)
       {
          location.href ='reAddInfo.php?filename=$FileName&txt=$InfoTxt';
       }
       else {
           location.href ='../DeleteFile/DeleteFileData.php';
       }
       </script>";
    }
    else
    {
        $sql = "update ModelsTable set Info='$InfoTxt' where FileName='$FileName'";
        if($link->multi_query($sql) ===true)
        {
            echo "<script>alert('上传备注信息成功！');location.href='../DeleteFile/DeleteFileData.php';</script>";
        }
        else
        {
            echo "<script>alert('上传备注信息失败，请检查！');location.href='../DeleteFile/DeleteFileData.php';</script>";
        };
    }

    //关闭连接
    $link->close();
}
?>