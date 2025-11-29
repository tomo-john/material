<?php
// update_name.php 名前更新処理
require_once 'Dogmon.php';
session_start();

$new_name = htmlspecialchars($_POST['name'] ?? '');
$old_name = htmlspecialchars($_POST['old_name'] ?? '');

// 未入力チェック
$errors = [];
if (empty($new_name)) {
  $errors[] = '名前を入力して下さい🐶💦';
}

// 変更前のdogmonリスト取得
$file_name = 'dogmons.json';
if (file_exists($file_name)) {
  $old_dogmons_json = json_decode(file_get_contents($file_name), true);
} else {
  exit('更新エラー🐶💦');
}

// 名前重複チェック
$uniq_flg = true;
foreach ($old_dogmons_json as $d) {
  if ($d['name'] == $new_name) {
    $uniq_flg = false;
    break;
  }
}
if (!$uniq_flg) {
  $errors[] = $new_name . 'はすでに存在しています🐶💦';
}

// エラーがあればもどる
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_name'] = $old_name;
  header('Location:rename.php');
  exit;
}

// 変更するデータを除外
$new_dogmons_json = [];
foreach ($old_dogmons_json as $old_dogmon) {
  if ($old_dogmon['name'] != $old_name) {
    $new_dogmons_json[] = $old_dogmon;
  }
}

// 変更するデータだけ取り出し
$current_old_dogmon = [];
foreach ($old_dogmons_json as $old_dogmon) {
  if ($old_dogmon['name'] == $old_name) {
    $current_old_dogmon = $old_dogmon;
  }
}

// データ更新し、json前の配列に追加
$current_old_dogmon['name'] = $new_name;
$new_dogmons_json[] = $current_old_dogmon;

// jsonファイルへ書き込み
file_put_contents($file_name, json_encode($new_dogmons_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// 完了メッセージ&リダイレクト
$notices = ['新しい名前に変更しました！🐶'];
$notices[] = '新しい名前: ' . $new_name;
$notices[] = 'これからもよろしくね🐶';
$_SESSION['notices'] = $notices;
header('Location:list.php');
exit;

