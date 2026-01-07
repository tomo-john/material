# Tinker

```bash
php artisan tinker
```

Laravelの世界に入ったままPHPを対話実行できるツール🐶  

- DB (Eloquent)
- Model
- Config
- Auth
- Cashe

=> 全部使える🐶

## Model

```php
<?php

// 全ユーザーを取得
use App\Models\User;
User::all();

// use省略
App\Models\User::all();

// 最初のユーザーを取得
$user = App\Models\User::first();

// 取得したユーザーの名前だけ表示
$user->name;

// 新しいユーザーを作成
App\Models\User::create(['name' => 'tinker', 'email' => 'tinker@example.com', 'password' => bcrypt('tinker1234')]);

// ユーザーidで取得(id = 3)
$user = App\Models\User::find(3);

// UPDATE
$user->email = 'tinker@gmail.com';
$user->save();
```

## DB / クエリビルダ (Modelなし)

```php
<?php
// 生SQL
DB::select('select * from users');

// クエリビルダ
DB::table('users')->count();
DB::table('users')->pluck('email');
```

## Route / URL

```php
<?php
Route::getRoutes()->count();

route('home');
url('/login');
```

## config / env

```php
<?php
// config値
config('app.name');
config('database.default');

// env値(基本はconfig経由推奨)
env('APP_ENV');
```

## Service Container

```php
<?php
app('auth');
app('router');
app('db');
```

