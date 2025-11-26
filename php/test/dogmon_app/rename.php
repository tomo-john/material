<?php
// rename.php 名前変更画面
$name = $_POST['dogmon_name'] ?? '';

var_dump($name);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title>名前変更</title>
</head>

<body>

  <div class="edit">
    <h2>名前変更画面🐶</h2>

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

    <div class="edit_form">
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
