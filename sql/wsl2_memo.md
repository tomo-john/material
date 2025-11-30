# WSL2/Ubuntu

WindowsPCのWSL2/Ubuntuにインストール時のメモなど :dog:

## PostgreSQLめも

```
# bash
sudo -u posgtres psql # パスワードはロック解除と同じ
```

- `\l`でデータベース一覧を表示する
- `\du`でロール(ユーザー)一覧を表示する

=> 基本DB名・ユーザー名・パスワード同じで作る(SQLとpsql試すだけなので :dog: )

---

## MySQLめも

### インストール

```
# パッケージリスト更新(パスワードはロック解除と同じ)
sudo apt update

# インストール済みパッケージを更新
sudo apt upgrade -y

# MySQLサーバー本体とPHP用の拡張機能(php-mysql)をインストール
sudo apt install mysql-server php-mysql -y

# MySQLの起動と状態確認(Active: active(running)になっていればOK)
systemctl status mysql
```

### ルートログイン

```
# sudo mysqlでもいけた
sudo mysql -u root
```

