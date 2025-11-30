<?php
// delete.php
require_once 'DogDiary.php'; 
session_start();

$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
if (empty($title) || empty($title)) {
  exit('不正なアクセスです🐶💦');
}

// データ削除
DogDiary::deleteDiary($title, $date);

$notices = ['タイトル: 「' . $title . '」 の日記を削除しました🐰'];
$_SESSION['notices'] = $notices;
header('Location:list.php');
exit;
