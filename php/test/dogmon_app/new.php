<?php
// new.php 新規作成

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title></title>
</head>

<body>

  <div class="new">
    <h2>dogmon作成画面🐶</h2>

    <div class="new_form">
      <form action="create.php" method="post">
        <label for="name">名前を入力してね🐶: </label>
        <input id="name" type="text" name="name" placeholder="例: じょん">
        <br>
        <label for="type">タイプを選んでね🐶: </label>
        <select id="type" name="type">
          <option value="fire">炎🔥</option>
          <option value="water">水💧</option>
          <option value="leaf">草🌿</option>
        </select>
        <br>
        <input type="submit" value="作成🐶">
      </form>
    </div>
  </div>

</body>

</html>
