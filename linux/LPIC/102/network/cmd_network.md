# ネットワーク関連系コマンド

| コマンド    | 説明                                                                  | 備考                                      |
|-------------|-----------------------------------------------------------------------|-------------------------------------------|
| ip          | ネットワークインターフェース、ルーティングテーブル、ARPテーブルの管理 | [ip](ip.md)                               |
| ifconfig    | ネットワークインターフェースの設定や確認                              | [ifconfig](ifconfig.md)                   |
| ifup        | ネットワークインターフェースの有効化                                  | [ifconfig](ifconfig.md)                   |
| ifdown      | ネットワークインターフェースの無効化                                  | [ifconfig](ifconfig.md)                   |
| route       | ルーティングテーブルの操作・表示                                      | [route](route.md)                         |
| netstat     | ネットワーク機能のさまざまな情報表示(開いているポート確認など)        | [netstat](netstat.md)                     |
| nmcli       | NetworkManagerを操作するCLIツール・ネットワーク設定など               | [nmcli](network_manager.md)               |
| ping        | 疎通確認・指定したホストへICMPパケットを送信                          | [ping](ping_traceroute.md)                |
| traceroute  | 指定したホストまでの経路表示                                          | [traceroute](ping_traceroute.md)          |
| tracepath   | 指定したホストまでの経路表示                                          | [tracepath](ping_traceroute.md)           |
| hostnamectl | ホスト名の設定・確認                                                  | [hostnamectl](hostnamectl.md)             |
| hostname    | ホスト名の設定・確認                                                  | [hostname](hostnamectl.md)                |
| host        | 名前解決                                                              | [host](dns.md)                            |
| dig         | 名前解決(hostより詳しい)                                              | [dig](dns.md)                             |
| nslookup    | 名前解決(hostよりちょっと詳しい)                                      | [nslookup](dns.md)                        |
| nc          | TCP/UDPを使った通信を手軽に使うことができる便利なツール               | [nc](nc.md)

## 開いているポートを確認

- netstat -atu
- ss -stu
- lsof -i

## ルーティングテーブルを表示

- route
- netstat -r
- ip route

## その他

- nmap : ポートスキャン(ホストを指定)
- fuser -n : ポートを開いているプロセス(PID)を => `fuser -n tcp 8080`みたいに使う

