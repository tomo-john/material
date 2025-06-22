#!/bin/bash

clear

echo "### tarコマンドオプション確認用スクリプト###"
echo
echo "## このスクリプトではtarコマンドの使い方・オプションについて説明します ##"

if [ -d wk ]; then
  rm -rf wk
fi

mkdir wk && cd wk

touch file{1..3}.txt
mkdir dir{1..3}

echo "## 以下のファイルがあるディレクトリにて作業します ##"
echo "$(ls)"
echo
echo

read -p "## アーカイブを作成するには 「-c」 オプションを使用します。(続けるにはEnterを押してください)"
echo
echo "tar -czf test.tgz ./* を実行..."
echo $(tar -czf test.tgz ./*)

echo "これでカレントディレクトリ内の全フィアルを「test.tgz」としてアーカイブが作成されました。"
echo "-z オプションではgzip形式で行うためのオプションです。"
echo "-f オプションではアーカイブファイル名(今回はtest.tgz)を指定しています。"
echo
echo

read -p "## アーカイブファイルの中身を参照するには 「-t」 オプションを使用します。 "
echo
echo "tar -tf test.tgz を実行..."
echo
echo $(tar -tf test.tgz)
echo
echo "test.tgzの中身を確認することができました。"
echo
echo

read -p "## 「-v」オプションでは詳細情報を付与することができます。 ##"
echo
echo "tar -tvf test.tgz を実行..."
echo
echo $(tar -tvf test.tgz)
echo
echo "先ほどよりも詳細に「test.tgz」の中身を確認することができました。"
echo
echo "「-v」オプションはアーカイブを作成・展開する時にも付与できるオプションです。"
echo "例: tar czvf test.tgz ./*"
echo
echo

read -p "一度画面をクリアします..."
clear

read -p "## アーカイブを展開するには「-x」オプションを使用します。## "
echo

mkdir wk2 && cp ./test.tgz  wk2 && cd wk2

echo "tar -xzvf test.tgz を実行..."
echo
echo $(tar -xzvf test.tgz)
echo
echo "デフォルトではカレントディレクトリにファイルが展開されます。"
echo
echo

read -p "## 展開先を指定するには「-C」オプションを使用します。"
echo

cd ..
mkdir tmp

echo "tar -xzvf test.tgz -C ./tmp/ を実行..."
echo
echo $(tar -xzvf test.tgz -C ./tmp/)
echo
echo "ls ./tmp を実行..."
echo
echo $(ls ./tmp)
echo
echo "指定した「./tmp」ディレクトリに展開できることが確認できました。"

