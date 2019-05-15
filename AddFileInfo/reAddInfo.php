<?php
require '../DBConfig.php';
$FileName = $_GET["filename"];
//这个是要得到操作模型的文件名
$InfoTxt = $_GET["txt"];
$sql = "update ModelsTable set Info='$InfoTxt' where FileName='$FileName'";
mysqli_query($link,"set names 'utf8'"); //数据库输出编码
if($link->multi_query($sql) ===true)
{
    echo "<script>alert('上传备注信息成功！');location.href='../DeleteFile/DeleteFileData.php';</script>";
}
else
{
    echo "<script>alert('上传备注信息失败，请检查！');location.href='../DeleteFile/DeleteFileData.php';</script>";
}
$link->close();
?>