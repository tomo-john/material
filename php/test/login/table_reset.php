<?php
require_once 'DbManager.php';
require_once 'UserRepository.php';
session_start();

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);
$result = $user_repo->resetUsers();

if ($result === true) {
  $_SESSION['notices'] = ['Usersテーブルのリセットに成功しました🐶'];
} else {
  $_SESSION['errors'] = ['Usersテーブルのリセットに失敗しました🐶💦'];
}

header('Location: test.php');
exit;
