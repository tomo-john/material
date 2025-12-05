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

    <?php if(empty($users)): ?>
      <p>登録されたユーザーはいません</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>USER_NAME</th>
            <th>CREATED_AT</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user): ?>
            <tr>
              <td><?php echo $user['id'] ?></td>
              <td><?php echo $user['name'] ?></td>
              <td><?php echo $user['created_at'] ?></td>
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
