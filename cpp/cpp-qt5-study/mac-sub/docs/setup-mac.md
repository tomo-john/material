# Mac 環境構築メモ（C++ / Qt5 / Qt Creator）

> 作成: 2026-11-01 / 環境構築完了: 2026-11-14 ✅

MacBook Pro でサブ学習を始めるための環境構築の記録です。

## まとめ（完成した環境）

| 項目 | 内容 |
|---|---|
| C++ コンパイラ | Apple clang 21（Xcode Command Line Tools） |
| Qt | 5.15.19（Homebrew の `qt@5`） |
| IDE | Qt Creator 20.0.2（Homebrew cask） |
| キット | `Desktop Qt 5.15.19 clang arm64` |
| ビルド | qmake（.pro）。Windows 側のプロジェクトもそのまま開いてビルドできる |

## 1. 現状の確認結果（2026-11-01 時点）

| 項目 | 状態 | 確認コマンド |
|---|---|---|
| macOS | 26.6.2 | `sw_vers` |
| CPU | Apple Silicon（arm64） | `uname -m` |
| Xcode Command Line Tools | ✅ インストール済み | `xcode-select -p` |
| C++ コンパイラ | ✅ Apple clang 21.0.0 | `clang++ --version` |
| make | ✅ あり | `which make` |
| Homebrew | ✅ 5.0.4 | `brew --version` |
| Qt5（qmake） | ❌ なし | `which qmake` |
| Qt Creator | ❌ なし | — |
| CMake | ❌ なし（qmake を使うので今は不要） | `which cmake` |

### メモ

- Mac では `g++` を実行しても、中身は **Apple clang** になる（`g++ --version` を実行すると clang と表示される）。
- Windows 側は **MinGW（GCC）**、Mac 側は **clang** と、コンパイラが違う。標準的な C++ のコードなら、どちらでもそのまま動く。

## 2. 方針

| 項目 | Windows（メイン） | Mac（サブ） |
|---|---|---|
| Qt | 5.15.2（Qt Online Installer） | **5.15.19（Homebrew の `qt@5`）** |
| コンパイラ | MinGW | Apple clang |
| ビルド | qmake（.pro） | qmake（.pro） |
| IDE | Qt Creator | Qt Creator（Homebrew cask） |

### Homebrew の `qt@5` を使う理由

- Qt 公式の 5.15.2 は、Mac 向けには **Intel（x86_64）用しかない**。Apple Silicon では Rosetta 経由になってしまう。
- Homebrew の `qt@5` は Qt5 の最終系列（5.15.x）で、**Apple Silicon にネイティブ対応**している。
- 5.15.2 と 5.15.19 はどちらも 5.15 系なので、学習で使う範囲（ウィジェット、シグナル／スロットなど）では差はない。

### 検討した選択肢（2026-11-14 に A に決定）

| | A. Homebrew の qt@5（採用） | B. 公式インストーラーの 5.15.2 |
|---|---|---|
| Windows との一致 | 5.15 系で一致（5.15.19） | 5.15.2 で完全一致 |
| Apple Silicon 対応 | ネイティブ | Rosetta 経由 |
| 追加で必要なもの | なし | Rosetta 2、Xcode 本体（数十GB） |
| トラブルの起きやすさ | 少ない | 多め（2020年の版を最新の macOS で使うため） |

- 公式インストーラー自体は Mac にもあるが、5.15.2 は Apple Silicon 登場前の版なので、むしろイレギュラーな使い方になる。
- Mac では Homebrew が標準的なパッケージ管理ツール（Linux の `apt` に近い）。
- ソース（.pro / .cpp / .h / .ui）は Windows と共有でき、ビルドは各 PC で行う。版の違いは影響しない。

### 注意

- Homebrew の `qt@5` は **非推奨（deprecated）扱いで、2027-05-19 に無効化される予定**。
  - 無効化されると、それ以降は新しくインストールできなくなる（インストール済みのものは使い続けられる）。
  - 学習期間（〜2027-01-06）中は問題なし。
- `qt@5` は **keg-only**（本来は、他と衝突しないように `/opt/homebrew/bin` にリンクされない）。
  - ただし実際にインストールしてみると、Qt6（`qt`）が入っていないため自動でリンクされ、PATH の設定は不要だった（Step 3 を参照）。

## 3. 手順

### Step 1: C++ が動くか確認する

