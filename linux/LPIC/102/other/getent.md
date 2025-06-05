# getent

システムのデータベース(エントリ)を取得するためのコマンド。

`passwd`や`hosts`などLinuxの名前付き情報を一貫した方法で参照できる便利なツール。

=> `/etc/nsswitch.conf`に従って取得するコマンド

```
# ユーザー情報
getent passwd john
```

```
# 名前解決
getent hosts example.com
```

