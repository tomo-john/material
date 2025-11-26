<?php
// test.php テストページ
session_start();

echo 'セッションクリア！';
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title></title>
</head>

<body>

  <div class="new">
    <h2>テストページ🐶🐾</h2>

  <div class="back_btn">
    <a class="btn" href="index.php">戻る</a>
  </div>

</body>

</html>
