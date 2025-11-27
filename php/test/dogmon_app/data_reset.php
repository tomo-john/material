<?php
// data_reset.php データリセット
$file_name = 'dogmons.json';

if (file_exists($file_name)) { 
  unlink($file_name);
}

session_start();
$notices = ['データををリセットしました🐶'];
$_SESSION['notices'] = $notices;
header('Location:test.php');
exit;

