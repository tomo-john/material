# systemdによるスケジューリング

systemdの`タイマーUnit`を使うと、cronの代わりにスケジューリングを設定することが可能。

- モノトニックタイマー : 何かしらのイベントから一定時間経過した後に発動し、以後定期的に実施される
- リアルタイムタイマー : crontab同様にカレンダーで指定し定期的に実施される

=> `/etc/systemd/system/john.timer`ファイルを作成する

# systemd-run

`systemd-run`コマンドでもスケジュールの予約をすることが可能。

=> 一時的なserviceやtimerを作って実行するイメージ

- systemctl list-timers : スケジュールの一覧を確認
- journalctl -u ユニット名 : コマンドの実行結果を確認
- systemctl stop : スケジュールの削除

例: 今から5分後にスクリプトを実行

```
systemd-run --on-active=5min /path/to/scritpt.sh
```

- `--on-active=` : タイマー起動後、指定時間経過で実行

例: 特定時刻に1回だけ実行

```
systemd-run --on-calendar="2025-05-09 21:00" /path/to/script.sh
```

---

# タイマーユニットについて

`*.timer`ユニットファイルを使用し、`*.service`を指定の時間に自動実行できる仕組み。

- `myjob.timer` : 毎日12時に
- `myjob.service` : 実行する内容

`myjob.timer`(実行タイミング)

```
[Unit]
Description=Run My Job Daily

[Timer]
OnCalendar=*-*-* 12:00:00
Persistent=true

[Install]
WantedBy=timers.target
```

`myjob.service`(実行内容)

```
[Unit]
Description=My Job Script

[Service]
ExecStart=/usr/local/bin/myscript.sh
```

