<?php

/** update.php
 *  更新処理
 */

require_once 'DbManager.php';
require_once 'DogToysRepository.php';
require_once 'Validator.php';
session_start();

$id = $_POST['id'] ?? null;
if (empty($id)) {
  $_SESSION['errors'] = ['不正なアクセスです'];
  header('Location: list.php');
  exit;
}

$input = [
  'name' => $_POST['name'] ?? null,
  'price' => $_POST['price'] ?? null,
];

$validator = new Validator();

if (!$validator->validate($input)) {
  $_SESSION['errors'] = $validator->getErrors();
  $_SESSION['old_input'] = $input;
  header("Location: edit.php?id={$id}");
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$result = $dog_toy_repo->update(intval($id), $input['name'], intval($input['price']));

if ($result === true) {
  $notices = ['更新に成功しました'];
  $notices[] = '更新されたおもちゃ: ' . $input['name'] . '(' . $input['price'] . '円)';
  $_SESSION['notices'] = $notices;
  header('Location: list.php');
  exit;
} else {
  $errors = ['更新に失敗しました'];
  $_SESSION['errors'] = $errors;
  header('Location: list.php');
  exit;
}
