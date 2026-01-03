# Apline.js

HTMLの中に直接書ける超軽量なJavaScriptフレームワーク。

Alpineの読み方はアルパイン。

## Alpine.jsを使う最小単位

Alpineは1ブロック完結型。

```html
<div x-data="{ }"
  Alpineの世界🐶
</div>
```

この`x-data`がついた瞬間、ここから下はAlpine管轄エリアとなる。

## とりあえずこれ

```html
x-data        // 状態
@click        // 操作
x-show        // 表示切替
x-text        // 表示内容
:class        // class切替
x-transition  // アニメ
```

## 基本チートシート

### データの定義と表示

| クラス   | 役割                 | 例                                    |
|----------|----------------------|---------------------------------------|
| `x-data` | データ定義(親に書く) | `x-data="{ count:0, name: 'じょん'}"` |
| `x-text` | テキストとして表示   | `<span x-text="name"></span>`         |
| `x-html` | HTMLとして表示       | `<div x-html="boldName"></div>`       |

### 条件分岐とループ

| クラス   | 役割                  | 特徴                               |
|----------|-----------------------|------------------------------------|
| `x-show` | 表示/非表示           | `display: none`を切り替える        |
| `x-if`   | 条件で要素を消す/作る | `<template>`タグと一緒に使う       |
| `x-for`  | リストを回す          | 配列からリストを生成するときに使う |

### イベントとバインディング

| クラス         | 役割                 | 短縮記法                            |
|----------------|----------------------|-------------------------------------|
| `x-on:click`   | クリックした時の動き | `@click="..."`                      |
| `x-bind:class` | クラスと動的に変える | `:class="{ 'bg-red-500' : active}"` |
| `x-model`      | 入力フォームと連動   | `<input x-model="name">`            |

## サンプル

```html
<div x-data=" { count:0 }"
     class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition flex flex-col items-center gap-4">

    <h3 class="font-bold mb-2">Counter Dog(Alpine.js)<h3>

    <div class="text-4xl">
        <i class="fa-solid fa-dog"></i>
        <span x-text="count"></span>
    </div>

    <button @click="count++"
            class="px-4 py-2 mt-4 bg-pink-500 hover:bg-pink-600 text-white rounded-full transition">
        ぽち！
    </button>
</div>
```

- `x-data="{ count: 0 }"` : JSの変数を持たせてある
- `x-text="count"` : 表示内容をJSと連動
- `@click="count++"` : クリック時の処理

```html
<div x-data=" { open: false }"
     class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition flex flex-col items-center gap-4">

    <h3 class="font-bold mb-2">Open / Close<h3>

    <button @click="open = !open"
            class="bg-blue-500 text-white px-4 py-2 rounded-full">
        開くわん
    </button>

    <div x-show="open"
         x-transition
         class="mt-3 text-gray-700">
        表示された🐶
    </div>
</div>
```

- `x-show` = display none / block
- `x-transition` = ふわっと出る

