<?php

/** delete.php
 *  削除処理
 */

require_once 'DbManager.php';
require_once 'DogToysRepository.php';
session_start();

$id = $_POST['id'] ?? null;
if (empty($id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: list.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$result = $dog_toy_repo->delete(intval($id));

if ($result === true) {
  $notices = ['削除に成功しました'];
  $_SESSION['notices'] = $notices;
  header('Location: list.php');
  exit;
} else {
  $errors = ['削除に失敗しました'];
  $_SESSION['errors'] = $errors;
  header('Location: list.php');
  exit;
}
