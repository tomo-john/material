<?php
session_start();

$errors= [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 未入力チェック
  if (empty($_POST['file_name'])) {
    $errors[] = 'ファイル名が入力されていません🐶💦';
  }
  if (empty($_POST['content'])) {
    $errors[] = 'メモが入力されていません🐶💦';
  }
  if (!empty($errors)) {
     $_SESSION['errors'] = $errors;
     $_SESSION['old_input'] = $_POST;
     header('Location: input.php');
     exit;
  }

  // backボタン
  if (isset($_POST['back'])) {
    $_SESSION['old_input'] = $_POST;
    header('Location: index.php');
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
$file_name = htmlspecialchars($_POST['file_name'], ENT_QUOTES, 'UTF-8');
$content = nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

?>

<!DOCTYPE html>
<html>
<head><title>メモアプリ練習🐶</title></head>
<body>
  <h2>登録内容の確認🐶</h2>
  <p>以下の内容で保存しますか？</p>
  
  <?php echo "ファイル名: " . $file_name . "<br>"; ?>
  <?php echo " メモ内容: <br>"; ?>
  <?php echo $content; ?>
  <br><br>

  <form action="confirm.php" method="post">
    <input type="hidden" name="file_name" value="<?php echo $_POST['file_name']; ?>">
    <input type="hidden" name="content" value="<?php echo htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" name="back" value="修正する🐶">
    <input type="submit" name="ok" value="OK🐶">
  </form>

</body>
<html>
