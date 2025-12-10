# head

## meta name="viewport"

ブラウザに対して、このページをどのように表示すべきかを指示するための命令。

これがないと、スマホでサイトを開いたとき、ブラウザはこれは昔のPCサイトだと判断する。

=> モバイルデバイスでの閲覧性が悪くなってしまう

これが標準的なおまじない :dog:

```
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

スマホ画面の横幅(`device-width`)をページの横幅として使ってね。

最初のズーム倍率(`intial-scale`)は1.0倍(=ズームなし)にしてねという意味。

## CSS, JS, タブタイトル, 文字コード

- `<link rel="stylesheet" href="...">`

  ...に読込むcssファイルのパス

- `<script src="...">`

  ...に読込むjavascriptファイルのパス
  
- `<title>...</title>`

  ...の部分がタブに表示される

- `<meta charset="UTF-8">`

  このファイルの文字はUTF-8で読込んでねという記述

## 検索結果の説明文

```
<meta name="description" content="このページは犬がWebアプリケーション開発を学ぶページです。">
```

この`content`に書いた文章が、Googleなどの検索表示でタイトル下に表示される説明文になる。

## OGPタグ(SNSシェアされたときの見た目)

```
<meta property="og:title" content="Webアプリケーション開発の基礎レッスン">
<meta property="og:type" content="website">
<meta property="og:url" content="https://example.com/index.php">
<meta property="og:image" content="https://example.com/images/ogp.png">
<meta property="og:description" content="Webアプリケーション開発の基礎を学ぶための練習ページです。">
```

`Open Graph Protocol`略してOGPと呼ばれる設定。

サイトのURLがLINEやXなどのSNSでシェアされたとき:

- `og:title`: どのタイトルを表示するか
- `og:image`: どの画像を表示するか
- `og:description`: どの説明文を表示するか

...をSNS側に細かく指示するためのタグ。

## ファビコン

```
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- またはPNG画像など -->
<link rel="icon" href="images/icon.png" type="image/png">
```

`<title>`タグで設定したタイトルの横に表示される小さな画像(アイコン)を指定。

Favorite icon(お気に入りのアイコン)を略してファビコン。

## styleとscriptタグ

`link`や`src`で外部ファイルを読込む代わりにCSSやJSを直接書込むためのタグ。

ちょっとしたテストの時とかに便利。

