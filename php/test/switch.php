<?php
$color = "赤";

switch ($color) {
  case "赤":
    echo "赤は止まれ";
    break;

  case "黄":
    echo "黄は注意";
    break;

  case "青":
    echo "青は進んでよし";
    break;

  default:
    echo "信号にない色ですね";
    break;
}

echo "</br>";

$month = 2;

switch ($month) {
  case 3:
  case 4:
  case 5:
    echo "春ですね";
    break;
  
  case 6:
  case 7:
  case 8:
    echo "夏は暑い";
    break;
  
  case 9:
  case 10:
  case 11:
    echo "秋ですね";
    break;
  
  case 12:
  case 1:
  case 2:
    echo "冬は寒い";
    break;

  default:
    echo "そんな月存在しない";
    break;
}
