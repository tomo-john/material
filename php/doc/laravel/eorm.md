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

