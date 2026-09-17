# Token

Token = API側が「誰からのリクエストなのか」を確認するための認証情報。

## イメージ

```
# 初回はパスワードで認証
Client ---> (ID + PASS) ---> API(本人確認OK) ---> (Tokenを発行) ---> Client
```

例えば、`Token = abc123xyz`をもらったとする。

以降のAPIリクエストでは、

```http
GET /api/traces
Authorization: Bearer abc123xyz
```

と送るとAPI側では、

```
Token --> 「このTokenの持ち主は誰？」 --> Userを特定
```

みたいなもの。

## Tokenを使うメリット

- パスワードをAPI利用のたびに送らなくてよくなる
- 使い捨ての認証情報に近い形で扱える

Tokenに有効期限を設定でき、期限が切れたらそのTokenは使えなくする。

パスワードは、本人そのものを確認するための秘密情報。

TokenはAPIを利用するために発行された認証情報。

## Tokenだから安全というわけではない

Tokenも、それを盗まれたらそのTokenを使ってAPIを利用される可能性がある。

- HTTPSを使う
- Tokenを適切に保管する
- 有効期限を設ける
- 必要ならTokenを失効させる
- 必要最小限の権限にする

などが重要となる。


## Bearer Token

APIなどの保護されたリソースにアクセスする時、「そのトークンも持っている人(Bearer)」

に対してのみ権限を許可する、認証・認可の仕組み(文字列)。

- 送信方法: HTTP RequestのHeader(Authorization)に指定
- 記述方式: `Authorization: Bearer <取得したトークン文字>`

## 4つの言葉

| 用語         | ざっくり意味                                             |
| ------------ | -------------------------------------------------------- |
| API Key      | APIを利用するための識別・認証用のキー                    |
| API Token    | APIアクセスに使うToken。かなり広い呼び方                 |
| Access Token | APIなどのリソースへアクセスするためのToken               |
| Bearer Token | 「このTokenを持っている者」を認証する方式で使われるToken |

```text
Password: 最初の本人確認

Access Token: その後のAPIアクセス

Bearer: TokenをAuthorization Headerで提示する方式

Policy: 認可
```

