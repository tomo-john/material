<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>GETとPOSTの違い🐶</title>
</head>
<body>
  <h2>🐾 GETフォーム（URLにデータが表示される）</h2>
  <form action="form_test.php" method="get">
    <label>お名前（GET）: <input type="text" name="name_get"></label>
    <input type="submit" value="送信(GET)">
  </form>

  <h2>🐾 POSTフォーム（データはURLに表示されない）</h2>
  <form action="form_test.php" method="post">
    <label>お名前（POST）: <input type="text" name="name_post"></label>
    <input type="submit" value="送信(POST)">
  </form>

  <hr>

  <h3>📋 結果表示エリア</h3>
  <pre>
  <?php
  echo "【GETデータ】\n";
  print_r($_GET);

  echo "\n【POSTデータ】\n";
  print_r($_POST);
  ?>
  </pre>
</body>
</html>
