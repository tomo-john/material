#!/bin/bash

default_name="じょん"
read -p "名前を決めて下さい(デフォルト名は「じょん」です: " name
name="${name:-$default_name}"
echo "決定した名前は $name です"

