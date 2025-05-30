# nice値

プロセスの実行優先度を設定する値。

`nice`コマンドにてnice値を指定してコマンドを実行することができる。

```
nice [-n nice値] コマンド

nice [-nice値] コマンド
```

nice値のオプションを省略してコマンドを実行をすると、そのコマンドのnice値は`10`になる。

nice値は`-20`から`19`まであり、nice値が低いほど優先度が高くなる。デフォルトのnice値は`0`。

nice値を指定・変更する主な目的は、実行に長時間かかったり重要でないプログラムを低い優先度で実行するため。

一般ユーザーでは以下の操作をすることはできない。(root権限が必要)

- 他ユーザーのプロセスのnice値を変更
- nice値を下げる(優先度を上げる)
- nice値に0より小さい値を設定する

niceコマンド実行例:

```
# testコマンドをnice値-20(最優先)で実行
nice -n -20 test
nice --20 test
```

# renice

すでに起動しているプロセスのnice値を変更するには`renice`コマンドを使用する。

```
renice [-n] nice値 オプション
```

niceコマンドでは-nオプションを使わずにnice値を指定するときに`-`をつけるが、reniceコマンドでは`-`をつけない点に注意。

### オプション

- -u ユーザー名: 指定したユーザーが所有する全てのプロセスのnice値を変更
- -p PID: 指定したPIDのプロセスのnice値を変更(-pは省略可能)

reniceコマンド実行例:

```
# 既に実行されているプロセス(PID: 100)のnice値を-20に変更
renice -n -20 -p 100
renice -20 100
```

# nice値の確認

実行中のプロセスのnice値を確認するには`top`, `ps -l`コマンドを使用する。

=> `NI`列に表示されるのがnice値

=> `ps -l`は`-`なしの`ps l`でもOK(出力がやや詳細になる)

