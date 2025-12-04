# memo

```
# MySQL設定(rootにて)
sudo mysql -u root

CREATE DATABASE login_app CHARACTER SET utf8mb4;
# CREATE USER 'john'@'localhost' IDENTIFIED BY 'john1234'; # ユーザーはすでに作成済みの為不要
GRANT ALL PRIVILEGES ON login_app.* TO 'john'@'localhost';
FLUSH PRIVILEGES;
```
