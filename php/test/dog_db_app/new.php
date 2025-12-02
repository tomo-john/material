<?php
// new.php
session_start();

$notices = [];
$errors = [];
if (!empty($_SESSION['notices'])) {
  $notices = $_SESSION['notices'];
  unset($_SESSION['notices']);
}
if (!empty($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
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

    <div class="form">
      <form action="" method="post">
        <label for="name">名前: </label>
        <input id="name" name="name" type="text" placeholder="犬の名前を入力してね🐾" value="">
        <label for="age">年齢: </label>
        <input id="age" name="age" type="text" placeholder="犬の年齢を入力してね🐾" value="">
        <input class="link-btn submit-btn" type="submit" value="登録🐶">
      </form>
    </div>
    <div class="menu-list">
      <a class="link-btn" href='index.php'>戻る🐶</a>
    </div>

  </div>

</body>
</html>
