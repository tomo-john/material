<?php
// create.php 登録処理
session_start();

$todo = htmlspecialchars($_POST['todo'] ?? '', ENT_QUOTES, 'UTF-8');

// 未入力チェック
if (empty($todo)) {
  $_SESSION['errors'] = '未入力です🐶💦';
  header('Location:new.php');
  exit;
}

// 登録処理
$todos = json_decode(file_get_contents('todos.json', true)) ?? [];
$todos[] = [
  'id' => 1, 'task' => $todo, 'done' => false
];
var_dump($todos);

file_put_contents('todos.json', json_encode($todos, JSON_PRETTY_PRINT));

?>

