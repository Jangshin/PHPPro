<?php
// 假定数据库用户名：root，密码：123456，数据库：RUNOOB
$con=mysqli_connect("localhost","root","123456","mytestdb");
if (mysqli_connect_errno($con))
{
    echo "连接 MySQL 失败: " . mysqli_connect_error();
}
else {
// 执行查询
    echo "连接 MySQL 成功 ";
    mysqli_query($con, "INSERT INTO test  VALUES ('test')");
    echo "<br>";
    $sql = "select* from test";
//查询
    $results = $con -> query($sql);

//遍历循环打印数据
    while ($row = mysqli_fetch_array($results))
    {
//    print_r($row);
        echo $row['Dir'];
        echo "<br>";
    }
//释放
    mysqli_free_result($results);
//关闭连接
    mysqli_close($con);
}
?>