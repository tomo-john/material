# Mac サブ学習 M1-1: ターミナルで qmake → make

> 対応: [mac-sub ROADMAP](../ROADMAP.md) Part 1 / 練習: `mac-sub/projects/00_hello`、`mac-sub/projects/01_qt_hello`

## このレッスンのゴール

- Qt Creator の `Cmd + B` の裏で、**qmake と make が何をしているか**を説明できる
- `Makefile` の基本の書き方（ターゲット・依存・コマンド）が分かり、簡単なものを自分で書ける
- make が「**変わったところだけビルドし直す**」仕組みが分かる
- qmake が作った `Makefile` を開いて、コンパイラやオプションがどこに書かれているかを探せる
- ビルド中に出る**警告を読んで**、原因と対処を考えられる

今までは Qt Creator のボタン1つでビルドしていました。このレッスンでは、同じことを**ターミナルで1段ずつ**やってみます。

---

## 1. ビルドの全体の流れ

Qt Creator で `Cmd + B` を押すと、裏ではこんな順番で処理が進んでいます。

```
 01_qt_hello.pro（どのファイルを使うか、どのモジュールを使うか）
        │
        │ ① qmake
        ▼
 Makefile（どの順番で、どのコマンドを実行するかの手順書）
        │
        │ ② make（Makefile の手順どおりにコマンドを実行する）
        ▼
 ┌───────────────────────────────────────────────┐
 │ uic   : mainwindow.ui    → ui_mainwindow.h      │  .ui を C++ に変換
 │ clang++: main.cpp         → main.o              │  コンパイル
 │ clang++: mainwindow.cpp   → mainwindow.o        │  コンパイル
 │ moc   : mainwindow.h     → moc_mainwindow.cpp   │  シグナル／スロットのコードを生成
 │ clang++: moc_mainwindow.cpp → moc_mainwindow.o  │  コンパイル
 │ clang++: *.o + Qt のライブラリ → 実行ファイル     │  リンク
 └───────────────────────────────────────────────┘
        ▼
 01_qt_hello.app
```

ポイントは、**qmake 自身はコンパイルをしない**ことです。qmake の仕事は、`.pro` を読んで **`Makefile`（手順書）を作るところまで**です。実際にコンパイラを呼び出すのは **make** です。

> 💡 LPIC で、ソースコードからソフトをインストールするときの `./configure && make && make install` を覚えていますか？ **qmake は `./configure` にあたる**もので、環境に合わせた `Makefile` を作ります。そのあとの `make` は同じです。

### Windows でも同じことが起きている

Windows の Qt Creator でも、流れはまったく同じです。違うのは道具の名前だけです。

| 段階 | Windows（メイン） | Mac（サブ） |
|---|---|---|
| Makefile を作る | qmake | qmake |
| Makefile を実行する | `mingw32-make` | `make` |
| コンパイラ | `g++`（MinGW） | `clang++` |
| できあがるもの | `.exe` | `.app` |

Windows の Qt Creator で、画面下の「**コンパイル出力**」を開くと、`mingw32-make` や `g++` のコマンドが流れているのが見えます。今度 Windows でビルドしたときに見てみてください。

---

## 2. make と Makefile の基本

qmake が作る `Makefile` は800行以上あって、いきなり読むのは大変です。まずは、**自分で小さな `Makefile` を書いて**、make の仕組みをつかみます。

### ルールの書き方

`Makefile` は「**ルール**」の集まりです。1つのルールは、次の3つでできています。

```make
ターゲット: 依存ファイル
	コマンド
```

| 部分 | 意味 |
|---|---|
| ターゲット | 作りたいファイルの名前（または、`clean` のような作業の名前） |
| 依存ファイル | ターゲットを作るのに必要なファイル |
| コマンド | ターゲットを作るために実行するコマンド |

例えば、`main.cpp` から `app` という実行ファイルを作るルールはこうなります。

