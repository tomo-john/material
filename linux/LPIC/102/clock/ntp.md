# NTP

NTP(Network Time Protocol)はネットワーク経由で正確なクロックを同期するプロトコル。

インターネット上にあるNTPサーバー(タイムサーバー)から正確な時刻を取得する。

NTPネットワークは階層構造(Stranum)でサーバーが組織されている。

| Stratum | 説明                                      |
|---------|-------------------------------------------|
| 0       | 最上位: 原子時計・GPSなどの物理的な時刻源 |
| 1       | Stratum0と直接つながっているサーバー      |
| 2       | Stratum1と同期している一般のNTPサーバー   |

---

# ntpdate

指定したNTPサーバーから現在時刻を取得するコマンド。

```
ntpdate NTPサーバー名
```

---

# NTPサーバーの運用

NTPサーバーは自前で用意することも可能。

## NTPサーバーの起動

```
# SysVinit
/etc/init.d/ntpd start

# systemd
systemctl start ntpd.service
```

## ntpq

NTPサーバーの状態を照会することができるコマンド。

```
# localhostで稼働しているNTPサーバーから問い合わせされているNTPサーバーのリストを表示
ntpq -p localhost
```

## /etc/nep.conf

NTPサーバーの設定を行うファイル。

補正情報(クロックの誤差を予測した数値)は`/etc/ntp.drift`, `/var/lib/drift`, `/var/lib/ntp/ntp.drift`などに保存される。

