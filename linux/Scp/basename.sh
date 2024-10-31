#!/bin/bash
for file in `pwd`/*; do
  filename=$(basename "$file")
  echo "ファイル名: $filename"
done

