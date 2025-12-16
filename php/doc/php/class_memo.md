# クラス関連メモ

## クラス定義ファイル読み込み

```
require_once 'dog.php'; 
```

## クラスオブジェクトをJSONファイルに保存

```
<?php

// テスト用クラス定義
class Dog {
  public $name;
  public $age;
  static private $file = 'dog.json';

  public function __construct(string $name, int $age) {
    $this->name = $name;
    $this->age = $age;
  }

  public static function addFile($new_data) {
    // 既存のデータをチェック
    $old_data = self::getFile();
    
    // 読み込んだデータが配列でなければ、空の配列で初期化
    if (!is_array($old_data)) {
      $old_data = [];
    }

    // 新しいオブジェクト(配列)を既存データに追加
    $update_data = array_merge($old_data, $new_data);

    // ファイル全体を上書き保存(FILE_APPENDは使わない)
    file_put_contents(self::$file, json_encode($update_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }

  public static function getFile() {
    if (file_exists(self::$file)) {
      $file_content = file_get_contents(self::$file);
      if ($file_content !== false && $file_content !== '') {
        return json_decode($file_content, true);
      }
    }
    return null;
  }

// クラス定義終了
}

// オブジェクト作成とJSONファイル書き込み
for ($i = 1; $i <= 5; $i++) {
 $dog = [new Dog('じょん' . $i, $i)];
 Dog::addFile($dog);
}

// JSONファイルから取得
$old_data = Dog::getFile();
var_dump($old_data);
```

## privateをJSONファイルに保存するとき

```
class Dog implements JsonSerializable {
  private $name;
  private $age;
  ...
  (略)

  // これがいる
  public function jsonSerialize(): array {
    return [
      'name' => $this->name,
      'age' => $this->age
    ];
  }
}
```

## 静的メソッドとインスタンスメソッド

```php
<?php
// === Animal.php ===

/**
 * 🐶 クラスの定義: Animal
 * 動物という存在の「設計図」です。
 */
class Animal
{
    // ----------------------------------------------------
    // 1. インスタンスプロパティ（インスタンスごとに異なるデータ）
    // ----------------------------------------------------
    public $name;

    // ----------------------------------------------------
    // 2. 静的プロパティ（クラス全体で共有されるデータ）
    // ----------------------------------------------------
    // 全てのAnimalオブジェクトの合計数を保持する（共通データ）
    public static $totalAnimals = 0;

    /**
     * コンストラクタ: インスタンス生成時に自動で実行されるメソッド
     * @param string $name 動物の名前
     */
    public function __construct($name)
    {
        // $this->name (インスタンスプロパティ) に名前をセット
        $this->name = $name;

        // self::$totalAnimals (静的プロパティ) の値を増やす
        // 静的プロパティにアクセスするときは self:: を使う
        self::$totalAnimals++;
    }

    // ----------------------------------------------------
    // 3. インスタンスメソッド (->): 特定のオブジェクトの機能
    // ----------------------------------------------------

    /**
     * 特定のインスタンスの名前を取得する
     * @return string
     */
    public function getName()
    {
        // $this->name (このインスタンスのデータ) にアクセスするときは $this-> を使う
        return $this->name;
    }

    // ----------------------------------------------------
    // 4. 静的メソッド (::): クラス全体（設計図）の機能
    // ----------------------------------------------------

    /**
     * クラス全体で共有されている動物の合計数を取得する
     * @return int
     */
    public static function showTotal()
    {
        // 静的プロパティにアクセスするときは self:: を使う
        return self::$totalAnimals;
    }
}

// 静的メソッドはインスタンス作らなくても呼び出せる
echo Animal::showTotal() . PHP_EOL;

// 1つ目のインスタンス生成
$animal_1 = new Animal('じょん');

// インスタンスメソッド(->)の呼び出し
echo $animal_1->getName() . PHP_EOL;

// 静的プロパティはクラス全体で共有
echo Animal::showTotal() . PHP_EOL;

// 2つ目のインスタンス生成・インスタンスメソッド・静的メソッド
$animal_2 = new Animal('ぴょんきち');
echo $animal_2->getName() . PHP_EOL;
echo Animal::showTotal() . PHP_EOL;
```

