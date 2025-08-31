# CSS

Cascading Style Sheets

- Cascadingは継承するという意味

  => 親要素に対して指定したCSSが子要素にも引き継がれる特性のことを継承という

- お決まりの1行目(文字コードの指定)

  ```
  @charset "utf-8";
  ```

- コメントアウト

  ```
  /* ここはコメント */
  ```

## 基本

```
どこの { 何を: どうする;}
```

```
p {color: red;}
```

=> p要素の色を赤にする :dog:

どこの(p要素)の部分を`セレクタ`、何を(color)の部分を`プロパティ`、どうする(red)の部分を`値`という。

## HTMLでCSSを読み込む

### 1 cssファイルを読み込む

HTMLの`<head>`タグ内に、`<link rel="stylesheet">`にて読み込むcssファイルを指定する。

```
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <title>じょんのCSS</tilte>
</head>
```

=> `href="xxxx"`の箇所でcssファイルのパスを記述

### 2 HTMLに直接書く(head)

`<head>`タグ内に`<style>`タグを書く。

```
<head>
  <meta charset="UTF-8">
  <style>
    body { background-color: pink; }
  </style>
  <title>じょんのCSS</tilte>
</head>
```

### 3 HTMLに直接各(body)

HTMLタグにstyle属性として直接書く。

```
<body>
  <p style="color:red;">じょんです</p>
</body>
```

基本的には1の方法を使用する :dog:

