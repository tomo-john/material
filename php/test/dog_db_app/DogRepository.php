<?php
// DogRepository.php

/**
 *dogsテーブルへの保存と読み込みを専用に行うクラス
 */
require_once 'Config.php';

class DogRepository {

  // DBへのPDO接続を取得
  private function getPdoConnection(): PDO {
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
      die('DB接続エラー🐶💦: ' . $e->getMessage());
    }
  }

  // 新規保存
  public function saveDog(string $name, int $age): bool {
    $pdo = $this->getPdoConnection();

    $sql = 'INSERT INTO dogs (name, age) VALUES (:name, :age)';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);

    return $stmt->execute();
  }

  // 全データ取得
  public function getDog(): array {
    $pdo = $this->getPdoConnection();
    
    $sql = 'SELECT * FROM dogs';
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  // 指定データ取得
  public function findDog(int $id): array {
    $pdo = $this->getPdoConnection();

    $sql = 'SELECT * FROM dogs WHERE id = :id';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // 指定データ更新
  public function updateDog (int $id, string $name, int $age): bool {
    $pdo = $this->getPdoConnection();

    $sql = 'UPDATE dogs SET name = :name, age = :age WHERE id = :id';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);

    return $stmt->execute();
  }

  // 指定データ削除
  public function deleteDog(int $id): bool {
    $pdo = $this->getPdoConnection();

    $sql = 'DELETE FROM dogs WHERE id = :id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  // テーブルリセット
  public function tableReset(): bool {
    $pdo = $this->getPdoConnection();

    $sql = 'TRUNCATE dogs';

    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute();
  }
}
