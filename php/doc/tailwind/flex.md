# flex

## Flexboxの基本概念

`親`と`子`の2階層で考える。

- 親要素: Flexコンテナと呼ばれ、子要素の並び順や配置を制御する
- 子要素: Flexアイテムと呼ばれ、親の命令に従って並ぶ

まず、親要素にTailwindクラスの`flex`を指定することから始まる。

Flexboxは要素を並べる主軸(Main Axis)と直交する交差軸(Cross Axis)の2つの軸を使って配置を制御する。

### 主軸(Main Axis): justify-

主軸はFlexアイテムが並ぶ方向の軸で、デフォルトは`横方向(左から右)`となる。

主軸上のアイテムの配置(左寄せ・中央寄せ・均等配置)は`justify-*`クラスで制御する。

| Tailwind          | CSS                              | 挙動                             |
|-------------------|----------------------------------|----------------------------------|
| `justify-start`   | `justify-content: flex-start`    | 左寄せ(主軸の始点に寄せる)       |
| `justify-center`  | `justify-content: center`        | 中央寄せ(主軸の中央に配置)       |
| `justify-end`     | `justify-content: flex-end`      | 右寄せ(主軸の終点に寄せる)       |
| `justify-between` | `justify-content: space-between` | 両端揃え(要素間に均等なスペース) |

### 交差軸(Cross Axis): items-

主軸に垂直な軸。主軸が横なら、交差軸は`縦方向`となる。

交差軸上のアイテムの配置(上寄せ・上下中央寄せ・下寄せなど)は`items-*`クラスで制御する。

| Tailwind          | CSS                              | 挙動                             |
|-------------------|----------------------------------|----------------------------------|
| `items-start`     | `align-items: flex-start`        | 上寄せ(交差軸の始点に寄せる)     |
| `items-center`    | `align-items: center`            | 中央寄せ(交差軸の中央に配置)     |
| `items-end`       | `align-items: flex-ent`          | 下寄せ(交差軸の終点に寄せる)     |

## 主軸を縦に変える: flex-col

Felxboxのデフォルトの主軸は横(`row`)なので横並び。

これを縦に並べたい場合は、`flex-col`クラスで主軸を縦(`column`)に変えることができる。

`flex-col`を使うと、主軸が縦になり、アイテムは上から下に並ぶ。

このとき。`justify-center`は縦の中央に、`items-center`は横の中央に寄せる役割に自動的に切り替わる。

## gap

親要素に指定することで、子要素のアイテム間の間隔を設定することができる。

FlexBoxでアイテムを並べるときは`gap-*`を使用するのが最も推奨されている。

## 子要素のクラス

親要素の命令全体に従いつつ、子要素ごとに自分の幅などを個別に設定するためのクラスも用意されている。

| Tailwind    | 役割                 | 説明                                                 |
|-------------|----------------------|------------------------------------------------------|
| `flex-1`    | 均等に広がる         | 余ったスペースを他のアイテムと均等に分け合って広がる |
| `flex-auto` | 内容物の応じて広がる | 元の内容物(テキストなど)のサイズも考慮して広がる     |
| `flex-none` | 固定サイズを維持     | 元のサイズ(`width`や`height`で指定)を維持            |
| `grow`      | 成長を許可           | 余剰スペースがある場合、広がることを許可             |
| `grow-0`    | 成長を禁止           | 余剰スペースがあっても広がらない                     |
| `shrink`    | 縮小を許可           | コンテナにスペースがない場合、縮むことを許可         |
| `shrink-0`  | 縮小を禁止           | スペースがなくても縮まない(はみ出す原因になることも) |

---

# 子要素がコンテンツの幅に合わせようとする性質

通常のブロック要素(`div`など)は、何も指定しなくても横幅いっぱい(100%)に広がる。

しかし、親に`flex`を指定するとその中にある子要素は`Flexアイテム`という特別な状態に変わる。

```blade
<body class="flex flex-col gap-4 items-center min-h-screen bg-gray-200">
  <header class="text-center text-lg text-gray-500 bg-gray-400 py-6">
    <h1>Hello Laravle <i class="fa-solid fa-dog"></i></h1>
  </header>

  <main class="flex-grow max-w-4xl">
    <p class="text-center bg-pink-200">メインコンテンツ</p>
  </main>

  <footer class="text-center text-xs text-gray-500 py-6">
    &copy; 2025 This is footer-like content. 🐶
  </footer>
```

このような場合、`<body>`に指定している`flex-col`は子要素を中身のコンテンツが必要な分だけの幅になろうとする。

`<header>`, `<body>`, `<footer>`はそれぞれ、自身のコンテンツに必要な大きさにしかならない。

これを回避するために、子要素に`w-full`を追加してあげる。

=> 横幅いっぱい(100%)を明示的に指定する

```blade
<header class="w-full text-center text-lg text-gray-500 bg-gray-400 py-6">
```

=> 画面の横幅いっぱいに広がる

```blade
<main class="w-full max-w-4xl flex-grow">
```
=> 横幅いっぱいに広がるが`max-w-4xl`も効く

