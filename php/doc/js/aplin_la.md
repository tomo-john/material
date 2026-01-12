# Alpine.jsをLaravelで使用する

## サンプル(pawverse)

### Alpine(JS)側

`resouces/js/dog/ui.js`

```javascript
document.addEventListener('alpine:init', () => {
    Alpine.data('dogUi', (initial = {}) => ({

        // state
        name: initial.name ?? '',
        color: initial.color ?? 'gray',
        size: initial.size ?? 'medium',

        isHoverd: false,

        // computed
        sizeClass() {
            return {
                small: 'text-4xl',
                medium: 'text-6xl',
                large: 'text-8xl',
            }[this.size]
        },

        colorClass() {
            return {
                white: 'text-white drop-shadow',
                black: 'text-black',
                gray: 'text-gray-500',
                brown: 'text-amber-800',
                gold: 'text-yellow-500',
            }[this.color]
        },

    }))
})
```

```javascript
documet.addEventListener('alpine:init', ...)
```

Alpine.jsが初期化された瞬間にこの中の処理を実行する。

- Alpineは`app.js`で読み込まれる
- 読み込み完了前に`Alpine.data()`を書くと未定義エラー
- `alpine:init`はAlpine準備完了の合図

```javascript
Alpine.data('dogUi', (initial = {} => ({...})
```

Alpineコンポーネントを定義している。

- `dogUi`: HTMLの`x-data="dogUi(...)"`と対応
- `(initial = {})`: 外から渡される初期データ

Blade側ではこんな感じで呼び出している。

```blade
x-data="dogUi({
    name: '{{ $dog->name }}',
    color: '{{ $dog->color }}',
    size: '{{ $dog->size }}',
})"
```

dogUiという設計図を作って、HTMLごとに実体化している。

```javascript
name: initial.name ?? '',
color: initial.color ?? 'gray',
size: initial.size ?? 'medium',
```

ここでは、このコンポーネントが持つデータ(状態)を定義している。

`initial`から受け取った値を使う。なければデフォルト値を記載。(`??`: null合体演算子)

```javascript
isHoverd: false,
```

状態フラグ。UIの状態を管理するための変数として定義。

Blade側でこんな風に使える:

```blade
<div
  @mouseenter="isHoverd = true"
  @mouseleave="isHoverd = false"
>
```

状態を`boolean`で持ち、classや表示を切り替える。

```javascript
sizeClass() {
  return {
      small: 'text-4xl',
      medium: 'text-6xl',
      large: 'text-8xl',
  }[this.size]
},
```

定義したstate(size)を元に計算して返す`関数`

- sizeが変わるたびに自動で再評価される
- smal~largeに応じてTailwindのクラスを返す
- `colorClass()`も同じ仕組みの関数

### Blade側

```blade
<div x-data="dogUi({ ... })" >
```

- x-dataがスイッチ
- dogUiはコンポーネント名

最小構成の例(何も渡さない):

```blade
<div x-data="dogUi()">
    <i class="fa-solid fa-dog" :class="[sizeClass(), colorClass()]"></i>
</div>
```

- 何も渡していないので、`initial = {}`が使われる(デフォルト値)

Bladeから値を渡す:

```blade
<li
    x-data="dogUi({
        name: '{{ $dog->name }}',
        color: '{{ $dog->color }}',
        size: '{{ $dog->size }}',
    })"
>
```

- PHP => Blade => JSに値が渡る
- 各dogごとに独立したAlpineコンポーネント

stateの表示:

```javascript
// JS側
name: initial.name ?? '',
```

```blade
{{-- Blade側--}}
<h4 x-text="name"></h4>
```

- `{{ }}`でなはなく`x-text`
- Alpineのリアルティブ更新が効く

computedをclassに使う:

```blade
<i
    class="fa-solid fa-dog transition"
    :class="[sizeClass(), colorClass()]"
></i>
```

### :classの意味

```blade
:class="JSの式"
```

=> 配列にすると、複数クラスを合成できる

