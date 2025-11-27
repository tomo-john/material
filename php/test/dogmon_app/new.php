<?php
// new.php 新規作成
session_start();

// エラーチェック
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// メッセージ有無
$notices = $_SESSION['notices'] ?? [];
unset($_SESSION['notices']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title>作成画面</title>
</head>

<body>

  <div class="new">
    <h2>dogmon作成画面🐶</h2>

    <div class="errors">
      <?php if(!empty($errors)): ?>
        <ul>
          <li>エラー:</li>
          <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="notices">
      <?php if(!empty($notices)): ?>
        <ul>
          <li>メッセージ:</li>
          <?php foreach($notices as $notice): ?>
            <li><?=$notice ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="new_form">
      <form action="create.php" method="post">
        <label for="name">名前を入力してね🐶: </label>
        <input id="name" type="text" name="name" placeholder="例: じょん">
        <br>
        <label for="type">タイプを選んでね🐶: </label>
        <select id="type" name="type">
          <option value="normal">ノーマル🐶</option>
          <option value="fire">炎🔥</option>
          <option value="water">水💧</option>
          <option value="leaf">草🌿</option>
          <option value="fight">格闘🐰</option>
        </select>
        <br>
        <small class="form_note">※タイプは後から変更できないよ🐶</small>
        <br>
        <input type="submit" value="作成🐶">
      </form>
    </div>
  </div>

  <div class="back_btn">
    <a class="btn" href="index.php">戻る</a>
  </div>

</body>
</html>
