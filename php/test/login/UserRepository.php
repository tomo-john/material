<?php // UserRepository.php

/**
 * usersテーブル管理
 */
require_once 'DbManager.php';

class UserRepository {
  
  // 接続インスタンスを保持
  private PDO $db;

  // 外部から渡されたPDO接続を受け取る
  public function __construct(PDO $dbConnection) {
    $this->db = $dbConnection;
  }

  // ユーザー登録
  public function create(string $name, string $password): bool {
    
    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (name, password) VALUES (:name, :password)';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hasedPassword, PDO::PARAM_STR);
    return $stmt->execute();
  }

}
