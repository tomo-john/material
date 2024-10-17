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
`\q`, `exit`で抜ける

# ユーザー作成
PosgtreSQLユーザー(psql)で手動でユーザーを作成することも可能

