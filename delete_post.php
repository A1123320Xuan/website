<?php
include 'auth.php';
include 'config.php';
if (!is_logged_in()) {
    header("Location: login.php");
    exit;
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if ($_SESSION['user_id'] == $post['user_id'] || is_admin()) {
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "文章已刪除。<a href='dashboard.php'>返回</a>";
} else {
    echo "您沒有權限刪除此文章";
}
?>