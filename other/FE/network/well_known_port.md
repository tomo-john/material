# ウェルノウンポート

IPによる通信で利用されるTCPやUDPのポート番号のうち、署名なサービスやプロトコルが利用するために予約されているポート番号。

- 0〜1023番ポートまで
- ポート番号は16bit(0〜65536番まである)

| ポート番号  | プロトコル名 | 用途(サービス名)                          | 説明                                                   |
|-------------|--------------|-------------------------------------------|--------------------------------------------------------|
| 20          | TCP          | FTP(データ転送)                           | ファイル転送のデータチャネル用                         |
| 21          | TCP          | FTP(制御)                                 | ファイル転送の制御用                                   |
| 22          | TCP/UDP      | SSH(Secure Shell)                         | リモートログイン、安全な通信                           |
| 23          | TCP          | Telnet                                    | 非暗号化のリモートログイン                             |
| 25          | TCP          | SMTP(Simple Mail Transfer Protocol)       | メール送信                                             |
| 53          | TCP/UDP      | DNS(Domain Name System)                   | ドメイン名とIPアドレスの変換                           |
| 67/68       | UDP          | DHCP(Dynamic Host Configuration Protocol) | IPアドレスの自動割り当て(67：サーバ、68：クライアント) |
| 80          | TCP          | HTTP(HyperText Transfer Protocol)         | Webページの閲覧(暗号化なし)                            |
| 110         | TCP          | POP3(Post Office Protocol ver.3)          | メール受信                                             |
| 119         | TCP          | NNTP(Network News Transfer Protocol)      | ネットニュース転送                                     |
| 123         | UDP          | NTP(Network Time Protocol)                | 時刻同期                                               |
| 143         | TCP          | IMAP(Internet Message Access Protocol)    | メール受信(POP3より高機能)                             |
| 161/162     | UDP          | SNMP(Simple Network Management Protocol)  | ネットワーク機器監視(161：要求、162：通知)             |
| 443         | TCP          | HTTPS(HTTP Secure)                        | Webページの閲覧(暗号化あり)                            |
| 993         | TCP          | IMAPS                                     | 暗号化されたIMAP                                       |
| 995         | TCP          | POP3S                                     | 暗号化されたPOP3                                       |

### リモート関連

- 20 : FTP(データ転送)
- 21 : FTP(制御)
- 22 : SSH
- 23 : Telnet

### メール関連

- 25 : SMTP(送信)
- 110 : POP3(受信)
- 995 : POP3S(暗号化されたPOP3)
- 143 : IMAP(受信・POP3より高機能)
- 995 : IMAPS(暗号化されたIMAP)

### Webアプリケーション

- 80 : HTTP(Webページ閲覧)
- 443 : HTTPS(暗号化されたHTTP)

### その他

- 53 : DNS
- 123 : NTP

