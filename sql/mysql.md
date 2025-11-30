# MySQL

### ルートログイン

```
sudo mysql -u root
```

### 開発用のデータベース作成

```
CREATE DATABASE dog_app CHARACTER SET utf8mb4;
```

- UTF-8で日本語もOK
- dog_appは適当な名前でOK

### 開発用ユーザー作成(rootで直接は危険)

```
CREATE USER 'tomo_user'@'localhost' IDENTIFIED BY 'password123';
GRANT ALL PRIVILEGES ON dog_app.* TO 'tomo_user'@'localhost';
FLUSH PRIVILEGES;
```

- ユーザー名: `tomo_user`
- パスワード: `password123`
- DB: `dog_appにフル権限`

本番ではもっと強いパスワードにする必要あり。

`FLUSH PRIVILEGES;`で設定を反映させている。

### 削除するとき(DROP)

```
# rootにて
DROP DATABASE dog_app;
DROP USER 'tomo_user'@'localhost';
```

