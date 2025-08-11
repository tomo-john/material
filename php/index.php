<?php
$type = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $result = "あなたが選んだタイプは: " . htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>super dog</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <h2>てすと</h2>
  <div class="container">
    <div class="circle left"><span>A</span></div>
    <div class="circle right"><span>B</span></div>
  </div>
  
  <div class="select">
     <form action="" method="post">
      <label for="type">好きなタイプを選んでね🐶: </label>
      <select id="type" name="type">
        <option value = "a">AND</option>
        <option value = "b">OR</option>
        <option value = "c">XOR</option>
      </select>
      <input type="submit" value="わん!">
    </form>
  </div>

  <?php if ($result): ?>
    <P><?php echo $result; ?></p>
  <?php endif; ?>

</body>
</html>
