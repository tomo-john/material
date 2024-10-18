# WSL2のUbuntuにPostgreSQLを導入

1.リポジトリの更新
```
sudo apt update
```
rootのパスワード入れる

2.PostgreSQLのインストール
```
sudo apt install postgresql postgresql-contrib
```
`Y`で続ける

3.PostgreSQLサービスの起動
```
sudo service postgresql start
```
止めるときは`sudo service postgresql stop`

4.PostgreSQLの動作確認
```
sudo -i -u postgres 
psql
```
`\q(Ctrl + D)`, `exit`で抜ける

---

# ユーザー作成
PosgtreSQLユーザー(psql)で手動でユーザーを作成することも可能

1.`postgres`ユーザーでPostgreSQLシェルに入る
```
sudo -i -u postgres
psql

```

2.CREATE文で新しいユーザーを作成
```sql
CREATE USER john WITH PASSWORD 'john';
```

3.スーパーユーザー権限を与える場合(今回実施)
```sql
ALTER USER john WITH SUPERUSER;
```

作成したユーザー(`john`)でPostgreSQLにログイン
```
psql -U john
```
下記のエラーが出た
```
psql: error: connection to server on socket "/var/run/postgresql/.s.PGSQL.5432" failed: FATAL:  Peer authentication failed for user "john"
```
PostgreSQLの認証方式が`peer`に設定されており、そのために`john`ユーザーでの接続ができない

Peer認証では、PostgreSQLはシステムのLinuxユーザー名と同じ名前のPosgreSQLユーザーを期待する

- 回避策1: `pg_hba.conf`ファイルの編集

  ```
  sudo vim /etc/postgresql/14/main/pg_hba.conf
  ```
  
  `peer`を`md5`もしくは`password`に変更する

  ```
  local   all             all                                     peer
  ```

  変更後はPostgreSQLサービスを再起動

  ```
  sudo service postgresql restart
  ```

- 回避策2: Ubuntuユーザー名と同じユーザー名を作成

  `whoami`コマンドでユーザー名確認

  ユーザー作成、管理者権限付与(今回実施)

  ```
  sudo -i -u postgres
  psql

  create user tomo;
  alter user tomo with superuser;
  ```

  これでデータベースに接続できる

  ```
  psql -d postgres
  ```

PostgreSQLはデフォルトでユーザー名と同じ名前のデータベースに接続しようとするため、

この時点では`psql`だけでは`database "tomo" does not exist`エラーが出る

---

