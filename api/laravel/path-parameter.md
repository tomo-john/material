# Path Parameter

- Query Parameter: `/api/sandbox?id=123`
- Path Parameter: `/api/sandbox/123`

同じIDを123の指定だけど、この2つは何が違うのか？

## Query Parameterの場合

```
/api/sandbox?id=123
```

- Query Parameterは`?id=123`

Laravelのルートにマッチしたあと、Requestオブジェクトから取得するイメージ。

```php
<?php
Route::get('/sandbox', function (Request $request) {
    return $request->query('id');
});
```

流れとしては、`HTTP Request` -> `Laravel` -> `Requestオブジェクト` -> `query('id')` -> `値`

## Path Parameterの場合

```
/api/sandbox/123
```

- `{id}`にURL内の`123`がマッチする

こっちは、LaravelのルーティングそのものがURLの一部を`{id}`に対応させる。

```php
<?php
Route::get('/sandbox/{id}', function ($id) {
    return [
        'id' => $id,
    ];
});
```

流れとしては、`HTTP Request` -> `Laravelのルーティング` -> `/sandbox/{id}`にマッチ -> `{ id = 123 }`として取り出す -> `$id`に渡される

これは、URLの一部をLaravelが直接引数にしているだけでなく、

> Laravelのルーティングが、HTTPリクエストのパスとルート定義を照合し、`{id}`の部分に入っている値をルートパラメータとして取り出し、コールバックの引数に渡している。

## Laravelがマッチさせているか確認

```php
<?php
Route::get('/sandbox3/{id}/detail', function ($id) {
    return [
        'id' => $id,
    ];
});
```

- `/sandbox3/123/detail` => {"id":"123"}
- `/sandbox3/detail` => 404 (マッチするURLがない)

参考: [ルートパラメータ](https://laravel.com/framework/docs/routing#route-parameters)

## QueryとPath Parameter -- 何のために使う？

ざっくりイメージ:

```bash
Path Parameter: 「どのリソースなの？」をURLのパスで指定する

Query Parameter: 「そのリソースをどう取得したいの？」を追加で指定する
```

Path Parameterは、特定のリソースを識別するためによく使われる。

一方で、Query Parameterは、絞り込みや検索、並び替えなどの追加で条件を指定する用途によく使用される。

### 1個 vs 複数

- 特定の1件: `GET /api/traces/123` => Path
- 一覧から条件付きで取得: `GET /api/traces?status=understanding` => Query

`trace/123`と`/traces?status=understanding`は単純に値の渡し方が違うだけでなく、URLが表現している対象そのものが違う。

`Path Parameter`はリソースを特定するための重要な値。

`Query Parameter`はリクエストに対する追加条件。

## 混ぜて使用することも可能

ルーティング:

```php
<?php
Route::get('sandbox4/{id}', function (Request $request, $id) {
    return [
        'id' => $id,
        'keyword' => $request->query('keyword'),
    ];
});
```

curlで確認:

```bash
curl "http://localhost:8000/api/sandbox4/123?keyword=Laravel"
```

