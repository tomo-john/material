<?php
$dsn = 'mysql:host=127.0.0.1;dbname=dog_app;charset=utf8mb4'; // host=localhost だと接続できなかった
$user = 'tomo_user';
$pass = 'password123';

try {
  $pdo = new PDO($dsn, $user, $pass);
  echo 'DB接続成功🐶✨';
} catch (PDOException $e) {
  echo 'DB接続失敗🐶💦: ' . $e->getMessage();
}
