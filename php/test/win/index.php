<?php
$data = $_POST['data'] ?? '';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <style>
    body {background-color: #eedcb3; }
  </style>

  <script>
    console.log("This is test page.");
  </script>
  <title>test</title>
</head>
<body>
  <h2>winテスト</h2>

  <form action="" method="post">
  <label>Please input🐶:<label><br>
  <input type="text" name="data" placeholder="例: じょん"><br><br>
  <input type="submit" value="ボタン1"><br><br>
  <input type="button" value="ボタン2"><br><br>

  <hr>

  <h3>POSTデータ</h3>
  <label>入力されたデータ: </label>
  <?php if (!empty($data)): ?>
    <?php echo $data; ?>
  <?php endif; ?>
</body>
</html>
