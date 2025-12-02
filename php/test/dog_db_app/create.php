<?php
// create.php
require_once 'DogRepository.php';
session_start();

$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';
$notices = [];
$errors = [];

if (empty($name)) {
  $errors[] = '名前が未入力です🐶💦';
}
if (empty($age)) {
  $errors[] = '年齢が未入力です🐶💦';
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old_input'] = [
    'name' => $name,
    'age' => $age
  ];
  header('Location:new.php');
  exit;
}

exit('OK🐶');
