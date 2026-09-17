# Sanctumのインストール

```
php artisan install:api
```

## 何をしてくれたのか？

### APIルートの追加

`php artisan install:api`に`api: __DIR__.'/../routes/api.php',`が追加され、`routes/api.php`が新規作成された。

=> APIのルーティングは`routes/api.php`に記述する

### personal_access_tokens テーブルの作成

`database/migrations/2026_..._create_personal_access_tokens_table.php`が追加。

インストール時にマイグレーションするか聞かれたので、マイグレーションも実行済み。

### Sanctum設定ファイルの追加

`config/sanctum.php`が新規作成。

=> これがSanctumの設定ファイル

