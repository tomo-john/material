<?php
// update.php
require_once 'DogRepository.php';
session_start();

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';
$notices = [];
$errors = [];

if (empty($id)) {
  die('不正なアクセスです🐶💦');
}
if (empty($name)) {
  $errors[] = '名前が未入力です🐶💦';
}
if (empty($age)) {
  $errors[] = '年齢が未入力です🐶💦';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  header("Location:edit.php?id={$id}");
  exit;
}

// 更新処理
$dogrepo = new DogRepository();
$result = $dogrepo->updateDog(intval($id), $name, intval($age));

if ($result) {
  $notices[] = '更新処理が完了しました🐶✨';
  $notices[] = '登録されたワンちゃん: ' . $name . '(' . $age . '才)';
  $_SESSION['notices'] = $notices;
  header('Location:list.php');
  exit;
} else {
  die('エラー: 更新処理に失敗しました🐶💦');
}
