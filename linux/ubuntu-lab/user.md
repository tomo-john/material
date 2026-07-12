# 一般ユーザー作成

```bash
adduser john
```

- パスワードを設定
- Full Nmae 以降は何も設定せずEnter

## sudo権限付与 

```bash
usermod -aG sudo john
```

- -a: 追加
- -G: 追加グループを指定

ユーザー`john`に`sudo`グループを追加する。

Ubuntuでは`sudo`グループに所属すると、`sudo apt update`など管理者権限を使えるようになる。

## ルートログインの禁止

- 実行前に作成したユーザーでログインできること確認
- sudoが使えることを確認

SSH設定ファイルの編集:

```bash
sudo vim /etc/ssh/sshd_config
```

以下を変更:

```bash
PermitRootLogin no
```

sshを再起動:

```bash
sudo systemctl restart ssh
```

