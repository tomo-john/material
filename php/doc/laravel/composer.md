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

## globalとinstaller

```
composer global require laravel/installer
```

`laravel/installer`は新しいLaravelプロジェクトをゼロから作るための、たっと1つの専用ツール。

`composer create-project laravel/laravel project-name`の代わりに`laravel new project-name`が使えるようになる。

通常、`composer require`でパッケージをインストールすると、カレントディレクトリでしか使用することはできない。

しかし、`global`をつけることで、そのパッケージ(今回は`laravel/installer`)をOS全体 = どのディレクトリからでも使用できる場所にインストールされる。

なので、どのディレクトリでも`laravel new project-name`が使用できるようになる。

