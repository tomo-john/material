# MVC

## ルーター

リクエストをどのコントローラのどのメソッドで処理するかを割り振る。

`routes/web.php`ファイルなど。

## コントローラ

リクエストを実際に処理していく。

`app/Http/Controllers`の中に作っていく。

## モデル

データベースとの連携係。

`app/Models`の中に作成する。

新しいテーブルや、テーブルにカラムを追加するときは、`database/migrations`の中にマイグレーションファイルを作成。

=> `php artisan migrate`で反映

## ビュー

ブラウザに表示する部分。

LaravelえはBladeテンプレートエンジンを使って作成。

=> 拡張子: `blade.php`

コードを入れる部分には`@`を使用。

`resources/views`に中に作っていく。

