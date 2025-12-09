# CRUD

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

## ルーティング

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

## Controller作成時のオプション

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

---

# 超初級CRUD作成メモ

- マイグレーションファイルの作成
- マイグレーションファイル編集
- マイグレーションの実行
- モデル作成
- ルーティング
- コントローラ作成
- コントローラ編集
- ビューファイル作成・編集

