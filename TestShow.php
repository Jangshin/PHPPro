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
    mysqli_query($con, "INSERT INTO test (Dir) VALUES ('test')");

    $sql = "SELECT Dir FROM test";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "Dir: " . $row["Dir"];
        }
    } else {
        echo "0 结果";
    }

    mysqli_close($con);
}
?>