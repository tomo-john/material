## LaravelをDocker上で起動させる流れ

①DockerDesktopを起動
→ /mnt/c/Program\ Files/Docker/Docker/Docker\ Desktop.exe

docker-compose up -d
②Docker起動とコンテナ作成
→ docker-compose up -d

これでlocalhostでLarevelが表示される
→ http://localhost/ をブラウザで開いて確認

## phpadmin
http://localhost:8080/

## コンテナログイン
docker-compose exec php bash

## DBログイン
docker-compose exec db bash

## Dockerコマンド
起動(作成) : docker-compose up -d
停止(削除) : docker-compose down

## ビルド
docker-compose build
→ docker-compose.ymlファイルに基づいて定義されたサービスのDockerイメージをビルドする

docker-compose up -d
→ docker-compose.ymlファイルに基づいて定義されたサービスをバックグラウンドで起動する

## Dockerdesktop起動とコンテナログイン 
/mnt/c/Program\ Files/Docker/Docker/Docker\ Desktop.exe
docker-compose exec php bash

## コンテナログイン後に行できること( /var/www/Laravel9TaskList )
 artisan実行時はプロジェクトディレクトリ直下で実行する

### コントローラ作成
php artisan make:controller TaskController
→ app/Http/Controllers ディレクトリに TaskController.php が作成

### マイグレーション
php artisan migrate
→ databases/migration/以下のマイグレーションファイルの内容で実行される

############################################################################################

## サービスに関連するコンテナ, イメージ, ボリュームを全て削除する
```
docker-compose down -v --rmi all
```

