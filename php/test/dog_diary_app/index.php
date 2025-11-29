<?php
// index.php

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

    <form action="" method="post">
      <label for="title">タイトル</label>
      <input id="title" type="text" name="text" placeholder="タイトルの入力🐾" value="">
      <label for="content">内容</label>
      <textarea id="content" name="content" placeholder="本文書いてね🐾"></textarea>
      <input class="btn" type="submit" value="登録🐶">
      <a class="btn link-btn" href="list.php">一覧画面へ🐶</a>
    </form>
  </div>
</body>
</html>
