# プロセス管理
プロセスとは、動作中のプログラムをOSが管理する基本単位

## ps
現在実行されているプロセスを表示するには`ps`コマンドを使用する

オプション
- a  : 他ユーザーのプロセスも表示
- f  : 親子関係をツリー状に表示
- u  : ユーザー名も表示
- x  : 制御端末のないデーモンなどのプロセスも表示
- -e : すべてのプロセスを表示
- -l : 詳細な情報を表示
- -p PID : 特定のプロセスIDのプロセス情報のみ表示
- -C プロセス名 : 指定した名前のプロセスのみ表示
- -w : 長い行は折り返して表示

## top
現在実行中のプロセスを継続的に監視するには`top`コマンドを使用

デフォルトではCPUを多く利用している(CPU時間を消費している)順に表示

---

プロセスによっては実行中に他プロセスを起動させることもある

元のプロセスを`親プロセス`、起動されたプロセスを`子プロセス`と呼ぶ

親子関係によるプロセスの階層構造を表示するには`ps -f`か`pstree`コマンドを使用

プロセスは`PID`と呼ばれる固有の識別子を持っており、プロセス開始時に順に割り当てられる

Linuxではシステム起動時に最初にinitプログラムが実行される => initのPIDは通常1

プロセスは開始したユーザーから引き継がれたUID, GIDも持っている

## プロセスの終了(kill)
```
# 3つの書式
kill -[シグナル名orシグナルID] PID

kill -s [シグナル名orシグナルID] PID

kill -SIGシグナル名 PID
```

killはプロセスに対してシグナルを送信する

使用できるシグナルは`kill -l`で確認可能

主なシグナル
|シグナル名 |シグナルID |動作                                             |
|-----------|-----------|-------------------------------------------------|
|HUP        |1          |ハングアップ(端末が制御不能または切断による終了) |
|INT        |2          |キーボードからの割り込み(Ctrl + C)               |
|KILL       |9          |強制終了                                         |
|TERM       |15         |終了(デフォルト)                                 |
|CONT       |18         |停止しているプロセスの再開                       |
|STOP       |19         |一時停止                                         |

シグナルを指定せずにkillコマンドを実行した場合は`TERM`シグナルがプロセスに送られる

```
# 全部同じ
kill 560
kill -TERM 560
kill -15
kill -s TERM 560
kill -s 15 560
kill -SIGTERM 560
```

## pgrep
指定した名前のプロセスに対応するPIDを表示する

killコマンドでPIDを調べる時に便利

オプション
- -u user  : プロセスの実行ユーザーを指定
- -g group : プロセスの実行グループをしてい

## killall
killコマンドはPIDの指定が必要であるが、`killall`はプロセス名で指定が可能

=> 同じ名前のすべてのプロセスにシグナルを送る

## pkill
plillもプロセス名でシグナルを送ることが可能

オプションでユーザーごと、グループごとのプロセスを指定が可能

## ジョブ管理
ジョブはユーザーがコマンドやプログラムをシェル上で実行するひとまとまりの処理単位

ジョブはフォアグラウンド、バックグラウンドで実行される

通常はフォアグラウンドでジョブは実行され、実行中はシェル上で他の作業はできない

処理に時間のかかるジョブはバックグラウンドで実行すると終了をまたずにシェルを使用できる

バックグラウンドで実行するにはコマンドラインの最後に`&`を追加するだけ
```
updatedb &
```

実行中のジョブは`jobs`コマンドで参照が可能

ログアウト後もプログラムを実行させたい場合は`nohup`コマンドを使用する
```
nohup updatedb &
```

現在のジョブモード(フォアグラウンドかバックグラウンドか)を変更するには

`bg`, `fg`コマンドを使用する

フォアグラウンドで実行中のジョブをバックグラウンドで実行するにはまず`Ctrl + Z`で一時停止し

ジョブ番号を引数として`bg`コマンドを実行する

バックグラウンドのジョブは`fg ジョブ番号`でフォアグラウンドで実行できる

