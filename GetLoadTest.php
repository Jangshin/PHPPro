<?php
if( $_POST["submit"] == "提交"){   // 判断提交的按钮名称是否为“登录”
    // 使用 echo 语句输出使用 $_POST[] 方法获取的用户名和密码
    echo "所属类为:". $_POST['lei1'] . "<br >化石种类:" . $_POST['lei2'] . "<br>化石名称：".$_POST['lei3'];
}
?>