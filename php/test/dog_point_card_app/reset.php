<?php
// reset.php データリセット

// $_SESSION['dogs']をクリアする
session_start();

$flg = $_POST['flg'];

if ($flg !== 'reset') {
  $_SESSION['errors'] = ['不正なアクセスです🐶💦'];
  header('Location:index.php');
  exit;
}

unset($_SESSION['dogs']);

$_SESSION['notices'] = ['データをリセットしました🐶'];
header('Location:index.php');
exit;

