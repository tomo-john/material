# bashの設定ファイル

`/etc`以下の設定ファイルは全ユーザーに適用される。

`/etc/bash.bashrc`は`Debian系`にのみ存在するファイル。

| ファイル         | 読み込みタイミング | 説明                             |
|------------------|--------------------|----------------------------------|
| /etc/bash.bashrc | bash起動時         | bash起動時に実行・Debian系       |
| /etc/bashrc      | bash起動時         | bash起動時に実行・RedHat系       |
| /etc/profile     | ログイン時         | 環境変数・利用環境にかかわるもの |

`~/`以下の設定ファイルは各ユーザーごとの設定。

| ファイル         | 読み込みタイミング | 説明                                      |
|------------------|--------------------|-------------------------------------------|
| ~/.bash_profile  | ログイン時         | 環境変数などユーザー環境にかかわるもの    |
| ~/.bash_login    | ログイン時         | ~/.bash_profileがない場合の読み込み次候補 |
| ~/.profile       | ログイン時         | ~/.bash_loginがない場合の読み込み次候補   |
| ~/.bashrc        | bash起動時         | bash起動時に実行(エイリアスなど)          |
| ~/.bash_logout   | ログアウト時       | ログアウト時に実行                        |

## ログインシェル / 対話型シェル

- ログインシェル : `/etc/passwd`に設定され、ユーザーのログイン時に起動されるシェル。(このシェルが終了でログアウト)
- 対話型シェル : ログインシェルから別のプロセスとして起動するシェル(`/bin/bash`の実行・tmuxなど)

## 読み込みの順番

### ログインシェルの場合

- 1 : `/etc/profile`
- 2 : `/etc/bash.bashrc`があれば実行(Debian系)
- 3 : `~/.bash_profile`があれば実行(あれば`6`へ)
- 4 : `~/.bash_login`があれば実行(あれば`6`へ)
- 5 : `~/.profile`を実行(`~/.bash_profile`も`~/.bash_login`もない場合)
- 6 : `~/.bashrc`を読込む設定の場合に実行(Debian系)
- 7 : `/etc/bashrc`を読込む設定の場合に実行
- 8 : bash起動

### 非ログインシェル(対話型シェル)

- 1 : `~/.bashrc`があれば実行
- 2 : `/etc/bashrc`を読込む設定の場合に実行(Debian系)
- 3 : bash起動

```
# ログインシェル
/etc/profile => /etc/bash.bashrc(Debian系のみ) => [ ~/.bash_profile or ~/.bash_login or ~/.profile ] => ~/.bashrc => /etc/bashrc

# 対話型

/etc/bash.bashrc(Debian系のみ) => ~/.bashrc => /etc/bashrc
```