```make
app: main.cpp
	clang++ -std=c++17 -Wall main.cpp -o app
```

「`app` を作るには `main.cpp` が必要で、作り方は `clang++ ...` です」という意味です。

> ⚠️ **コマンドの行の先頭は、必ずタブ文字**にします。スペースだと `missing separator` というエラーになります。vim で `expandtab`（タブをスペースに変える設定）にしている場合は、`Makefile` を開いたときに `:set noexpandtab` にしてください。`:set list` にすると、タブが `^I` と表示されるので確認できます。

### make は「変わったところだけ」ビルドする

make の一番大事な仕組みです。

1. ターゲット（`app`）と依存ファイル（`main.cpp`）の**更新日時を比べる**
2. **依存ファイルのほうが新しい**とき（= ソースを編集したあと）だけ、コマンドを実行する
3. ターゲットのほうが新しければ、「もう最新だから何もしない」

```
$ make
clang++ -std=c++17 -Wall main.cpp -o app     ← 1回目はビルドする
$ make
make: `app' is up to date.                   ← 何も変えていないので、何もしない
```

ファイルが1つなら効果は小さいですが、ファイルが100個あるプロジェクトで、1つだけ編集したときに**その1つだけをコンパイルし直せる**のは大きな違いです。Qt Creator で2回目のビルドが速いのも、この仕組みのおかげです。

### 変数

同じ文字を何度も書かないように、**変数**を使えます。

```make
CXX      = clang++
CXXFLAGS = -std=c++17 -Wall

app: main.cpp
	$(CXX) $(CXXFLAGS) main.cpp -o app
```

`$(変数名)` で中身に置き換わります。`CXX`（C++ コンパイラ）と `CXXFLAGS`（C++ コンパイラのオプション）は、昔から決まっている名前で、qmake の `Makefile` でも同じ名前が使われています。

> 💡 組み込み開発では、プリンターなどの機械用の実行ファイルを PC で作る「**クロスコンパイル**」がよく使われます。そのとき、`CXX` を機械用のコンパイラ（例: `arm-linux-gnueabihf-g++`）に差し替えるだけで済むのは、こうして変数にしてあるからです。

### 作業用のターゲット（`clean` など）

ファイルを作らない、作業の名前だけのターゲットもよく使います。

```make
.PHONY: clean

clean:
	rm -f app
```

- `make clean` で、ビルドしてできたファイルを消す
- `.PHONY` は「`clean` はファイル名ではなく作業の名前です」という宣言。もし `clean` という名前のファイルがあっても、正しく動くようにするために書く

`make` だけを実行したときは、**`Makefile` の一番上にあるターゲット**が作られます。

### よく使う make のオプション

| コマンド | 意味 |
|---|---|
| `make` | 一番上のターゲットを作る |
| `make clean` | `clean` ターゲットを実行する |
| `make -n` | **実行せずに**、実行するはずのコマンドを表示するだけ（dry run） |
| `make -j8` | 8個の作業を**同時に**進める（CPU のコア数くらいにすると速い。この Mac は8コア） |

---

## 3. qmake が作る Makefile を読む

ここからは、`01_qt_hello` をターミナルでビルドします。

### シャドウビルド

Qt Creator は、ソースのフォルダとは別の `build/...` フォルダの中でビルドしています。ソースとビルド結果が混ざらないようにするためで、これを **シャドウビルド** と呼びます。ターミナルでも同じようにします。

```bash
cd ~/cpp-qt5-study/mac-sub/projects/01_qt_hello
mkdir build-terminal
cd build-terminal
qmake ../01_qt_hello.pro
```

`build-terminal/` は、`.gitignore` の `build*/` に当てはまるので、Git の管理から外れます。

### Makefile の中で探すところ

qmake を実行すると、`build-terminal/` に `Makefile` ができます。vim などで開いて、次の変数を探してみましょう（vim なら `/^CXX` のように検索できます）。

| 変数 | 中身 |
|---|---|
| `CXX` | C++ コンパイラ |
| `CXXFLAGS` | コンパイラのオプション（`-std=...` や `-O2` など） |
| `DEFINES` | `-D` で定義されるマクロ（`#define` と同じ働き） |
| `INCPATH` | `#include` でヘッダを探す場所（`-I`） |
| `LIBS` | リンクするライブラリ（Qt の `QtWidgets` など） |
| `SOURCES` / `OBJECTS` | コンパイルするソースと、できるオブジェクトファイル |
| `TARGET` | 最後にできる実行ファイル |

