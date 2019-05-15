<!DOCTYPE html>
<html lang="en">
<body background="../image/uploadFileBG.jpg">
<div style="font-size: 20px">
    <a style="color: #FFFFFF" href='../Index.html'>返回</a>
</div>
<style>
    table.imagetable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #999999;
        border-collapse: collapse;
    }
    table.imagetable th {
        background:#b5cfd2 url('cell-blue.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    }
    table.imagetable td {
        background:#dcddc0 url('cell-grey.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    }
</style>
<?php
require_once('../DBConfig.php');
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
$sql = "select Dir,FileName from modelstable limit {$first},{$length}";
$result = $link -> query($sql);

//创建页面表格实现分页
echo "<h2 style='color: #FFFFFF'>用户操作</h2>";
echo "<table class='imagetable' align='center' width='800' border='1'>";
//获取所有结果
if($result -> num_rows > 0) {//数据个数大于0
    echo "<tr>";
    echo "<td align='center'>所属类</td><td align='center'>化石名</td><td align='center'>用户操作</td>";
    echo "</tr>";
    while ($row = $result -> fetch_assoc()) {
        echo "<tr>";
        $belong = explode('/',$row['Dir']);
        echo "<td align='center'>{$belong[0]}</td><td align='center'>{$row['FileName']}</td>";
        echo "<td align='center'><a href='deleteDataAction.php?value={$row['Dir']}'>删除</a>  <a href='../AddFileInfo/addInfo.php?value={$row['FileName']}'>备注</a></td>";
        echo "</tr>";
    }
} else {
    echo "没有结果";
}
echo "</table>";
echo "<h3 style='color: #FFFFFF' align='center'><a style='color: #FFFFFF' href='../DeleteFile/DeleteFileData.php?page=$prevpage'>上一页</a><a style='color: #FFFFFF' href='../DeleteFile/DeleteFileData.php?page=$nextpage'>下一页</a>第{$page}页,共{$totpage}页</h3>";
$link -> close();
?>
</body>
</html>>
