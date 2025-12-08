# CRUD

Laravelなどのフレームワークは`RESTfulな設計`というルールに従う。

このルールでは、CRUDの操作をURLの設計(名詞)とHTTPメソッド(動詞)の組み合わせで実現する。

リソース名: `dog`の例:

| 目的(CRUD)           | HTTPメソッド | 標準的なURL        | Controller | 処理の役割                              |
|----------------------|--------------|--------------------|------------|-----------------------------------------|
| 一覧表示(Read)       | GET          | `/dogs`            | index      | リソースをすべて表示                    |
| フォーム表示(Create  | GET          | `/dogs/create`     | create     | 新規作成フォーム                        |
| データ保存(Create)   | POST         | `/dogs`            | store      | フォームデータ受取・DB保存              |
| 詳細表示(Read)       | GET          | `/dogs/{id}`       | show       | 特定のリソース(`{id}`)の詳細を表示      |
| 編集フォーム(Update) | GET          | `/dogs/{id}/edit`  | edit       | 編集フォーム                            |
| データ更新(Update)   | PUT/PATCH    | `/dogs/{id}`       | update     | フォームデータ受取・DB更新              |
| データ削除(Delete)   | DELETE       | `/dogs/{id}`       | destroy    | 特定のリソースをDBから削除              |

ルーティングの設定では、以下のように記載するとたった一行でCRUDすべてのURLが生成される。(DogControllerの例)

```
# routes/web.php

use App\Http\Controllers\DogController;

Route::resource('dogs', Dogcontroller::class);
```

