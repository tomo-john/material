<?php
$name = $_POST["name"]; // フォームから受け取る

if (empty($name)) {
  echo "名前を入力して下さい🐶";
  echo '<a href="validation.php">戻る</a>';
} else {
  echo "こんにちは、" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "さん🐶</br>";
  echo '<a href="validation.php">戻る</a>';
}
