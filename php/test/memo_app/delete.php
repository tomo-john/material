<?php
session_start();

$notice = [];
$error = [];

$file_name = basename($_POST['file']);
$destination = 'storage/' . $file_name;

if (unlink($destination)) {
  $notice[] = $file_name . 'を削除しました🐶';
  $_SESSION['notices'] = $notice;
} else {
  $error[] = $file_name . 'の削除に失敗しました🐶💦';
  $_SESSION['errors'] = $error;
};

header('Location:index.php');
