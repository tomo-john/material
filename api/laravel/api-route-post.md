# APIでPOSTのルーティングテスト

やりたいこと: `curl`よりPOSTメソッドでLaravelと通信。

## POSTされたHTTP Requestを受け取る

`$request`で受け取って、その中身を確認したい。

ポンコツ例:

```php
<?php

use Illuminate\Support\Facades\Route;

Route::post('/sandbox', function ($request) {
    return $request;
});
```

LaravelのRouteクロージャでは、`$request`と名前を書いただけでは、「HTTP Requestが入ってくる」とはならない。

Laravelに、「この引数にはHTTP Requestを渡してね」と伝える必要あり。

そのために型指定を使う:

```php
<?php
use Illuminate\Http\Request;

Route::post('/sandbox', function (Request $request) {
    //
});
```

> LaravelがHTTP Requestを表すRequestオブジェクトを用意して、Routeのクロージャに渡してくれる

## まずは表示だけさせてみる

```php
<?php
use Illuminate\Http\Request;

Route::post('/sandbox', function (Request $request) {
    return $request->input('message');
});
```

これで、

```bash
curl -X POST -H "Content-Type: application/json" -d '{"message":"Hello POST 🐶"}' http://localhost:8000/api/sandbox
```

とすると、`Hello POST 🐶`が返ってくる。

`input()`メソッドは、HTTPリクエストの中からクライアントの入力値を取り出すためのメソッド。

`-i`でHTTPレスポンスのヘッダーなども確認してみる。

```bash
curl -i -X POST -H "Content-Type: application/json" -d '{"message":"Hello POST 🐶"}' http://localhost:8000/api/sandbox

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.4.1
Content-Type: text/html; charset=utf-8
Cache-Control: no-cache, private
Date: Tue, 15 Sep 2026 01:55:20 GMT
Access-Control-Allow-Origin: *

Hello POST 🐶
```

Laravel側では、JSONを受け取って`$request->input('message')`としている。

その為、HTTPレスポンスのContent-Typeは`application/json`でなく、`text/html`となっている。

## ここまで整理

`$request`はLaravelが用意したRequestオブジェクト。

これはLaravelが`HTTP Request`をオブジェクトとして扱えるようにしたもの。

上記の例では、HTTP Requestの情報を扱うRequestオブジェクトである`$request`から、`input()`を使ってBodyの値を取得している。

RequestオブジェクトはHTTPリクエストそのものが入るというより、LaravelがHTTPリクエストを扱う為のオブジェクトであると考える。

=> Request: HTTP RequestをLaravel上で扱うためのクラス

## Laravel側の処理を変えてみる

```php
<?php

// 変更前
return $request->input('message');

// 変更後
return [
    'message' => $request->input('message'),
];
```

```bash
curl -i -X POST -H "Content-Type: application/json" -d '{"message":"Hello POST 🐶"}' http://localhost:8000/api/sandbox

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.4.1
Cache-Control: no-cache, private
Date: Tue, 15 Sep 2026 02:08:31 GMT
Content-Type: application/json
Access-Control-Allow-Origin: *

{"message":"Hello POST \ud83d\udc36"}
```

- HTTP Response Hederが`Content-Type: application/json`
- BodyもJSON

=> Laravelが配列を自動的にJSONとしてHTTPレスポンスにしてくれているのもわかる

## HTTPリクエストのAccept:

これは、リクエスト側が返して欲しい形式を指定する。(Header)

=> 希望だけで強制とかではない

サーバー側で、JSONでもXMLでも返せるよってときにこの`Accept:`の記載によってHTTPレスポンスの形式を希望通りにしてあげたりする。

今回のテスト環境では、サーバー側はJSONしか返さない状態で、`Accept: text/html`してもHTTPレスポンスのBodyがJSON形式だったことも確認。

```bash
curl -v -H "Content-Type: application/json" -H "Accept: text/html" -d '{"message":"Hello POST 🐶"}' http://localhost:8000/api/sandbox

*   Trying 127.0.0.1:8000...
* Connected to localhost (127.0.0.1) port 8000 (#0)
> POST /api/sandbox HTTP/1.1
> Host: localhost:8000
> User-Agent: curl/7.81.0
> Content-Type: application/json   # 送るBodyの形式はJSONです
> Accept: text/html                # できたらtext/htmlで欲しいです
> Content-Length: 29
>
* Mark bundle as not supporting multiuse
< HTTP/1.1 200 OK
< Host: localhost:8000
< Connection: close
< X-Powered-By: PHP/8.4.1
< Cache-Control: no-cache, private
< Date: Tue, 15 Sep 2026 02:20:50 GMT
< Content-Type: application/json  # JSONです
< Access-Control-Allow-Origin: *
<
* Closing connection 0
{"message":"Hello POST \ud83d\udc36"}
```

