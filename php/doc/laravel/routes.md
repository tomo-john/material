# ルーティング

```
# routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\MonsterController;

Route::get('/', function () {
    return view('welcome');
});

// menus
Route::view('menus', 'menus')->name('main.menus');

// dogs
Route::resource('dogs', DogController::class);

// monsters
Route::get('monsters', [MonsterController::class, 'index'])->name('monsters.index');
```

