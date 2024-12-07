# ネットワーク関連

| コマンド      | 機能                                                   |
|---------------|--------------------------------------------------------|
| ping          | 疎通確認                                               |
| ip addr show  | ネットワークインターフェースの状態確認(旧: `ifconfig`) |
| ip route show | ルーティングテーブルの状態確認(旧: `route`)            |
| ss            | ソケットに関する情報表示(旧: `netstat`)                |

### ping: 疎通確認

サーバーなど、コンピュータが起動しネットワークが接続できる状態にあるか？を確認するためによく使用される

応答速度も表示されるため、回線の速度を確認するためにも利用される

`ping`は`ICMP(Internet Control Message Protoco)`というプロトコルを利用しているが、コンピュータの設定によっては

このプロトコルのパケット(データ)の受信を許可していないことがある

=> 必ずしもpingが通らない = ネットワークの不通とは言い切れない

### ip addr show (ifconfig): IPアドレスの確認

ネットワークインターフェース(Network Interface: N/I, NIC)とは、ネットワークへ接続する際の窓口を果たすもの

LANケーブルなどを接続して利用する

`ip addr show (ifconfig)`はネットワークインターフェースのIPアドレスや接続状況を確認することができる

使用例:

```
ip addr show

1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00
    inet 127.0.0.1/8 scope host lo
       valid_lft forever preferred_lft forever
    inet 10.255.255.254/32 brd 10.255.255.254 scope global lo
       valid_lft forever preferred_lft forever
    inet6 ::1/128 scope host
       valid_lft forever preferred_lft forever
2: eth0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc mq state UP group default qlen 1000
    link/ether 00:15:5d:e3:b7:ac brd ff:ff:ff:ff:ff:ff
    inet 172.18.236.74/20 brd 172.18.239.255 scope global eth0
       valid_lft forever preferred_lft forever
    inet6 fe80::215:5dff:fee3:b7ac/64 scope link
       valid_lft forever preferred_lft forever
3: docker0: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN group default
    link/ether 02:42:d7:a0:cd:c5 brd ff:ff:ff:ff:ff:ff
    inet 172.17.0.1/16 brd 172.17.255.255 scope global docker0
       valid_lft forever preferred_lft forever
```

- `lo`: loopback interface, 自分自身とだけ通信可能なインターフェースのこと(この部分がネットワークインターフェース名)
- `inet 127.0.0.1`: IPアドレス(IPv4)
- `inet6 fe80::215:5dff:fee3:b7ac`: IPアドレス(IPv6)

### ip route show (route): 経路情報の確認

ルーティングテーブルの内容を表示する

ルーティングテーブルとはネットワークの経路情報のこと

ネットワーク上の目的地(サーバー"google.com"など)へ到達するまでの経路を判断する際に利用する

使用例:

```
ip route show

default via 172.18.224.1 dev eth0 proto kernel
172.17.0.0/16 dev docker0 proto kernel scope link src 172.17.0.1 linkdown
172.18.224.0/20 dev eth0 proto kernel scope link src 172.18.236.74
```

1行目は宛先ネットワークがルーティングテーブルに存在しない場合に使用されるデフォルトルート

宛先までの経路が不明なパケットは、別のネットワークへパケットを転送するデフォルトゲートウェイ「172.18.224.1(通常はルータのIP)」に送信される

- `via`とは`～を経由して`という意味

2, 3行目は宛先ネットワークへパケットがどのように送信されるかが示されている

宛先`172.17.0.0/16`へ送られるパケットは、デバイス`docker0`を通って送信元`172.17.0.1`から送信される

=> /16はIPv4の32bitからなるIPアドレスにおいて、`16bitがネットワーク部である`ということを意味する

### ss

ソケットとは、プロセス(プログラム)同士がが通信を行う際に使用する機能で、ソケットと通じて`TCP`や`UDP`などトランスポート層のプロトコルを利用する

実行例:

```
ss -ltu

Netid  State   Recv-Q  Send-Q  Local Address:Port    Peer Address:Port
tcp    LISTEN  0       244     127.0.0.1:postgresql  0.0.0.0:*
```

- `-l`: 待ち受け(LISTEN)中のポートを表示
- `-t`: TCPのソケットを表示
- `-u`: UDPのソケットを表示

- `tcp`: プロトコル(TCPまたはUDP)
- `LISTEN`: 状態(LISTEN, UNCONN: 待ち受け中)
- `127.0.0.1:postgresql`: 使用しているIPアドレスとポート番号

待ち受け中(LISTEN, UNCONN)とは、ソケット通信におけるサーバー側(接続される側)が、クライアント(接続する側)からの要求を待ち受けている状態

上記の例では`127.0.0.1`: ローカルホスト(自身のシステム)がPostgreSQLデータベースが使用するポート(通常はポート5432)が開いていいるのがわかる

