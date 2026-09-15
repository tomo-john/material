# Laravelでテスト用APIルートを作成する

## 1. LaravelでAPIルートを登録する

Laravelでは、`bootstrap/app.php` の `withRouting()` にAPIルートのファイルを指定することで、`routes/api.php` をAPI用のルートファイルとして登録できる。

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
```

今回追加したのは、

```php
api: __DIR__.'/../routes/api.php',
```

の部分。

これによってLaravelが `routes/api.php` をAPIルートとして読み込む。

## 2. `routes/api.php` にAPIルートを作る

`routes/api.php` に以下のテスト用ルートを作成した。

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/sandbox', function () {
    return "Hello API 🐶\n";
});
```

ここで重要なのは、ルートには `/api/sandbox` ではなく、

```php
Route::get('/sandbox', ...)
```

と書いていること。

## 3. 実際のURL

APIルートとして登録された `routes/api.php` のルートには、LaravelのAPIルートの設定によって `/api` が付く。

そのため、

```php
Route::get('/sandbox', ...)
```

に対して実際にアクセスするURLは、

```text
http://localhost:8000/api/sandbox
```

となる。


```text
bootstrap/app.php -> api: routes/api.php -> routes/api.php -> Route::get('/sandbox', ...) -> GET /api/sandbox
```

という関係になる。

## 4. ブラウザから確認

ブラウザで、

```text
http://localhost:8000/api/sandbox
```

にアクセスすると、

```text
Hello API 🐶
```

と表示された。

これによって、LaravelがAPIルートを認識していることを確認できた。

## 5. curlから確認

ターミナルから、

```bash
curl http://localhost:8000/api/sandbox
```

を実行すると、

```text
Hello API 🐶
```

が返ってきた。

curlはHTTPクライアントなので、このコマンドによってLaravelにHTTP Requestを送っている。

今回の場合は、HTTPメソッドを指定していないため、curlのデフォルトであるGETリクエストになる。

概念的には、

```http
GET /api/sandbox HTTP/1.1
```

というHTTP Requestを送っている。

Laravelはこのリクエストを、

```php
Route::get('/sandbox', ...)
```

にマッチさせ、Response Bodyとして、

```text
Hello API 🐶
```

を返している。

## 6. 今回確認できたこと

今回の実験によって、以下のことを実際に確認できた。

* LaravelでAPIルートを登録できる
* `bootstrap/app.php` の `api:` で `routes/api.php` をAPIルートとして登録できる
* `routes/api.php` では `/sandbox` と書く
* 実際のURLは `/api/sandbox` になる
* ブラウザからAPIにアクセスできる
* curlからAPIにHTTP Requestを送れる
* curlでHTTP ResponseのBodyを確認できる

## 7. Response Bodyの改行について

Response Bodyの最後に改行が必要というわけではない。

今回、

```php
return 'Hello API 🐶';
```

とすると、Response Bodyには文字列そのものが返るため、curlの表示がシェルのプロンプトとつながって見える。

```text
Hello API 🐶tomo@[TraceNote]$
```

ターミナル上で見やすくするために、

```php
return "Hello API 🐶\n";
```

とすれば、Response Bodyの末尾に改行を含めることができる。

ただし、この改行はAPIやHTTPに必要なものではなく、今回のターミナル表示を見やすくするためのもの。

