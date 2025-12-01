<?php
// new.php
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

    <h3>NEW</h3>

    <div class="menu-list">
      <a class="link-btn" href='new.php'>作成画面</a>
      <a class="link-btn" href='list.php'>一覧画面</a>
      <a class="link-btn" href='test.php'>テストページ</a>
    </div>
  </div>

</body>
</html>
