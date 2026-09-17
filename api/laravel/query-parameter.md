# クエリ文字列

HTTPリクエストにおいて、URLの`?`以降の部分はクエリ文字列(Query String)と呼ばれる。

これはリクエストBodyには含まれない。URL自体の一部として送信される。

## URLの構造(おさらい)

サンプルURL:

```text
https://tracenote.work/api/sandbox?id=123

https://       : スキーム
tracenote.work : ホスト
/api/sandbox   : パス
?id=123        : クエリ
```

実際のHTTPリクエスト

```http
GET /api/sandbox?id=123 HTTP/1.1       (パス+クエリ)
Host: tracenote.work                   (ホスト)

(Bodyは空)
```

URLは`スキーム` + `ホスト` + `パス` + `クエリ文字列`という構造になっている。

ブラウザやHTTPクライアントは、このURL全体を送信するのではなく、目的に応じて分解して送っている。

- スキームとホスト(`https://tracenote.work`): 接続先を決めるために使われ、`Host`ヘッダーとして送られる。
- パスとクエリ文字列(`/api/sandbox?id=123`): そのままリクエストラインに書かれる

クエリ文字列は(`?id=123`)はBodyには入らない。リクエストライン自体の中に含まれている。

GETリクエストはリクエストボディを使うことは一般的ではない。(持ってはいけないわけではないけど慣習的に持たない)

なので、(GETで)パラメータを渡したい場合は、このクエリ文字列を使うのが標準的な方法となる。

## 複数のQuery Parameter

```text
/api/sandbox?id=123&name=tomo
```

このように`&`を使用して複数のクエリ文字列をURLに含めることができる。

```text
Query Parameter
  |--- id = 123
  |--- name = tomo
```

ちなみに、

- `id=123`, `name=tomo`それぞれ => query parameter
- `id=123&name=tomo`自体 => query string

と区別することもある。

## Laravelでクエリ文字列扱う

`query()`メソッドで取得が可能。[参考](https://laravel.com/framework/docs/13.x/requests#retrieving-input-from-the-query-string)

```php
<?php

// クエリ文字列から値を取得
$request->query('id');

// 第2引数ではクエリ文字列にデータがない時の値を指定できる
$request->query('id', 'No id!');

// 引数なしでクエリ文字列すべての値を連想配列として取得
$request->query();
```

### curlめも

curlで複数クエリ文字列を試す時は、URL全体を`"`で囲んであげること。

```bash
curl "http://localhost:8000/api/sandbox2?id=123&name=tomo"
```

## query()とall()の違い

### query()

クエリ文字列を扱う(値を取得する)ためのメソッド。

Request Bodyの内容は取得しない。

### all()

受信したHTTPリクエストの入力データすべてを取得できるメソッド。

クエリ文字列、Bodyの内容どちらも取得ができる。

