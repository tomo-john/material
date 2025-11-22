<?php
class Dice {
  public function roll() {
    $result = mt_rand(1, 6);
    echo $result . '<br>';
  }
}

$dice = new Dice();

for ($i = 1; $i <=6; $i++) {
  $dice->roll();
}

