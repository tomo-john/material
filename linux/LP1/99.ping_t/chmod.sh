#!/bin/bash

FILE=chmod.txt

# 画面クリア
clear

echo "$FILEを作成: START "
touch $FILE
echo '権限設定の確認: '
ls -l $FILE
echo

echo "chmod 777 $FILE を実行:"
chmod 777 $FILE
echo '権限設定の確認: '
ls -l $FILE
echo

echo "chmod 700 $FILE を実行:"
chmod 700 $FILE
echo '権限設定の確認: '
ls -l $FILE
echo

echo "$FILEを削除: END"
rm -f $FILE

