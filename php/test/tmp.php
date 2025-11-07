<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>test</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php $users = ['じょん', 'ぴょんきち', 'もこもか']; ?>

  <ul>
    <?php foreach ($users as $user) : ?>
      <li><?= htmlspecialchars($user) ?></li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
