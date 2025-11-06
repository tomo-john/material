# 無名関数(anonymous function)

その名の通り、`名前のない関数`のこと。

無名関数は、変数に代入して使う感じになる。

一時的に関数を作りたいときや、関数を他の関数に渡すとき(=コールバック)に便利。

```
$greet = function() {
  echo "こんにちわん";
}; // ここの;を忘れない 

$greet(); // 呼び出すときは変数名のあとに()を付ける！
```

## 無名関数に引数

普通の関数と同じように、引数・戻り値も使用可能。

```
$add = function($num1, $num2) {
  $result = 0;
  $result = $num1 + $num2;
  return $result;
};

$sum = $add(1, 2) + $add(3, 4);
echo $sum; // 10
```

# コールバック関数(callback function)

関数の引数として別の関数を渡す。

```
function greet($callback) {
  echo "挨拶開始...</br>";
  $callback(); // 渡された関数をここで実行
  echo "挨拶終了...</br>";
}

greet(function() {
  echo "私が呼び出される関数なのです</br>";
});
```

=> 関数を別の関数に渡して実行してもらうというテクニック

## 配列関数でのコールバックの使われ方

PHPの組み込み関数でも、コールバック関数がよく使用されている。

### 例1: array_map()

```
$numbers = [1, 2, 3, 4, 5];

$double = array_map(function($n) {
  return $n * 2;
}, $numbers);

print_r($double); // Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )
```

=> `array_map`は配列の各要素に関数を適用して、新しい配列を作る関数

=> コールバック関数でどう処理するか(ここでは2倍)を定義している

### 例2: array_filter()

$numbers = [1, 2, 3, 4, 5, 6];

$even = array_filter($numbers, function($n){
  return $n % 2 === 0;
});

print_r($even); // Array ( [1] => 2 [3] => 4 [5] => 6 )

=> `array_filter`は配列の中から特定の条件を満たす要素だけを残す関数

=> コールバック関数でどんな条件で残すか(ここでは偶数)を定義している。

`array_map`と`array_filter`では関数・配列を渡す順番が異なる点に注意。

- `array_map(コールバック関数, 配列);`
- `array_filter(配列, コールバック関数);`

### なぜ違う？

- `array_map()`はこの関数を配列に適用して変換する => 関数を中心に考える
- `arrya_filter()`はこの配列の中から、条件に合うものを残す => 配列を中心に考える

