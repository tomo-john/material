<?php
session_start();

$errors= [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (empty($_POST['content'])) {
    $errors[] = 'メモが入力されていません🐶💦';
  }
  if (!empty($errors)) {
     $_SESSION['errors'] = $errors;
     $_SESSION['file_name'] = $_POST['file_name'];
     header('Location: edit.php');
     exit;
  }

  // backボタン
  if (isset($_POST['back'])) {
    $_SESSION['file_name'] = $_POST['file_name'];
    $_SESSION['old_content'] = $_POST['content'];
    header('Location: edit.php');
    exit;
  }

  // okボタン
  if (isset($_POST['ok'])) {
    $_SESSION['data'] = [
      'file_name' => $_POST['file_name'],
      'content' => $_POST['content']
    ];
    header('Location: write.php');
    exit;
  }
}

// 画面表示用の変数(加工)
$file_name = basename($_POST['file_name']);
$content = nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

?>

<!DOCTYPE html>
<html>
<head><title>メモアプリ練習🐶</title></head>
<body>
  <h2>編集内容の確認🐶</h2>
  <p>以下の内容で保存しますか？</p>
  
  <?php echo "ファイル名: " . $file_name . "<br>"; ?>
  <?php echo " メモ内容: <br>"; ?>
  <?php echo $content; ?>
  <br><br>

  <form action="confirm_edit.php" method="post">
    <input type="hidden" name="file_name" value="<?php echo $_POST['file_name']; ?>">
    <input type="hidden" name="content" value="<?php echo htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" name="back" value="編集画面に戻る🐶">
    <input type="submit" name="ok" value="OK🐶">
  </form>

</body>
<html>
