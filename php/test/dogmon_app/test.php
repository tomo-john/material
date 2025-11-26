<?php
// test.php テストページ
session_start();

$notices = $_SESSION['notices'] ?? [];
unset($_SESSION['notices']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title>TEST</title>
</head>

<body>

  <div class="test">
    <h2>テストページ🐶🐾</h2>

    <div class="notices">
      <?php if(!empty($notices)): ?>
        <ul>
          <li>メッセージ:</li>
          <?php foreach($notices as $notice): ?>
            <li><?=$notice ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="reset_btn">
      <a class="btn" href="session_reset.php">セッションリセット🐶</a>
    </div>

    <div class="back_btn">
      <a class="btn" href="index.php">戻る🐶</a>
  </div>

</body>
</html>
