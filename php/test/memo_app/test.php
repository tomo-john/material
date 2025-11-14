<?php
$dir_name = 'storage';
$files = glob('./storage/*');

foreach ($files as $f) {
  echo "ファイル名: " . basename($f) . "<br>";
}
