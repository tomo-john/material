<?php
// receive.php
$getId = $_GET['id'] ?? '';
$postId = $_POST['id'] ?? '';

?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Receive</title>
</head>
<body>
  
  <div class="container">

    <h2>RECV</h2>

    <h3>🐶データ受け取り🐶</h3>

    <div class="result">
      <p><?php echo 'GETデータ:' . $getId;?></p>
      <p><?php echo 'POSTデータ:' . $postId;?></p>
      <?php if(empty($getId) && empty($postId)): ?>
        <p><?php echo '受け取ったデータはありません🐶'; ?></p>
      <?php endif;?>
    </div>
    
    <a class="btn" href="index.php">戻る🐶</a>

  </div>

</body>
</html>
