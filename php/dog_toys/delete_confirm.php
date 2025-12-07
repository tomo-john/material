<?php

/** delete_confirm.php
 *  削除確認画面
 */

require_once 'DbManager.php';
require_once 'DogToysRepository.php';

$id = $_POST['id'] ?? '';
if (empty($id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: list.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$dog_toy_data = $dog_toy_repo->findById(intval($id));

$display_name = htmlspecialchars($dog_toy_data['name'], ENT_QUOTES, 'UTF-8');
$display_price = htmlspecialchars($dog_toy_data['price'], ENT_QUOTES, 'UTF-8');

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

    <p>本当に削除してよろしいですか？</p>

    <p><?php echo '削除するおもおちゃ: ' . $display_name . '(' . $display_price . '円)'?>

    <form action ="delete.php" method="post">
      <input name="id" type="hidden" value="<?php echo $id?>">
      <input class="btn submit-btn" type="submit" value="削除">
    </form>

  <div class="menu">
    <a class="btn link-btn" href="list.php">戻る</a>
  </div>

</body>
</html>
