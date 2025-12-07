# Composer

Composer = PHPの依存関係(ライブライ)管理ツール

LaravelのComposerがないとインストールできない。

他のライブライもComposerで管理。

`composer.json`に使うライブラリのリストが書かれている。

=> それをまとめてインストールするのが`composer install`などのコマンド。

```
composer create-project laravel/laravel wan_app
```

- 1. `create-project` : 新しいプロジェクトを作るコマンド

  => テンプレートをダウンロードし、指定ディレクトリ(`wan_app`)に展開

- 2. `laravel/laravel` : Laravel公式のスターターキット(プロジェクトの雛形)

  Composerのパッケージ名は、`vendor名/パッケージ名`

- 3. `wan_app` : 作成したいプロジェクトのディレクトリ名

  => この名前のディレクトリが作成され、そこにLaravelプロジェクトが展開される

## Composerコマンド

| コマンド                 | 意味                                      |
|--------------------------|-------------------------------------------|
| `composer install`       | プロジェクトクローン後に使う              |
| `composer update`        | `composer.json`を基準にパッケージを最新化 |
| `composer requre xxx`    | 新しくライブラリを追加したいときに使う    |
| `composer remove xxx`    | ライブラリ削除                            |
| `composer dump-autoload` | autoload(自動読込)を再生成                |
| `composer show`          | ライブラリ一覧                            |

## ファイル

- vendor/: すべての外部ライブラリが入る場所(Laravel本体もここにある)
- composer.json: 何のライブラリを使うかのリスト
- composer.lock: 実際にインストールされたバージョンの記録

