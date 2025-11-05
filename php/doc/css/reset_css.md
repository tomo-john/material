# デフォルトCSSとは？

HTMLは意味づけをしているだけなので、本来は文字を大きくしたり、太字にするという指示は含まれていない。

マークアップした文字が大きくなったりするのは、各ブラウザが独自のスタイルシートを適用しているため。

この独自のスタイルシートのことをデフォルトCSSと呼ぶ。

=> 正式名称: User Agent Stylesheet

デフォルトCSSは統一化された仕様がないため、ブラウザによって表示に差異が出ることがある。

# デフォルトCSSのリセットとは？

デフォルトCSSによって自分の思い通りにCSSが適用されないことがある。

CSSを書く前にデフォルトCSSを打ち消す`リセットCSS`を読み込むと、そのような予期せぬ問題を起こりにくくなる。

=> リセットCSSはWeb上に公開されているものを使うと便利

=> [destyle.css](https://github.com/nicolas-cusan/destyle.css)

## リセットCSSの読み込み

通常のCSSを読み込むのと同様に、`<head>`内に`<link rel="stylesheet" href="...">`で読み込む。

CSSは後に読み込んだファイルが優先されるため、リセットCSSは必ず最初に読み込むこと。

```
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>じょんのリセットCSS</title>
</head>
```

