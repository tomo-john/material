<?php
session_start();

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

$errors = [];

if (empty($name)) $errors[] = 'ユーザー名を入力して下さい';
if (empty($email)) $errors[] = 'メールアドレスを入力して下さい';

// エラーがある場合
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old'] = ['name' => $name, 'email' => $email];
  header("Location: form_input.php");
  exit;
}

// 確認画面表示
$_SESSION['old'] = ['name' => $name, 'email' => $email];
?>

<h3>確認画面</h3>
ユーザー名: <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?><br>
メールアドレス: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?><br>

<form action="form_complete.php" method="post">
  <input type="submit" value="送信">
</form>

<form action="form_input.php" method="get">
  <input type="submit" value="戻る">
</form>
