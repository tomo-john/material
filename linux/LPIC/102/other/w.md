# who

ログインしているユーザーの情報を表示するシンプルなコマンド。

```
$ who
john   tty2   2025-06-06 08:32
```

=> ユーザー名・端末・ログインした日時

---

# w

ログインしているユーザー情報に加え、`何をしているか？(実行中のプロセス)`などwhoコマンドよりも詳細な情報を表示する。

```
# mac
$ w
 9:50  up 15 days,  9:45, 2 users, load averages: 1.46 1.73 1.72
USER       TTY      FROM    LOGIN@  IDLE WHAT
john       console  -       22 525  15days -
john       s000     -       28 525  - tmux new -s john
```

```
# linuxだとこんな感じ
$ w
 08:45:00 up 5 days,  3:12,  2 users,  load average: 0.05, 0.03, 0.01
USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
john     tty2     :0               08:32    1:12   0.02s  0.02s bash
```

- FROM : リモートの場合は接続先(ローカルなら空や`:0`)
- LOGIN@ : ログインした時間
- IDLE : 入力がなかった時間
- JCPU : TTY上で使われたCPU時間(プロセス全体)
- PCPU : 実行中のコマンドで使われたCPU時間
- WHAT : 現在実行中のコマンド

---

# /var/run/utmp

システムに今、誰がどの端末でログインしているかの情報をリアルタイムで記録しているファイル。(`バイナリファイル`)

端末ごとのログイン情報(ユーザー名、端末名、ログイン時間など)が保存されている。

`who`, `w`コマンドはこのファイルを読み取って情報を表示する。

