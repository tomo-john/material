<?php
session_start();

$name = $_SESSION['old']['name'] ?? '';
$email = $_SESSION['old']['email'] ?? '';

// 本来はここでデータベース保存などの処理

// 送信完了
echo '<h3>送信完了</h3>';
echo 'ユーザー名: ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '<br>';
echo 'メールアドレス: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '<br>';

// セッション削除
unset($_SESSION['old']);
unset($_SESSION['errors']);
?>
