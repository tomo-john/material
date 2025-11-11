<?php
session_start();

// 🔹 トークンチェック（ここが最終防衛ライン）
if (empty($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
  die('不正な送信です🐶💦');
}

// 一度使ったトークンは破棄（二重送信防止）
unset($_SESSION['token']);

$name = $_SESSION['old']['name'] ?? '';
$email = $_SESSION['old']['email'] ?? '';

if (empty($name) && empty($email)) {
  header('Location: form_input.php');
  exit;
}

// ✅ 実際の登録処理（省略）

// セッションデータ削除
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>完了画面</title>
</head>
<body>
  <h2>🐶 登録完了</h2>

  <p>以下の内容で登録しました✨</p>
  <ul>
    <li>ユーザー名: <?= htmlspecialchars($name) ?></li>
    <li>メールアドレス: <?= htmlspecialchars($email) ?></li>
  </ul>

  <a href="form_input.php">もう一度入力する</a>
</body>
</html>
