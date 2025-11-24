# コンストラクタ

クラスの新しいオブジェクトが生成される際(インスタンス化される時)に自動的に呼び出される特別なメソッド。

そのオブジェクトの初期設定のために使用される。

クラス内に`__construct`という特殊なメソッド名を使ってコンストラクタを定義する。

```
<?php
class dog {
  public $name;
  public $cute;

  // コンストラクタの定義
  public function __construct($name, $cute = 0) {
    $this->name = $name;
    $this->cute = $cute;
  }

  // その他のメソッド...
}

$dog = new Dog('じょん', 10);
echo $dog->name . '\n';
echo $dog->cute . '\n';

?>
```

