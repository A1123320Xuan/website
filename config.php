<?php
$host = 'localhost';
$db = 'blog_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}
?>