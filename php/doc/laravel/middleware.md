# ミドルウェア

リクエストがルート設定で割り振られた後、コントローラで処理を行う前(または後)に処理を実行する。

例えばログイン済みユーザーしか表示されないページ、adminユーザーしか表示されないページの作成ができる。

ミドルウェアには、最初から利用できるミドルウェアもあり必要に応じてルートで呼び出したり消したりできる。

新たに登録するミドルウェアは、`bootstrap/app.php`の`withMiddleware()`に設定を行う。

## 標準ミドルウェア

ルートに設定に書くだけで最初から使用できるミドルウェア:

- `auth`: ログイン必須
- `verified`: メール認証必須
- `guest`: 未ログインのみ

## 自作ミドルウェア(管理者のみアクセス許可)作り方サンプル

### ミドルウェアファイルを作成

```bash
php artisan make:middleware RoleMiddleware
```

作成された`app/Http/Middleware/RoleMiddleware.php`を編集:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 'admin') {
            return $next($request);
        }

        return redirect()->route('dashboard');
    }
}
```

- ログインユーザーの`role`がadminなら次の処理に進む
- そうでないならdashboardにリダイレクト

### ミドルウェアを登録

`bootstrap/app.php`:

```php
<?php
// use宣言を追加
use App\Http\Middleware\RoleMiddleware;

// (略)

    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => RoleMiddleware::class
        ]);
    })
...
```

- `admin`という名前で作成した`RoleMiddleware`を追加

### ミドルウェアをルート設定に反映

```php
<?php
Route::get('post/create', [PostController::class, 'create'])->middleware('admin');
```

`post/create`にadmin以外でアクセスするとダッシュボードにリダイレクトされる。

### 複数のミドルウェアをルートに設定

上記の`post/create`に`auth`ミドルウェアも追加する場合:

```php
<?php
Route::get('post/create', [PostController::class, 'create'])->middleware(['auth', 'admin']);
```

### 複数のルートにまとめてミドルウェアを設定

```php
<?php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('post/create', [PostController::class, 'create']);
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post', [PostController::class, 'index']);
});
```

