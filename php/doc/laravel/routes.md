# ルーティング

```php
<?php
# routes/web.php

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

```php
<?php
# CRUD
Route::get('dogs', [DogController::class, 'index'])->name('dogs.index');
Route::get('dogs/create', [DogController::class, 'create'])->name('dogs.create');
Route::post('dogs', [DogController::class, 'store'])->name('dogs.store');
Route::get('dogs/{dog}', [DogController::class, 'show'])->name('dogs.show');
Route::get('dogs/{dog}/edit', [DogController::class, 'edit'])->name('dogs.edit');
Route::put('dogs/{dog}', [DogController::class, 'update'])->name('dogs.update');
Route::delete('dogs/{dog}', [DogController::class, 'destroy'])->name('dogs.destroy');
```

