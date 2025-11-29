<?php
// levelup.php レベルアップ処理
require_once 'Dogmon.php';
session_start();

// データ受け取り
$name = $_POST['dogmon_name'] ?? '';
if (empty($name)) {
  exit('不正アクセス🐶💦');
}

// 変更前のdogmonリスト取得
$file_name = 'dogmons.json';
if (file_exists($file_name)) {
  $old_dogmons_json = json_decode(file_get_contents($file_name), true);
} else {
  exit('更新エラー🐶💦');
}

// 変更するデータを除外
$new_dogmons_json = [];
foreach ($old_dogmons_json as $old_dogmon) {
  if ($old_dogmon['name'] != $name) {
    $new_dogmons_json[] = $old_dogmon;
  }
}

// 変更するデータだけ取り出し
$current_old_dogmon = [];
foreach ($old_dogmons_json as $old_dogmon) {
  if ($old_dogmon['name'] == $name) {
    $current_old_dogmon = $old_dogmon;
  }
}

// 更新データでオブジェクト生成 => レベルアップ => データ追加
$new_dogmon = new Dogmon($current_old_dogmon['name'], $current_old_dogmon['type'], $current_old_dogmon['level']);
$new_dogmon->levelUp();
$new_dogmons_json[] = $new_dogmon;
file_put_contents($file_name, json_encode($new_dogmons_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// 完了メッセージ&リダイレクト
$notices = [$name . 'はレベルアップした！🐶'];
$notices[] = '現在のレベルは' . $new_dogmon->getLevel();
$notices[] = 'これからもよろしくね🐶';
$_SESSION['notices'] = $notices;
header('Location:list.php');
exit;

