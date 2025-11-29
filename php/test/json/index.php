<?php
// jsonテスト

// PHP配列を作成
$array1 = ['じょん', 'ぴょんきち', 'もこもか'];

// 配列 => json => ファイル書き込み
$file_name = 'test1_1.json';
file_put_contents($file_name, json_encode($array1));

// JSON_PRETTY_PRINT
$file_name = 'test1_2.json';
file_put_contents($file_name, json_encode($array1, JSON_PRETTY_PRINT));

// JSON_UNESCAPED_UNICODE
$file_name = 'test1_3.json';
file_put_contents($file_name, json_encode($array1, JSON_UNESCAPED_UNICODE));

// 両方
$file_name = 'test1_4.json';
file_put_contents($file_name, json_encode($array1, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ファイル読み込み => json => 配列
$file_name = 'test1_1.json';
$input_json = file_get_contents($file_name);
$array2 = json_decode($input_json, true);
var_dump($array2);

