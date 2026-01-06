# Laravel Flux (Flux UI)

Livewire開発チームが作成したLaravel用のモダンなUIコンポーネントライブラリ。

Livewireと組み合わせることで、ページリロードなしでインタラクティブなUIを簡単に実装できるのが特徴。

Livewireと使ってLaravelでWebアプリを作るとき、見栄えの良いUI部品を簡単に手に入れられる道具箱のようなもの。

## Fluxの思想

HTML + Tailwindを直接書かせない。

よく使うUIを意味ベースのタグに置き換える。

```html
<h1 class="text-3xl font-bold">...</h1>
```

の代わりに

```blade
<flux:heading size="xl">...<flux:heading>
```

## Fluxの基本ルール

- レイアウト: `flux:main`
- 見出し: `flux:heading`
- 補足: `flux:subheading`
- 区切り: `flux:separator`
- 操作: `flux:button` / `flux:input`

=> HTML構造は意識しなくていい🐶

## 学習リンク

- [基本タグ](./flux/basic.md)

