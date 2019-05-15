 <?php
    echo '<div style="font-size: 20px">';
    echo '<a style="color:#000000" href="../DeleteFile/DeleteFileData.php?page=1">返回</a>';
    echo '</div>';
    echo '<h2>请上传</h2>';

    $value = $_GET['value'];
    echo "<h2 style='color: #761c19'>$value 的备注信息</h2>";


echo '<style>';
echo '  .center {';
echo '       position: fixed;';
echo '       top: 50%;';
echo '       left: 50%;';
echo '       background-color:white;';
echo '       width:50%;';
echo '      height: 50%;';
echo '      -webkit-transform: translateX(-50%) translateY(-50%);';
echo '      background-color: transparent;';
echo '  }';
echo '</style>';
echo '<div class="center" >';
echo '<form action="addInfoToSQL.php?value='.$value.'" method="post" enctype="multipart/form-data" >';
echo '<input type="text" name="txtInfo" style="width: 200px;height: 200px" size="2" onmouseover="this.style.borderColor="black";this.style.backgroundColor="plum" "
           onmouseout="this.style.borderColor="black";this.style.backgroundColor="#ffffff" " style="border-width:1px;border-color=black">';
echo ' <br>';
echo ' <br>';
echo '<input type="submit" value="提交" >';
echo '</form>';
echo '</div>';

 ?>