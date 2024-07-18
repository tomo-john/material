## wsl2/ubuntu関連

### wsl2の現在のディレクトリをエクスプローラーで開く
```
explorer.exe .
```
---

### cドライブの指定exeを実行(例: Docker Desktop)
```
/mnt/c/Program\ Files/Docker/Docker/Docker\ Desktop.exe
```
---

### ~/.bashrc(プロンプトの設定)
```
export PS1='[\u@\e[0;35m\][\W]\[\e[m\]$'
```
[参考](https://atmarkit.itmedia.co.jp/flinux/rensai/linuxtips/002cngprmpt.html)  
[参考](https://qiita.com/zaburo/items/9194cd9eb841dea897a0)

---

## vim / tmux

### vim

---

### tmux
```
# 新しいセッション
tmux new -s 'name'

# アタッチ
tmux a -t 'name'

PRE + , : windowに名前
PRE * w : window一覧

```
---

## Linux

### プロンプト
```
# 引数
$_ : 直前のコマンドの最後の引数
!! : 直前のコマンド全体の再実行
=> !!:2 で直前のコマンドの2番目の引数を指定もできる

# カーソル移動
ctrl + A : 左端へ
ctrl + E : 右端へ

# 削除系
ctrl + U : カーソルから行先頭まで削除
ctrl + K : カーソルから行終端まで削除
ctrl + W : カーソル左の単語を削除

```
---

