# Grid

## Tailwind Grid入門

Flexboxが数珠つなぎなら、GridはExcelのセルや将棋盤のようなイメージ。

### FlexとGridの違い

| 特徴       | Flexbox(`flex`)          | Grid(`grid`)                       |
|------------|--------------------------|------------------------------------|
| 得意な方向 | 1次元(横一列・縦一列)    | 2次元(縦と横を同時に管理)          |
| イメージ   | 要素を並べる             | 枠を作ってから入れる               |
| 用途       | ナビバー、ボタンの横並び | カード一覧、複雑なページレイアウト |

## Gridの基本: まずはこれから覚える

Gridを使う時は、親要素に`grid`と何列にするかを指定する :dog:

### 基本の3列レイアウト

- `grid-cols-3`: 3列(横に3つ並ぶ)
- `gap-4`: 要素の隙間

```blade
<div class="grid grid-cols-3 gap-4">
  <div class="bg-blue-200">1</div>
  <div class="bg-blue-200">2</div>
  <div class="bg-blue-200">3</div>
  <div class="bg-blue-200">4</div>
</div>
```

### レスポンシブ

Gridは画面のサイズに合わせて列数を変化させることができる。

```blade
<!-- スマホは1列、タブレットは2列、PCは3列 -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <!-- ここにカードをたくさん並べる -->
</div>
```

### col-span

この要素だけ2マス分使いたいみたいなことができる。

```blade
<div class="grid grid-cols-3 gap-4">
  <div class="bg-orange-200 col-span-2">私は2マス</div>
  <div class="bg-orange-200">私は1マス</div>
</div>
```

