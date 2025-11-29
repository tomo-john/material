<?php
// DogDiary.php

class DogDiary implements JsonSerializable {
  private $title;
  private $content;
  private $date;
  static private $save_data = 'diary.json';

  public function __construct(string $title, string $content) {

    date_default_timezone_set('Asia/Tokyo');

    $this->title = $title;
    $this->content = $content;
    $this->date = date("Y/m/d H:i:s");
  }

  public function jsonSerialize(): array {
    return [
      'title' => $this->title,
      'content' => $this->content,
      'date' => $this->date
    ];
  }

  public static function addDiary($data) {
    file_put_contents(self::$save_data, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), FILE_APPEND);
  }

  public static function getDiaries() {
    if (file_exists(self::$save_data) && !empty(self::$save_data)) {
      return file_get_contents(self::$save_data, true);
    } else {
      return null;
    }
  }

}
