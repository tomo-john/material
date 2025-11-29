<?php
// index.php
session_start();

$erros = [];
$old_input = [];
if (!empty($_SESSION['errors'])) {
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
}
if (!empty($_SESSION['old_input'])) {
  $old_input = $_SESSION['old_input'];
  unset($_SESSION['old_input']);
}
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
  <title>🐶犬日記app🐶</title>
</head>
<body>
  
  <div class="main">
    <h2>🐶犬日記app🐶</h2>
    
    <div class="error">
      <?php if(!empty($errors)): ?>
        <ul>
          <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif;?>
    </div>

    <div class="notice">
      <?php if(!empty($notices)): ?>
        <ul>
          <?php foreach($notices as $notice): ?>
            <li><?=$notice ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif;?>
    </div>

    <form action="create.php" method="post">
      <label for="title">タイトル</label>
      <input id="title" type="text" name="title" placeholder="タイトルの入力" value="<?php echo htmlspecialchars($old_input['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
      <label for="content">内容</label>
      <textarea id="content" name="content" placeholder="本文書いてね🐾"><?php echo htmlspecialchars($old_input['content'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
      <input class="btn" type="submit" value="登録🐶">
      <a class="btn link-btn" href="list.php">一覧画面へ🐶</a>
    </form>
  </div>
</body>
</html>
