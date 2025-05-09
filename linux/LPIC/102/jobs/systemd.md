# systemdによるスケジューリング

systemdの`タイマーUnit`を使うと、cronの代わりにスケジューリングを設定することが可能。

- モノトニックタイマー : 何かしらのイベントから一定時間経過した後に発動し、以後定期的に実施される
- リアルタイムタイマー : crontab同様にカレンダーで指定し定期的に実施される

=> `/etc/systemd/system/john.timer`ファイルを作成する

# systemd-run

`systemd-run`コマンドでもスケジュールの予約をすることが可能。

- systemctl list-timers : スケジュールの一覧を確認
- journalctl -u ユニット名 : コマンドの実行結果を確認
- systemctl stop : スケジュールの削除

---

# タイマーユニットについて

`*.timer`ユニットファイルを使用し、`*.service`を指定の時間に自動実行できる仕組み。

- `myjob.timer` : 毎日12時に
- `myjob.service` : 実行する内容

