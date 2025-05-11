# logger

任意のメッセージ(ログメッセージ)を生成・送るコマンド。

ログのテストやsyslog.confの設定をチェックする場合にも利用できる。

```
logger [-p ファシリティ.プライオリティ] [-t タグ] メッセージ
```

```
# ファシリティをsyslog、プライオリティをinfo、タグをTestでログメッセージを生成
logger -p syslog.info -t Test "logger test message"
```

---

# systemd-cat

systemd採用システムでは`systemd-cat`コマンドで、コマンドの実行結果をジャーナルに書き込むことができる。

```
# uptimeコマンドの実行結果をジャーナルに書き込む
systemd-cat uptime
```

