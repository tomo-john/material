<?php
// リクエストデータを取得
$name_get = $_GET['name'] ?? '';
$name_post = $_POST['name'] ?? '';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>GETとPOST🐶</title>
</head>
<body>
  <h2>GETとPOST🐶</h2>

  <!-- GETフォーム -->
  <h3>GETフォーム</h3>
  <form method="get" action="">
    <label>名前:</label>
    <input type="text" name="name">
    <button type="submit">送信(GET)</button>
  </form>

  <p>GETで受け取った名前: <?php echo htmlspecialchars($name_get); ?></p>

  <hr>

  <!-- POSTフォーム -->
  <h3>POSTフォーム</h3>
  <form method="post" action="">
    <label>名前:</label>
    <input type="text" name="name">
    <button type="submit">送信(POST)</button>
  </form>

  <p>POSTで受け取った名前: <?php echo htmlspecialchars($name_post); ?></p>

  <hr>

  <a href="next.php">next</a>

</body>
</html>
