# Debian
Linuxディストリビューションの1つ

独自のパッケージ管理や扱いやすい特徴をもち、Linuxの中でも大きなシェアを持っている

オープンソースコミュニティによって開発されており、無償で提供されている

安定性とセキュリティを重視しており初心者にも使いやすい

Debianをベースに派生したLinuxには`Ubuntu`や`Linux Mint`がある

## Linuxディストリビューションとは？
Linuxカーネルに必要なアプリケーションやユーティリティを含めたパッケージのこと

Linuxは、OSの中核となるLinuxカーネルのことを指す

このLinuxカーネルをベースにしてさまざまなパッケージを追加し、構築されたものがLinuxディストリビューション

Linuxディストリビューションには、`Debian系`, `Red Hat系`, `Slackware系`などがある

## パッケージ管理
`deb形式`ファイルを`dpkg`や`apt`で管理する

ソフトウェアのインストール、アップグレード、削除、詳細確認などをと行うシステム

- `dpkg`: 個別のパッケージファイル(`.deb`ファイル)を扱う
- `apt`: dpkgの上位に位置する高レベルパッケージ管理ツール

`dpkg`は`.deb`ファイルを直接扱い、依存関係の解決を行わないが、

`apt`はリポジトリからソフトウェアを直接ダウンロード・インストールが可能

`apt`は依存関係を自動で解決してくれ、必要なパッケージをすべてインストールする
