<?php
// 無名関数
$greet = function() {
  echo "こんにちわん</br>";
}; // ここの;を忘れない 

$greet(); // 呼び出すときは変数名のあとに()を付ける！

// 無名関数に引数・戻り値
$add = function($num1, $num2) {
  $result = 0;
  $result = $num1 + $num2;
  return $result;
};

$sum = $add(1, 2) + $add(3, 4);
echo "{$sum}</br>";

// コールバック関数
function greet($callback) {
  echo "挨拶開始...</br>";
  $callback(); // 渡された関数をここで実行
  echo "挨拶終了...</br>";
}

greet(function() {
  echo "私が呼び出される関数なのです</br>";
});

// array_map()
$numbers = [1, 2, 3, 4, 5];

$double = array_map(function($n) {
  return $n * 2;
}, $numbers);

print_r($double); // Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )

echo "</br>";

// array_filter()
$numbers = [1, 2, 3, 4, 5, 6];

$even = array_filter($numbers, function($n){
  return $n % 2 === 0;
});

print_r($even); // Array ( [1] => 2 [3] => 4 [5] => 6 )

