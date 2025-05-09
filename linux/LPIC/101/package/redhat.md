# RPM系パッケージ管理ツール

RPMはRed Hat Package Managerの略で、もともとはRed Hatが開発したパッケージ管理システム。

RHEL(Red Hat Enterprise Linux)系のパッケージ管理に使用される。

RPM形式のパッケージ管理ツールには`RPMツール`、`YUMツール`がある。

# RPMツール

設定ファイルは`/usr/lib/rpm/rpmrc`。

RPM系パッケージを管理する基本的なツールで主なコマンドは以下の2つ。

- rpmコマンド: パッケージのインストール、アンインストールなど基本的なパッケージ管理を行うコマンド

  => Debian系での`dpkg`とほぼ同等

- rpm2cpio: RPM系パッケージをcpio形式のアーカイブに変換するコマンド

## rpmコマンド

### インストール・アンインストール・アップグレード系

| オプション                         | 説明                                                   |
|------------------------------------|--------------------------------------------------------|
| -i(--install) パッケージファイル名 | パッケージのインストール                               |
| -U(--upgrade) パッケージファイル名 | パッケージのアップグレード(なければインストールする)   |
| -F(--freshen) パッケージファイル名 | パッケージのアップグレード(なければインストールしない) |
| -e(--erase) パッケージ名           | パッケージのアンインストール                           |

| 併用オプション                     | 説明                                                   |
|------------------------------------|--------------------------------------------------------|
| -v                                 | 詳細情報の表示                                         |
| -h(--hash)                         | 進行状況を`#`で表示                                    |
| --test                             | 実際には実行せずにテストを実施                         |
| --nodeps                           | 依存関係を無視                                         |

=> `-h(--hash)`オプションは`-e(--erase)`オプションとは併用できない

### 参照・検査系

| オプション                         | 説明                                                   |
|------------------------------------|--------------------------------------------------------|
| -q(--query) パッケージ名           | 指定したパッケージがインストールされているかを照会     |
| -V(--verify) パッケージ名          | パッケージの検査(併用オプションは-aと--nomd5のみ)      |

- -Vの検査方法: RPMデータベースに格納されているファイルに関する情報と、インストールされたパッケージのファイルに関する情報の比較
- -Vの検査内容: ファイルのサイズ、MD5チェックサム、所有ユーザー、所有グループ、タイムスタンプなど

| 併用オプション                     | 説明                                                           |
|------------------------------------|----------------------------------------------------------------|
| -a(--all)                          | インストール済みの全パッケージを表示                           |
| -l(--list)                         | 指定したパッケージに含まれるファイルの表示                     |
| -i(--info)                         | 指定したパッケージの詳細情報の表示                             |
| -f(--file) ファイル名              | 指定したファイルがどのパッケージからインストールされたかを表示 |
| -p(--package)                      | 照会対象をパッケージファイルとする                             |
| --changelog                        | 指定したパッケージの変更履歴を表示                             |
| -c(--configfiles)                  | 設定ファイルの一覧表示                                         |
| --nomd5                            | MD5によるファイル改ざんを検査しない                            |
| -R(--requires)                     | 指定したパッケージが依存するファイルの表示                     |

```
# インストール前のxxxx.rpmパッケージの依存関係を表示
rpm -qRp xxxx.rpm
rpm --query --requires --package xxxx.rpm
```

```
# インストールされているpostfixパッケージの詳細情報を表示
rpm -qi postfix
rpm --query --info postfix
```

### -p

- `-p`を付けると、インストール前のRPMファイルに対して情報を取得
- `-p`を付けないと、インストール済のパッケージを対象とする

| コマンド             | 動作                                         |
|----------------------|----------------------------------------------|
| rpm -q パッケージ名  | インストール済みのパッケージを対象に情報取得 |
| rpm -qi パッケージ名 | インストール済みのパッケージの詳細           |
| rpm -ql パッケージ名 | インストール済みのファイル一覧               |
| rpm -qip xxxx.rpm    | インストール前のRPMファイルの詳細情報        |
| rpm -qlp xxxx.rpm    | インストール前のRPMファイルの内容一覧        |

# YUMツール

YUM(Yellowdog Updater Modified)はパッケージのインストール、更新、削除、検索、情報取得などを行うことができる。

設定ファイルは`/etc/yum.conf`、パッケージの取得元(リポジトリ)は`/etc/yum.repos.d`ディレクトリ内のファイルで設定する。

yumはRHEL8以降では`dnf(Dandified YUM)`に置き換えられており、ほとんどのコマンドはyumの代わりにdnfを使って実行できる。

| サブコマンド                | 説明                                                                     |
|-----------------------------|--------------------------------------------------------------------------|
| install パッケージ名        | パッケージのインストール                                                 |
| update [パッケージ名]       | パッケージのアップデート(パッケージの指定なしですべてのパッケージを更新) |
| remove パッケージ名         | パッケージのアンインストール                                             |
| info [パッケージ名]         | パッケージの詳細情報の表示                                               |
| list [パッケージ名]         | パッケージの一覧表示(バージョンとインストール済かどうか)                 |
| search キーワード           | 指定したキーワードでパッケージの検索                                     |
| check-update [パッケージ名] | アップデート可能なパッケージの検索                                       |
| grouplist                   | パッケージグループの一覧表示                                             |
| groupinstall グループ       | パッケージグループのインストール                                         |

## YUMの設定ファイル

YUMの全体的な設定ファイルは`/etc/yum.conf`だが、個々のリポジトリの設定は`/etc/yum.repos.d`ディレクトリ内に、リポジトリごとに独自のファイル(拡張子`.repo`)を作成して記述する。

複数の設定ファイルを活用する仕組みにより、新規リポジトリの追加や特定のリポジトリの設定制御が容易に行える。

YUMには組み込み変数が用意されており、yumコマンドや設定ファイル内で使用が可能。

=> 設定ファイル内のパッケージ取得用URLには`$releasever`や`$basearch`など

- $releasever: Red Hat Enterprise Linuxでリリースされたバージョンから名づけられている(releseとver)
- $basearch: システムのベースとなるアーキテクチャ(CPUの種類)から名づけられている(baseとarch)

