<?php
session_start();

if (isset($_SESSION['visited_count'])) {
  $count = $_SESSION['visited_count'];
} else {
  $count = '不正なアクセス🐶';
}
?>

<!DOCTYPE html>
<html>
<head><title>ページ2🐶🐶</title></head>
<body>
  <h2>ここは2ページです</h2>
  <p>ページ1を訪問した回数は, <?php echo $count; ?> 回です。</p>
  <p><a href="page1.php">ページ1へ戻る</a></p>
</body>
</html>
