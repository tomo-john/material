<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

// エラーと古い入力をリセット(表示だけ)
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>

<form action="form_confirm.php" method="post">
  <label>ユーザー名:</label>
  <input type="text" name="name"value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>
  <label>メールアドレス:</label>
  <input type="text" name="email"value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>
  <input type="submit" value="確認">
</form>
