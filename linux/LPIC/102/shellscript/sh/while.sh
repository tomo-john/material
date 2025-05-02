#!/bin/bash

count=1
while [ $count -le 10 ] # 10以下の間は真
do
  echo $count           # 今のcountの値を表示
  let count=count+1     # countの値に1プラス
done

