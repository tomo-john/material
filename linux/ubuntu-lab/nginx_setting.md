# 構成

```bash
/var/www/
├── html/          # Nginxデフォルトページ（記念に残す🐶）
└── apps/
    └── app_name/  # GitHubからclone
```

- `html/`: Nginxを学ぶための実験場
- `apps/`: Laravel置き場

`apps`ディレクトリの作成と所有権

```bash
sudo mkdir /var/www/apps

sudo chown john:john /var/www/apps
```

## git clone (pawverse)

作成した`apps`にGitHubからプロジェクトをcloneする。

今回は`pawverse`でやってみる。

```
[VPS] john@[~]$ cd /var/www/apps/
[VPS] john@[apps]$ git clone git@github.com:tomo-john/pawverse.git
```

=> clone後にすることなどは[こちら](./git_clone.md)

