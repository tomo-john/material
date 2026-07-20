# git clone (pawverse)

VPSの`/var/www/apps`にpawverseをクローンする。

```
[VPS] john@[~]$ cd /var/www/apps/
[VPS] john@[apps]$ git clone git@github.com:tomo-john/pawverse.git
```

`gti clone`後にやることについてなど。

## PHPとComposerインストール

```bash
sudo apt update

sudo apt install \
php8.3-cli \
php8.3-fpm \
php8.3-mbstring \
php8.3-xml \
php8.3-curl \
php8.3-zip \
php8.3-sqlite3 \
php8.3-bcmath \
composer
```

PHPは1つの大きなパッケージではなく、役割ごとに小さなパッケージに分かれている。

- php8.3-cli … ターミナルで使うPHP
- php8.3-fpm … Nginxから呼ばれるPHP
- php8.3-mbstring … 日本語などマルチバイト文字の処理
- php8.3-xml … XMLの処理
- php8.3-curl … HTTP通信
- php8.3-zip … ZIP圧縮・展開
- php8.3-sqlite3 … SQLiteデータベース
- php8.3-bcmath … 高精度な数値計算

## composer install

エラーが出たのでcomposer関連の対応を実施 => [ここ](php_8.3.md)

