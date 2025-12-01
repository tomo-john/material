<?php
// test.php
require 'Parsedown.php';
session_start();

$notices = [];
$errors = [];
if (!empty($_SESSION['notices'])) {
  $notices = $_SESSION['notices'];
  unset($_SESSION['notices']);
}
if (!empty($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
}

// マークダウンファイル読み込み
$markdownFile = 'memo.md';
if (!file_exists($markdownFile)) {
  $markdownContent = "# エラー\nMarkdownファイルが見つかりません🐶";
} else {
  $markdownContent = file_get_contents($markdownFile);
}

$Parsedown = new Parsedown();
$htmlContent = $Parsedown->text($markdownContent);

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>PHP DB接続🐶</title>
</head>
<body>

  <div class="main">
  
    <h2>PHP DB接続検証APP🐶</h2>

    <h3>🐾テストページ🐾</h3>

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

    <div class="content">
      <?php echo $htmlContent; ?>    
    </div>

    <div class="menu-list">
      <a class="link-btn" href='table_create.php'>テーブル作成🐶</a>
      <a class="link-btn" href='index.php'>戻る🐶</a>
    </div>
  </div>

</body>
</html>
