# Flux:input

## ラベルと名前(データ)

- `label`: 何の入力欄かを示す
- `wire:model`: データを紐づける

```blade
<flux:input label="ユーザー名" wire:model="name" />
```

`wire:model="name"`でLivewireのプロパティ(PHP側の変数)と直結する。

### wire:model(修飾子なしのデフォルト)

v3では即座にサーバーとは同期しない。

入力フォームからフォーカスが外れるか、ボタンをクリックしてフォーム送信をしたタイミングでデータが同期。

### wire.model.live

入力するたびにリアルタイム(即座)にサーバーへリクエストを送信しデータを更新。

### wire.model.blur

入力要素からフォーカスが外れた(blur)タイミングでサーバーと通信。

### wire.model.{live.}debounce.{time}

入力を停止してから、指定した時間(ms)が経由後にサーバーと通信。(デフォルトは`150ms`)

=> `wire.model.live.debounce.500ms="name"`: 入力停止後0.5秒後に通信

## アイコンの活用

Fluxはアイコンとの親和性が抜群。

`icon`プロパティや前後に要素を置く`prefix/suffix`を活用する。

```blade
{{-- アイコンを左側に配置 --}}
<flux:input label="お名前" icon="user" wire:model="name" placeholder="じょん・どぅ" />

{{-- 通貨や単位を表示する prefix/suffix --}}
<flux:input label="予算" prefix="¥" suffix="円" type="number" wire:model="budget" />

{{-- 虫眼鏡アイコンで検索窓風に --}}
<flux:input icon="magnifying-glass" placeholder="検索..." wire:model.live.debounce.500ms="search" />
```

=> [iconはHeroiconsの公式サイト確認](https://heroicons.com/)

