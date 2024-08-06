# build-essential

`gcc` や `g++` などのビルドツールを提供しているパッケージ

gcc : GNU Compiler Collection / GNUプロジェクトが開発・配布している

=> C言語やC++言語などのコンパイラが同梱されている

g++ : gccと同じGNUのコンパイラだがc++用

## gcc と g++ の違い

- gcc

  `*.c`ファイルはc言語として、`*.cpp`ファイルはc++としてコンパイル

- g++

  `*.c`ファイルも`*.cpp`ファイルもc++としてコンパイル

## インストール(WSL2/Ubuntu)

```
sudo apt install build-essential
```

## コンパイル

事前にC言語で`c_sample.c`ファイルを作成しておく

```
gcc c_sample.c -o c_samle
```
`-o`オプションでコンパイル後に生成される実行ファイル名を指定

C++で記述した`*.cファイル`をgccでコンパイルしようとするとエラーが出る

## 実行

上記のコンパイルで`c_sample`が生成されている

```
./csample
```

---

## C++の場合

```
# 事前にC++で cp_sample.cpp ファイルを作成

# コンパイル
g++ cp_sample.cpp -o cp_sample

# 実行
./cp_sample.cpp
```

