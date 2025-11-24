<?php
// list.php わんちゃん一覧表示
require_once 'dog.php'; 
session_start();

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
  <h2>🐶登録済みわんわん一覧🐶</h2>

  <table>
    <thead>
      <th>🐶わんちゃんの名前🐶</th>
      <th>🐾現在のポイント🐾</th>
    </thead>
    <tbody>
      <?php if (!empty($_SESSION['dogs'])): ?>
        <?php foreach($_SESSION['dogs'] as $dog): ?>
          <tr>
            <td><?php echo $dog->getName() ?></td>
            <td><?php echo $dog->getPoint() ?></td>        
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <p>現在登録されているわんちゃんはいません🐶</p>
      <?php endif; ?>
    </tbody>
  </table>

  <br><hr><br>

  <a href="index.php">戻る</a>


</body>
</html>
