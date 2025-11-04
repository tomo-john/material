<?php
$dogs = ["ダックス", "ゴールデン", "ラブラドール"];

foreach ($dogs as $dog) {
  echo "{$dog}が走った</br>";
}

echo "</br>";

$words = [
  "いぬ" => "dog",
  "うさぎ" => "rabbit",
  "くま" => "bear"
];

foreach ($words as $key => $val) {
  echo "{$key}は英語で{$val}です。</br>";
}
