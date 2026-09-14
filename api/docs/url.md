# URLとは何か？

URL = Uniform Resource Locator

> Weib上にあるリソースの場所を示すもの

## Resource

これは、単純に「ページ」だけではない。

- Webページ
- 画像
- CSS
- JavaScript
- APIエンドポイント
- 動画

など、Web上でアクセスできる対象を広く「リソース」として考えれれる。

## URLを分解

```text
https://tracenote.work/api/traces?page=2
```

- `https`: scheme
- `tracenote.work`: host
- `api/traces`: path
- `?page=2`: query

### Scheme

`https://`これはどの方式・プロトコルを使ってアクセスするかを示す部分。

### Host

`tracenote.work`はホスト。

ここではどのホスト(サーバー)にアクセスするかを示す。

### Path

`/api/traces`はそのホスト上のどのリソースを対象にするかを示す。

### Query

`?page=2`はリソースに対する追加の条件やパラメータを示す。

## HTTP Request

```http
GET /api/traces?page=2 HTTP/1.1
Host: tracenote.work
```

URLとしてみると、`https://tracenote.work/api/traces?page=2`だったものがこうなる。

HTTP Requestは、このURLなどの情報を含めて、HTTPのルールに従ってサーバーへ要求を送るメッセージ。

