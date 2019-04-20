<?php
$host = 'localhost';
$database = 'ModelsDataBase';
$username = 'root';
$password = '123456';

// 连接mysql
$link = @mysqli_connect($host,$username,$password);
if($link->connect_error)
{
    echo "<script>alert('数据库访问出错！');</script>";
}
// 选择数据库
mysqli_select_db($link, $database);
// 编码设置
mysqli_set_charset($link, 'utf8');

?>