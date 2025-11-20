<?php
// create.php 更新処理
session_start();

$id = $_POST['id'];
$todo = htmlspecialchars($_POST['todo'] ?? '', ENT_QUOTES, 'UTF-8');

// 未入力チェック
if (empty($todo)) {
  $_SESSION['errors'] = '未入力です🐶💦';
  header("Location:edit.php?id={$id}");
  exit;
}

// 更新処理

if (file_exists('todos.json')) {
  $old_todos = json_decode(file_get_contents('todos.json'), true);
} else {
  exit('更新エラー🐶💦');
}

$new_todos = [];
foreach ($old_todos as $old_todo) {
  if ($id != $old_todo['id']) {
    $new_todos[] = $old_todo;
  }
}

$new_todos[] = [
  'id' => $id, 'task' => $todo, 'done' => false
];

file_put_contents('todos.json', json_encode($new_todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

$_SESSION['notices'] = '登録が完了しました🐶 更新内容: 「'. $todo . '」';
header('Location:list.php');
exit;

?>

