<?php
// delete.php 削除処理
session_start();

// Yes or No
$answer = $_GET['answer'];

if ($answer == 'no') {
  header('Location:list.php');
  exit;
}

// 削除処理
$todo_id = $_GET['id'] ?? '';
if (empty($todo_id)) {
  exit('IDが指定されていません🐶💦');
}

$old_todos = json_decode(file_get_contents('todos.json'), true);

// 元のデータを取得
$new_todos = [];
foreach ($old_todos as $old_todo) {
  if ($todo_id != $old_todo['id']) {
    $new_todos[] = $old_todo;
  }
}

// 書き込み
file_put_contents('todos.json', json_encode($new_todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

$_SESSION['notices'] = '削除が完了しました🐶 ';
header('Location:list.php');
exit;

?>
