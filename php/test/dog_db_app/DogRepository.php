<?php
// DogRepository.php

/**
 *dogsテーブルへの保存と読み込みを専用に行うクラス
 */
require_once 'Config.php';

class DogRepository {

  // DBへのPDO接続を取得
  static function getPdoConnection(): PDO {
    try {
      $pdo = new PDO(
        Config::DB_DSN,
        Config::DB_USER,
        Config::DB_PASS,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    return $pdo;
    } catch (PDOException $e) {
      die('DB接続エラー: ' . $e->getMessage());
    }
  }

  // 新規保存

}
