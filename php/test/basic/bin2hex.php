<?php
$hex = bin2hex('Hello, Dog!');

var_dump($hex);
var_dump(hex2bin($hex));

// var_dump
$animals = ['dog', 'rabbit', 'bear'];
var_dump($animals);

// セッショントークン
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));  // 安全な乱数
}

var_dump($_SESSION);

// random_bytes()
$var_1 = random_bytes(8);
var_dump($var_1); // 文字化けして読めない

$var_2 = bin2hex($var_1);
var_dump($var_2); // 文字列として読める
