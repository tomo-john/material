# Collection芸の基礎知識

配列、ループ、if文をCollectionで美しく・短く・安全に書く技🐶

TinkerはCollection芸を練習(?)するのに適している🐰

### map (変換)

```php
<?php
collect([1, 2, 3])->map(fn ($i) => $i * 2);
```

全員に同じ処理。

### filter (絞り込み)

```php
<?php
collect([1, 2, 3, 4])->filter(fn ($i) => $i % 2 === 0);
```

### pluck (1項目だけ抜く)

```php
<?php
App\Models\User::all()->pluck('email');
```

配列の`array_column`の上位互換。

### first / last

```php
<?php
$users = App\Models\User::all();

$users->first();
$users->last();

// 条件付きも可
$users->first(fn ($u) => $u->is_admin);
```

### groupBy (分類)

```php
<?php
$users->groupBy('role');

[
  'admin' => [...],
  'user' => [...],
]
```

集計処理の基本。

### sortBy / sortByDesc

```php
<?php
$users->sortBy('created_at');
$users->sortByDesc('score');
```

### reduce

```php
<?php
collect([1, 2, 3])->reduce(fn ($sum, $i) => $sum + $i, 0);
// 6
```

### Eloquent x Collection (sample)

```php
<?php

User::all()
    ->filter(fn ($u) => $u->email_verified_at)
    ->groupBy('role')
    ->map(fn ($group) => $group->count());
```

