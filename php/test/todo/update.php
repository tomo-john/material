<?php
// create.php 更新処理
session_start();

$id = intval($_POST['id']);
$todo = htmlspecialchars($_POST['todo'] ?? '', ENT_QUOTES, 'UTF-8');
$status = ($_POST['status'] === 'true');
$status_str = $status ? '完了🐶' : '未完了🐰';


var_dump($status);

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

// 元のデータを取得
$new_todos = [];
foreach ($old_todos as $old_todo) {
  if ($id != $old_todo['id']) {
    $new_todos[] = $old_todo;
  }
}

// 更新したタスクを追加
$new_todos[] = [
  'id' => $id, 'task' => $todo, 'done' => $status
];

// idを昇順で並び替え
usort($new_todos, function ($a, $b) {
  return $a['id'] <=> $b['id'];
});

// 書き込み
file_put_contents('todos.json', json_encode($new_todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

$_SESSION['notices'] = '更新が完了しました🐶 更新内容: 「'. $todo . '」 / 状態: ' . $status_str;
header('Location:list.php');
exit;

?>

