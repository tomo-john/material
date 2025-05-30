# man

コマンドや設定ファイルのためのオンラインマニュアル(manページ)を参照するコマンド。

manにはセクションがあり、数字で指定することが可能。

=> `passwd`というキーワードには同名で通常コマンドと設定ファイルの2種類がある

セクション番号を指定しなければセクション番号の小さいほうのマニュアルが表示される。

## セクション番号

| セクション番号 | 内容                                                   |
|----------------|--------------------------------------------------------|
| 1              | ユーザーコマンド                                       |
| 2              | システムコール(カーネルが提供する関数)                 |
| 3              | ライブラリ呼び出し(プログラムライブラリに含まれる関数) |
| 4              | 特殊ファイル(通常、/dev配下に存在するファイル)         |
| 5              | ファイルの書式と慣習(/etc/passwdなど)                  |
| 6              | ゲーム                                                 |
| 7              | その他いろいろ(マクロパッケージや慣習など含む)         |
| 8              | システム管理コマンド                                   |
| 9              | カーネルルーチン                                       |

```
# passwdコマンドのmanページを参照
man 1 passwd

# /etc/passwdのmanページを参照
man 5 passwd
```

## オプション

キーワードに完全一致、一部一致するコマンドやファイルのmanページを一覧表示することが可能。

- -k: 一部一致 => `apropos`コマンドと同じ
- -f: 完全一致 => `whatis`コマンドと同じ

## ページャ

manコマンド実行時にデフォルトで開くページャは通常Linuxでは`less`。

=> 環境変数`$PAGER`で確認することが可能

使用するページャは`-P`オプションで一時的に変更することが可能。

```
# ページャにcatを使用
man -P cat ls
```

