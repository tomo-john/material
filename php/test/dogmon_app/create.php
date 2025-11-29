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

// 名前重複チェック
$file_name = 'dogmons.json';
if (file_exists($file_name) && !empty($file_name)) {
  $dogmons = json_decode(file_get_contents($file_name), true);
} else {
  $dogmons = [];
}

$uniq_flg = true;
if (!empty($dogmons)) {
  foreach ($dogmons as $d) {
    if ($d['name'] == $name) {
      $uniq_flg = false;
      break;
    }
  }
}
if (!$uniq_flg) {
  $errors[] = $name . 'はすでに存在しています🐶💦';
}

// エラーがあれば戻る
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  header('Location:new.php');
  exit;
}

// 作成(配列 => JSONファイル)
$new_dogmon = new Dogmon($name, $type);
$dogmons[] = $new_dogmon;

file_put_contents($file_name, json_encode($dogmons, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// 完了メッセージ&リダイレクト
$notices = ['新しいdogmonが作成されました！🐶'];
$notices[] = '名前: ' . $new_dogmon->getName() . ' / タイプ: ' . $new_dogmon->getType_view();
$notices[] = '大事に育ててね🐶';
$_SESSION['notices'] = $notices;
header('Location:new.php');
exit;

