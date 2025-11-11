<?php
session_start();

// 🔹 トークンチェック
if (empty($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
  die('不正なアクセスです🐶💦');
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$errors = [];

if (empty($name)) $errors[] = 'ユーザー名を入力してください🐶💦';
if (empty($email)) $errors[] = 'メールアドレスを入力してください🐶💦';

if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old'] = ['name' => $name, 'email' => $email];
  header('Location: form_input.php');
  exit;
}

$_SESSION['old'] = ['name' => $name, 'email' => $email];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>確認画面</title>
</head>
<body>
  <h2>🐾 確認画面</h2>

  <table border="1" cellpadding="8">
    <tr><th>ユーザー名</th><td><?= htmlspecialchars($name) ?></td></tr>
    <tr><th>メールアドレス</th><td><?= htmlspecialchars($email) ?></td></tr>
  </table>

  <br>
  <form action="form_complete.php" method="post">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token']) ?>">
    <input type="submit" value="送信する">
  </form>

  <form action="form_input.php" method="get">
    <input type="submit" value="戻る">
  </form>
</body>
</html>
