# トースト

画面の端にふわっと出て、数秒後に勝手に消える通知。

=> トースターからポンって🍞が出てくる感じ

- 画面の右上 / 右下に固定表示
- どこにいても見える
- 数秒で自動消滅
- 操作の邪魔はしない

# サンプル

Laravel 12にて使用🍞

- 保存 / 更新 / 削除などしたら右上にトーストが出る(位置固定)
- 3秒後に自動で消える

## Laravel側

```php
<?php
session()->flash('message', '表示するメッセージ');
```

=> トースト側は`session('message')`を見るだけ🍞

## Blade側

```blade
@if (session()->has('message'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="fixed top-4 right-4 z-50"
    >
        <div class="bg-green-600 text-white text-sm rounded-lg px-4 py-3 shadow-lg flex items-cneter gap-2">
            <i class="fa-solid fa-check"></i>
            <span>{{ session('message') }}</span>
        </div>
    </div>
@endif
```

- `fixed top-4 right-4`

  - 画面の右上に固定表示
  - スクロールしても動かない

- `x-data="{show: true}"`

  - Alpineの状態(表示ON)

- `x-init="setTimeout(...)"`

  - 3秒後に自動で消える

- `x-show="show"`

  - showがfalseになると非表示

- `x-transition`

  - `フェードイン / フェードアウト`

## Alpineの基礎

### x-data: データの定義(心臓部)

その要素がどんな状態(変数)を持っているかを宣言する。

これがないとAlpineの機能が使えない。

- 役割: スコープ(有効範囲)の作成と変数の初期化
- 範囲: `x-data`を書いたタグとその子要素すべてで定義した変数が使える

### x-init: 初期化処理(スタート合図)

要素がブラウザに表示された瞬間に一度だけ実行したい処理を書く。

- 役割: タイマーの起動、データの取得、外部ライブラリの読み込みなど
- コンボ: `x-data`で定義した変数を、表示直後に書き換えたりする

### x-show: 表示・非表示(見た目の切り替え)

変数の値が`true`, `false`かによって、要素の`display: none;`を切り替える

- 役割: モーダル、ドロップダウン、フラッシュメッセージの表示制御
- 特徴: CSSで隠すだけなので、アニメーションとの相性が良い

## メッセージによってスタイルを変える

PHP側: `type`を持たせる

```php
<?php
session()->flash('message', '作成しました');
session()->flash('type', 'create');
```

Blade側: `session('type')`で判断

```blade
@if (session()->has('message'))
    <div
        wire:key="{{ session('message') . now() }}"
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="fixed top-4 right-4 z-50"
    >
        @php
            [$bgClass, $icon] = match(session('type')) {
                'create' => ['bg-green-600', 'fa-solid fa-plus-circle'],
                'update' => ['bg-blue-600', 'fa-solid fa-pen-square'],
                'delete' => ['bg-red-600', 'fa-solid fa-trash-can'],
                default => ['bg-gray-600', 'fa-solid fa-check'],
        };
        @endphp
        <div class="{{ $bgClass }} text-white text-sm rounded-lg px-4 py-3 shadow-2xl flex items-center gap-3 border border-white/20">
            <i class="{{ $icon }}"></i>
            <span class="font-medium">{{ session('message') }}</span>
        </div>
    </div>
@endif
```

