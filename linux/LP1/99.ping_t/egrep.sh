#!/bin/bash

# 画面クリア
clear

cat << EOF > test.txt
d
do
dog
dogdog
r
ra
rabbit
rabbitjohn
dograbbit
rabbitdog
EOF

egrep 'dog|rabbit' test.txt
echo

egrep '[dog|rabbit]' test.txt

rm test.txt

