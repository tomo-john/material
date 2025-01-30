# ランレベル

Linux起動時の動作モード。

## 数値 / ターゲット / 起動モード

| ランレベル | Systemdのターゲット | 動作                                         |
|------------|---------------------|----------------------------------------------|
| 0          | poweroff.target     | システムのシャットダウン                     |
| 1/s/S      | rescue.target       | rootだけが利用可能なシングルユーザーモード   |
| 2          | multi-user.target   | マルチユーザーモード(ネットワークなし)       |
| 3          | multi-user.target   | マルチユーザーモード(ネットワークあり)       |
| 4          | multi-user.target   | 未使用(カスタマイズ用)                       |
| 5          | graphical.target    | マルチユーザーモード(デスクトップ環境が有効) |
| 6          | reboot.target       | システム再起動                               |

---

# SysVinit

## 設定ファイル

SysVinitではシステムのデフォルトのランレベルや挙動を`/etc/inittab`で設定する。

```
# /etc/inittabの例(デフォルトのランレベルを3に設定)
id:3:initdefault
```

## ランレベルと起動スクリプト

SysVinitではランレベルごとに異なる起動スクリプトを実行する。

起動スクリプトの配置場所は`/etc/rc.d/rc?.d/`(?にはランレベル番号の0～6)。

スクリプト名称の先頭に`S(Start)`または`K(Kill)`が付く。

=> Sは起動するスクリプトでKは起動されないスクリプト

さらにSまたはKの後には数字2桁がつき、これが実行されるスクリプトの優先順位になる(数字の小さいスクリプトから順に実行)。

=> ランレベル3でネットワークを起動するスクリプトであれば、`/etc/rc3.d/S01network`など(S01などで最初に実行されるスクリプト)


## runlevelコマンド(ランレベルの確認)

現在のランレベルと直前のランレベルを表示するコマンド。

```
# runlevelを実行
N 3
```

- N: 直前のランレベル(Nはなしを意味する)
- 3: 現在のランレベル

現在(直前)のランレベルを確認するコマンドなので、ランレベルの変更はできない。

## init / telinit(ランレベルの変更)

それぞれランレベルを変更するコマンド(telinitは基本的にinitと同じ役割)。

ランレベルの変更は一時的なもので、再起動するとデフォルトのランレベルでまた起動される。

コマンドの引数には変更したいランレベルを指定する(root権限が必要)。

```
# シャットダウン
init 0

# 再起動
init 6
```

`/etc/inittab`は通常Linuxシステム起動時に読込まれるがinitまたはtelinitコマンドに`q`か`Q`オプションを指定して実行すると、`/etc/inittab`を再読み込みさせ即座に変更を反映させることが可能。

- init q
- init Q
- telinit q
- telinit Q

---

# Systemd

SysVinitではランレベルの0から6でシステムの動作状態を管理していたが、Systemdではターゲット(target)という概念に置き換わった。

Systemdにおいては`systemctl`コマンドを使用してターゲット(ランレベル)の確認や変更を行う。

ターゲットのファイルは`/lib/systemd/system`ディレクトリ以下に存在し、SysVinitとの互換性のために`runlevel[0-6].target`も存在する(シンボリックリンクになっている)。

| シンボリックリンク | ネイティブターゲット |
|--------------------|----------------------|
| runlevel0.target   | poweroff.target      |
| runlevel1.target   | rescue.target        |
| runlevel2.target   | multi-user.target    |
| runlevel3.target   | multi-user.target    |
| runlevel4.target   | multi-user.target    |
| runlevel5.target   | graphical.target     |
| runlevel6.target   | reboot.target        |

## デフォルトのランレベル(ターゲット)の確認

現在のデフォルトのランレベルを確認するには`systemctl get-default`コマンドを使用することで確認することができる。

Systemdでは`/etc/systemd/system/default.target`ファイルが`/lib/systemd/system/xxx.target`のシンボリックリンクとなるため、`/lib/systemd/system`のどのターゲットのリンクか確認することで、デフォルトのランレベルを確認することができる。

=> 従来のSysVinitでの`/etc/inittab`を確認

## ランレベル(ターゲット)の変更

デフォルトのランレベルを変更する場合は`systemctl set-defalut`コマンドを使用する。

```
# テキストモード(ランレベル3相当)をデフォルトにする
systemctl set-default multi-user.target
```

もしくは`/etc/systemd/system/default.target`のシンボリックリンクを作成しなおすことでも変更が可能(でも非推奨)。

```
# すでにシンボリックリンクが作成されている場合は一度削除する(上書きできない)
rm /etc/systemd/system/default.target

# シンボリックリンクを作成しなおす(今回はデフォルトをグラフィカルログインに設定)
ln -s /lib/systemd/system/graphical.target /etc/systemd/system/default.target
```

=> 従来のSysVinitでは`/etc/inittab`のランレベルを変更する

## ランレベル(ターゲット)を変更する(一時的)

一時的にランレベルを変更するには`systemctl isolate`コマンドを使用する。

一時的にターゲットを切り替えるので、再起動するとデフォルトのターゲットで再度起動される。

従来のSysViniの`init`, `telinit`コマンドと同じようなイメージ。(Systemdでもinit, telinitコマンドは一応使用できる)

```
# シングルユーザーモードへ変更
systemctl isolate rescue.target
```

