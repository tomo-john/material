<?php
// POSTで受け取ったデータを処理
// print_r($_POST); //確認用

// データはhtmlspecialcharsで安全に受け取る
$name = htmlspecialchars($_POST['name']);
$dog_type = htmlspecialchars($_POST['dog_type']);
$errors = [];

if (empty($name)) {
  $errors[] = '名前を入力して下さい🐶💦';
}

if (empty($dog_type)) {
  $errors[] = '好きな犬種をを入力して下さい🐶💦';
}

if (!empty($errors)) {
  foreach ($errors as $e) {
    echo "{$e}</br>";
  }
} else {
  echo "{$name}さんの好きな犬種は{$dog_type}です🐶\n";
}
