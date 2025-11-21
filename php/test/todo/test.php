<?php?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>test page</title>
</head>
<body>
  <!-- テーブルサンプル-->
  <h3>テーブルサンプル</h3>
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>job</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>1</td>
        <td>john</td>
        <td>dog</td>
      </tr>
      <tr>
        <td>2</td>
        <td>pyon</td>
        <td>rabbit</td>
      </tr>
      <tr>
        <td>3</td>
        <td>moco</td>
        <td>bear</td>
      </tr>
    </tbody>
  </table>

  <hr>

  <!-- JS検証-->
  <h3>JS検証</h3>
  <?php $id = 1; ?>
  <p>犬派ですか？🐶</p>
  <button onclick="checkAnswer(<?php echo $id?>)">回答する</button>
  <form id="check-form" action="test_js.php" method="post">
    <input id="hidden-id" type="hidden" name="id">
    <input id="hidden-answer" type="hidden" name="answer">
  </form>
  <hr>

  <!-- 戻るボタン -->
  <div class="back"><a href="index.php">🐾戻る🐾</a></div>

</body>
</html>
