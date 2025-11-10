<?php

// フォームからのデータを受け取る
$name = $_POST['name'];
$email = $_POST['email'];

// 未入力チェック
$errors = [];

if (empty($name)) {
  $errors[] = 'ユーザー名を入力して下さい🐶💦';
}
if (empty($email)) {
  $errors[] = 'メールアドレスを入力して下さい🐶💦';
}

// 未入力がある場合
if (!empty($errors)) {
  $query = http_build_query([
    'errors' => $errors,
    'old' => ['name' => $name, 'email' => $email]
  ]);
  header("Location: index.php?$query");
  exit;
}

// 成功時の処理
echo '<h3>登録内容🐶</h3>';
echo 'ユーザー名: ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</br>';
echo 'メールアドレス: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</br></br>';
?>

<input type="button"  onclick="location.href='index.php'" value="戻る">
