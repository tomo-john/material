# 配列操作関連

| 技                | 説明                           |
|-------------------|--------------------------------|
| `count()`         | 要素の数を数える               |
| `array_push()`    | 末尾に追加(複数もOK)           |
| `array_pop()`     | 末尾の要素を取り除く           |
| `array_shift()`   | 先頭の要素を取り除く           |
| `array_unshift()` | 先頭に要素を追加               |
| `in_array()`      | 配列に特定の値があるかチェック |
| `array_search()`  | 値のキーを探す                 |
| `array_merge()`   | 配列の結合                     |
| `array_slice()`   | 部分抽出                       |

## count() : 要素の数を数える

```
<?php
$dogs = ["ダックス", "ゴールデン", "ラブラドール"];
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
```

- `$dogs_num`には配列の長さである`3`が格納

## array_push() : 末尾に要素を追加

```
array_push($dogs, "シェパード", "ドーベルマン");
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
```

- `$dogs`の末尾に2つの要素が追加される
- `$dogs_num`はここでは`5`
- `$dogs[] = "..."`と同じだが、複数同時に追加できる
- `print_r()`で配列の中身全て表示

## array_pop() : 末尾の要素を取り除く

```
$last = array_pop($dogs);
echo "{$last}は走り出した</br>";
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
```

- 最後に入れたやつを取り出す => スタック的な動き

## array_shift() : 先頭の要素を取り除く

```
$first = array_shift($dogs);
echo "{$first}は走り出した</br>";
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
```

- 最初の要素の`ダックス`がここでは取り出される

## array_unshift() : 先頭に追加

```
array_unshift($dogs, "スーパーダックス");
$dogs_num = count($dogs);
echo "現在の犬は{$dogs_num}匹です。</br>";
print_r($dogs);
```

- `array_push();`の逆

## in_array() : 配列に特定の値があるかチェック

```
$target = "ラブラドール";
if (in_array($target, $dogs)) {
  echo "{$target}を見つけました。</br>";
} else {
  echo "{$target}はいませんでした。</br>";
}
```

- データの存在確認によく使用する
- 探したいもの・探す配列の順番

## array_search() : 値のキーを探す

```
$key = array_search($target, $dogs);
echo "{$target}のキーは{$key}番目です</br>";
```

- 見つからないときは`false`を返す

## array_merge() : 配列を結合

```
$arr1 = ["じょん", "ぴょんきち"];
$arr2 = ["もこもか", "みにじょん"];
$members = array_merge($arr1, $arr2);
print_r($members);
```

## array_slice() : 一部だけ切り出す

```
$subset = array_slice($members, 1, 2);
print_r($subset);
```

- インデックス1から2つの要素を取り出す
- もとの配列はそのまま

## 配列のソート関連

| 関数名    | 並び替え対象 | キーとの関係             |
|-----------|--------------|--------------------------|
| `sort()`  | 値           | キーは削除され連番になる |
| `asort()` | 値           | キーを保持               |
| `ksort()` | キー         | キーで昇順ソート         |

