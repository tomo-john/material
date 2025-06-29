# netstat

Network Statistics(ネットワーク統計)の略でネットワーク機能に関するさまざまな情報を表示するコマンド。

=> 開いているポートの確認によく使用される

## オプション

| オプション | 説明                                     |
|------------|------------------------------------------|
| -a         | すべてのソケット情報を表示               |
| -c         | 状況を1秒ごとにリアルタイムで表示        |
| -i         | ネットワークインターフェースの状態を表示 |
| -n         | アドレスやポートを数値で表示             |
| -p         | PIDとプロセスも表示                      |
| -r         | ルーティングテーブルを表示               |
| -t         | TCPポートのみ表示                        |
| -u         | UDPポートのみを表示                      |

## State欄

- LISTEN : 接続待ち受け中
- ESTABLISHED : 接続中

## -n

netstatコマンドはデフォルトではポート番号やホスト名を名前解決して表示する。

DNSに障害がある場合などは、名前解決ができずに表示が止まってしまうことがある。

=> そんな時に`-n`オプションで名前解決なしに表示

---

# Socket

ソケットとはネットワーク通信の出入口(窓口)。

=> ソフトウェア的な通信口のこと

=> IPアドレス + ポート番号の組み合わせで識別される

=> プロセス同士がネットワーク越しにデータを送受信するための通信の端点になるもの

---

# ss

ssコマンドはnetstatコマンドの後継となるコマンドで、ネットワークのソケット情報を表示する。

- -a : すべてのソケットを表示
- -n : サービス名の名前解決をしない
- -t : TCPソケットを表示
- -u : UDPソケットを表示

---

