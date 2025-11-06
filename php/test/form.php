<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>お問い合わせフォーム</h2>

  <?php
  // 前回の送信エラーがあれば受け取る
  $errors = $_GET['errors'] ?? [];
  $old = $_GET['old'] ?? [];
  ?>

  <?php if (!empty($errors)): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?=htmlspecialchars($e, ENT_QUOTES, 'UTF-8')  ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="receive.php" method="post">
    <label>名前:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メールアドレス:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メッセージ:</label>
    <textarea name="message" rows="4" cols="40"><?=htmlspecialchars($old['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea><br><br>

    <input type="submit" value="送信">
  </form>
</body>
</html>
