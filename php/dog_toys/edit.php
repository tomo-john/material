<?php

/** edit.php
 *  編集画面
 */

require_once 'DbManager.php';
require_once 'DogToysRepository.php';
require_once 'Session.php';

$session_data = Session::getAndUnsetSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];
$old_input = $session_data['old_input'];

$id = $_GET['id'] ?? '';
if (empty($id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: list.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$dog_toy_data = $dog_toy_repo->findById(intval($id));

$display_name = htmlspecialchars($old_input['name'] ?? $dog_toy_data['name'], ENT_QUOTES, 'UTF-8');
$display_price = htmlspecialchars($old_input['price'] ?? $dog_toy_data['price'], ENT_QUOTES, 'UTF-8');

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>DOG TOYS</title>
</head>
<body>

  <div class="main">
    
    <h2>編集画面</h2>

    <p>おもちゃの名前と価格を編集して下さい</p>

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
          <?php foreach($errors as $error): ?>
            <?php foreach($error as $e): ?>
              <li><?=$e ?></li>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form class="form" action="update.php" method="post">
      <input name="id" type="hidden" value="<?php echo $id ?>">
      <label for="name">おもちゃ名:</label>
      <input id="name" name="name" type="text" placeholder="例: ボール" value="<?php echo $display_name ?>">
      <label for="price">価格:</label>
      <input id="price" name="price" type="number" placeholder="100" value="<?php echo $display_price ?>">
      <div class="submit-wrapper">
        <input class="btn submit-btn" type="submit" value="更新">
      </div>
    </form>

  <div class="menu">
    <a class="btn link-btn" href="list.php">戻る</a>
  </div>

</body>
</html>
