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
if (file_exists('todos.json')) {
  $todos = json_decode(file_get_contents('todos.json'), true);
} else {
  $todos = [];
}

if (empty($todos)) {
  $new_id = 1;
} else {
  $new_id = $todos[array_key_last($todos)]['id'] + 1;
}

$todos[] = [
  'id' => $new_id, 'task' => $todo, 'done' => false
];

file_put_contents('todos.json', json_encode($todos, JSON_PRETTY_PRINT));

$_SESSION['notices'] = '登録が完了しました🐶 登録内容: 「'. $todo . '」';
header('Location:new.php');
exit;

?>

