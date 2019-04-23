<html>
<head>
    <title>浏览表中记录</title>
</head>
<body>
<?php
header("Content-type:text/html;charset=utf-8");
echo "<body>";
echo "<a href='html/Com3DData.html'>返回 </a>";
echo "</body>";
echo "<title style='color: #761c19'>模型文件删除</title>";
echo "<h3>选择删除模型文件</h3>";

require "DBConfig.php";

$sql = "SELECT *  FROM modelstable";
mysqli_query($link,"set names 'utf8'"); //数据库输出编码
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "<script>alert('数据库错误！请检查数据库配置！)');location.href='html/Com3DData.html';</script>";
}
else {
        echo "<table border='2' style='width:50%' ;height:50% align='center'  style='color: #761c19'>";
        echo "<tr><th align='center'> 所属类 </th><th align='center'> 模型文件 </th><th align='center'> 操作 </th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $var = explode("/", $row['Dir']);
            echo "<tr>";
            echo "<td align='center'>".$var[0]."</td>";
            echo "<td align='center'>".$row['FileName']."</td>";
            echo "<td align='center'> <a href='deleteDataAction.php?&value=$row[Dir]'>删除</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($link);
}
?>
</body>
</html>
