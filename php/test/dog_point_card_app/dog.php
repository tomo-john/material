<?php
// dog.php クラス定義用ファイル

class DogPointCard {
  private $name;
  private $point;

  public function __construct($name) {
    $this->name = $name;
    $this->point = 0;
  }

  public function addPoint($p) {
    $this->point += $p;
  }

  public function getInfo() {
    return $this->name . 'の合計ポイントは' . $this->point . 'だワン🐶<br>';
  }
}

?>
