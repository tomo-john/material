# memo

いろいろめも :dog:

## php

- phpの組み込みサーバーを起動
- コマンド実行したディレクトリをルートにして簡易Webサーバーを立ち上げる

```
php -S localhost:8000
```
=> `8000`は任意のポート

サーバー起動後、[http://localhost:8000](http://localhost:8000)にアクセスすると、デフォルトで`index.php`が読込まれる。

## Flexbox(html)

要素を縦や横に並べて、整列や配置を自由自在にレイアウトする方法。

以前の`float`や`position`で調整していたようなレイアウトが簡単にレスポンシブに対応しやすくなる。

### 基本の使い方

親子構造で考える。

```html
<div class="parent">
  <div class="child">A</div>
  <div class="child">B</div>
  <div class="child">C</div>
</div>
```

```css
.parent {
  display: flex;
}
```

=> これで子要素が横一列に並ぶ :dog:

### よく使用するプロパティ(一部抜粋)

| プロパティ(親)    | 意味                                          |
|-------------------|-----------------------------------------------|
| `display: flex`   | Flexboxを有効にする                           |
| `flex-direction`  | 主軸の方向を決める(row 横 / column 縦)        |
| `justify-content` | 主軸方向での並べ方(左寄せ・中央・均等など)    |
| `align-items`     | 交差軸(縦 or 横)方向の揃え方                  |
| `flex-wrap`       | 折り返しを許可する(`wrap` にすると改行される) |


| プロパティ(子)    | 意味                                 |
|-------------------|--------------------------------------|
| `flex`            | サイズの伸び縮みをコントロール       |
| `align-self`      | 特定の子だけ縦位置を変える           |
| `order`           | 並び順を変える(HTMLの順番に関係なく) |

