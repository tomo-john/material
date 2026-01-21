# dd

Dump an Die の略で、中身を表示してそこで処理を止める(最強の🐶)デバッグツール。

```php
<?php
dd($variable);
```

ddはどこでも使える？ => ほぼどこでもOK🐶

- Controller
- Model
- Livewire
- Blade
- Seeder
- Factory
- Tinker

## よく使う場面🐶

Controllerで:

```php
<?php
public function index()
{
    $posts = Post::all();
    dd($posts);
}
```

=> DBから何取れているか一発確認

Livewireで:

```php
<?php
public function save()
{
    dd($this->title, $this->body);
}
```

=> フォームの値確認

条件分岐の中で:

```php
<?php
if ($user->isAdmin()) {
    dd('admin');
}
```

=> ここ通ってる？チェック

## memo

リクエストの全データを見る🐶

```php
<?php
// Controller
public function store(Request $request)
{
    dd($request->all());
}
```

