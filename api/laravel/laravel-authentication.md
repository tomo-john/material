# 未認証時リダイレクト先変更

TokenなしでcurlでAPIルートにアクセスしたら、`login`へリダイレクトされて500エラーが返ってきた。

```bash
# 最初はTokenなしでどうなるか試すつもりだった
curl -i http://localhost:8000/api/user
```

結果(抜粋):

```http
HTTP/1.1 500 Internal Server Error
```

```json
{
    "message": "Route [login] not defined.",
    "exception": "Symfony\\Component\\Routing\\Exception\\RouteNotFoundException"
}
```

500エラーの経緯:

```text
curl -> GET /api/user -> auth:sanctum -> 認証情報ないからloginへ飛ばそう -> loginのルートないじゃん -> 500 Internal Server Error
```

もう少し詳しく(認証ミドルウェア: `Authenticate`の未認証時の挙動):

```php
<?php
protected function redirectTo(Request $request): ?string
{
    return $request->expectsJson() ? null : route('login');
}
```

`expectJson()`はリクエストの`Acceptヘッダー`を見て判断。

`curl`のRequest Headerに`application/json`がない => `false` => `route('login')`が呼ばれて500エラー。

```bash
curl -i http://localhost:8000/api/user -H "Accept: application/json"
```

```http
HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.4.1
Cache-Control: no-cache, private
Date: Fri, 18 Sep 2026 04:41:34 GMT
Content-Type: application/json
Access-Control-Allow-Origin: *

{"message":"Unauthenticated."}
```

=> curlにRequest Header(application/json)つけたらちゃんと`401`が返ってきた。

## 今回対応してみた方法(これが正解ではない)

`bootstrap/app.php`を編集:

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException; // 追加

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // 追加
        $middleware->redirectGuestsTo(fn () => null);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        // 追加
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        });
    })->create();
```

### $middleware->redirectGuestsTo(fn () => null);

> 「未認証GuestをRedirectさせる必要がある場合でも、Redirect先は null だよ」

### $exceptions->render(function (AuthenticationException $e, Request $request) { ... }

> 「AuthenticationExceptionが発生したら、このClosureでResponseを作ってね」 => 401

### $exceptions->shouldRenderJsonWhen( ... );

> 「このRequestで例外をResponseにするとき、JSONとしてレンダリングする？」を判断 => JSON

### 全体の流れ

```bash
GET /api/user
        ↓
auth:sanctum
        ↓
Tokenなし
        ↓
AuthenticationException
        ↓
未認証時のRedirect先を確認
        ↓
redirect先 = null
        ↓
Exception Handling
        ↓
AuthenticationException用render()
        ↓
response()->json(..., 401)
        ↓
HTTP 401
```

### 最終

```bash
curl -i http://localhost:8000/api/user
```

```http
HTTP/1.1 401 Unauthorized
Host: localhost:8000
Connection: close
X-Powered-By: PHP/8.4.1
Cache-Control: no-cache, private
Date: Fri, 18 Sep 2026 05:22:53 GMT
Content-Type: application/json
Access-Control-Allow-Origin: *

{"message":"Unauthenticated."}
```

