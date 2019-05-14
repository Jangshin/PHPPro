<?php
require_once('DBConfig.php');
header("content-type:text/html;charset=utf-8");
if($link -> connect_error) {
    die("连接失败" . $link -> connect_error);
}
//设置客户端和连接字符集
$link -> query("set names utf8");

//获取页码
$page = @$_GET['page']?$_GET['page']:1;//加上@是为了避免页面上报错


//每页长度
$length = 10;
//开始个数
$first = ($page - 1) * 10;

//获取数据总行数
$totsql = "select count(*) from modelstable";
$totres = $link -> query($totsql);//查询获得的资源
$tot = $totres -> fetch_row();//返回索引数组
//计算总页数
$totpage = ceil($tot[0] / $length);

//上页下页
$prevpage = $page - 1;
$nextpage = $page + 1;
//限制最后一页
if($nextpage >= $totpage) {
    $nextpage = $totpage;
}

//获取数据表中的结果集
$sql = "select Dir,FileName from modelstable order by Id limit {$first},{$length}";
$result = $link -> query($sql);

//创建页面表格实现分页
echo "<h2>用户信息</h2>";
echo "<table width='800' border='1'>";
//获取所有结果
if($result -> num_rows > 0) {//数据个数大于0
    echo "<tr>";
    echo "<td>路径</td><td>文件名</td><td>用户操作</td>";
    echo "</tr>";
    while ($row = $result -> fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Dir']}</td><td>{$row['FileName']}</td>";
        echo "</tr>";
    }
} else {
    echo "没有结果";
}
echo "</table>";

echo "<h3><a href='deletefiletest1.php?page=$prevpage'>上一页</a><a href='deletefiletest1.php?page=$nextpage'>下一页</a>第{$page}页,共{$totpage}页</h3>";

$link -> close();
?>

