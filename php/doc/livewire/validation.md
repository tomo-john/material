# Livewireでのバリデーション

`app/Livewire/xxx.php`(クラス側)に書く。

Livewire Componentでは全部そのクラスの中。

- 状態 (public プロパティ)
- 処理 (メソッド)
- バリデーション
- メッセージ

=> Controllerは出てこない

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;
    public string $message = '';

    // バリデーション定義
    protected $rules = [
        'count' => 'required|integer|min:0',
    ];

    public function save()
    {
        // バリデーションを使用
        $this->validate();

        $this->message = '保存しました(ダミー)';
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```

## 書き方(プロパティとメソッド)

### プロパティで書く方法

```php
<?php
protected $rules = [
    'count' => 'required|integer|min:0',
];
```

### メソッドで書く方法

```php
<?php
protected function rules()
{
    return [
        'name' => 'required|string|max:255',
    ];
}
```

=> 両者の違いは一言で言うと、ルールを固定にするか動的にするかの違い

### $rules プロパティ(固定ルール)

- 常に同じルール
- シンプル
- 初学者向け
- 小さなComponent向き

### rules() メソッド(動的ルール)

- 条件によってルールを変えられる
- 他のプロパティ参照できる
- Profile / Settings 系でよく使う(?)

こんなことができる:

```php
<?php
protected function rules()
{
    return [
        'password' => $this->isUpdating
            ? 'nullable|min:8'
            : 'required|min:8',
    ];
}
```

編集か、新規かでルールを変更するようなことができる。

## Livewireのvalidate()はどう動く？

```php
<?php
$this->validate();
```

- 1. `rules()`メソッドがあればそれを使う
- 2. なければ`$rules`プロパティを見る

=> `rules()`があれば優先される

## PHPクラスにおける公開レベル(復習)

PHPのクラスには、メンバ(プロパティ/メソッド)にどこから触れるかを決める仕組みがある。

| キーワード  | どこから使える？ |
|-------------|------------------|
| `public`    | どこからでも     |
| `protected` | 自分 + 子クラス  |
| `private`   | 自分のクラスだけ |

`protected`は外からは触らせないけど、継承したクラスには触らせたいというためのもの。

クラスの中と生成したプロパティでは異なる点に注意。

```php
<?php
class Sample
{
    public $a = 'public';
    protected $b = 'protected';
    private $c = 'private';

    public function test()
    {
        echo $this->a;
        echo $this->b;
        echo $this->c;
    }
}
```

```php
<?php
$sample = new Sample();

echo $sample->a; // これはOK
echo $sample->b; // エラー
echo $sample->c; // エラー
```

- これは`public`しかNG
- protected、privateはオブジェクトから直接は見えない
- でもクラスの中のメソッド経由なら使える

```php
<?php
$sample->test(); // これならOK
```

- `test()`はクラスの中
- クラスの中ではprotectedは見える
- 外からは入口だけpublicにしてるイメージ

## リアルタイム検証 updated()

- `updated()`はwire:modelで値が変わった瞬間に自動で呼ばれるフック
- その中で`validateOnly()`を使うとリアルタイム検証になる

```php
<?php
public function updated($property)
{
    $this->validateOnly($property);
}
```

### wire:modelで入力が変わる

```blade
<input type="number" wire:model.live.number="count">
```

### Livewireが内部でこう呼ぶ

```php
<?php
updated('count');
```

- メソッド名は固定(予約語)
- 自分で呼んでないのに勝手に呼ばれる

### validateOnly() が走る

```php
<?php
$this->validateOny('count');
```

### 特定の項目だけ検証したい

```php
<?php
public function updatedCount()
{
    $this->validateOnly('count');
}
```

- `updated{PropertyName}(updatedCountなど)`も予約ルール
- `count`が変わった時だけ呼ばれる

## updated vs save の役割分担

| タイミング | 役割                |
|------------|---------------------|
| `updated`  | 入力中の即チェック  |
| `save`     | 最終チェック + 保存 |

=> 二段構えが王道

