<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>用户管理</title>
</head>
<body>
<div class='container'>
    <h1 class='page-header'>用户管理</h1>
    <p>
<?php
require_once('DBConfig.php');
if (!$link)
{
      die("连接失败！");
}
$sql= "select count(*) as count from modelstable";
$obj= mysqli_query($link,$sql);
$pageall = mysqli_fetch_assoc($obj);
$count = $pageall['count'];
$num = 8;
$lastPage = ceil($count/$num);
$page =1;
if($page>=$lastPage){
    $page=$lastPage;
}
//下一页
$nextpage = $page+1;
if($nextpage>=$lastPage){
    $nextpage=$lastPage;
}
//上一页
$prepage = $page-1;
if($prepage<=1){
    $prepage=1;
}
$offset = ($page-1)*$num;
$sql="select Dir,FileName from modelstable limit ".$offset.",".$num;
$reslut = mysqli_query($link,$sql);
if (mysqli_num_rows($reslut)>0)
{
echo '<table width="60%" border="1" align="center">';
echo '<th>路径 </th><th>文件</th><th>操作</th>';

while ($row = mysqli_fetch_assoc($reslut))
{
echo '<tr>';
echo '<td>'.$row['Dir'].'</td>';
echo '<td>'.$row['FileName'].'</td>';
echo '<td><ahref="deleteDataAction.php?value='.$row['Dir'].'">删除</a></td>';
echo '</tr>';
}
echo '</table>';
}else {
echo "没有数据！";
}
mysqli_close($link);
?>
    </p>
</div>
</body>
</html>
