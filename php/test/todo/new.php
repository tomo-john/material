<?php
// new.php 新規作成画面
session_start();

$errors = '';
if (isset($_SESSION['errors'])){
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
}

$notices = '';
if (isset($_SESSION['notices'])){
  $notices = $_SESSION['notices'];
  unset($_SESSION['notices']);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>新規作成🐶</title>
</head>
<body>

  <div class="new">
    <h2>新規作成🐶</h2>

    <?php if(!empty($errors)): ?>
      <p class="alert"><?php echo $errors; ?></p>
    <?php endif; ?>

    <?php if(!empty($notices)): ?>
      <p class="notice"><?php echo $notices; ?></p>
    <?php endif; ?>
    
    <div class="form">
      <form action="create.php" method="post">
        <label for="">やること:</label>
        <input type="text" name="todo" placeholder="例: じょんに餌やり">
        <input type="submit" value="登録🐾">
      </form>
    </div>
    <div class="back">
      <a href="index.php">🐾戻る🐾</a>
    </div>
  </div>

</body>
</html>
