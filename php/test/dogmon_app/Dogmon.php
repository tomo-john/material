<?php
// Dogmon.php クラス定義

class Dogmon {
  private $name;
  private $type;
  private $level;

  public function __construct($name, $type, $level = 1) {
    $this->name = $name;

    switch ($type) {
      case 'normal': $this->type = 'ノーマル🐶';
      break;
      case 'fire': $this->type = '炎🔥';
      break;
      case 'water': $this->type = '水💧';
      break;
      case 'leaf': $this->type = '草🌿';
      break;
      case 'fight': $this->type = '格闘🐰';
      break;
    };

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

