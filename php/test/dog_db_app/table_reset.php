<?php
// table_reset
require_once 'DogRepository.php';
session_start();

// テーブル情報をリセット
$dogrepo = new DogRepository();
$result = $dogrepo->tableReset();

if ($result) {
  $_SESSION['notices'] = ['テーブル情報をリセットしました🐶'];
} else {
  $_SESSION['errors'] = ['テーブル情報のリセットに失敗しました🐶💦'];
}

header('Location:test.php');
exit;
