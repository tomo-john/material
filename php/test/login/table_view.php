<?php // table_view.php
require_once 'Session.php';
require_once 'DbManager.php';
require_once 'UserRepository.php';

$session_data = Session::getAndUnsetSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);
$users = $user_repo->getUsers();

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>TEST</title>
</head>
<body>

  <div class="main">
    
    <h2>TABLE VIEW</h2>

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

    <?php if(empty($users)): ?>
      <p>登録されたユーザーはいません</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>USER_NAME</th>
            <th>CREATED_AT</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user): ?>
            <tr>
              <td><?php echo htmlspecialchars($user['id']) ?></td>
              <td><?php echo htmlspecialchars($user['name']) ?></td>
              <td><?php echo htmlspecialchars($user['created_at']) ?></td>
              <td>
                <div class="action">
                  <a class="btn action-btn" href="<?php echo htmlspecialchars("user_edit.php?id={$user['id']}") ?>">編集</a>
                  <form action="user_delete.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
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
    <a class="btn link-btn" href="test.php">戻る</a>
  </div>

</body>
</html>
