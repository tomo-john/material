<?php
// 基本
$matrix = [
  [1, 2, 3],
  [4, 5, 6],
  [7, 8, 9]
];

// 繰り返し
foreach ($matrix as $mtr) {
  foreach ($mtr as $m) {
    echo "{$m}</br>";
  }
}


// 連想配列
$animals = [
  "animalA" => ["いぬ", "うさぎ", "くま"],
  "animalB" => ["らいおん", "とら"],
  "animalC" => ["さる", "ひつじ", "うま"],
];

echo $animals["animalA"][1]; // うさぎ
echo "</br>";

foreach ($animals as $animal => $names) {
  echo "{$animal}の動物:</br>";
  foreach ($names as $name) {
    echo "- {$name}</br>";
  }
}

// その2
$animals = [
  ["name" => "じょん", "power" => 20],
  ["name" => "ぴょんきち", "power" => 150],
  ["name" => "もこもか", "power" => 8]
];

foreach ($animals as $animal) {
  echo $animal["name"] . "さんのパワーは " . $animal["power"] . "です。</br>";
}
