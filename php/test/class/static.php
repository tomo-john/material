<?php
class Dog {
  public static $count = 0; // クラス全体で共有

  public function __construct() {
    self::$count++; // 犬が生まれるたびに増える
  }
}

// 使い方
$dog1 = new Dog();
$dog2 = new Dog();
$dog3 = new Dog();

echo Dog::$count; // 3
?>
