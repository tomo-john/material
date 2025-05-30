# ポート

送信元アプリケーションや送信先アプリケーションを識別するためにポート番号が使用される。

どのアプリケーションがどのポート番号を使うかが決められているので、同時に複数のアプリケーションを利用していても正しく処理することが可能。

=> Webサーバーは80番ポートを監視し、Webブラウザは宛先の80番ポートに対してアクセスを行うなど

主要なネットワークサービスで使用されているポート番号は標準化されていて、1023番までが予約されている。

=> ウェルノウンポート(Well Known Port)と呼ばれる

ポート番号は`16ビット`で表され、`0〜65535番`までが使用できる。

| 範囲           | 名前               | 用途例                                                     |
|----------------|--------------------|------------------------------------------------------------|
| 0 ～ 1023      | ウェルノウンポート | システムやroot権限を持つプロセスに割り当てられたポート番号 |
| 1024 ～ 49151  | レジスタードポート | アプリ開発者が登録するポート(よく使われるプログラムなど)   |
| 49152 ～ 65535 | プライベートポート | 自由に使用可能なポート                                     |

| ポート             | 2進数                                      | 10進数         |
|--------------------|--------------------------------------------|----------------|
| ウェルノウンポート | 0000 0000 0000 0000 〜 0000 0011 1111 1111 | 0 〜 1023      |
| レジスタードポート | 0000 0100 0000 0000 〜 1011 1111 1111 1111 | 1024 〜 49151  |
| プライベートポート | 1100 0000 0000 0000 〜 1111 1111 1111 1111 | 49152 〜 65535 |

ウェルノウンポートとレジスタードポートのポート番号、TCP/UDPの区別、サービス名称は`IANA(アイアナ)`によって割り当て・管理されている。

## 代表的なウェルノウンポートポート

| 番号 | プロトコル | サービス/プロトコル      | 説明                              |
|------|------------|--------------------------|-----------------------------------|
| 20   | TCP        | FTP                      | FTPのデータ転送用                 |
| 21   | TCP/UDP    | FTP                      | FTP制御用(ログイン・コマンド)     |
| 22   | TCP        | SSH                      | セキュアリモートログイン          |
| 23   | TCP        | Telnet                   | リモートログイン(非暗号)          |
| 25   | TCP/UDP    | SMTP                     | 電子メール送信用                  |
| 53   | TCP/UDP    | DNS                      | 名前解決                          |
| 80   | TCP        | HTTP                     | ウェブ通信                        |
| 110  | TCP        | POP3                     | 電子メール(受信・旧方式)          |
| 123  | UDP        | NTP                      | 時刻同期                          |
| 139  | TCP/UDP    | NetBIOS                  | Microsoftネットワーク             |
| 143  | TCP        | IMAP                     | 電子メール(IMAP2/IMAP4)           |
| 161  | UDP        | SNMP                     | ネットワーク監視                  |
| 162  | TCP/UDP    | SNMP Trap                | ネットワーク監視(警告通知等)      |
| 389  | TCP/UDP    | LDAP                     | ディレクトリサービス              |
| 443  | TCP/UDP    | HTTP over SSL/TLS(HTTPS) | SSL/TLSによるHTTP接続             |
| 465  | TCP        | SMTP over SSL/TLS(SMTPS) | SSL/TLSによるSMTP接続             |
| 514  | UDP        | Syslog                   | ロギングサービス                  |
| 636  | TCP/UDP    | LDAP over SSL/TLS        | SSL/TLSによるディレクトリサービス |
| 993  | TCP/UDP    | IMAP over SSL/TLS(IMAPS) | SSL/TLSによるIMAP接続             |
| 995  | TCP/UDP    | POP3 over SSL/TLS(POP3S) | SSL/TLSによるPOP3接続             |

=> `SSL/TLS`は暗号化された通信

- SSL : Secure Sockets Layer => 古い暗号化規格
- TLS : Transport Layer Security => SSLの後継

ポート番号とサービスの対応は`/etc/services`に記述されている。

### Webサービス系

| 番号 | プロトコル | サービス/プロトコル      | 説明                              |
|------|------------|--------------------------|-----------------------------------|
| 80   | TCP        | HTTP                     | 通常のWeb通信                     |
| 443  | TCP        | HTTPS                    | SSL/TLSで暗号化したHTTP           |

### メール系

| 番号 | プロトコル | サービス/プロトコル      | 説明                              |
|------|------------|--------------------------|-----------------------------------|
| 25   | TCP        | SMTP                     | メール送信(平文)                  |
| 465  | TCP        | SMTPS                    | メール送信(SSL/TLS)               |
| 110  | TCP        | POP3                     | メール受信(古い方式)              |
| 995  | TCP        | POP3S                    | POP3のSSL/TLS版                   |
| 143  | TCP        | IMAP                     | メール受信(新しい方式)            |
| 993  | TCP        | IMAPS                    | IMAPのSSL/TLS版                   |

### リモート接続

| 番号 | プロトコル | サービス/プロトコル      | 説明                              |
|------|------------|--------------------------|-----------------------------------|
| 22   | TCP        | SSH                      | セキュアなリモート接続            |
| 23   | TCP        | Telnet                   | 非暗号のリモート接続              |
| 3389 | TCP        | RDP                      | Windowsリモートデスクトップ       |

### DNS / NTP

| 番号 | プロトコル | サービス/プロトコル      | 説明                              |
|------|------------|--------------------------|-----------------------------------|
| 53   | TCP/UDP    | DNS                      | 名前解決                          |
| 123  | UDP        | NTP                      | 時刻同期                          |

### ファイル共有

| 番号 | プロトコル | サービス/プロトコル      | 説明                              |
|------|------------|--------------------------|-----------------------------------|
| 20   | TCP        | FTP(データ)              | ファイル転送(データ)              |
| 21   | TCP        | FTP(制御)                | ファイル転送(制御)                |
| 139  | TCP/UDP    | NetBIOS                  | Windowsファイル共有               |
| 445  | TCP        | SMB                      | Windowsファイル共有               |

