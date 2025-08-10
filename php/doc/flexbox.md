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

## flex-direction

並べる方向を指定する。

```
.container {
  display: flex;
  flex-direction: row-reverse;
}
```

| 値             | 効果                                   |
|----------------|----------------------------------------|
| row            | 左から右に横並びに子要素を配置(初期値) |
| row-reverse    | 右から左に横並びに子要素を配置         |
| column         | 上から下に縦並びに子要素を配置         |
| column-reverse | 下から上に縦並びに子要素を配置         |

## flex-wrap

折り返しを指定する。

```
.container {
  display: flex;
  flex-wrap: wrap;
}
```

| 値           | 効果                                           |
|--------------|------------------------------------------------|
| nowrap       | 子要素を折り返ししないで、一行に並べる(初期値) |
| wrap         | 子要素を折り返しさせ、上から下へ複数行で並べる |
| wrap-reverse | 子要素を折り返しさせ、下から上へ複数行で並べる |

## justify-content

子要素の横並びのレイアウトを変更。中央揃え、均等配置など。

```
.container {
  display: flex;
  justify-content: center;
}
```

| 値            | 効果                                                           |
|---------------|----------------------------------------------------------------|
| flex-start    | 子要素を左揃えで配置(初期値)                                   |
| flex-end      | 子要素を右揃えで配置                                           |
| center        | 子要素を中央揃えで配置                                         |
| space-between | 子要素を均等配置・左右端の要素を親要素の端に接して配置         |
| space-around  | 子要素を均等配置・左右端の要素も親要素の端から均等に話して配置 |

## align-items

垂直方向のレイアウトを指定。

```
.container {
  display: flex;
  align-items: center;
}
```

| 値         | 効果                                                                        |
|------------|-----------------------------------------------------------------------------|
| stretch    | 子要素の中で1番高い要素に合わせて全ての子要素の高さを統一させて配置(初期値) |
| flex-start | 親要素の上端を基準に上揃えで配置                                            |
| flex-end   | 親要素の下端を基準に下揃えで配置                                            |
| center     | 親要素の上下中央を基準に、中央揃えで配置                                    |
| baseline   | 子要素をベースラインで揃えて配置                                            |

## align-content

要素が複数行ある場合の垂直方向のレイアウト指定。

=> `flex-wrap: wrap;`や`flex-direction: column;`で縦並びにした要素をまとめてレイアウトできる

```
.container {
  display: flex;
  align-content: center;
}
```

| 値            | 効果                                                       |
|---------------|------------------------------------------------------------|
| stretch       | 親要素の高さに合わせて子要素の高さを統一させて配置(初期値) |
| flex-start    | 親要素の上端を基準に上揃えで配置                           |
| flex-end      | 親要素の下端を基準に下揃えで配置                           |
| center        | 親要素の上下中央を基準に、中央揃えで配置                   |
| space-between | 子要素を均等配置・上下端の要素を親要素の端に接して配置     |
| space-around  | 子要素を均等配置・上下端の要素も親要素の端から均等に離す   |

### ポイント

- 行が1つしかないとき => align-content は効かない(align-itemsは効く)
- 複数行レイアウトで縦方向の行全体を揃えたい => align-content
- 単純に1行の中で揃えたい => align-items

## gap

子要素間のスペースを直接指定。

```
.container {
  display: flex;
  gap:10px;
}
```

## flexのショートハンド

`flex`は3つのプロパティをまとめた短縮表記。

基本的に、`子要素`に設定するもの。

```
flex: flex-grow flex-shrink flex-basis;
```

- flex-grow

  余白があったときにどれだけ伸びるか

  `1` => 均等に伸びる、`2` => 他の要素の2倍伸びる

- flex-shrink

  幅が足りないときにどれだけ縮むか

- flex-basis

  初期の幅(pxや%でもOK、`auto`なら内容に応じる

---

## 参考サイト

- [FLEXBOX FROGGY](https://flexboxfroggy.com/#ja)
- [フレックボックスとは？](https://blog.asobou.co.jp/web/flex-box)

