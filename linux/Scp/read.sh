#!/bin/bash
echo "No.1 何か入力して下さい: "
read input
echo "入力されたのは: $input です"
echo

read -p "No.2 -pオプションでメッセージ表示できる: " input2
echo "$input2"
echo

read -rp "No.3 pathを入力: " path
echo "$path"
echo

echo "No.4 複数の単語を入力(スペース区切り): "
read -a array
for e in "${array[@]}"; do
  echo $e
done

