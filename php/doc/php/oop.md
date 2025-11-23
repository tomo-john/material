# オブジェクト指向

## クラスとオブジェクト(設計図と実物)

| 要素         | PHP用語  | 例(犬の工場)     | 役割                         |
|--------------|----------|------------------|------------------------------|
| クラス       | Class    | 犬の設計図       | オブジェクトを作るための型   |
| オブジェクト | Object   | ジョン、ポチ     | 設計図を基に作られた実態     |
| プロパティ   | Property | 名前、犬種、年齢 | 設計図を基に作られたデータ   |
| メソッド     | Method   | `bark()`(吠える) | オブジェクトが実行できる機能 |

```
// クラス(設計図)の定義
class Dog {
  public $name; // プロパティ(データ)

  public function bark() { // メソッド(機能)
    return $this->name . 'がワン！と吠えました🐶';
  }
}

// オブジェクト(実態)の生成
$john = new Dog();
$john->name = 'じょん';
echo $john->bark(); // 出力: じょんがワン！と吠えました🐶
```

## カプセル化(Encapsulation)

オブジェクトのデータを外部から勝手に操作されないように隠すこと。

| アクセス修飾子 | 意味   | 外部からのアクセス                     |
|----------------|--------|----------------------------------------|
| `public`       | 公開   | どこからでもアクセス・変更可能         |
| `private`      | 非公開 | そのクラスの中だけで使える             |
| `protected`    | 保護   | そのクラスと継承した子クラスから使える |

間違った値(年齢にマイナス値など)が設定されるのを防ぎ、プログラムの安定性を高めてくれる。

## 継承

既存のクラス(親)の機能を引き継いで、新しいクラス(子)を作ること。

=> コードの再利用性が向上する

```
class WorkingDog extends Dog { // Dogクラスを全て引き継ぐ
  public function work() {
    return $this->name . 'は訓練を受けています🐶';
  }
}
// WorkingDogはbark()メソッドも使える
```

## 多様性/ポリモーフィズム(Polymorphism)

異なるオブジェクトが、同じ名前のメソッドに対して、それぞれ異なる振る舞いをすること。

- `Dog`クラスの`makeSound()`は「ワン！」を返す
- `Rabbit`クラスの`makeSound()`は「ピョーン」を返す

呼び出す側は`makeSound()`だけで、相手が犬でもうさぎでも適切に処理が実行される。

=> コードの柔軟性が高まる

同じ名前のメソッドなのにモノによって違う動きをするイメージ。

```
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
```

### extendsとimplements

どちらも親クラスを引き継ぐという動作は同じだが、引き継ぐ対象と目的が異なる。

上記の例であれば、`extends`を使っても親クラスに`makeSound()`があれば子クラスでも利用できる。

| 項目     | `extends`(継承)                       | `implements`(実装)                 |
|----------|---------------------------------------|------------------------------------|
| 対象     | クラス(Class)                         | インターフェース(Interface)        |
| 目的     | 機能とデータを再利用する              | ルール(契約)を守ることを強制する   |
| 制限     | 1つのクラスしか継承できない(単一継承) | 複数のインターフェースを実装できる |
| 関係     | xxxはyyyの一種である                  | xxxはyyyの能力を持っている         |
| 関係(例) | ゴールデンレトリバーは犬の一種        | 飛行機は飛ぶ能力を持っている       |
| 親クラス | 具体的な処理が書かれたコード          | メソッド名だけが定義されたルール   |

`extends`(継承)は全てを引き継ぐので、親クラスで`makeSound()`メソッドの処理を定義

=> 子クラスは引き継ぐだけでそのまま使える

`implements`(実装)はルールだけを引き継ぐので、インターフェースというルールブックに書かれたメソッドの名前と引数だけを引き継ぐ。

インターフェースには具体的な処理は書かれていない。

`implements Animal`と書いた時点で、`makeSound()`の具体的な処理を書きなさいと宿題を課された状態となる。

=> この処理を書かないとエラーになる

このルールを守らせる機能こそがポリモーフィズムを実現するための土台となる。

1つのクラスは、1つのクラスを継承し、複数のインターフェースを実装することも可能。

```
class Golden extends Dog implements Animal, Pet {
  // Dogクラスの機能と引き継ぎつつ、
  // AnimalとPetインターフェースのルールを守る
}
```

