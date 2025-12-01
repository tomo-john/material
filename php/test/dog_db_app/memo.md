# メモ

```
# MySQL設定
CREATE USER 'john'@'localhost' IDENTIFIED BY 'john1234';
GRANT ALL PRIVILEGES ON dog_app.* TO 'john'@'localhost';
FLUSH PRIVILEGES;
```

- DB: MySQL
- DB名: `dog_app`
- ユーザー: `john`
- password: `john1234`

```
# コマンドライン
mysql -u john -p dog_app
```

