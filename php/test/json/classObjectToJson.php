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
