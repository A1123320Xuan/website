<?php
include 'config.php';
$result = $conn->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<h2><a href='post_view.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a></h2>";
    echo "<p>作者：" . htmlspecialchars($row['username']) . "</p>";
}
?>