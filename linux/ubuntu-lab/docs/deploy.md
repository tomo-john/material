# Laravelアプリ初回デプロイロードマップ

## サーバー準備

- ConoHa VPS作成(契約)
- SSHログイン(root)
- 一般ユーザー作成(sudo権限付与)
- rootログイン禁止
- SSH鍵認証
- `~/.ssh/config`作成・sshエイリアス接続(Macのみ)

## Linux環境構築(Ubuntu)

- git
- vim
- tmux
- PHP
- Composer
- PHP-FPM
- Node.js(nvm)

## Webサーバー構築

- Nginxインストール
- nginx起動確認
- 80番ポート確認
- ブラウザからWelcomeページ表示

## GitHub連携

- GitHub SSH鍵作成
- GitHubへ公開鍵登録
- 接続確認
- `/var/www/apps`作成
- `git clone`

## Laravel1セットアップ

- composer install
- PHPver問題対応
- `.env`作成
- APP_KEY生成
- SQLite作成
- migrate

## フロントエンド

- npm install
- npm run build

## Nginx設定

- root変更
- index設定
- PHP-FPM設定
- `nginx -t`(設定ファイル確認)
- `nginx reload`

## 権限設定

- storage
- bootstrap/cache
- database.sqlite

