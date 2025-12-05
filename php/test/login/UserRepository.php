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

  // Usersテーブル作成
  public function createUsers(): bool {
    $sql = 'CREATE TABLE IF NOT EXISTS users (
              id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(255) NOT NULL UNIQUE,
              password VARCHAR(255) NOT NULL,
              created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )';
    $stmt = $this->db->prepare($sql);
    return $stmt->execute();
  }

  // Usersテーブルリセット
  public function resetUsers(): bool {
    $sql = 'TRUNCATE users;';
    $stmt = $this->db->prepare($sql);
    return $stmt->execute();
  }

  // ユーザー一覧取得
  public function getUsers(): array {
    $sql = 'SELECT id, name, created_at FROM users';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  // ユーザー名の重複チェック 
  public function checkUserNameUniq(string $name): bool {
    $sql = 'SELECT COUNT(*) FROM users WHERE name = :name';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetchColumn();
    return $count > 0;
  }
}
