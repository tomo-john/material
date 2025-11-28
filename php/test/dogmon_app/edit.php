<?php
// edit.php 育成画面
session_start();

// エラーチェック
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// メッセージ有無
$notices = $_SESSION['notices'] ?? [];
unset($_SESSION['notices']);

// dogmonリスト取得
$dogmons = $_SESSION['dogmon'] ?? [];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title>育成画面</title>
</head>

<body>

  <div class="edit">
    <h2>dogmon育成画面🐶</h2>

    <div class="errors">
      <?php if(!empty($errors)): ?>
        <ul>
          <li>エラー:</li>
          <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

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

    <div class="form">
      <form action="" method="post">
        <input type="submit" value="育成開始🐶">
      </form>
    </div>
  </div>

  <div class="back_btn">
    <a class="btn" href="index.php">戻る</a>
  </div>

</body>
</html>
