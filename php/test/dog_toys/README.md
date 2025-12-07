# Dog Toys

PHP学習用ミニAPP :dog:

## テーマ

犬のおもちゃ在庫管理アプリ

## ゴール

- PDOを使ってCRUDを作る

---

## 作業memo

## DB

- DB: MySQL
- DB名: 'dog_toys'
- MySQLユーザー: `john` / `john1234`

```
# MySQL設定(rootにて)
sudo mysql -u root

CREATE DATABASE dog_toys CHARACTER SET utf8mb4;
# CREATE USER 'john'@'localhost' IDENTIFIED BY 'john1234'; # ユーザーはすでに作成済みの為不要
GRANT ALL PRIVILEGES ON dog_toys.* TO 'john'@'localhost';
FLUSH PRIVILEGES;
```

