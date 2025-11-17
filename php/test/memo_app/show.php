<?php
$file = $_POST['file'];
$file_name = basename($file);
$content = nl2br(file_get_contents($file));
?>

<!DOCTYPE html>
<html>
<head><title>メモアプリ練習🐶</title></head>
<body>
  <h2>詳細画面🐶</h2>
  
  <?php echo "ファイル名: " . $file_name . "<br>"; ?>
  <?php echo " メモ内容: <br>"; ?>
  <?php echo $content; ?>
  <br><br>
  <form action="delete.php" method="post">
    <input type="hidden" name="file" value="<?php echo $file_name; ?>">
    <input type="submit" value="削除">
  </form>
  <br>
  <form action="edit.php" method="post">
    <input type="hidden" name="file" value="<?php echo $file_name; ?>">
    <input type="submit" value="編集">
  </form>

  <br><br>
  <a href="index.php">戻る🐶</a>

</body>
<html>
