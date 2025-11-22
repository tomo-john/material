<?php
class Doggy {
  public $name;
  public $hp = 100;

  public function bark() {
    echo $this->name . 'がワン！と吠えた🐶<br>';
  }

  public function damage($point) {
    $this->hp -= $point;
    echo $this->name . 'は ' . $point . ' のダメージ！残りHP: ' . $this->hp . '<br>';
  }
}

$dogA = new Doggy();
$dogA->name = 'じょん';

$dogB = new Doggy();
$dogB->name = 'ぴょんきち';

$dogA->bark();
$dogB->bark();

$dogA->damage(20);
$dogB->damage(50);
$dogA->damage(20);

?>
