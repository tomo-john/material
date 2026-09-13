# HTTP Response

> サーバーがクライアントから受けったHTTP Requestに対して返す、HTTPのルールに従った応答メッセージ。

ブラウザはそのResponseを受け取って、そのHTMLを表示するだけ。

## HTTP Responseの中身

Requestと同じように、Responseも決められた構造を持ったメッセージ。

```http
HTTP/1.1 201 Created
Content-Type: application/json
Location: http://example.com/users/123

{
  "message": "新しいユーザーが作成されました",
  "user": {
    "id": 123,
    "firstName": "例の",
    "lastName": "人物",
    "email": "bsmth@example.com"
  }
}
```

- Status Line
- Headers
- Body

から構成される。(先頭行の名前がRequestと異なる)

### Status Line

```http
HTTP/1.1 200 OK

protocol status-code status-text
```

- protocol: HTTPバージョン
- status-code: 数値のコードでリクエストが成功したか、失敗したかを示す(詳しくは[ここ](./status-code.md))
- status-text: ステータスコードの簡潔なテキスト説明

### Header

```http
Content-Type: text/html
```

=> Response BodyにはHTMLが入っていますという情報

つまり、サーバーが返すResponseについての追加情報がはいっている。

### Body

ほとんどの場合は、レスポンス本体が含まれる。

リクエストが成功した場合、レスポンス本体には、クライアントが`GET`リクエストで要求したデータが含まれる。

TraceNoteの`/traces`ならResponse BodyにHTMLが入っているイメージ。

## APIならどうなる？

例えば、`GET /api/traces`にRequestを送ったとする。

サーバーがAPIとしてデータを返すなら、

```http
HTTP/1.1 200 OK
Content-Type: application/json

[
    {
        "id": 1,
        "title": "HTTPとは何か"
    }
]
```

のようなResponseになる。

