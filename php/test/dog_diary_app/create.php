<?php
// create.php 作成処理
require_once 'DogDiary.php'; 
session_start();

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$old_input = [];
$old_input['title'] = $title;
$old_input['content'] = $content;

$errors = [];
if (empty($title)) {
  $errors[] = 'タイトルが未入力です';
}
if (empty($content)) {
  $errors[] = '本文が未入力です';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_input'] = $old_input;
  header('Location:index.php');
  exit;
}

$diary = new DogDiary($title, $content);
DogDiary::addDiary($diary);

$notices = ['作成が完了しました🐶'];
$notices[] = 'タイトル: ' . $title;
$_SESSION['notices'] = $notices;
header('Location:index.php');
exit;