- [x] 簡単な `hello.cpp` を書いて、ターミナルでコンパイルして実行する（2026-11-14 完了。`mac-sub/projects/00_hello/hello.cpp`）

```bash
cd ~/cpp-qt5-study/mac-sub/projects/00_hello
mkdir -p build
clang++ -std=c++17 -Wall hello.cpp -o build/hello
./build/hello
```

| オプション | 意味 |
|---|---|
| `-std=c++17` | C++17 の規格でコンパイルする（`.pro` の `CONFIG += c++17` と同じ） |
| `-Wall` | 警告をできるだけ多く出す |
| `-o build/hello` | 出力する実行ファイルの場所と名前 |

- 実行ファイルは `build/` に出力する。Mac の実行ファイルには拡張子がないので、`.gitignore` の `*.exe` では除外されない。`build*/` なら除外される。

### Step 2: Qt5 をインストールする

- [x] Homebrew を最新にして、`qt@5` をインストールする（2026-11-14 完了。qt@5 5.15.19）

```bash
brew update
brew install qt@5
```

- `brew update` で「60 outdated formulae」と表示されたが、Qt とは関係ないので `brew upgrade` はしていない。
- `brew install qt@5` では、Qt 本体に加えて依存ライブラリ3つ（`glib`、`json-c`、`md4c`）が新しく入り、14個が更新された。
- インストール後、php（8.5.0）が動くことを確認済み（依存ライブラリの更新の影響なし）。
- Caveats（注意事項）の内容
  - Qt のオープンソースライセンスに同意したことになる
  - Qt Creator に登録するときのパスは `/opt/homebrew/opt/qt@5`
  - QtWebEngine（Qt のブラウザ部品）は、脆弱性のため含まれていない（学習では使わない）

### Step 3: qmake に PATH を通す → 不要だった

- [x] `qmake -v` で、Qt 5.15.19 の qmake が使えることを確認する

```bash
which qmake   # /opt/homebrew/bin/qmake
qmake -v      # Using Qt version 5.15.19 in /opt/homebrew/Cellar/qt@5/5.15.19/lib
```

- 最初は `~/.zshrc` に PATH を追加する予定だった。しかし `qt@5` が `/opt/homebrew/bin` に自動でリンクされたので、追加しなくても `qmake` が使えた。
- Homebrew は、バージョン付きのパッケージ（`qt@5`）でも、衝突する本体（`qt` = Qt6）が入っていなければリンクしてくれる。
- **注意**: 将来 `brew install qt`（Qt6）をすると衝突する。Qt6 を入れたくなったら、そのときに相談する。

### Step 4: Qt Creator をインストールする

- [x] Homebrew cask でインストールする（2026-11-14 完了。Qt Creator 20.0.2）

```bash
brew install --cask qt-creator
```

- `--cask` は、アプリ（.app）をインストールするという指定。`/Applications/Qt Creator.app` に入る。
- Qt Creator は Apple Silicon（arm64）と Intel の両方に対応した Universal 版。
- Qt Creator の版（20.0.2）と Qt の版（5.15.19）は別物。Qt Creator は IDE なので、最新版で Qt5 のプロジェクトを開発できる。

### Step 5: Qt Creator に Qt5 を登録する（キットの設定）

起動直後の状態（2026-11-14）

- 「Qt バージョン」タブは空っぽで、Qt 5.15.19 は自動で検出されなかった。
- 「キット」タブには、`デスクトップ (arm-darwin-generic-mach_o-64bit) (Default)` などのキットがあったが、Qt はつながっていなかった（⚠️ の付いた 32bit のキットは使わない）。
- **自動で検出されなかった理由**: Finder や Launchpad から起動したアプリは、ターミナルの PATH を読まない。そのため Qt Creator からは `/opt/homebrew/bin/qmake` が見えない。

#### 5-1: Qt バージョンを追加する

- [x] `Qt Creator > Settings...`（`Cmd + ,`）> `キット` > `Qt バージョン` タブで「追加...」を押し、qmake を選ぶ
  - ファイル選択画面で **`Cmd + Shift + G`** を押すと、パスを直接入力できる（`/opt` は隠しフォルダなので、クリックではたどり着けない）
  - 入力したパス: `/opt/homebrew/opt/qt@5/bin/qmake`
- 登録された名前: `Qt 5.15.19 (5.15.19)`
- 登録されたパス: `/opt/homebrew/Cellar/qt@5/5.15.19/bin/qmake`
  - Qt Creator がリンクをたどって、実体のパス（`Cellar/...`）に変換した。
  - **注意**: `brew upgrade` で qt@5 のバージョンが上がると、このパスがなくなる。そのときは Qt バージョンを登録し直す。

