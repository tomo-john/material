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

## Web公開

Nginxの設定ファイル: `/etc/nginx/sites-available/default`

`root`:
```bash
server {
  root /var/www/apps/pawverse/public;
```

=> Laravelアプリの`public/`だけを公開する設計

`index`:
```bash
index index.php index.html index.htm index.nginx-debian.html;
```

=> index.phpを追加

`try_files`:
```bash
location / {
        try_files $uri $uri/ /index.php?$query_string;
}
```

- そのファイルがある？ => あれば返す
- ディレクトリはある？ => あれば返す
- どっちもない？ => `public/index.php`に渡す

=> Laravelの`public/index.php`は唯一の入り口

=> `location /`はすべてのURLが対象

PHP-FPM:
```bash
location ~ \.php$ {
      include snippets/fastcgi-php.conf;

      fastcgi_pass unix:/run/php/php8.3-fpm.sock;
}
```

=> `location ~ .php$`: .phpで終わるもの

=> ソケットは、`ls /run/php`で名前を確認

イメージ:
```bash
Nginx -- index.phpお願い --> php8.3-fpm.sock --> PHP-FPM --> PHP実行
```

ここまで変更して保存したら、構文チェック。

=> `sudo nginx -t`


問題なければ、設定反映。(リロード)

=> `sudo systemctl reload nginx`

## 権限エラー

ここまでの時点で、`http://160.251.234.145/`にブラウザからアクセスすると、

`HTTP 500 Internal Server Error`が出た。

=> [ここ](permission.md)で対応

