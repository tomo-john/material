# CRUD

Laravelなどのフレームワークは`RESTfulな設計`というルールに従う。

このルールでは、CRUDの操作をURLの設計(名詞)とHTTPメソッド(動詞)の組み合わせで実現する。

リソース名: `dog`の例:

| 目的(CRUD)           | HTTPメソッド | 標準的なURL        | Controller | 処理の役割                              |
|----------------------|--------------|--------------------|------------|-----------------------------------------|
| 一覧表示(Read)       | GET          | `/dogs`            | index      | リソースをすべて表示                    |
| フォーム表示(Create  | GET          | `/dogs/create`     | create     | 新規作成フォーム                        |
| データ保存(Create)   | POST         | `\dogs`            | store      | フォームデータ受取・DB保存              |
| 詳細表示(Read)       | GET          | `/dogs/{dog}`      | show       | 特定のリソース(`ID: {dog}`)の詳細を表示 |
| 編集フォーム(Update) | GET          | `/dogs/{dog}/edit` | edit       | 編集フォーム                            |
| データ更新(Update)   | PUT/PATCH    | `/dogs/{dog}`      | update     | フォームデータ受取・DB更新              |
| データ削除(Delete)   | DELETE       | `/dogs/{dog}`      | destroy    | 特定のリソースをDBから削除              |

