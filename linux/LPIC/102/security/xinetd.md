# xinetd

読み方は`エックスイネットディー`。スーパーサーバ。

他のサーバープログラムに代わってサービス要求を監視し、接続が確立した時点で本来のサーバープログラムに要求を引き渡す。

必要なときだけ個々のサーバープログラムを起動することで、メモリなどのシステムリソースを効率的に使用することができる。

`TCP Wrapper`の仕組みと組み合わせることで、アクセス制御を集中的に管理することができる。

デメリットとしては反応が遅れるという点。

クライアントからの要求にすぐに対応できる必要があるサーバーは、スーパーサーバ経由ではなくサーバープログラム自身で要求を監視するべき。

=> これを`スタンドアローン`と言い、Webサーバーやメールサーバーがこれに該当する。

FTPサーバー、Telnetサーバーなどの接続の頻度が高くないサーバーはスーパーサーバ経由の接続に適している。

## xinetdの設定

- `/etc/xinetd.conf` : 全体的な設定
- `/etc/xinetd.d`ディレクト以下のファイル : サービスごとの設定ファイル


### xinetd.confの主なパラメータ

| パラメータ     | 説明                                                                            |
|----------------|---------------------------------------------------------------------------------|
| instances      | 各サービスの最大デーモン数                                                      |
| log_type       | ログの出力方法                                                                  |
| log_on_success | 接続を許可したときにログに記録する内容                                          |
| log_on_failure | 接続を拒否したときにログに記録する内容                                          |
| cps            | 1秒間に接続できる最大コネクション数と限度に達した場合にサービスを休止させる秒数 |
| includedir     | サービスごとの設定ファイルを収めるディレクトリ                                  |

```
# /etc/xinetd.conf

defaults
{
  instances          = 60
  log_type           = SYSLOG authpriv # <= ログのファシリティを指定
  log_on_success     = HOST PID
  log_on_failure     = HOST
  cps                = 25 30
}

includedir /etc/xinetd.d
```

### /etc/xinetd.d/以下のファイル

ここには`ftp`や`telnet`など、サービス名がファイル名になっている。

ここのファイルでサービスごとの設定を行う。

=> 設定変更の際はxinetdの再起動が必要 `/etc/init.d/xinetd restart`

| パラメータ     | 説明                                                                            |
|----------------|---------------------------------------------------------------------------------|
| disable        | サービスの有効/無効(yes/no)                                                     |
| socket_type    | 通信タイプ(TCP: stream / UDP: dgram)                                            |
| wait           | ウェイトタイム                                                                  |
| user           | サービスを実行するユーザー名                                                    |
| server         | サーバープログラム(デーモン)へのフルパス                                        |
| server_args    | サーバープログラム(デーモン)に渡す引数                                          |
| log_on_failure | 接続を拒否したときにログに記録する内容                                          |
| nice           | 実行優先度                                                                      |
| only_from      | 接続を許可する接続元                                                            |
| no_access      | 接続を拒否する接続元                                                            |
| access_times   | アクセスを許可する時間帯                                                        |

```
# /tec/xinetd.d/telnet

service telnet
{
  disable            = no                   # これで有効
  socket_type        = stream               # TCP
  wait               = no
  user               = root                 # サービスをrootで実行
  server             = /usr/sbin/in.telnetd # サーバープログラムのパス
  log_on_failure     = USERID
}
```

## systemdの場合

systemdではxinetdの代わりに`systemd.socket`を使用する。

### telnetの場合例

```
# /etc/systemd/system/telnet.socket

[Unit]
Description=Telnet Socket

[Socket]
ListenStream=10023
Accept=yes

[Install]
WnatedBy=sockets.target
```

```
# /etc/systemd/system/telnet.service

[Unit]
Description=Telnet Service

[Service]
ExecStart=/usr/sbin/in.telnetd
User=root
Group=root
StandardInput=socket
```

