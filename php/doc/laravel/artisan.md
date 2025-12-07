# Artisan(アルチザン)

Laravelに標準で搭載されているCLIの名称。

プロジェクトのルートディレクトリにて`php artisan`と入力するだけでArtisanの機能(コマンド)を呼び出すことができる。

## サーバー・キャッシュ管理(環境設定)

| コマンド                  | 役割                                 |
|---------------------------|--------------------------------------|
| `php artisan serve`       | 開発用ローカルサーバーを起動         |
| `php artisan route:list`  | 登録されているルーティングを一覧表示 |
| `php artisan cache:clear` | キャッシュクリア                     |

## ファイルの自動生成(makeコマンド)

Controller, Model, MigrationなどMVCを構成するファイルをLaravelの規約に従って自動で生成してくれる。

| コマンド                      | 役割                                              |
|-------------------------------|---------------------------------------------------|
| `php artisan make:controller` | Controllerファイルを作成                          |
| `php artisan make:model`      | Modelファイルを覚醒し、データベースとの連携を準備 |
| `php artisan make:migration`  | DBのテーブル定義ファイルを作成                    |

### 使用例

| 例         | コマンド                                        |
|------------|-------------------------------------------------|
| controller | `php artisan make:controller UserController`    |
| model      | `php artisan make:model User`                   |
| migration  | `php artisan make:migration create_users_table` |

## DB操作(テーブル作成・管理)

DBのテーブル構造(スキーマ)をPHPのコードで管理する機能を`マイグレーション`と呼ぶ。

| コマンド              | 役割                                                         |
|-----------------------|--------------------------------------------------------------|
| `php artisan migrate` | マイグレーションファイルに基づいて、DBにテーブルを一括で作成 |
| `php artisan db:seed` | テーブルにテスト用の初期データを流し込む                     |

