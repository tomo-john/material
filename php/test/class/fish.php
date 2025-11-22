<?php
class Fish {
  public $name;
  public $weight = 10;

  public function swim() {
    echo $this->name . 'が泳いだ🐟<br>';
  }

  public function grow() {
    $this->weight += 5;
    echo $this->name . 'が成長🐟現在の体重は' . $this->weight . '<br>';
  }
}

$fishA = new Fish();
$fishA->name = 'じょん';
$fishA->swim();
$fishA->grow();
$fishA->grow();
$fishA->grow();
$fishA->grow();
$fishA->grow();
$fishA->grow();

?>
