#!/bin/bash
# Environment Variables

FILE=tmp

echo 'START: 環境変数確認'
echo

cat << EOF > $FILE
EDITOR
HISTFILE
HISTFILESIZE
HISTSIZE
HOME
HOSTNAME
LANG
LOGNAME
PATH
PS1
PS2
PWD
TERM
USER
EOF

for line in $(cat $FILE); do
  echo line: $line
done


rm $FILE
