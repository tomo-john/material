# Action

- Actionは画面を持たない処理専用のクラス
- Blade(ビュー)はない

## Livewire Componentとの違い

| 項目             | Livewire Component | Action      |
|------------------|--------------------|-------------|
| 目的             | 画面 + 状態 + 処理 | 処理だけ    |
| Blade            | ある               | ない        |
| publicプロパティ | ある               | ない        |
| `wire:model`     | 使う               | 使わない    |
| 呼ばれ方         | `<livewire: .../>` | PHPから呼ぶ |

## Actionは裏方

- ログアウト
- ユーザー削除
- メール送信
- 状態変更
- 再利用したい処理

=> UIとは切り離す

## BreezeにあるActionの例

```php
<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    public function __invoke()
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
}
```

- Bladeがない
- Componentを継承していない
- `__invoke()`がある

`__invoke()`って何？🐶 => PHPの機能🐰

```php
<?php
$logout = new Logout();
$logout(); // これが __invoke()
```

=> 関数みたいに呼べるクラス

## プチまとめ

- Livewire = 表舞台
- Action = 裏方
- ActionにViewはない
- ActionはPHPクラス
- 再利用と整理のため

