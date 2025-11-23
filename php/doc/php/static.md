# static

そのデータや機能が個々のオブジェクトに属するものではなく、クラス全体に属すると宣言する為のキーワード。

アクセス方法: `クラス名::$プロパティ名`または`クラス名::$メソッド名()`

## 犬クラスでの例

### インスタンス(個々の犬)の情報

- 名前
- 年齢
- 強さ

=> じょん犬とぴょんきち犬ではそれぞれ同じ犬でも個体差や名前が異なる

### static(犬クラス全体で共有する情報)

- 犬が何匹生成されたか
- 犬の最大の強さ(犬の限界値)
- 犬の種族名

=> 個々で違わない共有の情報

### サンプルコード

```
<?php
class Dog {
  public static $count = 0; // クラス全体で共有

  public function __construct() {
    self::$count++; // 犬が生まれるたびに増える
  }
}

// 使い方
$dog1 = new Dog();
$dog2 = new Dog();
$dog3 = new Dog();

echo Dog::$count; // 3
?>
```

- `$dog1->count`ではアクセスできない
- `Dog::$count`のように`クラス名::プロパティ名`でアクセス
- すべてのインスタンスで共有される値

## staticメソッド

```
<?php
class Dog {
  public static function barkRule() {
    echo '犬はHPが0でも吠えられないワン🐶';
  }
}

Dog::barkRule();

?>
```

=> staticメソッドはインスタンスを作らずに呼ぶことができる :dog:

