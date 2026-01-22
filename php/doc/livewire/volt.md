# Volt

Livewire + Voltのコンポーネント(PHP + Bladeが同居)🐶

PHPのロジックとHTMLのテンプレートを1つのファイル(`.blade.php`)にまとめて書けるLivewireの新機能。

通常のLivewireだと:

- PHPクラス => `app/Livewire/SandboxDog.php`
- Blade => `resources/views/livewire/sandbox-dog.blade.php`

Voltだと:

- 1ファイルに全部書く

```php
<?php

use Livewire\Component;
use App\Models\Sandbox;

new class extends Component
{
    public $xxx;
    
    public function mount()
    {
      // 処理
    }

    public function updatedSandboxId()
    {
      // リアルタイム処理など
    }

    public function save()
    {
      // 独自のメソッドも定義できる
    }

};

?>

<!-- ここからBlade側🐶 -->
<div> ... </div>
```

## memo

- `public`プロパティ = 画面と同期する変数
- `mount()` = 初期化専用(最初の1回だけページ表示時に呼ばれる)
- `updatedXxx()` = updatedは決まった命名ルール(`updated + プロパティ名(StudlyCase)`
- `updatedXxx()`はプロパティが変更された瞬間に自動で呼ばれる


