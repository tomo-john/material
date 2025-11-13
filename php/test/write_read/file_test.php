<?php
$file = 'memo.txt'; // 保存するファイル名

// 書き込み(ファイルがなければ自動で作られる)
file_put_contents($file, "こんにちは！PHPで書き込みました🐶\n", FILE_APPEND);

// 読み込み
$content = file_get_contents($file);

echo 'ファイルの中身はこちら🐶<br>';
echo nl2br($content); // 改行を<br>に変換して表示
