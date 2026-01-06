# Laravleのheadタグ関連

Laravelならではのやつ(基礎知識も)🐰

## サンプル1 (Laravel12 Livewire / Bun)

`resources/views/partials/head.blade.php`にあったやつ🐶

```blade
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
```

```blade
<meta charset="utf-8" />
```

- UTF-8 文字コード
- 日本語・絵文字(🐶)も安全  
- HTMLではほぼ必須

```blade
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
```

いつものスマホ対応のおまじない🐶  

- `width=device-width` : 画面の横幅を端末のサイズに合わせる
- `initial-scale=1.0` : ズーム倍率を100%で開始

```blade
<title>{{ $title ?? config('app.name') }}</title>
```

`$title ?? config('app.name')`: `$title`が存在して`null`じゃなければそれを、なければ`config('app.name')`

### config() とは？

`config('app.name')` = `config/app.phpの'name'`

```bash
# config/app.php
'name' => env('APP_NAME', 'Laravel'),
```

- 1. `$title`
- 2. `.env`の`APP_NAME`
- 3. `'Laravel'` (最終保険)

```blade
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
```

- ブラウザタブのアイコン
- スマホの「ホーム画面に追加」時のアイコン

なぜ複数？

| 種類             | 使われる場面   |
|------------------|----------------|
| favicon.ico      | 古いブラウザ   |
| favicon.svg      | モダンブラウザ |
| apple-touch-icon | iPhone / iPad  |

=> 全部`public/`に置かれている想定

```blade
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
```

これはフォント関連🐶

`fonts.bunny.net`とは？

- Google Fonts代替のCDN
- プライバシー配慮(GDPR対応)
- Laravel公式がよく使う

`preconnect`とは？

あとで使うから、先に通信準備しておいての意味。

DNS解決、TLSハンドシェイクを先に済ませて、フォント表示を高速化。

`instrument-sans:400, 500, 600`で

- 400 = normal
- 500 = medium
- 600 = semibold

=> Tailwindの`font-medium`, `font-semibold`が自然に効く

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

これはBladeディレクティブ(`@`から始まっている)🐶

- Vite(ビルドツール)を起動
- 開発中 => HMR(即時反映)
- 本番 => ビルド済みファイル参照

`Tailwind CSS`, `Flux CSS`, `Alpine.js`, `Livewire JS`, `ダークモード制御`などフロントエンド全部の入口。

```blade
@fluxAppearance
```

Flux専用のBladeディレクティブ🐶

- ユーザーのテーマ設定を取得
- `html`に`dark`クラスを付けたり外したり
- セッション / localStorageと同期

無いとどうなる？

- ダークモードが効かない
- 見た目が一部壊れる
- Fluxコンポーネントの前提が壊れる

