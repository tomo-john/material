<?php
// クラス(設計図)の定義
class Dog {
  public $name; // プロパティ(データ)

  public function bark() { // メソッド(機能)
    return $this->name . 'がワン！と吠えました🐶<br>';
  }
}

// オブジェクト(実態)の生成
$john = new Dog();
$john->name = 'じょん';
echo $john->bark(); // 出力: じょんがワン！と吠えました🐶

// 継承
class WorkingDog extends Dog { // Dogクラスを全て引き継ぐ
  public function work() {
    return $this->name . 'は訓練を受けています🐶<br>';
  }
}

// WorkingDogはbark()メソッドも使える
$working_john = new WorkingDog();
$working_john->name = '働くじょん';
echo $working_john->work();
echo $working_john->bark();

?>
