# PostgreSQL関連の基本的なコマンド

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
-- データベース tomo を作成
CREATE DATABASE tomo OWNER tomo;
```

## psqlコマンド
```
psql option databasename
```
- `-U`: 接続するPostgreSQLユーザーを指定
  ```
  psql -U john
  ```

- `-d`: 接続するデータベースを指定
  ```
  psql -d mydb
  ```

- `-h`: データベースサーバーのホスト名を指定(デフォルトではローカルホスト)
  ```
  psql -h 192.168.1.100
  ```

- `-p`: PostgreSQLサーバーのポート番号を指定(デフォルトでは5432)
  ```
  psql -p 5433
  ```

- `-f`: SQLスクリプトファイルを指定し、その内容を実行
  ```
  psql -f script.sql
  ```

- `-l`: データベース一覧表示
  ```
  psql -l
  ```

## psqlシェル内の基本コマンド
`psql`に接続した後、PostgreSQLを操作するための便利なコマンド

`メタコマンド`と呼ばれ、すべてバックスラッシュ(`\`)で始まる

- `\l` : システム上にあるデータベース一覧を表示
- `\c` : 別のデータベースに接続
- `\dt`: 現在のデータベースにあるテーブルの一覧を表示
- `\du`: システム上に存在するユーザー(ロール)の一覧を表示
- `\d` : 特定のテーブルやビューの構造を表示
- `\i` : 外部のSQLファイルを読み込んで実行
- `\q` : psqlを終了(ctrl + D)

## テーブル
1.基本的なテーブル作成の構文
```sql
CREATE TABLE テーブル名(
  列名 データ型 [制約],
  列名 データ型 [制約],
  ...
);
```
- テーブル名: テーブルの名前
- 列名: 各列(カラム)の名前
- データ型: 各列に保存するデータ型
- 制約: 必要に応じての制約

2.簡単なテーブル作成の例

