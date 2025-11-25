<?php
class Dog {
  private $name;
  private $level = 1;

  public function __construct($name, $level) {
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
  }
}


$dog1 = new Dog('じょん', 2);

echo $dog1->getName();
echo '<br>';
echo $dog1->getLevel();
echo '<br>';
$dog1->levelUp();
echo $dog1->getLevel();
echo '<br>';

?>
