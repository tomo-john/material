<?php
// index.php
session_start();

// エラーチェック
$errors = [];
$old_input = [];
if (!empty($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  $old_input = $_SESSION['old_input'] ?? [];
  unset($_SESSION['errors']);
  unset($_SESSION['old_input']);
}

// メッセージ取得
$notices = [];
if (!empty($_SESSION['notices'])) {
  $notices = $_SESSION['notices'];
  unset($_SESSION['notices']);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>Dog_App🐶</title>
</head>
<body>
  <h2>Dog_App🐶</h2>

  <?php if (!empty($errors)): ?>
    <div class="errors">
      <ul>
        <?php foreach($errors as $error): ?>
          <li><?= $error ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif;?>

  <?php if (!empty($notices)): ?>
    <div class="notices">
      <ul>
        <?php foreach($notices as $error): ?>
          <li><?= $error ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif;?>

  <form action="confirm.php" method="post">
    <label for="dog_name">犬の名前:</label>
    <input id="dog_name" type="text" name="dog_name" placeholder="じょん" value="<?php echo htmlspecialchars($old_input['dog_name'] ?? '') ?>">
    <br>
    <label for="dog_point">今日のポイント:</label>
    <input id="dog_point" type="number" name="dog_point" placeholder="10" value="<?php echo htmlspecialchars($old_input['dog_point'] ?? '') ?>">
    <br><br>
    <input type="submit" value="追加🐶">
  </form>

  <hr><br>

  <form action="list.php" method="post">
    <input type="hidden" name="flg" value="list">
    <input type="submit" value="登録済わんちゃん一覧🐶">
  </form>

  <br>

  <form action="reset.php" method="post">
    <input type="hidden" name="flg" value="reset">
    <input type="submit" value="リセット">
  </form>

</body>
</html>
