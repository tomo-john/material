<?php
$name = "じょん"; // グローバル変数

function greet() {
  global $name; // これで関数内でも使える
  echo "こんにちわん、{$name}さん</br>";
}

greet();
