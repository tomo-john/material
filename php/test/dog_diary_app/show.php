<?php
// show.php
session_start();

$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
if (empty($title) || empty($title)) {
  exit('不正なアクセスです🐶💦');
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>🐶犬日記app🐶</title>
</head>
<body>
  
  <div class="main">
    <h2>🐶犬日記app🐶</h2>
    
    <a class="btn link-btn" href="list.php">一覧画面へ🐶</a>
  </div>
</body>
</html>
