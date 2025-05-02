# while

条件が満たされている間、`do`と`done`の間の実行文を実行する。

```
while 条件文
do
  実行文
done
```

```
count=1
while [ $count -le 10 ] # 10以下の間は真
do
  echo $count           # 今のcountの値を表示
  let count=count+1     # countの値に1プラス
done
```

## let

- `let`コマンドはシェルで整数の計算を行うためのコマンド
- 変数に値を代入しながら計算できる

```
let x=1+2
echo $x # => 3
```

`$(( ))`という算術展開でも同じことができる。

```
x=$((1 + 2))
echo $x # => 3
```

