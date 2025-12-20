# Blade

Laravelのデフォルトのテンプレートエンジン。

拡張子は、`blade.php`でビューファイルの作成に使用される。

## 3つの基本原則

| 原則                | 目的                                       | 必須の理由                                                  |
|---------------------|--------------------------------------------|-------------------------------------------------------------|
| 1. データ表示       | 変数の値を画面に出力                       | セキュリティのためエスケープが基本                          |
| 2. 制御構造         | 条件分岐や繰り返し処理                     | PHPタグ(`<?php ... ?>`)を使わずにテンプレート内で処理を記述 |
| 3. テンプレート継承 | 共通部分(ヘッダー、フッターなど)を使い回す | メンテナンス性と一貫性を高める                              |

## 機能例

### 1. データ表示とエスケープ {{ }} と {!! !!}

- `{{ $変数名 }}` : データをHTMLエスケープして表示。基本はこれ。
- `{!! $変数名 !!}` : データをそのまま(HTMLとして解釈させて)表示。

### 2. 条件分岐など

PHPタグを使用せず、`@`を使用する。

```
@if ( ... )
  <p>処理</p>
@elseif
  <p>処理2</p>
@else
```

- `@unless(...)` = `if (!...) {`
- `@isset(...)` = `if (isset(...)) {`

```
@foreach ($dogs as $dog)
  <p>名前: {{ $dog['name'] }}</p>
@endforeach

<!-- 🐶 データがないときのエラーを防げる便利な記法 -->
@forelse ($dogs as $dog)
  <ul>
    <li>{{ $dog['name'] }}</li>
  </ul>
@empty
  <p>まだ犬はいません。</p>
@endforelse
```

### 3. テンプレート継承

Webサイトの共通のレイアウト(ヘッダー、フッター、ナビゲーション)を定義し、個々のページで必要な部分だけを記述できる。

- `@yield('name')` : 共通レイアウトにコンテンツを埋め込む場所を定義
- `@extend('layout.app')` : `app`レイアウトを継承(親にする)ことを宣言
- `@section('name')` : `@yield('name')`の場所に埋め込む実際のコンテンツを記述

---

# Layouts

### 全体像

- `layouts`: 外枠・骨組み
- `extends`: layoutsの外枠を使う宣言
- `section / yield`: 差し込み口

### resources/views/layouts/

これはLaravelのルールではない :dog:

=> 習慣(みんながそうしてるだけ)

- ヘッダー
- フッター
- 共通CSS/JS
- ナビゲーション
- `<html>`, `<head>`, `<body>`全体

=> つまり画面の外枠だけを書く場所

### @extendsの役割

```blade
@extends ('layouts.monsters')
```

このviewは`layouts/monsters.blade.php`を土台にしますと言っている。

- ファイルパスは、`resources/views`基準
- `.blade.php`は書かない

### @yield(レイアウト側)

`layouts/monsters.blade.php`

```blade
<body>
  <header>...</header>

  <main>
    @yield('content')
  </main>

  <footer>...</footer>
</body>
```

ここに、子viewのcontentを差し込むと言っている。

### @section(子view側)

`mosters/index.blade.php`

```blade
@extends ('layouts.monsters')

@section ('content')
  ここに記載
@endsection
```

`yield('content')`にこの中身を入れてください宣言。

