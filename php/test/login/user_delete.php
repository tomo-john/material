<?php // user_delete.php
require_once 'DbManager.php';
require_once 'UserRepository.php';
session_start();

$user_id = $_POST['user_id'] ?? '';
if (empty($user_id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: table_view.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$user_repo = new UserRepository($pdo);
$result = $user_repo->delete(intval($user_id));

if ($result === true) {
  $_SESSION['notices'] = ['ユーザー削除が完了しました'];
} else {
  $_SESSION['errors'] = ['ユーザー削除に失敗しました'];
}

header('Location: table_view.php');
exit;
