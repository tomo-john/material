<?php
session_start();

// 🔹 トークンを生成（新規アクセス時のみ）
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));  // 安全な乱数
}

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
$token = $_SESSION['token'];  // 後でフォームに埋め込む
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フォーム入力</title>
</head>
<body>
  <h2>🐶 フォーム入力画面</h2>

  <?php if (!empty($errors)): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?= htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="form_confirm.php" method="post">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_QUOTES, 'UTF-8') ?>">

    <label>ユーザー名:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メールアドレス:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <input type="submit" value="確認画面へ">
  </form>
</body>
</html>
