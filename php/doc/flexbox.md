# Flexbox(フレックスボックス)

CSS Flexible Box Layout Module : Webページで要素を柔軟に配置・整列させるためのレイアウトモデル。

親要素(フレックスコンテナ)と子要素(フレックスアイテム)で構成。

コンテナに`display: flex;`を指定することで、その子要素に対してレイアウトが適用される。

下記のようにHTMLを記述すると、

```
<div class="container">
  <div class="item">要素1</div>
  <div class="item">要素2</div>
  <div class="item">要素3</div>
</div>
```

コンテナはクラス名が`container`で、その中のクラス名`item`が要素となる。

この場合は、`container`にCSSで`display: flex;`を指定することで`item`のレイアウトを変更することが出来る。

```
.container {
  display: flex;
}
```

