<?php
header("Content-type:text/html;charset=utf-8");
echo "<body>";
echo "<a href='html/Com3DData.html'>返回 </a>";
echo "</body>";
echo "<title style='color: #761c19'>模型文件删除</title>";
echo "<h3>选择删除模型文件</h3>";
require "DBConfig.php";

$sql = "SELECT Dir, FileName  FROM modelstable";
mysqli_query($link,"set names 'utf8'"); //数据库输出编码
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "<script>alert('数据库错误！请检查数据库配置！)');location.href='html/Com3DData.html';</script>";
}
echo "<table border='2' style='width:50%' ;height:50% align='center' valign='center'  style='color: #761c19'>";
echo "<tr><td align='center'> 所属类 </td><td align='center'> 模型文件 </td><td align='center'> 操作 </td></tr>";
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $var = explode("/",$row["Dir"]) ;
        echo "<td align='center'>" .$var[0] ."</td><td align='center'>" . $row["FileName"]. "</td>
        <td align='center'><a href='deleteDataAction.php?&value=$row[Dir]'>删除</a></td>
        </tr>";
    }
}
else
{
    echo "<script>alert('数据为空，不能删除!');location.href='html/Com3DData.html';</script>";
}
echo "</table>";

?>