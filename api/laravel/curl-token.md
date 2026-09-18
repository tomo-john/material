# curlで発行したTokenを使ってみる

事前対応: [未認証時のリダイレクト先対応](./laravel-authentication.md)

## Sanctum導入時に作られていたAPIルーティング

`routes/api.php`:

```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
```

- APIルーティングなので、実際のPathは`/api/user`

`Tinker`でToken作成した時のメモ:

```text
+plainTextToken: "1|bcSfSLmkUWv0JwZ70QHnFQc5moeFQF1O73jKtFDl7a4e8d65",
```

=> これをHTTP Requestで使用する

## curl

```bash
curl -i -H "Authorization: Bearer 1|bcSfSLmkUWv0JwZ70QHnFQc5moeFQF1O73jKtFDl7a4e8d65" http://localhost:8000/api/user
```

```http
HTTP/1.1 200 OK
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.4.1
Cache-Control: no-cache, private
Date: Fri, 18 Sep 2026 05:57:53 GMT
Content-Type: application/json
Access-Control-Allow-Origin: *

{"id":1,"name":"API User","email":"api@example.com","email_verified_at":null,"created_at":"2026-09-17T12:54:51.000000Z","updated_at":"2026-09-17T12:54:51.000000Z"}
```

