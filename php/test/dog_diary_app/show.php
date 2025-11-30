<?php
// show.php
require_once 'DogDiary.php'; 
session_start();

$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
if (empty($title) || empty($title)) {
  exit('不正なアクセスです🐶💦');
}

// データ取得
$target_diary = DogDiary::searchDiary($title, $date);

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
    
    <div class="content">
      <h3>タイトル</h3>
      <p><?php echo $target_diary['title']; ?></p>
      <h3>内容</h3>
      <p><?php echo nl2br($target_diary['content']); ?></p>
      <h3>作成日時</h3>
      <p><?php echo $target_diary['date']; ?></p>
    </div>

    <a class="btn link-btn" href="list.php">一覧画面へ🐶</a>
  </div>
</body>
</html>
