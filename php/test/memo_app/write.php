<?php
session_start();

$notices = [];

$file_name = $_SESSION['data']['file_name'];
$content = $_SESSION['data']['content'];
unset($_SESSION['data']);

$dir_name = "storage";
if (!is_dir($dir_name)) {
  mkdir($dir_name, 0777, true);
}

$destination = $dir_name . "/" . $file_name;

file_put_contents($destination, $content);

$notices[] = '書き込みが完了しました🐶';
$_SESSION['notices'] = $notices;

header('Location: index.php');
exit;
