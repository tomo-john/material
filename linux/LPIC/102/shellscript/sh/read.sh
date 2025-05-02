#!/bin/bash

echo -n "あなたは誰？ : " # -nオプションで改行されないように
read username             # シェル変数usernameに入力された文字が格納される
echo "$usernameじょーん"

