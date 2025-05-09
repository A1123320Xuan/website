<?php
include 'auth.php';
if (!is_logged_in()) {
    header("Location: login.php");
    exit;
}
echo "歡迎，" . $_SESSION['username'] . "<br>";
if (is_admin()) {
    echo "<a href='admin_panel.php'>進入管理後台</a><br>";
}
?>
<a href='post_create.php'>新增文章</a><br>
<a href='logout.php'>登出</a>