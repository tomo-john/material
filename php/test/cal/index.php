<?php
session_start();

$errors = [];
$old_num_1 = '';
$old_num_2 = '';
$num_1 = '';
$num_2 = '';
$result = '';

if (isset($_SESSION['errors'])) {
  $errors[] = $_SESSION['errors'];
  $old_num_1 = $_SESSION['old_num_1'];
  $old_num_2 = $_SESSION['old_num_2'];
  unset($_SESSION['errors']);
  unset($_SESSION['old_num_1']);
  unset($_SESSION['old_num_2']);
}

if (isset($_SESSION['data'])) {
  $num_1  = $_SESSION['data'][0];
  $op     = $_SESSION['data'][1];
  $num_2  = $_SESSION['data'][2];
  $result = $_SESSION['data'][3];
  unset($_SESSION['data']);
}

var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel=stylesheet href="style.css">
  <title>🐾電卓app🐾</title>
</head>
<body>
  <h2>🐾電卓app🐾</h2>

  <?php if(!empty($errors)): ?>
    <?php foreach ($errors as $e): ?>
      <ul class="error-list"><li><?= $e ?></li></ul>
    <?php endforeach ?>
  <?php endif; ?>

  <form class="cal" action="check.php" method="post">
    <label for="input_1">数値を入力してね🐶:</label><br>
    <input id="input_1" type="number" name="num_1" placeholder="例: 2" value="<?php echo $old_num_1 ?>">
    <select name="op">
      <option value="+">➕</option>
      <option value="-">➖</option>
      <option value="*">✖️</option>
      <option value="/">➗</option>
    </select>
    <label for="input_2"></label>
    <input id="input_2" type="number" name="num_2" placeholder="例: 8" value="<?php echo $old_num_2 ?>">
    <input type="submit" value="計算する🐶">
  </form>

  <br><hr>

  <h2>結果表示エリア</h2>

  <?php if (!empty($result)): ?>
    <div class="result">
      <p><?php echo '計算内容: ' . $num_1 . ' ' . $op . ' ' . $num_2; ?></p>
      <p><?php echo '計算結果: ' . $result; ?></p>
    </div>
  <?php endif; ?>
  
</body>
</html>
