<?php
// table_create.php
session_start();

$notices = [];
$errors = [];

// DB作成 => テーブル作成
$dsn = 'mysql:host=127.0.0.1;dbname=dog_app;charset=utf8mb4'; // host=localhost だと接続できなかった
$user = 'john';
$pass = 'john1234';

try {
  $pdo = new PDO($dsn, $user, $pass);
  $notices[] = 'DB接続成功🐶✨';

  // SQL定義: テーブル作成
  $sql = 'CREATE TABLE IF NOT EXISTS dogs (
    id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age INT(3) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  )';

  // SQL実行:
  $pdo->exec($sql);

  $notices[] = 'テーブル作成に成功しました🐶✨';

} catch (PDOException $e) {
  $errors[] = 'DB接続失敗🐶💦: ' . $e->getMessage();
}

// 処理完了 => テストページへ戻る 
if (!empty($notices)) {
  $_SESSION['notices'] = $notices;
}
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
}
header('Location:test.php');
exit;
