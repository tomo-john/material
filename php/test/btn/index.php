<?php
// index.php
$getId = 10;
$postId = 20;
?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Button</title>
</head>
<body>
  
  <div class="container">

    <h2>INDEX</h2>

    <h3>🐶ボタン🐶</h3>
    
    <a class="btn" href="receive.php">リンク</a>
    <a class="btn" href="receive.php?id=<?php echo $getId ?>">GET</a>
    <form action="receive.php" method="post">
      <input type="hidden" name="id" value="<?php echo $postId ?>">
      <input class="btn" type="submit" value="POST">
    </form>

  </div>

</body>
</html>
