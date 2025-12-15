# ルーティング

`routes/web.php`

## シンプルなGETルート定義

```php
<?php

Route::get('/simple', function() {
  return `こんにちは、Laravel`;
});

Route::get('/home', function(){
  return view('home');
});

```

- `/simple`にアクセスすると無名関数の処理(`return`の行の処理)が実行される
- `/home`にアクセスすると`resources/views/home.blade.php`が表示される

## Route::name()メソッド

ルートに一意の名前を付けることができる。

Bladeテンプレート内で`route()`メソッドでリンクを作成するための重要な処理。

```php
<?php
Route::get('/dogs/detail/{id}', [DogController::class, 'show'])->name('dogs.detail')
```

Bladeでの使用例:

```blade
<a href="{{ route('dogs.detail', ['id' => 10]) }}">詳細へ</a>
<a href="{{ route('dogs.detail', $dog) }}">詳細へ</a>
```

## コントローラとメソッドを指定するGETルート

```php
<?php
Route::get('/dogs_list', [DogController::class, 'index']);
```
- `/dogs_list`にアクセスすると、DogControllerのindexメソッドが実行される

## Resource Routing

LaravelではCRUD処理を行うコントローラ群をまとめて定義する機能が用意されている。

```php
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;

// Dogモデルのための7つのルートを自動生成する
Route::resource('dogs', DogController::class);
```

この一行の記述が、以下の7つのルートすべてを自動で定義してくれる。

### リソースルーティングの全貌

| HTTPメソッド | URI               | 対応アクション | ルート名(`route()`で使用) | 役割                         |
|--------------|-------------------|----------------|---------------------------|------------------------------|
| GET          | `/dogs`           | `index`        | `dogs.index`              | 一覧の表示                   |
| GET          | `/dogs/create`    | `create`       | `dogs.create`             | 新規作成フォームの表示       |
| POST         | `/dogs`           | `store`        | `dogs.store`              | 新規データの保存実行         |
| GET          | `dogs/{dog}`      | `show`         | `dogs.show`               | 特定データの詳細表示         |
| GET          | `dogs/{dog}/edit` | `edit`         | `dogs.edit`               | 特定データの編集フォーム表示 |
| PUT/PATCH    | `dogs/{dog}`      | `update`       | `dogs.update`             | 特定データの更新実行         |
| DELETE       | `dogs/{dog}`      | `destroy`      | `dogs.destroy`            | 特定データの削除実行         |

上の表で`{dog}`となっている部分が重要。

URLのこの部分に、操作を行う特定のID(例: `/dog/2`)が入る。

この`{dog}`という名前が、コントローラのメソッドで`$dog`という変数名に対応する。

Laravelは、このURLパラメータの値を自動で取得し、対応するモデル(`Dog`)を見つけ出す。

そのモデルのインスタンス(`Dog $dog`)としてコントローラの引数に渡してくれる。

=> コントローラ内で`Dog::findOrFail($id)`と書く手間が省ける

この仕組みが`Route Model Binding`という。

### リソースルーティングを使用しない書き方

```php
<?php
Route::get('dogs', [DogController::class, 'index'])->name('dogs.index');
Route::get('dogs/create', [DogController::class, 'create'])->name('dogs.create');
Route::post('dogs', [DogController::class, 'store'])->name('dogs.store');
Route::get('dogs/{dog}', [DogController::class, 'show'])->name('dogs.show');
Route::get('dogs/{dog}/edit', [DogController::class, 'edit'])->name('dogs.edit');
Route::put('dogs/{dog}', [DogController::class, 'update'])->name('dogs.update');
Route::delete('dogs/{dog}', [DogController::class, 'destroy'])->name('dogs.destroy');
```

