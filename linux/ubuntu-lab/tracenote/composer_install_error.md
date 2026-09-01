# composer installでエラー

```
Mac(ローカル)のPHPが新しい
    |
ComposerがSymfony 8系を選択
    |
composer.lockに固定される
    |
VPS PHP 8.3でcomposer install
    |
Symfony 8がPHP 8.4以上を要求してエラー
```

## ゴール

- Laravel 13
- PHP 8.3
- Symfony 7.4

## ComposerにPHP 8,3環境として依存関係を解決してねと伝える

### compser.jsonを編集

変更前:

```json
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
```

変更前:

```json
    "config": {
        "platform": {
             "php": "8.3.6"
        },
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
```

=> `"platform": { "php": "8.3.6" },`を追加

=> 編集後に`composer update`を実行する

これで現在のcomposer.lockをPHP 8.3.6前提で作り直す。

### Symfonyのバージョン確認

```bash
composer show symfony/http-foundation
```

```
versions : * v8.0.8 => v7.4.18
```

### VPS側に反映

- ローカル: `commit -> push`
- VPS: `pull -> (再度)composer install`

## composer.jsonのconfig -> platform

```json
    "config": {
        "platform": {
             "php": "8.3.6"
        },
```

=> Composerの依存関係解決をPHP 8.3.6の環境として考えさせる

=> 実際のローカルPHPを8.3.6に変更するわけではない

