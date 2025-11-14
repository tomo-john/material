<?php
// static変数
function counter() {
  static $count = 0; // 初回だけ初期化される
  $count++;
  echo "count = $count</br>";
}

counter(); // 1
counter(); // 2
counter(); // 3
