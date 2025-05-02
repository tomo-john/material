# read

シェルスクリプト内で標準入力からの入力を受け付ける際に利用できる。

```
echo -n "あなたは誰？ : " # -nオプションで改行されないように
read username             # シェル変数usernameに入力された文字が格納される
echo "$usernameじょーん"
```

while文と組み合わせ、ファイルから1行ずつ読込むことも可能。

```
while read line; do
  echo $line
done < $1
```

- 引数で指定したファイルを読込む
- 読込まれた行が1行ずつ、変数lineに代入される

