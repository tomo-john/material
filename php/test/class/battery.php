<?php
class Battery {
  public $capacity;
  public $power;

  public function charge() {
    $this->capacity += $this->power;
    echo 'チャージしました🐶残り電力量: ' . $this->capacity . '<br>';
  }

  public function use($val) {
    $this->capacity -= $val;
    echo '使用しました🐰残り電力量: ' . $this->capacity . '<br>';
  }
}

$bat = new Battery();
$bat->capacity = 100;
$bat->power = 20;
$bat->charge();
$bat->use(70);

?>
