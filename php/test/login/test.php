<?php // test.php
require_once 'Session.php';

$session_data = Session::getAndUnsetSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>TEST</title>
</head>
<body>

  <div class="main">
    
    <h2>TEST</h2>
    
    <?php if(!empty($notices)): ?>
      <div class="notice">
        <ul>
          <?php foreach($notices as $n): ?>
            <li><?=$n ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>
      <div class="error">
        <ul>
          <?php foreach($errors as $e): ?>
            <li><?=$e ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <a class="btn test-btn" href="table_create.php">テーブル作成</a>
    <a class="btn test-btn" href="table_reset.php">テーブルリセット</a>
    <a class="btn test-btn" href="table_view.php">テーブル一覧</a>

  </div>

  <div class="menu">
    <a class="btn link-btn" href="index.php">戻る</a>
  </div>

</body>
</html>
