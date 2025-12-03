<?php
// table.php
$num = $_POST['num'] ?? '';
var_dump($num);

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Table</title>
</head>
<body>
  
  <div class="container">

    <h2>TABLE</h2>

    <h3>🐶テーブル🐶</h3>
    
    <form method="post">
      <label for="num">数値を選んでね🐶:</label>
      <select id="num" name="num">
        <?php for($i=1; $i<=5; $i++ ): ?>
          <option value="<?=$i ?>"><?php echo $i ?></option>
        <?php endfor; ?>
      </select>
      <input type="submit" value="作成🐶">
    </form>

    <a class="btn" href="index.php">戻る🐶</a>

  </div>

</body>
</html>
