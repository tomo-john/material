<?php

// 基本
$fruits = ["りんご", "みかん", "ばなな"];
echo $fruits[0] . "と" . $fruits[2] . "</br>";

// 末尾に追加
$fruits[] = "いちご";
echo $fruits[3];
echo "</br>";

// 連想配列

$user = [
  "name" => "じょん",
  "age" => 2,
  "job" => "犬"
];

echo "名前: " . $user["name"] . " / 年齢: " . $user["age"] .  " / 職業: " . $user["job"] . "</br>";

