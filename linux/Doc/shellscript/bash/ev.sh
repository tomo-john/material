#!/bin/bash
# Environment Variables

VAR=tmp

echo 'START: 環境変数確認'
echo

cat << EOF > $VAR
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

for  var in $(cat $VAR); do
  echo $var: ${!var}
done

rm $VAR
