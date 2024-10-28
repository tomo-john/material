#!/bin/bash

echo "検索対象のディレクトリパスを入力して下さい: "
read directory

if [[ ! -d "$directory" ]]; then
  echo "Error: ディレクトリが見つかりません"
  exit 1
fi

echo "ディレクトリ内のファイル一覧"
ls "$directory"

echo "検索したいキーワードを入力して下さい: "
read keyword

echo "Keyword: '$keyword' を含むファイル一覧"
for file in "$directory"/*; do
  if [[ -f "$file" && "$file" == *"$keyword"* ]]; then
    echo "$(basename "$file")"
  fi
done
