# CRUD

- C: Create
- R: Read
- U: Update
- D: Delete

Laravelなどのフレームワークは`RESTfulな設計`というルールに従う。

このルールでは、CRUDの操作をURLの設計(名詞)とHTTPメソッド(動詞)の組み合わせで実現する。

リソース名: `dog`の例:

| 目的(CRUD)            | HTTPメソッド | 標準的なURL        | Controller | 処理の役割                              |
|-----------------------|--------------|--------------------|------------|-----------------------------------------|
| 一覧表示(Read)        | GET          | `/dogs`            | index      | リソースをすべて表示                    |
| フォーム表示(Create)  | GET          | `/dogs/create`     | create     | 新規作成フォーム                        |
| データ保存(Create)    | POST         | `/dogs`            | store      | フォームデータ受取・DB保存              |
| 詳細表示(Read)        | GET          | `/dogs/{id}`       | show       | 特定のリソース(`{id}`)の詳細を表示      |
| 編集フォーム(Update)  | GET          | `/dogs/{id}/edit`  | edit       | 編集フォーム                            |
| データ更新(Update)    | PUT/PATCH    | `/dogs/{id}`       | update     | フォームデータ受取・DB更新              |
| データ削除(Delete)    | DELETE       | `/dogs/{id}`       | destroy    | 特定のリソースをDBから削除              |

# ルーティング

ルーティングの設定では、以下のように記載するとたった一行でCRUDすべてのURLが生成される。(DogControllerの例)

```
# routes/web.php
use App\Http\Controllers\DogController;

Route::resource('dogs', Dogcontroller::class);
```

手動で定義した場合の例:

```
Route::get('dogs', [DogController::class, 'index'])->name('dogs.index');
Route::get('dogs/create', [DogController::class, 'create'])->name('dogs.create');
Route::post('dogs', [DogController::class, 'store'])->name('dogs.store');
Route::get('dogs/{dog}', [DogController::class, 'show'])->name('dogs.show');
Route::get('dogs/{dog}/edit', [DogController::class, 'edit'])->name('dogs.edit');
Route::put('dogs/{dog}', [DogController::class, 'update'])->name('dogs.update');
Route::delete('dogs/{dog}', [DogController::class, 'destroy'])->name('dogs.destroy');
```

# Controller作成時のオプション

`php artisan make:controller`コマンドを使うときに、最後に`--resource`オプションを付ける。

```
php artisan make:controller DogController --resource
```

こうするとCRUDに必要な空っぽのメソッドが全て揃った状態のファイルが生成される。

さらに、Modelと一緒に作りたい場合は、`--model`オプションも追加してあげる。

```
php artisan make:controller DogController --resource --model=Dog
```

この場合、`show`, `edit`, `update`, `destroy`の引数が`$id`ではなく、`Dog $dog`になる。

=> 最初からRoute Model Bindingの形式になってくれる

=> ただし、Modelは別途`php artisan make:model Dog`で作ってあげる必要があるので注意

# Controller基本設計(例: Dog)

`app/Http/Controllers/DogController.php`

Dogモデルに対応したコントローラを想定。(Dogモデルは作成済み)

## use App\Models\Dog;

コントローラファイルに必要な記述。

これは、PHPが`Dog`という名前をどこで探せばいいかを教えるための宣言。

- 1.PHPのフルネーム(名前空間)のルール

  PHPでは、クラス名が他のファイルと重複しないように、全てのクラスに苗字(名前空間)が付けられている。

  - `Dog`モデルのフルネーム: `\App\Models\Dog`

    - `\App\Models`が苗字(名前空間)
 
 コントローラファイルの先頭にも自身の苗字が書かれている。

 => `namespace App\Http\Controllers;`

- 2.`use`が無いとどうなるのか？(エラーの原因)

  `use App\Models\Dog;`を書かずにコントローラ内で`Dog::all()`と書いた場合、PHPは以下のように解釈する。

  => `Dog`クラスを使うのか、ここは`App\Http\Controllers`の中だから、フルネームは`App\Http\Controllers\Dog`だな :dog:

  PHPはコントローラファイルと同じ苗字を持つ`Dog`クラスを探すが、実際にはそんなクラスは存在しない

  => クラスが見つかりません(`Class 'App\Http\Controllers\Dog' not found`)エラーが出る

- 3. `use`の役割: フルネームの省略

  ここで、`use App\Models\Dog;`の登場。

  PHPに対して、`Dog`と書いたら、それは`App\Models\Dog`のことだよと教えるショートカット(エイリアス)の役割を果たす。
  
  これによって、コントローラファイルに`Dog:all()`と書くだけでPHPは`App\Models\Dog::all()`を実行してくれる :dog:

- 4. `app/Models/Dog.php`も見てみる

  ```php 
  <?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class Dog extends Model
  ```

  - `namespace`で自身の苗字(名前空間)を定義
  - `use`で`Model`は`Illuminate\Database\Eloquent`の`Model`だと定義
  - `class Dog ...` => ここで`Dog`クラスを定義している...!!! :dog:
  - `extends`で`Model`クラス(`Illuminate\Database\Eloquent\Model`)を継承

## index

```php
<?php
public function index()
{
  $dogs = Dog::all();
  return view('dogs.index', compact('dogs'));
}
```

### Dog::all();

データベースの`dogs`テーブルにある全てのレコード取得する。

=> 内部で`SELECT * FROM dogs`というSQL文が実行される

コレクション(Collection)と呼ばれる特別な配列オブジェクトを返す。

このコレクションの中には取得されたレコード数分の`Dog`クラスのインスタンス(オブジェクト)が格納されている。

### compact('dogs')

どうして`compact($dogs)`ではダメなのか？ :dog:

`compact()`はLaravelのヘルパー関数ではなく、PHPの標準機能として組み込まれている関数。

引数で渡された文字列(変数名)を探し、その変数名と変数の値を使って連想配列を生成する役割。

=> 引数として渡された文字列を`キー`として利用する

=> なので引数として渡す値は`$dogs`ではなく、変数の名前(文字列)である`'dogs'`を渡す必要がある

`compact('dogs')`は`'dogs'`という文字列を見て、`$dogs`の値(ここでは、`Dog::all()`)を取得。

`return view('dogs.index', compact('dogs'));`

これは、`return view('dogs.index', ['dogs' => $dogs]);`と同じ意味になる。

`compact()`は複数の変数を一度に渡すことも可能。その場合も全てカンマ区切りの文字列で渡す。

```php
<?php
$dogs = Dog::all();
$count = $dogs->count();

return view('dogs.index', compact('dogs', 'count'));

// 生成される配列: ['dogs' => $dogsの値, 'count' => $countの値]
```

