<?php
// new.php
session_start();

$notices = [];
if (!empty($_SESSION['notices'])) {
  $notices = $_SESSION['notices'];
  unset($_SESSION['notices']);
}

$errors = [];
if (!empty($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
}

$old_input = [];
if (!empty($_SESSION['old_input'])) {
  $old_input = $_SESSION['old_input'];
  unset($_SESSION['old_input']);
}

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

    <h3>NEW</h3>

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

    <div class="form">
      <form action="create.php" method="post">
        <label for="name">名前: </label>
        <input id="name" name="name" type="text" placeholder="犬の名前を入力してね🐾" value="<?php echo htmlspecialchars($old_input['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <label for="age">年齢: </label>
        <input id="age" name="age" type="number" placeholder="犬の年齢を入力してね🐾" value="<?php echo htmlspecialchars($old_input['age'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <div class="submit-container">
          <input class="link-btn submit-btn" type="submit" value="登録🐶">
        </div>
      </form>
    </div>
    <div class="menu-list">
      <a class="link-btn" href='list.php'>一覧画面へ🐶</a>
      <a class="link-btn" href='index.php'>戻る🐶</a>
    </div>

  </div>

</body>
</html>
