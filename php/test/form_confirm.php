<?php
// フォームからのデータを受け取る
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

// 未入力チェック
$errors = [];

if (empty($name)) {
  $errors[] = 'ユーザー名を入力して下さい🐶💦';
}
if (empty($email)) {
  $errors[] = 'メールアドレスを入力して下さい🐶💦';
}

// 未入力がある場合は入力画面へ戻す
if (!empty($errors)) {
  $query = http_build_query([
    'errors' => $errors,
    'old' => ['name' => $name, 'email' => $email]
  ]);
  header("Location: form_input.php?$query");
  exit;
}
?>

<h3>登録内容の確認🐶</h3>
<p>ユーザー名:<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8')  ?></p>
<p>メールアドレス:<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8')  ?></p>

<form action="form_done.php" method="post">
  <input type="hidden" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
  <input type="hidden" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
  <input type="submit" value="送信する🐾">
</form>

<form action="form_input.php" method="get">
  <input type="hidden" name="old[name]" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
  <input type="hidden" name="old[email]" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
  <input type="submit" value="戻る🐶">
</form>
