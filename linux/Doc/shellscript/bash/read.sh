#!/bin/bash

# 基本
echo "No.1 何か入力して下さい: "
read input
echo "入力されたのは: $input です"
echo

# -pでメッセージ付き
read -p "No.2 -pオプションでメッセージ表示できる: " input2
echo "$input2"
echo

# -pの位置に注意
read -rp "No.3 pathを入力: " path
echo "$path"
echo

# -aで配列
read -p "No.4 複数の単語を入力(スペース区切り): " -a array
for e in "${array[@]}"; do
  echo $e
done

# -sで入力を非表示
read -sp "No.5 パスワードを入力(非表示): " password
echo
echo "$password"
echo

# -nで入力文字数制限
read -n1 -p "No.6 1文字までしか受け付けません: " n
echo
echo "$n"
echo

# -tで制限時間
if read -t 5 -p "No.7 5秒以内に何か入力して下さい: " something; then
  echo "入力値は: $something"
else
  echo "タイムアウトです"
fi

# 複数の変数に代入
echo "No.8 スペース区切りで3つ何かを入力: "
read input1 input2 input3
echo "$input1"
echo "$input2"
echo "$input3"

