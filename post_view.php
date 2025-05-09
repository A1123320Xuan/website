<?php
include 'config.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    echo "<h1>" . htmlspecialchars($row['title']) . "</h1>";
    echo "<p>作者：" . htmlspecialchars($row['username']) . "</p>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    if ($row['image']) {
        echo "<img src='" . htmlspecialchars($row['image']) . "' width='400'>";
    }
}
?>