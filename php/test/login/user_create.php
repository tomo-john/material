<?php //user_create.php
require_once 'DbManager.php';
require_once 'UserRepository.php';
session_start();

$user_name = $_POST['user_name'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];
if (empty($user_name)) {
  $errors[] = '名前が未入力です';
}
if (empty($password)) {
  $errors[] = 'パスワードが未入力です';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_input'] = [
    'user_name' => $user_name,
    'password' => $password
  ];
  header('Location: user_new.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);
$result = $user_repo->create($user_name, $password);

if ($result === true) {
  $_SESSION['notices'] = [
    'ユーザー登録が完了しました',
    '登録されたユーザー: ' . htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8')
    ];
} else {
  $_SESSION['errors'] = ['ユーザー登録に失敗しました'];
}

header('Location: user_new.php');
exit;
