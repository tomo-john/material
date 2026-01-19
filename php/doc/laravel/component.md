# コンポーネント

## 作成(2ファイル)

```bash
php artisan make:component Message
```

- `app/View/Components/Message.php` => ロジック担当(裏方)
- `resources/views/components/message.blade.php` => 表示担当(見た目)

`app/View/Components/Message.php`のコンストラクタの引数に追記。

```php
<?php
public function __construct(
    public ?string $message
)
{}
```

これにより、ビューファイルから受け取った`$message`をプロパティとして定義する。

`?`を型の前につけることで、`$message`が渡されなかった場合にもエラーにならず省略可能なプロパティとして定義できる。

`render()`メソッドには表示するビューファイルを指定する。

`resources/views/components/message.blade.php`を編集。

```blade
@if (!empty($message))
    <div class="p-4 m-2 rounded bg-green-100">
        {{ $message }}
    </div>
@endif
```

コンポーネントの呼び出し。(呼び出したいビューファイルに記述)

```blade
<x-message :message="session('message')" />
```

## Props

`app/View/Componets`内のファイルを使用しなくてもコンポーネントを作ることは可能。

=> 直接(コマンドを使わず)`resources/views/components/message.blade.php`を作成

```blade
@props(['message'])
```

で変数情報を受け取ることが可能🐶

---

Bladeコンポーネントで、`.`を使用すると、Laravelは`resources/views/components/`の中を探しに行く。

`<x-layouts.app>` => `resources/views/components/layouts/app.blade.php`を探す。

### ::の意味(名前空間 / Namespace)

`<x-layouts::app>`の`::`は`layouts`という名前(名前空間)で登録されている場所にある`app`をという意味になる。

Laravelの初期設定では、`resources/views/layouts`ディレクトリが自動的にコンポーネントとして登録されている場合がある。

=> その際に、この`::`の記法が使われる。

