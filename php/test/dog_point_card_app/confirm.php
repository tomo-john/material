<?php
// confirm.php 入力チェック
session_start();
require_once 'dog.php';

// 未入力チェック

// データ取得
if (!empty($_POST)) {
  $dog_name = $_POST['dog_name'] ?? '';
  $dog_point = intval($_POST['dog_point'] ?? '');
}

// 未入力チェック
$errors = [];
if (empty($dog_name)) {
  $errors[] = 'わんちゃんの名前が未入力です🐶💦';
}

if (empty($dog_point)) {
  $errors[] = 'ポイントが未入力です🐶💦(1ポイント以上を入力して下さい🐶💡)';
}

if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_input'] = [
    'dog_name' => $dog_name,
    'dog_point' => $dog_point
  ];
  header('Location:index.php');
  exit;
}

// インスタンス生成
$dog = new DogPointCard($dog_name);

// ポイント加算
$dog->addPoint($dog_point);

// 確認
echo $dog->getInfo();

?>
