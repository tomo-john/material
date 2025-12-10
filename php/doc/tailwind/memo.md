# Tailwind CSS めも

とにかく使って少しずつ身につける :dog:

`1rem` = `16px`(デフォルト)

---

```
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
```

### bg-gray-50

- `bg-`はbackground-color(背景色)を設定
- `gray-50`はグレースケール(灰色)の最も明るいトーン(薄い灰色)

### min-h-screen

- `min-h`はminimum height(最小の高さ)を設定
- `screen`はブラウザの画面の立幅全体(Viewport Height, `100vh`相当)を意味

コンテンツが少なくても、ページの高さが常に画面全体になる。

### flex

- `flex`は指定した要素をFlexboxコンテナにすることを宣言
- `items-center`の`items-`はコンテナ内のアイテムの垂直方向(縦)の配置を制御
- `justify-center`の`justify`は水平方向(横)

```
<div class="p-8 bg-white shadow-x1 rounded-x1">
```

### p-8

- `p-`はpadding(内側の余白)を設定
- `8`はTailwind定義のスケール(間隔)の単位で、デフォルト設定では`2rem(32px)`相当

### shadow-xl

- `shadow-`はbox-shadow(要素の影)を設定
- `xl`は影の大きさ(深度)の単位で、xlはかなり大き目の影(`x1`ではなく`xl`)

### rounded-xl

- `rounded-`はborder-radius(角の丸み)を設定
- `xl`は丸みの単位

```
<ul class="space-y-4">
```

- `space-`は要素のグループに対して、要素間の余白を設定
- `y`はy-axisで垂直軸・縦方向(`x`は水平・横)
- `4`はデフォルトで1rem(16px)

