# cron

- `cron` : 定期的に実行するジョブ
- `at` : 1回限りのジョブの予約

定期的にジョブを実行する`cron`は、スケジュールを管理するデーモンである`crond`とスケジューリングを編集する`crontabコマンド`から構成されている。

=> `crond`デーモンは1分ごとに`crontabファイル`を調べて、実行すべきスケジュールが存在すればそのジョブを実行する

---

# ユーザーのcrontab

ユーザーのcrontabファイルは、`/var/spool/cron`ディレクトリ以下におかれている。

=> 例: ユーザー`john`の場合 : `/var/spool/cron/john` or `/var/spool/cron/crontabs/john`

=> このファイルはエディタで開いて直接編集してはいけない : `crontab`コマンドを使用する

## crontabコマンド

```
crontab [オプション]
```

### オプション

| オプション    | 説明                                                  |
|---------------|-------------------------------------------------------|
| -e            | エディタを使ってcrontabファイルを編集                 |
| -l            | crontabファイルの内容を表示                           |
| -r            | crontabファイルを削除                                 |
| -i            | crontabファイル削除時に確認                           |
| -u ユーザー名 | ユーザーを指定してcrontabファイルを編集する(rootのみ) |

### 書式

```
分 時 日 月 曜日 コマンド
```

| フィールド | 内容                                                     |
|------------|----------------------------------------------------------|
| 分         | 0～59までの整数                                          |
| 時         | 0～23までの整数                                          |
| 日         | 1～31までの整数                                          |
| 月         | 1～12までの整数 or jan～decまでの文字列                  |
| 曜日       | 0～7までの整数(0,7:日曜～6:土曜) or Sun, Monなどの文字列 |
| コマンド   | 実行するコマンド                                         |

- `*`はすべての値にマッチ
- 複数の値を指定するときは`,`で区切る
- 間隔指定は`*/2`のように指定(2分ごと、2時間ごとなど)

```
# 毎日23:15に/usr/local/bin/backupプログラムを実行
15 23 * * * /usr/local/bin/backup

# 毎週月曜日の9時と12時に実行
* 9,12 * * 1 /usr/local/bin/dog

# 2時間ごとに実行
* */2 * * * /usr/local/bin/superdog
```
---

# システムのcrontab

ユーザーのcrontabファイルとは別にシステム用のcrontabファイル(`/etc/crontab`)も存在する。

`/etc/crontab`ファイルでは一般的に、そこから`/etc/cron.*`ディレクトリに置かれたファイルを呼び出す。

=> `/etc/crontab`ファイルには、実行ユーザー名を指定するフィールドが加わる

```
# /etc/crontabの例
# *  *  *  *  * user-name command to be executed
17 *	* * *	root    cd / && run-parts --report /etc/cron.hourly
25 6	* * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.daily )
47 6	* * 7	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.weekly )
52 6	1 * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.monthly )
```

---

# crontab関連のファイルとディレクトリ

| file/dir                 | 説明                                                                 |
|--------------------------|----------------------------------------------------------------------|
| /etc/crontab             | システムのcrontabファイル                                            |
| /etc/cron.d/             | 各種cronジョブを記述したファイルを収めたディレクトリ                 |
| /etc/cron.hourly         | 1時間に1度実行されるcronジョブを記述したファイルを収めたディレクトリ |
| /etc/cron.daily          | 1日に1度実行されるcronジョブを記述したファイルを収めたディレクトリ   |
| /etc/cron.weekly         | 週に1度実行されるcronジョブを記述したファイルを収めたディレクトリ    |
| /etc/cron.monthly        | 月に1度実行されるcronジョブを記述したファイルを収めたディレクトリ    |
| /var/spool/cron/         | ユーザーのcrontabファイルを収めたディレクトリ                        |
| /var/spool/cron/crontabs | 同上                                                                 |

