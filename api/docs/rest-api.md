# REST API

REST APIとは、Webの仕組み(HTTPやURLなど)を活かして、リソースを扱うための設計スタイル。

RESTは「APIの種類」そのもとのいうより、APIをどう設計するかについての考え方・設計スタイル。

## RESTの正体

REST: Representational State Transfer の略。

直訳: 「リソースの状態を、表現(Representation)としてやり取りする」

- Representational: 表現による
- State: 状態
- Transfer: 転送・やり取り

=> データそのものではなく、「データの状態を表現したもの」をやり取りするという考え方。

## RESTの6つの制約

- Client-Server
- Stateless
- Cacheable
- Uniform Interface
- Layered System
- Code-On-Demand(任意)

=> 今回の学習では、`Stateless`と`Uniform Interface`を重点的に

## Client-Server

クライアントとサーバーの役割を分離する。

クライアント側がどういう画面を作るとか、サーバー側がどうやってデータを管理するかを分離できる。

## Stateless

Stateless = 状態を持たないという意味。

REST APIでは、「サーバーは、リクエストごとのクライアントの状態を保持しない」という考え方。

=> Laravelのセッションとここの設計は分けて考えること

## Cacheable

レスポンスをキャッシュして再利用してよいか、明示できるようにするという考え方。

頻繁に変わらないデータなどを次回キャッシュとして利用することで、毎回サーバーまでデータを取りにいかずに通信やサーバーの不可を減らせる。

HTTPにはそもそも、キャッシュに関する仕組みがある。

=> RESTは「HTTPのキャッシュ機構をちゃんと利用できるようにしようという思想」でもある

## Uniform Interface

Uniform Interface = 統一されたインターフェースという意味。

リソースを操作するためのルールを統一するということ。

- URL: 何を対象(リソース)にする？
- HTTPメソッド: どう操作する？

と役割を分ける。

```http
GET    /api/traces
GET    /api/traces/123
POST   /api/traces
PUT    /api/traces/123
DELETE /api/traces/123
```

上記のように、URLはリソースを表し、操作はHTTPメソッドで表現するという統一されたインターフェース。

## Layered System

クライアントは、通信相手のサーバー以外にどんな層が存在するかを意識しなくてよいという考え方。

実際には、`Client -> Nginx -> Laravel -> Service -> Database`みたいに複数の層が存在する。

でもcurlから見れば、`https://tracenote.work/api/traces`だけでOK。

## Code-On-Demand

これは`任意`の制約。

サーバーがクライアントに実行可能なコードを送る。

昔からある`JavaScript`などが代表的な例として考えられる。

## ここまでまとめ

| RESTの制約        | 概要                                         |
| ----------------- | -------------------------------------------- |
| Client-Server     | curl/Postman <-> Laravel API                 |
| Stateless         | 各Requestが独立して処理できる                |
| Cacheable         | HTTPのキャッシュ機構を利用できる             |
| Uniform Interface | URL＋HTTPメソッドでリソースを操作            |
| Layered System    | NginxやLaravelなどの層をクライアントから隠蔽 |
| Code-On-Demand    | サーバーからコードを渡す。任意               |

---

## Uniform Interfaceの4つの制約

Uniform Interfaceは、リソースを操作するためのインターフェースを統一されたルールにする考え方。

この考えを実現するために4つの制約がある。

- リソースの識別
- リソースの表現を通じた操作
- 自己記述的メッセージ
- HATEOAS

### 1. リソースの識別

RESTでは、URLによってリソースを識別する。

これはここまでに出てきた内容を同じ。

### 2. リソースの表現を通じた操作

サーバー上にある実際のリソースそのものを、クライアントが直接操作するわけではない。

クライアント側がサーバーに送るRequest, Responseを通じて、実際にサーバー上のDBにあるテーブルデータがJSONで返ってくる。(一例)

=> リソースがこんな状態ですよとJSONで表現

### 3. 自己記述的メッセージ

RequestやResponseそのものを見れば、「どうゆう内容なのか」を理解できるようにするという考え方。

=> 通信の意味を、そのメッセージ自身から判断できるということ

### 4. HATEOAS

HATEOAS = Hypermedia As The Engine Of Application State

考え方のイメージ:

```http
GET /api/traces/123
```

に対して、

```json
{
    "id": 123,
    "title": "Eloquent",
    "status": "understanding",
    "links": {
        "self": "/api/traces/123",
        "edit": "/api/traces/123",
        "delete": "/api/traces/123",
        "related": "/api/traces/123/relations"
    }
}
```

のように返す。

クライアント側は、「このリソースには、次にこうゆう操作・関連リソースがありますよ」という情報をResponseから知ることができる。

`Response` -> `現在のリソース` -> `次にアクセスできるURL` -> `クライアントが次の行動を判断`という考え方。

