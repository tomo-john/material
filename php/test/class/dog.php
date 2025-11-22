<?php
class Doggy {
  // プロパティをむやみにpublicにしない
  private $name;
  private $hp;
  private $bark_cost = 10;

  // コンストラクタ
  // newした瞬間に自動で実行される特別なメソッド
  // PHPでは __construct() を使用する
  public function __construct($name, $hp = 300) {
    $this->name = $name;
    $this->hp = $hp;
  }

  public function bark() {
    if ($this->hp <= 10) {
      echo $this->name . 'はもう吠えられない...🐶💤<br>';
      return;
    }
    
    echo $this->name . 'がワン！と吠えた🐶<br>';
    $this->hp -= $this->bark_cost;

    if ($this->hp < 0) $this->hp = 0;

    echo $this->name . 'の残りHP: ' . $this->hp . '<br>';
  }

}

$dogA = new Doggy('じょん', 20);
$dogB = new Doggy('ぴょんきち');

$dogA->bark();
$dogA->bark();
$dogA->bark();
$dogB->bark();
$dogB->bark();
$dogB->bark();

?>
