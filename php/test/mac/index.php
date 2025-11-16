<?php
$name = $_POST['name'] ?? '';
$times = $_POST['times'] ?? '';

if (!is_numeric($times)) {
  $times = 1;
}
?>

<!DOCTYPE html>
<html lang="js">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>john app🐶</title>
</head>
<body>
  <h2>mac book 検証用🐶</h2>

  <form action="index.php" method="post">
    <label>input your name🐶:</label><br>
    <input type="text" name="name" placeholder="例: じょん"><br><br>
    <label>input times🐶:</label><br>
    <input type="text" name="times" placeholder="例: 10"><br><br>
    <input type="submit" value="go🐶"><br>
  </form>
  <hr>
  <?php if (!empty($name)): ?>
    <?php for ($i = 1; $i <= $times; $i++): ?>
      <ul><li><?php echo $name; ?></li></ul>
    <?php endfor; ?>
  <?php endif; ?>
</body>
</html>
