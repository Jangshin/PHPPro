<?php
header("content-Type: text/html;charset=utf-8");
$DirStr = null;
$FileName = null;
// 假定数据库用户名：root，密码：123456，数据库：RUNOOB
$con=mysqli_connect("localhost","root","123456","mytestdb");
if (mysqli_connect_errno($con))
{
    echo "连接 MySQL 失败" . mysqli_connect_error() ."刷新网页试试";
}
else {
// 执行查询
    //mysqli_query($con, "INSERT INTO testtable  VALUES ('test','new')");
    echo "<br>";
    $sql = "select* from TestTable";
//查询
    mysqli_query($con,'set names utf8');
    $arr = mysqli_query ( $con, $sql );

//遍历循环打印数据
    while ($row = mysqli_fetch_array($arr))
    {
        echo $row['Dir'];
        echo $row['FileName'];
    }

//释放
    mysqli_free_result($arr);
//关闭连接
    mysqli_close($con);
}
?>