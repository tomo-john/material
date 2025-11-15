<?php
$name = $_POST['name'] ?? '';
?>

<!DOCTYPE html>
<html lang="js">
<head>
  <meta charset="UTF-8">
  <link ref="stylesheet" href="style.css">
  <title>john app🐶</title>
</head>
<body>
  <h2>mac book 検証用🐶</h2>

  <form action="index.php" method="post">
    <label>input your name🐶:</label><br>
    <input type="text" name="name" placeholder="例: じょん">
    <input type="submit" value="go🐶"><br>
  </form>
  <hr>
  <?php if (!empty($name)): ?>
    <?php echo $name; ?>
  <?php endif; ?>
</body>
</html>
