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

`dpkg`は`.deb`ファイルを直接扱い、依存関係の解決を行わない

`apt`はリポジトリからソフトウェアを直接ダウンロード・インストールが可能

`apt`は依存関係を自動で解決してくれ、必要なパッケージをすべてインストールする

### 1 dpkg

`dpkg`はDebianパッケージ管理システムの基本となるコマンドで`.deb`パッケージファイルを直接操作する

`dpkg`自体は依存関係の解決機能を持たないため、他のツール(APT)と組み合わせて使用することが多い

主なコマンド:

- インストール: `dpkg -i <package_name>.deb`
- アンインストール: `dpkg -r <package_name>.deb`
- クエリ(パッケージ情報の確認): `dpkg -l`でインストール済みの全パッケージをリスト
- クエリ(パッケージ情報の確認): `dpkg -s <package_name>`で特定のパッケージの詳細情報を表示
- ファイルリスト確認: `dpkg -L <package_name>`で特定のパッケージがインストールしたファイルを確認

### 2 apt-get

`apt-get`はAPT(Advanced Package Tool)の一部で、インターネット上のリポジトリと通信し、

パッケージのインストール、アップデート、削除を行う

`dpkg`に対して、`apt-get`は依存関係を自動で解決できる点が大きな特徴

主なコマンド:

- インストール: `apt-get install <package_name>`
- 削除: `apt-get remove <package_name>`
- 完全削除(設定ファイル含む): `apt-get purge <package_name>`
- アップデート: `apt-get update` (リポジトリの更新)
- パッケージのアップグレード: `apt-get upgrae` (インストール済みパッケージを最新にする)
- ディストリビューションのアップグレード: `apt-get dist-upgrade`

### 3 apt-cache

`apt-cache`はAPTのパッケージ情報を検索および取得するためのツールで、実際のパッケージのインストールは行わない

リポジトリの中からパッケージの詳細情報を確認するのに役立つ

主なコマンド:

- 検索: `apt-cache search <keyword>`でリポジトリ内のパッケージを検索
- 詳細情報の表示: `apt-cache show <package_name>`で特定パッケージの詳細情報を表示
- 依存関係の確認: `apt-cache depends <package_name>`でパッケージが依存する他のパッケージ一覧を表示
- 逆依存関係の確認: `apt-cache rdepends <package_name>`でそのパッケージを必要とする他パッケージを表示

```
# "apache"を含むパッケージを検索
apt-cache search apache

# "curl"パッケージの詳細情報を表示
apt-cache show curl
```

### 4 apt

`apt`コマンドは、`apt-get`や`apt-cache`の主要な機能を統合したコマンドで、よりシンプルで使いやすい

主にユーザー向けで、管理者レベルの詳細な機能は必要ない場合に適しています

主なコマンド:

- インストール: `apt install <package_name>`
- 削除: `apt remove <package_name>`
- アップデート: `apt updata`
- アップグレード: `apt upgrade`
- 詳細表示: `apt show <package_name>`
- 検索: `apt search <keyword>`

