# 多次元配列

配列の中に配列が入っているデータ構造。


## 基本

```
<?php
$matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];

echo $matrix[0][0]; // 1
echo $matrix[1][1]; // 5
echo $matrix[2][2]; // 9
```

```
foreach ($matrix as $mtr) {
  foreach ($mtr as $m) {
    echo "{$m}</br>";
  }
}
```

## 連想配列

```
$animals = [
  "animalA" => ["いぬ", "うさぎ", "くま"],
  "animalB" => ["らいおん", "とら"],
  "animalC" => ["さる", "ひつじ", "うま"],
];

echo $animals["animalA"][1]; // うさぎ
```

- `$animals["animalA"]` => animalAの配列全体
- `$animals["animalA"][1]` => animalAの2番目の要素

```
foreach ($animals as $animal => $names) {
  echo "{$animal}の動物:</br>";
  foreach ($names as $name) {
    echo "- {$name}</br>";
  }
}
```

- `$animals as $animal => $names`がポイント

```
$animals = [
  ["name" => "じょん", "power" => 20],
  ["name" => "ぴょんきち", "power" => 150],
  ["name" => "もこもか", "power" => 8]
];

foreach ($animals as $animal) {
  echo $animal["name"] . "さんのパワーは " . $animal["power"] . "です。</br>";
}
```

