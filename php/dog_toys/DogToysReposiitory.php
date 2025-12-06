<?php

/** DogToysRepository.php
 *  dog_toysテーブル管理
 */

class DogToysRepository {

  private PDO $pdo;

  public function __construct(PDO $dbConnection) {
    $this->pdo = $dbConnection;
  }

  // テーブル作成
  public function createDogToysTable(): bool {
    $sql = 'CREATE TABLE IF NOT EXISTS dog_toys (
              id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(255) NOT NULL UNIQUE,
              price INT(11) NOT NULL,
              created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )';
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute();
  }

  // テーブルリセット
  public function resetDogToysTable(): bool {
    $sql = 'TRUNCATE dog_toys';
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute();
  }

  // 作成
  public function create(string $name, int $price): bool {
    $sql = 'INSERT INTO dog_toys (name, price) VALUE (:name, :price)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    return $stmt->execute();
  }

  // 更新
  public function update(int $id, string $name, int $price): bool {
    $sql = 'UPDATE dog_toys SET name = :name, price = :price WHERE id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    return $stmt->execute();
  }

  // 削除
  public function delete(int $id): bool {
    $sql = 'DELETE FROM dog_toys WHERE id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  // 一覧
  public function getAll(): array {
    $sql = 'SELECT * FROM dog_toys';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->FetchALL(PDO::FETCH_ASSOC);
  }

  // IDによるデータ取得
  public function findById(int $id): ?array {
    $sql = 'SELECT * FROM dog_toys WHERE id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->Fetch(PDO::FETCH_ASSOC);
  }

  // nameの重複チェック
  public function isNameExists(string $name, ?int $id = null): bool {
    if ($id === null) {
      $sql = 'SELECT COUNT(*) FROM dog_toys WHERE name = :name';
    } else {
      $sql = 'SELECT COUNT(*) FROM dog_toys WHERE name = :name AND id != :id';
    }
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    if ($id !== null) { $stmt->bindParam(':id', $id, PDO::PARAM_INT); }
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
  }
}
