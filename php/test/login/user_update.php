<?php //user_update.php
require_once 'DbManager.php';
require_once 'UserRepository.php';
session_start();

$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($user_id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: table_view.php');
  exit;
}

$errors = [];
if (empty($user_name)) {
  $errors[] = '名前が未入力です';
}
if (empty($password)) {
  $errors[] = 'パスワードが未入力です';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_input'] = ['user_name' => $user_name];
  header("Location: user_edit.php?id={$user_id}");
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);

$uniq_check = $user_repo->checkUserNameUniq($user_name);
if ($uniq_check === true) {
  $_SESSION['errors'] = ['ユーザー名: 「' . $user_name . '」は既に存在します'];
  header("Location: user_edit.php?id={$user_id}");
  exit;
}

$result = $user_repo->update(intval($user_id), $user_name, $password);

if ($result === true) {
  $_SESSION['notices'] = [
    'ユーザー更新が完了しました',
    '登録されたユーザー: ' . htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8')
    ];
} else {
  $_SESSION['errors'] = ['ユーザー更新に失敗しました'];
}

header('Location: table_view.php');
exit;
