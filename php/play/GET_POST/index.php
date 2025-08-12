<?php
// リクエストデータを取得
$name_get = $_GET['name'] ?? '';
$name_post = $_POST['name'] ?? '';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>GETとPOSTデモ</title>
</head>
<body>
<h1>🐶 GETとPOSTのデモ</h1>

<!-- GETフォーム -->
<h2>GETフォーム</h2>
<form method="get" action="">
  名前: <input type="text" name="name">
  <button type="submit">送信(GET)</button>
</form>
<p>GETで受け取った名前: <strong><?php echo htmlspecialchars($name_get); ?></strong></p>

<hr>

<!-- POSTフォーム -->
<h2>POSTフォーム</h2>
<form method="post" action="">
  名前: <input type="text" name="name">
  <button type="submit">送信(POST)</button>
</form>
<p>POSTで受け取った名前: <strong><?php echo htmlspecialchars($name_post); ?></strong></p>

</body>
</html>
