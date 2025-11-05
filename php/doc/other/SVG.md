# SVG

## SVGとは？

- 正式名: Scalable Vector Graphics
- 形式: XMLベースの画像フォーマット
- 特徴: 拡大・縮小しても画質が劣化しないベクター画像
- 主な用途: Webアイコン、図形、ロゴ、地図、グラフなどなど

## ラスター画像(PNG/JPG)との違い

| 項目           | SVG(ベクター)                    | PNG/JPG(ラスター)    |
|----------------|----------------------------------|----------------------|
| 表現方法       | 数学的な座標と図形の情報         | ピクセルの色データ   |
| 拡大縮小       | 劣化しない                       | 劣化する(ぼやける)   |
| ファイルサイズ | 複雑さによる                     | 解像度による         |
| 編集方法       | テキストエディタやコードで編集可 | 専用の画像編集ソフト |

## 基本のSVGコード例

- `<svg>`: SVG画像の領域を宣言
- `<circle>`: 円を描く
  - `cx`, `cy`: 円の中心座標
  - `r`: 半径
  - `fill`: 塗りつぶし色

## よく使う要素

| 要素        | 意味       | 主な属性                            |
|-------------|------------|-------------------------------------|
| `<rect>`    | 四角形     | `x`, `y`, `width`, `height`, `fill` |
| `<circle>`  | 円         | `cx`, `cy`, `r`                     |
| `<ellipse>` | 楕円       | `cx`, `cy`, `rx`, `ry`              |
| `<line>`    | 線         | `x1`, `y1`, `x2`, `y2`, `stroke`    |
| `<polygon>` | 多角形     | `points`                            |
| `<path>`    | 複雑な図形 | `d`(コマンドでパス指定)             |

## HTMLサンプル

`<svg>`要素をHTMLにそのまま書くだけでOK。

```
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>svg test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <svg id="venn"width="1200"height="900">
    <rect class="rect" x="100" y="100" width="100" height="100"/>
    <rect class="rect" x="200" y="200" width="100" height="100"/>
    <rect class="rect" x="300" y="300" width="100" height="100"/>
    <rect class="john" x="400" y="400" width="100" height="100"/>
    <circle class="circle" cx="450" cy="450" r="50" />
  </svg>

</body>
</html>
```

`<svg>`のwidth/heightはキャンバスの大きさを決めるイメージ。

- `width="1200" height="900"` => 横1200px x 縦900pxの描画領域を用紙
- この中に描く要素(circle, rect, path)は全部この領域内の座標系で置かれる
- 左上が(0,0)、右下が(1200,900)

## SVGのCSS

デフォルト値は、`fill: black;`, `stroke: none`なので真っ黒の塗りつぶしの図形が表示される。

| プロパティ         | 例                       | 説明                           |
|--------------------|--------------------------|--------------------------------|
| `fill`             | `fill: red;`             | 塗りつぶしの色(`none`で透明 )  |
| `stroke`           | `stroke: black;`         | 枠線の色                       |
| `stroke-width`     | `stroke-width: 2;`       | 枠線の太さ                     |
| `stroke-dasharray` | `stroke-dasharray: 5 3;` | 点線(5px線、3px隙間の繰り返し) |

