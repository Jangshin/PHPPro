<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <div style="font-size: 20px">
        <a style="color:#000000 " href='DeleteFileData.php?page=1'>返回</a>
    </div>
    <h2>请上传</h2>
    <?php
    $value = $_GET['value'];//加上@是为了避免页面上报错
    echo "<h2 style='color: #761c19'>$value 的备注信息</h2>";
    ?>
</head>
<body>
<style>
    .center {
        position: fixed;
        top: 50%;
        left: 50%;
        background-color:white;
        width:50%;
        height: 50%;
        -webkit-transform: translateX(-50%) translateY(-50%);
        background-color: transparent;
    }
</style>
<div class="center" >
    <input type='text' id="txt" style="width: 200px;height: 200px" size="2" onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'"
           onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black">
    <br>
    <input type='button' value='提交' onclick="alert('保存信息'+document.getElementById('txt').value)">
</div>
</body>
</html>