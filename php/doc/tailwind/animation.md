# アニメーション

## 標準の4つの動き

Tailwindで`animate-xxx`と書くだけで発動するクラスたち。

| クラス           | 動き               | 使い方例                       |
|------------------|--------------------|--------------------------------|
| `animate-spin`   | ぐるぐる回転       | 読込中(ローディング)のアイコン |
| `animate-ping`   | ぼわんとはじける   | 通知ドット、レーダーの波紋     |
| `animate-pulse`  | ぼんやり点滅       | スケルトン(読み込み中の枠)     |
| `animate-bounce` | ぴょんぴょん跳ねる | ここを押してとアピール         |

## transition

色の変化やサイズ変更をスムーズにする。

- `transition-all`: 全ての変化を滑らかに
- `duration-300`: 0.3秒かけて変化
- `ease-in-out`; 動き出しと終わりを滑らかに

```blade
<button class="transition-transform duration-200 hover:scale-110 active:scale-95">ぷにっとボタン 🐶</button>
```

- `hover:scale-110`: マウスカーソルがボタンに乗った(hover)とき、大きさを1.1倍(110%)にする
- `active:scale-95`: ボタンを押し込んだ(active)とき、大きさを0.95倍(95%)に少し小さくする

`transition`とだけ書くと、色・透明度・背景・影・変形など主要な見た目の変化すべてに対してアニメーションを適用する。

`transiton-transform`では`scale-110`(拡大)や`rotate`(回転)など、形を変える動き(Transform)だけにアニメーションを限定。

| クラス                 | 変化する対象                 | 使いどころ                         |
|------------------------|------------------------------|------------------------------------|
| `transition-colors`    | 背景色、文字色、枠線の色など | ボタンのhoverで色をふわっと変える  |
| `transition-opacity`   | 透明度(不透明度)             | 要素をふわっと消したり出したりする |
| `transition-shadow`    | 影(box-shadow)               | hoverでボタンを浮かび上がらせる    |
| `transition-transform` | 拡大、回転、移動             | ぷにっとボタン                     |

### transition と transition-all の違い

対象とする範囲が異なる。

`transition`(標準)

Tailwindが一般的によくアニメーションさせると決めたプロパティだけを対象にする。

- 対象: 色、背景、透明度、Transform
- メリット: ほとんどのケースでこれが一番安全

`transition-all`(全部)

文字通り、CSSで変化させられる全てのプロパティを対象にする。

- 対象: `transition`の対象に加えて、`margin`, `padding`, `width`, `height`, `font-size`なども含まれる
- 注意点: 変化しなくていい場所までふわふわ動き、画面のガタつきの原因になることもある

