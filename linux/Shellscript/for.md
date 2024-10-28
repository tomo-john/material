# for文

## 基本
```
for i in 1 2 3 4 5; do
  echo $i
done
```
- `i`: 変数名、リストの値が順番に代入される
- `1 2 3 4 5`: リスト、範囲指定には他にも方法あり

## 数値範囲: `{..}`
数値藩範囲を指定する場合は、`{開始..終了}`で指定が可能
```
for i in {1..5}; do
  echo $i
done
```

## 変数をリストとして使用
変数に複数の値をスペース区切りで代入し、for文で使用することが可能
```
animals="dog rabbit bear"

for animal in $animals; do
  echo $animal
done
```

## コマンドの出力をリストとして使用
`$(command)`もしくは``command``でコマンド結果をリストに
```
for file in $(ls); do
  echo file: $file
done
```
```
for file in `ls`; do
  echo file: $file
done
```

## ファイルの内容をリストとして使用
`cat`や`<`を使用する

=> スペースで区切られた要素が1つの項目として認識される

```
for line in $(cat sample.txt); do
  echo line: $line
done
```
この方法ではスペース区切りで要素が1つの項目として認識されるので、

各行をそのまま処理するには`while`と組み合わせるのが便利
```
while read -r line; do
  echo "行の内容: $line"
done < sample.txt
```
- `read`コマンドでファイルから1行ずつ読み取り、その行を`line`変数に格納
- `-r`オプションはバックスラッシュ(`\n`)のエスケープを無効にする(バックスラッシュを含むテキストを読込める)
- `< sample.txt`でループの入力として指定(1行ずつ読み取られる)

## 配列変数を使用
Bashの配列機能を使って、各要素を参照することが可能
```
array=("john", "super_john", "old_john")

for item in "${array[@]}"; do
  echo "item: $item"
done
```

