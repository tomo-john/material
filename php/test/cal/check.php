<?php
session_start();

$num_1 = htmlspecialchars($_POST['num_1'] ?? '', ENT_QUOTES, "UTF-8");
$num_2 = htmlspecialchars($_POST['num_2'] ?? '', ENT_QUOTES, "UTF-8");
$op = htmlspecialchars($_POST['op'] ?? '', ENT_QUOTES, "UTF-8");

// 未入力チェック
if ($num_1 ==='' || $num_2 === '') {
  $_SESSION['errors'] = '未入力があります🐶💦';
  $_SESSION['old_num_1'] = $num_1;
  $_SESSION['old_num_2'] = $num_2;
  header('Location:index.php');
  exit;
}

// 数値チェック
if (!is_numeric($num_1) || !is_numeric($num_2)) {
  $_SESSION['errors'] = '数値以外が入力されています🐶💦';
  $_SESSION['old_num_1'] = $num_1;
  $_SESSION['old_num_2'] = $num_2;
  header('Location:index.php');
  exit;
} else {
  // 数値化
  $num_1 = (float)($num_1);
  $num_2 = (float)($num_2);
}

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
    $result = $num_1 * $num_2;
    break;
  case '/':
    $result = $num_1 / $num_2;
    break;
}

$_SESSION['result'] = $result;

header('Location:index.php');
exit;

