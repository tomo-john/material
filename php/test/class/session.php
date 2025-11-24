<?php
session_start();

class Dog {
  private $name;
  private $age = 2;

  public function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }

  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }

  public function addAge() {
    return $this->age += 1;
  }
}

$dog1 = new Dog('じょん', 2);
$dog2 = new Dog('ぴょんきち', 5);

echo $dog1->getName();
echo $dog1->getAge();

$dog1->addAge();
echo $dog1->getAge();

$_SESSION['data'] = [];
$_SESSION['data'][] = $dog1;
$_SESSION['data'][] = $dog2;

$targetName = 'じょん';
$foundDog = null;

foreach ($_SESSION['data'] as $dogObject) {
  if ($dogObject->getName() === $targetName) {}
    $foundDog = $dogObject;
    break;
}

if ($foundDog !== null) {
  var_dump($foundDog);
}

$foundDog->addAge();

var_dump($_SESSION['data'][0]);


?>
