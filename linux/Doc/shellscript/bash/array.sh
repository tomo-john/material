#!/bin/bash

array=(1 2 3 4 5 6 7 8) 
length=${#array[@]}
half=$(( length / 2 ))

for left in $(seq 0 $((half - 1)))
do
  right=$(( length - left -1 ))
  tmp=${array[$right]}
  array[$right]=${array[$left]}
  array[$left]=$tmp
done

echo ${array[@]}

