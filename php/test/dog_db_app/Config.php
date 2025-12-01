<?php
// Config.php

/**
 * 設定情報保持クラス
 * DB情報など変更してはいけない値は定数として定義
 */
class Config {
  public const DB_DSN = 'mysql:host=127.0.0.1;dbname=dog_app;charset=utf8mb4';
  public const DB_USER = 'john';
  public const DB_PASSWORD = 'john1234';
}

