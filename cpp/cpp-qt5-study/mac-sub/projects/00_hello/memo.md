# c++動作テスト

- `hello.cpp`を作成(vim)
- `コマンドでコンパイル`
- 実行できるか確認

```bash
# ビルド用ディレクトリ
mkdir -p build

# コンパイル
clang++ -std=c++17 -Wall hello.cpp -o build/hello

# 実行
./build/hello
```

### コマンドの意味

- `clang++`: MacのC++コンパイラ(WindowsのMinGWでいうg++にあたる)
- `-std=c++17`: C++17 の規格でコンパイルする(.pro の CONFIG += c++17 と同じ意味)
- `-Wall`: 警告(Warning)をできるだけ多く出す。ミスに気づきやすくなる
- `-o build/hello`: 出力(output)する実行ファイルの場所と名前

### なぜ`build/`に出力するのか

`-o hello`にすると、カレントディレクトリに`hello`という実行ファイルができる。

`.gitignore`で`*.exe`を除外しているが、Macの実行ファイルには拡張子がない。

なので`hello`(実行ファイル)が除外されない。

`build/*`は`.gitignore`で除外されているので、`build/`に出力する。

---

## Makefileを自分で作る

- `make` => `./build/hello` => で `Hello Dog`が表示
- もう一度`make`を実行すると何もしない(`is up to date`)
- `hello.cpp`を少し変えて`make`するとビルドし直される
- `make clean`で`build/`が消える
- `make -n`で実行されるはずのコマンドが表示される(実行はされない)

## greet.h / greet.cpp 作成後の手動ビルドめも

Makefileは「手で打つコマンドをメモしておくもの」

2つのファイルをビルドする手順(手動):

```bash
mkdir -p build

# hello.cppをコンパイルしてhello.oを作る(-c = リンクしない)
clang++ -std=c++17 -Wall -c hello.cpp -o build/hello.o

# greet.cpp -> greet.o(コンパイルのみ)
clang++ -std=c++17 -Wall -c greet.cpp -o build/greet.o

# 2つの.oファイルをリンクして実行ファイルhelloを作る
clang++ build/hello.o build/greet.o -o build/hello
```

=> `-c`オプションはコンパイルで止める(リンクしない)

=> `-o`オプションは出力先の指定

コマンドごとに「何を作る？何が必要？」

| コマンド                | 作るもの(ターゲット) | 必要なもの(依存ファイル) |
| ----------------------- | -------------------- | ------------------------ |
| `hello.cpp`をコンパイル | `build/hello.o`      | `hello.cpp`, `greet.h`   |
| `greet.cpp`をコンパイル | `build/greet.o`      | `greet.cpp`, `greet.h`   |

=> 1つのコマンドが1つのルールになる

---

