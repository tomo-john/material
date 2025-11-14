<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>テスト🐶</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php $members = ['じょん', 'ぴょんきち', 'もこもか']; ?>
  <?php foreach ($members as $m): ?>
    <li><?= $m ?></li>
  <?php endforeach; ?>  
</body>
</html>