また、`main.o:` で検索すると、`main.o` を作るルールが見つかります。依存ファイルとして `main.cpp` のほかに何が並んでいるかを見てみてください。

> 💡 `.pro` に書いた `CONFIG += c++17` や `QT += widgets` が、`Makefile` のどこに、どんなオプションとして現れているかを探してみましょう。`.pro` の1行が、実際のコンパイラのオプションに変換されているのが分かります。

### Mac ならではのところ

Mac の Qt は、ライブラリが **フレームワーク**（`QtWidgets.framework` のようなフォルダ）という形になっています。そのため、`INCPATH` や `LIBS` に `-F` や `-framework QtWidgets` といった、Mac 独特のオプションが出てきます。Windows や Linux では、ここが `-lQt5Widgets` のような普通のライブラリの指定になります。

---

## 4. 警告を読む

ターミナルでビルドすると、Qt Creator では見落としがちな**警告**が目に入ります。この Mac でビルドすると、次の2種類の警告が出るはずです。

### 警告A：qmake を実行したとき

```
Project WARNING: Qt has only been tested with version 14 of the platform SDK, you're using 27.
...
Project WARNING: Please downgrade the SDK you use to build your app to version 14, or configure
Project WARNING: with CONFIG+=sdk_no_version_check when running qmake to silence this warning.
```

### 警告B：make でコンパイルしたとき

```
warning: "The selected platform is no longer supported by libc++." [-W#warnings]
```

### 考えてみよう

この2つの警告は、どちらも「**Qt 5.15 が古く、この Mac の環境が新しすぎる**」ことが原因です。英語の警告文を読んで、次のことを考えてみてください（答えは、練習3でわん先生と一緒に確認します）。

1. 警告A は、何と何のバージョンが合っていないと言っていますか？ 警告を消す方法として、何が書かれていますか？
2. 警告B が出ている原因を、`Makefile` の `CXXFLAGS` から探してみましょう。ヒント: `-mmacosx-version-min=` というオプションに注目してください。このアプリが「どの古さの macOS まで動くようにビルドするか」を指定しています。

> 💡 どちらも**警告（warning）なので、アプリは問題なく動きます**。ただ、警告がたくさん出ていると、本当に大事な警告を見落とします。業務では「警告ゼロ」を目指すチームも多いです。「この警告は何を言っているのか」を読む習慣をつけておきましょう。

---

## 5. Debug と Release

Qt Creator のビルドフォルダの名前は `Desktop_Qt_5_15_19_clang_arm64_Debug` でした。最後の **Debug** は、ビルドの種類です。

| 種類 | 目的 | 主な違い |
|---|---|---|
| **Debug** | 開発中。デバッガで止めて変数を見る | デバッグ情報を入れる（`-g`）。最適化しない |
| **Release** | 完成品として配る | 最適化する（`-O2`）。`QT_NO_DEBUG` が定義される |

ターミナルで `qmake` を実行したときの初期設定（Mac の場合）は **Release** です。Debug にしたいときは、qmake にオプションを渡します。

```bash
qmake ../01_qt_hello.pro CONFIG+=debug
```

---

## 練習1：`00_hello` に Makefile を書く

`mac-sub/projects/00_hello/` に、自分で `Makefile` を書きます。

### 仕様

| ターゲット | 動き |
|---|---|
| `build/hello`（一番上に書く） | `hello.cpp` をコンパイルして、`build/hello` を作る。`build/` フォルダがなければ作る |
| `clean` | `build/` フォルダを消す |

