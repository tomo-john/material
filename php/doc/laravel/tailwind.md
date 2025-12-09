# Tailwind

CSSのフレームワーク。

最初から用意された小さいCSSの部品(Utility class)をHTMLに書くだけでデザインできる。

=> classを定義するだけで勝手にデザインがあたる

HTMLのclass定義だけでデザインを決めれるので、CSSを書く必要がない。

デメリットとしては、classが長くなりがちでTailwindの書き方を覚える必要はある。

## Laravleで使用するために

### 1. npm install で環境をセットアップ

作成したLaravelプロジェクトディレクトリで実施。

Laravelがデフォルトで用意している`package.json`に書かれているツールをダウンロード。

=> CSSやJSを処理するためのツール(Vite, Tailwind CSS, PostCSSなど)

ダウンロードされたツールは、プロジェクト内の`node_modules`ディレクトリに入る。

これで、Tailwindを使ってCSSを生成できる状態になる。

### 2. npm run dev を実行して、監視モードで開発サーバーを起動

ダウンロードした`Vite`というツールを起動し、監視モードに入る。

ViteはHTML(Bladeファイル)にどんなTailwindクラスを書いたかを常に監視している。

これを実行しないと、Tailwindのクラスを書いても、そのクラスに対応するCSSコードが生成されない。

=> デザインが何も当たらない状態になる

### 3. Bladeファイル内で、TailwindのクラスをHTMLタグに直接書いていく

TailwindのユーティリティクラスをHTML要素の`class`属性に書いていく。

=> この時点では、ブラウザ側はまだこのクラスに対応する具体的なCSS定義を知らない。

### 4. BladeテンプレートでCSSを読込む

`<head>`内で`@vite(...)`を使ってCSSを読込む。

Bladeファイルと`npm run dev`で動いているViteサーバーを接続するための特別なLaravelの構文。

```
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dog List</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

  <h1 class="text-3xl font-bold mb-4 text-blue-600">🐶 Dog List</h1>

  <a href="{{ route('dogs.create') }}" class="text-white bg-blue-500 px-3 py-2 rounded hover:bg-blue-600">新規登録</a>

  <ul class="mt-4 space-y-2">
    @foreach ($dogs as $dog)
      <li class="bg-white p-3 shadow raounded">
        <a href="{{ route('dogs.show', $dog) }}" class="text-gray-900 font-medium">
          {{ $dog->name }} ({{ $dog->age }}歳)
        </a>
      </li>
    @endforeach
  </ul>

  <a href="/" class="block mt-6 text-blue-400">Laravel</a>
</body>
</html>
```

