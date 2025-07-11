# 補数

### 補数による負の整数の表現方法

補数を使うと、引き算を足し算として処理することができる。

=> 引き算のために新たな回路を作る必要がなくなり、コンピューターを簡素化することができる

=> 多くのコンピューターでは負の数の表現に補数が用いられる

### 補数とは

補数というのは、基準となる数値に対していくつ足りないかを表す数のこと。

```
基準となる数値 - ある数値 = ある数値の補数
```

一般的にN進数では`N-1の補数`と`Nの補数`の2通りがある。

- 1. ある数にN-1の補数を補うと、与えられた桁数の最大値になる
- 2. ある数にNの補数を補うと、与えられた桁数の次の桁に桁上がりする

### 10進数で考えみる

基準となる数値は2種類あり、2桁の10進数の場合は`99`と`100`。

- 99 : 9の補数
- 100 : 10の補数

=> 10の補数は9の補数に`1`を加えた数値になる

```
9の補数は 99 -45 = 54
10の補数は 100 - 45 = 55 (54 + 1)
```

### 2進数では？

例として、8桁(8bit = 1byte)の2進数の場合、基準となるのは`11111111`と`100000000`の2種類。

`11111111`を基準とした場合を`1の補数`、`100000000`を基準とした場合を`2の補数`と呼ぶ。

=> この場合も2の補数は1の補数に`1`を加えたものになる

```
# 10011011の補数
1の補数は 11111111 - 10011011 = 01100100 <= もとの数を反転
2の補数は 100000000 - 10011011 = 01100101 <= 1の補数 +1
```

