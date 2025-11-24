<?php
// index.php

// dog.php 読み込み
require_once 'dog.php';

// データ取得
if (isset($_POST)) {
  $dog_name = $_POST['dog_name'] ?? '';
  $dog_point = intval($_POST['dog_point'] ?? '');
}

// 検証
if ( !empty($dog_name) && !empty($dog_point) ) {
  $dog = new DogPointCard($dog_name);
  echo $dog->addPoint($dog_point);
  echo $dog->getInfo();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>Dog_App🐶</title>
</head>
<body>
  <h2>Dog_App🐶</h2>

  <form action="" method="post">
    <label for="dog_name">犬の名前:</label>
    <input id="dog_name" type="text" name="dog_name" placeholder="じょん">
    <br>
    <label for="dog_point">今日のポイント:</label>
    <input id="dog_point" type="number" name="dog_point" placeholder="10">
    <br><br>
    <input type="submit" value="登録🐶">
  </form>

</body>
</html>
