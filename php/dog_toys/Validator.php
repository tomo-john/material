<?php
/* Validator.php
 * バリデーション関連
 */

class Validator {
  
  private $errors = [];

  // 未入力チェック
  public function required(string $key, $value, string $label): void {
    if (empty(trim($value ?? ''))) {
      $this->errors[$key][] = "{$label}は必須項目です";
    }
  }

  // 数値チェック
  public function isInteger(string $key, $value, string $label): void {
    if (!empty($value) && !filter_var($value, FILTER_VALIDATE_INT)) {
      $this->errors[$key][] = "{$label}は整数で入力して下さい";
    }
  }

  // バリデーションの実行
  public function validate(array $data): bool {
    $this->required('name', $data['name'] ?? null, 'おもちゃ名');
    $this->required('price', $data['price'] ?? null, '価格');

    return empty($this->errors);
  }

  // エラー取得
  public function getErrors(): array {
    return $this->errors;
  }
}
