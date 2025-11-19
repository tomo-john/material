<?php
// create.php 登録処理
session_start();

$todo = htmlspecialchars($_POST['todo'] ?? '', ENT_QUOTES, 'UTF-8');

if (empty($todo)) {
  $_SESSION['errors'] = '未入力です🐶💦';
  header('Location:new.php');
  exit;
}

var_dump($_POST);
var_dump($todo);

?>

