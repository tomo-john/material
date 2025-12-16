# Eloquent ORM

ORM(Object-Relational Mapping)は、オブジェクトとリレーショナルデータベースの間をつなぐ仕組みのこと。

データベースのレコードをオブジェクトとして扱うことができる。

Eloquent ORMは、この2つを自動で翻訳してくれる通訳者のようなイメージ。

- `DOG`クラス = `dogs`テーブル
- `DOG`インスタンス = `dogs`テーブルの1行

| メソッド              | ORM/SQLでの意味                             | 役割                               |
|-----------------------|---------------------------------------------|------------------------------------|
| `Dog::all()`          | `SELECT * FROM dogs`                        | dogs テーブルの全てのデータを取得  |
| `Dog::create($data)`  | `INSERT INTO dogs (...) VALUES (...)`       | データベースに新しいレコードを作成 |
| `Dog::find($id)`      | `SELECT * FROM dogs WHERE id = $id LIMIT 1` | 特定のIDを持つ1件のデータを取得    |
| `$dog->update($data)` | `UPDATE dogs SET ... WHERE id = $dog->id`   | 既存のレコードを更新               |
| `$dog->delete()`      | `DELETE FROM dogs WHERE id = $dog->id`      | 特定のレコードを削除               |

これらのメソッド群は、`Eloquentメソッド`または`Eloquent ORMの機能`と呼ばれている。

親クラスである、`Illuminate\Database\Eloquent\Model`で定義されており、このModelクラスを継承するクラスで使用できる。

例: DogController.phpで`Dog:all`が使用できる仕組み

```php
<?php
// app/Http/Controllers/DogController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
  // index
  public function index()
  {
    $dogs = Dog::all();
    return view('dogs.index', compact('dogs'));
  }
}
```

=> `use App\Models\Dog`でDogクラスは`app\Models`のDogクラスと宣言している

`app/Models/Dog.php`を見て見ると...

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
  // 略
}
```

- `use Illuminate\Database\Eloquent\Model;`で`Model`クラスが`Illuminate\Database\Eloqunet`の`Model`クラスであること宣言
- `class Dog extends Model` => ここで`Dog`クラスを宣言!!! :dog:
- `extends Model`で`Model`クラスを継承している...! :dog:

:dog: なので`Dog`クラスで`Illuminate\Database\Eloquent\Model`クラスのメソッド(`all()`メソッドなど)が使用できる :dog:

