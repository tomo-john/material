# HTML

HyperText Markup Language

## 基本テンプレート

```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  ...
</head>
<body>
  ...
<body>
</html>
```

1. `<!DOCTYPE html>`

HTMLタグではなく、ブラウザに対するHTML文書である宣言。

2. `<html lang="ja">`

`<html>`で始まり、`</html>`で終わるまでがWebページ全体ですよという範囲を示す。

`lang="ja"`の部分は言語(language)は日本語(Japanese)ですよという属性。

3. `<head>`

`<head>`から`</head>`の部分はページそのものには表示されない裏方の設定情報を入れる場所。

4. `<meta charset="UTF-8">`

このファイルの文字はUTF-8で読込んでねという記述。

5. `<link rel= ...>`

`<link>`タグでは外部ファイルとを関連付ける記述。

この例なら読込むCSSファイルを指定している。

## headタグ

### お決まりのやつ :dog:

- CSS: `<link rel="stylesheet" href="...">`
- JS: `<script src="...">`
- ブラウザのタブに表示するタイトル: `<title>...</title>`

### 他にも :dog: :dog:

1. スマホ対応のおまじない。

```
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

スマホ画面の横幅(`device-width`)をページの横幅として使ってね。

最初のズーム倍率(`intial-scale`)は1.0倍(=ズームなし)にしてねという意味。

2. 検索結果の説明文

```
<meta name="description" content="このページは犬がWebアプリケーション開発を学ぶページです。">
```

この`content`に書いた文章が、Googleなどの検索表示でタイトル下に表示される説明文になる。

3. OGPタグ(SNSシェアされたときの見た目)

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

4. ファビコン

```
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- またはPNG画像など -->
<link rel="icon" href="images/icon.png" type="image/png">
```

`<title>`タグで設定したタイトルの横に表示される小さな画像(アイコン)を指定。

Favorite icon(お気に入りのアイコン)を略してファビコン。

5. `<style>`タグと`<script>`タグ

`link`や`src`で外部ファイルを読込む代わりにCSSやJSを直接書込むためのタグ。

ちょっとしたテストの時とかに便利。

