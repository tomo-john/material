# tmux

設定は `~/.tmux.conf`

```
# prefixをCtrl+jに設定
set -g prefix C-j

# デフォルトのプリフィックス(Ctrl+b)を解除
unbind C-b
```

## tmux.memo

```
# 新しいセッション
tmux new -s 'name'

# アタッチ
tmux a -t 'name'

# デタッチ
PRE + D

# セッション操作
PRE + S : セッション一覧(選択)
PRE + ( : セッション移動
PRE + ) : セッション移動

# window操作
PRE + C : 新規window
PRE + , : windowに名前
PRE + W : window一覧

# window移動
PRE + N : 次のwindow
PRE + P : 前のwindow
PRE + n(数字) : n番目のwindow

# pain
PRE + % : 縦に分割(右側に作成される)
PRE + " : 横に分割(下側に作成される)

PRE + o : 次のペインに移動
PRE + 矢印キー : 押した方向に移動

PRE + x : ペインと閉じる(y/n)

PRE + space : ペインと自動的に整列

# その他
PRE + T : 時計表示
```

