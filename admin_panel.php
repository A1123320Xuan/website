<?php
include 'auth.php';
include 'config.php';
if (!is_admin()) {
    echo "您無權限訪問";
    exit;
}
$result = $conn->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id");
while ($row = $result->fetch_assoc()) {
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>作者：" . htmlspecialchars($row['username']) . "</p>";
    echo "<a href='delete_post.php?id={$row['id']}'>刪除</a><hr>";
}
?>