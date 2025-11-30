<?php
// update.php 更新処理
require_once 'DogDiary.php'; 
session_start();

$new_title = $_POST['title'] ?? '';
$new_content = $_POST['content'] ?? '';
$target_diary = $_SESSION['target_diary'] ?? '';
unset($_SESSION['target_diary']);

$errors = [];
if (empty($new_title)) {
  $errors[] = 'タイトルが未入力です';
}
if (empty($new_content)) {
  $errors[] = '本文が未入力です';
}
if (empty($target_diary)) {
  $errors[] = '予期せぬトラブル発生';
}
if (!empty($errors)) {
  $errors[] = 'タイトル: 「' . $target_diary['title'] . '」の更新処理に失敗しました🐶💦';
  $_SESSION['errors'] = $errors;
  header('Location:list.php');
  exit;
}

// 元のデータを削除
DogDiary::deleteDiary($target_diary['title'], $target_diary['date']);

// 親データの追加
$new_data = [new DogDiary($new_title, $new_content)];
DogDiary::addDiary($new_data);

$notices = ['更新が完了しました🐶'];
$notices[] = 'タイトル: ' . $new_title;
$_SESSION['notices'] = $notices;
header('Location:list.php');
exit;
