<?php // DbManager.php

/**
 * DB管理全般
 * DBコネクション確立・テーブル作成など
 */
require_once 'Config.php';

class DbManager {
  
  // 接続インスタンスを保持するプロパティ
  private static ?PDO $pdo = null;

  // DBコネクション確立
  public function getPdoConnection(): PDO {

    // 接続済みならそれを返す
    if (self::$pdo instanceof PDO) {
      return self::$pdo;
    }

    // 接続がない場合は新しく作成し、staticプロパティに保持
    $dsn = Config::DB_DSN;
    $user = Config::DB_USER;
    $pass = Config::DB_PASS;

    self::$pdo = new PDO($dsn, $user, $pass, [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return self::$pdo;
  }

  // Usersテーブル作成
  public function createUsers(): bool {
    $pdo = $this->getPdoConnection();

    $sql = 'CREATE TABLE IF NOT EXISTS users (
              id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(255) NOT NULL UNIQUE,
              password VARCHAR(255) NOT NULL,
              created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )';


    $result = $pdo->exec($sql);

    return $result !== false;
  }
}
