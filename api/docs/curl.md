# curl

> curl = cURL = Client URL

コマンドラインからHTTPクライアントとして、URLに対して通信ができるコマンド。

=> ブラウザを使わずに、自分でHTTP Requestを送ってResponseの確認ができる

## 超基本

```bash
curl https://tracenote.work
```

これで、curlが指定したURLにHTTPリクエストを送る。

何も指定しなければ、基本的にGETとなる。

サーバーからはResponseが返ってきて、ターミナル上に表示される。

デフォルトではResponseの`Body`が表示される。

## オプション

- `-v`: 通信の詳細(verbose)を表示
- `-i`: レスポンスヘッダーも表示
- `-X`: HTTPメソッドを指定
- `-H`: リクエストヘッダーを追加
- `-d`: リクエストボディーを送信

```bash
curl \
  -X POST \                                 # POSTで送って
  -H "Content-Type: application/json" \     # このHeaderをつけて
  -d '{"title":"HTTPとは何か"}' \           # このBodyを送って
  https://tracenote.work/api/traces         # このURLに送って
```

## ヘッダを追加(-H)

```bash
curl -H "Accept: application/json" https://tracenote.work/api/traces
```

- Appcept: レスポンスはJSONがいいですとお願い
- Content-Type: Bodyの形式を指定

## Request Bodyを送る(-d)

```bash
curl -d "<送るデータ>" <URL>
```

```bash
curl -d "hello" https://example.com
```

=> `hello`というデータをRequest Bodyに入れて送る

`-d`を使用するとcurlはデフォルトで`POST`として送ってくれる。

=> `-X POST`と書かなくてもいい

