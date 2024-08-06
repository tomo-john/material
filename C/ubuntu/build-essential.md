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

## 実行

上記のコンパイルで`c_sample`が生成されている

```
./csample
```

