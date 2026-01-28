# match式

PHP 8.0で導入された`switch`文の進化版。従来の`switch`よりも短く、安全に書ける。

## switchとの違い

- 値を消す: `match`全体がひとつの値となり、そのまま変数に代入できる
- 厳密な比較: `switch`は`==`(ゆるい比較)、`match`は`===`(厳密な比較)で判定
- `break`が不要

## 書き方の基本

```php
<?php
$result = match($variable) {
    '条件1' => '返す値1',
    '条件2' => '返す値2',
    default => 'どれにも当てはまらない時の値',
};
```

## 複数代入

```php
<?php
[$color, $icon] = match($type) {
    'create' => ['bg-green-600', 'fa-plus'],
    'delete' => ['bg-red-600', 'fa-trash'],
    default  => ['bg-gray-600', 'fa-info'],
};
```

一度に2つの値(クラス名とアイコン名)を配列として返している🍞

