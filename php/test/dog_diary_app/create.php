<?php
// create.php 作成処理
session_start();

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

$errors = [];
if (empty($title)) {
  $errors[] = 'タイトルが未入力です';
}
if (empty($content)) {
  $errors[] = '本文が未入力です';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  header('Location:index.php');
  exit;
}
