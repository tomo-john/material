# height

## メインコンテンツの高さを確保する方法 

フッターが浮き上がったり、中身が少なすぎてスカスカに見えるのを防ぐための手法。

- `min-h-screen`: 最小の高さを確保
- `flex-grow(flex-1)`: Flexboxでメインを広げる
- `h-[calc(...)]`: 数学的に計算

### min-h-screen を使う(最も一般的)

要素の最小の高さをブラウザの表示画面(ビューポート)いっぱいに設定する方法。

- 使用するクラス: `min-h-screen`
- 特徴: コンテンツが少なくても、必ず画面全体の高さ分は確保される。

=> コンテンツが増えれば自動的に縦に伸びる

```blade
<main class="min-h-screen">

</main>
```

### Flexboxでメインを広げる

ヘッダー、メイン、フッターの3段構成の場合に、メインエリアを残りのスペースすべてに割り当てる方法。

- 親要素: `flex flex-col min-h-screen`
- メイン要素: `flex-grow`(または`flex-1`)

```blade
<div class="flex flex-col min-h-screen">
  <header>ヘッダー</header>

  <main class="flex-grow">メインコンテンツ</main>

  <footer>フッター</footer>
</div>
```

### 計算式 h-[calc(...)] を使う

ヘッダーやフッターの高さが固定(例: 64px)されている場合に、数学的に計算して高さを出す方法。

- 使用するクラス: `min-h-[calc(100vh-128px)]` (ヘッダー64px + フッター64pxの場合)
- 注意: TailwindのJITモード(現在の標準)で動作する

```blade
<main class="min-h-[calc(100vh-128px)]">メーン</main>
```

