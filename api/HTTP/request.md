# HTTP Request

```text
HTTP
＝ クライアントとサーバーが
   Web上で通信するときのルール・プロトコル

HTTP Request
＝ クライアントがサーバーへ要求するときに送る
   HTTPのルールに従ったメッセージ
```

HTTP Requestには「お願いの内容」だけでなく、いろいろな情報が含まれている。

## HTTP Requestの中身

大きく分けた構造:

```text
HTTP Request
│
├─ Request Line（リクエストライン）
│
├─ Headers（ヘッダー）
│
└─ Body（ボディ）
```

=> Bodyは必ず存在するわけではない

概念的なもの:

```text
> GET / HTTP/1.1
> Host: tracenote.work
> User-Agent: curl/8.7.1
> Accept: */*
> 
```

### Request Line

最初の1行: `GET / HTTP/1.1`

- GET: HTTPメソッド
- /: 対象
- HTTP/1.1: HTTPバージョン

=> 何をしたいのか、何を対象にするのか、どのHTTPバージョンを使うのか

### Headers

- Host: tracenote.work
- Accept: */*

ここは、Requestに関する追加情報・補足情報

HTTP Headersはめちゃくちゃ種類があるので、今は全部覚えない。

- Request Line => リクエストそのものの基本情報
- Headers => リクエストに関する追加情報

### Body

ユーザーがフォームからサーバーにデータを送る場合、そのデータをRequest Bodyに入れて送ることがある。

Requestに本体が含まれているかどうかは、先頭行とHTTPヘッダーによって決定される。

## イメージ

```bash
POST / HTTP1.1                        # 先頭行
Host: developer.mozilla.org           # ヘッダー
User-Agent: curl/8.6.0
Accept: */*
Content-Type: application/json
Content-Length: 345                   # ヘッダーここまで
                                      # 空行
{                                     # 以下本体
"data": "dog11"
}
```

## まとめ

HTTP Requestは、「お願い」そのものだけでなく、そのお願いを伝えるための情報が構造化されて入ったメッセージ。

そのメッセージの構造としてはRequest Line(先頭行)、Header(複数行)、Body(ない場合もあり)に分かれている。

- Request Line: リクエストそのものの基本情報
- Header: リクエストに対する追加情報
- Body: サーバー側に送りたい内容

Bodyの有無は、Request Line, Headerで決めらる。

空行により、Headerの終了とBodyの開始を区切られる。

