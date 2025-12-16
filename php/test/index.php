<?php

// compact()メソッド
// 変数名とその値から配列を作成

$name = 'じょん';
$age = '2';
$breed = 'ゴル';
$favarite_food = 'やきにく';

$data = compact('name', 'age', 'breed', 'favarite_food');

var_dump($data);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>テスト🐶</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php foreach ($data as $d): ?>
    <li><?= $d ?></li>
  <?php endforeach; ?>  
</body>
</html>
