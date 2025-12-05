<?php // user_edit.php
require_once 'Session.php';
require_once 'DbManager.php';
require_once 'UserRepository.php';
session_start();

$user_id = $_GET['id'] ?? '';
if (empty($user_id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: table_view.php');
  exit;
}

$session_data = Session::getAndUnsetSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];
$old_input = $session_data['old_input'];

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);
$user_data = $user_repo->findById(intval($user_id));

if (!$user_data) {
  $_SESSION['errors'] = ['ユーザーが見つかりませんでした'];
  header('Location: table_view.php');
  exit;
}

$display_user_name = $old_input['user_name'] ?? $user_data['name']

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>TEST</title>
</head>
<body>

  <div class="main">
    
    <h2>ユーザー編集</h2>
    
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

    <form class="form" action="user_update.php" method="post">
      <input name="user_id" type="hidden" value="<?php echo $user_id ?>">
      <label for="user_name">Username:</label>
      <input id="user_name" name="user_name" type="text" placeholder="john" value="<?php echo htmlspecialchars($old_input['user_name'] ?? $display_user_name, ENT_QUOTES, 'UTF-8') ?>">
      <label for="password">Password:</label>
      <input id="password" name="password" type="password" placeholder="john1234">
      <div class="submit-wrapper">
        <input class="btn submit-btn" type="submit" value="登録">
      </div>
    </form>

  </div>

  <div class="menu">
    <a class="btn link-btn" href="index.php">戻る</a>
  </div>

</body>
</html>
