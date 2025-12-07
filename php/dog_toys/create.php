<?php

/** create.php
 *  新規登録処理
 */

require_once 'DbManager.php';
require_once 'DogToysRepository.php';
require_once 'Validator.php';
session_start();

$input = [
  'name' => $_POST['name'] ?? null,
  'price' => $_POST['price'] ?? null,
];

$validator = new Validator();

if (!$validator->validate($input)) {
  $_SESSION['errors'] = $validator->getErrors();
  $_SESSION['old_input'] = $input;
  header('Location: new.php');
  exit;
}

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$result = $dog_toy_repo->create($input['name'], intval($input['price']));

if ($result === true) {
  $notices = ['登録に成功しました'];
  $notices[] = '登録されたおもちゃ: ' . $input['name'] . '(' . $input['price'] . '円)';
  $_SESSION['notices'] = $notices;
  header('Location: new.php');
  exit;
} else {
  $errors = ['登録に失敗しました'];
  $_SESSION['errors'] = $errors;
  header('Location: new.php');
  exit;
}
