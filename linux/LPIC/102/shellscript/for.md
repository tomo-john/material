# for文

繰り返し処理を行う。

指定した変数にリスト(スペース区切りの文字列)中の値を代入していき、そのつど実行文を実行する。

```
for 変数名 in 変数に代入する値のリスト
do
  実行文
done
```

- 変数名は実行文の中で順にその値を変える(リストの順番)
- `do ～ done`で実行文を指定

```
for name in john pyonkichi mocomoca
do
  echo "My name is $name"   # $nameにjohn pyonkichi mocomocaの値が順に代入される

  if [ $name = john ]; then # for文の中でif文
    echo "じょーん"
  fi
done
```

リストとdoを`;`で1行にもできる。

```
for name in john john2; do
  echo $name
done
```

## seq

`seq`コマンドを使用すると、連続した数値を自動的に生成することができる。

引数の数で生成のされ方が変わる。(引数なしはNG)

for文などのループ処理と一緒に使われることが多い。

```
seq 終了値             # 1から終了値まで
seq 開始値             # 開始値から終了値まで
seq 開始値 間隔 終了値 # 開始値から終了値まで指定の間隔で
```

```
seq 5      # 1 2 3 4 5
seq 10 15  # 10 11 12 13 14 15
seq 1 2 10 # 1 3 5 7 9

# こんなやつな何も出力されない(開始値<終了値)
seq 10 5
```

```
for i in `seq 1 10`; do # コマンド展開するのでバッククォーテーション(`)で囲む
  echo $i
done
```

