#!/bin/bash
if read -t 5 -p "5秒以内に何か入力して下さい: " something; then
  echo "入力値は: $something"
else
  echo "タイムアウトです"
fi

