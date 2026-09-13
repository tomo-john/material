# HTTPメソッド

HTTPメソッドって、そもそも何のためにあるのか？

## HTTPメソッドとは？

> HTTP Requestで、対象のリソースに対して「どのような操作・意図を持っているのか」示すもの

- URL / Path: どのリソースを対象とする？
- HTTP Method: そのリソースに何をしたい？

## どこにある？

HTTP Requestの最初の1行目(Request Line)の一番最初。

```http
GET /traces HTTP/1.1
```

=> この`GET`がHTTPメソッド

## なぜメソッドが必要なのか？

例えば、`traces`という同じ対象に対して、

- Traceを取得したい
- Traceを新しく作りたい
- Traceを削除したい

という複数の操作をしたいものとする。

もしURLだけで表現するなら、

- /traces
- /traces-create
- /traces-delete

みたいに操作ごとにURLを変えたくなるかもしれない。

HTTPでは、

```text
GET    /traces
POST   /traces
DELETE /traces
```

のように、同じ対象に対してメソッドによって「何をしたいのか」を表現できる。

=> これがHTTPメソッドの大きな役割

## 代表的なHTTPメソッド

| メソッド | 大まかな意図                       |
| -------- | ---------------------------------- |
| GET      | リソースを取得                     |
| POST     | リソースを作成する・処理を依頼する |
| PUT      | リソースを置き換える               |
| PATCH    | リソースの一部を変更する           |
| DELETE   | リソースを削除する                 |

=> [HTTPリクエストメソッド](https://developer.mozilla.org/ja/docs/Web/HTTP/Reference/Methods)

