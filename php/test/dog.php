<?php
// POSTで受け取ったデータを処理
// print_r($_POST); //確認用

$name = $_POST['name'];
$dog_type = $_POST['dog_type'];

echo "{$name}さんの好きな犬種は{$dog_type}です🐶\n";
