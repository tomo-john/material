<?php
class dog {
  public $name;
  public $cute;

  // コンストラクタの定義
  public function __construct($name, $cute) {
    $this->name = $name;
    $this->cute = $cute;
  }

  // その他のメソッド...
}

$dog = new Dog('じょん', 10);
echo $dog->name . '\n';
echo $dog->cute . '\n';

?>
