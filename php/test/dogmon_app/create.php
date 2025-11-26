<?php
// create.php 作成処理
require_once 'Dogmon.php';
session_start();

$name = htmlspecialchars($_POST['name'] ?? '');
$type = $_POST['type'] ?? '';

// 未入力チェック
$errors = [];
if (empty($name)) {
  $errors[] = '名前を入力して下さい🐶💦';
}
if (empty($type)) {
  $errors[] = '不正なアクセスです🐶💦';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  header('Location:new.php');
  exit;
}

// 作成
if (empty($_SESSION['dogmon'])) {
  $_SESSION['dogmon'] = [];
}

$new_dogmon = new Dogmon($name, $type);
$_SESSION['dogmon'][] = $new_dogmon;

// 完了メッセージ&リダイレクト
$notices = [];
$notices[] = '新しいdogmonが作成されました！🐶';
$notices[] = '名前: ' . $new_dogmon->getName() . ' / タイプ: ' . $new_dogmon->getType();
$notices[] = '大事に育ててね🐶';
$_SESSION['notices'] = $notices;
header('Location:new.php');
exit;

