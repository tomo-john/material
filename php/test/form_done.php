<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

echo '<h3>登録完了🐶✨</h3>';
echo 'ユーザー名: ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '<br>';
echo 'メールアドレス: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '<br><br>';
?>

<input type="button" value="フォームに戻る" onclick="location.href='form_input.php'">
