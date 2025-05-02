#!/bin/bash

for name in john pyonkichi mocomoca
do
  echo "My name is $name"

  if [ $name = john ]; then
    echo "じょーん"
  fi
done

