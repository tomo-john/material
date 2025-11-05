<?php
function sumArray($array) {
  $result = 0;
  foreach ($array as $num) {
    $result += $num;
  }
  return $result;
}

$sum = sumArray([1, 2, 3, 4, 5]);
echo $sum;
