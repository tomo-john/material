<?php
session_start();

$num_1 = htmlspecialchars($_POST['num_1'] ?? '', ENT_QUOTES, "UTF-8");
$num_2 = htmlspecialchars($_POST['num_2'] ?? '', ENT_QUOTES, "UTF-8");
$op = htmlspecialchars($_POST['op'] ?? '', ENT_QUOTES, "UTF-8");

// 未入力チェック
if (empty($num_1) || empty($num_2)) {
  $_SESSION['errors'] = '未入力があります🐶💦';
  $_SESSION['old_num_1'] = $num_1;
  $_SESSION['old_num_2'] = $num_2;
  header('Location:index.php');
  exit;
}

// 数値チェック

// 計算処理
$result = '';
switch ($op) {
  case '+':
    $result = $num_1 + $num_2;
    break;
  case '-':
    $result = $num_1 - $num_2;
    break;
  case '*':
    $result = $num_1 - $num_2;
    break;
  case '/':
    $result = $num_1 / $num_2;
    break;
}

$_SESSION['resutl'] = $_resutl

header('Location:index.php');
exit;

