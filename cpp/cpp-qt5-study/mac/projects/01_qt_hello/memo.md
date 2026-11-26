# ターミナルで qmake -> make

## ビルド全体の流れ

`01_qt_hello.pro` -> qmake -> Makefile -> make -> `01_qt_hello.app`

- qmakeは`.pro`を読んで`Makefile`(手順書)を作る
- 実際にコンパイラを呼び出すのは`make`

## winとmac

やってることは同じだけど、使用している道具が違う。

| 段階           | Windows        | Mac       |
| -------------- | -------------- | --------- |
| Makefileを作る | qmake          | qmake     |
| Makefileを実行 | `mingw32-make` | make      |
| コンパイラ     | `g++`(MinGW)   | `clang++` |
| できあがり     | `.exe`         | `.app`    |

## qmakeが作るMakefile

シャドウビルドでqmakeを実行:

```bash
# 01_qt_helloプロジェクトにて
mkdir build-terminal
cd build-terminal
qmake ../01_qt_hello.pro
```

=> これでMakefileが`build-terminal`に作られる

makeを実行した出力めも(観察1):

- `uic ../mainwindow.ui -o ui_mainwindow.h`: Designerの画面をC++に変換
- `clang++ -c [オプション多数] -o main.o ../main.cpp`: `main.cpp`をコンパイル
- `clang++ -c [オプション多数] -o mainwindow.o ../mainwindow.cpp`: `mainwindow.cpp`をコンパイル
- `clang++ -dM -E -o moc_predefs.h /opt/homebrew/Cellar/qt@5/5.15.19/mkspecs/features/data/dummy.cpp`: mocの下準備(今回気にしない)
- `moc ../mainwindow.h -o moc_mainwindow.cpp`: mocで`moc_mainwindow.cpp`作成
- `clang++ -c [オプション多数]-o moc_mainwindow.o moc_mainwindow.cpp`: mocが作った`.cpp`をコンパイル
- `clang++ -o 01_qt_hello.app/Contents/MacOS/01_qt_hello main.o mainwindow.o moc_mainwindow.o`: `.o`3つとQtのライブラリをリンクして実行ファイル生成

`main.o`, `mainwindow.o`, `moc_mainwindow.o`の3つから`01_qt_hello.app/Contents/MacOS/01_qt_hello`が作られている。

`mainwindow.h --(moc)--> moc_mainwindow.cpp --(clang++ -c)--> moc_mainwindow.o`

Qt のビルドは、普通の C++ のビルド（コンパイル → リンク）に、uic と moc の作業が加わったもの。

