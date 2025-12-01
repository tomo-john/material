<?php
$dsn = 'mysql:host=127.0.0.1;dbname=dog_app;charset=utf8mb4'; // host=localhost だと接続できなかった
$user = 'tomo_user';
$pass = 'password123';

try {
  $pdo = new PDO($dsn, $user, $pass);
  echo 'DB接続成功🐶✨<br>';

  // SQL定義: テーブル作成
  $sql = 'CREATE TABLE IF NOT EXISTS dogs (
    id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age INT(3) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  )';

  // SQL実行:
  $pdo->exec($sql);

  echo 'テーブル作成に成功しました🐶✨<br>';

} catch (PDOException $e) {
  echo 'DB接続失敗🐶💦: ' . $e->getMessage();
}
