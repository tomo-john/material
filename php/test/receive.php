<?php
// フォームからのデータを受け取る
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// 未入力チェック
$errors = [];

if (empty($name)) {
  $errors[] = "名前を入力して下さい🐶";
}
if (empty($email)) {
  $errors[] = "メールアドレスをを入力して下さい🐶";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "メールアドレスの形式が正しくありません🐶";
}
if (empty($message)) {
  $errors[] = "メッセージを入力して下さい🐶";
}

// 結果の表示
if (!empty($errors)) {
  // エラーがある場合は、入力内容も一緒に戻す
  $query = http_build_query([
    'errors' => $errors,
    'old' => ['name' => $name, 'email' => $email, 'message' => $message]
  ]);
  header("Location: form.php?$query");
  exit;
} 

// 成功時の出力
echo "<h3>送信内容🐶</h3>";
echo "名前:" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "<br>";
echo "メール:" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";
echo "メッセージ:" . nl2br(htmlspecialchars($name, ENT_QUOTES, 'UTF-8')) . "<br>";
