<?php
$dog = "ぴょんきちん"; // 関数の外の変数

function bark() {
  $dog = "じょーん";   // 関数の中の変数
  echo "{$dog}が吠えた！</br>";
}

bark();                       // じょーんが吠えた！
echo "{$dog}が吠えた！</br>"; // ぴょんきちんが吠えた！
