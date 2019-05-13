<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>用户管理</title>
    <link href='bs2/css/bootstrap.min.css' rel="stylesheet" >
    <script src="jquery3/jquery-3.0.0.min.js"></script>
    <script src="bs2/js/bootstrap.min.js"></script>
</head>
<body>
<div class='container'>
    <h1 class='page-header'>用户管理</h1>
    <p>
        <button class='btn btn-success' onclick="location=''">返回首页</button>
        <button class='btn btn-default' onclick="location='' ">退出登录</button>
    </p>
    <p>
        <?php
        require_once('DBConfig.php');

        //末页
        $sql = "select count(*) as count from modelstable"; //获取总的数量
        $obj= mysqli_query($link,$sql);
        $pageall = mysqli_fetch_assoc($obj);
        $tot =  $pageall['count'];
        //每页条数
        $length = 5;
        $lastPage = ceil($tot/$length);//ceil向上取整
        //echo $lastPage;

        //当前页数
        $page = $_GET['p'];
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
        $offset = ($page-1) * $length;
        //求每页的数据

        $sqlNew="select Dir,FileName from modelstable limit ".$offset.",".$length;
        $resultNew = mysqli_query($link,$sqlNew);
        if (mysqli_num_rows($resultNew)>0) {
            echo "<table class='table table-striped table-hover table-bordered' width='1000px' border='1px' cellspacing='0'>";
            echo "<tr>";
            echo "<th>路径</th>";
            echo "<th>文件</td>";
            echo "<th>操作</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($reslut)) {
                echo "<tr>";
               // echo "<td >" . $row['Dir'] . "</td>";
               // echo "<td>" . $row['FileName'] . "</td>";
                //echo "<td><a href='javascript:' class='btn btn-warning'>修改</a>    <a href='javascript:' class='del' num='{$row['id']}'>删除</a></td>";//href='delete.php?id={$row['id']}'
                echo "</tr>";
            }
        }
        echo "</table>";
        ?>

    </p>
    <p>当前第<?php if($_GET['p']>=$lastPage){$_GET['p']=$lastPage;};echo $_GET['p'];?>页</p>
    <p>
        <a href='TestDelete.php?p=1' class='btn btn-info'>首页</a>
        <a href='TestDelete.php?p=<?php echo $prepage;?>' class='btn btn-info'>上一页</a>
        <a href='TestDelete.php?p=<?php echo $nextpage;?>' class='btn btn-info'>下一页</a>
        <a href='TestDelete.php?p=<?php echo $lastPage;?>' class='btn btn-info'>末页</a>
        <button class='btn btn-default'><?php if($_GET['p']>=$lastPage){$_GET['p']=$lastPage;};echo $_GET['p'].'/'.$lastPage;?></button>
        <span>跳转至&nbsp<input type='text' id='p' class='p' style='width: 30px;height:25px'>页</span>
        <button class='btn btn-success' id='b1'>GO</button>
    </p>
</div>
</body>
<script>
    //页面跳转
    $('#b1').click(function(){
        val = $('#p').val();
        if(!val){
            alert('请输入页码！');
        }else{
            //alert(val.match(/^\d+$/g));
            if(val.match(/^\d+$/g)){
                location='TestDelete.php?p='+val;
            }else{
                //alert('非法字符！');
            }
        }

    });

    //异步删除用户信息
    trobjs=document.getElementsByClassName('del');
    for(i=0;i<trobjs.length;i++){
        trobjs[i].onclick=function(){
            id=this.getAttribute('num');
            //alert(id);
            xhr=new XMLHttpRequest();
            xhr.open('get','delete.php?id='+id,true);
            xhr.send();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4){
                    r=xhr.responseText;
                    //alert(r);
                    if(r==1){
                        tr=document.getElementById(id);
                        tr.style.display='none';
                    }
                }
            }
        }
    }
</script>
</html>

<p>当前第<?php if($_GET['p']>=$lastPage){$_GET['p']=$lastPage;};echo $_GET['p'];?>页</p>
<p>
    <a href='DeleteFileData.php?p=1' class='btn btn-info'>首页</a>
    <a href='DeleteFileData.php?p=<?php echo $prepage;?>' class='btn btn-info'>上一页</a>
    <a href='DeleteFileData.php?p=<?php echo $nextpage;?>' class='btn btn-info'>下一页</a>
    <a href='DeleteFileData.php?p=<?php echo $lastPage;?>' class='btn btn-info'>末页</a>
    <button class='btn btn-default'><?php if($_GET['p']>=$lastPage){$_GET['p']=$lastPage;};echo $_GET['p'].'/'.$lastPage;?></button>
    <span>跳转至&nbsp<input type='text' id='p' class='p' style='width: 30px;height:25px'>页</span>
    <button class='btn btn-success' id='b1'>GO</button>
</p>