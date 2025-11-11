<?php
session_start();

if (isset($_SESSION['visited_count'])) {
  $_SESSION['visited_count'] = $_SESSION['visited_count'] + 1;
} else {
  $_SESSION['visited_count'] = 1;
}

$count = $_SESSION['visited_count'];
?>

<!DOCTYPE html>
<html>
<head><title>1ページ🐶</title></head>
<body>
  <h2>ここは1ページです</h2>
  <p>このページを、<?php echo $count; ?> 回訪問しました。</p>
  <p><a href="page2.php">ページ2へ移動する</a></p>
  <p><a href="reset.php">カウントをクリアする</a></p>
</body>
</html>
