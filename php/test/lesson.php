<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// 1 偶数の要素だけ取り出す
$even = array_filter($numbers, function($n){
  return $n % 2 === 0;
});

print_r($even);
echo "</br>";

// 2 その偶数をすべて2乗する
$squared = array_map(function($n){
  return $n * $n;
}, $even);

print_r($squared);
echo "</br>";

// 3 その合計値を求める
$sum = array_reduce($squared, function($array, $n){
  $array += $n;
  return $array;
});

print_r($sum);
