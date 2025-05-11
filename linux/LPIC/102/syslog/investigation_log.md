# ログ調査

## /var/log/messagesの例

```
Feb 8 19:15:28 john kernel: Loaded 151 symbols from 4 modules.
```

- 日時 : Feb 8 19:15:28
- 出力元ホスト名 : john
- メッセージ出力先 : kernel
- メッセージ : Loaded 151 symbols from 4 modules.

## tail -f

ログをリアルタイムで監視するときに`tail -f`がよく使用される。

```
tail -f /var/log/messages
```

## grep

ログは膨大なので、特定のメッセージだけをしらべたい場合に`grep`コマンドでの絞り込みをかける。

```
grep eth0 /var/log/messages
```

## /var/log/syslog

Debian系では/var/log/messagesではなく、/var/log/syslogが使用される。

---

# /var/log/secure

`/var/log/secure`ファイルには認証などセキュリティ関連のログが保存されている。

---

# who

ログイン中のユーザーを調べるコマンド。

- コンソールログイン : tty1, tty2など
- ネットワーク経由や仮装端末 : pts/0, pts/1など

# w

ログイン中のユーザーに加え、システム情報も表示される。

=> システム情報の部分は`uptime`コマンドの表示と同じ

# /var/run/utmp

`who`, `w`コマンドは`/var/run/utmp`ファイルの情報を参照している。

=> バイナリファイルなのでcatなどで閲覧できない

=> 現在の情報だけなので厳密にはログファイルとはいえない

# last

最近ログインしたユーザーの一覧を表示する。

=> `/var/log/wtmp`(バイナリ)ファイルを参照する

# lastlog

`/var/log/wtmp`を参照し、ユーザーごとに最近のログイン一覧を表示するコマンド。

