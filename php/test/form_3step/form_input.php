<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>test</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>フォーム3ステップ</h2>

  <!-- エラーがあれば受け取る -->
  <?php
  $errors = $_GET['errors'] ?? [];
  $old = $_GET['old'] ?? [];
  ?>
  
  <!-- エラーがあったときの処理 -->
  <?php if (!empty($errors)): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?=htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- フォーム入力 -->
  <form action="form_confirm.php" method="post">
    <label>ユーザー名:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メールアドレス:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <input type="submit" value="登録">
  </form>
</body>
</html>
