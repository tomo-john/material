<?php

/** DbManager.php
 *  DB管理全般
 */

class DbManager {
  private static ?PDO $pdo = null;

  // DBコネクション確率
  public function getPdoConnection(): PDO {
    if (self::$pdo instanceof PDO) {
      return self::$pdo;
    }

    $dsn = Config::DB_DSN;
    $user = Config::DB_USER;
    $pass = Config::DB_PASS;

    self::$pdo = new PDO($dsn, $user, $pass, [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return self::$pdo;
  }
}
