<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>super dog</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="container">

    <!-- 親要素1 -->
    <div class="parent">
      <?php
        $items = range('A', 'F'); // セミコロン忘れない
        foreach ($items as $item) {
          echo "<div class='child'>{$item}</div>";
        }
      ?>
    </div>
    
    <!-- 親要素2 -->
    <div class="parent">
      <?php
        $items = range('1', '6'); // セミコロン忘れない
        foreach ($items as $item) {
          echo "<div class='child'>{$item}</div>";
        }
      ?>
    </div>

  </div>

</body>
</html>