```
# バックグラウンドでコマンド実行
sleep 100 &
[1] 3676 

# ジョブ確認
jobs
[1]  + running    sleep 100

# バックグラウンドからフォアグラウンドへ
fg %1
[1]  + running    sleep 100

# Ctlr + Z で一時停止
^Z 
zsh: suspended  sleep 100

# ジョブ確認=>サスペンドされてる
jobs
[1]  + suspended  sleep 100

# バックグラウンドで実行
bg %1
[1]  + continued  sleep 100

# ジョブ確認=>実行中になった
jobs
[1]  + running    sleep 100

# 停止してみる
kill %1 
[1]  + terminated  sleep 100

# ジョブ確認=>なくなった
jobs

```

## システムの状況把握
topコマンド以外にもシステム状況を把握するためのコマンドたち

`free`コマンドでメモリの利用状況、空き状況を確認できる

オプション
- -m: MB単位で表示
- -s 秒: 指定した感覚で表示し続ける

`uptime`コマンドでシステムの稼働時間、平均負荷の確認ができる

`uname`コマンドでシステムのアーキテクチャやOSを確認できる

`watch`コマンドでコマンドを一定ごとに実行することができる
```
watch [オプション] コマンド
```
オプション
- -n 秒: 指定した秒数ごとに更新
- -d   : 変化した部分をわかりやすく表示
- -t   : ヘッダ情報を表示しない(コマンド実行結果のみ)

```
# 10秒ごとにuptimeコマンドを実行
watch -n 10 uptime
```

## 端末の活用
サーバー管理では、端末エミュレーターを使用しネットワーク経由でサーバーを操作するのが一般的

tmuxやscreenは1つの端末画面の中に複数ウィンドウ(仮想端末)を作成し、切り替えて作業ができる

各ウィンドウの作業状態を保ったまま終了(デタッチ)し、次回接続時に再開できる機能などもあり

### tmux
プレフィックスキー(デフォルトでCtrl + B)とキーを組み合わせて様々な操作を行う

```
tmux ls : デタッチしたセッションの一覧
tmux new-session : 新規セッションの開始
tmux new -s name : 新規セッションに名前をつける
tmux attach : アタッチ(再接続)
tmux a -t ... : 複数のセッションがある場合は-tオプションでセッションを指定
tmux kill-session : セッションの削除(複数ある時は-t)
tmux kill-server  : すべてのセッションをまとめて削除

# tmux時の操作
PRE + C : ウィンドウの新規作成
PRE + W : ウィンドウの一覧表示
PRE + N : 次のウィンドウへ
PRE + P : 前のウィンドウへ
PRE + 2 : ウィンドウ2へ(数字のウィンドウへ移動)
PRE + D : デタッチ
```

## プロセスの実行優先度
プロセスには実行優先度(プライオリディ)があり、必要に応じて優先度の指定が可能

優先度の高いプロセスはより多くのCPU時間を割り当てられるので、多くの処理ができる

`top`コマンド、`ps -l`で優先度の確認が可能

=> ps -l ではPRI列が優先順位を示している

### コマンド実行時の優先度指定
プロセスの実行優先度を高くしたり低くするために指定する値が`ナイス値`

ナイス値は-20から19まであり、ナイス値が小さいほど優先順位が高い

=> `nice [-n ナイス値] コマンド`でナイス値を指定する

=> ナイス値に負数を設定することができるのはrootのみ

### 実行中プロセスの優先度変更
すでに実行中のプロセスのナイス値を変更するには`renice`コマンドを使用する

`rinice [-n] ナイス値 [[-p] PID] [[-u] ユーザー名]`

- -n ナイス値: ナイス値を指定(-nは省略可能0
- -p PID : PID(プロセスID)を指定(-pは省略可能)
- -u ユーザー名 : ユーザー名で指定(-uは省略可能)

```
# PIDが1200のプロセスのナイス値を変更
renice -10 -p 1200

# ユーザーjohnが実行するすべてのプロセスの優先度を変更
renice 5 -u john
```
