# ネットワークの設定

ネットワークの設定はコマンドによる変更、/etc以下の設定ファイルを編集する方法がある。

=> コマンドによる変更・設定はシステムやネットワークの再起動によって失われる

=> 永続的な設定をするためには設定ファイルを編集する

## /etc/hostname

ホスト名を設定するファイル。

=> ディストリビューションによっては`/etc/HOSTNAME`

## /etc/hosts

ホスト名とIPアドレスとの対応を記述するファイル。

小規模ローカルネットワーク内でファイルを配布すると名前解決ができる。

`IPアドレス ホスト名 ホストの別名`の順に記載する。

=> ホスト名を設定するファイルではない

## /etc/network/interfaces

Debian系でネットワークインターフェースの設定をするファイル。

```
auto eth0
iface eth0 inet static
  address 192.168.1.100
  netmask 255.255.255.0
  gateway 192.168.1.1
```

## /etc/sysconfig/network-scripts

RedHat系でさまざまなネットワークインターフェースの設定ファイルが配置されているディレクトリ。

ネットワークインターフェース名がeth0の場合、設定ファイルは`ifcfg-eth0`となり、IP固定の場合に編集する。

```
DEVICE=eth0            # ネットワークインターフェース名
BOOTPROTO=static       # DHCP or static
ONBOOT=yes             # 起動時に有効化するかどうか
IPADDR=192.168.1.100   # IPアドレス
NETMASK=255.255.255.0  # サブネットマスク
GATEWAY=192.168.1.1    # ゲートウェイ
DNS1=8.8.8.8           # DNSサーバー
```

=> 最近のRedHat系は`NetworkManager`と`nmcli`コマンドが標準になっている

