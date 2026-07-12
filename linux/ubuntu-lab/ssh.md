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

