<?php
// Interface: すべての動物が守るべき契約(ルールブック)
interface Animal {
  public function makeSound(): string;
}

// 個別のクラスを定義(異なる振る舞い)
// Dogクラス: Animalのルールを継承

class Dog implements Animal {
  public function makeSound(): string {
    return 'わんわん🐶<br>';
  }
}

// Rabbitクラス: Animalのルールを継承
class Rabbit implements Animal {
  public function makeSound(): string {
    return 'ぴょ〜ん🐰<br>';
  }
}

// Cowクラス: Animalのルールを継承
class Cow implements Animal {
  public function makeSound(): string {
    return 'もー🐄<br>';
  }
}

// 異なるクラスのオブジェクトを1つの配列に入れる
$animals = [
  new Dog(), new Rabbit(), new Cow(), new Dog()
];

echo '--- Animalたちの鳴き声コレクション ---<br>';

// 配列内のすべての動物に「makeSound()」という同じ命令を出す
foreach ($animals as $animal) {
  echo $animal->makeSound(); // 呼び出すメソッドは同じ
}

?>
