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

  public static function addDiary($new_data) {
    $old_data = self::getDiaries();

    if (!is_array($old_data)) {
      $old_data = [];
    }
    $update_data = array_merge($old_data, $new_data);
    file_put_contents(self::$save_data, json_encode($update_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }

  public static function getDiaries() {
    if (file_exists(self::$save_data)) {
      $file_content = file_get_contents(self::$save_data);

      if ($file_content !== false && $file_content !== '') {
        return json_decode($file_content);
      }
    return null;
    }
  }

}
