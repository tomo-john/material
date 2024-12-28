# パッケージ管理ツール

Linuxのパッケージ管理ツールは、パッケージのインストール・アップデート・削除などを効率的に行うためのツール。

| ツール | 特徴                                      | 対応ディストリビューション         |
|--------|-------------------------------------------|------------------------------------|
| dpkg   | Debian系の基本ツール。低レベル操作。      | Debian, Ubuntuなど                 |
| apt    | dpkgをラップする高レベルツール。          | 同上。                             |
| rpm    | RPMパッケージの基本ツール。低レベル操作。 | RHEL, CentOS, Fedora, openSUSEなど |
| yum    | rpmをラップする高レベルツール。           | 同上。                             |

- Debian系は`dpkg`と`apt`
- RedHat系は`rpm`と`yum`

dpkg, rpmは依存関係の自動解決をしないが、apt, yumはリポジトリを通じて、依存関係を自動解決しながらパッケージを管理する。

yumは最近は新しい`dnf`ツールに置き換えられていることが多い。

```
# Debian系

# 基本はaptを使う
apt install vim

# .debパッケージを直接インストールするならdpkg
dpkg -i package.deb

# RHEL系

# 基本はyum(またはdnf)を使う
yum install vim

# .rpmパッケージを直接インストールするならrpm
rpm -ivh package.rpm
```

