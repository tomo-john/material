# 基本タグなど

```blade
<flux:main container>
    ...
<flux:main>
```

ページのメイン領域🐶`container`によって:

- 横幅制限
- 中央寄せ
- 余白を自動で付ける

などやってくれる🐶(レイアウト用の箱)

```blade
<flux:heading size="xl" level="1"></flux:heading>
```
見出し🐶:

- 見た目: `size="xl"`
- HTML構造: `level="1"`

`<h1>...</h1>`を保証しつつ、フォントサイズ・太さ・行間をFluxが決めてくれる。

```blade
<flux:subheading>...</flux:subheading>
```

見出し補足テキスト🐶:

- 小さめ
- 薄め
- 上のheadingに自然につながる

```blade
<flux:separator variant="subtle" />
```

区切り線🐶(hrの代わり)

`variant="subtle"`

- 主張しない
- 薄い線
- セクション区切り向け

