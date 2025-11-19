<?php
// create.php 登録処理
session_start();

$todo = htmlspecialchars($_POST['todo'] ?? '', ENT_QUOTES, 'UTF-8');

// 未入力チェック
if (empty($todo)) {
  $_SESSION['errors'] = '未入力です🐶💦';
  header('Location:new.php');
  exit;
}

// 登録処理
$dir_name = "storage";
if (!is_dir($dir_name)) {
  mkdir($dir_name, 0777, true);
}

?>

