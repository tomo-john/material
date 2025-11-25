<?php
class Dog {
  private $name;
  private $level;

  public function __construct($name, $level = 1) {
    $this->name = $name;
    $this->level = $level;
  }

  public function bark() {
    echo $this->name . 'はわんわんと吠えた🐶<br>';
  }

  public function getName() {
    return $this->name;
  }

  public function getLevel() {
    return $this->level;
  }

  public function levelUp() {
    $this->level += 1;
    echo $this->name . 'はレベルアップ!🐶<br>';
    $this->bark();

    echo $this->name . 'の現在のレベルは'  . $this->level . '<br>';
  }
}


$dog1 = new Dog('じょん');
$dog1->levelUp();
$dog1->levelUp();

?>
