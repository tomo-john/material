<?php
// list.php 一覧表示画面
session_start();

$errors = '';
if (isset($_SESSION['errors'])){
  $errors = $_SESSION['errors'];
  unset($_SESSION['errors']);
}

$notices = '';
if (isset($_SESSION['notices'])){
  $notices = $_SESSION['notices'];
  unset($_SESSION['notices']);
}

if (file_exists('todos.json')) {
  $todos = json_decode(file_get_contents('todos.json'), true);
} else {
  $todos = [];
}

var_dump($todos);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>一覧画面🐶</title>
</head>
<body>

  <div class="list">
    <h2>一覧画面🐶</h2>

    <?php if(!empty($errors)): ?>
      <p class="alert"><?php echo $errors; ?></p>
    <?php endif; ?>

    <?php if(!empty($notices)): ?>
      <p class="notice"><?php echo $notices; ?></p>
    <?php endif; ?>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>タスク内容</th>
          <th>状態</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($todos)): ?>
          <?php foreach($todos as $todo): ?>
            <tr class="<?php echo $todo['done'] ? 'status-done' : ''; ?>">
              <td>
                <?php echo htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8'); ?>
              </td>
              <td>
                <?php echo htmlspecialchars($todo['task'], ENT_QUOTES, 'UTF-8'); ?>
              </td>
              <td>
                <?php if($todo['done']): ?>
                  <?php echo '完了🐶'; ?>
                <?php else: ?>
                  <?php echo '未完了🐰'; ?>
                <?php endif; ?>
              </td>
              <td>
                <a class=btn-edit href="edit.php?id=<?php echo $todo['id']; ?>">編集🐄</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <p>登録されたタスクはありません🐶</p>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="back">
      <a href="index.php">🐾戻る🐾</a>
    </div>
  </div>

</body>
</html>
