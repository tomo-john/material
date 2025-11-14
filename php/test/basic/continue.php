<?php
for ($i = 1; $i <= 10; $i++) {
  if ($i % 3 == 0) {
    echo "この回は走りません</br>";
    continue;
  }
  echo "じょんの{$i}回目のダッシュ</br>";
}
