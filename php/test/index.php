<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>test</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>test🐶</h2>

  <!-- フォーム入力-->
  <form action="receive.php" method="post">
    <label>ユーザー名:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メールアドレス:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <input type="submit" value="登録">
  </form>
</body>
</html>
