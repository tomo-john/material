<?php

/** list.php
 *  一覧表示
 */


require_once 'DbManager.php';
require_once 'DogToysRepository.php';
require_once 'Session.php';

$session_data = Session::getAndUnsetSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$dog_toys = $dog_toy_repo->getAll();

// var_dump($dog_toys);
?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>DOG TOYS</title>
</head>
<body>

  <div class="main">
    
    <h2>おもちゃ一覧</h2>

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

    <?php if(empty($dog_toys)): ?>
      <p>登録されたおもちゃはありません</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>おもちゃ名</th>
            <th>価格</th>
            <th>登録日時</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($dog_toys as $dog_toy): ?>
            <tr>
              <td><?php echo htmlspecialchars($dog_toy['id']) ?></td>
              <td><?php echo htmlspecialchars($dog_toy['name']) ?></td>
              <td><?php echo htmlspecialchars($dog_toy['price']) ?></td>
              <td><?php echo htmlspecialchars($dog_toy['created_at']) ?></td>
              <td>
                <div class="action">
                  <a class="btn action-btn" href="<?php echo htmlspecialchars("edit.php?id={$dog_toy['id']}") ?>">編集</a>
                  <form action="delete_confirm.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $dog_toy['id'] ?>">
                    <input class="btn action-btn" type="submit" value="削除">
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

  </div>

  <div class="menu">
    <a class="btn link-btn" href="index.php">戻る</a>
  </div>

</body>
</html>
