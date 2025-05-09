<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user'; // 預設為一般使用者
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    echo "註冊成功";
}
?>
<form method="post">
  使用者名稱：<input name="username"><br>
  密碼：<input type="password" name="password"><br>
  <button type="submit">註冊</button>
</form>