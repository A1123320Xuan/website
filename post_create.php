<?php
include 'auth.php';
include 'config.php';
if (!is_logged_in()) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $content, $image);
    $stmt->execute();
    echo "文章已發佈";
}
?>
<form method="post" enctype="multipart/form-data">
  標題：<input name="title"><br>
  內容：<textarea name="content"></textarea><br>
  圖片：<input type="file" name="image"><br>
  <button type="submit">發佈</button>
</form>