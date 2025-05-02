#!/bin/bash
# age=2; . if.sh

if [ "$age" -lt 2 ]; then    # 2未満 
  echo "まだ子犬だね"
elif [ "$age" -le 10 ]; then # 10以下
  echo "まだ若い犬だね"
else
  echo "You are super dog!"  # 10より大きい(上の2つの条件をどちらも満たさない)
fi
