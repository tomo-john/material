# systemdのtimerユニット

systemdのtimerユニットは、定期的に自動でジョブを実行するジョブスケジューラとしてcronの代わりに使用できる。

timerユニットによるジョブ実行には以下のユニット定義作成が必要。

- timerユニット : ジョブの実行タイミング、実行するジョブを指定
- ジョブ本体となるユニット : timerユニットから呼び出されて処理を行うユニット
  - timerユニット以外のユニットが指定できるが、デフォルトではtimerユニットと同じ名前のserviceユニットが実行される
  - 例: `john.timer`の場合、`john.service`

実際にtimerユニットを定義するには`/etc/systemd/system/`に拡張子`.timer`の定義ファイルを作成し`[Timer]`セクションにスケジュールと実行するサービスを指定する。

### 作成例


```
# vim /etc/systemd/system/john.timer

[Unit]
Description=run john script every hour # このtimerの説明

[Timer]
OnBootSec=10min                        # 起動から10分後に最初の実行
OnUnitActiveSec=1h                     # その後は毎時間実行
Unit=john.service                      # 指定時間に実行するサービス(ここが未指定時はtimerユニット名と同じサービスが実行)
Persistent=true                        # システムが停止中でも、次回起動時に本来実行されていたはずの処理を補完

[Install]
WantedBy=timers.target                  # systemctl enable xxx.timerを実行したときに、timers.targetに紐づくようにするという意味らしい
```

```
# vim /etc/systemd/system/john.service

[Unit]
Description=john script          # 説明

[Service]
Type=oneshot                     # 実行するサービスの種類(oneshotは一度だけ短時間の処理をする的な)
ExecStart=/usr/local/bin/john.sh # 起動させるスクリプト
```

### 動作確認

```
systemctl list-timers
```

=> タイマーの一覧が表示される

```
journalctl -u john.service
```

=> 実行履歴(ログ)の確認

---

# タイマーの種類

timerユニットの実行タイミング指定には2つの方法がある。

### モノトニックタイマー

システムが起動して一定時間が経過した後など、ジョブを実行するタイミングを任意に設定する。

ジョブが起動(または停止)してからの経由時間などを指定することにより、定期的に実行することも可能。

### リアルタイマー

カレンダー形式でジョブを実行するタイミングを設定する。

特定の日時に1回のみ実行したり、毎時・毎週など周期的に実行することも可能。

