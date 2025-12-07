# memo

## LaravelのMVC体験

### プロジェクトの作成

```
# 実行したカレントディレクトリに dog-app ディレクトリができる
composer create-project laravel/laravel dog-app
```

### サーバー起動

```
# 作成した dog-app の直下で実行
php artisan serve
```

### ルーティング

```
# routes/web.php
<?php

use Illuminate\Support\Facades\Route;
// 以下を追加
use App\Http\Controllers\DogController;

Route::get('/', function () {
    return view('welcome');
});

// 以下を追加
Route::get('/dog', [DogController::class, 'index']);
```

### コントローラ作成

```
php artisan make:controller DogController
```

### Controllerにメソッド追加

```
# app/Http/Controllers/DogController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogController extends Controller
{
    // dogへのリクエストを処理し、dog.blade.phpを表示するメソッド
    public function index()
    {
      return view('dog');
    }
}
```

### Viewファイル作成

```
# resources/views/dog.blade.php
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>DOG</title>
</head>
<body>
  <h1>Hello Laravel🐶✨</h1>
</body>
</html>
```

