<?php
// Dogmon.php クラス定義

class Dogmon {
  private $name;
  private $type;
  private $level;

  public function __construct($name, $type, $level = 1) {
    $this->name = $name;
    $this->type = $type;
    $this->level = $level;
  }

  public function getName() {
    return $this->name;
  }

  public function getType() {
    return $this->type;
  }

  public function getLevel() {
    return $this->level;
  }

  public function levelUp() {
    $this->level += 1;
  }

  public function getInfo() {
    echo $this->getName() . 'のタイプは' . $this->getType() . 'でレベルは'  . $this->getLevel() . 'です<br>';
  }

}

