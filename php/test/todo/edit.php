<?php
// edit.php 編集画面
session_start();

$todo_id = $_GET['id'] ?? '';
if (empty($todo_id)) {
  exit('IDが指定されていません🐶💦');
}

$todos = json_decode(file_get_contents('todos.json'), true);

$current_todo = '';
foreach ($todos as $todo) {
  if ($todo['id'] == $todo_id) {
    $current_todo = $todo;
    break;
  }
}

if (empty($current_todo)) {
  exit('そのIDのタスクは存在しません🐶💦');
}

var_dump($current_todo);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>編集画面🐶</title>
</head>
<body>

  <div class="new">
    <h2>編集画面🐶</h2>

    <?php if(!empty($errors)): ?>
      <p class="alert"><?php echo $errors; ?></p>
    <?php endif; ?>

    <?php if(!empty($notices)): ?>
      <p class="notice"><?php echo $notices; ?></p>
    <?php endif; ?>
    
    <div class="form">
      <form action="create.php" method="post">
        <label for="">Todo:</label>
        <input type="text" name="todo" placeholder="例: じょんに餌やり"value="">
        <input type="submit" value="登録🐾">
      </form>
    </div>

  <div class="back">
    <a href="list.php">🐾戻る🐾</a>
  </div>
</body>
</html>
