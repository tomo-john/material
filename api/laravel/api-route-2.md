# apiルートでJSONを返してみる

[これ](./route-api)の続き。

> Laravelが、PHP配列をHTTP Responseとして返すときにJSONへ変換してくれる

## JSON用テストルーティングの追加

`routes/api.php`に下記のルーティングを追加:

```php
<?php

Route::get('/sandbox2', function () {
    return [
        'id' => 123,
        'title' => 'JSON Test',
        'message' => 'Hello JSON',
    ];
});
```

`curl`で確認してみる(`-i`でResponse Headerも表示):

```bash
curl -i http://localhost:8000/api/sandbox2

HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.4.1
Cache-Control: no-cache, private
Date: Tue, 15 Sep 2026 00:06:20 GMT
Content-Type: application/json
Access-Control-Allow-Origin: *

{"id":123,"title":"JSON Test","message":"Hello JSON"}
```

ルーティングではPHP配列を返しているが、HTTPレスポンスではJSONが返ってきている。

=> Laravelでは配列をルートやコントローラから返すと、自動的にJSONへ変換してくれる。

## Laravelルーターの自動判定

| 返り値の型                              | Laravelの挙動                              |
| --------------------------------------- | ------------------------------------------ |
| 文字列                                  | そのままHTTPレスポンスボディに             |
| 配列                                    | JsonResponseに変換(json_encodes相当の処理) |
| Eloquentモデル/コレクション             | JsonResponseに変換(toArray() -> JSON化)    |
| `Illuminate\Http\Response\JsonResponse` | そのまま使われる                           |


