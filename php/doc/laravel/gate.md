# Gate

この人がこの操作をしてもいいか？を判断する仕組み。

- 認証(auth)とは別
- 認可(Authorization)の話

## Gateの設定(サンプル)

`app/Providers/AppServiceProvider.php`:

```php
<?php

// 以下のuse宣言を追加
use Illuminate\Support\Facades\Gate;
use App\Models\User;

// 略

    public function boot(): void
    {
        Gate::define('test', function (User $user) {
            if($user->id === 1) {
                return true;
            }
            return false;
        });
    }
...
```

- `test`という名前でGateを定義
- 引数にログインしているユーザーの情報
- 今回はidが1のユーザーなら`true`

### ルートにGateをかけてアクセス制限

```php
<?php
Route::get('/test', [TestController::class, 'test'])->name('test')->middleware('can:test');
```

- `->middleware('can:ゲート名')`
- これでidが1のuserしか`/test`にアクセスできない
- それ以外のユーザーは`403エラー`

### ビューにGateを付けて表示を制限

```blade
  @can('ゲート名')
      制限をかけたい部分
      ...
  @endcan
```

```blade
@can('test')
    <span class="text-white text-lg">あたなのidは1です🐶✨</span>
@endcan
```

### コントローラにGateを付けて動作を制限

```php
<?php

// use宣言を追加
use Illuminate\Support\Facades\Gate;

// 制限をかけるメソッドに以下を追加
public function xxx () {
  // これ
  Gate::authorize('test');
}
```

