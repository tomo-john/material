# wire:click & wire:submit

- 単発の動作(ボタンなど)なら`wire:click`
- 入力データをまとめて送る(フォーム)なら`wire:submit`

## wire:click(クリックイベント)

ボタンやリンクなどがクリックされた瞬間に指定したPHPメソッドを実行する。

- 主な用途: カウンターのプラスマイナス、削除ボタン、タブ切替など
- 特徴: HTML要素なら何にでも付けることができる(`<div>`や`<span>`でもOK)

```html
<button wire:click="function">ボタン</button>
```

## wire:submit(送信イベント)

`<form>`タグに対して使い、フォームが送信された時にメソッドを実行する。

- 主な用途: 新規登録、ログイン、問合せ送信など
- 特徴: フォーム内のEnterキー押し下げでも動作

  - 通常、`wire:submit.prevent`でブラウザ標準のページリロードを防ぐ
  - フォーム内のボタンが押されたとき、そのフォーム全体を処理対象にする

```html
<form wire.submit.prevent="save">
    <input type="text" wire:model="name">
    <button type="submit">保存する</button>
</form>
```

