<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>super dog</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- 親要素1 -->
  <div class="parent">
    <?php
      $items = ['A', 'B', 'C', 'D']; // セミコロン忘れない
      foreach ($items as $item) {
        echo "<div class='child'>{$item}</div>";
      }
    ?>
  </div>
  
</body>
</html>
