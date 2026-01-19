# 言語設定(日本語化)の基本

Laravel 12 ではルートディレクトリに`lang/{locale}`に言語ファイルを置く。

### 日本語を使う設定

`config/app.php`はこうなっている。

```php
<?php
'locale' => env('APP_LOCALE', 'en'),

'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
```

- `APP_LOCALE` : アプリの言語設定
- `APP_FALLBACK_LOCALE` : 翻訳ファイルが見つからない時の保険
- `APP_FAKER_LOCALE` : Factoryの`fake()`の言語

=> `.env`を触る(`.env.example`も🐶)

`.env`を編集

```bash
APP_LOCALE=ja
APP_FALLBACK_LOCALE=ja
APP_FAKER_LOCALE=ja_JP
```

### 言語ファイルを置く

ルートディレクトリに`lang`がなければつくる。そして`lang/ja`も作る。

バリデーション用なら`lang/ja/validation.php`を作る。

```php
<?php

return [
    'required' => ':attribute は必須です🐶',

    'attributes' => [
        'title' => 'タイトル',
        'body'  => '本文',
    ],
];
```

### キャッシュクリア

反映しないときはやる🐶

```bash
php artisan config:clear
php artisan cache:clear

# または一発
php artisan optimize:clear
```

# php artisan lang:publish

これを実行すると、`lang/`, `lang/en/`, `lang/en/validaton.php`などが生成される。

そこから`ja`を作るのもあり🐶

# 日本語パッケージ(askdkc/breezejp)

`askdkc/breezejp`はLaravel Breeze(認証スターターキット)を日本語にする補助パッケージ。

Laravel本体の日本語化ではなくBreeze専用。

- Breezeの画面文言を日本語化
- Breezeのテストが期待する英語文言との差を吸収
- 日本語受けに `view / validation`を調整

`lang/ja/`に言語ファイルを追加してくれる便利なやつ🐶

[https://github.com/askdkc/breezejp](https://github.com/askdkc/breezejp)のREADMEを参照。

