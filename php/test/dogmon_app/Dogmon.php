<?php
// Dogmon.php クラス定義

class Dogmon implements JsonSerializable {
  private $name;
  private $type;
  private $type_view;
  private $level;

  public function __construct($name, $type, $level = 1) {
    $this->name = $name;
    $this->type = $type;

    switch ($type) {
      case 'normal': $this->type_view = 'ノーマル🐶';
      break;
      case 'fire': $this->type_view = '炎🔥';
      break;
      case 'water': $this->type_view = '水💧';
      break;
      case 'leaf': $this->type_view = '草🌿';
      break;
      case 'fight': $this->type_view = '格闘🐰';
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

  public function getType_view() {
    return $this->type_view;
  }

  public function getLevel() {
    return $this->level;
  }

  public function levelUp() {
    $this->level += 1;
  }

  public function jsonSerialize(): mixed {
    return [
      'name' => $this->name,
      'type' => $this->type,
      'level' => $this->level
    ];
  }

}

