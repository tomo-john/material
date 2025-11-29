<?php
// rename.php 名前変更画面
session_start();

// エラーチェック
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// メッセージ有無
$notices = $_SESSION['notices'] ?? [];
unset($_SESSION['notices']);

// データ受け取り
$name = $_POST['dogmon_name'] ?? '';
if (empty($name)) {
  $old_name = $_SESSION['old_name'];
  unset($_SESSION['old_name']);
} else {
  $old_name = $name;
}

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

    <div class="form">
      <form action="update_name.php" method="post">
        <label for="name">名前を入力してね🐶: </label>
        <input id="name" type="text" name="name" placeholder="例: じょん" value="<?php echo $name; ?>">
        <input type="hidden" name="old_name" value="<?php echo $old_name; ?>">
        <br><br>
        <input type="submit" value="名前変更🐶">
      </form>
    </div>
  </div>

  <div class="back_btn">
    <a class="btn" href="list.php">戻る</a>
  </div>

</body>
</html>
