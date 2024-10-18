# PostgreSQLの基本的なコマンド

```
sudo -i -u postgres # PostgreSQLシェルに入る
psql                # posgtresデータベースに接続
```
- `sudo`: 管理者権限でコマンド実行
- `-i`  : ログインシェルとして実行(指定ユーザー`postgres`の環境に切り替える)
- `-u`  : ユーザーとしてコマンド実行(postgresユーザーとしてコマンド実行)
=> `postgres`ユーザーとしてログインし、その環境に切り替わった状態で操作を行う

- `psql`: PostgreSQLデータベースと対話的に操作するためのコマンドツール
=> デフォルトではLinuxユーザー名と同じ名前のPostgreSQLユーザーとして同名のDBに接続

## ユーザー
`postgres`ユーザー、`postgres`データベースで実施

```sql
-- ユーザー john をパスワード john で作成
CREATE USER john WITH PASSWORD 'john';

-- 管理者権限を付与する場合
ALTER USER john WITH SUPERUSER;
```

## データベース
```sql
CREATE DATABASE tomo OWNER tomo;
```

