<?php
session_start();

if (isset($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
} else {
  $errors = [];
}

if (isset($_SESSION['old_input'])) {
  $old_input = $_SESSION['old_input'] ?? [];
  unset($_SESSION['old_input']);
} else {
  $old_input = $_POST ?? [];
}

if (isset($_SESSION['notices'])) {
  $notices = $_SESSION['notices'] ?? [];
  unset($_SESSION['notices']);
}

$dir_name = 'storage';
$files = glob('./storage/*');

?>

<!DOCTYPE html>
<html>
<head><title>メモアプリ練習🐶</title></head>
<body>
  <h2>メモアプリ練習🐶</h2>

  <?php if (!empty($notices)): ?>
    <?php foreach($notices as $n): ?>
      <div class="notice" style="color: blue;">
        <ul><li><?= $n ?></li></ul>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if (!empty($errors)): ?>
    <?php foreach($errors as $e): ?>
      <div class="error" style="color: red;">
        <ul><li><?= $e ?></li></ul>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <form action="confirm.php" method="post">
    <label>保存ファイル名: </label>
    <input type="text" name="file_name" placeholder="例: dog.txt" 
          value="<?= htmlspecialchars($old_input['file_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br><br>

    <label>メモ:</label><br>
    <textarea name="content" rows="20" cols="120" placeholder="ここにメモ入力してね🐶"><?php echo htmlspecialchars($old_input['content'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea><br><br>

    <input type="submit" value="保存する🐶">
  </form>
  <br>
  <hr>

  <h3>保存されたメモ一覧🐶</h3>
  <?php if (empty($files)): ?>
    <p>保存されたメモはありません🐾</p>
  <?php else: ?>
    <?php foreach ($files as $f): ?>
      <form action="show.php" method="post">
        <label><?= basename($f) ?></label>
        <input type="hidden" name="file" value="<?php echo $f; ?>">
        <input type="submit" value="確認">
      </form><br>
    <?php endforeach; ?>
  <?php endif; ?>

</body>
<html>
