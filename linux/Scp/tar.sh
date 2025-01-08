#!/bin/bash

clear

echo "### tarコマンドオプション確認用スクリプト###"
echo
echo "テストデータ作成開始:"

if [ -d wk ]; then
  rm -rf wk
fi

mkdir wk && cd wk

touch file{1..3}.txt
mkdir dir{1..3}

echo "テストデータ作成終了:"
echo "テストデータ一覧表示:" 
echo "$(ls)"
echo

read -p "## アーカイブを作成するには -c オプションを使用します。(続けるにはEnterを押してください)"
echo
echo "tar -czf test.tgz ./* を実行..."
tar -czf test.tgz ./*

echo "これでカレントディレクトリ内の全フィアルが test.tgz としてアーカイブを作成されました。"
echo "-z オプションではgzip形式で行うためのオプションです。"
echo "-f オプションではアーカイブファイル名(今回はtest.tgz)を指定しています。"
echo

