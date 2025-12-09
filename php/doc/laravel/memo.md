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

---

### DB接続準備

```
# MySQL設定(rootにて)
sudo mysql -u root

CREATE DATABASE laravel_test CHARACTER SET utf8mb4;
# CREATE USER 'john'@'localhost' IDENTIFIED BY 'john1234'; # ユーザーはすでに作成済みの為不要
GRANT ALL PRIVILEGES ON laravel_test.* TO 'john'@'localhost';
FLUSH PRIVILEGES;
```

### .envファイル修正

修正前:

```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

修正後:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_test
DB_USERNAME=john
DB_PASSWORD=john1234
```

### Migration

マイグレーションファイルを作成:

```
php artisan make:migration create_dogs_table
```

作成されたマイグレーションファイルを編集:

```
# database/migrations/2025_12_dd_hhmmss_create_dogs_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->uniq();
            $table->integer('age',)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
```

マイグレーションの実行:

```
php artisan migrate
```

### Model作成

```
php artisan make:model Dog
```

### テストデータ作成(今回は手動)

```
mysql -u john -p laravel_test

INSERT INTO dogs (name, age) VALUES ('じょん', 2);
INSERT INTO dogs (name, age) VALUES ('ぴょんきち', 5);
```

### Controller修正

```
# app/Http/Controllers/DogController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 下記を追加
use App\Models\Dog;

class DogController extends Controller
{
    // dogへのリクエストを処理し、dog.blade.phpを表示するメソッド
    public function index()
    {
      $dogs = Dog::all();

      return view('dog', compact('dogs'));
    }
}
```

### Viewファイル修正

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

  @foreach ($dogs as $dog)
    <p>名前: {{ $dog['name']}} / 年齢: {{ $dog['age']}}
  @endforeach
</body>
</html>
```
---

# CSSメモ

- `npm install`で環境をセットアップ
- `npm run dev`を実行して、監視モードで開発サーバーを起動
- Bladeファイル内で、TailwindのクラスをHTMLタグに直接書いていく
- Bladeテンプレートの`<head>`内で`@vite(...)`を使ってCSSを読込む

