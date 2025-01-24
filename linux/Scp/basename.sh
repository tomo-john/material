#!/bin/bash
for file in "$(pwd)"/*; do
  filename=$(basename "$file")
  if [ -d "$file" ]; then
    echo "ディレクトリ名: $filename"
  elif [ -f "$file" ]; then
    echo "ファイル名: $filename"
  fi
done

