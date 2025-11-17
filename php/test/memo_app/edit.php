<?php
session_start();

if (isset($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
} else {
  $errors = [];
}

if (isset($_SESSION['file_name'])) {
  $file = $_SESSION['file_name'];
  unset($_SESSION['file_name']);
} else {
  $file = $_POST['file'];
}

$file_name = basename($file);

if (isset($_SESSION['old_content'])) {
  $content = $_SESSION['old_content'];
  unset($_SESSION['old_content']);
} else {
  $content = file_get_contents($file);
}

?>

<!DOCTYPE html>
<html>
<head><title>メモアプリ練習🐶</title></head>
<body>
  <h2>登録内容の編集🐶</h2>

  <?php if (!empty($errors)): ?>
    <?php foreach($errors as $e): ?>
      <div class="error" style="color: red;">
        <ul><li><?= $e ?></li></ul>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <p>編集中のファイル: <?php echo $file_name ?></p>
  <form action="confirm_edit.php" method="post">
    <label for="content">メモ:</label><br>
    <input type="hidden" name='file_name' value="<?php echo $file ?>">
    <textarea id="content" name="content" rows="20" cols="120"><?php echo htmlspecialchars($content ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea><br><br>

    <input type="submit" value="保存する🐶">
  </form>
  <br>
  <hr>
  <br>
  <a href="index.php">戻る🐶</a>

<body>
</html>
