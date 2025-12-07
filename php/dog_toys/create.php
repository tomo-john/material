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

echo 'OK🐶';
