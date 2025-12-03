<?php
// table.php
$num = $_POST['num'] ?? '';
$max = 10;

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
    
    <div class="input">
      <form method="post">
        <label for="num">数値を選んでね🐶:</label>
        <select id="num" name="num">
          <?php for($i = 1; $i <= $max; $i++): ?>
            <option value="<?=$i ?>"><?php echo $i ?></option>
          <?php endfor; ?>
        </select>
        <input type="submit" value="テーブル作成🐶">
      </form>
    </div>

    <div class="table">
      <?php if(!empty($num)): ?>
        <table>
          <thead>
            <tr>
              <th>id</th>
              <th>name</th>
              <th>power</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i = 1; $i <= intval($num); $i++): ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo 'じょん' . $i; ?></td>
                <td><?php echo $i * $i; ?></td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>

    <a class="btn" href="index.php">戻る🐶</a>

  </div>

</body>
</html>
