# セキュリティグループ変更

初期値: `default` => 外部からの通信を何も受け付けない

=> `IPv4v6-SSH`へ変更

```bash
nc -vz 160.251.234.145 22

# => Connection to 160.251.234.145 port 22 [tcp/ssh] succeeded!
```

初回ログイン:

```bash
ssh root@160.251.234.145
```

# SSH鍵認証(セキュリティ)

## 鍵確認

```bash
ls -la ~/.ssh
```

- id_ed25519
- id_ed25519.pub

=> 今回はあるので、鍵作成はスキップ

## VPSに公開鍵をコピー

VP側:

```bash
mkdir -p ~/.ssh
chmod 700 ~/.ssh
```

`.ssh`は本人だけが見れれるようにしておく。

`authorized_keys`作成:

```bash
vim ~/.ssh/authorized_keys
```

ローカルPCの`~/.ssh/id_ed25519.pub`の中身をコピペして保存。

権限設定:

```bash
chmod 600 ~/.ssh/authorized_keys 
```

=> 本人のみが読み書きできる状態

## 便利設定

`~/.ssh/config`:

```bash
Host conoha
  HostName 160.251.234.145
  User john
  IdentityFile ~/.ssh/id_ed25519
```

こうすると、`ssh conoha`でsshログインができる。

