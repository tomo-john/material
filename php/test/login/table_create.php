<?php
require_once 'DbManager.php';
session_start();

$db = new DbManager();
$result = $db->createUsers();

if ($result === true) {
  $_SESSION['notices'] = ['Usersテーブルの作成に成功しました🐶'];
} else {
  $_SESSION['errors'] = ['Usersテーブルの作成に失敗しました🐶💦'];
}

header('Location: test.php');
exit;
