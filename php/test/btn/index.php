<?php
// index.php
$getId = 10;
$postId = 20;
?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link ref="stylesheet" href="style.css">
  <title>Button</title>
</head>
<body>
  
  <div class="content">

    <h2>ボタン🐶</h2>
    
    <a href="receive.php">リンク</a>
    <a href="receive.php?id=<?php echo $getId ?>">GET</a>
    <form action="receive.php" method="post">
      <input type="hidden" name="id" value="<?php echo $postId ?>">
      <input type="submit" value="POST">
    </form>

  </div>

</body>
</html>
