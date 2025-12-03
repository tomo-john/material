<?php
// list.php
require_once 'DogRepository.php';
session_start();

$dogrepo = new DogRepository();
$dogs = $dogrepo->getDog();

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

    <h3>LIST</h3>

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

    <div class="list">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>年齢</th>
            <th>登録日時</th>
            <th>アクション</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($dogs)): ?>
            <?php foreach($dogs as $dog): ?>
              <tr>
                <td><?php echo $dog['id'] ?></td>
                <td><?php echo $dog['name'] ?></td>
                <td><?php echo $dog['age'] ?></td>
                <td><?php echo $dog['created_at'] ?></td>
                <td>
                  <div class="action">
                    <form action="edit.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $dog['id'] ?>">
                      <input class="action-btn" type="submit" value="編集🐾">
                    </form>
                    <form action="edit.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $dog['id'] ?>">
                      <input class="action-btn" type="submit" value="編集🐾">
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <p>登録されたワンちゃんはいません🐶</p>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="menu-list">
      <a class="link-btn" href='index.php'>戻る🐶</a>
    </div>

  </div>

</body>
</html>
