<?php

// 基本
$score = 85;
echo "得点は" . $score . "点です。</br>";

if ($score >= 85) {
  echo "85点以上です</br>";
}

// else
$score = 80;
echo "得点は" . $score . "点です。</br>";

if ($score >= 85) {
  echo "85点以上です。</br>";
} else {
  echo "85点未満です。</br>";
}

// elseif
$num = 101;
echo "対象数値は" . $num . "</br>";

if ($num % 15 == 0) {
  echo $num . "は15で割り切れます。</br>";
} elseif ($num % 5 == 0) {
  echo $num . "は5で割り切れます。</br>";
} elseif ($num % 3 == 0) {
  echo $num . "は3で割り切れます。</br>";
} else {
  echo $num . "は3, 5, 15では割り切れません。</br>";
}

