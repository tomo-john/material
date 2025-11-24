<?php
// dog.php クラス定義用ファイル

class DogPointCard {
  private $name;
  private $point;

  // コンストラクタ
  public function __construct(string $name, int $point = 0) {
    $this->name = $name;
    $this->point = $point;
  }

  // ポイント加算メソッド
  public function addPoint(int $p) {
    $this->point += $p;
  }

  // nameを取得するメソッド(getter)
  public function getName() {
    return $this->name;
  }

  // pointを取得するメソッド(getter)
  public function getPoint() {
    return $this->point;
  }

}
?>
