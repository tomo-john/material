# getent

`/etc/nsswitch.conf`は、名前解決やサービス名解決の際に問合せ順序を指定するファイル。

=> ユーザー情報、パスワード情報の取得、ホスト名からIP情報の取得する際の情報検索先など設定内容は多岐にわたる。

`getent`はそれらの情報問合せを行うコマンド。

```
getent データベース名 [キー...]
```

データベース名には`/etc/nsswitch.conf`で指定できるサービス名を指定する。

キーを指定しなかった場合、指定したデータベースのすべての内容が表示される。

## passwd

データベース名に`passwd`を指定すると、ローカルで管理しているユーザーだけでなく、LDAPサーバーで管理しているユーザー情報一覧も表示できる。

=> LDAPサーバー : ネットワーク機器やユーザーを一元管理するディレクトリサービス

