<?php

/** table_create.php
 *  テーブル作成
 */

require_once 'DbManager.php';
require_once 'DogToysRepository.php';

session_start();

$db = new DbManager();
$pdo = $db->getPdoConnection();
$dog_toy_repo = new DogToysRepository($pdo);
$result = $dog_toy_repo->resetDogToysTable();

if ($result === true) {
  $_SESSION['notices'] = ['テーブルリセットに成功しました'];
  header('Location: test.php');
  exit;
} else {
  $_SESSION['errors'] = ['テーブルリセットに失敗しました'];
  header('Location: test.php');
  exit;
}
