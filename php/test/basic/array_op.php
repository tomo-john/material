<?php
$dogs = ["ダックス", "ゴールデン", "ラブラドール"];
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
echo "</br>";

echo "新種発見!</br>";

array_push($dogs, "シェパード", "ドーベルマン");
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
echo "</br>";


echo "最後のわんちゃんは旅に出た</br>";

$last = array_pop($dogs);
echo "{$last}は走り出した</br>";
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
echo "</br>";

echo "最初のわんちゃんも旅に出た</br>";

$first = array_shift($dogs);
echo "{$first}は走り出した</br>";
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
echo "</br>";

echo "さっきのわんちゃんが進化して帰ってきた</br>";

array_unshift($dogs, "スーパーダックス");
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
echo "</br>";

echo "ラブラドールはいますかチェック</br>";

// array_pop($dogs); array_pop($dogs);

$target = "ラブラドール";
if (in_array($target, $dogs)) {
  echo "{$target}を見つけました。</br>";
} else {
  echo "{$target}はいませんでした。</br>";
}
print_r($dogs);
echo "</br>";

echo "{$target}のキーを探す</br>";

$key = array_search($target, $dogs);
echo "{$target}のキーは{$key}番目です</br>";

$arr1 = ["じょん", "ぴょんきち"];
$arr2 = ["もこもか", "みにじょん"];
$members = array_merge($arr1, $arr2);
print_r($members);
echo "</br>";

$subset = array_slice($members, 1, 2);
print_r($subset);

echo "</br>";
print_r($members);
