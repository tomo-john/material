<?php
// edit.php
require_once 'DogDiary.php'; 
session_start();

// データ取得
$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
$target_diary = DogDiary::searchDiary($title, $date);

$_SESSION['target_diary'] = $target_diary;

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
    
    <div class="error">
      <?php if(!empty($errors)): ?>
        <ul>
          <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif;?>
    </div>

    <div class="notice">
      <?php if(!empty($notices)): ?>
        <ul>
          <?php foreach($notices as $notice): ?>
            <li><?=$notice ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif;?>
    </div>

    <form action="update.php" method="post">
      <label for="title">タイトル</label>
      <input id="title" type="text" name="title" placeholder="タイトルの入力" value="<?php echo htmlspecialchars($target_diary['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
      <label for="content">内容</label>
      <textarea id="content" name="content" placeholder="本文書いてね🐾"><?php echo htmlspecialchars($target_diary['content'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
      <input class="btn" type="submit" value="更新🐶">
      <a class="btn link-btn" href="list.php">一覧画面へ🐶</a>
    </form>
  </div>
</body>
</html>
