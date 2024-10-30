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

read -p "No.4 複数の単語を入力(スペース区切り): " -a array
for e in "${array[@]}"; do
  echo $e
done

read -sp "No.5 パスワードを入力(非表示): " password
echo
echo "$password"
echo

read -n1 -p "No.6 1文字までしか受け付けません: " n
echo
echo "$n"
echo

if read -t 5 -p "No.7 5秒以内に何か入力して下さい: " something; then
  echo "入力値は: $something"
else
  echo "タイムアウトです"
fi

