#!/bin/bash

age=$1
ret=0

if [ "$age" -le 3 ]; then
  ret=100
elif [ "$age" -le 9 ]; then
  ret=300
else
  ret=500
fi

echo "$ret"

