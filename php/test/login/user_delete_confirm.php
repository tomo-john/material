<?php // user_delete_confirm.php
require_once 'DbManager.php';
require_once 'UserRepository.php';
session_start();

$user_id = $_POST['user_id'] ?? '';
if (empty($user_id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: table_view.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);
$user_data = $user_repo->findById(intval($user_id));
$display_user_name = htmlspecialchars($user_data['name'], ENT_QUOTES, 'UTF-8');

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>TEST</title>
</head>
<body>

  <div class="main">
    
    <h2>DELETE CONFIRM</h2>

    <p>本当に削除してよろしいですか？</p>
    <p><?php echo '削除するユーザー名: 「'. $display_user_name . '」' ?></p>

    <form action="user_delete.php" method="post">
      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
      <input class="btn delete-btn" type="submit" value="削除">
    </form>
    

  </div>

  <div class="menu">
    <a class="btn link-btn" href="table_view.php">戻る</a>
  </div>

</body>
</html>
