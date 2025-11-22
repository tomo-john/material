<?php
$get_data = 'じょんゲット';
$post_data = 'じょんポスト';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>GETとPOST🐶(JS)</title>
  <script src="script.js"></script>
</head>
<body>

  <!-- GETフォーム -->
  <h3>GETフォーム🐶</h3>
  <button id="get_btn" onclick="goGet('<?php echo $get_data ?>')">GO GET!</button>

  <hr>

  <!-- POSTフォーム -->
  <h3>POSTフォーム🐶</h3>
  <button id="post_bet" onclick="goPost('<?php echo $post_data?>')">GO POST!!</button>
  <form id="hidden_form" action="receive.php" method="post">
    <input id="hidden_data" type="hidden" name="data">
  </form>

  <hr>

</body>
</html>
