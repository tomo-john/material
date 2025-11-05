# 関数

関数とは、ある処理をひとまとめにして再利用できるようにしたもの。

```
function sayHello() {
  echo "こんにちわん</br>";
}

sayHello();
sayHello();
```

- `function`キーワードで定義する
- `{}`の中に実行したい処理を書く
- 呼び出すときは`関数名();`

## 引数

関数にデータを渡したいときは`引数(パラメータ)`を使用する。

```
function greet($name) {
  echo "こんんちわん、{$name}さん</br>";
}

greet("じょん");
greet("ぴょんきち");
```

- `$name`に呼び出し時の値が代入される
- 複数の引数もOK

## 戻り値

計算の結果など、処理の結果を返したいときは`return`を使用する。

```
function add($num1, $num2) {
  $result = $num1 + $num2;
  return $result;
}

$sum = add(2, 8);
echo $sum; // 10
```

## 配列引数と戻り値(例)

```
function calcAverage($scores) {
  $total = 0;
  foreach ($scores as $score) {
    $total += $score;
  }
  return $total / count($scores);
}

$result = calcAverage([735, 650]);
echo $result;
```

## デフォルト引数

引数に`デフォルトの値`を設定することも可能。

=> 引数がなかったときの値

```
function greet($name = "ゲスト") {
  echo "ようこそ、{$name}さん</br>";
} 

greet();         // ようこそ、ゲストさん
greet("じょん"); // ようこそ、じょんさん
```

## スコープ

関数の中と外では変数の使える範囲が異なる。

関数の中で宣言した変数は`ローカル変数`なので、関数の外では使えない。

```
$dog = "ぴょんきちん"; // 関数の外の変数

function bark() {
  $dog = "じょーん";   // 関数の中の変数
  echo "{$dog}が吠えた！</br>";
}

bark();                       // じょーんが吠えた！
echo "{$dog}が吠えた！</br>"; // ぴょんきちんが吠えた！
```

