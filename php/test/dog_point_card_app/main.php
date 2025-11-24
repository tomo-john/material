<?php // main.php メイン処理

// セッション前にクラス定義ファイルを読み込む
require_once 'dog.php'; 

// セッションスタート
session_start();

// データなしNG
if (empty($_SESSION['data'])) {
  $_SESSION['errors'] = ['不正なアクセスです🐶💦'];
  header('Location:index.php');
  exit;
}

// データ取得
$dog_name = $_SESSION['data']['dog_name'];
$dog_point = $_SESSION['data']['dog_point'];

// 今回は作成したインスタンスはセッションで保管
if (!isset($_SESSION['dogs'])) {
  $_SESSION['dogs'] = [];
}

// 既存のわんちゃんかチェック
$current_dog = null;
foreach ($_SESSION['dogs'] as $dog) {
  if ($dog->getName() === $dog_name) {
    $current_dog = $dog;
    break;
  }
}

// いなければ新規作成
if ($current_dog === null) {
  $current_dog = new DogPointCard($dog_name);

  // セッションデータに追加
  $_SESSION['dogs'][] = $current_dog;
}

// ポイント加算
$current_dog->addPoint($dog_point);

// index.phpへ戻る
$notices = [];
$notices[] = $current_dog->getName() . 'わんちゃんのポイントを追加しました🐶';
$notices[] = '追加したポイント: ' . $dog_point;
$notices[] = '現在の' . $current_dog->getName() . 'わんちゃんの合計ポイントは' . $current_dog->getPoint() . 'ポイントです🐶';
$_SESSION['notices'] = $notices;
header('Location:index.php');
exit;

