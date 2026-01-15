# クエリビルダ(Query Builder)

SQLを直接書かずに、安全で読みやすくDB操作できる仕組み。

裏側ではSQLが発行されているが、PHPのメソッドチェーンで書けるのが特徴。

`User:all()`などのEloquent(エロクアント)は、内部的にこのクエリビルダを使用している。

```php
<?php
$user = DB::table('users')->get();
```

これは裏ではこのSQLが実行されている。

```sql
SELECT * FROM users;
```

## Eloquentとの違い

| 項目           | クエリビルダ     | Eloquent           |
|----------------|------------------|--------------------|
| 使うもの       | `DB::table()`    | `Model`            |
| 戻り値         | stdClass         | Model              |
| 関連           | なし             | あり(リレーション) |
| 軽さ           | 軽い             | 少し重い           |
| 向いている場面 | 単純な取得・集計 | CRUD・業務ロジック |

- クエリビルダ

  ```php
  <?php
  DB::tables('posts')->where('published', true)->get();
  ```

- Eloquent

  ```php
  <?php
  $posts = Post::where('published', true)->get();
  ```

## Eloquentのクエリビルダ

```php
<?php
$posts = Post::query()
->when($this->search, fn($q) =>
    $q->where('title', 'like', '%' . $this->search . '%')
)->get();
```

`Post::query()`とは？

- Eloquentモデル(Post)からEloquent用のクエリビルダを取り出している状態
- 返ってくる型は`Illuminate\Database\Eloquent\Builder`
- `DB::table()`のクエリビルダではない
- Eloquent専用のクエリビルダ

### when()

条件が真のときだけ、クエリをちょっと書き換えるメソッド。

```php
<?php
->when(条件, コールバック)
```

- 条件が`true / truthy`のとき、コールバックを実行
- `false / null / 空文字`のとき、何もしない

### fn($q) =>

- クロージャ = 無名関数
- `fn()`はアロー関数(短縮クロージャ)

```php
<?php
// 通常クロージャ(長い版)
->when($this->search, function ($q) {
    $q->where('title', 'like', '%' . $this->search . '%');
})

// アロー関数(短い版)
->when($this->search, fn ($q) =>
    $q->where('title', 'like', '%' . $this->search . '%')
)
```

### $q

`$q`は任意の変数名、中身はクエリビルダ。

- `$q` = `Post::query()`の続き
- `$q`の正体 = `Eloquent\Builder`

変数名は何でもいいけど、慣習的に`$q`, `$query`が多い。

## よく使う芸

```php
<?php
// 条件に合うデータの件数を数える
$count = DB::table('posts')->where('user_id', 1)->count();

// 特定のカラムだけ合計する
$sum = DB::table('orders')->sum('price');

// 複雑な条件（OR検索など）
$users = DB::table('users')
            ->where('name', 'like', 'T%')
            ->orWhere('role', 'admin')
            ->get();
```

