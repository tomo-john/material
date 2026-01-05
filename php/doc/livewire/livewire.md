# Livewire

JavaScriptを書かずに、動的UIを作れる仕組み。

- Blade
- PHP
- Eloquent

だけでVue / Reactっぽいことができる。

## Livewireの考え方

基本構造はこの2つのセット:

- Livewire Component

  - PHPクラス(状態・処理)
  - Bladeビュー(見た目)

=> Controller + Bladeを1セットにした感じ

Livewireは`ページ内で動く部品`🐶

## Breeze + Livewireの関係

`laravel new`でLivewire Starter Kitを選ぶといくつか初期状態でLivewireが使用されている。

- `app/Livewire/Settings/Profile.php`
- `resources/views/livewire/settings/profile.blade.php`

=> ログインなどはLivewireは使われていなかった

| 機能             | 実装               |
|------------------|--------------------|
| ログイン         | 通常のBlade + POST |
| ログアウト       | Livewire Action    |
| プロフィール編集 | Livewire Component |
| 設定系           | Livewire           |

## Livewire Componentを作ってみる

```bash
php artisan make:livewire Counter

# 以下のファイルが作成される
CLASS: app/Livewire/Counter.php
VIEW:  resources/views/livewire/counter.blade.php
```

### PHP側(状態と処理だけ見る)

`app/Livewire/Counter.php`

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```

- `public $count` => 画面の状態
- `increment()` => ボタンを押した時の処理
- `render()` => どのBladeを使うか

### Blade側(HTMLを見るだけ)

`resources/views/livewire/counter.blade.php`

```blade
<div>
    <button wire:click="increment">
        +1
    </button>

    <p>Count: {{ $count }}</p>
</div>
```

- `wire:click="increment"` => PHPの`increment()`が呼ばれる
- `{{ $count }}` => PHPの`$count`が表示される

🐶JSを一切書いていない🐶

### 画面に表示する

適当なBladeに以下を記述する。

```blade
<livewire:counter />

{{-- こっちでもOK --}}
@livewire('counter')
```

## Livewire Componentの正体

- `app/Livewire/xxx.php` : 状態と処理(PHP)
- `resources/views/livewire/xxx.blade.php` : 表示(HTML)

これを、任意の`xxx.blade.php`に埋め込む。

```blade
<livewire:xxx />
```

=> あくまでページの一部として動く部品

- URLはない
- ルーティングは不要
- Controllerの代わりではない

