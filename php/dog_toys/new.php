<?php

/** new.php
 *  新規作成画面
 */

require_once 'Session.php';

$session_data = Session::getAndUnsetSession();
$notices = $session_data['notices'];
$errors = $session_data['errors'];
$old_input = $session_data['old_input'];
$old_name = htmlspecialchars($old_input['name'] ?? '', ENT_QUOTES, 'UTF-8');
$old_price = htmlspecialchars($old_input['price'] ?? '', ENT_QUOTES, 'UTF-8');

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>DOG TOYS</title>
</head>
<body>

  <div class="main">
    
    <h2>NEW</h2>

    <p>おもちゃの名前と価格を入力して下さい</p>

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

    <form class="form" action="create.php" method="post">
      <label for="name">おもちゃ名:</label>
      <input id="name" name="name" type="text" placeholder="例: ボール" value="<?php echo htmlspecialchars($old_name) ?>">
      <label for="price">価格:</label>
      <input id="price" name="price" type="number" placeholder="100" value="<?php echo htmlspecialchars($old_price) ?>">
      <div class="submit-wrapper">
        <input class="btn submit-btn" type="submit" value="登録">
      </div>
    </form>

  <div class="menu">
    <a class="btn link-btn" href="index.php">戻る</a>
  </div>

</body>
</html>