- `CXX` と `CXXFLAGS` の変数を使う（オプションは Step 1 と同じ `-std=c++17 -Wall`）
- `clean` は `.PHONY` にする

### 確かめること

1. `make` → `./build/hello` で `Hello Dog` が表示される
2. もう一度 `make` を実行すると、何もしない（`is up to date` と表示される）
3. `hello.cpp` を少し変えて（表示する文字を変えるなど）`make` すると、ビルドし直される
4. `make clean` で `build/` が消える
5. `make -n` で、実行されるはずのコマンドが表示される（実際には実行されない）

### 追加課題（できたら）

`hello.cpp` を2つに分けてみます。`greet.h` / `greet.cpp` に「あいさつを表示する関数」を作り、`hello.cpp` の `main` から呼びます。

- それぞれを `.o`（オブジェクトファイル）にコンパイルするルールと、`.o` をリンクして `build/hello` を作るルールに分ける
- `greet.cpp` だけを変えて `make` したとき、**`greet.o` だけがコンパイルし直される**ことを確かめる
- `greet.h` を変えたときは、どれがコンパイルし直されるべきでしょうか？ そうなるように、依存ファイルを書いてみてください

---

## 練習2：`01_qt_hello` をターミナルでビルドする

3章の手順で、`build-terminal/` に `Makefile` を作り、ビルドして実行します。

```bash
cd ~/cpp-qt5-study/mac-sub/projects/01_qt_hello/build-terminal
make
open 01_qt_hello.app
```

`open` は、Finder でダブルクリックしたのと同じようにアプリを起動するコマンドです。

### 観察すること

1. `make` の出力を見て、**どの順番で何が実行されたか**を書き出す（1章の図と比べる）
2. ビルドのあと、`ls` で `build-terminal/` に何ができたかを確認する。それぞれのファイルが、1章の図のどこで作られたものかを考える
3. 3章の表の変数を `Makefile` で探して、中身をメモする
4. もう一度 `make` すると、どうなるか
5. `../mainwindow.cpp` を保存し直す（`touch ../mainwindow.cpp` で更新日時だけ変えられる）と、何がビルドし直されるか

---

## 練習3：警告を消してみる

4章の「考えてみよう」の答えを、わん先生と一緒に確認してから、`01_qt_hello` の警告を消します。

1. まずは **qmake のオプション**で消してみる（ヒント: 警告A の文の中に、方法が書いてあります）
2. 次に、毎回オプションを書かなくて済むように、**`.pro` に書いて**消してみる
   - Mac のときだけ効くように、qmake の **`macx:`**（Mac のときだけ）という書き方を使う
   - `.pro` の最後にある `unix:!android:`（Unix 系で、Android 以外のとき）と同じ仕組みです

> ⚠️ 練習3で `.pro` を変えるのは、自分の `01_qt_hello` だけにしてください。Windows 側のプロジェクト（`phase2-qt/` など）の `.pro` は変えません。

---

## 確認クイズ

1. qmake と make の役割の違いを、一言ずつで説明してください。
2. `Makefile` で、コマンドの行の先頭をスペースにすると、どうなりますか？
3. make は、どうやって「ビルドし直す必要があるか」を判断していますか？
4. `ui_mainwindow.h` と `moc_mainwindow.cpp` は、それぞれ何から、どのツールで作られましたか？
5. Qt Creator のビルドフォルダの名前についている `Debug` は、何を意味していますか？ Release と何が違いますか？

---

## 提出

できたら「できた」と伝えてください。練習2の観察結果や、クイズの答えを `mac-sub/projects/01_qt_hello/README.md` などにメモしておくと、次の M1-2（moc の正体）で役立ちます。

M1-2 では、練習2でできた **`moc_mainwindow.cpp` の中身**を読んで、シグナル／スロットがどうやって動いているのかを見ていきます🐶
