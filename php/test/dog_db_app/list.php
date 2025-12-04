<?php
// list.php
require_once 'DogRepository.php';
require_once 'Session.php';

$session_data = Session::getAndClearSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];
$old_input = $session_data['old_input'];

// データ取得
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
                <td><?php echo htmlspecialchars($dog['id']) ?></td>
                <td><?php echo htmlspecialchars($dog['name']) ?></td>
                <td><?php echo htmlspecialchars($dog['age']) ?></td>
                <td><?php echo htmlspecialchars($dog['created_at']) ?></td>
                <td>
                  <div class="action">
                    <a class="action-btn" href="<?php echo htmlspecialchars("edit.php?id={$dog['id']}") ?>">編集🐾<a>
                    <form action="delete_confirm.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $dog['id'] ?>">
                      <input class="action-btn" type="submit" value="削除🐾">
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
      <a class="link-btn" href='new.php'>作成画面へ🐶</a>
      <a class="link-btn" href='index.php'>戻る🐶</a>
    </div>

  </div>

</body>
</html>
