<?php
// main.php メイン処理
session_start();
require_once 'dog.php';

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
$current_dog = '';
foreach ($_SESSION['dogs'] as $dog) {
  if ($dog->getName() === $dog_name) {
    $current_dog = $dog;
    break;
  }
}

// いなければ新規作成
if ($current_dog === '') {
  $current_dog = new DogPointCard($dog_name);

  // セッションデータに追加
  $_SESSION['dogs'][] = $current_dog;
}

// ポイント加算
$current_dog->addPoint($dog_point);

// 確認
var_dump($_SESSION['dogs']);

