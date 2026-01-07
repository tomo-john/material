# Alpine.js と Livewire

| 項目       | Alpine.js          | Livewire                 |
|------------|--------------------|--------------------------|
| 主戦場     | ブラウザ(フロント) | サーバー(PHP)            |
| 書く言語   | JavaScritp         | PHP                      |
| 状態       | ブラウザ内         | サーバー側               |
| データ更新 | 即時(JS)           | 通信あり(Ajax)           |
| 得意       | UIの細かい動き     | フォーム・CRUD・状態管理 |

## Alpine.jsとは？

BladeにちょっとしたJSを足すための軽量JS。

```html
<div x-data="{ open: false }">
    <button @click="open = !open">開く</button>

    <div x-show="open">
        🐶こんにちわん
    </div>
</div>
```

### Alpineの特徴

- JSだけど書く量が少ない
- モーダル・開閉・表示切替が得意
- サーバーに通信しない
- Livewireの裏側でもよく使われる

=> UI職人🐶 

## Liviwireとは？

PHPだけで画面が動くLaravel専用フレームワーク。


```blade
{{-- Blade側 --}}
<flux:button wire:click="increment">
  +1
</flux:button>
```

```php
<?php
// PHP側
public function increment()
{
    $this->count++;
}
```

### Livewireの特徴

- 状態はサーバー
- バリデーション・保存が楽
- Laravelの知識がそのまま使える
- JS書きたくない人の味方

=> 業務アプリ職人🐶