#### 5-2: キットに Qt をつなぐ

- [x] `キット` タブで `デスクトップ (arm-darwin-generic-mach_o-64bit) (Default)` を選び、次のように設定して「適用」を押す

| 項目 | 設定 |
|---|---|
| 名前 | `Desktop Qt 5.15.19 clang arm64`（分かりやすいように変更） |
| コンパイラ（C/C++） | `Clang (arm 64bit at "/usr/bin/clang")` |
| デバッガ | `システムの LLDB (パス:/usr/bin/lldb)` |
| Qt バージョン | `Qt 5.15.19 (5.15.19)` |
| CMake Tool | `None`（qmake を使うので不要） |

### Step 6: 動作確認

#### 6-1: 新しい Qt Widgets アプリ

- [x] Qt Widgets アプリを新しく作って、ウィンドウが表示されるか確認する（2026-11-14 完了。`mac-sub/projects/01_qt_hello/`）
  - `Create Project...` > `Application (Qt)` > `Qt Widgets Application`
  - ビルドシステムは **qmake** を選ぶ（Qt Creator 20 では CMake が初期設定になっていることがある）
  - キットは `Desktop Qt 5.15.19 clang arm64`
  - `Cmd + R` でビルドして実行し、空のウィンドウが表示された
- ビルド結果: `build/Desktop_Qt_5_15_19_clang_arm64_Debug/01_qt_hello.app`
  - Mac のアプリは `.app` という**フォルダ**（アプリバンドル）になる。実行ファイルの本体は `.app/Contents/MacOS/01_qt_hello`（arm64）
  - Windows では `.exe` ファイル1つ、Mac では `.app` フォルダ、という違いがある

Qt Creator 20 で新しくプロジェクトを作ったときに気づいたこと

- プロジェクトの中に **`.gitignore` が自動で作られた**（`.DS_Store`、`*.app`、`/build*/`、`/.qtcreator/` などを除外する内容）
- `.pro.user`（PC ごとの設定）は、プロジェクト直下ではなく **`.qtcreator/` フォルダの中**に作られた（新しい Qt Creator の仕様）
- ウィザードで Git を選んでいたため、作成したファイルが **自動で `git add` された**（`git status` で `A` と表示される）

#### 6-2: Windows 側のプロジェクト

- [x] Windows 側で作ったプロジェクトを開いて、Mac でもビルドできるか確認する（2026-11-14 完了。`phase3-qt/01_memo_rows`）
  - `Open Project...` で `.pro` を開き、キットに `Desktop Qt 5.15.19 clang arm64` を選んで、`Cmd + R` でビルドと実行ができた
  - ソースコードには手を加えずに動いた（Windows / Mac でソースを共有できることを確認）
  - ビルドすると、プロジェクトの中に `build/` と `.qtcreator/` ができるが、どちらも Git の管理から外れている（Windows 側には影響しない）

## 4. Windows との操作の違い（気づいたら追記）

| 操作 | Windows | Mac |
|---|---|---|
| ビルド | Ctrl + B | Cmd + B |
| ビルドして実行 | Ctrl + R | Cmd + R |
| 設定画面 | ツール > オプション | Qt Creator > Settings...（Cmd + ,） |
| スクリーンショット（範囲指定） | Win + Shift + S | Cmd + Shift + 4（Ctrl も押すとクリップボードへ） |
| スクリーンショット（ウィンドウ） | Alt + PrintScreen | Cmd + Shift + 4 → Space → ウィンドウをクリック |
| ファイル選択画面でパスを入力 | アドレスバーに入力 | Cmd + Shift + G |

## 5. トラブル・気づきメモ

- 2026-11-14: Windows 用の `.gitignore`（`*.exe` など）は、Mac の実行ファイル（拡張子なし）には効かない。実行ファイルは `build/` に出力して対応する。
- `.DS_Store`（Finder が作る隠しファイル）は、今の `.gitignore` では除外されていない。リポジトリ直下の `.gitignore` に追加するか検討中。
- 2026-11-14: Finder や Launchpad から起動したアプリ（Qt Creator など）は、ターミナルの PATH（`~/.zshrc` など）を読まない。ターミナルでは使えるコマンドでも、アプリからは見えないことがある。
