<?php
// create.php 登録処理
session_start();

$errors = [];
$todo = htmlspecialchars($_POST['todo'], ENT_QUOTES, 'UTF-8');

var_dump($_POST);
var_dump($todo);

?>

